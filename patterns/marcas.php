<?php
/**
 * Title: Marcas con las que he trabajado
 * Slug: vicunav/marcas
 * Categories: featured, gallery
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Selección de cinco marcas con las que ha trabajado Vicunav.
 *
 * @package Vicunav
 */

?>

<!-- wp:group {"templateLock":"contentOnly","tagName":"section","align":"full","backgroundColor":"neutral-800","className":"vicunav-marcas is-style-surface-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|70","left":"var:preset|spacing|site-gutter"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-marcas is-style-surface-dark has-neutral-800-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--site-gutter)">
	<!-- wp:heading {"textAlign":"center","level":2,"textColor":"neutral-100","fontFamily":"accent-serif","fontSize":"heading-small","style":{"typography":{"fontWeight":"500","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|60"}}}} -->
	<h2 class="wp-block-heading has-text-align-center has-neutral-100-color has-text-color has-accent-serif-font-family has-heading-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--60);font-weight:500;line-height:1"><?php echo esc_html_x( 'Marcas con las que he trabajado', 'Título de la sección de marcas.', 'vicunav' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","className":"vicunav-marcas__grid","style":{"spacing":{"blockGap":"var:preset|spacing|80"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide vicunav-marcas__grid">
		<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-marcas__logo"} -->
		<figure class="wp-block-image size-full vicunav-marcas__logo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/marca-clearpath.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Clearpath Therapy', 'Nombre de marca.', 'vicunav' ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-marcas__logo"} -->
		<figure class="wp-block-image size-full vicunav-marcas__logo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/marca-tatipilates.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'TatiPilates', 'Nombre de marca.', 'vicunav' ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-marcas__logo"} -->
		<figure class="wp-block-image size-full vicunav-marcas__logo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/marca-redstage.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Redstage', 'Nombre de marca.', 'vicunav' ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-marcas__logo"} -->
		<figure class="wp-block-image size-full vicunav-marcas__logo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/marca-quiet-path.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Quiet Path Wellness', 'Nombre de marca.', 'vicunav' ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-marcas__logo"} -->
		<figure class="wp-block-image size-full vicunav-marcas__logo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/marca-eleanor.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'eleanor.', 'Nombre de marca.', 'vicunav' ); ?>"/></figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
