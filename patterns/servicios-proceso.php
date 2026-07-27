<?php
/**
 * Title: Servicios — Nuestro proceso
 * Slug: vicunav/servicios-proceso
 * Categories: services, featured
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Proceso de Servicios desde el descubrimiento hasta el lanzamiento.
 *
 * @package Vicunav
 */

$steps = array(
	array( '01', 'process-discovery.webp', _x( 'Descubrimiento', 'Paso del proceso de Servicios.', 'vicunav' ), _x( 'Una conversación corta para entender tu negocio y confirmar que hay buena compatibilidad. Es sobre claridad, no sobre vender.', 'Descripción de paso.', 'vicunav' ), _x( 'Conversación inicial de descubrimiento', 'Texto alternativo del proceso.', 'vicunav' ) ),
	array( '02', 'process-content.webp', _x( 'Claridad de contenido', 'Paso del proceso de Servicios.', 'vicunav' ), _x( 'Preguntas guiadas para definir el mensaje de tu sitio de forma que refleje tu trabajo con precisión y naturalidad. Sin presión, sin sobreexposición.', 'Descripción de paso.', 'vicunav' ), _x( 'Preparación guiada del contenido del sitio', 'Texto alternativo del proceso.', 'vicunav' ) ),
	array( '03', 'process-build.webp', _x( 'Diseño y Desarrollo', 'Paso del proceso de Servicios.', 'vicunav' ), _x( 'Tu sitio se estructura y construye en WordPress. Diseño limpio y ejecución profesional detrás de escena.', 'Descripción de paso.', 'vicunav' ), _x( 'Diseño y desarrollo de un sitio en WordPress', 'Texto alternativo del proceso.', 'vicunav' ) ),
	array( '04', 'process-review.webp', _x( 'Revisión y ajustes', 'Paso del proceso de Servicios.', 'vicunav' ), _x( 'Dos rondas de revisión enfocadas. Un proceso estructurado que mantiene todo claro, colaborativo y en orden.', 'Descripción de paso.', 'vicunav' ), _x( 'Revisión colaborativa del sitio web', 'Texto alternativo del proceso.', 'vicunav' ) ),
	array( '05', 'process-launch.webp', _x( 'Lanzamiento', 'Paso del proceso de Servicios.', 'vicunav' ), _x( 'Una vez que todo está alineado, tu sitio sale en línea. Hosting y configuración técnica incluidos para que puedas avanzar con confianza.', 'Descripción de paso.', 'vicunav' ), _x( 'Sitio web preparado para su lanzamiento', 'Texto alternativo del proceso.', 'vicunav' ) ),
);

?>

<!-- wp:group {"templateLock":"contentOnly","tagName":"section","align":"full","backgroundColor":"neutral-800","textColor":"neutral-100","className":"vicunav-servicios-process is-style-surface-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|90","left":"var:preset|spacing|site-gutter"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-servicios-process is-style-surface-dark has-neutral-100-color has-neutral-800-background-color has-text-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--site-gutter)">
	<!-- wp:paragraph {"textColor":"neutral-100","fontFamily":"handwritten","fontSize":"accent-text","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}}}} -->
	<p class="has-neutral-100-color has-text-color has-handwritten-font-family has-accent-text-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30);font-weight:400;line-height:1"><?php echo esc_html_x( 'Nuestro proceso', 'Eyebrow del proceso de Servicios.', 'vicunav' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"level":2,"textColor":"neutral-100","fontFamily":"heading","fontSize":"heading-large","align":"wide","style":{"typography":{"fontWeight":"400","lineHeight":"1.08"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|70"}}}} -->
	<h2 class="wp-block-heading alignwide has-neutral-100-color has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--70);font-weight:400;line-height:1.08"><?php echo esc_html_x( 'Un proceso claro y acompañado, del inicio al lanzamiento', 'Título del proceso de Servicios.', 'vicunav' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"vicunav-servicios-process__columns"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center vicunav-servicios-process__columns">
		<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
			<!-- wp:group {"className":"vicunav-servicios-process__steps","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group vicunav-servicios-process__steps">
				<?php foreach ( $steps as $step ) : ?>
					<!-- wp:group {"className":"vicunav-servicios-process__step","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group vicunav-servicios-process__step" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-servicios-process__step-image"} -->
						<figure class="wp-block-image size-full vicunav-servicios-process__step-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/services/' . $step[1] ) ); ?>" alt="<?php echo esc_attr( $step[4] ); ?>"/></figure>
						<!-- /wp:image -->
						<!-- wp:paragraph {"textColor":"neutral-500","fontFamily":"heading","fontSize":"heading-medium","className":"vicunav-servicios-process__number","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
						<p class="vicunav-servicios-process__number has-neutral-500-color has-text-color has-heading-font-family has-heading-medium-font-size" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1"><?php echo esc_html( $step[0] ); ?></p>
						<!-- /wp:paragraph -->
						<!-- wp:group {"className":"vicunav-servicios-process__copy","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
						<div class="wp-block-group vicunav-servicios-process__copy">
							<!-- wp:heading {"level":3,"textColor":"neutral-100","fontFamily":"heading","fontSize":"heading-small","style":{"typography":{"fontWeight":"500","lineHeight":"1.15"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|20"}}}} -->
							<h3 class="wp-block-heading has-neutral-100-color has-text-color has-heading-font-family has-heading-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--20);font-weight:500;line-height:1.15"><?php echo esc_html( $step[2] ); ?></h3>
							<!-- /wp:heading -->
							<!-- wp:paragraph {"textColor":"neutral-200","style":{"typography":{"fontWeight":"400","lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
							<p class="has-neutral-200-color has-text-color" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.5"><?php echo esc_html( $step[3] ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"40%","className":"vicunav-servicios-process__overview"} -->
		<div class="wp-block-column is-vertically-aligned-center vicunav-servicios-process__overview" style="flex-basis:40%">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/services/process-overview.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Composición editorial del proceso de trabajo de Vicunav', 'Texto alternativo del proceso de Servicios.', 'vicunav' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
