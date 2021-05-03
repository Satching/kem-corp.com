<?php
/**
 * CTA Content
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$cta_edit_id = post_custom( 'emanon_cta_id' );
$post_type   = get_post_type();
if ( 'post' === $post_type ) {
	$cta_setting_id = get_theme_mod( 'display_cta_post' );
} elseif ( 'page' === $post_type ) {
	$cta_setting_id = get_theme_mod( 'display_cta_page' );
}

if ( $cta_edit_id ) {
	$cta_id = $cta_edit_id;
} elseif ( empty( $cta_edit_id ) && '0' !== $cta_edit_id ) {
	$cta_id = $cta_setting_id;
} elseif ( '0' === $cta_edit_id ) {
	$cta_id = '';
}

if ( ! $cta_id ) {
	return;
}

$cta_layout      = get_post_meta( $cta_id, 'cta_layout', 'cta-left' );
if ( empty( $cta_layout ) ) { $cta_layout = 'cta-left'; }
if ( 'cta-left' === $cta_layout ) {
	$class_col     = 'col-6';
	$class_reverse = '';
} elseif ( 'cta-center' === $cta_layout ) {
	$class_col     = 'col-12';
	$class_reverse = '';
} elseif ( 'cta-right' === $cta_layout ) {
	$class_col     = 'col-6';
	$class_reverse = 'u-row-dir-reverse';
}
$image                    = get_post_meta( $cta_id, 'cta_image', true );
$title                    = get_post_meta( $cta_id, 'cta_title', true );
$lead                     = get_post_meta( $cta_id, 'cta_lead', true );
$btn_url                  = get_post_meta( $cta_id, 'cta_btn_url', true );
$cta_btn_layout           = get_post_meta( $cta_id, 'cta_btn_layout', true );
if ( empty( $cta_btn_layout ) ) { $cta_btn_layout = 'center_bottom'; }
$btn_text                 = get_post_meta( $cta_id, 'cta_btn_text', true );
$microcopy                = get_post_meta( $cta_id, 'cta_microcopy', true );
$microcopy_layout         = get_post_meta( $cta_id, 'cta_microcopy_layout', true );
if ( empty( $microcopy_layout ) ) { $microcopy_layout = 'under_button'; }
$cta_border               = get_post_meta( $cta_id, 'cta_border', true );
if ( $cta_border ) {
	$class_border = ' u-border-solid';
} else {
	$class_border = '';
}
$active_bg_color          = get_post_meta( $cta_id, 'cta_active_background_color', true );
$bg_color                 = get_post_meta( $cta_id, 'cta_background_color', '#eeeff0' );
if ( empty( $cta_bg_color ) ) { $cta_bg_color = '#eeeff0'; }
$title_color              = get_post_meta( $cta_id, 'cta_title_color', '#333333' );
if ( empty( $cta_title_color ) ) { $cta_title_color = '#333333'; }
$lead_color               = get_post_meta( $cta_id, 'cta_lead_color', '#333333' );
if ( empty( $cta_lead_color ) ) { $cta_lead_color = '#333333'; }
$btn_border_color         = get_post_meta( $cta_id, 'cta_btn_border_color', '#007bbb' );
if ( empty( $cta_btn_border_color ) ) { $cta_btn_border_color = '#007bbb'; }
$btn_bg_color             = get_post_meta( $cta_id, 'cta_btn_background_color', true );
$btn_text_color           = get_post_meta( $cta_id, 'cta_btn_text_color', '#007bbb' );
if ( empty( $cta_btn_text_color ) ) { $cta_btn_text_color = '#007bbb'; }
if ( $btn_bg_color ) {
	$btn_style = 'background-color:' . $btn_border_color . ';border: 1px solid ' . $btn_border_color . ';color:' . $btn_text_color;
} else {
	$btn_style = 'border: 1px solid ' . $btn_border_color . ';color:' . $btn_text_color;
}
$microcopy_color          = get_post_meta($cta_id, 'cta_microcopy_color', '#333333' );
?>

<aside class="cta-content<?php echo esc_attr( $class_border ); ?>" <?php if ( $active_bg_color ) { ?> style="background-color:<?php echo $bg_color; ?>;"<?php } ?>>
	<?php if ( $title ): ?>
	<div class="cta-content__header">
		<h2 class="cta-content__title" style="color:<?php echo $title_color; ?>;"><?php echo wp_kses_post( $title ); ?></h2>
	</div><!--/.cta-content__header-->
	<?php endif; ?>
	<div class="cta-content__body u-row u-row-wrap wrapper-col <?php echo esc_attr( $class_reverse ); ?>">
		<?php if ( $image ): ?>
		<figure class="<?php echo esc_attr( $class_col ); ?>">
			<?php if ( $btn_url ): ?>
			<a href="<?php echo esc_url( $btn_url ); ?>">
			<?php endif; ?>
				<img class="cta-content__figure" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_html( $title ); ?>">
			<?php if ( $btn_url ): ?>
			</a>
			<?php endif; ?>
		</figure>
		<?php endif; ?>
		<div class="<?php echo esc_attr( $class_col ); ?> cta-content__lead">
			<?php if ( $lead ): ?>
				<p style="color:<?php echo $lead_color; ?>;"><?php echo nl2br( $lead ); ?></p>
			<?php endif; ?>
			<?php if ( $btn_url && 'text_bottom' === $cta_btn_layout ): ?>
			<div class="cta-content__side">
				<?php if ( $microcopy && 'on_button' === $microcopy_layout ): ?>
				<div class="cta-content__microcopy" style="color:<?php echo $microcopy_color; ?>">
					<?php echo nl2br( wp_kses_post( $microcopy ) ); ?>
				</div><!--/.ta-content__microcopy-->
				<?php endif; ?>
				<?php if ( $btn_url ): ?>
					<a class="c-btn c-btn__outline c-btn__m" style="<?php echo $btn_style; ?>" href="<?php echo esc_url( $btn_url ); ?>"><?php echo wp_kses_post( $btn_text ); ?></a>
				<?php endif; ?>
				<?php if ( $microcopy && 'under_button' === $microcopy_layout ): ?>
					<div class="cta-content__microcopy" style="color:<?php echo $microcopy_color; ?>"><?php echo nl2br( wp_kses_post( $microcopy ) ); ?></div>
				<?php endif; ?>
			</div><!--/.cta-content__side-->
			<?php endif; ?>
		</div><!--/.cta-content__lead-->
	</div><!--/.cta-content__body-->

	<?php if ( $btn_url && 'center_bottom' === $cta_btn_layout ): ?>
	<div class="cta-content__bottom">
		<?php if ( $microcopy && 'on_button' === $microcopy_layout ): ?>
		<div class="cta-content__microcopy" style="color:<?php echo $microcopy_color; ?>">
			<?php echo nl2br( wp_kses_post( $microcopy ) ); ?>
		</div><!--/.cta-content__microcopy-->
		<?php endif; ?>
		<?php if ( $btn_url ): ?>
			<a class="c-btn c-btn__outline c-btn__m" style="<?php echo $btn_style; ?>" href="<?php echo esc_url( $btn_url ); ?>"><?php echo wp_kses_post( $btn_text ); ?></a>
		<?php endif; ?>
		<?php if ( $microcopy && 'under_button' === $microcopy_layout ): ?>
			<div class="cta-content__microcopy" style="color:<?php echo $microcopy_color; ?>"><?php echo nl2br( wp_kses_post( $microcopy ) ); ?></div>
		<?php endif; ?>
	</div><!--/.cta-content__bottom-->
	<?php endif; ?>

</aside><!--/.cta-content-->
