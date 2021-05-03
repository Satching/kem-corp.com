<?php
/**
 * Archive news list for loop
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$pc_layout = get_theme_mod( 'archive_news_layout', 'two-r-col' );
$sp_col    = get_theme_mod( 'archive_news_list_layout_sp', 'sp-list' );
$pc_col    = get_theme_mod( 'archive_news_list_layout_pc', 'pc-list' );
if ( is_mobile() && 'sp-list' === $sp_col && has_post_thumbnail() ) {
	$title_limit   = 28;
} elseif ( is_mobile() && 'sp-list' === $sp_col ) {
	$title_limit   = 64;
} elseif ( is_mobile() ) {
	$title_limit   = 78;
} elseif ( 'pc-list' === $pc_col && has_post_thumbnail() ) {
	$title_limit   = 70;
	$content_limit = 40;
} elseif ( 'pc-list' === $pc_col ) {
	$title_limit   = 74;
	$content_limit = 74;
} else {
	$title_limit   = 88;
	$content_limit = 32;
}
$accent_color   = get_theme_mod( 'accent_color', '#009dee' );
$terms          = get_the_terms( get_the_ID(), 'news-cat' );
if ( $terms && ! is_wp_error( $terms ) ) {
	$term_id                         = $terms[0]->term_id;
	$term_name                       = $terms[0]->name;
	$term_text_color                 = get_term_meta( $term_id, 'cat_text_color', '#fff' );
	$term_background_color           = get_term_meta( $term_id, 'cat_bg_color', $accent_color );
	$term_background_color_colorcode = str_replace( '#', '', $term_background_color );
	$term_color['red']               = hexdec( substr( $term_background_color_colorcode, 0, 2)  );
	$term_color['green']             = hexdec( substr( $term_background_color_colorcode, 2, 2 ) );
	$term_color['blue']              = hexdec( substr( $term_background_color_colorcode, 4, 2 ) );
	if ( has_post_thumbnail() ) {
		$term_background_color = 'rgba('. $term_color['red'] .','. $term_color['green'] .','. $term_color['blue'] .',0.8)';
	} else {
		$term_background_color = $term_background_color;
	}
}
?>

<article class="<?php echo esc_attr( $sp_col ); ?> <?php echo esc_attr( $pc_col ); ?> archive-list u-shadow-hover<?php if ( has_post_thumbnail() ) { ?> has-thumbnail<?php } ?>">
	<a href="<?php the_permalink() ?>">
	<?php if ( has_post_thumbnail() ): ?>
	<div class="post-thumbnail">
	<?php the_post_thumbnail( '600_338' ); ?>
	</div>
	<?php endif; ?>
	<div class="article-info">
		<span class="cat-name cat-<?php echo esc_attr( $term_id ); ?>'" style="background-color:<?php echo esc_attr( $term_background_color ); ?>;color:<?php echo esc_attr( $term_text_color ); ?>;">
			<?php echo esc_html( $term_name ); ?>
		</span>
		<h2 class="article-title"><?php
			if( is_sticky() ) {
				echo '<span class="sticky-info"><i class="icon-star-full"></i></span>';
			}
			if ( post_password_required() ) {
				echo '<i class="icon-lock"></i>';
			}
			echo wp_trim_words( get_the_title(), $title_limit, '...' );
		?></h2>
		<?php if( ! is_mobile() && 'pc-list' === $pc_col && ! has_post_thumbnail() ) :?>
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