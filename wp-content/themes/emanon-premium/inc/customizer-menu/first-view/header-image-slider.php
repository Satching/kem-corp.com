<?php
/**
 * Theme customizer image slider panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_header_image_slider', array (
	'title' => __( '画像スライダー設定', 'emanon-premium' ),
	'description' => __( '［注意］表示設定で画像スライダーを有効にしてください。', 'emanon-premium' ),
	'priority' => 3,
	'panel' => 'emanon_front_page_settings',
) );

for( $c = 1; $c < 11; $c++ ) {
	// Slider title
	$wp_customize->add_setting( 'header_image_slider_title_'.$c, array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Textarea_Control( $wp_customize, 'header_image_slider_title_'.$c, array(
		'label' => __( 'タイトル', 'emanon-premium' ). ' ['.$c.']',
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_title_'.$c,
		'type' => 'text',
		'priority' => $c,
	) ) );

	// Slider message
	$wp_customize->add_setting( 'header_image_slider_message_'.$c, array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Textarea_Control( $wp_customize, 'header_image_slider_message_'.$c, array(
		'label' => __( 'メッセージ', 'emanon-premium' ). ' ['.$c.']',
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_message_'.$c,
		'priority' => $c,
	) ) );

	// Slider image PC
	$wp_customize->add_setting( 'header_image_slider_image_pc_'.$c, array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_image_slider_image_pc_'.$c, array (
		'label' => __( '画像［PC］', 'emanon-premium' ). ' ['.$c.']',
		'description' => __( '推奨画像サイズ：1920px * 500px', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_image_pc_'.$c,
		'priority' => $c,
	) ) );

	// Slider image SP
	$wp_customize->add_setting( 'header_image_slider_image_sp_'.$c, array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_image_slider_image_sp_'.$c, array (
		'label' => __( '画像［SP］', 'emanon-premium' ). ' ['.$c.']',
		'description' => __( '推奨画像サイズ：750px * 1335px', 'emanon-premium'),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_image_sp_'.$c,
		'priority' => $c,
	) ) );

	// Slider btn text
	$wp_customize->add_setting( 'header_image_slider_btn_text_'.$c, array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'header_image_slider_btn_text_'.$c, array(
		'label' => __( 'ボタン テキスト', 'emanon-premium' ). ' ['.$c.']',
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_btn_text_'.$c,
		'type' => 'text',
		'priority' => $c,
	) );

	// Slider image url
	$wp_customize->add_setting( 'header_image_slider_url_'.$c, array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_image_slider_url_'.$c, array(
		'label' => __( 'URL', 'emanon-premium' ). ' ['.$c.']',
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_url_'.$c,
		'type' => 'url',
		'priority' => $c,
	) );

	// Btn microcopy
	$wp_customize->add_setting( 'header_image_slider_btn_microcopy_'.$c, array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'header_image_slider_btn_microcopy_'.$c, array(
		'label' => __( 'マイクロコピー', 'emanon-premium' ). ' ['.$c.']',
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_btn_microcopy_'.$c,
		'type' => 'text',
		'priority' => $c,
	) );

	// Open in a new window
	$wp_customize->add_setting( 'header_image_slider_target_brank_'.$c, array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_image_slider_image_target_brank_'.$c, array(
		'label' => __( '新しいウィンドウで表示', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_target_brank_'.$c,
		'type' => 'checkbox',
		'priority' => $c,
	) );

}

	// Animation autoplay
	$wp_customize->add_setting( 'header_image_slider_autoplay_pc', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_image_slider_autoplay_pc', array(
		'label' => __( '自動スライダー［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_autoplay_pc',
		'type' => 'checkbox',
		'priority' => 91,
	) );

	// Animation autoplay
	$wp_customize->add_setting( 'header_image_slider_autoplay_sp', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_image_slider_autoplay_sp', array(
		'label' => __( '自動スライダー［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_autoplay_sp',
		'type' => 'checkbox',
		'priority' => 92,
	) );

	// Animation fade
	$wp_customize->add_setting( 'header_image_slider_fade_pc', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_image_slider_fade_pc', array(
		'label' => __( 'フェード［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_fade_pc',
		'type' => 'checkbox',
		'priority' => 93,
	) );

	// Animation fade
	$wp_customize->add_setting( 'header_image_slider_fade_sp', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_image_slider_fade_sp', array(
		'label' => __( 'フェード［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_fade_sp',
		'type' => 'checkbox',
		'priority' => 94,
	) );

	// Slider arrows
	$wp_customize->add_setting( 'header_image_slider_arrows_pc', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_image_slider_arrows_pc', array(
		'label' => __( '矢印の表示［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_arrows_pc',
		'type' => 'checkbox',
		'priority' => 95,
	) );

	// Slider arrows
	$wp_customize->add_setting( 'header_image_slider_arrows_sp', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_image_slider_arrows_sp', array(
		'label' => __( '矢印の表示［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_arrows_sp',
		'type' => 'checkbox',
		'priority' => 96,
	) );

	// Slider animation in after effect
	$wp_customize->add_setting( 'header_image_slider_animation', array(
		'default' => 'none',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_image_slider_animation', array(
		'label' => __( 'アニメーション効果［スライダー］', 'emanon-premium' ),
		'description' => __( '自動スライダーとフェードの有効時に適用されます。', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_animation',
		'type' => 'radio',
		'choices' => array(
			'none'            => __( 'なし', 'emanon-premium' ),
			'expansion_image' => __( '拡張', 'emanon-premium' ),
			'reduced_image'   => __( '縮小', 'emanon-premium' ),
			'slide_image'     => __( 'スライド', 'emanon-premium' ),
			),
		'priority' => 97,
	) );

	// Text animation
	$wp_customize->add_setting( 'header_image_slider_text_animation', array(
		'default' => 'none',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_image_slider_text_animation', array(
		'label' => __( 'アニメーション効果［テキスト］', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_text_animation',
		'type' => 'radio',
		'choices' => array(
			'none' => __( 'なし', 'emanon-premium' ),
			'fadein' => __( 'フェードイン', 'emanon-premium' ),
			'slideup' => __( 'スライドアップ', 'emanon-premium' ),
			),
		'priority' => 98,
	) );

	// Autoplay speed
	$wp_customize->add_setting( 'header_image_slider_autoplay_speed', array(
		'default' => 3000,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_image_slider_autoplay_speed', array(
		'label' => __( 'スライダー［速度］', 'emanon-premium' ),
		'description' => __( '初期値：3000', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_autoplay_speed',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 99,
	) );

	// Slide change speed
	$wp_customize->add_setting( 'header_image_slider_speed_pc', array(
		'default' => 1500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_image_slider_speed_pc', array(
		'label' => __( '切り替え速度［PC］', 'emanon-premium' ),
		'description' => __( '初期値：1500', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_speed_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 100,
	) );

	// Slide change speed
	$wp_customize->add_setting( 'header_image_slider_speed_sp', array(
		'default' => 1500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_image_slider_speed_sp', array(
		'label' => __( '切り替え速度［SP］', 'emanon-premium' ),
		'description' => __( '初期値：1500', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_speed_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 101,
	) );

	// Slider height［PC］
	$wp_customize->add_setting( 'header_image_slider_height_pc', array(
		'default' => 500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_image_slider_height_pc', array(
		'label' => __( '高さ［PC］', 'emanon-premium' ),
		'description' => __( '初期値：500px', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_height_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 102,
	) );

	// Slider height［SP］
	$wp_customize->add_setting( 'header_image_slider_height_sp', array(
		'default' => 500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_image_slider_height_sp', array(
		'label' => __( '高さ［SP］', 'emanon-premium' ),
		'description' => __( '初期値：500px', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_height_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 103,
	) );

	// Title font size［PC］
	$wp_customize->add_setting( 'header_image_slider_title_fontsize_pc', array(
		'default' => 32,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_image_slider_title_fontsize_pc', array(
		'label' => __( 'タイトル 文字サイズ［PC］', 'emanon-premium' ),
		'description' => __( '初期値：32px', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_title_fontsize_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 104,
	) );

	// Title font size［SP］
	$wp_customize->add_setting( 'header_image_slider_title_fontsize_sp', array(
		'default' => 24,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_image_slider_title_fontsize_sp', array(
		'label' => __( 'タイトル 文字サイズ［SP］', 'emanon-premium' ),
		'description' => __( '初期値：24px', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_title_fontsize_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 105,
	) );

	// Separator style
	$wp_customize->add_setting( 'header_image_slider_separator', array(
		'default' => 'display_none',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_image_slider_separator', array(
		'label' => __( '区切りデサイン', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_separator',
		'type' => 'radio',
		'choices' => array(
			'display_none'    => __( '非表示', 'emanon-premium' ),
			'arch'            => __( 'アーチ', 'emanon-premium' ),
			'wave'            => __( 'ウェーブ', 'emanon-premium' ),
			'double_wave'     => __( '２重ウェーブ', 'emanon-premium' ),
			'two_wave'        => __( 'ダブルウェーブ', 'emanon-premium' ),
			'tilt_right'      => __( '右斜め', 'emanon-premium' ),
			'tilt_left'       => __( '左斜め', 'emanon-premium' ),
			'triangle'        => __( 'トライアングル', 'emanon-premium' ),
			'triangle_center' => __( 'トライアングル［中央］', 'emanon-premium' ),
			),
		'priority' => 106,
	) );

	// Title color
	$wp_customize->add_setting( 'header_image_slider_title_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_slider_title_color', array(
		'label' => __( 'タイトル', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_title_color',
		'priority' => 107,
	) ) );

	// Message color
	$wp_customize->add_setting( 'header_image_slider_message_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_slider_message_color', array(
		'label' => __( 'メッセージ', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_message_color',
		'priority' => 108,
	) ) );

	// Btn border color
	$wp_customize->add_setting( 'header_image_slider_btn_border_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_slider_btn_border_color', array(
		'label' => __( 'ボタン 枠線', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_btn_border_color',
		'priority' => 109,
	) ) );

	// Btn border hover color
	$wp_customize->add_setting( 'header_image_slider_btn_border_hover_color', array(
		'default' => emanon_primary_light_color(),
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_slider_btn_border_hover_color', array(
		'label' => __( 'ボタン 枠線［ホバー］', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_btn_border_hover_color',
		'priority' => 110,
	) ) );

	// Btn background color
	$wp_customize->add_setting( 'header_image_slider_btn_background', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_image_slider_btn_background', array(
		'label' =>__( 'ボタン 背景色', 'emanon-premium' ),
		'description' => __( 'ボタン枠線の色が背景色に反映されます。', 'emanon-premium'  ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_btn_background',
		'type' => 'checkbox',
		'priority' => 111,
	) );

	// Btn text color
	$wp_customize->add_setting( 'header_image_slider_btn_text_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_slider_btn_text_color', array(
		'label' => __( 'ボタン テキスト', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_btn_text_color',
		'priority' => 112,
	) ) );

	// Btn microcopy color
	$wp_customize->add_setting( 'header_image_slider_btn_microcopy_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_slider_btn_microcopy_color', array(
		'label' => __( 'マイクロコピー', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_btn_microcopy_color',
		'priority' => 113,
	) ) );

	// Background mask color start
	$wp_customize->add_setting( 'header_image_slider_background_color_start', array(
		'default' => '#000',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_slider_background_color_start', array(
		'label' => __( '背景色［開始］', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_background_color_start',
		'priority' => 114,
	) ) );

	// Background mask color end
	$wp_customize->add_setting( 'header_image_slider_background_color_end', array(
		'default' => '#000',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_slider_background_color_end', array(
		'label' => __( '背景色［終了］', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_background_color_end',
		'priority' => 115,
	) ) );

	// Background mask color degree
	$wp_customize->add_setting( 'header_image_slider_background_color_degree', array(
		'default' => 135,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_image_slider_background_color_degree', array(
		'label' => __( '角度', 'emanon-premium'  ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_background_color_degree',
		'type' => 'number',
		'priority' => 116,
	) );

	// Background mask color opacity
	$wp_customize->add_setting( 'header_image_slider_opacity', array(
		'default' => 0,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_range_slider'
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_image_slider_opacity', array(
		'label' => __( '背景色［透過率］', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_opacity',
		'min' => 0,
		'max' => 1,
		'step' => 0.1,
		'priority' => 117,
	) ) );

	// Slider arrows color
	$wp_customize->add_setting( 'header_image_slider_arrows_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_slider_arrows_color', array(
		'label' => __( '矢印', 'emanon-premium' ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_arrows_color',
		'priority' => 118,
	) ) );

	// Separator color
	$wp_customize->add_setting( 'header_image_slider_separator_color', array(
		'default' => '#eeeff0',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_slider_separator_color', array(
		'label' => __( '区切り線', 'emanon-premium'  ),
		'section' => 'emanon_header_image_slider',
		'settings' => 'header_image_slider_separator_color',
		'priority' => 119,
	) ) );