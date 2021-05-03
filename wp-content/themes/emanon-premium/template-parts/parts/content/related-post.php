<?php
/**
 * Related post
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$title              = get_theme_mod( 'related_post_title', __( '関連記事', 'emanon-premium' ) );
$date               = get_theme_mod( 'display_related_post_date' );
$col                = get_theme_mod( 'related_post_layout', 'col-6' );
$slider             = get_theme_mod( 'related_slider_sp' );
if ( is_mobile() && 'col-6' === $col && $slider ) {
$col                = 'col-4';
}
$max                = get_theme_mod( 'related_post_max', 4 );
$order              = get_theme_mod( 'related_post_order', 'rand' );
$related_post_style = get_theme_mod( 'related_post_style', 'category' );
$categories         = get_the_category( $post->ID );
$category_ID        = array();
foreach( $categories as $category ):
array_push( $category_ID, $category -> cat_ID );
endforeach ;
$category           = 'category'=== $related_post_style ? $category_ID  : false;
$user_id            = get_the_author_meta( 'ID' );
$author             = 'author'=== $related_post_style ? $user_id  : false;
$args = array(
	'post__not_in'   => array( $post -> ID ),
	'posts_per_page' => intval( $max ),
	'category__in'   => $category, // カテゴリーID
	'author'         => $author, // 著者ID
	'order'          => 'DESC',
	'orderby'        => $order,
	'no_found_rows'  => true,
);
$query = new WP_Query( $args );
$display_featured_image = get_theme_mod( 'display_featured_image_related_post' );
if ( 'col-6' === $col ) {
	$size    = '160_160';
} elseif ( is_mobile() && 'col-4' === $col && $slider ) {
	$size    = '600_338';
} elseif ( 'col-4' === $col ) {
	$size    = '600_338';
}
$featured_no_image = get_theme_mod( 'featured_no_image_'. $size );
if( $display_featured_image ) {
	$class_image = ' has_thumbnail';
} else {
	$class_image = '';
}
if ( empty( $featured_no_image ) ) {
	$no_image = T_DIRE_URI . '/assets/images/no-img/'. $size .'.png';
} else {
	$no_image = esc_url( $featured_no_image );
}
?>

<aside class="related-posts">
	<?php if ( $title ): ?>
	<h3 class="related-posts__title"><?php echo esc_html( $title ); ?></h3>
	<?php endif; ?>
	<?php if( $query -> have_posts() ): ?>
	<div class="u-row u-row-wrap wrapper-col<?php if ( 'col-4' === $col && $slider ) { ?> u-post-scroll<?php } ?> related-post-list">
		<?php while ( $query -> have_posts()) : $query -> the_post(); ?>
		<div class="<?php echo esc_attr( $col ); ?> related-post-list__item u-shadow-border<?php echo esc_attr( $class_image ); ?><?php if ( 'col-4' === $col && $slider ) { ?> u-post-scroll__item<?php } ?>">
			<a href="<?php the_permalink(); ?>">
				<?php if ( $display_featured_image ): ?>
				<div class="related-post-list__thumbnail">
					<?php if ( has_post_thumbnail() ): ?>
					<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), $size ); ?>" alt="<?php echo get_the_title(); ?>">
					<?php else: ?>
					<img src="<?php echo $no_image; ?>" alt="no image">
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<div class="related-post-list__body">
					<?php if ( $date ): ?>
					<time class="published" datetime="<?php echo esc_html( get_the_date() ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					<?php endif; ?>
					<h4 class="related-post-list__title"><?php
						if ( post_password_required() ) {
							echo '<i class="icon-lock"></i>';
						}
						if( mb_strlen( $post-> post_title ) > 38 ) {
							$title = mb_substr( $post -> post_title, 0, 36 );
							echo $title. '...' ;
						} else {
							echo $post -> post_title;
						} ?></h4>
				</div>
			</a>
		</div>
		<?php endwhile;?>
	</div>
	<?php else:?>
	<p><?php _e( '関連記事はありません', 'emanon-premium' ); ?></p>
	<?php endif; wp_reset_postdata(); ?>
</aside>