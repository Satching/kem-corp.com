<?php
/**
 * Template Name: 投稿者一覧 3列表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$header_style        = get_theme_mod( 'page_header_style', 'featured_standard' );
$breadcrumb_position = get_theme_mod( 'page_breadcrumb_position', 'content_top' );
$col                 = get_theme_mod( 'page_layout','two-r-col' );
$share_button_sticky = get_theme_mod( 'display_share_button_sticky_author' );
get_header();
?>

<div id="contents">
	<?php
		if ( 'featured_full_width' === $header_style ) {
			get_template_part( 'template-parts/parts/featured-image/singular/header-full-width' );
		} elseif ( 'featured_full_width_overlay' === $header_style ) {
			get_template_part( 'template-parts/parts/featured-image/singular/header-full-width-overlay' );
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
			<main class="l-content__main">
				<?php get_template_part( 'template-parts/content/page/content-author-three-rwo' ); ?>
			</main>
			<?php
				if ( 'one-col' !== $col ) {
					get_sidebar();
				}
			?>
			</div><!--/.u-row-->
			<?php
				if ( 'content_bottom' === $breadcrumb_position ) {
					get_template_part( 'template-parts/parts/content/breadcrumb' );
				}
			?>
		</div><!--/.l-content__inner-->
	</div><!--/.l-content-->
</div><!--/#contents-->
<?php
get_footer();