<?php
/**
 * Header video template
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$header_video_typ        = get_theme_mod( 'header_video_type', 'mp4' );
$header_mp4_id           = get_theme_mod( 'header_video_mp4' );
$header_mp4              = wp_get_attachment_url( $header_mp4_id );
$header_youtube_url      = get_theme_mod( 'header_video_youtube_url' );
$audio_play_icon         = get_theme_mod( 'header_video_display_audio_play_icon' );
$blur_filter             = get_theme_mod( 'header_video_blur_filter', 0 );
$grayscale_filter        = get_theme_mod( 'header_video_grayscale_filter', 0 );
$sepia_filter            = get_theme_mod( 'header_video_sepia_filter', 0 );
$title                   = get_theme_mod( 'header_video_title' );
$message                 = get_theme_mod( 'header_video_message' );
$btn_url                 = get_theme_mod( 'header_video_btn_url' );
$target_brank            = get_theme_mod( 'header_video_target_brank' );
$btn_text                = get_theme_mod( 'header_video_btn_text' );
$btn_microcopy           = get_theme_mod( 'header_video_btn_microcopy' );
$display_down_icon       = get_theme_mod( 'header_video_display_down_icon' );
$scroll_down_label       = get_theme_mod( 'header_video_scroll_down_label', 'Scroll Down' );
$bg_color_start          = get_theme_mod( 'header_video_background_color_start', '#000' );
$bg_color_end            = get_theme_mod( 'header_video_background_color_end', '#000' );
$bg_color_degree         = get_theme_mod( 'header_video_background_color_degree', 135 );
$opacity                 = get_theme_mod( 'header_video_opacity', 0 );
?>

<?php if( ! is_paged() ) :?>
<div id="js-header-video" class="main-visual header-video">
<?php if( 'mp4' === $header_video_typ && $header_mp4 ) :?>
<video autoplay loop muted playsinline id="js-header-video-tag" class="header-video__mp4">
	<source src="<?php echo esc_url( $header_mp4 ); ?>" type="video/mp4" />
</video>
<?php endif; ?>
<?php if( 'youtube' === $header_video_typ && $header_youtube_url ) :?>
<div id="js-header-youtube" class="header-video__youtube"
	data-blur="<?php echo esc_attr( $blur_filter ); ?>"
	data-grayscale="<?php echo esc_attr( $grayscale_filter ); ?>"
	data-sepia="<?php echo esc_attr( $sepia_filter ); ?>"
	data-property="{
	videoURL:'<?php echo esc_url( $header_youtube_url ); ?>',
	containment:'.header-video',
	showControls: false,
	showYTLogo: false,
	startAt:0,
	mute:true,
	autoPlay:true,
	loop:true,
	opacity:1,
	ratio:'auto'
}"></div>
<?php endif; ?>
	<?php if ( $title || $message || $btn_text || $btn_microcopy || $audio_play_icon ): ?>
	<div class="header-video__inner">
		<div class="l-content__sm">
			<?php if ( $title ): ?>
			<h2 class="main-visual__title"><?php echo nl2br( wp_kses_post( $title ) ); ?></h2>
			<?php endif; ?>
			<?php if ( $message ): ?>
			<div class="main-visual__message">
				<?php echo nl2br( wp_kses_post( $message ) ); ?>
			</div>
			<?php endif; ?>
			<?php if ( $btn_text ): ?>
			<div class="main-visual__btn">
				<a class="c-btn c-btn__outline c-btn__s" href="<?php echo esc_url( $btn_url ); ?>"<?php if ( $target_brank ) { echo ' target="_blank" rel="noopener"'; } ?>><?php echo wp_kses_post( $btn_text ); ?></a>
			</div>
			<?php endif; ?>
			<?php if ( $btn_microcopy ): ?>
			<span class="main-visual__microcopy"><?php echo wp_kses_post( $btn_microcopy ); ?></span>
			<?php endif; ?>
			<?php if( ! is_mobile() && $audio_play_icon ) :?>
			<div class="sound-btn">
				<span class="sound-btn-icon"><i class="icon-chevron-right"></i></span>
				<span class="sound-visualizer"></span>
				<span class="sound-visualizer"></span>
				<span class="sound-visualizer"></span>
				<span class="sound-visualizer"></span>
				<span class="sound-visualizer"></span>
				<span class="sound-text">SOUND</span>
			</div><!--/.sound-btn-->
			<?php endif; ?>
		</div><!--/.l-content__sm-->
	</div><!--/.header-video__inner-->
	<?php endif; ?>
	<?php if ( $display_down_icon ): ?>
	<div class="scroll-down">
		<div class="scroll-down__icon"><i class="icon-chevron-down"></i></div>
		<?php if ( $scroll_down_label ): ?>
		<span class="scroll-down_label"><?php echo wp_kses_post( $scroll_down_label ); ?></span>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<div class="main-visual__overlay" style="background:linear-gradient(<?php echo esc_attr( $bg_color_degree ); ?>deg, <?php echo esc_attr( $bg_color_start ); ?>, <?php echo esc_attr( $bg_color_end ); ?>);opacity:<?php echo esc_attr( $opacity ); ?>;"></div>
</div><!--/.main-visual-->
<?php endif; ?>