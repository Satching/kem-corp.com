<?php
/**
 * SNS follow
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$title            = get_theme_mod( 'follow_title' );
$microcopy        = get_theme_mod( 'follow_microcopy' );
$microcopy_layout = get_theme_mod( 'follow_microcopy_layout', 'under_button' );
$facebook         = get_theme_mod( 'follow_facebook' );
$twitter          = get_theme_mod( 'follow_twitter' );
$instagram        = get_theme_mod( 'follow_instagram' );
$youtube          = get_theme_mod( 'follow_youtube' );
$line             = get_theme_mod( 'follow_line' );
$rss              = get_theme_mod( 'follow_rss' );
$button           = get_theme_mod( 'sns_follow_page_button', 'button__normal' );

if ( 'button__normal' === $button ) {
	$class_follow = 'sns-follow';
	$class_button = 'sns-follow__button';
	$class_col = 'col-6';
} else {
	$class_follow = 'sns-follow is_icon';
	$class_button = 'sns-follow__circle';
	$class_col = '';
}

if ( is_mobile() ) {
	$size = '600_338';
} else {
	$size = '800_450';
}


$background_img  = get_theme_mod( 'active_sns_follow_page_background_img', true );
$thumbnail_id    = get_post_thumbnail_id();
$thumbnail_img   = wp_get_attachment_image_src( $thumbnail_id , $size );
if ( has_post_thumbnail() && $background_img ) {
	$thumbnail_src = $thumbnail_img[0];
} else {
	$thumbnail_src = '';
}
?>

<aside class="<?php echo esc_attr( $class_follow ); ?>"<?php if ( $thumbnail_src ) { ?> style="background-image: url(<?php echo esc_url( $thumbnail_src ); ?>)"<?php } ?>>
	<div<?php if ( $thumbnail_src ) { ?> class="u-background-cover"<?php } ?>>
		<div class="sns-follow__inner">
			<?php if ( $title ): ?>
			<h3 class="sns-follow__title"><?php echo wp_kses_post( $title ); ?></h3>
			<?php endif; ?>
			<?php if ( $microcopy && 'on_button' === $microcopy_layout ): ?>
				<div class="sns-follow__microcopy"><?php echo nl2br( wp_kses_post( $microcopy ) ); ?></div>
			<?php endif; ?>
			<div class="<?php echo esc_attr( $class_button ); ?> sns-brand-color">
				<div class="u-row u-row-wrap<?php if ( 'button__icon' === $button ) { ?> u-row-cont-center<?php } ?> wrapper-col">
					<?php if ( $facebook ): ?>
					<div class="<?php echo esc_attr( $class_col ); ?> sns-follow__item facebook-bg">
						<a class="c-btn c-btn__main" href="<?php echo esc_url( get_emanon_facebook_page_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="Facebookでフォロー">
							<?php if ( 'button__normal' === $button ) { ?><?php _e( 'Facebook', 'emanon-premium' ); ?><?php } ?>
							<i class="icon-facebook" aria-hidden="true"></i></a>
					</div><!--/.facebook-bg-->
					<?php endif; ?>
					<?php if ( $twitter ): ?>
					<div class="<?php echo esc_attr( $class_col ); ?> sns-follow__item twitter-bg">
						<a class="c-btn c-btn__main" href="<?php echo esc_url( get_emanon_twitter_profile_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="Twitterでフォロー">
							<?php if ( 'button__normal' === $button ) { ?><?php _e( 'Twitter', 'emanon-premium' ); ?><?php } ?>
							<i class="icon-twitter" aria-hidden="true"></i></a>
					</div><!--/.twitter-bg-->
					<?php endif; ?>
					<?php if ( $instagram ): ?>
					<div class="<?php echo esc_attr( $class_col ); ?> sns-follow__item instagram-bg">
						<a class="c-btn c-btn__main" href="<?php echo esc_html( get_emanon_instagram_profile_url() ); ?>" target="_blank" rel="noopener nofollow" aria-label="Instagramでフォロー">
							<?php if ( 'button__normal' === $button ) { ?><?php _e( 'Instagram', 'emanon-premium' ); ?><?php } ?>
							<i class="icon-instagram" aria-hidden="true"></i></a>
					</div><!--/.instagram-bg-->
					<?php endif; ?>
					<?php if ( $youtube ): ?>
					<div class="<?php echo esc_attr( $class_col ); ?> sns-follow__item youtube-bg">
						<a class="c-btn c-btn__main" href="<?php echo esc_html( get_emanon_youtube_profile_url() ); ?>" target="_blank" rel="noopener nofollow" aria-label="Youtubeでフォロー">
							<?php if ( 'button__normal' === $button ) { ?><?php _e( 'YouTube', 'emanon-premium' ); ?><?php } ?>
							<i class="icon-youtube-square" aria-hidden="true"></i></a>
					</div><!--/.youtube-bg-->
					<?php endif; ?>
					<?php if ( $line ): ?>
					<div class="<?php echo esc_attr( $class_col ); ?> sns-follow__item line-bg">
						<a class="c-btn c-btn__main" href="<?php echo esc_url( get_emanon_line_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="LINEでフォロー">
							<?php if ( 'button__normal' === $button ) { ?><?php _e( 'LINE', 'emanon-premium' ); ?><?php } ?>
							<i class="icon-line" aria-hidden="true"></i></a>
					</div><!--/.line-bg-->
					<?php endif; ?>
					<?php if ( $rss ): ?>
					<div class="<?php echo esc_attr( $class_col ); ?> sns-follow__item feedly-bg">
						<a class="c-btn c-btn__main" href="https://feedly.com/i/subscription/feed/<?php echo esc_url( get_emanon_feedly_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="Feedlyでフォロー">
							<?php if ( 'button__normal' === $button ) { ?><?php _e( 'Feedly', 'emanon-premium' ); ?><?php } ?>
							<i class="icon-rss" aria-hidden="true"></i></a>
					</div><!--/.feedly-bg-->
					<?php endif; ?>
				</div><!--/.u-row-->
			</div><!--/.sns-follow__button-->
			<?php if ( $microcopy && 'under_button' === $microcopy_layout ): ?>
				<div class="sns-follow__microcopy"><?php echo nl2br( wp_kses_post( $microcopy ) ); ?></div>
			<?php endif; ?>
		</div><!--/.sns-follow-inner-->
	</div><!--/.u-background-cover-->
</aside><!--/.sns-follow-->