<?php
/**
 * Template part for layout in single-seminar.php
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$header_style        = get_theme_mod( 'post_seminar_header_style', 'featured_standard' );
$news                = get_theme_mod( 'display_header_news_' . DEVICE );
$breadcrumb_position = get_theme_mod( 'post_seminar_breadcrumb_position', 'content_top' );
$col                 = get_theme_mod( 'post_seminar_layout','two-r-col' );
$share_button_sticky = get_theme_mod( 'display_share_button_sticky_post' );
if ( 'featured_full_width_overlay' === $header_style ) {
	$class_featured = ' featured-full-width-overlay';
} else {
	$class_featured = '';
}
?>

<div id="contents">
	<?php
		if ( 'featured_full_width' === $header_style ) {
			get_template_part( 'template-parts/parts/featured-image/singular/header-full-width' );
		} elseif ( 'featured_full_width_overlay' === $header_style ) {
			get_template_part( 'template-parts/parts/featured-image/singular/header-full-width-overlay' );
		}
		if ( $news ) {
			get_template_part( 'template-parts/parts/header/header-news' );
		}
	?>
	<div class="l-content">
		<?php
			if ( 'content_top' === $breadcrumb_position ) {
				get_template_part( 'template-parts/parts/content/breadcrumb' );
			}
		?>
		<div class="l-content__inner">
			<div class="u-row <?php echo esc_attr( $col ); ?><?php if ( ! wp_is_mobile() && $share_button_sticky ) { echo ' share_sticky_col'; } ?>">
			<?php
				if ( ! wp_is_mobile() && $share_button_sticky ) {
					get_template_part( 'template-parts/parts/sns/sns-share-sticky' );
				}
			?>
			<main class="l-content__main<?php echo esc_attr( $class_featured ); ?>">
				<?php get_template_part( 'template-parts/content/post/content-seminar' ); ?>
			</main>
			<?php
				if ( 'one-col' !== $col ) {
					get_sidebar();
				}
			?>
			</div><!--/.u-row-->
		</div><!--/.l-content__inner-->
		<?php
			if ( 'content_bottom' === $breadcrumb_position ) {
				get_template_part( 'template-parts/parts/content/breadcrumb' );
			}
		?>
	</div><!--/.l-content-->
</div><!--/#contents-->