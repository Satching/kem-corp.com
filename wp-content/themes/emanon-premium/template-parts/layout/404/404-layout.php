<?php
/**
 * Template part for layout in 404.php
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$news                = get_theme_mod( 'display_header_news_' . DEVICE );
$breadcrumb_position = get_theme_mod( 'archive_breadcrumb_position', 'content_top' );
$col                 = get_theme_mod( 'not_found_page_layout','two-r-col' );
?>

<div id="contents">
	<?php
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
			<div class="u-row <?php echo esc_attr( $col ); ?>">
				<main class="l-content__main">
					<?php get_template_part( 'template-parts/content/page/content-none' ); ?>
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
