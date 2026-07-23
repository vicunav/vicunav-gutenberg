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

/**
 * Registra la composición de la lista de situaciones junto al bloque List.
 */
function vicunav_register_situaciones_block_styles() {
	$stylesheet_path = get_theme_file_path( 'assets/css/situaciones.css' );

	wp_enqueue_block_style(
		'core/list',
		array(
			'handle' => 'vicunav-situaciones',
			'src'    => get_theme_file_uri( 'assets/css/situaciones.css' ),
			'path'   => $stylesheet_path,
			'ver'    => (string) filemtime( $stylesheet_path ),
		)
	);
}
add_action( 'init', 'vicunav_register_situaciones_block_styles' );

/**
 * Registra la composición de la introducción de servicios junto al bloque Group.
 */
function vicunav_register_ayuda_block_styles() {
	$stylesheet_path = get_theme_file_path( 'assets/css/ayuda.css' );

	wp_enqueue_block_style(
		'core/group',
		array(
			'handle' => 'vicunav-ayuda',
			'src'    => get_theme_file_uri( 'assets/css/ayuda.css' ),
			'path'   => $stylesheet_path,
			'ver'    => (string) filemtime( $stylesheet_path ),
		)
	);
}
add_action( 'init', 'vicunav_register_ayuda_block_styles' );

/**
 * Registra la cuadrícula del proceso junto al bloque Group.
 */
function vicunav_register_proceso_block_styles() {
	$stylesheet_path = get_theme_file_path( 'assets/css/proceso.css' );

	wp_enqueue_block_style(
		'core/group',
		array(
			'handle' => 'vicunav-proceso',
			'src'    => get_theme_file_uri( 'assets/css/proceso.css' ),
			'path'   => $stylesheet_path,
			'ver'    => (string) filemtime( $stylesheet_path ),
		)
	);
}
add_action( 'init', 'vicunav_register_proceso_block_styles' );

/**
 * Registra la composición del testimonio junto al bloque Quote.
 */
function vicunav_register_testimonio_block_styles() {
	$stylesheet_path = get_theme_file_path( 'assets/css/testimonio.css' );

	wp_enqueue_block_style(
		'core/quote',
		array(
			'handle' => 'vicunav-testimonio',
			'src'    => get_theme_file_uri( 'assets/css/testimonio.css' ),
			'path'   => $stylesheet_path,
			'ver'    => (string) filemtime( $stylesheet_path ),
		)
	);
}
add_action( 'init', 'vicunav_register_testimonio_block_styles' );

/**
 * Registra la composición editorial de Resultados junto al bloque Columns.
 */
function vicunav_register_resultados_block_styles() {
	$stylesheet_path = get_theme_file_path( 'assets/css/resultados.css' );

	wp_enqueue_block_style(
		'core/columns',
		array(
			'handle' => 'vicunav-resultados',
			'src'    => get_theme_file_uri( 'assets/css/resultados.css' ),
			'path'   => $stylesheet_path,
			'ver'    => (string) filemtime( $stylesheet_path ),
		)
	);
}
add_action( 'init', 'vicunav_register_resultados_block_styles' );

/**
 * Registra la composición editorial de Conoce a Mario junto al bloque Columns.
 */
function vicunav_register_conoce_mario_block_styles() {
	$stylesheet_path = get_theme_file_path( 'assets/css/conoce-mario.css' );

	wp_enqueue_block_style(
		'core/columns',
		array(
			'handle' => 'vicunav-conoce-mario',
			'src'    => get_theme_file_uri( 'assets/css/conoce-mario.css' ),
			'path'   => $stylesheet_path,
			'ver'    => (string) filemtime( $stylesheet_path ),
		)
	);
}
add_action( 'init', 'vicunav_register_conoce_mario_block_styles' );

/**
 * Registra la cuadrícula de marcas junto al bloque Group.
 */
function vicunav_register_marcas_block_styles() {
	$stylesheet_path = get_theme_file_path( 'assets/css/marcas.css' );

	wp_enqueue_block_style(
		'core/group',
		array(
			'handle' => 'vicunav-marcas',
			'src'    => get_theme_file_uri( 'assets/css/marcas.css' ),
			'path'   => $stylesheet_path,
			'ver'    => (string) filemtime( $stylesheet_path ),
		)
	);
}
add_action( 'init', 'vicunav_register_marcas_block_styles' );

/**
 * Registra la composición del CTA final junto al bloque Group.
 */
function vicunav_register_cta_final_block_styles() {
	$stylesheet_path = get_theme_file_path( 'assets/css/cta-final.css' );

	wp_enqueue_block_style(
		'core/group',
		array(
			'handle' => 'vicunav-cta-final',
			'src'    => get_theme_file_uri( 'assets/css/cta-final.css' ),
			'path'   => $stylesheet_path,
			'ver'    => (string) filemtime( $stylesheet_path ),
		)
	);
}
add_action( 'init', 'vicunav_register_cta_final_block_styles' );

/**
 * Registra los ritmos internos del footer junto al bloque Columns.
 */
function vicunav_register_footer_block_styles() {
	$stylesheet_path = get_theme_file_path( 'assets/css/footer.css' );

	wp_enqueue_block_style(
		'core/columns',
		array(
			'handle' => 'vicunav-footer',
			'src'    => get_theme_file_uri( 'assets/css/footer.css' ),
			'path'   => $stylesheet_path,
			'ver'    => (string) filemtime( $stylesheet_path ),
		)
	);
}
add_action( 'init', 'vicunav_register_footer_block_styles' );

/**
 * Devuelve la URL canónica del lienzo de la portada en el Editor del sitio.
 *
 * @return string
 */
function vicunav_get_front_page_template_edit_url() {
	return add_query_arg(
		array(
			'postType' => 'wp_template',
			'postId'   => get_stylesheet() . '//front-page',
			'canvas'   => 'edit',
		),
		admin_url( 'site-editor.php' )
	);
}

/**
 * Sustituye el enlace de edición de la página estática por el template real.
 *
 * @param string $link    Enlace de edición original.
 * @param int    $post_id ID de la entrada.
 * @param string $context Contexto de escape solicitado por WordPress.
 * @return string
 */
function vicunav_filter_front_page_edit_link( $link, $post_id, $context ) {
	$front_page_id = (int) get_option( 'page_on_front' );

	if ( $front_page_id <= 0 || $front_page_id !== (int) $post_id || ! current_user_can( 'edit_theme_options' ) ) {
		return $link;
	}

	$template_url = vicunav_get_front_page_template_edit_url();

	return 'display' === $context ? esc_url( $template_url ) : esc_url_raw( $template_url );
}
add_filter( 'get_edit_post_link', 'vicunav_filter_front_page_edit_link', 10, 3 );

/**
 * Evita que una URL directa abra el editor de contenido que la portada no usa.
 */
function vicunav_redirect_front_page_editor() {
	global $pagenow;

	if ( 'post.php' !== $pagenow || ! isset( $_GET['post'], $_GET['action'] ) ) {
		return;
	}

	$post_id = absint( wp_unslash( $_GET['post'] ) );
	$action  = sanitize_key( wp_unslash( $_GET['action'] ) );

	if (
		'edit' !== $action ||
		$post_id !== (int) get_option( 'page_on_front' ) ||
		! current_user_can( 'edit_theme_options' )
	) {
		return;
	}

	wp_safe_redirect( vicunav_get_front_page_template_edit_url() );
	exit;
}
add_action( 'admin_init', 'vicunav_redirect_front_page_editor' );
