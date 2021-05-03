<?php
/**
 * Template part for displaying search results pages
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$sp_col         = get_theme_mod( 'search_page_post_list_layout_sp', 'sp-lis' );
if ( 'sp-card-2' === $sp_col ) {
$class_wrapper  = 'wrapper-article';
} else {
$class_wrapper  = 'wrapper-col';
}
$article_body_width  = get_theme_mod( 'article_body_width', 'paragraph__normal' );
$article_classes = array(
	'article',
	$article_body_width,
);
$title         = get_theme_mod( 'nothing_found_title', __( 'ページは見つかりませんでした', 'emanon-premium' ) );
$message       = get_theme_mod( 'nothing_found_message', __( 'ご指定の検索条件に一致する投稿がありませんでした。他のキーワードでもう一度検索してみてください。', 'emanon-premium' ) );
$class_font_sp = get_theme_mod( 'p_font_size_sp', 'u-font-size-sp__m' );
$class_font_pc = get_theme_mod( 'p_font_size_pc', 'u-font-size-pc__m' );
?>

<?php if ( have_posts() ) : ?>
<div class="u-row u-row-wrap <?php echo esc_attr( $class_wrapper ); ?>">
	<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/parts/archive-list/archive-list' );
		endwhile;
	?>
</div>
<?php the_posts_pagination( array (
		'prev_text' => __( '前の記事', 'emanon-premium' ),
		'next_text' => __( '次の記事', 'emanon-premium' ), )
	);
?>
<?php else: ?>
<article <?php post_class( $article_classes ); ?>>
	<?php if ( $title ): ?>
	<header>
		<h1><?php echo wp_kses_post( $title ); ?></h1>
	</header>
	<?php endif; ?>
	<div class="article-body <?php echo esc_attr( $class_font_sp ); ?> <?php echo esc_attr( $class_font_pc ); ?>">
		<?php if ( $message ): ?>
		<p><?php echo nl2br( wp_kses_post( $message ) ); ?></p>
		<?php endif; ?>
	<?php get_search_form(); ?>
	</div>
</article >
<?php endif; ?>
