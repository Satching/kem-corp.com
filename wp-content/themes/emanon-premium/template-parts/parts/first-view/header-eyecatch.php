<?php
/**
 * Header eyecatch template
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$layout                   = get_theme_mod( 'header_eyecatch_layout', 'title' );
if ( 'eyecatch_title' === $layout ) {
	$class_content          = 'l-content__sm';
} else {
	$class_content          = 'l-content';
}
$reverse                  = get_theme_mod( 'header_eyecatch_layout_reverse' );
$arrangement              = get_theme_mod( 'header_eyecatch_arrangement', 'center' );
if ( 'eyecatch' === $layout && 'left' === $arrangement || 'title' === $layout && 'left' === $arrangement ||'movie' === $layout && 'left' === $arrangement ) {
	$class_justify_content  = 'u-row-cont-start';
} elseif ( 'eyecatch' === $layout && 'right' === $arrangement || 'title' === $layout && 'right' === $arrangement ||'movie' === $layout && 'right' === $arrangement ) {
	$class_justify_content  = 'u-row-cont-end';
} else {
	$class_justify_content  = 'u-row-cont-center';
}
$background_image_sp      = get_theme_mod( 'header_eyecatch_background_image_sp' );
$background_image_pc      = get_theme_mod( 'header_eyecatch_background_image_pc', get_theme_file_uri('/assets/images/emanon-premium.jpg') );
if ( is_mobile() && $background_image_sp ) {
	$background_image       = get_theme_mod( 'header_eyecatch_background_image_sp' );
} elseif ( $background_image_pc ) {
	$background_image       = get_theme_mod( 'header_eyecatch_background_image_pc', get_theme_file_uri('/assets/images/emanon-premium.jpg') );
} else {
	$background_image       = '';
}
$height                   = get_theme_mod( 'header_eyecatch_height_'. DEVICE, 500 );
$particles_background     = get_theme_mod( 'header_eyecatch_particles_background' );
$particles_speed          = get_theme_mod( 'header_eyecatch_particles_shape_speed', 3 );
$particles_value          = get_theme_mod( 'header_eyecatch_particles_shape_value', 80 );
$particles_size           = get_theme_mod( 'header_eyecatch_particles_shape_size', 5 );
$particles_border_width   = get_theme_mod( 'header_eyecatch_particles_border_width', 2 );
$particles_shape_type     = get_theme_mod( 'header_eyecatch_particles_shape_type', 'circle' );
$particles_linked         = get_theme_mod( 'header_eyecatch_particles_linked', true );
$particles_random_size    = get_theme_mod( 'header_eyecatch_particles_shape_random_size' );
$particles_shape_opacity  = get_theme_mod( 'header_eyecatch_particles_shape_opacity', 0.6 );
$particles_border_opacity = get_theme_mod( 'header_eyecatch_particles_border_opacity', 0.6 );
$particles_opacity_anime  = get_theme_mod( 'header_eyecatch_opacity_anime' );
$particles_size_anime     = get_theme_mod( 'header_eyecatch_size_anime' );
$particles_shape_color    = get_theme_mod( 'header_eyecatch_particles_shape_color', '#fff' );
$particles_border_color   = get_theme_mod( 'header_eyecatch_particles_border_color', '#fff' );
$title                    = get_theme_mod( 'header_eyecatch_title' );
$message                  = get_theme_mod( 'header_eyecatch_message' );
$message_center           = get_theme_mod( 'header_eyecatch_message_center', true );
$shortcode                = get_theme_mod( 'header_eyecatch_shortcode' );
$mp4_id                   = get_theme_mod( 'header_eyecatch_mp4' );
$mp4                      = wp_get_attachment_url( $mp4_id );
$mp4_image                = get_theme_mod( 'header_eyecatch_mp4_image' );
$height                   = get_theme_mod( 'header_eyecatch_height_'. DEVICE, 500 );
$autoplay                 = get_theme_mod( 'header_eyecatch_mp4_autoplay_'. DEVICE, true );
$loop                     = get_theme_mod( 'header_eyecatch_mp4_loop_'. DEVICE, true );
$muted                    = get_theme_mod( 'header_eyecatch_mp4_muted_'. DEVICE, true );
$controls                 = get_theme_mod( 'header_eyecatch_mp4_controls_'. DEVICE, true );
$btn_url                  = get_theme_mod( 'header_eyecatch_btn_url' );
$btn_text                 = get_theme_mod( 'header_eyecatch_btn_text' );
$target_brank             = get_theme_mod( 'header_eyecatch_target_brank' );
$btn_microcopy            = get_theme_mod( 'header_eyecatch_btn_microcopy' );
$search_form              = get_theme_mod( 'display_header_eyecatch_search_form' );
$eyecatch_image_sp        = get_theme_mod( 'header_eyecatch_image_sp' );
if ( is_mobile() && $eyecatch_image_sp ) {
	$eyecatch_image         = get_theme_mod( 'header_eyecatch_image_sp' );
} else {
	$eyecatch_image         = get_theme_mod( 'header_eyecatch_image_pc' );
}
$bg_color_start           = get_theme_mod( 'header_eyecatch_background_color_start', '#000' );
$bg_color_end             = get_theme_mod( 'header_eyecatch_background_color_end', '#000' );
$bg_color_degree          = get_theme_mod( 'header_eyecatch_background_color_degree', 135 );
$separator                = get_theme_mod( 'header_eyecatch_separator', 'display_none');
$opacity                  = get_theme_mod( 'header_eyecatch_opacity', 0 );
?>

<?php if( ! is_paged() ) :?>
<div class="main-visual">
	<div class="header-eyecatch" style="height:<?php echo absint( $height ); ?>px;<?php if ( $background_image ): ?> background-image:url(<?php echo esc_url( $background_image ); ?><?php endif; ?>">

		<?php if ( $particles_background ): ?>
		<div id="js-particles"
		data-shapeSpeed ="<?php echo ( $particles_speed ); ?>"
		data-shapeValue ="<?php echo ( $particles_value ); ?>"
		data-shapeSize ="<?php echo ( $particles_size ); ?>"
		data-borderWidth ="<?php echo ( $particles_border_width ); ?>"
		data-shapeRandomSize ="<?php echo ( ( true == $particles_random_size ) ? true : false ); ?>"
		data-shapeType ="<?php echo ( $particles_shape_type ); ?>"
		data-shapeLinked ="<?php echo ( ( true == $particles_linked ) ? true : false ); ?>"
		data-opacityAnime ="<?php echo ( ( true == $particles_opacity_anime ) ? true : false ); ?>"
		data-sizeAnime ="<?php echo ( ( true == $particles_size_anime ) ? true : false ); ?>"
		data-shapeOpacity ="<?php echo sprintf('%0.2f', $particles_shape_opacity ); ?>"
		data-borderOpacity ="<?php echo sprintf('%0.2f', $particles_border_opacity ); ?>"
		data-shapeColor ="<?php echo ( $particles_shape_color ); ?>"
		data-borderColor ="<?php echo ( $particles_border_color ); ?>"
		></div>
		<?php endif; ?>

		<div class="<?php echo esc_attr( $class_content ); ?> header-eyecatch__item">
			<div class="u-row u-row-wrap wrapper-col<?php echo esc_attr( ( $reverse ) ? ' u-row-dir-reverse' : '' ); ?> u-row-item-center <?php echo esc_attr( $class_justify_content ); ?>">

				<?php if ( 'eyecatch_title' === $layout ): ?>
					<?php if ( $eyecatch_image ): ?>
					<div class="col-6 u-row u-row-dir-column u-row-cont-center u-row-item-center">
						<div class="header-eyecatch__image">
							<img src="<?php echo esc_url( $eyecatch_image ); ?>">
						</div>
					</div>
					<?php endif; ?>
					<?php if ( $title || $message || $btn_url ): ?>
						<div class="col-6 u-row u-row-dir-column u-row-cont-center u-row-item-center">
							<?php if ( $title ): ?>
							<h2 class="main-visual__title"><?php echo nl2br( wp_kses_post( $title ) ); ?></h2>
							<?php endif; ?>
							<?php if ( $message ): ?>
							<div class="main-visual__message<?php if ( $message_center ) { ?> u-text-align-center<?php } else { ?> u-text-align-left<?php } ?>">
								<?php echo nl2br( wp_kses_post( $message ) ); ?>
							</div>
							<?php endif; ?>
							<?php if ( $btn_url ): ?>
							<div class="main-visual__btn">
								<a class="c-btn c-btn__outline c-btn__m" href="<?php echo esc_url( $btn_url ); ?>"<?php if ( $target_brank ) { echo ' target="_blank" rel="noopener"'; } ?>><?php echo wp_kses_post( $btn_text ); ?></a>
							</div>
							<?php endif; ?>
							<?php if ( $btn_microcopy ): ?>
							<span class="main-visual__microcopy"><?php echo wp_kses_post( $btn_microcopy ); ?></span>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				<!--/ eyecatch_title-->

				<?php elseif ( 'eyecatch_shortcode' === $layout || 'title_shortcode' === $layout ): ?>
					<?php if ( 'eyecatch_shortcode' === $layout && $eyecatch_image ): ?>
					<div class="col-6 u-row u-row-dir-column u-row-cont-center u-row-item-center">
						<div class="header-eyecatch__image">
							<img src="<?php echo esc_url( $eyecatch_image ); ?>">
						</div>
					</div>
					<?php endif; ?>
					<?php if ( 'title_shortcode' === $layout ): ?>
						<?php if ( $title || $message || $btn_url ): ?>
							<div class="col-7 u-row u-row-dir-column u-row-cont-center u-row-item-center">
								<?php if ( $title ): ?>
								<h2 class="main-visual__title"><?php echo nl2br( wp_kses_post( $title ) ); ?></h2>
								<?php endif; ?>
								<?php if ( $message ): ?>
								<div class="main-visual__message<?php if ( $message_center ) { ?> u-text-align-center<?php } else { ?> u-text-align-left<?php } ?>">
									<?php echo nl2br( wp_kses_post( $message ) ); ?>
								</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
					<?php if ( $shortcode || $btn_url ): ?>
						<div class="col-5">
							<div class="u-display-pc header-eyecatch__form">
							<?php echo do_shortcode( $shortcode ); ?>
							</div>
						</div>
					<?php endif; ?>
				<!--/ eyecatch_shortcode || title_shortcode-->

				<?php elseif ( 'eyecatch_movie' === $layout || 'title_movie' === $layout ): ?>
					<?php if ( 'eyecatch_movie' === $layout ): ?>
					<div class="col-6 u-row u-row-dir-column u-row-cont-center u-row-item-center">
						<div class="header-eyecatch__image">
						<?php if ( $eyecatch_image ): ?>
							<img src="<?php echo esc_url( $eyecatch_image ); ?>">
						<?php endif; ?>
						<?php if ( $btn_url ): ?>
						<div class="u-display-pc main-visual__btn">
							<a class="c-btn c-btn__outline c-btn__m" href="<?php echo esc_url( $btn_url ); ?>"<?php if ( $target_brank ) { echo ' target="_blank" rel="noopener"'; } ?>><?php echo wp_kses_post( $btn_text ); ?></a>
						</div>
						<?php endif; ?>
						<?php if ( $btn_microcopy ): ?>
						<span class="u-display-pc main-visual__microcopy"><?php echo wp_kses_post( $btn_microcopy ); ?></span>
						<?php endif; ?>
						</div>
					</div>
					<?php endif; ?>
					<?php if ( 'title_movie' === $layout ): ?>
					<div class="col-6">
						<?php if ( $title ): ?>
						<h2 class="main-visual__title"><?php echo nl2br( wp_kses_post( $title ) ); ?></h2>
						<?php endif; ?>
						<?php if ( $message ): ?>
						<div class="main-visual__message<?php if ( $message_center ) { ?> u-text-align-center<?php } else { ?> u-text-align-left<?php } ?>">
							<?php echo nl2br( wp_kses_post( $message ) ); ?>
						</div>
						<?php endif; ?>
						<?php if ( $btn_url ): ?>
						<div class="u-display-pc main-visual__btn">
							<a class="c-btn c-btn__outline c-btn__m" href="<?php echo esc_url( $btn_url ); ?>"<?php if ( $target_brank ) { echo ' target="_blank" rel="noopener"'; } ?>><?php echo wp_kses_post( $btn_text ); ?></a>
						</div>
						<?php endif; ?>
						<?php if ( $btn_microcopy ): ?>
							<span class="u-display-pc main-visual__microcopy"><?php echo wp_kses_post( $btn_microcopy ); ?></span>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					<div class="col-6 header-eyecatch__movie">
					<?php if ( $mp4 ): ?>
						<video playsinline <?php if ( $autoplay ) { ?>autoplay<?php } ?> <?php if ( $loop ) { ?>loop<?php } ?> <?php if ( $muted ) { ?>muted<?php } ?> <?php if ( $controls ) { ?>controls<?php } ?> id="js-header-eyecatch-video" poster="<?php echo ( $mp4_image ); ?>" >
							<source src="<?php echo ( $mp4 ); ?>" type="video/mp4" />
						</video>
					<?php endif; ?>
					<?php if ( $btn_url ): ?>
						<div class="u-display-sp main-visual__btn">
							<a class="c-btn c-btn__outline c-btn__m" href="<?php echo esc_url( $btn_url ); ?>"<?php if ( $target_brank ) { echo ' target="_blank" rel="noopener"'; } ?>><?php echo wp_kses_post( $btn_text ); ?></a>
						</div>
					<?php endif; ?>
					<?php if ( $btn_microcopy ): ?>
					<div class="u-display-sp main-visual__microcopy"><?php echo wp_kses_post( $btn_microcopy ); ?></div>
					<?php endif; ?>
				</div>
				<!--/ eyecatch_movie || title_movie-->

				<?php elseif ( 'eyecatch_search' === $layout || 'title_search' === $layout ): ?>
				<div class="col-12">
					<div class="header-eyecatch__search">
						<?php if ( $eyecatch_image && 'eyecatch_search' === $layout ): ?>
						<img src="<?php echo esc_url( $eyecatch_image ); ?>">
						<?php endif; ?>
						<?php if ( $title && 'title_search' === $layout ): ?>
						<h2 class="main-visual__title"><?php echo nl2br( wp_kses_post( $title ) ); ?></h2>
						<?php endif; ?>
						<?php if ( $message ): ?>
						<div class="main-visual__message<?php if ( $message_center ) { ?> u-text-align-center<?php } else { ?> u-text-align-left<?php } ?>">
							<?php echo nl2br( wp_kses_post( $message ) ); ?>
						</div>
						<?php endif; ?>
						<?php get_template_part( 'searchform-custom' ); ?>
					</div><!--/ header-eyecatch__search-->
				</div><!--/ col-12-->
				<!--/ eyecatch search && title search-->

				<?php elseif ( 'eyecatch' === $layout ): ?>
				<div class="col-6">
					<div class="header-eyecatch__image">
						<?php if ( $eyecatch_image ): ?>
						<img src="<?php echo esc_url( $eyecatch_image ); ?>">
						<?php endif; ?>
						<?php if ( $btn_url ): ?>
						<div class="main-visual__btn">
							<a class="c-btn c-btn__outline c-btn__sm" href="<?php echo esc_url( $btn_url ); ?>"<?php if ( $target_brank ) { echo ' target="_blank" rel="noopener"'; } ?>><?php echo wp_kses_post( $btn_text ); ?></a>
						</div>
						<?php endif; ?>
						<?php if ( $btn_microcopy ): ?>
						<span class="main-visual__microcopy"><?php echo wp_kses_post( $btn_microcopy ); ?></span>
						<?php endif; ?>
					</div>
				</div><!--/ col-6-->
				<!--/ eyecatch-->

				<?php elseif ( 'movie' === $layout ): ?>
				<div class="header-eyecatch__movie">
					<?php if ( $mp4 ): ?>
						<video playsinline <?php if ( $autoplay ) { ?>autoplay<?php } ?> <?php if ( $loop ) { ?>loop<?php } ?> <?php if ( $muted ) { ?>muted<?php } ?> <?php if ( $controls ) { ?>controls<?php } ?> id="js-header-eyecatch-video" poster="<?php echo ( $mp4_image ); ?>" >
							<source src="<?php echo ( $mp4 ); ?>" type="video/mp4" />
						</video>
					<?php endif; ?>
				</div><!--/ col-6-->
				<!--/ movie-->

				<?php elseif ( 'title' === $layout ): ?>
					<?php if ( $title || $message || $btn_url ): ?>
					<div class="col-6">
						<?php if ( $title ): ?>
						<h2 class="main-visual__title"><?php echo nl2br( wp_kses_post( $title ) ); ?></h2>
						<?php endif; ?>
						<?php if ( $message ): ?>
						<div class="main-visual__message<?php if ( $message_center ) { ?> u-text-align-center<?php } else { ?> u-text-align-left<?php } ?>">
							<?php echo nl2br( wp_kses_post( $message ) ); ?>
						</div>
						<?php endif; ?>
						<?php if ( $btn_url ): ?>
						<div class="main-visual__btn">
							<a class="c-btn c-btn__outline c-btn__sm" href="<?php echo esc_url( $btn_url ); ?>"<?php if ( $target_brank ) { echo ' target="_blank" rel="noopener"'; } ?>><?php echo wp_kses_post( $btn_text ); ?></a>
						</div>
						<?php endif; ?>
						<?php if ( $btn_microcopy ): ?>
						<span class="main-visual__microcopy"><?php echo wp_kses_post( $btn_microcopy ); ?></span>
						<?php endif; ?>
					</div><!--/ col-6-->
					<?php endif; ?>
				<?php endif; ?>
				<!--/ title-->

			</div><!--/.l-content__sm .header-eyecatch__item-->
		</div><!--/.u-row-->
	
		<div class="main-visual__overlay" style="background:linear-gradient(<?php echo esc_attr( $bg_color_degree ); ?>deg, <?php echo esc_attr( $bg_color_start ); ?>, <?php echo esc_attr( $bg_color_end ); ?>);opacity:<?php echo esc_attr( $opacity ); ?>;"></div>

	</div><!--/.header-eyecatch-->

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