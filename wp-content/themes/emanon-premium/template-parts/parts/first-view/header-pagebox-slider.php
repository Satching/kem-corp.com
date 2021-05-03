<?php
/**
 * Header pagebox template
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( is_mobile() ) {
	$height              = get_theme_mod( 'header_pagebox_slider_height_sp', 500 );
} else {
	$height              = get_theme_mod( 'header_pagebox_slider_height_pc', 750 );
}
$btn_text              = get_theme_mod( 'header_pagebox_slider_btn_text' );
$btn_microcopy         = get_theme_mod( 'header_pagebox_slider_btn_microcopy' );
$pagebox_label         = get_theme_mod( 'display_header_pagebox_label', true );
$pagebox_title         = get_theme_mod( 'display_header_pagebox_title', true );
$display_read_more     = get_theme_mod( 'display_header_pagebox_slider_read_more', true );
$read_more_text        = get_theme_mod( 'header_pagebox_slider_read_more_text', __( '続きを読む', 'emanon-premium' ) );
$slider_autoplay       = get_theme_mod( 'header_pagebox_autoplay_'. DEVICE, true );
$slider_autoplay_speed = get_theme_mod( 'header_pagebox_autoplay_speed', 3000 );
$slider_speed          = get_theme_mod( 'header_pagebox_slider_speed_'. DEVICE, 1500 );
$bg_color_start        = get_theme_mod( 'header_pagebox_slider_background_color_start', '#000' );
$bg_color_end          = get_theme_mod( 'header_pagebox_slider_background_color_end', '#000' );
$bg_color_degree       = get_theme_mod( 'header_pagebox_slider_background_color_degree', 135 );
$opacity               = get_theme_mod( 'header_pagebox_slider_opacity', 0.3 );
$page_ids = array(
	'page_id_1'  => get_theme_mod( 'header_pagebox_setting_1' ),
	'page_id_2'  => get_theme_mod( 'header_pagebox_setting_2' ),
	'page_id_3'  => get_theme_mod( 'header_pagebox_setting_3' ),
	'page_id_4'  => get_theme_mod( 'header_pagebox_setting_4' ),
	'page_id_5'  => get_theme_mod( 'header_pagebox_setting_5' ),
	'page_id_6'  => get_theme_mod( 'header_pagebox_setting_6' ),
	'page_id_7'  => get_theme_mod( 'header_pagebox_setting_7' ),
	'page_id_8'  => get_theme_mod( 'header_pagebox_setting_8' ),
	'page_id_9'  => get_theme_mod( 'header_pagebox_setting_9' ),
	'page_id_10' => get_theme_mod( 'header_pagebox_setting_10' ),
);
?>
<?php if( ! is_paged() ) :?>
<div class="main-visual" >
	<div id="js-pagebox-slider" style="height:<?php echo absint( $height ); ?>px;">
		<?php
			$c = 1;
			foreach ( $page_ids as $page_id ):
		?>
		<?php if ( $page_id ): ?>
			<?php
				$get_thumbnail     = get_the_post_thumbnail_url( $page_id, '1200_675' );
				$featured_no_image = get_theme_mod( 'featured_no_image_1200_675' );
				if ( empty( $featured_no_image ) ) {
					$no_image = T_DIRE_URI . '/assets/images/no-img/1200_675.png';
				} else {
					$no_image = esc_url( $featured_no_image );
				}
				if ( empty( $get_thumbnail ) ) {
					$thumbnail  = $no_image;
				} else {
					$thumbnail  = $get_thumbnail;
				}
				$label        = get_theme_mod( 'header_pagebox_label_'.$c );
				$title        = get_theme_mod( 'header_pagebox_title_'.$c );
				$message      = get_theme_mod( 'header_pagebox_message_'.$c );
				$page_link    = get_page_link( $page_id )
			?>
			<div class="header-pagebox-slider">
				<?php if ( ! $display_read_more ): ?>
				<a href="<?php echo esc_url( $page_link ); ?>">
				<?php endif; ?>
					<div class="header-pagebox-slider__background" style="background-image: url(<?php echo esc_url( $thumbnail ); ?>);">
						<div class="main-visual__overlay" style="background:linear-gradient(<?php echo esc_attr( $bg_color_degree ); ?>deg, <?php echo esc_attr( $bg_color_start ); ?>, <?php echo esc_attr( $bg_color_end ); ?>);opacity:<?php echo esc_attr( $opacity ); ?>;"></div>
							<div class="header-pagebox-slider__inner">
								<div class="l-content__sm">
									<?php if( $label ): ?>
									<span class="header-pagebox-slider__label"><?php echo wp_kses_post( $label ); ?></span>
									<?php endif; ?>
									<?php if( $title ): ?>
									<h2 class="main-visual__title"><?php echo nl2br( wp_kses_post( $title ) ); ?></h2>
									<?php endif; ?>
									<?php if ( $message ): ?>
									<div class="main-visual__message">
									<?php echo nl2br( wp_kses_post( $message ) ); ?>
									</div>
									<?php endif; ?>
								<?php if ( $display_read_more ): ?>
									<div class="c-btn__arrow main-visual__btn">
										<a class="c-btn c-btn__outline c-btn__s" href="<?php echo esc_url( $page_link ); ?>"><?php echo wp_kses_post( $read_more_text ); ?><i class="icon-read-arrow-right"></i></a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php if ( ! $display_read_more ): ?>
				</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php
			$c++;
			endforeach;
		?>
	</div><!--/#main-visual-pagebox-slider-->

	<div id="js-pagebox-slider-thumbnail"
		class="header-pagebox-slider__thumbnail l-content"
		data-autoplay="<?php echo esc_attr( ( $slider_autoplay == true ) ? 'true' : 'false' ); ?>"
		data-autoplayspeed="<?php echo esc_attr( $slider_autoplay_speed ); ?>"
		data-speed="<?php echo esc_attr( $slider_speed ); ?>">
		<?php
			$c = 1;
			foreach ( $page_ids as $page_id  ):
		?>
		<?php if ( $page_id ): ?>
			<?php
				$image             = get_the_post_thumbnail_url( $page_id, '600_338' );
				$featured_no_image = get_theme_mod( 'featured_no_image_600_338' );
				if ( ! $featured_no_image ) {
					$no_image = T_DIRE_URI . '/assets/images/no-img/600_338.png';
				} else {
					$no_image = esc_url( $featured_no_image );
				}
				if ( $image ) {
					$thumbnail_src = $image;
				} else {
					$thumbnail_src = $no_image;
				}
				$label        = get_theme_mod( 'header_pagebox_label_'.$c );
				$title        = get_theme_mod( 'header_pagebox_title_'.$c );
				$target_brank = get_theme_mod( 'header_pagebox_target_brank_'.$c );
			?>
			<div class="slider-item u-img-overlay u-img-effect-border">
					<?php if ( $thumbnail ): ?>
					<img src="<?php echo $thumbnail_src; ?>" alt="<?php echo ( $title ); ?>" />
					<?php endif; ?>
					<div class="header-pagebox-slider__inner">
						<?php if( $label && $pagebox_label ): ?>
						<span class="header-pagebox-slider__label"><?php echo wp_kses_post( $label ); ?></span>
						<?php endif; ?>
						<?php if( $title && $pagebox_title ): ?>
						<h3 class="header-pagebox-slider__title"><?php echo wp_kses_post( $title ); ?></h2>
						<?php endif; ?>
					</div>
			</div>
		<?php endif; ?>
		<?php
			$c++;
			endforeach;
		?>
	</div><!--/#main-visual-pagebox-slider-->
</div><!--/.main-visual-->
<?php endif; ?>