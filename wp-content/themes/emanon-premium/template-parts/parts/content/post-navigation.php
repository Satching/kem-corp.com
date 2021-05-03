<?php
/**
 * Post Navigation
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$display_featured_image = get_theme_mod( 'display_featured_image_pre_nex' );
if( $display_featured_image ) {
	$class_image = ' has_thumbnail';
} else {
	$class_image = '';
}
?>

<aside class="post-next-previous<?php echo esc_attr( $class_image ); ?>">
	<?php the_post_navigation( array(
		'next_text' => '<div class="label-next">' . __( '次の記事', 'emanon-premium' ) . '<i class="icon-chevron-right"></i></div><div class="post-nav"><span class="nav-title">%title</span></div>',
		'prev_text' => '<div class="label-previous"><i class="icon-chevron-left"></i>' . __( '前の記事', 'emanon-premium' ) . '</div><div class="post-nav"><span class="nav-title">%title</span></div>',
		'in_same_term' => 'true',
	));?>
</aside>
