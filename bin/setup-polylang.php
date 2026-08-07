<?php
/**
 * Configura de forma idempotente los idiomas de Polylang para desarrollo local.
 *
 * Ejecutar mediante WP-CLI con Polylang 3.8.6 activo.
 *
 * @package Vicunav
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 1 );
}

if ( ! defined( 'POLYLANG_VERSION' ) || ! function_exists( 'PLL' ) ) {
	WP_CLI::error( 'Polylang debe estar instalado y activo.' );
}

$config_path = dirname( __DIR__ ) . '/config/polylang/languages.json';

try {
	$config = json_decode(
		(string) file_get_contents( $config_path ), // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Archivo JSON local y versionado.
		true,
		512,
		JSON_THROW_ON_ERROR
	);
} catch ( JsonException $exception ) {
	WP_CLI::error( 'La configuración de Polylang no contiene JSON válido.' );
}

if ( POLYLANG_VERSION !== $config['plugin_version'] ) {
	WP_CLI::error( 'La versión activa de Polylang no coincide con la configuración versionada.' );
}

$model = PLL()->model;

foreach ( $config['languages'] as $language ) {
	$existing_language = $model->get_language( $language['slug'] );

	if ( $existing_language ) {
		if ( $existing_language->locale !== $language['locale'] ) {
			WP_CLI::error( sprintf( 'El idioma %s existe con un locale distinto.', $language['slug'] ) );
		}

		continue;
	}

	$result = $model->add_language( $language );
	if ( is_wp_error( $result ) ) {
		WP_CLI::error( $result->get_error_message() );
	}
}

$options = get_option( 'polylang', array() );
$options = array_merge( $options, $config['options'] );
update_option( 'polylang', $options );

$errors = $model->update_default_lang( $config['default_language'] );
if ( $errors->has_errors() ) {
	WP_CLI::error( $errors->get_error_message() );
}

foreach ( $config['spanish_pages'] as $page_slug ) {
	$page = get_page_by_path( $page_slug, OBJECT, 'page' );

	if ( ! $page ) {
		WP_CLI::error( sprintf( 'No existe la página española %s.', $page_slug ) );
	}

	pll_set_post_language( $page->ID, $config['default_language'] );
}

foreach ( $config['english_pages'] as $page_config ) {
	$source_page = get_page_by_path( $page_config['source_slug'], OBJECT, 'page' );
	$template     = sanitize_key( $page_config['template'] );

	if ( ! $source_page ) {
		WP_CLI::error( sprintf( 'No existe la página fuente %s.', $page_config['source_slug'] ) );
	}

	if ( ! is_file( get_theme_file_path( 'templates/' . $template . '.html' ) ) ) {
		WP_CLI::error( sprintf( 'No existe el template %s.', $template ) );
	}

	$english_page = get_page_by_path( $page_config['slug'], OBJECT, 'page' );

	if ( ! $english_page ) {
		$english_page_id = wp_insert_post(
			array(
				'post_title'  => $page_config['title'],
				'post_name'   => $page_config['slug'],
				'post_status' => 'publish',
				'post_type'   => 'page',
			),
			true
		);

		if ( is_wp_error( $english_page_id ) ) {
			WP_CLI::error( $english_page_id->get_error_message() );
		}

		$english_page = get_post( $english_page_id );
	} elseif ( pll_get_post_language( $english_page->ID ) && 'en' !== pll_get_post_language( $english_page->ID ) ) {
		WP_CLI::error( sprintf( 'La página %s ya pertenece a otro idioma.', $page_config['slug'] ) );
	}

	$updated_page_id = wp_update_post(
		array(
			'ID'          => $english_page->ID,
			'post_title'  => $page_config['title'],
			'post_name'   => $page_config['slug'],
			'post_status' => 'publish',
		),
		true
	);

	if ( is_wp_error( $updated_page_id ) ) {
		WP_CLI::error( $updated_page_id->get_error_message() );
	}

	pll_set_post_language( $english_page->ID, 'en' );
	update_post_meta( $english_page->ID, '_wp_page_template', $template );
	pll_save_post_translations(
		array(
			$config['default_language'] => $source_page->ID,
			'en'                       => $english_page->ID,
		)
	);
}

flush_rewrite_rules();

WP_CLI::success( 'Polylang configurado: idiomas, páginas inglesas y relaciones sincronizados.' );
