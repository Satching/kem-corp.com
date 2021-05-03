<?php
/**
 * CTA News Letter
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$cta_edit_id = post_custom( 'emanon_cta_newsletter_id' );
$post_type   = get_post_type();
if ( 'post' === $post_type ) {
	$cta_setting_id = get_theme_mod( 'display_cta_newsletter_post' );
} elseif ( 'page' === $post_type ) {
	$cta_setting_id = get_theme_mod( 'display_cta_newsletter_page' );
}

if ( $cta_edit_id ) {
	$cta_id = $cta_edit_id;
} elseif ( empty( $cta_edit_id ) && '0' !== $cta_edit_id ) {
	$cta_id = $cta_setting_id;
} elseif ( '0' === $cta_edit_id ) {
	$cta_id = '';
}

if ( ! $cta_id ) {
	return;
}

$title                = get_post_meta( $cta_id, 'cta_newsletter_title', true );
$microcopy            = get_post_meta( $cta_id, 'cta_newsletter_microcopy', true );
$microcopy_layout     = get_post_meta( $cta_id, 'cta_newsletter_microcopy_layout', true );
if ( empty( $microcopy_layout ) ) { $microcopy_layout = 'under_button'; }
$privacy_policy       = get_post_meta( $cta_id, 'cta_privacy_policy', true );
if ( empty( $privacy_policy ) ) { $privacy_policy = __( 'プライバシーポリシーについて', 'emanon-premium' ); }
$privacy_policy_url   = get_post_meta( $cta_id, 'cta_newsletter_privacy_policy_url', true );
$form_action          = get_post_meta( $cta_id, 'cta_newsletter_form_action', true );
$input_hidden         = get_post_meta( $cta_id, 'cta_newsletter_input_hidden', true );
$input_from           = get_post_meta( $cta_id, 'cta_newsletter_input_from', true );
$input_submit         = get_post_meta( $cta_id, 'cta_newsletter_input_submit', true );
$shortcode            = get_post_meta( $cta_id, 'cta_newsletter_shortcode', true );
$active_bg_color      = get_post_meta( $cta_id, 'cta_newsletter_active_background_color', true );
$bg_color             = get_post_meta( $cta_id, 'cta_newsletter_background_color', true );
$title_color          = get_post_meta( $cta_id, 'cta_newsletter_title_color', true );
$microcopy_color      = get_post_meta( $cta_id, 'cta_newsletter_microcopy_color', true );
$privacy_policy_color = get_post_meta( $cta_id, 'cta_newsletter_privacy_policy_color', true );
if ( empty( $bg_color ) ) { $bg_color = '#eeeff0'; }
if ( empty( $title_color ) ) { $title_color = '#333333'; }
if ( empty( $microcopy_color ) ) { $microcopy_color = '#333333'; }
if ( empty( $privacy_policy_color ) ) { $privacy_policy_color = '#007bbb'; }
?>

<aside class="newsletter" <?php if ( $active_bg_color ) { ?> style="background-color:<?php echo $bg_color; ?>;"<?php } ?>>
	<div class="newsletter__inner">
	<?php echo $form_action; ?>
	<?php echo $input_hidden; ?>
	<?php if( $title ): ?>
	<h3 class="newsletter__title" style="color:<?php echo $title_color; ?>;"><?php echo wp_kses_post( $title ); ?></h3>
	<?php endif; ?>
	<?php if ( $microcopy && 'on_button' === $microcopy_layout ): ?>
	<div class="newsletter__microcopy" style="color:<?php echo $microcopy_color; ?>;">
		<?php echo nl2br( wp_kses_post( $microcopy ) ); ?>
	</div><!--.newsletter__microcopy-->
	<?php endif; ?>
	<div class="newsletter__mail">
	<?php echo $input_from; ?>
	<?php echo $input_submit; ?>
	<?php echo do_shortcode( $shortcode ) ?>
	</div><!--.newsletter__mail-->
	<?php if( $form_action ): ?>
	</form>
	<?php endif; ?>
	<?php if ( $microcopy && 'under_button' === $microcopy_layout ): ?>
	<div class="newsletter__microcopy" style="color:<?php echo $microcopy_color; ?>";>
		<?php echo nl2br( wp_kses_post( $microcopy ) ); ?>
	</div><!--.newsletter__microcopy-->
	<?php endif; ?>
	<?php if ( $privacy_policy_url ): ?>
	<div class="newsletter__privacy">
		<a href="<?php echo esc_url( $privacy_policy_url ); ?>" style="color:<?php echo $privacy_policy_color; ?>";><?php echo wp_kses_post( $privacy_policy ); ?></a>
	</div><!--.newsletter__microcopy-->
	<?php endif; ?>
	</div><!--.newsletter__inner-->
</aside><!--.newsletter-->