<?php
/**
 * Template part for displaying archive request term
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$sp_col         = get_theme_mod( 'archive_request_list_layout_sp', 'sp-list' );
if ( 'sp-card-2' === $sp_col ) {
	$class_sp_col = ' has-sp-card-2';
} else {
	$class_sp_col = '';
}
$article_body_width  = get_theme_mod( 'article_body_width', 'paragraph__normal' );
$h2_design           = get_theme_mod( 'h2_design', 'h2-none-style' );
$h3_design           = get_theme_mod( 'h3_design', 'h3-none-style' );
$h4_design           = get_theme_mod( 'h4_design', 'h4-none-style' );
$article_classes = array(
	'article',
	$article_body_width,
	$h2_design,
	$h3_design,
	$h4_design,
);
$class_font_sp       = get_theme_mod( 'p_font_size_sp', 'u-font-size-sp__m' );
$class_font_pc       = get_theme_mod( 'p_font_size_pc', 'u-font-size-pc__m' );
$term_id             = get_queried_object_id();
$page_id             = get_term_meta( $term_id, 'cat_page_id', true );
$header_style        = get_theme_mod( 'request_taxonomy_header_style', 'taxonomy_term_header_standard' );
$share               = get_theme_mod( 'display_share_request_archive' );
?>

<?php
	if ( ! is_paged() && 'taxonomy_term_header_standard' === $header_style || ! is_paged() && 'taxonomy_term_header_full_width' === $header_style ) {
		get_template_part( 'template-parts/parts/featured-image/taxonomy-term/taxonomy-term-header-standard' );
	} elseif ( ! is_paged() && 'taxonomy_term_header_center' === $header_style ) {
		get_template_part( 'template-parts/parts/featured-image/taxonomy-term/taxonomy-term-header-center' );
	}
	if ( $share ) {
		get_template_part( 'template-parts/parts/sns/sns-share' );
	}
?>
<?php if ( $page_id ): ?>
	<article <?php post_class( $article_classes ); ?>>
		<div class="article-body <?php echo esc_attr( $class_font_sp ); ?> <?php echo esc_attr( $class_font_pc ); ?>">
		<?php
			$page         = get_post( $page_id, 'OBJECT', 'raw' );
			$page_content = apply_filters( 'the_content',$page->post_content);
			echo $page_content;
		?>
		</div>
	</article>
<?php endif; ?>
<div class="u-row u-row-wrap wrapper-col<?php echo esc_attr( $class_sp_col ); ?>">
	<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/parts/archive-list/archive-list-request' );
			endwhile;
		endif;
	?>
</div>
<?php the_posts_pagination( array (
		'prev_text' => __( '前へ', 'emanon-premium' ),
		'next_text' => __( '次へ', 'emanon-premium' ), )
	);
?>