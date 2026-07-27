<?php
/**
 * Title: Servicios — Hero
 * Slug: vicunav/servicios-hero
 * Categories: featured, services
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Presentación principal de la página de Servicios.
 *
 * @package Vicunav
 */

?>

<!-- wp:group {"templateLock":"contentOnly","tagName":"section","anchor":"servicios-inicio","align":"full","backgroundColor":"neutral-200","className":"vicunav-servicios-hero is-style-surface-muted","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"default"}} -->
<section id="servicios-inicio" class="wp-block-group alignfull vicunav-servicios-hero is-style-surface-muted has-neutral-200-background-color has-background" style="margin-top:0;margin-bottom:0">
	<!-- wp:columns {"verticalAlignment":"stretch","isStackedOnMobile":true,"className":"vicunav-servicios-hero__columns","style":{"spacing":{"blockGap":{"left":"0"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-stretch vicunav-servicios-hero__columns">
		<!-- wp:column {"verticalAlignment":"stretch","width":"50%","className":"vicunav-servicios-hero__visual"} -->
		<div class="wp-block-column is-vertically-aligned-stretch vicunav-servicios-hero__visual" style="flex-basis:50%">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-servicios-hero__mockup"} -->
			<figure class="wp-block-image size-full vicunav-servicios-hero__mockup"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/services/hero-mockup.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Sitio Vicunav presentado en una computadora portátil', 'Texto alternativo del hero de Servicios.', 'vicunav' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"vicunav-servicios-hero__copy","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|80","left":"var:preset|spacing|70"},"blockGap":"0"}}} -->
		<div class="wp-block-column is-vertically-aligned-center vicunav-servicios-hero__copy" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--70);flex-basis:50%">
			<!-- wp:paragraph {"textColor":"primary","fontFamily":"handwritten","fontSize":"accent-text","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
			<p class="has-primary-color has-text-color has-handwritten-font-family has-accent-text-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:400;line-height:1"><?php echo esc_html_x( 'Para profesionales independientes y negocios', 'Eyebrow del hero de Servicios.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"textColor":"neutral-800","fontFamily":"heading","fontSize":"heading-large","className":"vicunav-servicios-hero__title","style":{"typography":{"fontWeight":"400","lineHeight":"1.08"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|50"}}}} -->
			<h1 class="wp-block-heading vicunav-servicios-hero__title has-neutral-800-color has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--50);font-weight:400;line-height:1.08"><?php echo esc_html_x( 'Un sitio web que ', 'Inicio del título de Servicios.', 'vicunav' ); ?><em><?php echo esc_html_x( 'ayuda a las personas a', 'Énfasis del título de Servicios.', 'vicunav' ); ?></em> <span><?php echo esc_html_x( 'entender tu trabajo', 'Cierre subrayado del título de Servicios.', 'vicunav' ); ?></span></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"accent","fontSize":"body-large","style":{"typography":{"fontWeight":"400","lineHeight":"1.55"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|60"}}}} -->
			<p class="has-accent-color has-text-color has-body-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--60);font-weight:400;line-height:1.55"><?php echo esc_html_x( 'Desde un sitio de una sola página hasta una estructura más completa, tu sitio web se construye alrededor de lo que tu negocio necesita.', 'Descripción del hero de Servicios.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"blockGap":"0"}}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"neutral-900","textColor":"neutral-100"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-neutral-100-color has-neutral-900-background-color has-text-color has-background wp-element-button" href="#packages"><?php echo esc_html_x( 'Ver paquetes', 'CTA del hero de Servicios.', 'vicunav' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
