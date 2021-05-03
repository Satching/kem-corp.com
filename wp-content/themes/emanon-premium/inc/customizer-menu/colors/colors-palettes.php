<?php
/**
 * Theme customizer color palettes panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * カラーパレットの設定
 */
$wp_customize->add_section( 'emanon_color_palettes', array (
	'title'       => __( 'カラーパレット設定', 'emanon-premium' ),
	'description' => __( '保存後にWebブラウザを更新してください。', 'emanon-premium' ),
	'panel'       => 'emanon_colors_settings',
	'priority'    => 1,
) );

		// カラーパレット設定
		$wp_customize->add_setting( 'color_palettes_type', array(
			'default'   => 'default_palettes',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'emanon_sanitize_radio_select',
		) );
		$wp_customize->add_control( 'color_palettes_type', array(
			'label'     => __( 'カラーパレット', 'emanon-premium' ),
			'section'   => 'emanon_color_palettes',
			'settings'  => 'color_palettes_type',
			'type'      => 'radio',
			'choices'   => array(
				'default_palettes' => __( '初期値', 'emanon-premium' ),
				'blue_palettes'    => __( 'ブルー', 'emanon-premium' ),
				'green_palettes'   => __( 'グリーン', 'emanon-premium' ),
				'lime_palettes'    => __( 'ライム', 'emanon-premium' ),
				'purple_palettes'  => __( 'パープル', 'emanon-premium' ),
				'pink_palettes'    => __( 'ピンク', 'emanon-premium' ),
				'brown_palettes'   => __( 'ブラウン', 'emanon-premium' ),
				'gray_palettes'    => __( 'グレー', 'emanon-premium' ),
				),
			'priority' => 1,
		) );