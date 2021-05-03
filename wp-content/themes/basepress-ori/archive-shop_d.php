<?php get_header();?>
<link rel="stylesheet" type="text/css" media="all" href="/upload/css/shop.css"/>
<div id="primary" class="content-area">
	<main id="main" class="site-main shop_type_archive" role="main">
		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			?>
			<div class="taxonomy-description flex" id="area_index">
				<a href="#area01">大阪府</a>
				<a href="#area02">兵庫県</a>
				<a href="#area03">滋賀県</a>
				<a href="#area13">奈良県</a>
				<a href="#area04">和歌山県</a>
				<a href="#area05">岐阜県</a>
				<a href="#area06">愛知県</a>
				<a href="#area07">福井県</a>
				<a href="#area08">岡山県</a>
				<a href="#area09">広島県</a>
				<a href="#area10">山口県</a>
				<a href="#area11">香川県</a>
				<a href="#area12">高知県</a>
			</div>
		</header>
		<!-- .page-header -->
		<?php
		if ( have_posts() ):
			$arrTerm = array( 'osaka', 'hyogo', 'siga', 'nara', 'wakayama', 'gifu', 'aichi', 'fukui', 'okayama', 'hiroshima', 'yamaguchi', 'kagawa', 'kouchi' );
		foreach ( $arrTerm as $value ):
			$args = array(
				'post_type' => 'shop_d',
				'posts_per_page' => -1, //全件表示
				'tax_query' => array(
					array(
						'taxonomy' => 'area',
						'field' => 'slug',
						'terms' => $value,
					)
				)
			);
		$domestic_post = get_posts( $args );
		?>

		<?php if(!empty($domestic_post)): ?>
		<?php if($value == 'osaka'): ?>
		<div class="kind_wrap" id="area01">
			<h2 class="kind_title"><span>大阪府</span></h2>
		<?php elseif($value == 'hyogo'): ?>
		<div class="kind_wrap" id="area02">
			<h2 class="kind_title"><span>兵庫県</span><a class="to-top" href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></h2>
		<?php elseif($value == 'siga'): ?>
		<div class="kind_wrap" id="area03">
			<h2 class="kind_title"><span>滋賀県</span><a class="to-top" href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></h2>
		<?php elseif($value == 'nara'): ?>
		<div class="kind_wrap" id="area13">
			<h2 class="kind_title"><span>奈良県</span><a class="to-top" href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></h2>
		<?php elseif($value == 'wakayama'): ?>
		<div class="kind_wrap" id="area04">
			<h2 class="kind_title"><span>和歌山県</span><a class="to-top" href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></h2>
		<?php elseif($value == 'gifu'): ?>
		<div class="kind_wrap" id="area05">
			<h2 class="kind_title"><span>岐阜県</span><a class="to-top" href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></h2>
		<?php elseif($value == 'aichi'): ?>
		<div class="kind_wrap" id="area06">
			<h2 class="kind_title"><span>愛知県</span><a class="to-top" href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></h2>
		<?php elseif($value == 'fukui'): ?>
		<div class="kind_wrap" id="area07">
			<h2 class="kind_title"><span>福井県</span><a class="to-top" href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></h2>
		<?php elseif($value == 'okayama'): ?>
		<div class="kind_wrap" id="area08">
			<h2 class="kind_title"><span>岡山県</span><a class="to-top" href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></h2>
		<?php elseif($value == 'hiroshima'): ?>
		<div class="kind_wrap"id="area09">
			<h2 class="kind_title" ><span>広島県</span><a class="to-top" href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></h2>
		<?php elseif($value == 'yamaguchi'): ?>
		<div class="kind_wrap" id="area10">
			<h2 class="kind_title"><span>山口県</span><a class="to-top" href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></h2>
		<?php elseif($value == 'kagawa'): ?>
		<div class="kind_wrap" id="area11">
			<h2 class="kind_title"><span>香川県</span><a class="to-top" href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></h2>
		<?php elseif($value == 'kouchi'): ?>
		<div class="kind_wrap" id="area12">
			<h2 class="kind_title"><span>高知県</span><a class="to-top" href=""><i class="fa fa-angle-up" aria-hidden="true"></i></a></h2>
			<?php endif ;?>
			<?php endif ;?>
			<?php if(!empty($domestic_post)): ?>
			<div class="flex area-archive">
				<?php endif ;?>
				<?php 
            if($domestic_post) : foreach($domestic_post as $post) : setup_postdata( $post );        
        ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-item clearfix'); ?>>
					<!--▼1店舗▼-->
					<?php if(get_field('url')):?>
					<a href="<?php the_field('url');?>" target="_blank">
						<?php endif;?>
						<p class="name">
							<?php the_title();?>
						</p>
						<?php if(get_field('url')):?>
					</a>
					<?php endif;?>
					<div class="shop_info">
						<p class="address">
							<span>
								<?php the_field('area'); the_field('place');?>
							</span>
						</p>
						<p class="model">
							<span>
								<?php the_field('cat_type');?>
							</span>
						</p>
						<p class="tel">
							<?php if(get_field('tel')){the_field('tel');} else {echo '　--';}?>
						</p>
						<p class="access">
							<?php if(get_field('access')){the_field('access');} else {echo '　--';}?>
						</p>
					</div>
					<!--▲1店舗▲-->
				</article>
				<?php endforeach; ?>
				<?php endif;wp_reset_postdata(); ?>
				<?php if(!empty($domestic_post)): ?>
			</div>
		</div>
		<?php endif ;?>
		<?php endforeach; ?>
		<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</main>
	<!-- #main -->
</div>
<!-- #primary -->
<?php
do_action( 'basepress_sidebar' );
get_footer();
?>