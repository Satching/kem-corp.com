<?php
/**
 * The template for footer widget
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
$heading_design = get_theme_mod( 'footer_heading_design', 'footer-none-style' );
$heading_align  = get_theme_mod( 'footer_heading_align', 'footer-left' );
$layout         = get_theme_mod( 'footer_widget_layout', 'footer_three_col' );
if ( 'footer_three_col' === $layout ) {
	$tag = 'col-4';
} else {
	$tag = 'col-3';
}
?>

<?php if( is_mobile() && is_active_sidebar( 'footer-w-sp' ) ) :?>
<aside class="footer-widget <?php echo( $heading_align ); ?> <?php echo( $heading_design ); ?>">
	<div class="l-content">
		<?php dynamic_sidebar( 'footer-widget-sp' ); ?>
	</div><!--/.l-content-->
</aside><!--/.sidebar-footer-->
<?php else:?>
	<?php if ( is_active_sidebar( 'footer-widget-left' ) || is_active_sidebar( 'footer-widget-center' ) || is_active_sidebar( 'footer-widget-center-2' ) || is_active_sidebar( 'footer-widget-right' ) ): ?>
		<aside class="footer-widget <?php echo( $heading_align ); ?> <?php echo( $heading_design ); ?>">
			<div class="l-content">
				<div class="u-row u-row-wrap wrapper-col">
					<div class="<?php echo esc_attr( $tag ); ?>">
						<?php dynamic_sidebar( 'footer-widget-left' ); ?>
					</div>
					<div class="<?php echo esc_attr( $tag ); ?>">
						<?php dynamic_sidebar( 'footer-widget-center' ); ?>
					</div>
					<?php if ( 'footer_four_col' === $layout ): ?>
					<div class="<?php echo esc_attr( $tag ); ?>">
						<?php dynamic_sidebar( 'footer-widget-center-2' ); ?>
					</div>
					<?php endif; ?>
					<div class="<?php echo esc_attr( $tag ); ?>">
						<?php dynamic_sidebar( 'footer-widget-right' ); ?>
					</div>
				</div><!--/.u-row-->
			</div><!--/.l-content-->
		</aside><!--/.footer-widget-->
		<?php endif; ?>
<?php endif; ?>