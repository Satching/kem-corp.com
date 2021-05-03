<?php
/**
 * Footer copyright layout
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$copyright      = get_theme_mod( 'footer_copyright', 'current_year' );
$credit         = get_theme_mod( 'footer_credit' );
$published_year = get_theme_mod( 'published_year' );
$user_credit    = get_theme_mod( 'footer_user_credit' );
?>

<div class="site-copyright">
	<div class="l-content">
		<?php
			if ( is_active_sidebar( 'footer_widget_copyright' ) ) {
				dynamic_sidebar( 'footer_widget_copyright' );
			}
		?>
		<?php if ( 'current_year' === $copyright ) : ?>
		<small><i class="copyright"></i>&copy;&nbsp;<?php echo date( 'Y' ); ?>&nbsp;<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></small>
		<?php elseif ( 'published_year' === $copyright ) : ?>
		<small>&copy;&nbsp;<?php if ( $published_year ) { ?><?php echo absint( $published_year ); ?><?php } ?>&minus;<?php echo date('Y'); ?>&nbsp;<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></small>
		<?php elseif ( 'user_credit_notation' === $copyright ) : ?>
		<small><?php echo wp_kses_post( $user_credit ) ; ?></small>
		<?php endif; ?>
	</div><!--/.l-content-->
</div><!--/.copyright-->