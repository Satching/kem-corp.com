<?php
/**
 * Contact 10 Button［1］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$btn_title     = get_theme_mod( 'contact_btn_title_1' );
$btn_url       = get_theme_mod( 'contact_btn_url_1' );
$target_brank  = get_theme_mod( 'contact_btn_target_brank_1' );
$btn_text      = get_theme_mod( 'contact_btn_text_1' );
$btn_microcopy = get_theme_mod( 'contact_btn_microcopy_1' );
?>

<div class="u-row u-row-wrap wrapper-col">
	<div class="col-12">
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
	</div><!--/.col-12-->
</div><!--/ u-row-->