<?php
/**
 * Template part for layout in single-sales.php
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$hide_header    = post_custom( 'emanon_hide_header' );
if ( $hide_header ) {
	$class_header = ' is-hide-header';
} else {
	$class_header = '';
}
$hide_footer    = post_custom( 'emanon_hide_footer' );
if ( $hide_footer ) {
	$class_footer = ' is-hide-footer';
} else {
	$class_footer = '';
}
?>

<div id="contents">
	<div class="l-content">
		<div class="l-content__inner<?php echo esc_attr( $class_header ); ?><?php echo esc_attr( $class_footer ); ?>">
			<div class="u-row one-col">
			<main class="l-content__main">
				<?php get_template_part( 'template-parts/content/post/content-sales' ); ?>
			</main>
			</div><!--/.u-row-->
		</div><!--/.l-content__inner-->
	</div><!--/.l-content-->
</div><!--/#contents-->