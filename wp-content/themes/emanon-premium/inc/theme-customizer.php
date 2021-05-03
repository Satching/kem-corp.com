<?php
/**
 * Theme customizer
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * Customizeの登録
 */
if ( ! function_exists( 'emanon_customize_register' ) ):
	add_action( 'customize_register', 'emanon_customize_register' );
	function emanon_customize_register( $wp_customize ) {

		$wp_customize->get_section( 'colors' )->panel              = 'emanon_colors_settings';
		$wp_customize->get_section( 'colors' )->title              = __( 'ベース配色設定', 'emanon-premium');
		$wp_customize->get_section( 'colors' )->priority           = '2';
		$wp_customize->get_section( 'header_image' )->panel        = 'emanon_design_settings';
		$wp_customize->get_section( 'header_image' )->priority     = '1';
		$wp_customize->get_section( 'background_image' )->panel    = 'emanon_design_settings';
		$wp_customize->get_section( 'background_image' )->priority = '2';

		/* Site identity panel */
		require_once T_DIRE . '/inc/customizer-menu/site-identity-panel.php';

		/* Design panel */
		require_once T_DIRE . '/inc/customizer-menu/design-panel.php';
			/* General design */
			require_once T_DIRE . '/inc/customizer-menu/design/design-general.php';
			/* Typography design */
			require_once T_DIRE . '/inc/customizer-menu/design/design-typography.php';
			/* Header design */
			require_once T_DIRE . '/inc/customizer-menu/design/design-hamburger-menu.php';
			/* Drawer menu design */
			require_once T_DIRE . '/inc/customizer-menu/design/design-drawer-menu.php';
			/* Article */
			require_once T_DIRE . '/inc/customizer-menu/design/design-article.php';
			/* Table of contents  design*/
			require_once T_DIRE . '/inc/customizer-menu/design/design-table-of-contents.php';
			/* Sidebar design */
			require_once T_DIRE . '/inc/customizer-menu/design/design-sidebar.php';
			/* Footer  design */
			require_once T_DIRE . '/inc/customizer-menu/design/design-footer.php';
			/* widget  design */
			require_once T_DIRE . '/inc/customizer-menu/design/design-widget.php';

		/* Colors panel */
		require_once T_DIRE . '/inc/customizer-menu/colors-panel.php';
			/* Colors palettes */
			require_once T_DIRE . '/inc/customizer-menu/colors/colors-palettes.php';
			/* General colors */
			require_once T_DIRE . '/inc/customizer-menu/colors/colors-general.php';
			/* Header colors */
			require_once T_DIRE . '/inc/customizer-menu/colors/colors-header.php';
			/* Header menu colors */
			require_once T_DIRE . '/inc/customizer-menu/colors/colors-header-menu.php';
			/* Hamburger menu colors */
			require_once T_DIRE . '/inc/customizer-menu/colors/colors-hamburger-menu.php';
			/* Header panel colors */
			require_once T_DIRE . '/inc/customizer-menu/colors/colors-header-panel.php';
			/* Article colors */
			require_once T_DIRE . '/inc/customizer-menu/colors/colors-article.php';
			/* Sidebar colors */
			require_once T_DIRE . '/inc/customizer-menu/colors/colors-sidebar.php';
			/* Footer colors */
			require_once T_DIRE . '/inc/customizer-menu/colors/colors-footer.php';

		/* First view type */
		require_once T_DIRE . '/inc/customizer-menu/first-view-panel.php';
			/* Header eyecatch */
			require_once T_DIRE . '/inc/customizer-menu/first-view/header-eyecatch.php';
			/* Image slider */
			require_once T_DIRE . '/inc/customizer-menu/first-view/header-image-slider.php';
			/* Content slider */
			require_once T_DIRE . '/inc/customizer-menu/first-view/header-content-slider.php';
			/* Pick up slider */
			require_once T_DIRE . '/inc/customizer-menu/first-view/header-pickup-slider.php';
			/* Page box slider */
			require_once T_DIRE . '/inc/customizer-menu/first-view/header-pagebox-slider.php';
			/* Header video */
			require_once T_DIRE . '/inc/customizer-menu/first-view/header-video.php';

	}
endif;

/**
 * CustomizeのCSS
 */
add_action(
	'customize_controls_print_styles',
	function () {
		wp_enqueue_style( 'emanon_customizer_css' , T_DIRE_URI . '/assets/css/customizer-style.css');
	}
);

/**
 * Textarea Control
 */
	if( class_exists( 'WP_Customize_Control' ) ):
		class Emanon_WP_Customize_Textarea_Control extends WP_Customize_Control {
			public $type = 'textarea';
			public function render_content() {
				?>
				<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<textarea rows="3" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
				</label>
				<?php
			}
		}
	endif;

/**
 * Dropdown for all categories
 */
	if( class_exists( 'WP_Customize_Control' ) ):
		class Emanon_WP_Customize_Category_Dropdown_Control extends WP_Customize_Control {
		private $cats = false;
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
				$this->cats = get_categories( $options );
				parent::__construct( $manager, $id, $args );
		}

		public function render_content() {
				if( !empty( $this->cats ) ) {
					?>
						<label>
							<span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
							<select multiple <?php $this->link(); ?>>
									 <?php foreach ( $this->cats as $cat ) {
												printf( '<option value="%s" %s>%s</option>', $cat->term_id, selected( $this->value(), $cat->term_id, false), $cat->name ); 
												}
									?>
							</select>
						</label>
					<?php
				}
			}
	}
	endif;

/**
 * 範囲スライダー
 */
	if( class_exists( 'WP_Customize_Control' ) ):
		class Emanon_WP_Customize_Range_slider_Control extends WP_Customize_Control {
		public $type = 'range';

			public function __construct( $manager, $id, $args = array() ) {
				parent::__construct( $manager, $id, $args );
				$defaults = array(
					'min' => 0,
					'max' => 10,
					'step' => 1
				);
					$args = wp_parse_args( $args, $defaults );

					$this->min = $args['min'];
					$this->max = $args['max'];
					$this->step = $args['step'];
				}

			public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input class='range-slider' min="<?php echo $this->min ?>" max="<?php echo $this->max ?>" step="<?php echo $this->step ?>" type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
				<input onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='text' value='<?php echo esc_attr( $this->value() ); ?>' readonly>
			</label>
			<?php
			}
		}
	endif;

/**
 * チェックボックス
 */
	function emanon_sanitize_checkbox( $input ) {
	if ( $input == true ) {
		return true;
		} else {
		return '';
		}
	}

/**
 * テキスト
 */
	function emanon_sanitize_text( $input ) {
		$input = wp_kses_post( $input );
		return $input;
	}

/**
 * テキストエリア
 */
	function emanon_sanitize_textarea( $input ) {
		$input = stripslashes( wp_filter_post_kses( addslashes( $input ) ) );
		return $input;
		}

/**
 * 数値
 */
	function emanon_sanitize_number( $input ) {
		$input = absint( $input );
		return $input;
		}

/**
 * 整数
 */
	function emanon_sanitize_integer( $input ) {
		if( is_numeric( $input ) ) {
				return intval( $input );
		}
	}

/**
 * 範囲スライダー
 */
	function emanon_sanitize_range_slider( $input ) {
	if ( is_numeric( $input ) && $input >= 0 && $input <= 1 ) {
	return $input ;
		} else {
			return '';
		}
	}

/**
 * パーセント
 */
	function emanon_sanitize_number_sprintf( $input ) {
		$input = sprintf('%0.2f', $input );
		return $input;
		}

/**
 * メール
 */
	function emanon_sanitize_email( $input ) {
		if( is_email( $input ) ){
		return $input;
		} else {
			return '';
		}
	}

/**
 * カラー
 */
	function emanon_sanitize_colorcode( $input ) {
		if ( preg_match( '/^#([\da-fA-F]{6}|[\da-fA-F]{3})$/', $input ) ) {
		return $input;
		} else {
			return '';
		}
	}

/**
 * カテゴリーセレクト
 */
	function emanon_sanitize_select_category( $input ) {
		if ( ! in_array( $input, array( 'Uncategorized','category_slider' ) ) )
		 return $input;
	}

/**
 * ラジオボタン・セレクトボックス
 */
	function emanon_sanitize_radio_select( $input, $setting ) {
		$input = sanitize_key( $input );
		$choices = $setting->manager->get_control($setting->id)->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}