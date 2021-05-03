<?php
/**
 * Header info
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$display_tel       = get_theme_mod( 'display_header_tel' );
$display_access    = get_theme_mod( 'display_header_access' );
$access_label      = get_theme_mod( 'header_access_label', __( 'アクセス', 'emanon-premium' ) );
$access_url        = get_theme_mod( 'header_access_url' );
$tel_access_layout = get_theme_mod( 'header_tel_access_layout', 'right' );
$sns_layout        = get_theme_mod( 'header_sns_layout', 'display_none' );
$sns_brand_color   = get_theme_mod( 'header_sns_brand_color' );
$phone_number      = get_theme_mod( 'phone_number' );
$office_hours      = get_theme_mod( 'office_hours' );
$phone_title       = get_theme_mod( 'phone_title' );
$phone_number      = get_theme_mod( 'phone_number' );
$phone_number_url  = str_replace( array( '-', 'ー', '−', '―', '‐' ), '', $phone_number );
$office_hours      = get_theme_mod( 'office_hours' );
$facebook          = get_theme_mod( 'follow_facebook' );
$twitter           = get_theme_mod( 'follow_twitter' );
$instagram         = get_theme_mod( 'follow_instagram' );
$youtube           = get_theme_mod( 'follow_youtube' );
$line              = get_theme_mod( 'follow_line' );
$rss               = get_theme_mod( 'follow_rss' );
$class_sns         = '';
if ( 'left' === $tel_access_layout && 'right' === $sns_layout ) {
	$class_row = ' u-row-cont-between';
} elseif ( 'right' === $tel_access_layout && 'left' === $sns_layout ) {
	$class_row = ' u-row-cont-between u-row-dir-reverse';
	$class_sns = ' is-sns-start';
} elseif ( 'right' === $tel_access_layout && 'right' === $sns_layout ) {
	$class_row = ' u-row-cont-end';
} elseif ( 'left' === $tel_access_layout && 'left' === $sns_layout ) {
	$class_row = ' u-row-cont-start';
} elseif ( 'display_none' === $tel_access_layout && 'right' === $sns_layout ) {
	$class_row = ' u-row-dir-reverse';
} elseif ( 'display_none' === $tel_access_layout && 'left' === $sns_layout ) {
	$class_row = ' row-direction';
	$class_sns = ' is-sns-start';
} elseif ( 'right' === $tel_access_layout && 'display_none' === $sns_layout ) {
	$class_row = ' u-row-dir-reverse';
} elseif ( 'left' === $tel_access_layout && 'display_none' === $sns_layout ) {
	$class_row = ' row-direction';
}
?>

<?php if ( $display_tel || $display_access || 'display_none' !== $sns_layout ): ?>
<div class="header-info u-display-tablet">
	<div class="u-row<?php echo esc_attr( $class_row ); ?>">

	<?php if ( $display_tel || $display_access ): ?>
		<div class="header-tel-access">
			<?php if( $display_tel && $phone_number ): ?>
			<span class="header-tel-access__item phone-number"><i class="icon-phone" aria-hidden="true"></i><a href="tel:<?php echo ( $phone_number_url ); ?>" aria-label="電話番号 <?php echo ( $phone_number_url ); ?>"><?php echo wp_kses_post( $phone_number ); ?></a></span>
			<?php endif; ?>
			<?php if( $display_tel && $office_hours ): ?>
			<span class="header-tel-access__item phone-hours"><?php echo wp_kses_post( $office_hours ); ?></span>
			<?php endif; ?>
			<?php if( $display_access ): ?>
			<span class="header-tel-access__item access u-opacity-hover"><a href="<?php echo esc_url( $access_url ); ?>" aria-label="アクセス"><i class="icon-map-pin" aria-hidden="true"></i><?php echo wp_kses_post( $access_label ); ?></a></span>
			<?php endif; ?>
		</div><!--/.header-tel-access-->
	<?php endif; ?>

	<?php if ( 'display_none' !== $sns_layout ): ?>
	<div class="header-sns<?php echo esc_attr( $class_sns ); ?>">
		<ul class="u-row u-row-cont-end u-row-item-center">
			<?php if ( $facebook ): ?>
			<li class="header-sns__item<?php if ( $sns_brand_color) { ?> facebook-color<?php } ?> u-opacity-hover">
				<a href="<?php echo esc_html( get_emanon_facebook_page_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="Facebookでフォロー"><i class="icon-facebook" aria-hidden="true"></i></a>
			</li>
			<?php endif; ?>
			<?php if ( $twitter ): ?>
			<li class="header-sns__item<?php if ( $sns_brand_color ) { ?> twitter-color<?php } ?> u-opacity-hover">
				<a href="<?php echo esc_html( get_emanon_twitter_profile_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="Twitterでフォロー"><i class="icon-twitter" aria-hidden="true"></i></a>
			</li>
			<?php endif; ?>
			<?php if ( $instagram ): ?>
			<li class="header-sns__item<?php if ( $sns_brand_color ) { ?> instagram-color<?php } ?> u-opacity-hover">
				<a href="<?php echo esc_html( get_emanon_instagram_profile_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="Instagramでフォロー"><i class="icon-instagram" aria-hidden="true"></i></a>
			</li>
			<?php endif; ?>
			<?php if ( $youtube ): ?>
			<li class="header-sns__item<?php if ( $sns_brand_color ) { ?> youtube-color<?php } ?> u-opacity-hover">
				<a href="<?php echo esc_html( get_emanon_youtube_profile_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="Youtubeでフォロー"><i class="icon-youtube-square" aria-hidden="true"></i></a>
			</li>
			<?php endif; ?>
			<?php if( $line ): ?>
			<li class="header-sns__item<?php if ( $sns_brand_color ) { ?> line-color <?php } ?> u-opacity-hover">
				<a href="<?php echo esc_html( get_emanon_line_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="LINEでフォロー"><i class="icon-line" aria-hidden="true"></i></a>
			</li>
			<?php endif; ?>
			<?php if ( $rss ): ?>
			<li class="header-sns__item<?php if ( $sns_brand_color ) { ?> feedly-color<?php } ?> u-opacity-hover">
				<a href="https://feedly.com/i/subscription/feed/<?php echo esc_url( get_emanon_feedly_url() ); ?>" target="blank" rel="noopener nofollow" aria-label="Feedlyでフォロー"><i class="icon-rss" aria-hidden="true"></i></a>
			</li>
			<?php endif; ?>
		</ul><!--/.u-row-->
	</div><!--/.header-sns__item-->
	<?php endif; ?>

	</div><!--/.u-row-->
</div><!--/.header-info-->
<?php endif; ?>