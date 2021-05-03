<?php
/**
 * Theme customizer general colors panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

	// Primary color
	$wp_customize->add_setting( 'primary_color', array(
		'default'  => emanon_primary_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label'    => __( 'プライマリー', 'emanon-premium' ),
		'description' => __( 'Webサイトのメインカラーです。プライマリーカラーは、見出し・ボタン・カテゴリラベル・目次など、ウェブサイトの多くの要素に適用されます。', 'emanon-premium' ),
		'section'  => 'colors',
		'settings' => 'primary_color',
		'priority' => 11,
	) ) );

	// Primary light color
	$wp_customize->add_setting( 'primary_light_color', array(
		'default'  => emanon_primary_light_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_light_color', array(
		'label'    => __( 'プライマリー［ライト］', 'emanon-premium' ),
		'description' => __( 'プライマリーよりも明るい色に設定します。プライマリーカラー［ライト］は、見出し装飾の一部やボタン（ホバー）に使用されます。', 'emanon-premium' ),
		'section'  => 'colors',
		'settings' => 'primary_light_color',
		'priority' => 12,
	) ) );

	// Secondary color
	$wp_customize->add_setting( 'secondary_color', array(
		'default'  => emanon_secondary_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
		'label'    => __( 'セカンダリ', 'emanon-premium' ),
		'description' => __( 'Webサイトのアクセントカラーです。プライマリーカラーと違和感のない色を設定してください。', 'emanon-premium' ),
		'section'  => 'colors',
		'settings' => 'secondary_color',
		'priority' => 13,
	) ) );

	// Link color
	$wp_customize->add_setting( 'link_color', array(
		'default'  => emanon_link_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'    => __( 'リンク', 'emanon-premium' ),
		'description' => __( 'リンクテキストに適用されます。', 'emanon-premium' ),
		'section'  => 'colors',
		'settings' => 'link_color',
		'priority' => 14,
	) ) );

	// Link hover color
	$wp_customize->add_setting( 'link_hover_color', array(
		'default'  =>  emanon_link_hover_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
		'label'    => __( 'リンク［ホバー］', 'emanon-premium' ),
		'description' => __( 'リンクテキストのホバーに適用されます。', 'emanon-premium' ),
		'section'  => 'colors',
		'settings' => 'link_hover_color',
		'priority' => 15,
	) ) );
