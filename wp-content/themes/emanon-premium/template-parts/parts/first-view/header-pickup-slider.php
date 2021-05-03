<?php
/**
 * Header pick up slider template
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$height                = get_theme_mod( 'header_pickup_slider_height_'. DEVICE, 500 );
$slider_style          = get_theme_mod( 'header_pickup_slider_style', 'new_arrivals' );
$pick_up               = 'pick_up'=== $slider_style ? 'emanon_featured_entry' : false;
$slider_cat_id         = get_theme_mod( 'header_pickup_slider_category_id', 'Uncategorized' );
$slider_cat            = 'category'=== $slider_style ? $slider_cat_id : false;
$slider_no_sticky      = get_theme_mod( 'header_pickup_slider_no_sticky' );
$sticky                = true === $slider_no_sticky ? get_option( 'sticky_posts' ) : false;
$display_date          = get_theme_mod( 'display_header_pickup_slider_date' );
$display_cat           = get_theme_mod( 'display_header_pickup_slider_cat' );
$background_image_sp   = get_theme_mod( 'header_pickup_background_image_sp' );
if ( is_mobile() && $background_image_sp ) {
	$device              = 'sp';
} else {
	$device              = 'pc';
}
$background_image      = get_theme_mod( 'header_pickup_background_image_'. $device );
$slider_scrol_post     = get_theme_mod( 'header_pickup_slider_scrol_post', 4 );
$slider_autoplay       = get_theme_mod( 'header_pickup_slider_autoplay_'. DEVICE );
$slider_arrows         = get_theme_mod( 'header_pickup_slider_arrows_pc' );
$slider_dots           = get_theme_mod( 'header_pickup_slider_dots_'. DEVICE, true );
$slider_center_mode    = get_theme_mod( 'header_pickup_slider_center_mode_'. DEVICE );
$slider_show           = get_theme_mod( 'header_pickup_slider_show', 3 );
$slider_autoplay_speed = get_theme_mod( 'header_pickup_slider_autoplay_speed', 3000 );
$slider_speed          = get_theme_mod( 'header_pickup_slider_speed_'. DEVICE, 1500 );
$bg_color_enable       = get_theme_mod( 'header_pickup_slider_background_color_enable', true );
$bg_color_start        = get_theme_mod( 'header_pickup_slider_background_color_start', '#eeeff0' );
$bg_color_end          = get_theme_mod( 'header_pickup_slider_background_color_end', '#eeeff0');
$bg_color_degree       = get_theme_mod( 'header_pickup_slider_background_color_degree', 135 );
$opacity               = get_theme_mod( 'header_pickup_slider_opacity', 0.5 );
$featured_no_image     = get_theme_mod( 'featured_no_image_600_338' );
if ( empty( $featured_no_image ) ) {
	$no_image = T_DIRE_URI . '/assets/images/no-img/600_338.png';
} else {
	$no_image = esc_url( $featured_no_image );
}
$args = array(
	'post_type'      => 'post',
	'order'          => 'DESC',
	'orderby'        => 'post_date',
	'meta_key'       => $pick_up,
	'meta_value'     => 1,
	'no_found_rows'  => true,
	'posts_per_page' => $slider_scrol_post, //表示件数
	'cat'            => $slider_cat, //指定カテゴリid
	'post__not_in'   => $sticky, //先頭固定ページの表示
);
$query  = new WP_Query( $args );
?>

<?php if( ! is_paged() ):?>
<div class="main-visual">
<div class="header-pickup-slider" style="height:<?php echo absint( $height ); ?>px;<?php if ( $background_image ): ?> background-image:url(<?php echo esc_url( $background_image ); ?><?php endif; ?>">
	<div id="js-header-pickup-slider" class="l-content header-pickup-slider__content"
		data-autoplay="<?php echo esc_attr( ( $slider_autoplay == true ) ? 'true' : 'false' ); ?>"
		data-arrows="<?php echo esc_attr( ( $slider_arrows == true ) ? 'true' : 'false' ); ?>"
		data-dots="<?php echo esc_attr( ( $slider_dots == true ) ? 'true' : 'false' ); ?>"
		data-centermode="<?php echo esc_attr( ( $slider_center_mode === true ) ? 'true' : 'false' ); ?>"
		data-show="<?php echo esc_attr( $slider_show ); ?>"
		data-autoplayspeed="<?php echo esc_attr( $slider_autoplay_speed ); ?>"
		data-speed="<?php echo esc_attr( $slider_speed ); ?>">
	<?php if( have_posts() ): ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="header-pickup-slider__item u-shadow u-img-overlay">
			<a href="<?php the_permalink() ?>">
				<div class="header-pickup-slider__thumbnail">
					<?php if ( has_post_thumbnail() ): ?>
						<?php the_post_thumbnail( '600_338' ); ?>
					<?php else: ?>
						<img src="<?php echo esc_url( $no_image ); ?>" alt="No image" >
					<?php endif; ?>
				</div>
				<div class="header-pickup-slider__inner">
					<h2 class="header-pickup-slider__title"><?php
							if ( post_password_required() ) {
								echo '<i class="icon-lock"></i>';
							}
							if( mb_strlen( $post->post_title ) > 40 ) {
								$title = mb_substr( $post->post_title, 0 ,38 );
								echo $title . '...';
							} else {
								echo $post->post_title;
							}
							?></h2>
				</div>
			<?php if ( $display_date || $display_cat ): ?>
			<div class="header-pickup-slider__meta">
				<?php if ( $display_date ): ?>
				<time class="date published" datetime="<?php esc_attr( get_the_time( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				<?php endif; ?>
				<?php if ( $display_cat ): ?>
				<?php emanon_header_pickup_slider_category(); ?>
				<?php endif; ?>
			</div>
				<?php endif; ?>
			</a>
		</div>
		<?php endwhile; wp_reset_postdata(); ?>
	<?php endif; ?>
	</div><!--/#header-pickup-slider-->
<?php if ( $bg_color_enable ): ?>
		<div class="main-visual__overlay" style="background:linear-gradient(<?php echo esc_attr( $bg_color_degree ); ?>deg, <?php echo esc_attr( $bg_color_start ); ?>, <?php echo esc_attr( $bg_color_end ); ?>);opacity:<?php echo esc_attr( $opacity ); ?>;"></div>
<?php endif; ?>
</div><!--/.mheader-pickup-slider-->
</div><!--/.main-visuarl-->
<?php endif; ?>
