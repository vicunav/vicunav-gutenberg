<?php
/**
 * Title: Servicios — Opciones adicionales
 * Slug: vicunav/servicios-adicionales
 * Categories: services
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Complementos opcionales para proyectos de Servicios.
 *
 * @package Vicunav
 */

$additional_options = array(
	array( _x( 'Página adicional', 'Opción adicional.', 'vicunav' ), '$150', _x( 'Una página estructurada, diseñada y desarrollada usando el mismo sistema visual y de mensaje del resto de tu sitio.', 'Descripción de opción adicional.', 'vicunav' ) ),
	array( _x( 'Migración de contenido', 'Opción adicional.', 'vicunav' ), '$200', _x( 'Transferencia del contenido relevante de un sitio existente a la nueva estructura. El contenido se revisa y organiza para adaptarse al nuevo diseño.', 'Descripción de opción adicional.', 'vicunav' ) ),
	array( _x( 'Additional Language Version', 'Opción adicional.', 'vicunav' ), '$150', _x( 'Creación de una segunda versión del sitio en otro idioma, incluyendo duplicación de estructura y configuración. La traducción del contenido no está incluida.', 'Descripción de opción adicional.', 'vicunav' ) ),
);

?>

<!-- wp:group {"templateLock":"contentOnly","tagName":"section","align":"full","backgroundColor":"neutral-100","className":"vicunav-servicios-extras is-style-surface-light","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|80","left":"var:preset|spacing|site-gutter"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-servicios-extras is-style-surface-light has-neutral-100-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--site-gutter)">
	<!-- wp:paragraph {"align":"center","textColor":"primary","fontFamily":"handwritten","fontSize":"accent-text","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}}}} -->
	<p class="has-text-align-center has-primary-color has-text-color has-handwritten-font-family has-accent-text-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30);font-weight:400;line-height:1"><?php echo esc_html_x( 'Opciones adicionales', 'Eyebrow de opciones adicionales.', 'vicunav' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"textAlign":"center","level":2,"textColor":"neutral-800","fontFamily":"heading","fontSize":"heading-large","align":"wide","style":{"typography":{"fontWeight":"400","lineHeight":"1.08"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
	<h2 class="wp-block-heading alignwide has-text-align-center has-neutral-800-color has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:400;line-height:1.08"><?php echo esc_html_x( 'Soporte adicional para tu Sitio Web', 'Título de opciones adicionales.', 'vicunav' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","textColor":"accent","align":"wide","style":{"typography":{"fontWeight":"400","lineHeight":"1.55"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|60"}}}} -->
	<p class="alignwide has-text-align-center has-accent-color has-text-color" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--60);font-weight:400;line-height:1.55"><?php echo esc_html_x( 'Algunos proyectos necesitan elementos adicionales más allá de los paquetes base. Estos complementos opcionales pueden incluirse según las necesidades de tu negocio. Todo se conversa y confirma antes de comenzar el proyecto.', 'Introducción de opciones adicionales.', 'vicunav' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","className":"vicunav-servicios-extras__grid","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide vicunav-servicios-extras__grid">
		<?php foreach ( $additional_options as $option ) : ?>
			<!-- wp:group {"className":"vicunav-servicios-extras__card","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group vicunav-servicios-extras__card" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
				<!-- wp:heading {"level":3,"textColor":"neutral-800","fontFamily":"heading","fontSize":"heading-small","style":{"typography":{"fontWeight":"600","lineHeight":"1.15"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|20"}}}} -->
				<h3 class="wp-block-heading has-neutral-800-color has-text-color has-heading-font-family has-heading-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--20);font-weight:600;line-height:1.15"><?php echo esc_html( $option[0] ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"textColor":"neutral-700","fontFamily":"heading","fontSize":"heading-medium","style":{"typography":{"fontWeight":"600","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
				<p class="has-neutral-700-color has-text-color has-heading-font-family has-heading-medium-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:600;line-height:1"><?php echo esc_html( $option[1] ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"textColor":"accent","style":{"typography":{"fontWeight":"400","lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p class="has-accent-color has-text-color" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.5"><?php echo esc_html( $option[2] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
