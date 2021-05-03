<?php
/**
 * Archive list for loop
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

if ( is_front_page() ) {
	$pc_layout = get_theme_mod( 'front_page_layout', 'two-r-col' );
	$sp_col    = get_theme_mod( 'front_page_list_layout_sp', 'sp-lis' );
	$pc_col    = get_theme_mod( 'front_page_list_layout_pc', 'pc-list' );
} elseif ( is_home() ) {
	$pc_layout = get_theme_mod( 'home_page_layout', 'two-r-col' );
	$sp_col    = get_theme_mod( 'home_page_list_layout_sp', 'sp-list' );
	$pc_col    = get_theme_mod( 'home_page_list_layout_pc', 'pc-list' );
} elseif ( is_archive() ) {
	$pc_layout = get_theme_mod( 'archive_page_layout', 'two-r-col' );
	$sp_col    = get_theme_mod( 'archive_page_list_layout_sp', 'sp-list' );
	$pc_col    = get_theme_mod( 'archive_page_list_layout_pc', 'pc-list' );
} elseif ( is_search() ) {
	$pc_layout = get_theme_mod( 'search_page_layout', 'two-r-col' );
	$sp_col    = get_theme_mod( 'search_page_list_layout_sp', 'sp-list' );
	$pc_col    = get_theme_mod( 'search_page_list_layout_pc', 'pc-list' );
} elseif ( is_404() ) {
	$pc_layout = get_theme_mod( 'not_found_page_layout', 'two-r-col' );
} else {
	$pc_layout = get_theme_mod( 'front_page_layout', 'two-r-col' );
	$sp_col    = get_theme_mod( 'front_page_list_layout_sp', 'sp-lis' );
	$pc_col    = get_theme_mod( 'front_page_list_layout_pc', 'pc-list' );
}
$home_title = get_theme_mod( 'home_title', __( '記事一覧', 'emanon-premium' ) );
if ( is_home() && $home_title && 'page' === get_option( 'show_on_front' ) ) {
	$h_tag = 'h3';
} else {
	$h_tag = 'h2';
}
$featured_image            = get_theme_mod( 'display_featured_image' );
$featured_no_image_600_338 = get_theme_mod( 'featured_no_image_600_338' );
if ( empty( $featured_no_image_600_338 ) ) {
	$no_image = T_DIRE_URI . '/assets/images/no-img/600_338.png';
} else {
	$no_image = esc_url( $featured_no_image_600_338 );
}
if ( is_mobile() && 'sp-list' === $sp_col && $featured_image ) {
	$title_limit   = 28;
} elseif ( is_mobile() && 'sp-list' === $sp_col ) {
	$title_limit   = 64;
} elseif ( is_mobile() ) {
	$title_limit   = 78;
} elseif ( 'pc-list' === $pc_col && $featured_image ) {
	$title_limit   = 70;
	$content_limit = 40;
} elseif ( 'pc-list' === $pc_col ) {
	$title_limit   = 74;
	$content_limit = 74;
} else {
	$title_limit   = 88;
	$content_limit = 32;
}
?>

<article class="<?php echo esc_attr( $sp_col ); ?> <?php echo esc_attr( $pc_col ); ?> archive-list u-shadow-hover<?php if ( $featured_image ) { ?> has-thumbnail<?php } ?>">
	<a href="<?php the_permalink() ?>">
	<?php if ( has_post_thumbnail() && $featured_image ): ?>
	<div class="post-thumbnail">
		<img src="<?php echo get_the_post_thumbnail_url( $post->ID, '600_338' ); ?>" alt="<?php echo $post-> post_title; ?>">
	</div>
	<?php elseif( $featured_image ): ?>
	<div class="post-thumbnail">
		<img src="<?php echo $no_image; ?>" alt="no image">
	</div>
	<?php endif; ?>
	<div class="article-info">
		<?php emanon_entry_category(); ?>
		<<?php echo esc_attr( $h_tag ); ?> class="article-title"><?php
			if( is_sticky() ) {
				echo '<span class="sticky-info"><i class="icon-star-full"></i></span>';
			}
			if ( post_password_required() ) {
				echo '<i class="icon-lock"></i>';
			}
			echo wp_trim_words( get_the_title(), $title_limit, '...' );
		?></<?php echo esc_attr( $h_tag ); ?>>
		<?php if( ! is_mobile() && 'pc-list' === $pc_col && ! $featured_image ) :?>
		<p class="article-excerpt"><?php
			if ( has_excerpt( $post->ID ) ) {
				// 手動抜粋の表示
				echo mb_substr( get_the_excerpt(), 0, $content_limit ) . '&#133;';
			} else {
				// コンテンツ抜粋の表示
				echo mb_substr( strip_tags ( apply_filters ( 'the_content', $post->post_content ) ), 0, $content_limit ) . '&#133;';
			}
		?></p>
		<?php endif; ?>
		<?php emanon_entry_meta(); ?>
	</div><!--/.article-info-->
	</a>
</article>