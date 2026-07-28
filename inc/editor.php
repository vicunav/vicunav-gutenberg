<?php
/**
 * Integración con el Editor del sitio.
 *
 * @package Vicunav
 */

/**
 * Devuelve la URL canónica del lienzo de la portada en el Editor del sitio.
 *
 * @return string
 */
function vicunav_get_front_page_template_edit_url() {
	return vicunav_get_template_edit_url( 'front-page' );
}

/**
 * Devuelve la URL canónica de un template del theme en el Editor del sitio.
 *
 * @param string $template_slug Slug del template sin namespace del theme.
 * @return string
 */
function vicunav_get_template_edit_url( $template_slug ) {
	return add_query_arg(
		array(
			'postType' => 'wp_template',
			'postId'   => get_stylesheet() . '//' . sanitize_key( $template_slug ),
			'canvas'   => 'edit',
		),
		admin_url( 'site-editor.php' )
	);
}

/**
 * Devuelve el template canónico gestionado por el theme para una página.
 *
 * @param int $post_id ID de la página.
 * @return string
 */
function vicunav_get_managed_page_template_slug( $post_id ) {
	if ( (int) get_option( 'page_on_front' ) === (int) $post_id ) {
		return 'front-page';
	}

	$templates = array(
		'servicios'  => 'page-servicios',
		'portafolio' => 'page-portafolio',
	);
	$page_slug = get_post_field( 'post_name', $post_id );

	return isset( $templates[ $page_slug ] ) ? $templates[ $page_slug ] : '';
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
	$template_slug = vicunav_get_managed_page_template_slug( $post_id );

	if ( ! $template_slug || ! current_user_can( 'edit_theme_options' ) ) {
		return $link;
	}

	$template_url = vicunav_get_template_edit_url( $template_slug );

	return 'display' === $context ? esc_url( $template_url ) : esc_url_raw( $template_url );
}
add_filter( 'get_edit_post_link', 'vicunav_filter_front_page_edit_link', 10, 3 );

/**
 * Evita que una URL directa abra el editor de contenido que la portada no usa.
 */
function vicunav_redirect_front_page_editor() {
	global $pagenow;

	// La lectura de esta URL administrativa no modifica estado y se valida por capacidad.
	// phpcs:disable WordPress.Security.NonceVerification.Recommended
	if ( 'post.php' !== $pagenow || ! isset( $_GET['post'], $_GET['action'] ) ) {
		return;
	}

	$post_id = absint( wp_unslash( $_GET['post'] ) );
	$action  = sanitize_key( wp_unslash( $_GET['action'] ) );
	// phpcs:enable WordPress.Security.NonceVerification.Recommended

	$template_slug = vicunav_get_managed_page_template_slug( $post_id );

	if ( 'edit' !== $action || ! $template_slug || ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	wp_safe_redirect( vicunav_get_template_edit_url( $template_slug ) );
	exit;
}
add_action( 'admin_init', 'vicunav_redirect_front_page_editor' );
