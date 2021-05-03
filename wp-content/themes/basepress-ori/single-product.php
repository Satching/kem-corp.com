<?php get_header();?>
<link rel="stylesheet" type="text/css" media="all" href="/upload/css/products.css" />
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post();

				do_action( 'basepress_single_post_before' );

				get_template_part( 'template-parts/content', 'single-product' );

				do_action( 'basepress_single_post_after' );

			endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'basepress_sidebar' );

get_footer();
