<?php
/**
 * Title: Debería Sentirse Como Tú
 * Slug: vicunav/deberia-sentirse-como-tu
 * Categories: call-to-action, text
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Declaración sobre una presencia digital auténtica.
 */
?>

<!-- wp:group {"templateLock":"contentOnly","tagName":"section","align":"full","backgroundColor":"neutral-300","className":"vicunav-deberia-sentirse is-style-surface-muted","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|80","left":"var:preset|spacing|site-gutter"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-deberia-sentirse is-style-surface-muted has-neutral-300-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--site-gutter)">
	<!-- wp:paragraph {"align":"center","textColor":"primary","fontFamily":"handwritten","fontSize":"accent-text","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
	<p class="has-text-align-center has-primary-color has-text-color has-handwritten-font-family has-accent-text-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:400;line-height:1"><?php echo esc_html_x( 'Sin presiones, ni tácticas raras', 'Eyebrow de la sección de autenticidad.', 'vicunav' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":2,"textColor":"primary","fontFamily":"heading","fontSize":"heading-large","style":{"typography":{"fontWeight":"300","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"calc(var(--wp--preset--spacing--50) + var(--wp--preset--spacing--10))"}}}} -->
	<h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:calc(var(--wp--preset--spacing--50) + var(--wp--preset--spacing--10));font-weight:300;line-height:1"><?php echo esc_html_x( 'Debería Sentirse Como Tú', 'Título de la sección de autenticidad.', 'vicunav' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"text","fontSize":"body-callout","style":{"typography":{"lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"var:custom|typography|lead-line-height"}}}} -->
	<p class="has-text-align-center has-text-color has-body-callout-font-size" style="margin-top:0;margin-bottom:var(--wp--custom--typography--lead-line-height);line-height:1.6"><?php echo esc_html_x( 'Si ofreces un servicio, lo último que quieres es un sitio web que se sienta agresivo o de ventas. Eso simplemente no es como operas. Tu sitio debería sentirse como lo que eres: claro, honesto, y una extensión natural de cómo ya apoyas a las personas que trabajan contigo.', 'Texto de la sección de autenticidad.', 'vicunav' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"neutral-400","textColor":"text","fontFamily":"body","fontSize":"body","style":{"spacing":{"padding":{"left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-neutral-400-background-color has-text-color has-background has-body-font-family has-body-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" style="padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><?php echo esc_html_x( '¡Hablemos!', 'Botón de la sección de autenticidad.', 'vicunav' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</section>
<!-- /wp:group -->
