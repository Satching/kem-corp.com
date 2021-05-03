<?php
/**
 * Header image slider template
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
$height                = get_theme_mod( 'header_image_slider_height_'. DEVICE, 500 );
$slider_autoplay       = get_theme_mod( 'header_image_slider_autoplay_'. DEVICE, true );
$slider_fade           = get_theme_mod( 'header_image_slider_fade_'. DEVICE, true );
$slider_arrows         = get_theme_mod( 'header_image_slider_arrows_'. DEVICE );
$slider_autoplay_speed = get_theme_mod( 'header_image_slider_autoplay_speed', 3000 );
$slider_speed          = get_theme_mod( 'header_image_slider_speed_'. DEVICE, 1500 );
$slider_btn_url        = get_theme_mod( 'header_image_slider_btn_url' );
$slider_btn_text       = get_theme_mod( 'header_image_slider_btn_text' );
$separator             = get_theme_mod( 'header_image_slider_separator', 'display_none' );
$images_pc = array(
	'slider_image_pc_1'  => get_theme_mod( 'header_image_slider_image_pc_1' ),
	'slider_image_pc_2'  => get_theme_mod( 'header_image_slider_image_pc_2' ),
	'slider_image_pc_3'  => get_theme_mod( 'header_image_slider_image_pc_3' ),
	'slider_image_pc_4'  => get_theme_mod( 'header_image_slider_image_pc_4' ),
	'slider_image_pc_5'  => get_theme_mod( 'header_image_slider_image_pc_5' ),
	'slider_image_pc_6'  => get_theme_mod( 'header_image_slider_image_pc_6' ),
	'slider_image_pc_7'  => get_theme_mod( 'header_image_slider_image_pc_7' ),
	'slider_image_pc_8'  => get_theme_mod( 'header_image_slider_image_pc_8' ),
	'slider_image_pc_9'  => get_theme_mod( 'header_image_slider_image_pc_9' ),
	'slider_image_pc_10' => get_theme_mod( 'header_image_slider_image_pc_10' ),
);
$bg_color_start        = get_theme_mod( 'header_image_slider_background_color_start', '#000' );
$bg_color_end          = get_theme_mod( 'header_image_slider_background_color_end', '#000' );
$bg_color_degree       = get_theme_mod( 'header_image_slider_background_color_degree', 135 );
$opacity               = get_theme_mod( 'header_image_slider_opacity', 0 );
?>

<?php if( ! is_paged() ) :?>
<div class="main-visual">
	<div id="js-header-image-slider" class="header-image-slider"
		data-autoplay="<?php echo esc_attr( ( $slider_autoplay == true ) ? 'true' : 'false' ); ?>"
		data-fade="<?php echo esc_attr( ( $slider_fade == true ) ? 'true' : 'false' ); ?>"
		data-arrows="<?php echo esc_attr( ( $slider_arrows == true ) ? 'true' : 'false' ); ?>"
		data-autoplayspeed="<?php echo esc_attr( $slider_autoplay_speed ); ?>"
		data-speed="<?php echo esc_attr( $slider_speed ); ?>"
	>
	<?php
		$c = 1;
		foreach ( $images_pc as $image ):
	?>
		<?php if ( $image ): ?>
			<?php
				$title         = get_theme_mod( 'header_image_slider_title_'.$c );
				$message       = get_theme_mod( 'header_image_slider_message_'.$c );
				$image_sp      = get_theme_mod( 'header_image_slider_image_sp_'.$c );
				$btn_text      = get_theme_mod( 'header_image_slider_btn_text_'.$c );
				$btn_microcopy = get_theme_mod( 'header_image_slider_btn_microcopy_'.$c );
				$url           = get_theme_mod( 'header_image_slider_url_'.$c );
				$target_brank  = get_theme_mod( 'header_image_slider_target_brank_'.$c );
			?>
			<?php if ( $url && ! $btn_text ): ?>
				<a href="<?php echo esc_url( $url ); ?>"<?php if ( $target_brank ) { echo ' target="_blank" rel="noopener"'; } ?>>
			<?php endif; ?>
			<div class="slider-item" style="height:<?php echo absint( $height ); ?>px;">
				<?php if ( is_mobile() && $image_sp ): ?>
					<div class="header-image-slider__item" style="background-image: url(<?php echo esc_url( $image_sp ); ?>)"></div>
				<?php else: ?>
					<div class="header-image-slider__item" style="background-image: url(<?php echo esc_url( $image ); ?>)"></div>
				<?php endif; ?>
				<?php if ( $title || $message || $btn_text || $btn_microcopy ): ?>
					<div class="main-visual-slider__inner">
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
							<a class="c-btn c-btn__outline c-btn__s" href="<?php echo esc_url( $url ); ?>"<?php if ( $target_brank ) { echo ' target="_blank" rel="noopener"'; } ?>><?php echo wp_kses_post( $btn_text ); ?></a>
						</div>
						<?php endif; ?>
						<?php if ( $btn_microcopy ): ?>
						<span class="main-visual__microcopy"><?php echo wp_kses_post( $btn_microcopy ); ?></span>
						<?php endif; ?>
					</div><!--/.l-content__sm-->
				</div><!--/.image-slider-item-inner-->
				<?php endif; ?>
				<div class="main-visual__overlay" style="background:linear-gradient(<?php echo esc_attr( $bg_color_degree ); ?>deg, <?php echo esc_attr( $bg_color_start ); ?>, <?php echo esc_attr( $bg_color_end ); ?>);opacity:<?php echo esc_attr( $opacity ); ?>;"></div>
			</div>
			<?php if ( $url && ! $btn_text ): ?>
				</a>
			<?php endif; ?>
		<?php endif; ?>
	<?php
		$c++;
		endforeach;
	?>
	</div><!--/ #js-header-image-slider-->
	<?php
		if ( 'arch' === $separator ) {
			get_template_part( 'template-parts/parts/separator/separator-arch' );
		} elseif ( 'wave' === $separator ) {
			get_template_part( 'template-parts/parts/separator/separator-wave' );
		} elseif ( 'double_wave' === $separator ) {
			get_template_part( 'template-parts/parts/separator/separator-double-wave' );
		} elseif ( 'two_wave' === $separator ) {
			get_template_part( 'template-parts/parts/separator/separator-two-wave' );
		} elseif ( 'tilt_right' === $separator ) {
			get_template_part( 'template-parts/parts/separator/separator-tilt-right' );
		} elseif ( 'tilt_left' === $separator ) {
			get_template_part( 'template-parts/parts/separator/separator-tilt-left' );
		} elseif ( 'triangle' === $separator ) {
			get_template_part( 'template-parts/parts/separator/separator-triangle' );
		} elseif ( 'triangle_center' === $separator ) {
			get_template_part( 'template-parts/parts/separator/separator-triangle-center' );
		}
	?>
</div><!--/.main-visual-->
<?php endif; ?>