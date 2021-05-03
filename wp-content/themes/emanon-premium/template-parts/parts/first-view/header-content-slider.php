<?php
/**
 * Header content slider template
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$height                  = get_theme_mod( 'header_content_slider_height_'. DEVICE, 600 );
$slider_style            = get_theme_mod( 'header_content_slider_style', 'new_arrivals' );
$pick_up                 = 'pick_up'=== $slider_style ? 'emanon_featured_entry' : false;
$slider_scrol            = get_theme_mod( 'header_content_slider_scrol_post', 5 );
$slider_cat_id           = get_theme_mod( 'header_content_slider_category_id', 'Uncategorized' );
$cat_id                  = 'category'=== $slider_style ? $slider_cat_id : false;
$slider_no_sticky        = get_theme_mod( 'header_content_slider_no_sticky' );
$sticky                  = true === $slider_no_sticky ? get_option( 'sticky_posts' ) : false;
$slider_autoplay         = get_theme_mod( 'header_content_slider_autoplay_'. DEVICE, true );
$slider_fade             = get_theme_mod( 'header_content_slider_fade_pc', true );
$slider_arrows           = get_theme_mod( 'header_content_slider_arrows_'. DEVICE );
$slider_dots             = get_theme_mod( 'header_content_slider_dots_'. DEVICE );
$slider_autoplay_speed   = get_theme_mod( 'header_content_slider_autoplay_speed', 3000 );
$slider_speed            = get_theme_mod( 'header_content_slider_speed_'. DEVICE, 1500 );
$display_read_more       = get_theme_mod( 'display_header_content_slider_read_more', true );
$read_more_text          = get_theme_mod( 'header_content_slider_read_more_text', __( '続きを読む', 'emanon-premium' ) );
$featured_no_image       = get_theme_mod( 'featured_no_image_1200_675' );
if ( empty( $featured_no_image ) ) {
	$no_image = T_DIRE_URI . '/assets/images/no-img/1200_675.png';
} else {
	$no_image = esc_url( $featured_no_image );
}
$display_date            = get_theme_mod( 'display_header_content_slider_date', true );
$display_update_date     = get_theme_mod( 'display_header_content_slider_update_date' );
$display_category        = get_theme_mod( 'display_header_content_slider_category', true );
$display_comments_number = get_theme_mod( 'display_content_comments_number' );
$display_author          = get_theme_mod( 'display_header_content_slider_author' );
$user_display_name       = get_the_author_meta( 'display_name' );
$separator               = get_theme_mod( 'header_content_slider_separator', 'display_none');
$title_color             = get_theme_mod( 'header_content_slider_title_color', '#fff' );
$meta_color              = get_theme_mod( 'header_content_slider_meta_color', '#eeeff0' );
$btn_border_color        = get_theme_mod( 'header_content_slider_btn_border_color', '#fff' );
$btn_bg                  = get_theme_mod( 'header_content_slider_btn_background' );
$btn_text_color          = get_theme_mod( 'header_content_slider_btn_text_color', '#fff' );
$bg_color_start          = get_theme_mod( 'header_content_slider_background_color_start', '#000' );
$bg_color_end            = get_theme_mod( 'header_content_slider_background_color_end', '#000' );
$bg_color_degree         = get_theme_mod( 'header_content_slider_background_color_degree', 135 );
$opacity                 = get_theme_mod( 'header_content_slider_opacity', 0 );
$args = array(
	'post_type'      => 'post',
	'order'          => 'DESC',
	'orderby'        => 'post_date',
	'meta_key'       => $pick_up,
	'meta_value'     => 1,
	'no_found_rows'  => true,
	'posts_per_page' => $slider_scrol, //表示件数
	'cat'            => $cat_id, //指定カテゴリid
	'post__not_in'   => $sticky, //先頭固定ページの表示
);
$slider_query  = new WP_Query( $args );
?>

<?php if( ! is_paged() )  :?>
<div class="main-visual" style="height:<?php echo absint( $height ); ?>px;">
	<div id="js-header-content-slider" class="header-content-slider"
		data-autoplay="<?php echo esc_attr( ( $slider_autoplay == true ) ? 'true' : 'false' ); ?>"
		data-fade="<?php echo esc_attr( ( $slider_fade == true ) ? 'true' : 'false' ); ?>"
		data-arrows="<?php echo esc_attr( ( $slider_arrows == true ) ? 'true' : 'false' ); ?>"
		data-dots="<?php echo esc_attr( ( $slider_dots == true ) ? 'true' : 'false' ); ?>"
		data-autoplayspeed="<?php echo esc_attr( $slider_autoplay_speed ); ?>"
		data-speed="<?php echo esc_attr( $slider_speed ); ?>">

	<?php if( have_posts() ) : ?>
		<?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
			<?php if ( ! $display_read_more ): ?>
				<a href="<?php the_permalink() ?>">
			<?php endif; ?>
				<div class="slider-item" style="height:<?php echo absint( $height ); ?>px;">
					<?php $slider_image_id = get_post_thumbnail_id (); ?>
					<?php $slider_image_url = wp_get_attachment_image_src ( $slider_image_id, true ); ?>
					<?php if( has_post_thumbnail() ): ?>
					<div class="header-content-slider__item" style="background-image:url(<?php echo esc_url( get_emanon_post_thumbnail_url( '1200_675' ) ); ?>);"></div>
					<?php else: ?>
					<div class="header-content-slider__item" style="background-image:url(<?php echo esc_url( $no_image ); ?>);"></div>
					<?php endif; ?>

					<div class="main-visual-slider__inner">
						<div class="l-content__sm">

						<?php
							if ( $display_category ):
							$category      = get_the_category();
								if( isset ( $category ) ) {
									$cat           = $category[0];
									$cat_id        = $category[0]->cat_ID;
									$cat_name      = $cat->cat_name;
								}
							?>
							<div class="header-content-slider__cat cat-<?php echo( $cat_id ); ?>">— <?php echo $cat_name; ?> —</div>
							<?php endif; ?>
	
								<h2 class="main-visual__title"><?php
									if ( post_password_required() ) {
										echo '<i class="icon-lock"></i>';
									}
									if( mb_strlen( $post->post_title ) > 52 ) {
										$title = mb_substr( $post->post_title, 0 ,52 ) ;
										echo $title . '...';
									} else {
										echo $post->post_title;
									}
								?></h2>
	
							<?php
								$subtitle = post_custom( 'emanon_subtitle' );
								if ( $subtitle ): ?>
								<div class="main-visual__sub-title"><?php echo wp_kses_post( $subtitle ); ?></div>
							<?php endif; ?>
	
							<?php if ( $display_date ||  $display_update_date || $display_comments_number || $display_author ) :?>
								<div class="header-content-slider-meta">
									<ul>
										<?php if ( $display_date && $display_update_date ): ?>
											<li class="header-content-slider-meta__item"><time class="date published" datetime="<?php echo esc_attr( get_the_time( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></li>
										<?php elseif ( $display_date && ! $display_update_date ): ?>
											<li class="header-content-slider-meta__item"><time class="date published updated" datetime="<?php echo esc_attr( get_the_time( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></li>
										<?php endif; ?>
										<?php if ( $display_update_date && get_the_time( 'Y-m-d' ) != get_the_modified_date( 'Y-m-d' ) ): ?>
											<li class="header-content-slider-meta__item"><i class="icon-refresh-cw"></i><time class="date updated" datetime="<?php echo esc_attr( get_the_modified_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_modified_date() ); ?></time></li>
										<?php elseif ( ! $display_date && $display_update_date ): ?>
											<li class="header-content-slider-meta__item"><i class="icon-refresh-cw"></i><time class="date published updated" datetime="<?php echo esc_attr( get_the_time( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></li>
										<?php endif; ?>
										<?php if ( $display_comments_number && get_comments_number() ): ?>
											<li class="header-content-slider-meta__item"><i class="icon-bubbles"></i><?php	comments_number( '', '(1)', '(%)' ); ?></li>
										<?php endif; ?>
										<?php if ( $display_author ): ?>
											<li class="header-content-slider-meta__item"><?php echo get_avatar( get_the_author_meta( 'ID' ), 24, '', $user_display_name ); ?><?php echo esc_attr( get_the_author() ); ?></li>
										<?php endif; ?>
									</ul>
								</div>
							<?php endif; ?>

							<?php if ( $display_read_more ): ?>
							<div class="c-btn__arrow main-visual__btn">
								<a class="c-btn c-btn__outline c-btn__s" href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $read_more_text ); ?><i class="icon-read-arrow-right"></i></a>
							</div>
							<?php endif; ?>

						</div><!--/.l-content__sm-->
					</div><!--/.content-slider__item-->

				<div class="main-visual__overlay" style="background:linear-gradient(<?php echo esc_attr( $bg_color_degree ); ?>deg, <?php echo esc_attr( $bg_color_start ); ?>, <?php echo esc_attr( $bg_color_end ); ?>);opacity:<?php echo esc_attr( $opacity ); ?>;"></div>

				</div><!--/.slider-item-->
			<?php if ( ! $display_read_more ): ?>
			</a>
			<?php endif; ?>
		<?php endwhile; wp_reset_postdata(); ?>
		<?php endif; ?>

	</div><!--/#header-content-slider-->
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