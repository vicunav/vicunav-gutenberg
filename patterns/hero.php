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

<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-vicunav.webp' ) ); ?>","alt":"","dimRatio":0,"overlayColor":"neutral-100","isUserOverlayColor":true,"isDark":false,"align":"full","className":"vicunav-hero","style":{"dimensions":{"minHeight":"clamp(35.663rem, 35.157rem + 2.16vw, 37.063rem)"},"spacing":{"padding":{"top":"clamp(var(--wp--preset--spacing--40), 2.352rem - 1.502vw, var(--wp--preset--spacing--60))","right":"var:preset|spacing|hero-gutter","bottom":"clamp(var(--wp--preset--spacing--60), 1.296rem + 3.005vw, var(--wp--preset--spacing--80))","left":"var:preset|spacing|hero-gutter"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light vicunav-hero" style="min-height:clamp(35.663rem, 35.157rem + 2.16vw, 37.063rem);margin-top:0;margin-bottom:0;padding-top:clamp(var(--wp--preset--spacing--40), 2.352rem - 1.502vw, var(--wp--preset--spacing--60));padding-right:var(--wp--preset--spacing--hero-gutter);padding-bottom:clamp(var(--wp--preset--spacing--60), 1.296rem + 3.005vw, var(--wp--preset--spacing--80));padding-left:var(--wp--preset--spacing--hero-gutter)"><span aria-hidden="true" class="wp-block-cover__background has-neutral-100-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero-vicunav.webp' ) ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
	<!-- wp:group {"align":"wide","className":"vicunav-hero__content","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide vicunav-hero__content">
		<!-- wp:paragraph {"align":"center","textColor":"neutral-800","fontFamily":"handwritten","fontSize":"h5","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|50"}}}} -->
		<p class="has-text-align-center has-neutral-800-color has-text-color has-handwritten-font-family has-h-5-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--50);font-weight:400;line-height:1"><?php echo esc_html_x( 'Para profesionales independientes y negocios', 'Eyebrow del Hero.', 'vicunav' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-900","fontFamily":"heading","className":"vicunav-hero__title","style":{"typography":{"fontSize":"clamp(2rem, 1.652rem + 1.484vw, var(--wp--preset--font-size--h-1))","fontWeight":"400","lineHeight":"clamp(2.4rem, 2.189rem + 0.901vw, 3rem)"},"spacing":{"margin":{"top":"0","bottom":"clamp(var(--wp--preset--spacing--60), 1.824rem + 0.751vw, 2.5rem)"}}}} -->
		<h1 class="wp-block-heading has-text-align-center vicunav-hero__title has-neutral-900-color has-text-color has-heading-font-family" style="margin-top:0;margin-bottom:clamp(var(--wp--preset--spacing--60), 1.824rem + 0.751vw, 2.5rem);font-size:clamp(2rem, 1.652rem + 1.484vw, var(--wp--preset--font-size--h-1));font-weight:400;line-height:clamp(2.4rem, 2.189rem + 0.901vw, 3rem)"><?php echo wp_kses_post( _x( 'Tu <em>sitio web</em> es el <u>primer paso</u> que tus clientes dan <em>hacia ti</em>', 'Título principal del Hero.', 'vicunav' ) ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"text","fontFamily":"body","className":"vicunav-hero__description","style":{"typography":{"fontSize":"clamp(0.875rem, 0.761rem + 0.488vw, var(--wp--preset--font-size--h-6))","fontWeight":"500","letterSpacing":"1px","lineHeight":"clamp(1.225rem, 0.988rem + 1.014vw, 1.9rem)"},"spacing":{"margin":{"top":"0","bottom":"clamp(var(--wp--preset--spacing--60), 1.824rem + 0.751vw, 2.5rem)"}}}} -->
		<p class="has-text-align-center vicunav-hero__description has-text-color has-body-font-family" style="margin-top:0;margin-bottom:clamp(var(--wp--preset--spacing--60), 1.824rem + 0.751vw, 2.5rem);font-size:clamp(0.875rem, 0.761rem + 0.488vw, var(--wp--preset--font-size--h-6));font-weight:500;letter-spacing:1px;line-height:clamp(1.225rem, 0.988rem + 1.014vw, 1.9rem)"><?php echo esc_html_x( 'Sitios web profesionales para profesionales independientes y negocios que ofrecen servicios. Diseñados para generar confianza, comunicar con claridad lo que haces, aparecer en Google y en sistemas de IA, recibir reservas en línea, y convertir visitantes en clientes.', 'Descripción del Hero.', 'vicunav' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"neutral-400","textColor":"text","fontFamily":"body","fontSize":"body","style":{"border":{"radius":"6px"},"typography":{"fontWeight":"500","textTransform":"none"},"spacing":{"padding":{"left":"clamp(var(--wp--preset--spacing--50), 2.5rem - 2vw, var(--wp--preset--spacing--60))","right":"clamp(var(--wp--preset--spacing--50), 2.5rem - 2vw, var(--wp--preset--spacing--60))"}}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-neutral-400-background-color has-background has-body-font-family has-body-font-size wp-element-button" href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" style="border-radius:6px;padding-right:clamp(var(--wp--preset--spacing--50), 2.5rem - 2vw, var(--wp--preset--spacing--60));padding-left:clamp(var(--wp--preset--spacing--50), 2.5rem - 2vw, var(--wp--preset--spacing--60));font-weight:500;text-transform:none"><?php echo esc_html_x( 'Ver servicios', 'Botón del Hero.', 'vicunav' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->
