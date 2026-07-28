<?php
/**
 * Title: Portafolio — Introducción
 * Slug: vicunav/portafolio-intro
 * Categories: featured, portfolio
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Introducción editorial de la página de Portafolio.
 *
 * @package Vicunav
 */

?>

<!-- wp:group {"templateLock":"contentOnly","tagName":"section","align":"full","backgroundColor":"neutral-300","className":"vicunav-portfolio-intro","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|site-gutter","bottom":"0","left":"var:preset|spacing|site-gutter"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-portfolio-intro has-neutral-300-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:0;padding-left:var(--wp--preset--spacing--site-gutter)">
	<!-- wp:group {"className":"vicunav-portfolio-intro__content","layout":{"type":"constrained","contentSize":"960px"}} -->
	<div class="wp-block-group vicunav-portfolio-intro__content">
		<!-- wp:paragraph {"align":"center","textColor":"text","fontFamily":"handwritten","fontSize":"accent-text","style":{"typography":{"fontWeight":"400","letterSpacing":"calc(var(--wp--custom--typography--tracking-wide) * 2)","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|20"}}}} -->
		<p class="has-text-align-center has-text-color has-handwritten-font-family has-accent-text-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--20);font-weight:400;letter-spacing:calc(var(--wp--custom--typography--tracking-wide) * 2);line-height:1"><?php echo esc_html_x( 'Selected concept work', 'Eyebrow de Portafolio.', 'vicunav' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-800","fontFamily":"heading","fontSize":"heading-large","style":{"typography":{"fontWeight":"300","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|50"}}}} -->
		<h1 class="wp-block-heading has-text-align-center has-neutral-800-color has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--50);font-weight:300;line-height:1"><?php echo esc_html_x( 'Exploring structure, clarity, and tone', 'Título principal de Portafolio.', 'vicunav' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"text","fontFamily":"body","fontSize":"body-large","style":{"typography":{"fontWeight":"400","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<p class="has-text-align-center has-text-color has-body-font-family has-body-large-font-size" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.6"><?php echo esc_html_x( 'These projects explore how websites for therapists and wellness practices can feel clear, calm, and aligned with the work behind them. Client work will be added as new projects are completed.', 'Introducción de Portafolio.', 'vicunav' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:separator {"backgroundColor":"neutral-500","className":"vicunav-portfolio-intro__divider"} -->
		<hr class="wp-block-separator has-text-color has-neutral-500-color has-alpha-channel-opacity has-neutral-500-background-color has-background vicunav-portfolio-intro__divider"/>
		<!-- /wp:separator -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
