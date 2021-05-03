<?php
/**
 * Template part for layout in post-attachment-layout.php
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$col = get_theme_mod( 'post_layout','two-r-col' );
?>

<div id="contents">
	<div class="l-content">
		<div class="l-content__inner">
			<div class="u-row <?php echo esc_attr( $col ); ?>">
				<main class="l-content__main">
					<?php get_template_part( 'template-parts/content/post/content-attachment' ); ?>
				</main>
				<?php
					if ( 'one-col' !== $col ) {
						get_sidebar();
					}
				?>
			</div><!--/.u-row-->
		</div><!--/.l-content__inner-->
	</div><!--/.l-content-->
</div><!--/#contents-->
