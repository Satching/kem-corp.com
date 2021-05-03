<?php
/**
 * Template part for displaying content in front-page.php.
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

?>

<?php if ( have_posts() ) : the_post(); ?>
	<div class="article-body">
	<?php the_content(); ?>
	</div>
<?php endif; ?>
