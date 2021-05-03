<?php
/**
 * Header panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$search        = get_theme_mod( 'display_header_search_form_'. DEVICE );
$cta           = get_theme_mod( 'display_header_cta_' . DEVICE );
$contact_style = get_theme_mod( 'header_contact_style' );
?>

<div class="header-panel">

	<?php if ( $cta ): ?>
	<div id="js-header-contact-panel" class="header-contact">
		<div class="l-content header-contact__inner">
			<?php
				get_template_part( 'template-parts/parts/cta/contact-'. $contact_style );
			?>
		</div><!--/.header-contact-inner-->
	</div><!--/.header-contact-->
	<?php endif; ?>

	<?php if ( $search ): ?>
	<div id="js-header-searchform-panel" class="header-searchform">
		<div class="l-content__sm">
		<?php
			get_template_part( 'searchform-custom' );
		?>
		</div><!--/.header-searchform-inner-->
	</div><!--/.header-searchform-->
	<?php endif; ?>

</div><!--/.header-panel-->