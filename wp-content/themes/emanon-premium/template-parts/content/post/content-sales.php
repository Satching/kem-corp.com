<?php
/**
 * Template part for displaying sales
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$article_body_width = get_theme_mod( 'article_body_width', 'paragraph__normal' );
$h2_design          = get_theme_mod( 'h2_design', 'h2-none-style' );
$h3_design          = get_theme_mod( 'h3_design', 'h3-none-style' );
$h4_design          = get_theme_mod( 'h4_design', 'h4-none-style' );
$article_classes = array(
	$article_body_width,
	$h2_design,
	$h3_design,
	$h4_design,
);
$class_font_sp        = get_theme_mod( 'p_font_size_sp', 'u-font-size-sp__m' );
$class_font_pc        = get_theme_mod( 'p_font_size_pc', 'u-font-size-pc__m' );
?>

<article <?php post_class( $article_classes ); ?>>
	<?php if ( have_posts() ) : the_post(); ?>
	<div class="article-body <?php echo esc_attr( $class_font_sp ); ?> <?php echo esc_attr( $class_font_pc ); ?>">
	<?php
		the_content();
		wp_link_pages( 'before=<div class="next-page">&after=</div>&next_or_number=number&pagelink=<span class="page-numbers">%</span>' );
		?>
	</div>
	<?php endif; ?>
</article>