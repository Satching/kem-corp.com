<?php
/**
 * Ad related under
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$hide_ad = post_custom( 'emanon_hide_ad');
if ( $hide_ad ) {
	return;
}
$ad_related    = get_theme_mod( 'display_ad_related_article' );
$ad_related_dr = get_theme_mod( 'display_ad_related_article_dr_' . DEVICE );
if ( 'display_ad' == $ad_related ) {
	$ad_code = get_theme_mod( 'display_ad_code' );
} elseif ( 'link_ad' === $ad_related ) {
	$ad_code = get_theme_mod( 'link_ad_code' );
} else {
	$ad_code = '';
}

if ( $ad_code ) {
	if ( $ad_related_dr ) {
		$ad_box = sprintf( '<div class="col-6 left-rectangle">' . $ad_code . '</div><div class="col-6 right-rectangle">' . $ad_code . '</div>' );
	} else {
		$ad_box = $ad_code;
	}
} else {
	$ad_box = '';
}
$label    = get_theme_mod( 'ad_label' );
?>
<?php if ( $ad_box): ?>
	<aside class="ad-related-under">
		<?php if ( $label ): ?>
		<span class="ad-label"><?php echo $label; ?></span>
		<?php endif; ?>
		<div class="u-row u-row-wrap wrapper-col">
			<?php echo $ad_box; ?>
		</div>
	</aside>
<?php endif; ?>