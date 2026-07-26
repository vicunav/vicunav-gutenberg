<?php
/**
 * Title: Cómo ayudamos
 * Slug: vicunav/como-ayudamos
 * Categories: featured, services
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Proceso acompañado de Vicunav en seis pasos.
 */
?>

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"neutral-100","className":"vicunav-proceso","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|80","left":"var:preset|spacing|site-gutter"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-proceso has-neutral-100-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--site-gutter)">
	<!-- wp:paragraph {"align":"center","textColor":"primary","fontFamily":"handwritten","fontSize":"accent-text","style":{"typography":{"fontWeight":"400","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
	<p class="has-text-align-center has-primary-color has-text-color has-handwritten-font-family has-accent-text-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:400;line-height:1"><?php echo esc_html_x( 'Así funciona', 'Eyebrow de la sección de proceso.', 'vicunav' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":2,"textColor":"primary","fontFamily":"heading","fontSize":"heading-large","align":"wide","style":{"typography":{"fontWeight":"300","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|80"}}}} -->
	<h2 class="wp-block-heading alignwide has-text-align-center has-primary-color has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--80);font-weight:300;line-height:1"><?php echo esc_html_x( 'Tu Sitio Web, Completamente Acompañado', 'Título de la sección de proceso.', 'vicunav' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","className":"vicunav-proceso__grid","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"var:preset|spacing|70"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide vicunav-proceso__grid" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--70)">
		<!-- wp:group {"className":"vicunav-proceso__step","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group vicunav-proceso__step">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-proceso__image"} -->
			<figure class="wp-block-image size-full vicunav-proceso__image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/proceso-textos.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Material de escritura para preparar los textos del sitio', 'Texto alternativo del paso 1.', 'vicunav' ); ?>"/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"textColor":"primary","fontFamily":"heading","fontSize":"heading-medium","className":"vicunav-proceso__number","style":{"typography":{"fontWeight":"400","lineHeight":"1"}}} -->
			<p class="vicunav-proceso__number has-primary-color has-text-color has-heading-font-family has-heading-medium-font-size" style="font-weight:400;line-height:1"><?php echo esc_html_x( '01', 'Número del paso 1.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:group {"className":"vicunav-proceso__content","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group vicunav-proceso__content">
				<!-- wp:heading {"level":3,"textColor":"primary","fontFamily":"heading","fontSize":"heading-small","style":{"typography":{"fontWeight":"500","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-heading-font-family has-heading-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:500;line-height:1"><?php echo esc_html_x( 'Tus textos, listos', 'Título del paso 1.', 'vicunav' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"textColor":"accent","fontSize":"body-responsive","style":{"typography":{"fontWeight":"400","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p class="has-accent-color has-text-color has-body-responsive-font-size" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.6"><?php echo esc_html_x( 'Ponemos en palabras lo que haces para que nunca te enfrentes a una página en blanco. El copy suena auténtico y explica con claridad cómo ayudas.', 'Descripción del paso 1.', 'vicunav' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"vicunav-proceso__step","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group vicunav-proceso__step">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-proceso__image"} -->
			<figure class="wp-block-image size-full vicunav-proceso__image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/proceso-visual.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Muestras de color y tipografía para definir la dirección visual', 'Texto alternativo del paso 2.', 'vicunav' ); ?>"/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"textColor":"primary","fontFamily":"heading","fontSize":"heading-medium","className":"vicunav-proceso__number","style":{"typography":{"fontWeight":"400","lineHeight":"1"}}} -->
			<p class="vicunav-proceso__number has-primary-color has-text-color has-heading-font-family has-heading-medium-font-size" style="font-weight:400;line-height:1"><?php echo esc_html_x( '02', 'Número del paso 2.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:group {"className":"vicunav-proceso__content","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group vicunav-proceso__content">
				<!-- wp:heading {"level":3,"textColor":"primary","fontFamily":"heading","fontSize":"heading-small","style":{"typography":{"fontWeight":"500","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-heading-font-family has-heading-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:500;line-height:1"><?php echo esc_html_x( 'La dirección visual de tu sitio', 'Título del paso 2.', 'vicunav' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"textColor":"accent","fontSize":"body-responsive","style":{"typography":{"fontWeight":"400","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p class="has-accent-color has-text-color has-body-responsive-font-size" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.6"><?php echo esc_html_x( 'Definimos juntos la estética: colores, tipografía y estructura. Profesional, coherente y fiel a tu negocio desde el inicio.', 'Descripción del paso 2.', 'vicunav' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"vicunav-proceso__step","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group vicunav-proceso__step">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-proceso__image"} -->
			<figure class="wp-block-image size-full vicunav-proceso__image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/proceso-desarrollo.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Diseño de un sitio web en una computadora', 'Texto alternativo del paso 3.', 'vicunav' ); ?>"/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"textColor":"primary","fontFamily":"heading","fontSize":"heading-medium","className":"vicunav-proceso__number","style":{"typography":{"fontWeight":"400","lineHeight":"1"}}} -->
			<p class="vicunav-proceso__number has-primary-color has-text-color has-heading-font-family has-heading-medium-font-size" style="font-weight:400;line-height:1"><?php echo esc_html_x( '03', 'Número del paso 3.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:group {"className":"vicunav-proceso__content","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group vicunav-proceso__content">
				<!-- wp:heading {"level":3,"textColor":"primary","fontFamily":"heading","fontSize":"heading-small","style":{"typography":{"fontWeight":"500","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-heading-font-family has-heading-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:500;line-height:1"><?php echo esc_html_x( 'Tu sitio, diseñado y desarrollado', 'Título del paso 3.', 'vicunav' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"textColor":"accent","fontSize":"body-responsive","style":{"typography":{"fontWeight":"400","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p class="has-accent-color has-text-color has-body-responsive-font-size" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.6"><?php echo esc_html_x( 'Construimos tu sitio en WordPress. Estable, rápido, fácil de navegar, y optimizado para aparecer en Google y en sistemas de IA.', 'Descripción del paso 3.', 'vicunav' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"vicunav-proceso__step","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group vicunav-proceso__step">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-proceso__image"} -->
			<figure class="wp-block-image size-full vicunav-proceso__image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/proceso-encontrado.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Resultados de búsqueda que representan un sitio fácil de encontrar', 'Texto alternativo del paso 4.', 'vicunav' ); ?>"/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"textColor":"primary","fontFamily":"heading","fontSize":"heading-medium","className":"vicunav-proceso__number","style":{"typography":{"fontWeight":"400","lineHeight":"1"}}} -->
			<p class="vicunav-proceso__number has-primary-color has-text-color has-heading-font-family has-heading-medium-font-size" style="font-weight:400;line-height:1"><?php echo esc_html_x( '04', 'Número del paso 4.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:group {"className":"vicunav-proceso__content","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group vicunav-proceso__content">
				<!-- wp:heading {"level":3,"textColor":"primary","fontFamily":"heading","fontSize":"heading-small","style":{"typography":{"fontWeight":"500","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-heading-font-family has-heading-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:500;line-height:1"><?php echo esc_html_x( 'Tu sitio, listo para ser encontrado', 'Título del paso 4.', 'vicunav' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"textColor":"accent","fontSize":"body-responsive","style":{"typography":{"fontWeight":"400","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p class="has-accent-color has-text-color has-body-responsive-font-size" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.6"><?php echo esc_html_x( 'Tu sitio sale estructurado para que Google y los sistemas de IA entiendan qué haces, a quién ayudas y dónde estás. Sin trucos, con claridad.', 'Descripción del paso 4.', 'vicunav' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"vicunav-proceso__step","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group vicunav-proceso__step">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-proceso__image"} -->
			<figure class="wp-block-image size-full vicunav-proceso__image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/proceso-herramientas.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Calendario y herramientas conectadas al sitio web', 'Texto alternativo del paso 5.', 'vicunav' ); ?>"/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"textColor":"primary","fontFamily":"heading","fontSize":"heading-medium","className":"vicunav-proceso__number","style":{"typography":{"fontWeight":"400","lineHeight":"1"}}} -->
			<p class="vicunav-proceso__number has-primary-color has-text-color has-heading-font-family has-heading-medium-font-size" style="font-weight:400;line-height:1"><?php echo esc_html_x( '05', 'Número del paso 5.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:group {"className":"vicunav-proceso__content","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group vicunav-proceso__content">
				<!-- wp:heading {"level":3,"textColor":"primary","fontFamily":"heading","fontSize":"heading-small","style":{"typography":{"fontWeight":"500","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-heading-font-family has-heading-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:500;line-height:1"><?php echo esc_html_x( 'Tus herramientas, configuradas', 'Título del paso 5.', 'vicunav' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"textColor":"accent","fontSize":"body-responsive","style":{"typography":{"fontWeight":"400","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p class="has-accent-color has-text-color has-body-responsive-font-size" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.6"><?php echo esc_html_x( 'Sistema de reservas, formularios de contacto, o las herramientas que tu negocio necesite, configuradas para que todo funcione desde el primer día.', 'Descripción del paso 5.', 'vicunav' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"vicunav-proceso__step","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group vicunav-proceso__step">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-proceso__image"} -->
			<figure class="wp-block-image size-full vicunav-proceso__image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/proceso-soporte.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Asistencia para mantener el sitio después del lanzamiento', 'Texto alternativo del paso 6.', 'vicunav' ); ?>"/></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"textColor":"primary","fontFamily":"heading","fontSize":"heading-medium","className":"vicunav-proceso__number","style":{"typography":{"fontWeight":"400","lineHeight":"1"}}} -->
			<p class="vicunav-proceso__number has-primary-color has-text-color has-heading-font-family has-heading-medium-font-size" style="font-weight:400;line-height:1"><?php echo esc_html_x( '06', 'Número del paso 6.', 'vicunav' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:group {"className":"vicunav-proceso__content","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group vicunav-proceso__content">
				<!-- wp:heading {"level":3,"textColor":"primary","fontFamily":"heading","fontSize":"heading-small","style":{"typography":{"fontWeight":"500","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}}} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-heading-font-family has-heading-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);font-weight:500;line-height:1"><?php echo esc_html_x( 'Soporte cuando lo necesitas', 'Título del paso 6.', 'vicunav' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"textColor":"accent","fontSize":"body-responsive","style":{"typography":{"fontWeight":"400","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p class="has-accent-color has-text-color has-body-responsive-font-size" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.6"><?php echo esc_html_x( 'Si necesitas cambiar algo después, no estás solo. Podemos ayudarte con ajustes y actualizaciones a medida que tu negocio crece.', 'Descripción del paso 6.', 'vicunav' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"neutral-400","textColor":"text","fontFamily":"body","fontSize":"body","style":{"spacing":{"padding":{"left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-neutral-400-background-color has-text-color has-background has-body-font-family has-body-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" style="padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><?php echo esc_html_x( 'Ver paquetes', 'Botón de la sección de proceso.', 'vicunav' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</section>
<!-- /wp:group -->
