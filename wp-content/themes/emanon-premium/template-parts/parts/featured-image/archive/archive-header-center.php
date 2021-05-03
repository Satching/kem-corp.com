<?php
/**
 * Archive header center
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

?>

<div class="archive-header">
	<div class="archive-header__center">
		<?php
			the_archive_title( '<h1 class="archive-title">','</h1>' );
			emanon_category_subtitle();
			emanon_archive_description();
		?>
	</div>
</div>