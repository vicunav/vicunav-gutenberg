<?php
/**
 * Title: Hero
 * Slug: vicunav/hero
 * Categories: banner, featured
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Presentación principal del homepage de Vicunav.
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-vicunav.webp' ) ); ?>","alt":"","dimRatio":100,"gradient":"hero-readability","isDark":false,"align":"full","className":"vicunav-hero","style":{"dimensions":{"minHeight":"var(--wp--custom--hero--min-height)"},"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|hero-gutter","bottom":"var:preset|spacing|80","left":"var:preset|spacing|hero-gutter"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light vicunav-hero" style="min-height:var(--wp--custom--hero--min-height);margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--hero-gutter);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--hero-gutter)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient has-hero-readability-gradient-background"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-vicunav.webp' ) ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
	<!-- wp:group {"align":"wide","className":"vicunav-hero__content","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide vicunav-hero__content">
		<!-- wp:paragraph {"align":"center","textColor":"neutral-800","fontFamily":"handwritten","fontSize":"h5","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|50"}}}} -->
		<p class="has-text-align-center has-neutral-800-color has-text-color has-handwritten-font-family has-h-5-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--50);font-weight:400;line-height:1"><?php echo esc_html_x( 'Para profesionales independientes y negocios', 'Eyebrow del Hero.', 'vicunav' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-900","fontFamily":"heading","fontSize":"h1","className":"vicunav-hero__title","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|60"}}}} -->
		<h1 class="wp-block-heading has-text-align-center vicunav-hero__title has-neutral-900-color has-text-color has-heading-font-family has-h-1-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--60)"><?php echo wp_kses_post( _x( 'Tu <em>sitio web</em> es el <u>primer paso</u> que tus clientes dan <em>hacia ti</em>', 'Título principal del Hero.', 'vicunav' ) ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"text","fontFamily":"body","fontSize":"lead","className":"vicunav-hero__description","style":{"typography":{"letterSpacing":"var(--wp--custom--typography--tracking-wide)","lineHeight":"var(--wp--custom--typography--lead-line-height)"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|60"}}}} -->
		<p class="has-text-align-center vicunav-hero__description has-text-color has-body-font-family has-lead-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--60);letter-spacing:var(--wp--custom--typography--tracking-wide);line-height:var(--wp--custom--typography--lead-line-height)"><?php echo esc_html_x( 'Sitios web profesionales para profesionales independientes y negocios que ofrecen servicios. Diseñados para generar confianza, comunicar con claridad lo que haces, aparecer en Google y en sistemas de IA, recibir reservas en línea, y convertir visitantes en clientes.', 'Descripción del Hero.', 'vicunav' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"neutral-400","textColor":"text","fontFamily":"body","fontSize":"body","style":{"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-neutral-400-background-color has-background has-body-font-family has-body-font-size wp-element-button" href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" style="padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><?php echo esc_html_x( 'Ver servicios', 'Botón del Hero.', 'vicunav' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->
