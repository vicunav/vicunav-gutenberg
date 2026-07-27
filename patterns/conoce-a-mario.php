<?php
/**
 * Title: Conoce a Mario
 * Slug: vicunav/conoce-a-mario
 * Categories: about, featured
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Presentación de Mario Vicuña y el origen de Vicunav.
 *
 * @package Vicunav
 */

?>

<!-- wp:group {"templateLock":"contentOnly","tagName":"section","align":"full","backgroundColor":"neutral-100","className":"vicunav-conoce-mario is-style-surface-light","style":{"spacing":{"padding":{"top":"var:preset|spacing|section-editorial","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|section-editorial","left":"var:preset|spacing|site-gutter"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-conoce-mario is-style-surface-light has-neutral-100-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--section-editorial);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--section-editorial);padding-left:var(--wp--preset--spacing--site-gutter)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"vicunav-conoce-mario__columns"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center vicunav-conoce-mario__columns">
		<!-- wp:column {"verticalAlignment":"center","width":"54%","className":"vicunav-conoce-mario__copy"} -->
		<div class="wp-block-column is-vertically-aligned-center vicunav-conoce-mario__copy" style="flex-basis:54%">
			<!-- wp:paragraph {"textColor":"primary","fontFamily":"handwritten","fontSize":"accent-text","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|20"}}}} -->
			<p class="has-primary-color has-text-color has-handwritten-font-family has-accent-text-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--20);font-weight:400;line-height:1"><?php echo esc_html_x( 'Conoce a Mario', 'Eyebrow de la biografía.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"textColor":"neutral-800","fontFamily":"heading","fontSize":"heading-large","style":{"typography":{"fontWeight":"300","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|50"}}}} -->
			<h2 class="wp-block-heading has-neutral-800-color has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--50);font-weight:300;line-height:1"><?php echo esc_html_x( 'Construyendo sitios', 'Primera línea del título de la biografía.', 'vicunav' ); ?><br><?php echo esc_html_x( 'web desde 2016', 'Segunda línea del título de la biografía.', 'vicunav' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-800","fontSize":"body-responsive","style":{"typography":{"fontWeight":"500"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|20"}}}} -->
			<p class="has-neutral-800-color has-text-color has-body-responsive-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--20);font-weight:500"><?php echo esc_html_x( 'Haciendo el proceso simple, del inicio al lanzamiento', 'Subtítulo de la biografía.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"className":"vicunav-conoce-mario__bio","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group vicunav-conoce-mario__bio">
				<!-- wp:paragraph {"textColor":"text","fontSize":"body","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p class="has-text-color has-body-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Hola, soy Mario. Llevo más de nueve años diseñando y desarrollando sitios web para negocios y profesionales de servicios. Con el tiempo entendí algo que se repite mucho: hay profesionales muy buenos en lo que hacen que son casi invisibles en internet. No porque su trabajo no valga, sino porque su presencia digital no los representa bien.', 'Primer párrafo de la biografía.', 'vicunav' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"text","fontSize":"body","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p class="has-text-color has-body-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Eso fue lo que me llevó a crear Vicunav. Un estudio enfocado en diseñar sitios web claros y profesionales para coaches, consultores, terapeutas, formadores y cualquier profesional cuyo negocio se basa en el servicio que ofrece. Sin marketing agresivo, sin diseños genéricos, sin que tengas que resolverlo todo solo.', 'Segundo párrafo de la biografía.', 'vicunav' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"text","fontSize":"body","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p class="has-text-color has-body-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Si tu trabajo importa, tu sitio web debería reflejarlo. Y las personas correctas deberían poder encontrarte, tanto en Google como cuando le preguntan a una IA.', 'Tercer párrafo de la biografía.', 'vicunav' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"46%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:46%">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-conoce-mario__image"} -->
			<figure class="wp-block-image size-full vicunav-conoce-mario__image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/mario-vicuna.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Mario Vicuña, diseñador y desarrollador de Vicunav', 'Texto alternativo del retrato de Mario.', 'vicunav' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
