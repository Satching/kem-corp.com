<link rel="stylesheet" type="text/css" media="all" href="/upload/css/products.css" />
<?php
$product_num = str_replace('bg','BG',$post->post_name);
$img_num = str_replace('bg','',$post->post_name);
?>
<div class="single_post clearfix">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php the_title( '<h1 class="entry-title single-title">', '</h1>' );?>
			<?php if(get_field('type')):?>
			<div class="ico_sort">
				<?php if(in_array('ガソリン', get_field('type'))):echo '<p class="ico_gasoline">ガソリン</p>';endif;?>
				<?php if(in_array('ディーゼル', get_field('type'))):echo '<p class="ico_diesel">ディーゼル</p>';endif;?>
				<?php if(in_array('凍結防止剤', get_field('type'))):echo '<p class="ico_af">凍結防止剤</p>';endif;?>
				<?php if(in_array('バイオディーゼル', get_field('type'))):echo '<p class="ico_bio">バイオディーゼル</p>';endif;?>
			</div>
			<?php endif;?>
		</header>
					
		<!--▼商品情報▼-->
		<h2><?php the_field('point');?></h2>
		<div class="item flex">
			<div><?php if ( has_post_thumbnail() ) : the_post_thumbnail(); endif; ?></div>
			<!--▼効果▼-->
			<div class="info">
				<h3 class="identify"><?php the_field('sort');?></h3>
				<?php if(get_field('feature1')): echo '<p>' . get_field('feature1') . '</p>'; endif;?>
				<?php if(get_field('feature2')): echo '<p>' . get_field('feature2') . '</p>'; endif;?>
				<?php if(get_field('feature3')): echo '<p>' . get_field('feature3') . '</p>'; endif;?>
				<?php if(get_field('feature4')): echo '<p>' . get_field('feature4') . '</p>'; endif;?>
				<?php if(get_field('feature5')): echo '<p>' . get_field('feature5') . '</p>'; endif;?>
				<?php if(get_field('feature6')): echo '<p>' . get_field('feature6') . '</p>'; endif;?>
			</div>
			<!--▲効果▲-->
		</div>
		<!--▲商品情報▲-->

		<!--▼解説▼-->
		<div class="exp flex">
			<?php the_content(); ?>
		</div>
		<!--▲解説▲-->
		
		<?php if(get_field('noteworthy')):?>
		<!--▼特筆事項▼-->
		<div id="howto">
			<?php if(get_field('noteworthy_title')):?><h4><?php the_field('noteworthy_title');?></h4><?php endif;?>
			<?php the_field('noteworthy');?>
		</div>
		<!--▲特筆事項▲-->
		<?php endif;?>

		<?php if(get_field('howtouse')||get_field('howtouse2')||get_field('howtouse3')||get_field('howtouse4')||get_field('howtouse5')):?>
		<!--▼使用方法▼-->
		<div id="howto" class="clearfix">
			<h4>使用方法</h4>
			<?php
			the_field('howtouse');
			if(get_field('how_link_url1')):
				echo '<a href="' . get_field('how_link_url1') . '"';
				if(get_field('how_link_class1')):  echo ' class="' . get_field('how_link_class1') . '"';endif;
				if(get_field('how_link_target1')):  echo ' target="' . get_field('how_link_target1') . '"';endif;
				echo '>';
			endif;
			if(get_field('how_link_img1')):echo '<img src="' . get_field('how_link_img1') . '" />';endif;
			if(get_field('how_link_text1')):echo get_field('how_link_text1');endif;
			if(get_field('how_link_url1')):echo '</a>';endif;
			the_field('howtouse2');
			if(get_field('how_link_url2')):
				echo '<a href="' . get_field('how_link_url2') . '"';
				if(get_field('how_link_class2')):  echo ' class="' . get_field('how_link_class2') . '"';endif;
				if(get_field('how_link_target2')):  echo ' target="' . get_field('how_link_target2') . '"';endif;
				echo '>';
			endif;
			if(get_field('how_link_img2')):echo '<img src="' . get_field('how_link_img2') . '" />';endif;
			if(get_field('how_link_text2')):echo get_field('how_link_text2');endif;;
			if(get_field('how_link_url2')):echo '</a>';endif;
			the_field('howtouse3');
			if(get_field('how_link_url3')):
				echo '<a href="' . get_field('how_link_url3') . '"';
				if(get_field('how_link_class3')):  echo ' class="' . get_field('how_link_class3') . '"';endif;
				if(get_field('how_link_target3')):  echo ' target="' . get_field('how_link_target3') . '"';endif;
				echo '>';
			endif;
			if(get_field('how_link_img3')):echo '<img src="' . get_field('how_link_img3') . '" />';endif;
			if(get_field('how_link_text3')):echo get_field('how_link_text3');endif;
			if(get_field('how_link_url3')):echo '</a>';endif;			
			the_field('howtouse4');
			if(get_field('how_link_url4')):
				echo '<a href="' . get_field('how_link_url4') . '"';
				if(get_field('how_link_class4')):  echo ' class="' . get_field('how_link_class4') . '"';endif;
				if(get_field('how_link_target4')):  echo ' target="' . get_field('how_link_target4') . '"';endif;
				echo '>';
			endif;
			if(get_field('how_link_img4')):echo '<img src="' . get_field('how_link_img4') . '" />';endif;
			if(get_field('how_link_text4')):echo get_field('how_link_text4');endif;
			if(get_field('how_link_url4')):echo '</a>';endif;			
			the_field('howtouse5');
			?>
		</div>
		<!--▲使用方法▲-->
		<?php endif;?>

		<!--▼販売情報▼-->
		<h4 class="data_title">≪<?php echo $product_num;?>≫</h4>
		<div class="data">
			<div class="detail clearfix">
				<dl>
					<dt>製造番号</dt>
					<dd><?php echo $product_num;?></dd>
				</dl>
				<dl>
					<dt>容量</dt>
					<dd><?php the_field('capacity');?><?php the_field('capcity_unit');?></dd>
				</dl>
				<dl>
					<dt>販売形状</dt>
					<dd><?php the_field('style');?></dd>
				</dl>
				<dl>
					<dt>入数</dt>
					<dd><?php the_field('quantity');?></dd>
				</dl>
			</div>
			<div class="aspect p_img">
				<img src="/upload/img/products/<?php echo $img_num;?>.jpg" alt="<?php the_field('product_num');?>" />
			</div>
		</div>
		<?php if(get_field('size') == 1):?>
		<h4 class="data_title">≪<?php the_field('product_num2');?>≫</h4>
		<div class="data">
			<div class="detail clearfix">
				<dl>
					<dt>製造番号</dt>
					<dd><?php the_field('product_num2');?></dd>
				</dl>
				<dl>
					<dt>容量</dt>
					<dd><?php the_field('capacity2');?><?php the_field('capcity_unit2');?></dd>
				</dl>
				<dl>
					<dt>販売形状</dt>
					<dd><?php the_field('style2');?></dd>
				</dl>
				<dl>
					<dt>入数</dt>
					<dd><?php the_field('quantity2');?></dd>
				</dl>
			</div>
			<div class="aspect p_img">
				<?php if(!get_field('img_num2')):?><img src="/upload/img/common/noimage.jpg" alt="<?php the_field('product_num2');?>の画像はありません" />
				<?php else:?><img src="/upload/img/products/<?php the_field('img_num2');?>.jpg" alt="<?php the_field('product_num2');?>" />
				<?php endif;?>
			</div>
		</div>
		<?php endif;?>
		<!--▲販売情報▲-->
	<?php do_action( 'basepress_single_post_bottom' );?>
	</article><!-- #post-## -->
</div>
