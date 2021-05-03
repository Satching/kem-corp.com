<?php
/**
 * The front page template file
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$cache_first_view = get_theme_mod( 'cache_first_view' );
$cache_key = $cache_first_view ? 'firstview_'. DEVICE : '';
get_header();
?>

<?php
get_emanon_cached_template_part( 'template-parts/layout/front/first-view', $cache_key );
get_template_part( 'template-parts/layout/front/front-layout' );
get_footer();