<?php
/**
 * Contact 7 TEL | Button［1］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$phone_title   = get_theme_mod( 'phone_title' );
$phone_number  = get_theme_mod( 'phone_number' );
$office_hours  = get_theme_mod( 'office_hours' );
$btn_title     = get_theme_mod( 'contact_btn_title_1' );
$btn_url       = get_theme_mod( 'contact_btn_url_1' );
$target_brank  = get_theme_mod( 'contact_btn_target_brank_1' );
$btn_text      = get_theme_mod( 'contact_btn_text_1' );
$btn_microcopy = get_theme_mod( 'contact_btn_microcopy_1' );
?>

<?php if( $phone_title ): ?>
<div class="contact__title"><?php echo wp_kses_post( $phone_title ); ?></div>
<?php endif; ?>
<?php if( $phone_number ): ?>
<p class="contact__phone"><i class="icon-phone"></i><?php echo esc_html( $phone_number ); ?></p>
<?php endif; ?>
<?php if( $office_hours ): ?>
<div class="contact__hours"><?php echo wp_kses_post( $office_hours ); ?></div>
<?php endif; ?>
<?php if ( $btn_title || $btn_text || $btn_microcopy ): ?>
<div class="contact__btn">
	<?php if ( $btn_title ): ?>
	<div class="contact__title"><?php echo wp_kses_post( $btn_title ); ?></div>
	<?php endif; ?>
	<?php if ( $btn_text ): ?>
	<a class="c-btn c-btn__main" href="<?php echo esc_url( $btn_url ); ?>" <?php if ( $target_brank ) { echo ' target="_blank" rel="noopener"'; } ?>><?php echo esc_html( $btn_text ); ?></a>
	<?php endif; ?>
	<?php if ( $btn_microcopy ): ?>
	<div class="contact__microcopy">
		<p><?php echo nl2br( wp_kses_post( $btn_microcopy ) ); ?></p>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
