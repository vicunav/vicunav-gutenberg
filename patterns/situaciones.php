<?php
/**
 * Title: ¿Alguna de estas situaciones te describe?
 * Slug: vicunav/situaciones
 * Categories: featured, text
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Ocho situaciones frecuentes que Vicunav ayuda a resolver.
 *
 * @package Vicunav
 */

?>

<!-- wp:cover {"templateLock":"contentOnly","url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/situaciones-vicunav.webp' ) ); ?>","alt":"","dimRatio":60,"overlayColor":"neutral-100","isDark":false,"align":"full","className":"vicunav-situaciones","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|80","left":"var:preset|spacing|site-gutter"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-light vicunav-situaciones" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--site-gutter)"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/situaciones-vicunav.webp' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-neutral-100-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container">
	<!-- wp:heading {"textAlign":"center","level":2,"textColor":"neutral-900","fontFamily":"heading","fontSize":"heading-large","align":"wide","style":{"typography":{"fontWeight":"300","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|70"}}}} -->
	<h2 class="wp-block-heading alignwide has-text-align-center has-neutral-900-color has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--70);font-weight:300;line-height:1"><?php echo esc_html_x( '¿Alguna de estas situaciones te describe?', 'Título de la sección de situaciones.', 'vicunav' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","backgroundColor":"neutral-100","className":"vicunav-situaciones__card","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"},"blockGap":"0"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide vicunav-situaciones__card has-neutral-100-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
		<!-- wp:list {"className":"vicunav-situaciones__list","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"body-responsive"} -->
		<ul style="margin-top:0;margin-bottom:0" class="wp-block-list vicunav-situaciones__list has-body-responsive-font-size">
			<!-- wp:list-item --><li><?php echo esc_html_x( 'Tu sitio web no refleja la calidad real de tu trabajo. Se ve más genérico que lo que realmente ofreces.', 'Situación 1.', 'vicunav' ); ?></li><!-- /wp:list-item -->
			<!-- wp:list-item --><li><?php echo esc_html_x( 'Explicar tus servicios por escrito es más difícil de lo que parece. Nunca sabes bien qué decir ni cómo ordenarlo.', 'Situación 2.', 'vicunav' ); ?></li><!-- /wp:list-item -->
			<!-- wp:list-item --><li><?php echo esc_html_x( 'Tus clientes ideales no te encuentran en Google, y cuando alguien le pregunta a ChatGPT por alguien como tú, no apareces.', 'Situación 3.', 'vicunav' ); ?></li><!-- /wp:list-item -->
			<!-- wp:list-item --><li><?php echo esc_html_x( 'La parte técnica, el dominio, el hosting, las actualizaciones, te quita tiempo que deberías invertir en tu negocio.', 'Situación 4.', 'vicunav' ); ?></li><!-- /wp:list-item -->
			<!-- wp:list-item --><li><?php echo esc_html_x( 'La gente llega a tu sitio pero no te escribe. Algo los frena, y no sabes exactamente qué.', 'Situación 5.', 'vicunav' ); ?></li><!-- /wp:list-item -->
			<!-- wp:list-item --><li><?php echo esc_html_x( 'Quieres algo profesional y que genere confianza, pero que no suene corporativo ni desconectado de lo que haces.', 'Situación 6.', 'vicunav' ); ?></li><!-- /wp:list-item -->
			<!-- wp:list-item --><li><?php echo esc_html_x( 'Tus clientes aún tienen que llamarte o escribirte para agendar. No hay una forma clara de reservar desde tu sitio.', 'Situación 7.', 'vicunav' ); ?></li><!-- /wp:list-item -->
			<!-- wp:list-item --><li><?php echo esc_html_x( 'Usas demasiadas herramientas separadas para gestionar tu negocio y nada está conectado.', 'Situación 8.', 'vicunav' ); ?></li><!-- /wp:list-item -->
		</ul>
		<!-- /wp:list -->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->
