<?php
/**
 * The template for displaying footer
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$drawer_menu              = has_nav_menu( 'drawer-menu-'. DEVICE );
$hide_footer_section      = post_custom( 'emanon_hide_footer_section' );
$hide_footer              = post_custom( 'emanon_hide_footer' );
$floating_page_top        = get_theme_mod( 'display_floating_page_top_pc' );
$floating_hamburger_menu  = get_theme_mod( 'display_floating_hamburger_menu_sp' );
$footer_background_type   = get_theme_mod( 'footer_background_type', 'none' );
$footer_mp4_id            = get_theme_mod( 'footer_video_mp4' );
$footer_mp4               = wp_get_attachment_url( $footer_mp4_id );
$footer_youtube_url       = get_theme_mod( 'footer_video_youtube_url' );
$footer_background_image  = get_theme_mod( 'footer_background_image_'. DEVICE );
$background_color         = get_theme_mod( 'footer_background_color', '#484848' );
$opacity                  = get_theme_mod( 'footer_background_opacity', 0 );
$cache_layout             = get_theme_mod( 'cache_layout' );
$cache_key_widget_upper   = $cache_layout ? 'footer_widget_upper_'. DEVICE : '';
$cache_key_widget         = $cache_layout ? 'footer_widget_'. DEVICE : '';
$cache_key_menu           = $cache_layout ? 'footer_menu' : '';
$cache_key_copyright      = $cache_layout ? 'footer_copyright' : '';
$cache_key_drawer_menu    = $cache_layout ? 'drawer_menu' : '';
?>

<?php
	if ( empty( $hide_footer_section ) ) {
		get_emanon_cached_template_part( 'template-parts/parts/footer/footer-widget-upper', $cache_key_widget_upper );
	}
?>
<?php if ( empty( $hide_footer ) ): ?>
<footer id="js-footer" class="l-footer">
	<?php if( 'mp4' === $footer_background_type && $footer_mp4 ): ?>
	<video autoplay loop muted playsinline class="footer-video-mp4">
		<source src="<?php echo esc_url( $footer_mp4 ); ?>" type="video/mp4" />
	</video>
	<?php elseif ( 'youtube' === $footer_background_type && $footer_youtube_url ): ?>
	<div id="js-footer-youtube" class="footer-video-youtube"
		data-property="{
		videoURL:'<?php echo esc_url( $footer_youtube_url ); ?>',
		containment:'.l-footer',
		showControls: false,
		showYTLogo: false,
		startAt:0,
		mute:true,
		autoPlay:true,
		loop:true,
		opacity:1,
		ratio:'auto'
	}"></div>
	<?php elseif ( 'image' === $footer_background_type && $footer_background_image ): ?>
	<div class="footer-background-image" style="background-image: url(<?php echo esc_url( $footer_background_image ); ?>)"></div>
	<?php endif; ?>
	<div class="l-footer__inner">
	<?php
		get_emanon_cached_template_part( 'template-parts/parts/footer/footer-widget', $cache_key_widget );
		get_emanon_cached_template_part( 'template-parts/parts/footer/footer-menu', $cache_key_menu );
	?>
	</div><!--/.l-footer__inner-->
	<?php endif; ?><!--/ End if( empty( $hide_footer ) )-->
	<?php
		get_emanon_cached_template_part( 'template-parts/parts/footer/footer-copyright', $cache_key_copyright );
	?>
	<?php if( 'none' != $footer_background_type ): ?>
	<div class="footer-overlay" style="background-color:<?php echo esc_attr( $background_color ); ?>;opacity:<?php echo esc_attr( $opacity ); ?>;"></div>
	<?php endif; ?>
</footer>
<?php
	get_template_part( 'template-parts/parts/cta/cta-floating' );

	if ( ! is_mobile() && $floating_page_top ) {
		get_template_part( 'template-parts/parts/footer/page-top-floating' );
	}
	if ( $drawer_menu ) {
		get_emanon_cached_template_part( 'template-parts/parts/footer/drawer-menu', $cache_key_drawer_menu );
	}
	if ( is_mobile() && $floating_hamburger_menu ) {
		get_template_part( 'template-parts/parts/footer/hamburger-menu-floating' );
	}
	if ( is_mobile() && has_nav_menu( 'fixed-footer-menu' ) ) {
		get_template_part( 'template-parts/parts/footer/fixed-footer-menu' );
	}
?>
<?php wp_footer(); ?>
</div><!--/ #wrapper-->
</body>
</html>
<?php emanon_ob_get_clean(); ?>