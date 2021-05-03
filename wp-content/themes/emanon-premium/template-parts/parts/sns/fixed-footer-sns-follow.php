<?php
/**
 * Fixed Footer SNS follow
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$facebook  = get_theme_mod( 'follow_facebook' );
$twitter   = get_theme_mod( 'follow_twitter' );
$instagram = get_theme_mod( 'follow_instagram' );
$youtube   = get_theme_mod( 'follow_youtube' );
$line      = get_theme_mod( 'follow_line' );
$rss       = get_theme_mod( 'follow_rss' );
?>

<div class="js-fixed-item sp-follow-sns">
	<ul class="u-row u-row-item-center u-row-cont-center">
		<?php if ( $facebook ): ?>
		<li class="sp-follow-sns__item facebook-bg">
			<a href="<?php echo esc_url( get_emanon_facebook_page_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="Facebookでフォロー"><i class="icon-facebook" aria-hidden="true"></i></a>
		</li>
		<?php endif; ?>
		<?php if ( $twitter ): ?>
		<li class="sp-follow-sns__item twitter-bg">
			<a href="<?php echo esc_url( get_emanon_twitter_profile_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="Twitterでフォロー"><i class="icon-twitter" aria-hidden="true"></i></a>
		</li><!--/.twitter-follow-->
		<?php endif; ?>
		<?php if ( $instagram ): ?>
		<li class="sp-follow-sns__item instagram-bg">
			<a href="<?php echo esc_html( get_emanon_instagram_profile_url() ); ?>" target="_blank" rel="noopener nofollow" aria-label="Instagramでフォロー"><i class="icon-instagram" aria-hidden="true"></i></a>
		</li><!--/.twitter-follow-->
		<?php endif; ?>
		<?php if ( $youtube ): ?>
		<li class="sp-follow-sns__item youtube-bg">
			<a href="<?php echo esc_html( get_emanon_youtube_profile_url() ); ?>" target="_blank" rel="noopener nofollow" aria-label="youTubeでフォロー"><i class="icon-youtube-square" aria-hidden="true"></i></a>
		</li><!--/.twitter-follow-->
		<?php endif; ?>
		<?php if ( $line ): ?>
		<li class="sp-follow-sns__item line-bg">
			<a href="<?php echo esc_url( get_emanon_line_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="LINEでフォロー"><i class="icon-line" aria-hidden="true"></i></a>
		</li><!--/.line-button-->
		<?php endif; ?>
		<?php if ( $rss ): ?>
		<li class="sp-follow-sns__item feedly-bg">
			<a href="<?php echo esc_url( get_emanon_feedly_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="Feedlyでフォロー"><i class="icon-rss" aria-hidden="true"></i></a>
		</li><!--/.rss-button-->
		<?php endif; ?>
	</ul>
</div><!--/.sp-follow-sns-->