<?php
/**
 * Template part for displaying archive content in author
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$article_body_width = get_theme_mod( 'article_body_width', 'paragraph__normal' );
$h2_design          = get_theme_mod( 'h2_design', 'h2-none-style' );
$h3_design          = get_theme_mod( 'h3_design', 'h3-none-style' );
$h4_design          = get_theme_mod( 'h4_design', 'h4-none-style' );
$active_background_color = get_theme_mod( 'active_article_background_color', true );
if( $active_background_color ) {
	$background_color = 'has-background-color';
} else {
	$background_color = '';
}
$classes = array(
	$article_body_width,
	$h2_design,
	$h3_design,
	$h4_design,
	$background_color,
);
$header_style     = get_theme_mod( 'page_header_style', 'featured_standard' );
$share_button_top = get_theme_mod( 'display_share_author' );
$user_id          = get_theme_mod( 'exclude_author_user_id' );
$ad_content       = get_theme_mod( 'display_ad_content_page' );
$follow_label     = get_theme_mod( 'author_sns_follow_label', __( 'Follow me', 'emanon-premium' ) );
$sns_brand_color  = get_theme_mod( 'follow_sns_brand_color_singular' );
?>

<article <?php post_class( $classes ); ?>>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
		<?php if( $post->post_content || $share_button_top ): ?>
		<div class="article-body">
		<?php
			if ( $share_button_top ) {
				get_template_part( 'template-parts/parts/sns/sns-share' );
			}
			the_content();
		?>
		</div>
		<?php endif; ?>
		<div class="u-row u-row-wrap wrapper-col">
		<?php
			$total_users = count_users();
			$total_users = $total_users['total_users'];
			$args = array(
				'orderby' =>'ID',
				'order'   =>'ASC',
				'exclude' => $user_id,
				);
			$users = get_users( $args );
			foreach( $users as $user ) {
			$user_id           = $user->ID;
			$user_display_name = $user->display_name;
			$user_position     = $user->user_position;
			$user_description  = $user->user_description;
			$user_url          = $user->user_url;
			$user_twitter      = $user->user_twitter;
			$user_facebook     = $user->user_facebook;
			$user_instagram    = $user->user_instagram;
			$user_line         = $user->user_line;
			$user_youtube      = $user->user_youtube;
			$user_linkedin     = $user->user_linkedin;
		?>
		<div class="col-6 author-card author-card__normal--border">
			<div class="author-card__avatar">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>?author=<?php echo $user_id ?>"><?php echo get_avatar( $user_id ,144, '', $user_display_name ); ?></a>
				<div class="author-card__avatar--name"><?php echo esc_html( $user_display_name ); ?></div>
				<?php if( $user_position ){ ?><span class="author-card__avatar--position"><?php echo esc_html( $user_position ); ?></span><?php } ?>
			</div><!--/.avatar-info col-2-->
			<div class="author-card__description">
				<?php if( $user_description ){ ?>
				<p><?php echo esc_html( $user_description ); ?></p>
				<?php } ?>
				<?php if( $user_url || $user_twitter || $user_facebook || $user_instagram || $user_line || $user_youtube || $user_linkedin ){ ?>
				<div class="author-card__sns">
					<?php if( $follow_label ): ?>
						<span class="author-card__sns--label"><?php echo $follow_label ?></span>
					<?php endif; ?>
					<ul class="u-row author-sns <?php if ( $sns_brand_color ) { ?> sns-brand-color<?php } ?>">
					<?php } ?>
						<?php if( $user_url ): ?>
						<li class="author-sns__item user-url-color u-opacity-hover"><a href="<?php echo $user_url ?>" target="_blank" rel="noopener" aria-label="Webサイトを見る"><i class="icon-user" aria-hidden="true"></i></a></li>
						<?php endif; ?>
						<?php if( $user_twitter ): ?>
						<li class="author-sns__item twitter-color u-opacity-hover"><a href="<?php echo $user_twitter ?>" target="_blank" rel="noopener" aria-label="twitterでフォロー"><i class="icon-twitter" aria-hidden="true"></i></a></li>
						<?php endif; ?>
						<?php if( $user_facebook ): ?>
						<li class="author-sns__item facebook-color u-opacity-hover"><a href="<?php echo $user_facebook ?>" target="_blank" rel="noopener" aria-label="Facebookでフォロー"><i class="icon-facebook" aria-hidden="true"></i></a></li>
						<?php endif; ?>
						<?php if( $user_instagram ): ?>
						<li class="author-sns__item instagram-color u-opacity-hover"><a href="<?php echo $user_instagram ?>" target="_blank" rel="noopener" aria-label="Instagramでフォロー"><i class="icon-instagram" aria-hidden="true"></i></a></li>
						<?php endif; ?>
						<?php if( $user_youtube ): ?>
						<li class="author-sns__item youtube-color u-opacity-hover"><a href="<?php echo $user_youtube ?>" target="_blank" rel="noopener" aria-label="youTubeでフォロー"><i class="icon-youtube-square" aria-hidden="true"></i></a></li>
						<?php endif; ?>
						<?php if( $user_line ): ?>
						<li class="author-sns__item line-color u-opacity-hover"><a href="<?php echo $user_line ?>" target="_blank" rel="noopener" aria-label="LINEでフォロー"><i class="icon-line" aria-hidden="true"></i></a></li>
						<?php endif; ?>
						<?php if( $user_linkedin ): ?>
						<li class="author-sns__item linkedin-color u-opacity-hover"><a href="<?php echo $user_linkedin ?>" target="_blank" rel="noopener" aria-label="Linkedinでフォロー"><i class="icon-linkedin" aria-hidden="true"></i></a></li>
						<?php endif; ?>
					<?php if( $user_url || $user_twitter || $user_facebook || $user_instagram || $user_line || $user_youtube || $user_linkedin ){ ?>
					</ul>
				</div><!--/ author-sns-->
				<?php } ?>
				<div class="c-btn__arrow author-card__btn">
					<a class="c-btn c-btn__main c-btn__sm" href="<?php echo esc_url( home_url( '/' ) ); ?>?author=<?php echo $user_id ?>"><?php _e( '記事一覧', 'emanon-premium' ); ?><i class="icon-read-arrow-right"></i></a>
				</div><!--/.archive-user-post-->
			</div><!--/.author-description-->
		</div><!--/.author-card-->
		<?php } ?>
		</div>
		<?php
			if ( 'not_set' !== $ad_content ) {
				get_template_part( 'template-parts/parts/ad/ad-content-under' );
			}
		?>
	<?php endwhile; endif; ?>
</article>