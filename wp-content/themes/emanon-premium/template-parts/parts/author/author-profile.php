<?php
/**
 * Author profile
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$author_profile_title = get_theme_mod( 'author_profile_title', __( 'この記事を書いた人', 'emanon-premium' ) );
$body_width           = get_theme_mod( 'author_profile_body_width', 'author-card__normal' );
$sns_brand_color      = get_theme_mod( 'active_author_sns_brand_color' );
if ( $sns_brand_color ) {
	$class_sns_brand = ' sns-brand-color';
} else {
	$class_sns_brand = '';
}
$user_display_name    = get_the_author_meta( 'display_name' );
$user_position        = get_the_author_meta( 'user_position' );
$user_description     = get_the_author_meta( 'user_description');
$follow_label         = get_theme_mod( 'author_sns_follow_label' );
$user_url             = get_the_author_meta( 'user_url' );
$user_twitter         = get_the_author_meta( 'user_twitter' );
$user_facebook        = get_the_author_meta( 'user_facebook') ;
$user_instagram       = get_the_author_meta( 'user_instagram' );
$user_line            = get_the_author_meta( 'user_line' );
$user_youtube         = get_the_author_meta( 'user_youtube' );
$user_linkedin        = get_the_author_meta( 'user_linkedin' );
?>

<aside class="author-card <?php echo esc_attr( $body_width ); ?>">
	<?php if ( $author_profile_title ): ?>
	<h3 class="author-card__title"><?php echo esc_html( $author_profile_title ); ?></h3>
	<?php endif; ?>
	<div class="u-row u-row-wrap wrapper-col">
		<div class="col-2 author-card__avatar">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 144, '', $user_display_name ); ?></a>
				<div class="author-card__avatar--name">
					<?php echo esc_html( $user_display_name ); ?>
				</div>
			<?php if( $user_position ): ?>
			<span class="author-card__avatar--position"><?php echo esc_html( $user_position ); ?></span>
			<?php endif; ?>
		</div><!--/ .author-card__avatar-->
		<div class="col-10 author-card__description">
			<?php if( $user_description ): ?>
				<p><?php echo nl2br( esc_html( $user_description ) ); ?></p>
			<?php endif; ?>
			<?php if( $user_url || $user_twitter || $user_facebook || $user_instagram || $user_line || $user_youtube || $user_linkedin ){ ?>
			<div class="author-card__sns">
				<?php if( $follow_label ): ?>
				<span class="author-card__sns--label"><?php echo $follow_label ?></span>
				<?php endif; ?>
				<ul class="u-row author-sns<?php echo esc_attr( $class_sns_brand ); ?>">
				<?php } ?>
					<?php if( $user_url ): ?>
					<li class="author-sns__item user-url-color"><a href="<?php echo $user_url ?>" target="_blank" rel="noopener" aria-label="Webサイトを見る"><i class="icon-user" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php if( $user_twitter ): ?>
					<li class="author-sns__item twitter-color"><a href="<?php echo $user_twitter ?>" target="_blank" rel="noopener nofollow" aria-label="twitterでフォロー"><i class="icon-twitter" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php if( $user_facebook ): ?>
					<li class="author-sns__item facebook-color"><a href="<?php echo $user_facebook ?>" target="_blank" rel="noopener nofollow" aria-label="Facebookでフォロー"><i class="icon-facebook" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php if( $user_instagram ): ?>
					<li class="author-sns__item instagram-color"><a href="<?php echo $user_instagram ?>" target="_blank" rel="noopener nofollow" aria-label="Instagramでフォロー"><i class="icon-instagram" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php if( $user_youtube ): ?>
					<li class="author-sns__item youtube-color"><a href="<?php echo $user_youtube ?>" target="_blank" rel="noopener nofollow" aria-label="youTubeでフォロー"><i class="icon-youtube-square" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php if( $user_line ): ?>
					<li class="author-sns__item line-color"><a href="<?php echo $user_line ?>" target="_blank" rel="noopener nofollow" aria-label="LINEでフォロー"><i class="icon-line" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php if( $user_linkedin ): ?>
					<li class="author-sns__item linkedin-color"><a href="<?php echo $user_linkedin ?>" target="_blank" rel="noopener nofollow" aria-label="Linkedinでフォロー"><i class="icon-linkedin" aria-hidden="true"></i></a></li>
					<?php endif; ?>
				<?php if( $user_url || $user_twitter || $user_facebook || $user_instagram || $user_line || $user_youtube || $user_linkedin ){ ?>
				</ul>
			</div><!--/.author-card__sns-->
			<?php } ?>
			<div class="c-btn__arrow author-card__btn">
				<a class="c-btn c-btn__main c-btn__sm" href="<?php echo esc_url( home_url( '/' ) ); ?>?author=<?php echo get_the_author_meta( 'ID' ); ?>"><?php _e( '記事一覧', 'emanon-premium' ); ?><i class="icon-read-arrow-right"></i></a>
			</div><!--/.author-card__btn-->
		</div><!--/.author-card__description-->
	</div><!--/.u-row-->
</aside><!--/.author-card-->