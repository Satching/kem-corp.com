<?php
/**
 * The template for displaying single articles
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

get_header();
?>

<?php
get_template_part( 'template-parts/layout/post/post-layout' );
get_footer();
if( ! is_bot() && ! is_user_logged_in() && is_active_widget( '', '', 'popular_post' ) ) {
	emanon_set_post_views( get_the_ID() );
}