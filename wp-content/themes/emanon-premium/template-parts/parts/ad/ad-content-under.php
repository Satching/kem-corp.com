<?php
/**
 * Ad content
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$hide_ad = post_custom( 'emanon_hide_ad');
if ( $hide_ad ) {
	return;
}

if ( 'post' == get_post_type() ) {
	$post_type = 'post';
} elseif ( 'page' == get_post_type() ) {
	$post_type = 'page';
}
$ad_content    = get_theme_mod( 'display_ad_content_' . $post_type );
$ad_content_dr = get_theme_mod( 'display_ad_content_dr_' . $post_type . '_' . DEVICE );
if ( 'display_ad' == $ad_content ) {
	$ad_code = get_theme_mod( 'display_ad_code' );
} elseif ( 'link_ad' === $ad_content ) {
	$ad_code = get_theme_mod( 'link_ad_code' );
} else {
	$ad_code = '';
}
if ( $ad_code ) {
	if ( $ad_content_dr ) {
		$ad_box   = sprintf( '<div class="col-6 left-rectangle">' . $ad_code . '</div><div class="col-6 right-rectangle">' . $ad_code . '</div>' );
		$class_ad = 'u-row u-row-wrap wrapper-col';
	} else {
		$ad_box   = $ad_code;
		$class_ad = '';
	}
} else {
	$ad_box = '';
}
$label    = get_theme_mod( 'ad_label' );
?>
<?php if ( $ad_box): ?>
	<aside class="ad-content">
		<?php if ( $label ): ?>
		<span class="ad-label"><?php echo $label; ?></span>
		<?php endif; ?>
		<div class="<?php echo $class_ad; ?>">
			<?php echo $ad_box; ?>
		</div>
	</aside>
<?php endif; ?>