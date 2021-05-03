<?php
/**
 *  matched content Ad
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$hide_ad = post_custom( 'emanon_hide_ad');
if ( $hide_ad ) {
	return;
}
$ad_code = get_theme_mod( 'matched_content_ad_code' );
if ( $ad_code ) {
	$ad_box = sprintf( '<aside class="ad-matched-content">' . $ad_code . '</aside>' );
}
?>

<?php echo $ad_box; ?>