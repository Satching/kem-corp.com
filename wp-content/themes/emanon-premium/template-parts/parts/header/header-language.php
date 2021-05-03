<?php
/**
 * Header language
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$slug = get_emanon_current_slug();
?>

<ul class="language-panel">
	<?php for( $c=1; $c<6; $c++ ) {
		$locale = get_theme_mod( 'language_locale_'.$c );
		$url  = get_theme_mod( 'language_url_'.$c ) . $slug;
		$name = get_theme_mod( 'language_name_'.$c );
	?>
	<?php if ( 'not_set' != $locale && $name && $url ): ?>
	<li class="language-panel__item"><a href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo esc_html( $name ); ?>ページ"><?php echo esc_html( $name ); ?></a></li>
	<?php endif; ?>
	<?php } ?>
	<?php
		$locale_6 = get_theme_mod( 'language_locale_6' );
		$url_6    = get_theme_mod( 'language_url_6' ) . $slug;
		$name_6   = get_theme_mod( 'language_name_6' );
	?>
	<?php if ( $locale_6 && $name_6 && $url_6 ): ?>
	<li class="language-panel__item"><a href="<?php echo esc_url( $url_6 ); ?>" aria-label="<?php echo esc_html( $name_6 ); ?>ページ"><?php echo esc_html( $name_6 ); ?></a></li>
	<?php endif; ?>
</ul><!--/.header-language-->
