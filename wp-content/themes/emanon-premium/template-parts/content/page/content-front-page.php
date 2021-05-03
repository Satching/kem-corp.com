<?php
/**
 * Template part for displaying content in front-page.php.
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$sp_col              = get_theme_mod( 'front_page_list_layout_sp', 'sp-list' );
if ( 'sp-card-2' === $sp_col ) {
	$class_sp_col = ' has-sp-card-2';
} else {
	$class_sp_col = '';
}
$article_style       = get_theme_mod( 'front_page_article_style', 'latest_article' );;
$ad_in_feed          = get_theme_mod( 'display_ad_in_feed_front_page' );
$ad_in_feed_position = get_theme_mod( 'ad_in_feed_position' );
$ad_in_feed_num      = '0';
$ad_in_feed_count    = '1';
$paged               = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$tab_titles = array (
	'tab_title_1' => get_theme_mod( 'tab_title_1', '' ),
	'tab_title_2' => get_theme_mod( 'tab_title_2', '' ),
	'tab_title_3' => get_theme_mod( 'tab_title_3', '' ),
	'tab_title_4' => get_theme_mod( 'tab_title_4', '' ),
	'tab_title_5' => get_theme_mod( 'tab_title_5', '' ),
	'tab_title_6' => get_theme_mod( 'tab_title_6', '' ),
);
?>

<main class="l-content__main">

<?php if ( 'latest_article' === $article_style ): ?>

	<?php
	$arg = array (
		'post_type'    => 'post',
		'order'        => 'DESC',
		'orderby'      => 'post_date',
		'paged'        => $paged,
	);
	$post_query   = new WP_Query( $arg );
	?>
	<div class="u-row u-row-wrap wrapper-col<?php echo esc_attr( $class_sp_col ); ?>">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php
		if( $ad_in_feed && isset( $ad_in_feed_position[$ad_in_feed_num] ) && $ad_in_feed_position[$ad_in_feed_num] == $ad_in_feed_count ) {
			get_template_part( 'template-parts/parts/ad/ad-in-feed' );
			$ad_in_feed_num++; $ad_in_feed_count++;
		}
			get_template_part( 'template-parts/parts/archive-list/archive-list' );
			$ad_in_feed_count++;
	?>
	<?php endwhile; endif; ?>
	</div><!--/.u-rowd u-row-wrap wrapper-col-->
	<?php if ( is_front_page() && is_home() && $post_query->max_num_pages > 1 ) : ?>
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
	<?php endif; ?>

<?php elseif ( 'tab' === $article_style ): ?>

	<div class="tab-area">
		<?php $c = 1; ?>
		<?php foreach ( $tab_titles as $tab_title ):?>
		<?php if( $tab_title ): ?>
		<div class="js-tab-nav<?php if ( $c === 1 ) { echo ' is-active'; } ?> js-ripple"><?php echo wp_kses_post( $tab_title ) ; ?></div>
		<?php $c++; ?>
		<?php endif; ?>
		<?php endforeach; ?>
	</div><!--/.tab-area-->
	<?php for( $c=1; $c<7; $c++ ) {
		$tab_style    = get_theme_mod( 'tab_style_'.$c );
		$tab_cat_id   = get_theme_mod( 'tab_cat_id_'.$c );
		$tab_cat      = 'category'=== $tab_style ? $tab_cat_id : false;
		$featured     = 'featured'=== $tab_style ? 'emanon_featured_entry' : false;
		$args = array (
			'post_type'     => 'post',
			'order'         => 'DESC',
			'orderby'       => 'post_date',
			'meta_key'      => $featured,
			'meta_value'    => 1,
			'cat'           => $tab_cat,
			'no_found_rows' => true,
		);
		$tab_query    = new WP_Query( $args );
	?>
	<div class="js-tab-panel tab-panel<?php if ( $c === 1 ) { echo ' is-show'; } ?>">
		<div class="u-row u-row-wrap wrapper-col<?php echo esc_attr( $class_sp_col ); ?>">
		<?php while ( $tab_query->have_posts() ) : $tab_query->the_post(); ?>
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
		<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
	<?php } ?>

<?php endif; ?>

</main><!--/.l-content__main-->