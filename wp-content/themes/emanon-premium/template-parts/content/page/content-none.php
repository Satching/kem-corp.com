<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$article_body_width = get_theme_mod( 'article_body_width', 'paragraph__normal' );
$h2_design          = get_theme_mod( 'h2_design', 'h2-none-style' );
$h3_design          = get_theme_mod( 'h3_design', 'h3-none-style' );
$h4_design          = get_theme_mod( 'h4_design', 'h4-none-style' );
$article_classes = array(
	'article',
	$article_body_width,
	$h2_design,
	$h3_design,
	$h4_design,
);
$class_font_sp = get_theme_mod( 'p_font_size_sp', 'u-font-size-sp__m' );
$class_font_pc = get_theme_mod( 'p_font_size_pc', 'u-font-size-pc__m' );
?>

<article <?php post_class( $article_classes ); ?>>
	<header class="article-header">
		<div class="article-header__inner">
		<h1 class="article-title"><?php _e( 'ページが見つかりません', 'emanon-premium' ); ?></h1>
		</div>
	</header>
	<div class="article-body <?php echo esc_attr( $class_font_sp ); ?> <?php echo esc_attr( $class_font_pc ); ?>">
		<p><?php _e( 'あなたがアクセスしようとしたページは削除されたかURLが変更されています。URLをご確認いただくか、ページ検索または下記カテゴリーからお探しください。', 'emanon-premium' ); ?></p>
		<h2><?php _e( '検索してページを探す', 'emanon-premium' ); ?></h2>
		<p><?php _e( '検索ボックスにお探しのページに関連するキーワードを入力し、検索ボタンをクリックしてください。', 'emanon-premium' ); ?></p>
		<?php get_search_form(); ?>
		<h3><?php _e( 'カテゴリーリストからページを探す', 'emanon-premium' ); ?></h3>
		<ul>
			<?php // 見出し「カテゴリー」の除去
				$args = array(
				'title_li' => '',
			); ?>
			<?php wp_list_categories( $args ); ?>
		</ul>
	</div>
</article>