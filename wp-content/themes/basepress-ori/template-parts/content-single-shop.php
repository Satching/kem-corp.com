<?php
$product_num = str_replace('bg','BG',$post->post_name);
$img_num = str_replace('bg','',$post->post_name);
?>
<div class="single_post clearfix">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php 
		the_field('shop_name');
		echo '<br />';
		the_field('url');
		echo '<br />';
		the_field('place');
		echo '<br />';
		the_field('cat_type');
		echo '<br />';
		the_field('visit');
		echo '<br />';
		the_field('tel');
		echo '<br />';
		the_field('fax');
		echo '<br />';
		the_field('fax');
		echo '<br />';
		the_field('email');
		echo '<br />';
		the_field('その他メモ');
		?>
	</article><!-- #post-## -->
</div>
