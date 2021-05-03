<?php
/**
 * SNS share sticky buttons
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

global $wp_query;
$postID   = $wp_query->post->ID;
$hide_sns = get_post_meta( $postID, 'emanon_hide_sns' );
if ( $hide_sns ) {
	return;
}
$share_twitter     = get_theme_mod( 'share_twitter' );
$share_facebook    = get_theme_mod( 'share_facebook' );
$share_hatena      = get_theme_mod( 'share_hatena' );
$share_pocket      = get_theme_mod( 'share_pocket' );
$share_pinterest   = get_theme_mod( 'share_pinterest' );
$share_line        = get_theme_mod( 'share_line' );
$display_clipboard = get_theme_mod( 'display_clipboard' );
$label             = get_theme_mod( 'sns_label_sticky' );
$title_encoded     = rawurlencode( get_emanon_title() );
$url_encoded       = urlencode( get_emanon_current_url() );
?>

<aside class="u-display-pc">
	<ul class="sns-share-sticky__list sns-share-sticky">
		<?php if ( $label ): ?>
		<li>
			<span class="sns-share-sticky__label"><?php echo $label; ?></span>
		</li>
		<?php endif; ?>
		<?php if ( $share_twitter ): ?>
		<li class="sns-share-sticky__item twitter-bg">
			<a class="share-button" href="https://twitter.com/intent/tweet?url=<?php echo $url_encoded; ?><?php echo get_emanon_twitter_via(); ?>&amp;&text=<?php echo $title_encoded; ?>&tw_p=tweetbutton" rel="noopener nofollow" aria-label="Twitterでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500');return false;">
				<i class="icon-twitter" aria-hidden="true"></i>
			</a>
		</li>
		<?php endif; ?>
		<?php if ( $share_facebook ): ?>
		<li class="sns-share-sticky__item facebook-bg">
			<a class="share-button" href="https://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encoded; ?>&amp;t=<?php echo $title_encoded; ?>" rel="noopener nofollow" aria-label="Facebookでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=460,width=600');return false;">
				<i class="icon-facebook" aria-hidden="true"></i>
			</a>
		</li>
		<?php endif; ?>
		<?php if ( $share_hatena ): ?>
		<li class="sns-share-sticky__item hatena-bg">
			<a class="share-button" href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encoded; ?>&amp;title=<?php echo $title_encoded; ?>" rel="noopener nofollow" aria-label="はてなブックマークで保存" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500');return false;">
				<i class="icon-hatena" aria-hidden="true"></i>
			</a>
		</li>
		<?php endif; ?>
		<?php if ( $share_pocket ): ?>
		<li class="sns-share-sticky__item pocket-bg">
			<a class="share-button" href="https://getpocket.com/edit?url=<?php echo $url_encoded; ?>&title=<?php echo $title_encoded; ?>" rel="noopener nofollow" aria-label="Pocketで保存" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500');return false;"><i class="icon-pocket" aria-hidden="true"></i>
			</a>
		</li>
		<?php endif; ?>
		<?php if ( $share_pinterest ): ?>
		<li class="sns-share-sticky__item pinterest-bg">
			<a class="share-button" href="https://www.pinterest.com/pin/create/button/" rel="noopener nofollow" aria-label="Pinterestで保存" data-pin-do="buttonBookmark" data-pin-custom="true">
				<i class="icon-pinterest" aria-hidden="true"></i>
			</a>
			<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
		</li>
		<?php endif; ?>
		<?php if ( $share_line ): ?>
		<li class="sns-share-sticky__item line-bg">
			<a class="share-button" href="https://timeline.line.me/social-plugin/share?url=<?php echo $url_encoded; ?>&title=<?php echo $title_encoded; ?>" target="_blank" rel="noopener nofollow" aria-label="LINEでシェア">
				<i class="icon-line" aria-hidden="true"></i>
			</a>
		</li>
		<?php endif; ?>
		<?php if ( $display_clipboard ): ?>
		<li class="sns-share-sticky__item clipboard-bg">
			<div id="js-clipboard" class="js-clipboard share-button c-tooltip-right" data-clipboard-text="<?php echo get_emanon_current_url(); ?>" aria-label="URLをコピーする"><i class="icon-link" aria-hidden="true"></i>
				<div class="c-tooltip"><?php _e( 'コピーURL', 'emanon-premium' ); ?></div>
				<div class="share-button__clipboard--success u-display-none"><?php _e( 'OK', 'emanon-premium' ); ?></div>
				<div class="share-button__clipboard--error u-display-none"><?php _e( 'エラー', 'emanon-premium' ); ?></div>
			</div>
		</li>
		<?php endif; ?>
	</ul>
</aside>