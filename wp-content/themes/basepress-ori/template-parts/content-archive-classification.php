			<div id="post-<?php the_ID(); ?>" <?php post_class('post-item clearfix'); ?>>
				<a href="<?php the_permalink(); ?>">
					<div class="thumbnail"><?php the_post_thumbnail();?></div>
					<div class="info">
						<h2><?php the_title();?></h2>
						<p><?php echo get_field('sort');?></p>
					</div>
				</a>				
			</div>