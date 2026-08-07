<?php
/**
 * Title: Contacto — Formulario
 * Slug: vicunav/contacto-formulario
 * Categories: featured, contact
 * Block Types: core/post-content
 * Viewport Width: 1440
 * Description: Introducción, formulario y expectativas de respuesta de Contacto.
 *
 * @package Vicunav
 */

$is_english_contact = str_starts_with( get_locale(), 'en_' );
$contact_form_title = $is_english_contact ? 'Vicunav - Contact EN' : 'Vicunav — Contacto ES';
$contact_form_id    = $is_english_contact ? 'vicunav-contact-form-en' : 'vicunav-contact-form';
$contact_form       = vicunav_has_contact_form_dependency()
	? wpcf7_get_contact_form_by_title( $contact_form_title )
	: null;

?>

<!-- wp:group {"templateLock":"contentOnly","tagName":"section","align":"full","className":"vicunav-contact","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull vicunav-contact" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">
	<!-- wp:group {"align":"wide","backgroundColor":"neutral-200","className":"vicunav-contact__surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|70","bottom":"var:preset|spacing|60","left":"var:preset|spacing|70"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide vicunav-contact__surface has-neutral-200-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--70)">
		<!-- wp:paragraph {"align":"center","textColor":"primary","fontFamily":"handwritten","fontSize":"accent-text","style":{"typography":{"fontWeight":"400","letterSpacing":"calc(var(--wp--custom--typography--tracking-wide) * 2)","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|50"}}}} -->
		<p class="has-text-align-center has-primary-color has-text-color has-handwritten-font-family has-accent-text-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--50);font-weight:400;letter-spacing:calc(var(--wp--custom--typography--tracking-wide) * 2);line-height:1"><?php echo esc_html_x( 'Comencemos', 'Eyebrow de Contacto.', 'vicunav' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-900","fontFamily":"heading","fontSize":"heading-large","style":{"typography":{"fontWeight":"300","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|50"}}}} -->
		<h1 class="wp-block-heading has-text-align-center has-neutral-900-color has-text-color has-heading-font-family has-heading-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--50);font-weight:300;line-height:1"><?php echo wp_kses_post( _x( 'El primer paso es <em>simple</em>', 'Título principal de Contacto.', 'vicunav' ) ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"accent","fontFamily":"body","fontSize":"body-large","style":{"typography":{"fontWeight":"500","lineHeight":"1.3"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|65"}}}} -->
		<p class="has-text-align-center has-accent-color has-text-color has-body-font-family has-body-large-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--65);font-weight:500;line-height:1.3"><?php echo esc_html_x( 'Este formulario corto nos ayuda a entender dónde estás, y cómo orientarte mejor a partir de ahí.', 'Introducción del formulario de Contacto.', 'vicunav' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"align":"wide","backgroundColor":"neutral-100","className":"vicunav-contact__form-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|65","right":"var:preset|spacing|65","bottom":"var:preset|spacing|50","left":"var:preset|spacing|65"},"blockGap":"0"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group alignwide vicunav-contact__form-card has-neutral-100-background-color has-background" style="padding-top:var(--wp--preset--spacing--65);padding-right:var(--wp--preset--spacing--65);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--65)">
			<?php if ( $contact_form ) : ?>
				<?php
				$contact_form_shortcode = sprintf(
					'[contact-form-7 id="%1$s" title="%2$s" html_id="%3$s" html_title="%4$s" html_class="%5$s"]',
					sanitize_key( $contact_form->hash() ),
					sanitize_text_field( $contact_form_title ),
					$contact_form_id,
					sanitize_text_field( __( 'Formulario para comenzar un proyecto con Vicunav', 'vicunav' ) ),
					'vicunav-contact-form'
				);
				?>
				<!-- wp:shortcode -->
				<?php echo $contact_form_shortcode; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Shortcode compuesto con valores sanitizados. ?>
				<!-- /wp:shortcode -->
			<?php else : ?>
				<!-- wp:paragraph {"align":"center","textColor":"text","fontFamily":"body","fontSize":"body"} -->
				<p class="has-text-align-center has-text-color has-body-font-family has-body-font-size"><?php echo wp_kses_post( __( 'El formulario no está disponible temporalmente. Escríbenos a <a href="mailto:hello@vicunav.com">hello@vicunav.com</a>.', 'vicunav' ) ); ?></p>
				<!-- /wp:paragraph -->
			<?php endif; ?>
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"backgroundColor":"neutral-100","className":"vicunav-contact__after","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"padding":{"top":"var:preset|spacing|65","right":"var:preset|spacing|65","bottom":"var:preset|spacing|65","left":"var:preset|spacing|65"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group vicunav-contact__after has-neutral-100-background-color has-background" style="margin-top:var(--wp--preset--spacing--40);padding-top:var(--wp--preset--spacing--65);padding-right:var(--wp--preset--spacing--65);padding-bottom:var(--wp--preset--spacing--65);padding-left:var(--wp--preset--spacing--65)">
			<!-- wp:heading {"textAlign":"center","level":2,"textColor":"neutral-900","fontFamily":"heading","fontSize":"heading-medium","style":{"typography":{"fontWeight":"300","lineHeight":"1"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<h2 class="wp-block-heading has-text-align-center has-neutral-900-color has-text-color has-heading-font-family has-heading-medium-font-size" style="margin-top:0;margin-bottom:0;font-weight:300;line-height:1"><?php echo esc_html_x( 'Qué pasa después', 'Título posterior al formulario.', 'vicunav' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:list {"className":"vicunav-contact__after-list","textColor":"text","fontFamily":"body","fontSize":"body-large","style":{"typography":{"fontWeight":"400","lineHeight":"1.6"},"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"0"}}}} -->
			<ul class="vicunav-contact__after-list has-text-color has-body-font-family has-body-large-font-size" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:0;font-weight:400;line-height:1.6">
				<!-- wp:list-item --><li><?php echo esc_html_x( 'Revisamos tu mensaje personalmente', 'Expectativa de Contacto.', 'vicunav' ); ?></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><?php echo esc_html_x( 'Respondemos dentro de 1 a 2 días hábiles', 'Expectativa de Contacto.', 'vicunav' ); ?></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
