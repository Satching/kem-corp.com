<?php
/**
 * Template part for layout in front-page.php
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$news    = get_theme_mod( 'display_header_news_' . DEVICE );
$col     = get_theme_mod( 'front_page_layout', 'two-r-col' );
$content = get_theme_mod( 'display_content_show_on_front' );
?>

<div id="contents">
	<?php
		if ( $news ) {
			get_template_part( 'template-parts/parts/header/header-news' );
		}
	?>

	<?php if ( 'page' === get_option( 'show_on_front' ) ): // 表示設定：ホームページの表示:固定ページ ?>

	<?php
		if ( ! is_paged() && is_active_sidebar( 'front-top-section-widget' ) ) {
			dynamic_sidebar( 'front-top-section-widget' );
		}
	?>

	<?php if ( $content ): ?>
	<div class="l-content">
		<div class="l-content__inner">
		<div class="u-row <?php echo esc_attr( $col ); ?>">
			<div class="l-content__main">
			<?php
				if ( ! is_paged() && is_active_sidebar( 'front-top-content-widget' ) ) {
					dynamic_sidebar( 'front-top-content-widget' );
				}

				get_template_part( 'template-parts/content/page/content-show-on-front' );

				if ( ! is_paged() && is_active_sidebar( 'front-bottom-content-widget' ) ) {
					dynamic_sidebar( 'front-bottom-content-widget' );
				}
			?>
			</div>
			<?php
				if ( 'one-col' !== $col ) {
					get_sidebar();
				}
			?>
		</div><!--/.u-row-->
		</div><!--/.l-content__inner-->
	</div><!--/.l-content-->
	<?php endif; ?>

	<?php
		if ( ! is_paged() && is_active_sidebar( 'front-bottom-section-widget' ) ) {
			dynamic_sidebar( 'front-bottom-section-widget' );
		}
	?>

	<?php else : // 表示設定：ホームページの表示:最新の投稿 ?>

	<div class="l-content">
		<div class="l-content__inner">
			<div class="u-row <?php echo esc_attr( $col ); ?>">
			<?php
				get_template_part( 'template-parts/content/page/content-front-page' );
				if ( 'one-col' !== $col ) {
					get_sidebar();
				}
			?>
			</div><!--/.u-row-->
			</div><!--/.l-content__inner-->
		</div><!--/.l-content-->

	<?php endif; ?>

</div><!--/#contents-->