<?php
/**
 * Contratos de dependencias externas del theme.
 *
 * @package Vicunav
 */

/**
 * Indica si la dependencia funcional de Contacto está disponible.
 *
 * @return bool
 */
function vicunav_has_contact_form_dependency() {
	return defined( 'WPCF7_VERSION' ) && class_exists( 'WPCF7_ContactForm' );
}

/**
 * Indica si la petición actual consume el formulario gestionado por el theme.
 *
 * @return bool
 */
function vicunav_is_contact_form_page() {
	return is_page( array( 'contacto', 'contact' ) );
}

/**
 * Evita cargar Contact Form 7 y Turnstile fuera de sus páginas consumidoras.
 */
function vicunav_scope_contact_form_assets() {
	if ( vicunav_is_contact_form_page() ) {
		return;
	}

	wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_script( 'swv' );
	wp_dequeue_script( 'contact-form-7' );
	wp_dequeue_script( 'cloudflare-turnstile' );
}
add_action( 'wp_enqueue_scripts', 'vicunav_scope_contact_form_assets', 100 );

/**
 * Avisa a administradores cuando Contacto no puede procesar formularios.
 */
function vicunav_contact_form_dependency_notice() {
	if ( vicunav_has_contact_form_dependency() || ! current_user_can( 'activate_plugins' ) ) {
		return;
	}

	$message = sprintf(
		/* translators: %s: nombre del plugin requerido. */
		__( 'La página de Contacto requiere %s activo para validar y entregar mensajes.', 'vicunav' ),
		'Contact Form 7'
	);

	printf(
		'<div class="notice notice-warning"><p>%s</p></div>',
		esc_html( $message )
	);
}
add_action( 'admin_notices', 'vicunav_contact_form_dependency_notice' );

/**
 * Ejecuta el shortcode del formulario dentro de templates FSE.
 *
 * WordPress procesa shortcodes al filtrar `the_content`, pero los patterns
 * insertados directamente por un block template no pasan por ese filtro.
 *
 * @param string $block_content Contenido renderizado por el bloque.
 * @param array  $block         Representación analizada del bloque.
 * @return string
 */
function vicunav_render_contact_form_shortcode_block( $block_content, $block ) {
	$shortcode = trim( (string) ( $block['innerHTML'] ?? '' ) );

	if (
		! vicunav_has_contact_form_dependency() ||
		1 !== preg_match( '/^\[contact-form-7\b[^\]]*\]$/', $shortcode )
	) {
		return $block_content;
	}

	return do_shortcode( $shortcode );
}
add_filter( 'render_block_core/shortcode', 'vicunav_render_contact_form_shortcode_block', 10, 2 );
