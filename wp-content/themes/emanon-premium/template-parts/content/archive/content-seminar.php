<?php
/**
 * Template part for displaying seminar archive
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$sp_col         = get_theme_mod( 'archive_seminar_list_layout_sp', 'sp-list' );
if ( 'sp-card-2' === $sp_col ) {
	$class_sp_col = ' has-sp-card-2';
} else {
	$class_sp_col = '';
}
$header_style   = get_theme_mod( 'seminar_taxonomy_header_style', 'taxonomy_term_header_standard' );
$share          = get_theme_mod( 'display_share_category' );
?>

<?php
	if ( ! is_paged() && 'taxonomy_term_header_standard' === $header_style || ! is_paged() && 'taxonomy_term_header_full_width' === $header_style ) {
		get_template_part( 'template-parts/parts/featured-image/archive/seminar/seminar-header-standard' );
	} elseif ( ! is_paged() && 'taxonomy_term_header_center' === $header_style ) {
		get_template_part( 'template-parts/parts/featured-image/archive/seminar/seminar-header-center' );
	}
	if ( $share ) {
		get_template_part( 'template-parts/parts/sns/sns-share' );
	}
?>
<div class="u-row u-row-wrap wrapper-col<?php echo esc_attr( $class_sp_col ); ?>">
	<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/parts/archive-list/archive-list-seminar' );
			endwhile;
		endif;
	?>
</div>
<?php the_posts_pagination( array (
		'prev_text' => __( '前へ', 'emanon-premium' ),
		'next_text' => __( '次へ', 'emanon-premium' ), )
	);
?>