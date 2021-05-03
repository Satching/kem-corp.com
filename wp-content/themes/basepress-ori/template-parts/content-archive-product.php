<?php
$taxonomy_name = 'classification';
$taxonomys = get_terms($taxonomy_name);
if(!is_wp_error($taxonomys) && count($taxonomys)):
	foreach($taxonomys as $taxonomy):
		$tax_posts = get_posts(array('post_type' => get_post_type(), 'classification' => $taxonomy_name, 'term' => $taxonomy->slug ) );
		if($tax_posts):
?>

	<div class="term">
		<input type="checkbox" id="<?php echo esc_html($taxonomy->slug); ?>" class="switch">
		<label for="<?php echo esc_html($taxonomy->slug); ?>"><?php echo esc_html($taxonomy->name); ?></label>
		<div class="clearfix">
			<?php foreach($tax_posts as $tax_post): ?>
			<div class="aspect">
				<a href="<?php echo get_permalink($tax_post->ID); ?>" class="inner">
					<h3><?php echo $tax_post->post_title; ?></h3>
					<img src="/upload/img/products/<?php echo str_replace('bg','',$tax_post->post_name); ?>.jpg" alt="<?php echo $tax_post->post_title; ?>" />
					<?php echo get_post_meta($tax_post->ID , 'sort' ,true); ?>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php
		endif;
	endforeach;
endif;
?>