<?php
/**
 * Title: Los Resultados
 * Slug: vicunav/resultados
 * Categories: featured, text
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Resultado principal de trabajar con Vicunav.
 */
?>

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"neutral-100","className":"vicunav-resultados","style":{"spacing":{"padding":{"top":"var:preset|spacing|section-editorial","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|section-editorial","left":"var:preset|spacing|site-gutter"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-resultados has-neutral-100-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--section-editorial);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--section-editorial);padding-left:var(--wp--preset--spacing--site-gutter)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"vicunav-resultados__columns"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center vicunav-resultados__columns">
		<!-- wp:column {"verticalAlignment":"center","width":"46%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:46%">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-resultados__image"} -->
			<figure class="wp-block-image size-full vicunav-resultados__image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/resultados-vicunav.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Composición visual que representa los resultados de un sitio Vicunav', 'Texto alternativo de Resultados.', 'vicunav' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"54%","className":"vicunav-resultados__copy"} -->
		<div class="wp-block-column is-vertically-aligned-center vicunav-resultados__copy" style="flex-basis:54%">
			<!-- wp:paragraph {"textColor":"primary","fontFamily":"handwritten","fontSize":"eyebrow-display","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
			<p class="has-primary-color has-text-color has-handwritten-font-family has-eyebrow-display-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:400;line-height:1"><?php echo esc_html_x( 'Los Resultados', 'Eyebrow de Resultados.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"textColor":"neutral-800","fontFamily":"heading","fontSize":"section-title","style":{"typography":{"fontWeight":"300","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|60"}}}} -->
			<h2 class="wp-block-heading has-neutral-800-color has-text-color has-heading-font-family has-section-title-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--60);font-weight:300;line-height:1"><?php echo esc_html_x( 'Un Sitio Web del que', 'Primera línea del título de Resultados.', 'vicunav' ); ?><br><?php echo esc_html_x( 'Sientes Orgullo de Compartir', 'Segunda línea del título de Resultados.', 'vicunav' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-800","fontSize":"section-body","style":{"typography":{"fontWeight":"700","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|60"}}}} -->
			<p class="has-neutral-800-color has-text-color has-section-body-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--60);font-weight:700;line-height:1.6"><?php echo esc_html_x( 'Porque sabes que va a:', 'Introducción de Resultados.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"vicunav-resultados__list","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|40"},"typography":{"fontWeight":"700","lineHeight":"1"}},"fontSize":"body"} -->
			<ul style="margin-top:0;margin-bottom:0;font-weight:700;line-height:1" class="wp-block-list vicunav-resultados__list has-body-font-size">
				<!-- wp:list-item {"backgroundColor":"neutral-150","className":"vicunav-resultados__item vicunav-resultados__item--mirror","style":{"spacing":{"padding":{"top":"var:preset|spacing|45","right":"var:preset|spacing|45","bottom":"var:preset|spacing|45","left":"var:preset|spacing|45"}}}} --><li class="vicunav-resultados__item vicunav-resultados__item--mirror has-neutral-150-background-color has-background" style="padding-top:var(--wp--preset--spacing--45);padding-right:var(--wp--preset--spacing--45);padding-bottom:var(--wp--preset--spacing--45);padding-left:var(--wp--preset--spacing--45)"><?php echo esc_html_x( 'Reflejar tu trabajo con claridad y honestidad', 'Primer resultado.', 'vicunav' ); ?></li><!-- /wp:list-item -->
				<!-- wp:list-item {"backgroundColor":"neutral-200","className":"vicunav-resultados__item vicunav-resultados__item--people","style":{"spacing":{"padding":{"top":"var:preset|spacing|45","right":"var:preset|spacing|45","bottom":"var:preset|spacing|45","left":"var:preset|spacing|45"}}}} --><li class="vicunav-resultados__item vicunav-resultados__item--people has-neutral-200-background-color has-background" style="padding-top:var(--wp--preset--spacing--45);padding-right:var(--wp--preset--spacing--45);padding-bottom:var(--wp--preset--spacing--45);padding-left:var(--wp--preset--spacing--45)"><?php echo esc_html_x( 'Atraer a las personas correctas para tu negocio', 'Segundo resultado.', 'vicunav' ); ?></li><!-- /wp:list-item -->
				<!-- wp:list-item {"backgroundColor":"neutral-200","className":"vicunav-resultados__item vicunav-resultados__item--search","style":{"spacing":{"padding":{"top":"var:preset|spacing|45","right":"var:preset|spacing|45","bottom":"var:preset|spacing|45","left":"var:preset|spacing|45"}}}} --><li class="vicunav-resultados__item vicunav-resultados__item--search has-neutral-200-background-color has-background" style="padding-top:var(--wp--preset--spacing--45);padding-right:var(--wp--preset--spacing--45);padding-bottom:var(--wp--preset--spacing--45);padding-left:var(--wp--preset--spacing--45)"><?php echo esc_html_x( 'Aparecer cuando te buscan en Google y en sistemas de IA', 'Tercer resultado.', 'vicunav' ); ?></li><!-- /wp:list-item -->
				<!-- wp:list-item {"backgroundColor":"neutral-250","className":"vicunav-resultados__item vicunav-resultados__item--calendar","style":{"spacing":{"padding":{"top":"var:preset|spacing|45","right":"var:preset|spacing|45","bottom":"var:preset|spacing|45","left":"var:preset|spacing|45"}}}} --><li class="vicunav-resultados__item vicunav-resultados__item--calendar has-neutral-250-background-color has-background" style="padding-top:var(--wp--preset--spacing--45);padding-right:var(--wp--preset--spacing--45);padding-bottom:var(--wp--preset--spacing--45);padding-left:var(--wp--preset--spacing--45)"><?php echo esc_html_x( 'Permitir que tus clientes reserven directamente, sin pasos intermedios', 'Cuarto resultado.', 'vicunav' ); ?></li><!-- /wp:list-item -->
				<!-- wp:list-item {"backgroundColor":"neutral-300","className":"vicunav-resultados__item vicunav-resultados__item--tools","style":{"spacing":{"padding":{"top":"var:preset|spacing|45","right":"var:preset|spacing|45","bottom":"var:preset|spacing|45","left":"var:preset|spacing|45"}}}} --><li class="vicunav-resultados__item vicunav-resultados__item--tools has-neutral-300-background-color has-background" style="padding-top:var(--wp--preset--spacing--45);padding-right:var(--wp--preset--spacing--45);padding-bottom:var(--wp--preset--spacing--45);padding-left:var(--wp--preset--spacing--45)"><?php echo esc_html_x( 'Funcionar con las herramientas que ya usas o las que configuremos juntos', 'Quinto resultado.', 'vicunav' ); ?></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
