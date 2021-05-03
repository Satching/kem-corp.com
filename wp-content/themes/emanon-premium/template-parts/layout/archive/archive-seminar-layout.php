<?php
/**
 * Template part for layout in archive-seminar.php
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$header_style        = get_theme_mod( 'seminar_taxonomy_header_style', 'taxonomy_term_header_standard' );
$breadcrumb_position = get_theme_mod( 'archive_seminar_breadcrumb_position', 'content_top' );
$col                 = get_theme_mod( 'archive_seminar_layout','two-r-col' );
$share_button_sticky = get_theme_mod( 'display_share_button_sticky_category' );
?>

<div id="contents">
	<?php
		if ( ! is_paged() && 'taxonomy_term_header_full_width' === $header_style ) {
			get_template_part( 'template-parts/parts/featured-image/archive/seminar/seminar-header-full-width' );
		} elseif ( ! is_paged() && 'taxonomy_term_header_full_width_overlay' === $header_style ) {
			get_template_part( 'template-parts/parts/featured-image/archive/seminar/seminar-header-full-width-overlay' );
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
			<?php
				get_template_part( 'template-parts/content/archive/content-seminar' );
			?>
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
