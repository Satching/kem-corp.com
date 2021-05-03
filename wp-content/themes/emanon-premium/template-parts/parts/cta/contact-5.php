<?php
/**
 * Contact 6 TEL
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$phone_title      = get_theme_mod( 'phone_title' );
$phone_number     = get_theme_mod( 'phone_number' );
$phone_number_url = str_replace( array( '-', 'ー', '−', '―', '‐' ), '', $phone_number );
$office_hours     = get_theme_mod( 'office_hours' );
?>

<div class="u-row u-row-wrap wrapper-col">
	<div class="col-12">
		<?php if( $phone_title ): ?>
			<div class="contact__title"><?php echo wp_kses_post( $phone_title ); ?></div>
		<?php endif; ?>
		<?php if( $phone_number ): ?>
			<p class="contact__phone"><i class="icon-phone"></i><a href="tel:<?php echo ( $phone_number_url ); ?>"><?php echo esc_html( $phone_number ); ?></a></p>
		<?php endif; ?>
		<?php if( $office_hours ): ?>
			<div class="contact__hours"><?php echo wp_kses_post( $office_hours ); ?></div>
		<?php endif; ?>
	</div><!--/.col-12-->
</div><!--/ u-row-->