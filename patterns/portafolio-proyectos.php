<?php
/**
 * Title: Portafolio — Proyectos
 * Slug: vicunav/portafolio-proyectos
 * Categories: portfolio
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Grid de proyectos y resultados PageSpeed.
 *
 * @package Vicunav
 */

$projects = array(
	array(
		'title'       => _x( 'Bhoga Yoga', 'Nombre de proyecto de Portafolio.', 'vicunav' ),
		'description' => _x( 'A multi-section website designed to give Bhoga Yoga a clear and welcoming online presence, presenting its classes, instructors, studio philosophy, and practical information in a way that feels calm, organized, and easy to navigate. Built for a local yoga studio in San Carlos del Zulia, Venezuela, the project helps visitors understand the practice, connect with the space, and feel confident reaching out. This reflects the structure typically developed in an Essential Website package.', 'Descripción del proyecto Bhoga Yoga.', 'vicunav' ),
		'url'         => 'https://bhoga.yoga/',
		'image'       => 'bhoga-yoga.webp',
		'alt'         => _x( 'Vista del sitio web de Bhoga Yoga', 'Texto alternativo del proyecto Bhoga Yoga.', 'vicunav' ),
		'metrics'     => array(
			_x( '90+ Performance', 'Métrica PageSpeed.', 'vicunav' ),
			_x( '95+ Accessibility', 'Métrica PageSpeed.', 'vicunav' ),
			_x( '100 Best Practices', 'Métrica PageSpeed.', 'vicunav' ),
			_x( '100 SEO', 'Métrica PageSpeed.', 'vicunav' ),
		),
	),
	array(
		'title'       => _x( 'TatiPilates', 'Nombre de proyecto de Portafolio.', 'vicunav' ),
		'description' => _x( 'A complete website and custom WordPress system developed for Tati Pilates, combining a clear studio website with a private management platform for students, plans, schedules, bookings, attendance, payments, notifications, and weekly metrics. The project also includes an installable mobile PWA, built to simplify daily operations while keeping the experience organized, secure, and easy to use. This reflects the structure typically developed in a Complete Website package.', 'Descripción del proyecto TatiPilates.', 'vicunav' ),
		'url'         => 'https://tatipilates.com/',
		'image'       => 'tatipilates.webp',
		'alt'         => _x( 'Vista del sitio web de TatiPilates', 'Texto alternativo del proyecto TatiPilates.', 'vicunav' ),
		'metrics'     => array(
			_x( '92+ Performance', 'Métrica PageSpeed.', 'vicunav' ),
			_x( '94+ Accessibility', 'Métrica PageSpeed.', 'vicunav' ),
			_x( '100 Best Practices', 'Métrica PageSpeed.', 'vicunav' ),
			_x( '100 SEO', 'Métrica PageSpeed.', 'vicunav' ),
		),
	),
	array(
		'title'       => _x( 'Clearpath Therapy', 'Nombre de proyecto de Portafolio.', 'vicunav' ),
		'description' => _x( 'A one-page website designed to bring clarity to a therapy practice offering multiple areas of support, making it easier for visitors to understand the work and take the next step. This structure reflects what is typically included in the Essential Website Package.', 'Descripción del proyecto Clearpath Therapy.', 'vicunav' ),
		'url'         => 'https://therapy.staging.vicunav.com/',
		'image'       => 'clearpath-therapy.webp',
		'alt'         => _x( 'Vista del sitio web de Clearpath Therapy', 'Texto alternativo del proyecto Clearpath Therapy.', 'vicunav' ),
		'metrics'     => array(
			_x( '92+ Performance', 'Métrica PageSpeed.', 'vicunav' ),
			_x( '92+ Accessibility', 'Métrica PageSpeed.', 'vicunav' ),
			_x( '100 Best Practices', 'Métrica PageSpeed.', 'vicunav' ),
			_x( '100 SEO', 'Métrica PageSpeed.', 'vicunav' ),
		),
	),
	array(
		'title'       => _x( 'Eleanor Wilde', 'Nombre de proyecto de Portafolio.', 'vicunav' ),
		'description' => _x( 'A multi-page website designed to bring clarity to a personal practice that combines writing, mentorship, and thoughtful exploration, making it easier for visitors to understand both the work and the perspective behind it. This reflects the level of structure typically developed in the Complete Website Package.', 'Descripción del proyecto Eleanor Wilde.', 'vicunav' ),
		'url'         => 'https://editorial.staging.vicunav.com/',
		'image'       => 'eleanor-wilde.webp',
		'alt'         => _x( 'Vista del sitio web de Eleanor Wilde', 'Texto alternativo del proyecto Eleanor Wilde.', 'vicunav' ),
		'metrics'     => array(
			_x( '99+ Performance', 'Métrica PageSpeed.', 'vicunav' ),
			_x( '100 Accessibility', 'Métrica PageSpeed.', 'vicunav' ),
			_x( '100 Best Practices', 'Métrica PageSpeed.', 'vicunav' ),
			_x( '100 SEO', 'Métrica PageSpeed.', 'vicunav' ),
		),
	),
);

?>

<!-- wp:group {"templateLock":"contentOnly","tagName":"section","align":"full","backgroundColor":"neutral-300","className":"vicunav-portfolio-projects","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","right":"var:preset|spacing|site-gutter","bottom":"var:preset|spacing|80","left":"var:preset|spacing|site-gutter"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-portfolio-projects has-neutral-300-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--site-gutter);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--site-gutter)">
	<!-- wp:group {"align":"wide","className":"vicunav-portfolio-projects__grid","layout":{"type":"grid","columnCount":2,"minimumColumnWidth":null}} -->
	<div class="wp-block-group alignwide vicunav-portfolio-projects__grid">
		<?php foreach ( $projects as $project ) : ?>
			<!-- wp:group {"className":"vicunav-portfolio-card","backgroundColor":"neutral-200","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group vicunav-portfolio-card has-neutral-200-background-color has-background">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"vicunav-portfolio-card__image"} -->
				<figure class="wp-block-image size-full vicunav-portfolio-card__image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/portfolio/' . $project['image'] ) ); ?>" alt="<?php echo esc_attr( $project['alt'] ); ?>"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"className":"vicunav-portfolio-card__content","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|60","bottom":"var:preset|spacing|50","left":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default"}} -->
				<div class="wp-block-group vicunav-portfolio-card__content" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--60)">
					<!-- wp:group {"className":"vicunav-portfolio-card__summary","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default"}} -->
					<div class="wp-block-group vicunav-portfolio-card__summary">
						<!-- wp:heading {"level":2,"textColor":"neutral-800","fontFamily":"heading","fontSize":"heading-small","style":{"typography":{"fontWeight":"500","lineHeight":"1.2"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
						<h2 class="wp-block-heading has-neutral-800-color has-text-color has-heading-font-family has-heading-small-font-size" style="margin-top:0;margin-bottom:0;font-weight:500;line-height:1.2"><?php echo esc_html( $project['title'] ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"textColor":"accent","fontFamily":"body","fontSize":"body","style":{"typography":{"fontWeight":"400","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
						<p class="has-accent-color has-text-color has-body-font-family has-body-font-size" style="margin-top:0;margin-bottom:0;font-weight:400;line-height:1.6"><?php echo esc_html( $project['description'] ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"textColor":"text","fontFamily":"body","fontSize":"body","className":"vicunav-portfolio-card__link","style":{"typography":{"fontWeight":"500","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
					<p class="vicunav-portfolio-card__link has-text-color has-body-font-family has-body-font-size" style="margin-top:0;margin-bottom:0;font-weight:500;line-height:1.6"><a href="<?php echo esc_url( $project['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html_x( 'Visit website project', 'Enlace de proyecto de Portafolio.', 'vicunav' ); ?></a></p>
					<!-- /wp:paragraph -->

					<!-- wp:separator {"backgroundColor":"neutral-400","className":"vicunav-portfolio-card__divider"} -->
					<hr class="wp-block-separator has-text-color has-neutral-400-color has-alpha-channel-opacity has-neutral-400-background-color has-background vicunav-portfolio-card__divider"/>
					<!-- /wp:separator -->

					<!-- wp:heading {"level":3,"textColor":"primary","fontFamily":"body","fontSize":"body","style":{"typography":{"fontWeight":"700","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
					<h3 class="wp-block-heading has-primary-color has-text-color has-body-font-family has-body-font-size" style="margin-top:0;margin-bottom:0;font-weight:700;line-height:1.6"><?php echo esc_html_x( 'Google Pagespeed results', 'Título de métricas de Portafolio.', 'vicunav' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:list {"className":"vicunav-portfolio-card__metrics","textColor":"text","fontFamily":"body","fontSize":"eyebrow","style":{"typography":{"fontWeight":"500","lineHeight":"1.6"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"left":"0"}}}} -->
					<ul class="vicunav-portfolio-card__metrics has-text-color has-body-font-family has-eyebrow-font-size" style="margin-top:0;margin-bottom:0;padding-left:0;font-weight:500;line-height:1.6">
						<?php foreach ( $project['metrics'] as $metric ) : ?>
							<!-- wp:list-item -->
							<li><?php echo esc_html( $metric ); ?></li>
							<!-- /wp:list-item -->
						<?php endforeach; ?>
					</ul>
					<!-- /wp:list -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
