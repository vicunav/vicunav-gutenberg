<?php
/**
 * Title: Servicios — Mantenimiento
 * Slug: vicunav/servicios-mantenimiento
 * Categories: services
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Plan mensual y prestaciones de cuidado continuo.
 *
 * @package Vicunav
 */

$maintenance_items = array(
	array( 'maintenance-hosting.webp', _x( 'Hosting administrado en WordPress', 'Prestación de mantenimiento.', 'vicunav' ) ),
	array( 'maintenance-security.webp', _x( 'Monitoreo de seguridad', 'Prestación de mantenimiento.', 'vicunav' ) ),
	array( 'maintenance-backups.webp', _x( 'Copias de seguridad regulares', 'Prestación de mantenimiento.', 'vicunav' ) ),
	array( 'maintenance-updates.webp', _x( 'Actualizaciones de WordPress', 'Prestación de mantenimiento.', 'vicunav' ) ),
	array( 'maintenance-uptime.webp', _x( 'Monitoreo de disponibilidad', 'Prestación de mantenimiento.', 'vicunav' ) ),
	array( 'maintenance-technical.webp', _x( 'Mantenimiento técnico', 'Prestación de mantenimiento.', 'vicunav' ) ),
	array( 'maintenance-adjustments.webp', _x( 'Ajustes pequeños de contenido', 'Prestación de mantenimiento.', 'vicunav' ) ),
	array( 'maintenance-reports.webp', _x( 'Reportes mensuales', 'Prestación de mantenimiento.', 'vicunav' ) ),
);

?>

<!-- wp:group {"templateLock":"contentOnly","tagName":"section","align":"full","backgroundColor":"neutral-200","className":"vicunav-servicios-maintenance is-style-surface-muted","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|80","left":"var:preset|spacing|site-gutter"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-servicios-maintenance is-style-surface-muted has-neutral-200-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--site-gutter)">
	<!-- wp:columns {"verticalAlignment":"bottom","align":"wide","className":"vicunav-servicios-maintenance__intro"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-bottom vicunav-servicios-maintenance__intro">
		<!-- wp:column {"verticalAlignment":"bottom","width":"58%"} -->
		<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:58%">
			<!-- wp:paragraph {"textColor":"primary","fontFamily":"handwritten","fontSize":"accent-text","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}}}} -->
			<p class="has-primary-color has-text-color has-handwritten-font-family has-accent-text-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30);font-weight:400;line-height:1"><?php echo esc_html_x( 'Después del lanzamiento', 'Eyebrow de mantenimiento.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":2,"textColor":"neutral-800","fontFamily":"heading","fontSize":"heading-large","style":{"typography":{"fontWeight":"400","lineHeight":"1.08"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
			<h2 class="wp-block-heading has-neutral-800-color has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:400;line-height:1.08"><?php echo esc_html_x( 'Cuidado continuo para tu Sitio Web', 'Título de mantenimiento.', 'vicunav' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"accent","style":{"typography":{"fontWeight":"400","lineHeight":"1.55"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-accent-color has-text-color" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.55"><?php echo esc_html_x( 'Una vez que tu sitio está en línea, el mantenimiento continuo asegura que todo siga funcionando bien. Tu sitio permanece seguro, actualizado y técnicamente estable para que puedas enfocarte en tu negocio en lugar de gestionar la tecnología detrás de él.', 'Descripción de mantenimiento.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"bottom","width":"42%","className":"vicunav-servicios-maintenance__plan","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-column is-vertically-aligned-bottom vicunav-servicios-maintenance__plan" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50);flex-basis:42%">
			<!-- wp:heading {"level":3,"textColor":"neutral-800","fontFamily":"heading","fontSize":"heading-small","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} --><h3 class="wp-block-heading has-neutral-800-color has-text-color has-heading-font-family has-heading-small-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Plan de Mantenimiento mensual', 'Nombre del plan de mantenimiento.', 'vicunav' ); ?></h3><!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"neutral-800","fontFamily":"heading","fontSize":"heading-medium","style":{"typography":{"fontWeight":"600","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} --><p class="has-neutral-800-color has-text-color has-heading-font-family has-heading-medium-font-size" style="margin-top:0;margin-bottom:0;font-weight:600;line-height:1"><?php echo esc_html_x( '$80 USD / mes', 'Precio del mantenimiento.', 'vicunav' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"textColor":"accent","style":{"typography":{"fontWeight":"400","lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} --><p class="has-accent-color has-text-color" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.5"><?php echo esc_html_x( 'Un plan simple que mantiene tu sitio seguro, actualizado y profesionalmente mantenido a lo largo del tiempo.', 'Descripción del plan de mantenimiento.', 'vicunav' ); ?></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"align":"wide","className":"vicunav-servicios-maintenance__grid","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide vicunav-servicios-maintenance__grid">
		<?php foreach ( $maintenance_items as $item ) : ?>
			<!-- wp:group {"className":"vicunav-servicios-maintenance__item","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group vicunav-servicios-maintenance__item" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-servicios-maintenance__icon"} -->
				<figure class="wp-block-image size-full vicunav-servicios-maintenance__icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/services/' . $item[0] ) ); ?>" alt=""/></figure>
				<!-- /wp:image -->
				<!-- wp:paragraph {"textColor":"neutral-800","style":{"typography":{"fontWeight":"600","lineHeight":"1.3"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p class="has-neutral-800-color has-text-color" style="margin-top:0;margin-bottom:0;font-weight:600;line-height:1.3"><?php echo esc_html( $item[1] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
