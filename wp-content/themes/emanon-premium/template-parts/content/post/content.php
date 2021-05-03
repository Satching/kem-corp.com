<?php
/**
 * Template part for displaying posts
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$article_body_width      = get_theme_mod( 'article_body_width', 'paragraph__normal' );
$h2_design               = get_theme_mod( 'h2_design', 'h2-none-style' );
$h3_design               = get_theme_mod( 'h3_design', 'h3-none-style' );
$h4_design               = get_theme_mod( 'h4_design', 'h4-none-style' );
$active_background_color = get_theme_mod( 'active_article_background_color', true );
if( $active_background_color ) {
	$background_color = 'has-background-color';
} else {
	$background_color = '';
}
$header_style     = get_theme_mod( 'post_header_style', 'featured_standard' );
if( 'featured_full_width_overlay' === $header_style ) {
	$header_overlay = 'featured-full-width-overlay';
} else {
	$header_overlay = '';
}
$article_classes = array(
	$article_body_width,
	$h2_design,
	$h3_design,
	$h4_design,
	$background_color,
	$header_overlay,
);
$class_font_sp       = get_theme_mod( 'p_font_size_sp', 'u-font-size-sp__m' );
$class_font_pc       = get_theme_mod( 'p_font_size_pc', 'u-font-size-pc__m' );
$share_button_top    = get_theme_mod( 'display_share_button_top_post' );
$share_button_bottom = get_theme_mod( 'display_share_button_bottom_post' );
$ad_content_under    = get_theme_mod( 'display_ad_content_post' );
$follow              = get_theme_mod( 'display_follow_post' );
$newsletter          = get_theme_mod( 'display_newsletter_post' );
$author_profile      = get_theme_mod( 'display_author_profile' );
$comment_form        = get_theme_mod( 'display_comment_form_post' );
$tag                 = get_theme_mod( 'display_tag' );
$pre_nex             = get_theme_mod( 'display_pre_nex');
$related_post        = get_theme_mod( 'display_related_post' );
$related_post_layout = get_theme_mod( 'related_post_layout', 'col-6' );
$ad_matched_content  = get_theme_mod( 'display_ad_matched_content' );
$ad_related_under    = get_theme_mod( 'display_ad_related_article' );
?>

<article <?php post_class( $article_classes ); ?>>
	<?php if ( have_posts() ) : the_post(); ?>
		<?php
			$hide_featured_image = post_custom( 'emanon_hide_featured_image' );
			if ( $hide_featured_image ) {
				$header_style      = 'display_none';
			}
		?>
		<?php if ( 'featured_full_width_overlay' !== $header_style ): ?>
		<header class="article-header">
			<?php
				if ( 'display_none' === $header_style || 'featured_full_width' === $header_style ) {
					get_template_part( 'template-parts/parts/featured-image/singular/header-no-image' );
				} elseif ( 'featured_standard' === $header_style ) {
					get_template_part( 'template-parts/parts/featured-image/singular/header-standard' );
				} elseif ( 'featured_standard_bottom_title' === $header_style ) {
					get_template_part( 'template-parts/parts/featured-image/singular/header-standard-bottom-title' );
				} elseif ( 'featured_cover' === $header_style ) {
					get_template_part( 'template-parts/parts/featured-image/singular/header-cover' );
				}
			?>
		</header>
		<?php endif; ?>
		<div class="article-body <?php echo esc_attr( $class_font_sp ); ?> <?php echo esc_attr( $class_font_pc ); ?>">
		<?php
			if ( $share_button_top ) {
				get_template_part( 'template-parts/parts/sns/sns-share' );
			}

			the_content();

			wp_link_pages( 'before=<div class="next-page">&after=</div>&next_or_number=number&pagelink=<span class="page-numbers">%</span>' );

			if ( $share_button_bottom ) {
				get_template_part( 'template-parts/parts/sns/sns-share' );
			}
			?>
		</div>
		<?php
			if ( 'not_set' !== $ad_content_under ) {
				get_template_part( 'template-parts/parts/ad/ad-content-under' );
			}

				get_template_part( 'template-parts/parts/cta/cta-content' );

				get_template_part( 'template-parts/parts/cta/cta-newsletter' );

			if ( $follow ) {
				get_template_part( 'template-parts/parts/sns/sns-follow' );
			}
			if ( $author_profile ) {
				get_template_part( 'template-parts/parts/author/author-profile' );
			}
		?>
	<?php endif; ?>
	<?php
		if ( $tag ) {
			get_template_part( 'template-parts/parts/content/entry-tag' );
		}
		if ( $pre_nex ) {
			get_template_part( 'template-parts/parts/content/post-navigation' );
		}
		if ( $ad_matched_content ) {
			get_template_part( 'template-parts/parts/ad/ad-matched-content' );
		}
		if ( $related_post ) {
			get_template_part( 'template-parts/parts/content/related-post' );
		}
		if ( $ad_related_under ) {
			get_template_part( 'template-parts/parts/ad/ad-related-under' );
		}
		if ( $comment_form ) {
			comments_template();
		}
	?>
</article>