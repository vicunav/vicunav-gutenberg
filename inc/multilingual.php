<?php
/**
 * Ajustes de accesibilidad para la integración pública de Polylang.
 *
 * @package Vicunav
 */

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
