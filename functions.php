<?php
/**
 * Funciones del theme Vicunav.
 *
 * @package Vicunav
 */

/**
 * Registra los estilos estructurales del header junto al bloque Navigation.
 */
function vicunav_register_header_block_styles() {
	$stylesheet_path = get_theme_file_path( 'assets/css/header.css' );

	wp_enqueue_block_style(
		'core/navigation',
		array(
			'handle' => 'vicunav-header',
			'src'    => get_theme_file_uri( 'assets/css/header.css' ),
			'path'   => $stylesheet_path,
			'ver'    => (string) filemtime( $stylesheet_path ),
		)
	);
}
add_action( 'init', 'vicunav_register_header_block_styles' );

/**
 * Registra la altura normalizada del Hero junto al bloque Cover.
 */
function vicunav_register_hero_block_styles() {
	$stylesheet_path = get_theme_file_path( 'assets/css/hero.css' );

	wp_enqueue_block_style(
		'core/cover',
		array(
			'handle' => 'vicunav-hero',
			'src'    => get_theme_file_uri( 'assets/css/hero.css' ),
			'path'   => $stylesheet_path,
			'ver'    => (string) filemtime( $stylesheet_path ),
		)
	);
}
add_action( 'init', 'vicunav_register_hero_block_styles' );
