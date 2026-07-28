<?php
/**
 * Title: Servicios — Incluido en cada proyecto
 * Slug: vicunav/servicios-beneficios
 * Categories: services, featured
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Ocho fundamentos incluidos en cada sitio web de Vicunav.
 *
 * @package Vicunav
 */

$benefits = array(
	array( 'benefit-design.webp', _x( 'Diseño personalizado y coherencia de marca', 'Beneficio de Servicios.', 'vicunav' ), _x( 'Diseñado para reflejar el tono y la profesionalidad de tu negocio, con una estructura clara, calmada y profesional.', 'Descripción de beneficio.', 'vicunav' ), _x( 'Mesa de trabajo para definir una identidad visual', 'Texto alternativo de beneficio.', 'vicunav' ) ),
	array( 'benefit-copy.webp', _x( 'Orientación de Copy y Contenido', 'Beneficio de Servicios.', 'vicunav' ), _x( 'Guiamos el mensaje de tu sitio para que los visitantes entiendan rápidamente tu trabajo y cómo puedes ayudarles.', 'Descripción de beneficio.', 'vicunav' ), _x( 'Materiales de escritura para preparar el contenido', 'Texto alternativo de beneficio.', 'vicunav' ) ),
	array( 'benefit-mobile.webp', _x( 'Experiencia optimizada para móvil', 'Beneficio de Servicios.', 'vicunav' ), _x( 'Tu sitio se diseña y prueba para que se vea bien, sea fácil de leer y de navegar en teléfonos, tablets y computadoras.', 'Descripción de beneficio.', 'vicunav' ), _x( 'Sitio web presentado en un teléfono móvil', 'Texto alternativo de beneficio.', 'vicunav' ) ),
	array( 'benefit-search-ai.webp', _x( 'Optimización para Buscadores e IA', 'Beneficio de Servicios.', 'vicunav' ), _x( 'Tu sitio se estructura para que Google y los sistemas de IA modernos puedan entender claramente tu trabajo y tus servicios.', 'Descripción de beneficio.', 'vicunav' ), _x( 'Composición visual sobre búsqueda y sistemas de IA', 'Texto alternativo de beneficio.', 'vicunav' ) ),
	array( 'benefit-performance.webp', _x( 'Optimización de rendimiento', 'Beneficio de Servicios.', 'vicunav' ), _x( 'Imágenes, scripts y estructura de página optimizados para que tu sitio cargue rápido y funcione sin problemas.', 'Descripción de beneficio.', 'vicunav' ), _x( 'Medición visual del rendimiento de un sitio web', 'Texto alternativo de beneficio.', 'vicunav' ) ),
	array( 'benefit-security.webp', _x( 'Seguridad, copias de seguridad y protección técnica', 'Beneficio de Servicios.', 'vicunav' ), _x( 'Protección de seguridad, filtro de spam y copias de seguridad externas para mantener tu sitio estable y protegido.', 'Descripción de beneficio.', 'vicunav' ), _x( 'Representación de seguridad y protección técnica', 'Texto alternativo de beneficio.', 'vicunav' ) ),
	array( 'benefit-wordpress.webp', _x( 'Base profesional en WordPress', 'Beneficio de Servicios.', 'vicunav' ), _x( 'Tu sitio se construye en WordPress con un constructor de páginas moderno, lo que facilita cualquier actualización futura.', 'Descripción de beneficio.', 'vicunav' ), _x( 'Espacio de trabajo profesional con WordPress', 'Texto alternativo de beneficio.', 'vicunav' ) ),
	array( 'benefit-walkthrough.webp', _x( 'Recorrido y orientación post-lanzamiento', 'Beneficio de Servicios.', 'vicunav' ), _x( 'Después del lanzamiento recibes un recorrido por tu sitio para que te sientas cómodo haciendo actualizaciones cuando las necesites.', 'Descripción de beneficio.', 'vicunav' ), _x( 'Sesión de orientación para gestionar un sitio web', 'Texto alternativo de beneficio.', 'vicunav' ) ),
);

?>

<!-- wp:group {"templateLock":"contentOnly","tagName":"section","align":"full","backgroundColor":"neutral-100","className":"vicunav-servicios-benefits is-style-surface-light","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|90","left":"var:preset|spacing|site-gutter"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-servicios-benefits is-style-surface-light has-neutral-100-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--site-gutter)">
	<!-- wp:paragraph {"align":"center","textColor":"primary","fontFamily":"handwritten","fontSize":"accent-text","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}}}} -->
	<p class="has-text-align-center has-primary-color has-text-color has-handwritten-font-family has-accent-text-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30);font-weight:400;line-height:1"><?php echo esc_html_x( 'Incluido en cada proyecto', 'Eyebrow de beneficios de Servicios.', 'vicunav' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"textAlign":"center","level":2,"textColor":"neutral-800","fontFamily":"heading","fontSize":"heading-large","align":"wide","style":{"typography":{"fontWeight":"400","lineHeight":"1.08"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
	<h2 class="wp-block-heading alignwide has-text-align-center has-neutral-800-color has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:400;line-height:1.08"><?php echo esc_html_x( 'Lo que Incluye cada Sitio Web de Vicunav', 'Título de beneficios de Servicios.', 'vicunav' ); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","textColor":"accent","fontSize":"body-large","align":"wide","style":{"typography":{"fontWeight":"400","lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|70"}}}} -->
	<p class="alignwide has-text-align-center has-accent-color has-text-color has-body-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--70);font-weight:400;line-height:1.5"><?php echo esc_html_x( 'Cada proyecto de Vicunav incluye las bases esenciales para tener un sitio seguro, confiable y fácil de mantener.', 'Introducción de beneficios de Servicios.', 'vicunav' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","className":"vicunav-servicios-benefits__grid","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide vicunav-servicios-benefits__grid">
		<?php foreach ( $benefits as $benefit ) : ?>
			<!-- wp:group {"className":"vicunav-servicios-benefits__card","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40"},"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group vicunav-servicios-benefits__card" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-servicios-benefits__image"} -->
				<figure class="wp-block-image size-full vicunav-servicios-benefits__image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/services/' . $benefit[0] ) ); ?>" alt="<?php echo esc_attr( $benefit[3] ); ?>"/></figure>
				<!-- /wp:image -->
				<!-- wp:heading {"level":3,"textColor":"neutral-800","fontFamily":"heading","fontSize":"heading-small","style":{"typography":{"fontWeight":"600","lineHeight":"1.15"},"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|30"}}}} -->
				<h3 class="wp-block-heading has-neutral-800-color has-text-color has-heading-font-family has-heading-small-font-size" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--30);font-weight:600;line-height:1.15"><?php echo esc_html( $benefit[1] ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"textColor":"accent","style":{"typography":{"fontWeight":"400","lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p class="has-accent-color has-text-color" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.5"><?php echo esc_html( $benefit[2] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
