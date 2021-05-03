<?php
/**
 * Header news
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$link = array(
	'news_url_1' => get_theme_mod( 'news_url_1' ),
	'news_url_2' => get_theme_mod( 'news_url_2' ),
	'news_url_3' => get_theme_mod( 'news_url_3' ),
	'news_url_4' => get_theme_mod( 'news_url_4' ),
	'news_url_5' => get_theme_mod( 'news_url_5' ),
);
$news_label = get_theme_mod( 'news_label' );
if ( $news_label ) {
	$class_label = ' header-news__label--left';
} else {
	$class_label = '';
}

$front_page   = get_theme_mod( 'display_header_news_front_page' );
$home         = get_theme_mod( 'display_header_news_home' );
$post         = get_theme_mod( 'display_header_news_post' );
$post_request = get_theme_mod( 'display_header_news_post_request' );
$page         = get_theme_mod( 'display_header_news_page' );
$archive      = get_theme_mod( 'display_header_news_archive' );
$search       = get_theme_mod( 'display_header_news_search' );
$not_fond     = get_theme_mod( 'display_header_news_404' );

if ( is_front_page() && is_home() && empty( $front_page ) ) {
	return;
} elseif ( is_front_page() && empty( $front_page ) ) {
	return;
} elseif ( is_home() && ! is_front_page() && empty( $home ) ) {
	return;
} elseif ( is_singular( array( 'post', 'news', 'seminar', 'post' ) ) && empty( $post ) ) {
	return;
} elseif ( is_singular( 'request' ) && empty( $post_request ) ) {
	return;
} elseif ( is_page()&& ! is_front_page() && empty( $page ) ) {
	return;
} elseif ( is_archive() && empty( $archive ) ) {
	return;
} elseif ( is_search() && empty( $search ) ) {
	return;
} elseif ( is_404() && empty( $not_fond ) ) {
	return;
}
?>

<div class="header-news">
	<div class="header-news__inner<?php echo esc_attr( $class_label ); ?>">
		<?php if ( $news_label ): ?>
		<div class="header-news__label"><?php echo esc_html( $news_label ); ?></div>
		<?php endif; ?>
		<ul id="js-header-news" class="header-news__slider">
			<?php for( $c=1; $c<6; $c++ ) {
			$title = get_theme_mod( 'news_title_'.$c );
			$url   = get_theme_mod( 'news_url_'.$c );
			?>
			<?php if ( $title && $url ): ?>
			<li class="header-news__item"><a href="<?php echo esc_url( $url ); ?>" class="header-news__link"><?php echo wp_kses_post( $title ); ?></a></li>
			<?php elseif ( $title ): ?>
			<li class="header-news__item"><?php echo wp_kses_post( $title ); ?></li>
			<?php endif; ?>
			<?php } ?>
		</ul>
	</div><!--/.header-news__inner-->
</div><!--/.header-news-->