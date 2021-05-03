<?php
/**
 * Theme customizer header eyecatch panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_header_eyecatch', array (
	'title' => __( 'ヘッダーアイキャッチ設定', 'emanon-premium' ),
	'description' => __( '［注意］表示設定でヘッダーアイキャッチを有効にしてください。', 'emanon-premium' ),
	'priority' => 3,
	'panel' => 'emanon_front_page_settings',
) );

	// Header eyecatch layout type
	$wp_customize->add_setting( 'header_eyecatch_layout', array(
		'default' => 'title',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_eyecatch_layout', array(
		'label' => __( 'レイアウト', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_layout',
		'type' => 'radio',
		'choices' => array(
			'eyecatch_title'     => __( 'アイキャッチ & タイトル', 'emanon-premium' ),
			'eyecatch_shortcode' => __( 'アイキャッチ & ショートコード［PC］', 'emanon-premium' ),
			'eyecatch_movie'     => __( 'アイキャッチ & 動画', 'emanon-premium' ),
			'eyecatch_search'    => __( 'アイキャッチ & カスタム検索', 'emanon-premium' ),
			'title_shortcode'    => __( 'タイトル & ショートコード［PC］', 'emanon-premium' ),
			'title_movie'        => __( 'タイトル & 動画', 'emanon-premium' ),
			'title_search'       => __( 'タイトル & カスタム検索', 'emanon-premium' ),
			'eyecatch'           => __( 'アイキャッチ', 'emanon-premium' ),
			'movie'              => __( '動画', 'emanon-premium' ),
			'title'              => __( 'タイトル', 'emanon-premium' ),
			'background_image'   => __( '背景画像', 'emanon-premium' ),
			),
		'priority' => 1,
	) );

	// header eyecatch layout reverse
	$wp_customize->add_setting( 'header_eyecatch_layout_reverse', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_layout_reverse', array(
		'label' =>__( '配置の入れ替え', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_layout_reverse',
		'type' => 'checkbox',
		'priority' => 2,
	) );

	$wp_customize->add_setting( 'header_eyecatch_arrangement', array(
		'default' => 'center',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_eyecatch_arrangement', array(
		'label' => __( '配置［PC］', 'emanon-premium' ),
		'description' => __( 'レイアウトがアイキャッチ、タイトル、動画の場合に適用されます。', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_arrangement',
		'type' => 'radio',
		'choices' => array(
			'center' => __( '中央配置', 'emanon-premium' ),
			'left'   => __( '左配置', 'emanon-premium' ),
			'right'  => __( '右配置', 'emanon-premium' ),
			),
		'priority' => 3,
	) );

	// Background image［PC］
	$wp_customize->add_setting( 'header_eyecatch_background_image_pc', array(
		'default' => get_theme_file_uri('/assets/images/emanon-premium.jpg'),
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_eyecatch_background_image_pc', array (
		'label' => __( '背景画像［PC］', 'emanon-premium' ),
		'description' => __( '推奨画像サイズ：1920px * 500px', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_background_image_pc',
		'priority' => 4,
	) ) );

	// Background image［SP］
	$wp_customize->add_setting( 'header_eyecatch_background_image_sp', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_eyecatch_background_image_sp', array (
		'label' => __( '背景画像［SP］', 'emanon-premium' ),
		'description' => __( '推奨画像サイズ：750px * 1335px', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_background_image_sp',
		'priority' => 5,
	) ) );

	// Header eyecatch image［PC］
	$wp_customize->add_setting( 'header_eyecatch_image_pc', array(
		'default' =>'',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_eyecatch_image_pc', array (
		'label' => __( 'アイキャッチ画像［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_image_pc',
		'priority' => 6,
	) ) );

	// Header eyecatch image［SP］
	$wp_customize->add_setting( 'header_eyecatch_image_sp', array(
		'default' =>'',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_eyecatch_image_sp', array (
		'label' => __( 'アイキャッチ画像［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_image_sp',
		'priority' => 7,
	) ) );

	// Title
	$wp_customize->add_setting( 'header_eyecatch_title', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Textarea_Control( $wp_customize, 'header_eyecatch_title', array(
		'label' => __( 'タイトル', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_title',
		'type' => 'text',
		'priority' => 8,
	) ) );

	// Message
	$wp_customize->add_setting( 'header_eyecatch_message', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Textarea_Control( $wp_customize, 'header_eyecatch_message', array(
		'label' => __( 'メッセージ', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_message',
		'priority' => 9,
	) ) );

	// Message layout: center
	$wp_customize->add_setting( 'header_eyecatch_message_center', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_message_center', array(
		'label' =>__( 'メッセージレイアウト: 中央配置', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_message_center',
		'type' => 'checkbox',
		'priority' => 10,
	) );

	// Short code
	$wp_customize->add_setting( 'header_eyecatch_shortcode', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'header_eyecatch_shortcode', array(
		'label' => __( 'ショートコード', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_shortcode',
		'type' => 'text',
		'priority' => 11,
	) );

	// Mp4
	$wp_customize->add_setting( 'header_eyecatch_mp4', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'header_eyecatch_mp4', array(
		'label' => __( 'MP4ファイル', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_mp4',
		'mime_type' => 'video',
		'button_labels' => array(
			'select'       => __( '動画の選択', 'emanon-premium' ),
			'change'       => __( '動画の変更', 'emanon-premium' ),
			'placeholder'  => __( '動画は選択されていません', 'emanon-premium' ),
			'frame_title'  => __( '動画の選択', 'emanon-premium' ),
			'frame_button' => __( '動画の選択', 'emanon-premium' ),
			),
		'priority' => 12,
	) ) );

	// Substitution image
	$wp_customize->add_setting( 'header_eyecatch_mp4_image', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_eyecatch_mp4_image', array (
		'label' => __( '代替画像', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_mp4_image',
		'priority' => 13,
	) ) );

	// Autoplay［PC］
	$wp_customize->add_setting( 'header_eyecatch_mp4_autoplay_pc', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_mp4_autoplay_pc', array(
		'label' =>__( '動画自動再生［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_mp4_autoplay_pc',
		'type' => 'checkbox',
		'priority' => 14,
	) );

	// Loop［PC］
	$wp_customize->add_setting( 'header_eyecatch_mp4_loop_pc', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_mp4_loop_pc', array(
		'label' =>__( '動画 ループ再生［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_mp4_loop_pc',
		'type' => 'checkbox',
		'priority' => 15,
	) );

	// Muted［PC］
	$wp_customize->add_setting( 'header_eyecatch_mp4_muted_pc', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_mp4_muted_pc', array(
		'label' =>__( '動画 消音［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_mp4_muted_pc',
		'type' => 'checkbox',
		'priority' => 16,
	) );

	// Controls［PC］
	$wp_customize->add_setting( 'header_eyecatch_mp4_controls_pc', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_mp4_controls_pc', array(
		'label' =>__( '動画 コントローラー［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_mp4_controls_pc',
		'type' => 'checkbox',
		'priority' => 17,
	) );

	// Autoplay［SP］
	$wp_customize->add_setting( 'header_eyecatch_mp4_autoplay_sp', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_mp4_autoplay_sp', array(
		'label' =>__( '動画 自動再生［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_mp4_autoplay_sp',
		'type' => 'checkbox',
		'priority' => 18,
	) );

	// Loop［SP］
	$wp_customize->add_setting( 'header_eyecatch_mp4_loop_sp', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_mp4_loop_sp', array(
		'label' =>__( '動画 ループ再生［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_mp4_loop_sp',
		'type' => 'checkbox',
		'priority' => 19,
	) );

	// Muted［SP］
	$wp_customize->add_setting( 'header_eyecatch_mp4_muted_sp', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_mp4_muted_sp', array(
		'label' =>__( '動画 消音［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_mp4_muted_sp',
		'type' => 'checkbox',
		'priority' => 20,
	) );

	// Controls［SP］
	$wp_customize->add_setting( 'header_eyecatch_mp4_controls_sp', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_mp4_controls_sp', array(
		'label' =>__( '動画 コントローラー［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_mp4_controls_sp',
		'type' => 'checkbox',
		'priority' => 21,
	) );

	// Btn text
	$wp_customize->add_setting( 'header_eyecatch_btn_text', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'header_eyecatch_btn_text', array(
		'label' => __( 'ボタン テキスト', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_btn_text',
		'type' => 'text',
		'priority' => 22,
	) );

	// Btn url
	$wp_customize->add_setting( 'header_eyecatch_btn_url', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_eyecatch_btn_url', array(
		'label' => __( 'URL', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_btn_url',
		'type' => 'url',
		'priority' => 23,
	) );

	// Btn microcopy
	$wp_customize->add_setting( 'header_eyecatch_btn_microcopy', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'header_eyecatch_btn_microcopy', array(
		'label' => __( 'マイクロコピー', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_btn_microcopy',
		'type' => 'text',
		'priority' => 24,
	) );

	// Open in a new window
	$wp_customize->add_setting( 'header_eyecatch_target_brank', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_target_brank', array(
		'label' => __( '新しいウィンドウで表示', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_target_brank',
		'type' => 'checkbox',
		'priority' => 25,
	) );

	// Text animation
	$wp_customize->add_setting( 'header_eyecatch_text_animation', array(
		'default' => 'none',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_eyecatch_text_animation', array(
		'label' => __( 'アニメーション効果［テキスト］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_text_animation',
		'type' => 'radio',
		'choices' => array(
			'none' => __( 'なし', 'emanon-premium' ),
			'fadein' => __( 'フェードイン', 'emanon-premium' ),
			'slideup' => __( 'スライドアップ', 'emanon-premium' ),
			),
		'priority' => 26,
	) );

	// Particles background
	$wp_customize->add_setting( 'header_eyecatch_particles_background', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_particles_background', array(
		'label' =>__( 'パーティクル背景の表示', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_particles_background',
		'type' => 'checkbox',
		'priority' => 27,
	) );

	// Particle shape speed
	$wp_customize->add_setting( 'header_eyecatch_particles_shape_speed', array(
		'default' => 3,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number'
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_eyecatch_particles_shape_speed', array(
		'label' => __( '粒子［移動速度］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_particles_shape_speed',
		'min' => 1,
		'max' => 10,
		'step' => 1,
		'priority' => 28,
	) ) );

	// Particle shape value
	$wp_customize->add_setting( 'header_eyecatch_particles_shape_value', array(
		'default' => 80,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_eyecatch_particles_shape_value', array(
		'label' => __( '粒子［表示数］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_particles_shape_value',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 29,
	) );

	// Particle shape size
	$wp_customize->add_setting( 'header_eyecatch_particles_shape_size', array(
		'default' => 5,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_eyecatch_particles_shape_size', array(
		'label' => __( '粒子［サイズ］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_particles_shape_size',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 30,
	) );

	// Shape type
	$wp_customize->add_setting( 'header_eyecatch_particles_shape_type', array(
		'default' => 'circle',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_eyecatch_particles_shape_type', array(
		'label'     => __( '粒子［形状］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings'  => 'header_eyecatch_particles_shape_type',
		'type'      => 'radio',
		'choices'   => array(
			'circle'   => __( 'サークル', 'emanon-premium' ),
			'edge'     => __( 'エッジ', 'emanon-premium' ),
			'triangle' => __( 'トライアングル', 'emanon-premium' ),
			'polygon'  => __( 'ポリゴン', 'emanon-premium' ),
			'star'     => __( 'スター', 'emanon-premium' ),
			),
		'priority' => 31,
	) );

	// Particle shape random size
	$wp_customize->add_setting( 'header_eyecatch_particles_shape_random_size', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_particles_shape_random_size', array(
		'label' =>__( '粒子［ランダムサイズ］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_particles_shape_random_size',
		'type' => 'checkbox',
		'priority' => 32,
	) );

	// Particles linked
	$wp_customize->add_setting( 'header_eyecatch_particles_linked', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_particles_linked', array(
		'label' => __( '粒子［連結］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_particles_linked',
		'type' => 'checkbox',
		'priority' => 33,
	) );

	// Particles opacity anime
	$wp_customize->add_setting( 'header_eyecatch_opacity_anime', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_opacity_anime', array(
		'label' => __( '粒子［透過アニメーション］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_opacity_anime',
		'type' => 'checkbox',
		'priority' => 34,
	) );

	// Particles size anime
	$wp_customize->add_setting( 'header_eyecatch_size_anime', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_size_anime', array(
		'label' => __( '粒子［サイズアニメーション］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_size_anime',
		'type' => 'checkbox',
		'priority' => 35,
	) );

	// Particle shape opacity
	$wp_customize->add_setting( 'header_eyecatch_particles_shape_opacity', array(
		'default' => 0.6,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_range_slider'
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_eyecatch_particles_shape_opacity', array(
		'label' => __( '粒子［透過率］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_particles_shape_opacity',
		'min' => 0,
		'max' => 1,
		'step' => 0.1,
		'priority' => 36,
		) ) );

	// Particle border width
	$wp_customize->add_setting( 'header_eyecatch_particles_border_width', array(
		'default' => 2,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_eyecatch_particles_border_width', array(
		'label' => __( '連結［幅］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_particles_border_width',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 37,
	) );

	// Particle border opacity
	$wp_customize->add_setting( 'header_eyecatch_particles_border_opacity', array(
		'default' => 0.6,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_range_slider'
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_eyecatch_particles_border_opacity', array(
		'label' => __( '連結［透過率］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_particles_border_opacity',
		'min' => 0,
		'max' => 1,
		'step' => 0.1,
		'priority' => 38,
		) ) );

	// Slider height［PC］
	$wp_customize->add_setting( 'header_eyecatch_height_pc', array(
		'default' => 500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_eyecatch_height_pc', array(
		'label' => __( '高さ［PC］', 'emanon-premium' ),
		'description' => __( '初期値：500px', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_height_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 39,
	) );

	// Slider height［SP］
	$wp_customize->add_setting( 'header_eyecatch_height_sp', array(
		'default' => 500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_eyecatch_height_sp', array(
		'label' => __( '高さ［SP］', 'emanon-premium' ),
		'description' => __( '初期値：500px', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_height_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 40,
	) );

	// Title font size［PC］
	$wp_customize->add_setting( 'header_eyecatch_title_fontsize_pc', array(
		'default' => 32,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_eyecatch_title_fontsize_pc', array(
		'label' => __( 'タイトル 文字サイズ［PC］', 'emanon-premium' ),
		'description' => __( '初期値：32px', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_title_fontsize_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 41,
	) );

	// Title font size［SP］
	$wp_customize->add_setting( 'header_eyecatch_title_fontsize_sp', array(
		'default' => 24,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_eyecatch_title_fontsize_sp', array(
		'label' => __( 'タイトル 文字サイズ［SP］', 'emanon-premium' ),
		'description' => __( '初期値：24px', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_title_fontsize_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 42,
	) );

	// Separator style
	$wp_customize->add_setting( 'header_eyecatch_separator', array(
		'default' => 'display_none',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_eyecatch_separator', array(
		'label' => __( '区切りデサイン', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_separator',
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
		'priority' => 43,
	) );

	// Title color
	$wp_customize->add_setting( 'header_eyecatch_title_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_eyecatch_title_color', array(
		'label' => __( 'タイトル', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_title_color',
		'priority' => 44,
	) ) );

	// Message color
	$wp_customize->add_setting( 'header_eyecatch_message_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_eyecatch_message_color', array(
		'label' => __( 'メッセージ', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_message_color',
		'priority' => 45,
	) ) );

	// Btn border color
	$wp_customize->add_setting( 'header_eyecatch_btn_border_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_eyecatch_btn_border_color', array(
		'label' => __( 'ボタン 枠線', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_btn_border_color',
		'priority' => 46,
	) ) );

	// Btn border hover color
	$wp_customize->add_setting( 'header_eyecatch_btn_border_hover_color', array(
		'default' => emanon_primary_light_color(),
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_eyecatch_btn_border_hover_color', array(
		'label' => __( 'ボタン 枠線［ホバー］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_btn_border_hover_color',
		'priority' => 47,
	) ) );

	// Btn background color
	$wp_customize->add_setting( 'header_eyecatch_btn_background', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_eyecatch_btn_background', array(
		'label' =>__( 'ボタン 背景色', 'emanon-premium' ),
		'description' => __( 'ボタン枠線の色が背景色に反映されます。', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_btn_background',
		'type' => 'checkbox',
		'priority' => 48,
	) );

	// Btn text color
	$wp_customize->add_setting( 'header_eyecatch_btn_text_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_eyecatch_btn_text_color', array(
		'label' => __( 'ボタン テキスト', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_btn_text_color',
		'priority' => 49,
	) ) );

	// Btn microcopy color
	$wp_customize->add_setting( 'header_eyecatch_btn_microcopy_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_eyecatch_btn_microcopy_color', array(
		'label' => __( 'マイクロコピー', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_btn_microcopy_color',
		'priority' => 50,
	) ) );

	// Particle shape color
	$wp_customize->add_setting( 'header_eyecatch_particles_shape_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_eyecatch_particles_shape_color', array(
		'label' => __( 'パーティクル［粒子］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_particles_shape_color',
		'priority' => 51,
	) ) );

	// Particle border color
	$wp_customize->add_setting( 'header_eyecatch_particles_border_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_eyecatch_particles_border_color', array(
		'label' => __( 'パーティクル［連結］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_particles_border_color',
		'priority' => 52,
	) ) );

	// Background mask color start
	$wp_customize->add_setting( 'header_eyecatch_background_color_start', array(
		'default' => '#000',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_eyecatch_background_color_start', array(
		'label' => __( '背景色［開始］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_background_color_start',
		'priority' => 53,
	) ) );

	// Background mask color end
	$wp_customize->add_setting( 'header_eyecatch_background_color_end', array(
		'default' => '#000',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_eyecatch_background_color_end', array(
		'label' => __( '背景色［終了］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_background_color_end',
		'priority' => 54,
	) ) );

	// Background color degree
	$wp_customize->add_setting( 'header_eyecatch_background_color_degree', array(
		'default' => 135,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_eyecatch_background_color_degree', array(
		'label' => __( '角度', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_background_color_degree',
		'type' => 'number',
		'priority' => 55,
	) );

	// Background mask color opacity
	$wp_customize->add_setting( 'header_eyecatch_opacity', array(
		'default' => 0,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_range_slider'
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_eyecatch_opacity', array(
		'label' => __( '背景色［透過率］', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_opacity',
		'min' => 0,
		'max' => 1,
		'step' => 0.1,
		'priority' => 56,
	) ) );

	// Separator color
	$wp_customize->add_setting( 'header_eyecatch_separator_color', array(
		'default' => '#eeeff0',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_eyecatch_separator_color', array(
		'label' => __( '区切り線', 'emanon-premium' ),
		'section' => 'emanon_header_eyecatch',
		'settings' => 'header_eyecatch_separator_color',
		'priority' => 57,
	) ) );