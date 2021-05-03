<?php
/**
 * Entry tag
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$title = get_theme_mod( 'entry_tag_title', __( '関連キーワード', 'emanon-premium' ) );
$list  = get_the_tag_list( '<ul class="tagcloud"><li>', '</li><li>', '</li></ul>' );
?>

<?php if ( $list ): ?>
<aside class="entry-tag">
	<?php if ( $title ): ?>
	<h3 class="entry-tag__title"><?php echo esc_html( $title ); ?></h3>
	<?php endif; ?>
	<?php echo $list; ?>
</aside>
<?php endif; ?>
