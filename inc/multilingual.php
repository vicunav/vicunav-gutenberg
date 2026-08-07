<?php
/**
 * Ajustes de accesibilidad para la integración pública de Polylang.
 *
 * @package Vicunav
 */

/**
 * Registra el catálogo de traducciones versionado con el theme.
 */
function vicunav_load_theme_textdomain() {
	load_theme_textdomain( 'vicunav', get_theme_file_path( 'languages' ) );
}
add_action( 'after_setup_theme', 'vicunav_load_theme_textdomain' );

/**
 * Renderiza un pattern existente bajo un locale concreto y restaura el previo.
 *
 * Las variantes inglesas reutilizan exactamente la estructura española y solo
 * sustituyen el copy mediante el catálogo del theme.
 *
 * @param string $pattern_file Nombre de archivo dentro de `patterns`.
 * @param string $locale       Locale de WordPress.
 */
function vicunav_render_localized_pattern( $pattern_file, $locale ) {
	$pattern_file = basename( $pattern_file );
	$pattern_path = get_theme_file_path( 'patterns/' . $pattern_file );

	if ( ! is_readable( $pattern_path ) ) {
		return;
	}

	$switched = switch_to_locale( $locale );

	try {
		require $pattern_path;
	} finally {
		if ( $switched ) {
			restore_previous_locale();
		}
	}
}

/**
 * Registra las variantes inglesas con contenido materializado.
 *
 * WordPress carga los patterns de archivos de forma diferida. Un archivo que
 * compone otro pattern puede quedar vacío bajo esa carga, por lo que estas
 * variantes se reemplazan después del registro automático con contenido ya
 * renderizado. La estructura continúa viviendo únicamente en el pattern ES.
 */
function vicunav_register_english_patterns() {
	$patterns = array(
		'hero-en.php'                     => array( 'vicunav/hero-en', 'Hero EN' ),
		'situaciones-en.php'              => array( 'vicunav/situaciones-en', 'Situations EN' ),
		'como-ayudamos-intro-en.php'      => array( 'vicunav/como-ayudamos-intro-en', 'How We Help EN' ),
		'como-ayudamos-en.php'            => array( 'vicunav/como-ayudamos-en', 'Process EN' ),
		'testimonio-destacado-en.php'     => array( 'vicunav/testimonio-destacado-en', 'Featured Testimonial EN' ),
		'resultados-en.php'               => array( 'vicunav/resultados-en', 'Results EN' ),
		'deberia-sentirse-como-tu-en.php' => array( 'vicunav/deberia-sentirse-como-tu-en', 'It Should Feel Like You EN' ),
		'conoce-a-mario-en.php'           => array( 'vicunav/conoce-a-mario-en', 'Meet Mario EN' ),
		'marcas-en.php'                   => array( 'vicunav/marcas-en', 'Brands EN' ),
		'cta-final-en.php'                => array( 'vicunav/cta-final-en', 'Final CTA EN' ),
	);
	$registry = WP_Block_Patterns_Registry::get_instance();

	foreach ( $patterns as $pattern_file => $pattern_data ) {
		if ( $registry->is_registered( $pattern_data[0] ) ) {
			unregister_block_pattern( $pattern_data[0] );
		}

		ob_start();
		require get_theme_file_path( 'patterns/' . $pattern_file );
		$content = ob_get_clean();

		register_block_pattern(
			$pattern_data[0],
			array(
				'title'         => $pattern_data[1],
				'content'       => $content,
				'categories'    => array( 'featured' ),
				'blockTypes'    => array( 'core/post-content' ),
				'viewportWidth' => 1440,
			)
		);
	}
}
add_action( 'init', 'vicunav_register_english_patterns', 20 );

/**
 * Devuelve la URL aprobada de una página en el locale activo.
 *
 * Prioriza la relación pública de Polylang cuando ya existe. El fallback
 * conserva las rutas aprobadas mientras el resto del lote se implementa.
 *
 * @param string $page_key Identificador lógico de la página.
 * @return string
 */
function vicunav_get_localized_page_url( $page_key ) {
	$routes = array(
		'home'     => array(
			'es' => '/',
			'en' => '/en/home/',
		),
		'services' => array(
			'es' => '/servicios/',
			'en' => '/en/website-design-for-therapists-and-wellness-practices/',
		),
		'contact'  => array(
			'es' => '/contacto/',
			'en' => '/en/contact/',
		),
	);

	if ( ! isset( $routes[ $page_key ] ) ) {
		return home_url( '/' );
	}

	$language = str_starts_with( get_locale(), 'en_' ) ? 'en' : 'es';

	if ( function_exists( 'pll_get_post' ) ) {
		$source_slug = ltrim( $routes[ $page_key ]['es'], '/' );
		$source_slug = rtrim( $source_slug, '/' );
		$source_page = $source_slug ? get_page_by_path( $source_slug, OBJECT, 'page' ) : get_post( get_option( 'page_on_front' ) );

		if ( $source_page ) {
			$translated_id = pll_get_post( $source_page->ID, $language );

			if ( $translated_id ) {
				return get_permalink( $translated_id );
			}
		}
	}

	return home_url( $routes[ $page_key ][ $language ] );
}

/**
 * Expone el estado del idioma actual en el selector de navegación de Polylang.
 *
 * El bloque público añade la clase `current-lang`, pero no declara el estado
 * ARIA equivalente. No altera rutas, relaciones ni decisiones de idioma.
 *
 * @param string $block_content HTML renderizado por el bloque.
 * @return string
 */
function vicunav_announce_current_polylang_language( $block_content ) {
	$tags                = new WP_HTML_Tag_Processor( $block_content );
	$is_current_language = false;

	while ( $tags->next_tag() ) {
		if ( 'LI' === $tags->get_tag() ) {
			$is_current_language = str_contains(
				' ' . (string) $tags->get_attribute( 'class' ) . ' ',
				' current-lang '
			);
		}

		if ( $is_current_language && 'A' === $tags->get_tag() ) {
			$tags->set_attribute( 'aria-current', 'true' );
		}
	}

	return $tags->get_updated_html();
}
add_filter( 'render_block_polylang/navigation-language-switcher', 'vicunav_announce_current_polylang_language', 10 );
