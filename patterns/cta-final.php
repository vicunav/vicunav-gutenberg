<?php
/**
 * Title: CTA final
 * Slug: vicunav/cta-final
 * Categories: call-to-action, featured
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Invitación final a conversar sobre el sitio web.
 */
?>

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"neutral-100","className":"vicunav-cta-final is-style-surface-light","style":{"spacing":{"padding":{"top":"var:preset|spacing|cta-section","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|cta-section","left":"var:preset|spacing|site-gutter"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-cta-final is-style-surface-light has-neutral-100-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--cta-section);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--cta-section);padding-left:var(--wp--preset--spacing--site-gutter)">
	<!-- wp:group {"align":"wide","backgroundColor":"neutral-200-80","className":"vicunav-cta-final__panel","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|80"},"blockGap":"0"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide vicunav-cta-final__panel has-neutral-200-80-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80)">
		<!-- wp:heading {"textAlign":"center","level":2,"textColor":"text","fontFamily":"heading","fontSize":"heading-large","className":"vicunav-cta-final__title","style":{"typography":{"fontWeight":"300","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|65"}}}} -->
		<h2 class="wp-block-heading has-text-align-center vicunav-cta-final__title has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--65);font-weight:300;line-height:1"><?php echo wp_kses_post( _x( '¿Listo para un sitio web que <em>realmente refleje</em> tu trabajo y te <u>ayude a crecer</u>?', 'Título del CTA final.', 'vicunav' ) ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"text","fontSize":"lead","className":"vicunav-cta-final__text","style":{"typography":{"fontWeight":"500","letterSpacing":"var(--wp--custom--typography--tracking-wide)","lineHeight":"var(--wp--custom--typography--lead-line-height)"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|65"}}}} -->
		<p class="has-text-align-center vicunav-cta-final__text has-text-color has-lead-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--65);font-weight:500;letter-spacing:var(--wp--custom--typography--tracking-wide);line-height:var(--wp--custom--typography--lead-line-height)"><?php echo esc_html_x( 'Si buscas un sitio claro y profesional, con reservas en línea y las herramientas que tu negocio necesita, podemos empezar con una conversación sencilla.', 'Texto del CTA final.', 'vicunav' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"className":"vicunav-cta-final__actions","layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons vicunav-cta-final__actions">
			<!-- wp:button {"backgroundColor":"neutral-400","textColor":"text","fontFamily":"body","fontSize":"body-responsive","style":{"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-neutral-400-background-color has-text-color has-background has-body-font-family has-body-responsive-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" style="padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><?php echo esc_html_x( 'Hablemos sobre tu sitio web', 'Botón del CTA final.', 'vicunav' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
