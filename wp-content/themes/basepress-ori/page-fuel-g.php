<?php get_header();?>
<div id="primary" class="content-area">
	<main id="main" class="site-main classification_archive" role="main">
		<?php
		query_posts( array(
			'post_type' => 'product', //カスタム投稿名を指定
			'taxonomy' => 'classification', //タクソノミー名を指定
			'term' => 'fuel-g', //タームのスラッグを指定
			'posts_per_page' => -1 ///表示件数（-1で全ての記事を表示）
		) );
		?>
		<?php if(have_posts()): ?>
		<?php
		while ( have_posts() ): the_post();
		get_template_part( 'template-parts/content', 'archive-classification' );
		endwhile;
		else :?>
		こちらの商品は取り扱っておりません
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</main>
	<!-- #main -->
</div>
<!-- #primary -->

<?php
do_action( 'basepress_sidebar' );
get_footer();
?>