<?php
/**
 * Contact 7 TEL | Button［1］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$phone_title      = get_theme_mod( 'phone_title' );
$phone_number     = get_theme_mod( 'phone_number' );
$office_hours     = get_theme_mod( 'office_hours' );
$phone_number_url = str_replace( array( '-', 'ー', '−', '―', '‐' ), '', $phone_number );
$btn_title        = get_theme_mod( 'contact_btn_title_1' );
$btn_url          = get_theme_mod( 'contact_btn_url_1' );
$target_brank     = get_theme_mod( 'contact_btn_target_brank_1' );
$btn_text         = get_theme_mod( 'contact_btn_text_1' );
$btn_microcopy    = get_theme_mod( 'contact_btn_microcopy_1' );
?>

<div class="u-row u-row-wrap wrapper-col">
	<div class="col-6">
		<?php if( $phone_title ): ?>
			<div class="contact__title"><?php echo wp_kses_post( $phone_title ); ?></div>
		<?php endif; ?>
		<?php if( $phone_number ): ?>
			<p class="contact__phone"><i class="icon-phone"></i><a href="tel:<?php echo ( $phone_number_url ); ?>"><?php echo esc_html( $phone_number ); ?></a></p>
		<?php endif; ?>
		<?php if( $office_hours ): ?>
			<div class="contact__hours"><?php echo wp_kses_post( $office_hours ); ?></div>
		<?php endif; ?>
	</div><!--/.col-6-->
	<div class="col-6">
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
	</div><!--/.col-6-->
</div><!--/ u-rows-->