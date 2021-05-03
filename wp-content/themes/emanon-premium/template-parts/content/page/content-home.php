<?php
/**
 * Template part for displaying content in home.php case:Your homepage displays: A static page (Posts page).
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$sp_col              = get_theme_mod( 'home_page_list_layout_sp', 'sp-list' );
if ( 'sp-card-2' === $sp_col ) {
	$class_sp_col = ' has-sp-card-2';
} else {
	$class_sp_col = '';
}
$header_style        = get_theme_mod( 'home_header_style', 'home_header_standard' );
$share               = get_theme_mod( 'display_share_home', '');
$ad_in_feed          = get_theme_mod( 'display_ad_in_feed_home' );
$ad_in_feed_position = get_theme_mod( 'ad_in_feed_position' );
$ad_in_feed_num      = '0';
$ad_in_feed_count    = '1';
$paged               = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$arg = array (
	'post_type'    => 'post',
	'order'        => 'DESC',
	'orderby'      => 'post_date',
	'meta_value'   => 1,
	'paged'        => $paged,
);
$post_query   = new WP_Query( $arg );
?>

<?php
	if ( ! is_paged() && 'home_header_standard' === $header_style ||  ! is_paged() && 'home_header_full_width' === $header_style ) {
		get_template_part( 'template-parts/parts/featured-image/home/home-header-standard' );
	} elseif ( ! is_paged() && 'home_header_center' === $header_style ) {
		get_template_part( 'template-parts/parts/featured-image/home/home-header-center' );
	}
	if ( $share ) {
		get_template_part( 'template-parts/parts/sns/sns-share' );
	}
?>
<div class="u-row u-row-wrap wrapper-col<?php echo esc_attr( $class_sp_col ); ?>">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php
		if( $ad_in_feed && isset( $ad_in_feed_position[$ad_in_feed_num] ) && $ad_in_feed_position[$ad_in_feed_num] == $ad_in_feed_count ) {
			get_template_part( 'template-parts/parts/ad/ad-in-feed' );
			$ad_in_feed_num++; $ad_in_feed_count++;
		}
	?>
	<?php
		get_template_part( 'template-parts/parts/archive-list/archive-list' );
		$ad_in_feed_count++;
	?>
<?php endwhile; endif; ?>
</div>

<?php if ( $post_query->max_num_pages > 1 ) {
	$big = 999999999; // need an unlikely integer
	echo '<nav class="navigation pagination" role="navigation"><div class="nav-links">' . "\n";
	echo paginate_links( array (
		'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'    => '?paged=%#%',
		'current'   => max( 1, get_query_var('paged') ),
		'mid_size'  => 1,
		'total'     => $post_query->max_num_pages,
		'prev_text' => __( '前へ', 'emanon-premium' ),
		'next_text' => __( '次へ', 'emanon-premium' ),
	));
	echo '</div></nav>' . "\n";
	wp_reset_postdata();
	}
?>
