<?php
/**
 * Contact Button［1］ | Button［2］ | Button［3］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

?>

<?php for( $c=1; $c<4; $c++ ) {
	$btn_title     = get_theme_mod( 'contact_btn_title_'.$c );
	$btn_url       = get_theme_mod( 'contact_btn_url_'.$c );
	$target_brank  = get_theme_mod( 'contact_btn_target_brank_'.$c );
	$btn_text      = get_theme_mod( 'contact_btn_text_'.$c );
	$btn_microcopy = get_theme_mod( 'contact_btn_microcopy_'.$c );
?>
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
<?php } ?>