<?php
/**
 * Carga de estilos y optimizaciones de assets.
 *
 * @package Vicunav
 */

/**
 * Carga los estilos globales mínimos del theme.
 */
function vicunav_enqueue_theme_styles() {
	wp_enqueue_style(
		'vicunav-style',
		get_stylesheet_uri(),
		array(),
		(string) wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'vicunav_enqueue_theme_styles' );

/**
 * Registra declarativamente los estilos estructurales junto a sus bloques.
 */
function vicunav_register_block_stylesheets() {
	$stylesheets = array(
		array( 'core/navigation', 'header' ),
		array( 'core/cover', 'hero' ),
		array( 'core/list', 'situaciones' ),
		array( 'core/group', 'ayuda' ),
		array( 'core/group', 'proceso' ),
		array( 'core/quote', 'testimonio' ),
		array( 'core/columns', 'resultados' ),
		array( 'core/columns', 'conoce-mario' ),
		array( 'core/group', 'marcas' ),
		array( 'core/group', 'cta-final' ),
		array( 'core/columns', 'servicios-hero' ),
		array( 'core/group', 'servicios-paquetes' ),
		array( 'core/group', 'servicios-beneficios' ),
		array( 'core/group', 'servicios-proceso' ),
		array( 'core/group', 'servicios-mantenimiento' ),
		array( 'core/columns', 'footer' ),
	);

	foreach ( $stylesheets as list( $block_name, $stylesheet ) ) {
		$relative_path = 'assets/css/' . $stylesheet . '.css';
		$absolute_path = get_theme_file_path( $relative_path );

		if ( ! is_readable( $absolute_path ) ) {
			continue;
		}

		wp_enqueue_block_style(
			$block_name,
			array(
				'handle' => 'vicunav-' . $stylesheet,
				'src'    => get_theme_file_uri( $relative_path ),
				'path'   => $absolute_path,
				'ver'    => (string) filemtime( $absolute_path ),
			)
		);
	}
}
add_action( 'init', 'vicunav_register_block_stylesheets' );

/**
 * Inicia la descarga del asset LCP antes de analizar el cuerpo de la página.
 *
 * @param array $preloads Recursos registrados para precarga.
 * @return array
 */
function vicunav_preload_lcp_asset( $preloads ) {
	if ( ! is_front_page() && ! is_page( 'servicios' ) ) {
		return $preloads;
	}

	$hero_asset = is_page( 'servicios' )
		? 'assets/images/services/hero-background.webp'
		: 'assets/images/hero-vicunav.webp';

	$preloads[] = array(
		'href'          => get_theme_file_uri( $hero_asset ),
		'as'            => 'image',
		'type'          => 'image/webp',
		'fetchpriority' => 'high',
	);

	return $preloads;
}
add_filter( 'wp_preload_resources', 'vicunav_preload_lcp_asset' );

/**
 * Devuelve dimensiones y estrategia de carga de las imágenes del theme.
 *
 * @return array
 */
function vicunav_get_image_manifest() {
	return array(
		'logo-dark.webp'               => array( 554, 113, 'eager', 'auto' ),
		'hero-vicunav.webp'            => array( 1536, 1024, 'eager', 'high' ),
		'situaciones-vicunav.webp'     => array( 1536, 1024, 'lazy', null ),
		'como-ayudamos-vicunav.webp'   => array( 1024, 1280, 'lazy', null ),
		'proceso-textos.webp'          => array( 400, 306, 'lazy', null ),
		'proceso-visual.webp'          => array( 400, 306, 'lazy', null ),
		'proceso-desarrollo.webp'      => array( 400, 306, 'lazy', null ),
		'proceso-encontrado.webp'      => array( 400, 306, 'lazy', null ),
		'proceso-herramientas.webp'    => array( 400, 306, 'lazy', null ),
		'proceso-soporte.webp'         => array( 400, 306, 'lazy', null ),
		'testimonio-fondo.webp'        => array( 1536, 1024, 'lazy', null ),
		'testimonio-tatiana.webp'      => array( 300, 300, 'lazy', null ),
		'testimonio-tatipilates.webp'  => array( 520, 767, 'lazy', null ),
		'resultados-vicunav.webp'      => array( 1024, 1280, 'lazy', null ),
		'mario-vicuna.webp'            => array( 1024, 1536, 'lazy', null ),
		'marca-clearpath.webp'         => array( 400, 125, 'lazy', null ),
		'marca-tatipilates.webp'       => array( 400, 310, 'lazy', null ),
		'marca-redstage.webp'          => array( 400, 95, 'lazy', null ),
		'marca-quiet-path.webp'        => array( 400, 180, 'lazy', null ),
		'marca-eleanor.webp'           => array( 400, 96, 'lazy', null ),
		'hero-mockup.webp'             => array( 1024, 683, 'eager', 'high' ),
		'benefit-design.webp'          => array( 480, 480, 'lazy', null ),
		'benefit-copy.webp'            => array( 480, 480, 'lazy', null ),
		'benefit-mobile.webp'          => array( 480, 480, 'lazy', null ),
		'benefit-search-ai.webp'       => array( 480, 480, 'lazy', null ),
		'benefit-performance.webp'     => array( 480, 480, 'lazy', null ),
		'benefit-security.webp'        => array( 480, 480, 'lazy', null ),
		'benefit-wordpress.webp'       => array( 480, 480, 'lazy', null ),
		'benefit-walkthrough.webp'     => array( 480, 480, 'lazy', null ),
		'process-discovery.webp'       => array( 1024, 1024, 'lazy', null ),
		'process-content.webp'         => array( 1024, 1024, 'lazy', null ),
		'process-build.webp'           => array( 1024, 1024, 'lazy', null ),
		'process-review.webp'          => array( 1024, 1024, 'lazy', null ),
		'process-launch.webp'          => array( 1024, 1024, 'lazy', null ),
		'process-overview.webp'        => array( 1024, 1536, 'lazy', null ),
		'maintenance-hosting.webp'     => array( 121, 160, 'lazy', null ),
		'maintenance-security.webp'    => array( 135, 160, 'lazy', null ),
		'maintenance-backups.webp'     => array( 160, 144, 'lazy', null ),
		'maintenance-updates.webp'     => array( 160, 156, 'lazy', null ),
		'maintenance-uptime.webp'      => array( 160, 150, 'lazy', null ),
		'maintenance-technical.webp'   => array( 160, 132, 'lazy', null ),
		'maintenance-adjustments.webp' => array( 160, 151, 'lazy', null ),
		'maintenance-reports.webp'     => array( 144, 160, 'lazy', null ),
	);
}

/**
 * Añade atributos de rendimiento a una imagen conocida del theme.
 *
 * Este callback se ejecuta únicamente para bloques Image y Cover.
 *
 * @param string $block_content HTML renderizado del bloque.
 * @return string
 */
function vicunav_add_image_performance_attributes( $block_content ) {
	$processor = new WP_HTML_Tag_Processor( $block_content );

	if ( ! $processor->next_tag( 'img' ) ) {
		return $block_content;
	}

	$source_path = wp_parse_url( (string) $processor->get_attribute( 'src' ), PHP_URL_PATH );
	$filename    = basename( (string) $source_path );
	$manifest    = vicunav_get_image_manifest();

	if ( ! isset( $manifest[ $filename ] ) ) {
		return $block_content;
	}

	list( $width, $height, $loading, $fetch_priority ) = $manifest[ $filename ];

	$processor->set_attribute( 'width', (string) $width );
	$processor->set_attribute( 'height', (string) $height );
	$processor->set_attribute( 'decoding', 'async' );
	$processor->set_attribute( 'loading', $loading );

	if ( null !== $fetch_priority ) {
		$processor->set_attribute( 'fetchpriority', $fetch_priority );
	}

	return $processor->get_updated_html();
}
add_filter( 'render_block_core/image', 'vicunav_add_image_performance_attributes' );
add_filter( 'render_block_core/cover', 'vicunav_add_image_performance_attributes' );
