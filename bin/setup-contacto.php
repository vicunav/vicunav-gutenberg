<?php
/**
 * Sincroniza la página y el formulario español de Contacto.
 *
 * Ejecutar mediante WP-CLI con WordPress y Contact Form 7 cargados.
 *
 * @package Vicunav
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 1 );
}

if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
	WP_CLI::error( 'Contact Form 7 debe estar instalado y activo.' );
}

$config_path = dirname( __DIR__ ) . '/config/contact-form-7/contacto-es.json';

try {
	$config = json_decode(
		(string) file_get_contents( $config_path ), // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Archivo JSON local y versionado.
		true,
		512,
		JSON_THROW_ON_ERROR
	);
} catch ( JsonException $exception ) {
	WP_CLI::error( 'La configuración del formulario no contiene JSON válido.' );
}

$contact_form = wpcf7_get_contact_form_by_title( $config['title'] );

if ( ! $contact_form ) {
	$contact_form = WPCF7_ContactForm::get_template(
		array(
			'title'  => $config['title'],
			'locale' => $config['locale'],
		)
	);
}

$contact_form->set_title( $config['title'] );
$contact_form->set_locale( $config['locale'] );

$site_domain              = (string) wp_parse_url( home_url(), PHP_URL_HOST );
$config['mail']['sender'] = str_replace(
	'{{site_domain}}',
	$site_domain,
	$config['mail']['sender']
);

$contact_form->set_properties(
	array(
		'form'                => $config['form'],
		'mail'                => $config['mail'],
		'mail_2'              => $config['mail_2'],
		'messages'            => $config['messages'],
		'additional_settings' => $config['additional_settings'],
	)
);

$form_id = $contact_form->save();

if ( ! $form_id ) {
	WP_CLI::error( 'No se pudo guardar el formulario de Contacto.' );
}

$contact_page = get_page_by_path( 'contacto', OBJECT, 'page' );

if ( ! $contact_page ) {
	$page_id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => 'Contacto',
			'post_name'    => 'contacto',
			'post_content' => '',
		),
		true
	);

	if ( is_wp_error( $page_id ) ) {
		WP_CLI::error( 'No se pudo crear la página Contacto.' );
	}
} else {
	$page_id = $contact_page->ID;
}

$turnstile_site_key   = getenv( 'VICUNAV_TURNSTILE_SITE_KEY' );
$turnstile_secret_key = getenv( 'VICUNAV_TURNSTILE_SECRET_KEY' );
$turnstile_configured = false;

if ( $turnstile_site_key || $turnstile_secret_key ) {
	if ( ! $turnstile_site_key || ! $turnstile_secret_key ) {
		WP_CLI::error( 'Turnstile requiere site key y secret key juntas.' );
	}

	if ( ! in_array( wp_get_environment_type(), array( 'local', 'development' ), true ) ) {
		WP_CLI::error( 'Este script solo configura Turnstile en local o development.' );
	}

	WPCF7::update_option(
		'turnstile',
		array(
			$turnstile_site_key => $turnstile_secret_key,
		)
	);
	$turnstile_configured = true;
}

$saved_form = WPCF7_ContactForm::get_instance( $form_id );
$active_theme = wp_get_theme();
$active_theme->delete_pattern_cache();

WP_CLI::success(
	sprintf(
		'Contacto sincronizado: página %1$d, formulario %2$d, hash %3$s, Turnstile %4$s.',
		$page_id,
		$form_id,
		$saved_form->hash(),
		$turnstile_configured ? 'configurado' : 'sin cambios'
	)
);
