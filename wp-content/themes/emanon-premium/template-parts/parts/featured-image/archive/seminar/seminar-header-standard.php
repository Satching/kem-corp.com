<?php
/**
 * Archive seminar header standard
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$title     = get_theme_mod( 'seminar_taxonomy_title' );
$sub_title = get_theme_mod( 'seminar_taxonomy_sub_title' );
$message   = get_theme_mod( 'seminar_taxonomy_message' );
?>

<?php if( $title || $sub_title || $message ): ?>
<div class="archive-header">
	<?php if( $title ): ?>
	<h1 class="archive-title"><?php echo wp_kses_post( $title ); ?></h1>
	<?php endif; ?>
	<?php if( $sub_title ): ?>
	<span class="archive-title__sub"><?php echo wp_kses_post( $sub_title ); ?></span>
	<?php endif; ?>
	<?php if( $message ): ?>
	<div class="archive-description"><?php echo nl2br( wp_kses_post( $message ) ); ?></div>
	<?php endif; ?>
</div>
<?php endif; ?>