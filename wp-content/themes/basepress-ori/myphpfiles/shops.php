<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
	'post_type' => 'shop',
	'posts_per_page' => -1,				//表示件数
	'paged' => $paged,				//現在何ページ目かを取得
	'tax_query' => array(				//カスタム分類を複数選択
	    'relation' => 'AND',			//ANDまたはOR
	    array(
			'taxonomy' => 'shoptype',						
			'terms' => 'gasoline-care',	//タクソノミのスラッグ名
			'field' => 'slug',			//terms で指定したフィールド(term_id（デフォルト）,name,slug)
	    )
	    array(
			'taxonomy' => 'area',						
			'terms' => 'osaka',	//タクソノミのスラッグ名
			'field' => 'slug',			//terms で指定したフィールド(term_id（デフォルト）,name,slug)
	    )
	)
);
$wp_query = new WP_Query($args);
?>
<?php if($wp_query->have_posts()): ?>
	<h2><?php echo implode(', ', 'tax_query'); ?></h2>
	<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
	<dl class="shop">
		<dt>
			<?php if(get_field('url')):?><a href="<?php the_field('url'); ?>" target="_blank"><?php endif;?>
				<?php the_field('shop_name'); ?>
			<?php if(get_field('url')):?></a><?php endif;?>
		</dt>
		<dd class="address"><?php the_field('place'); ?></dd>
		<dd class="model"><?php the_field('cat_type'); ?></dd>
		<dd class="catering"><?php the_field('visit'); ?></dd>
		<dd class="tel"><?php the_field('tel'); ?></dd>
		<dd class="fax"><?php the_field('fax'); ?></dd>
		<dd class="access"><?php the_field('access'); ?></dd>
		<dd class="mail"><?php the_field('email'); ?></dd>
		<dd><?php the_field('その他メモ'); ?></dd>
	</dl>
	<?php endwhile; ?>
<?php else: ?>
	<h2>記事がありませんでした</h2>
	<p>申し訳ありません。ご覧のページは存在しないか、URLが変更された可能性があります。</p>
<?php endif; ?>