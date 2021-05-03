<?php
/**
 * Template part for displaying attachment
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$image_size         = apply_filters( 'wporg_attachment_size', 'medium' );
$article_body_width = get_theme_mod( 'article_body_width', 'paragraph__normal' );
$active_background_color = get_theme_mod( 'active_article_background_color', true );
if( $active_background_color ) {
	$background_color = 'has-background-color';
} else {
	$background_color = '';
}
$article_classes = array(
	$article_body_width,
	$background_color,
);
?>

<article <?php post_class( $article_classes ); ?>>
	<?php if ( have_posts() ) : the_post(); ?>
		<header class="article-header">
			<?php
				get_template_part( 'template-parts/parts/featured-image/singular/header-no-image' );
			?>
		</header>
		<div class="article-body">
			<?php echo wp_get_attachment_image( get_the_ID(), $image_size );?>
			<?php if ( has_excerpt() ) : ?>
			<div class="thumbnail-caption">
			<?php the_excerpt(); ?>
			</div>
			<?php endif; ?>
			<?php the_content();?>
		</div><!--/ article-body-->
	<?php endif; ?>
</article>