<?php
/**
 * Title: Testimonio destacado
 * Slug: vicunav/testimonio-destacado
 * Categories: testimonials, featured
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Testimonio destacado de TatiPilates.
 */
?>

<!-- wp:cover {"templateLock":"contentOnly","url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/testimonio-fondo.webp' ) ); ?>","alt":"","dimRatio":80,"overlayColor":"neutral-200","isDark":false,"align":"full","className":"vicunav-testimonio","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|80","left":"var:preset|spacing|site-gutter"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light vicunav-testimonio" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--site-gutter)"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/testimonio-fondo.webp' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-neutral-200-background-color has-background-dim-80 has-background-dim"></span><div class="wp-block-cover__inner-container">
	<!-- wp:paragraph {"align":"center","textColor":"primary","fontFamily":"handwritten","fontSize":"accent-text","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
	<p class="has-text-align-center has-primary-color has-text-color has-handwritten-font-family has-accent-text-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:400;line-height:1"><?php echo esc_html_x( 'Testimonio destacado', 'Eyebrow del testimonio.', 'vicunav' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:quote {"className":"vicunav-testimonio__quote"} -->
	<blockquote class="wp-block-quote vicunav-testimonio__quote">
		<!-- wp:paragraph {"align":"center","textColor":"primary","fontFamily":"heading","fontSize":"heading-large","style":{"typography":{"fontWeight":"300","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<p class="has-text-align-center has-primary-color has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:0;font-weight:300;line-height:1"><?php echo esc_html_x( 'TatiPilates maneja ahora todo su negocio desde un solo lugar', 'Cita principal del testimonio.', 'vicunav' ); ?></p>
		<!-- /wp:paragraph -->
	</blockquote>
	<!-- /wp:quote -->

	<!-- wp:group {"align":"wide","backgroundColor":"neutral-100","className":"vicunav-testimonio__card","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"},"blockGap":"0"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide vicunav-testimonio__card has-neutral-100-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
		<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-testimonio__avatar"} -->
		<figure class="wp-block-image size-full vicunav-testimonio__avatar"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/testimonio-tatiana.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Tatiana Diaz, fundadora de TatiPilates', 'Texto alternativo de la autora del testimonio.', 'vicunav' ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-testimonio__poster"} -->
		<figure class="wp-block-image size-full vicunav-testimonio__poster"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/testimonio-tatipilates.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'TatiPilates mostrando su plataforma de negocio', 'Texto alternativo del testimonio visual.', 'vicunav' ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"body","style":{"typography":{"fontWeight":"700"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<p class="has-text-align-center has-primary-color has-text-color has-body-font-size" style="margin-top:0;margin-bottom:0;font-weight:700">&#45; <?php echo esc_html_x( 'Tatiana Diaz, TatiPilates', 'Atribución del testimonio.', 'vicunav' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->
