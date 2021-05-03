<?php
/**
 * Widget icon menu section class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Icon_Menu_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'icon_menu_section', // Base ID
			__( '[Es] アイコンメニュー', 'emanon-premium' ), // Name
			array( 'description' => __( 'アイコンメニューを表示するセクション。', 'emanon-premium' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @param array $args      ウィジェットの引数 「before_title, after_title, before_widget, after_widget」
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		$display_none_pc = apply_filters( 'widget_checkbox', empty( $instance['display_none_pc'] ) ? '' : $instance['display_none_pc'], $instance, $this->id_base );
		if ( ! is_mobile() && $display_none_pc ) {
			return;
		}

		$title           = apply_filters( 'widget_textarea', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$sub_title       = apply_filters( 'widget_text', empty( $instance['sub_title'] ) ? '' : $instance['sub_title'], $instance, $this->id_base );
		$lead            = apply_filters( 'widget_textarea', empty( $instance['lead'] ) ? '' : $instance['lead'], $instance, $this->id_base );
		$nav_menu        = apply_filters( 'widget_select', empty( $instance['nav_menu'] ) ? '' : $instance['nav_menu'], $instance, $this->id_base );
		$header_center   = apply_filters( 'widget_checkbox', empty( $instance['header_center'] ) ? '' : $instance['header_center'], $instance, $this->id_base );
		$lead_left       = apply_filters( 'widget_checkbox', empty( $instance['lead_left'] ) ? '' : $instance['lead_left'], $instance, $this->id_base );
		$content_width   = apply_filters( 'widget_select', empty( $instance['content_width'] ) ? 'normal' : $instance['content_width'], $instance, $this->id_base );
		$section_padding = apply_filters( 'widget_select', empty( $instance['section_padding'] ) ? 'normal' : $instance['section_padding'], $instance, $this->id_base );
		$active_bg_color = apply_filters( 'widget_checkbox', empty( $instance['active_bg_color'] ) ? '' : $instance['active_bg_color'], $instance, $this->id_base );
		$icon_color      = apply_filters( 'widget_color', empty( $instance['icon_color'] ) ? '#ffffff' : $instance['icon_color'], $instance, $this->id_base );
		$icon_bg_color   = apply_filters( 'widget_color', empty( $instance['icon_bg_color'] ) ? '#333333' : $instance['icon_bg_color'], $instance, $this->id_base );
		echo $args['before_widget'];
		$nav_menu_args  = array(
			'depth'       => 1,
			'fallback_cb' => '',
			'menu'        => $nav_menu,
			'before'      => '<div class="menu-icon__item" style="background-color: '. $icon_bg_color .';">',
			'after'       => '</div>',
			'link_before' => '<div style="color: '. $icon_color .'; ">',
			'link_after'  => '</div>',
			'menu_class'  => 'menu-icon__nav'
		);
	?>
		<section class="c-section-widget__inner" data-section-padding="<?php echo esc_attr( $section_padding ); ?>" <?php if ( $active_bg_color ) { ?>style="background-color: <?php echo esc_attr( $instance['bg_color'] ); ?>;"<?php } ?>>
			<?php if ( $title || $sub_title || $lead ): ?>
				<div class="l-content" data-content-width="<?php echo esc_attr( $content_width ); ?>">
					<div class="c-section-widget__header<?php if ( $header_center ) { ?> u-narrow-width__center<?php } ?>">
					<?php if ( $title ) : ?>
					<h2 class="c-section-widget__title" style="color: <?php echo esc_attr( $instance['title_color'] ); ?>;"><?php echo nl2br( wp_kses_post( $title) ); ?></h2>
					<?php endif; ?>
					<?php if ( $sub_title ) : ?>
					<div class="c-section-widget__sub-title" style="color: <?php echo esc_attr( $instance['sub_title_color'] ); ?>;"><?php echo wp_kses_post( $sub_title ); ?></div>
					<?php endif; ?>
					<?php if ( $lead ) : ?>
					<div class="c-section-widget__leadd<?php if ( $lead_left ) { ?> u-text-align-left<?php } ?>" style="color: <?php echo esc_attr( $instance['lead_color'] ); ?>;">
							<?php echo nl2br( wp_kses_post( $lead ) ); ?>
					</div>
					<?php endif; ?>
					</div><!--/.l-content-->
				</div><!--/.section-widget-header-->
			<?php endif; ?>
			<div class="l-content" data-content-width="<?php echo esc_attr( $content_width ); ?>">
				<div class="menu-icon">
				<?php wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) ); ?>
				</div><!--/.icon-menu-section-->
			</div><!--/.l-content-->
		</section><!--/.c-section-widget__inner-->
		<?php
			echo $args['after_widget'];
	}

	/**
	 * 管理画面にWidgetを表示
	 *
	 * @param array $instance データベースからの前回保存された値
	 */
	public function form( $instance ) {
		$defaults = array(
			'title'           => '',
			'sub_title'       => '',
			'lead'            => '',
			'nav_menu'        => '',
			'header_center'   => '',
			'lead_left'       => '',
			'content_width'   => 'normal',
			'section_padding' => 'normal',
			'display_none_pc' => '',
			'active_bg_color' => '',
			'bg_color'        => '#ffffff',
			'title_color'     => '#333333',
			'sub_title_color' => '#484848',
			'lead_color'      => '#333333',
			'icon_color'      => '#333333',
			'icon_bg_color'   => '#ffffff',
			
		);
		$instance         = wp_parse_args( (array) $instance, $defaults );
		$nav_menu         = ( $instance['nav_menu'] );
		$title            = ( $instance['title'] );
		$sub_title        = ( $instance['sub_title'] );
		$lead             = ( $instance['lead'] );
		$header_center    = ( $instance['header_center'] );
		$lead_left        = ( $instance['lead_left'] );
		$content_width    = ( $instance['content_width'] );
		$section_padding  = ( $instance['section_padding'] );
		$display_none_pc  = ( $instance['display_none_pc'] );
		$active_bg_color  = ( $instance['active_bg_color'] );
		$bg_color         = ( $instance['bg_color'] );
		$title_color      = ( $instance['title_color'] );
		$sub_title_color  = ( $instance['title_color'] );
		$lead_color       = ( $instance['lead_color'] );
		$icon_color       = ( $instance['icon_color'] );
		$icon_bg_color    = ( $instance['icon_bg_color'] );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'タイトル', 'emanon-premium' ); ?>
			</label>
			<input
				type="hidden"
				name="<?php echo $this->get_field_name( 'title' ); ?>"
				id="<?php echo $this->get_field_id( 'title' ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $title ); ?>"
			>
			<textarea
				name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				class="widefat"
				rows="3"
			><?php echo esc_textarea( $title ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'sub_title' ); ?>">
				<?php _e( 'サブタイトル', 'emanon-premium' ); ?>
			</label>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'sub_title' ); ?>"
				id="<?php echo $this->get_field_id( 'sub_title' ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $sub_title ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'lead' ) ); ?>">
				<?php _e( 'リード文', 'emanon-premium' ); ?>
			</label>
			<textarea
				name="<?php echo esc_attr( $this->get_field_name( 'lead' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'lead' ) ); ?>"
				class="widefat"
				rows="5"
			><?php echo esc_textarea( $lead ); ?></textarea>
		</p>

		<hr>

		<p>
			<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'メニュー選択', 'emanon-premium' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
				<option value="0"><?php _e( '&mdash; 選択 &mdash;','emanon-premium' ); ?></option>
					<?php
						$menus = wp_get_nav_menus();
						foreach ( $menus as $menu ):
					?>
					<option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
						<?php echo esc_html( $menu->name ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</p>

		<hr>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'header_center' ); ?>"
				id="<?php echo $this->get_field_id( 'header_center' ); ?>"
				class="checkbox"
				<?php checked( $header_center ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'header_center' ); ?>"><?php _e( 'ヘッダー［中央配置］', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'lead_left' ); ?>"
				id="<?php echo $this->get_field_id( 'lead_left' ); ?>"
				class="checkbox"
				<?php checked( $lead_left ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'lead_left' ); ?>"><?php _e( 'リード文［左寄せ］', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'content_width' ) ); ?>"><?php _e( 'コンテンツ幅', 'emanon-premium' ); ?></label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'content_width' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'content_width' ) ); ?>"
					class="widefat"
					style="width:80px!important"
				>
				<?php
				$content_width = [
					'normal' => __( '標準', 'emanon-premium' ),
					'narrow' => __( '狭幅', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $content_width as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['content_width'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>
	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'section_padding' ) ); ?>"><?php _e( 'セクション余白', 'emanon-premium'); ?></label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'section_padding' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'section_padding' ) ); ?>"
					class="widefat"
					style="width:190px!important"
				>
				<?php
				$section_padding = [
					'normal'      => __( '標準', 'emanon-premium' ),
					'top-none'    => __( '余白［上部］：なし', 'emanon-premium' ),
					'bottom-none' => __( '余白［下部］：なし', 'emanon-premium'),
					'none'        => __( '余白［上下］：なし', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $section_padding as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['section_padding'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'display_none_pc' ); ?>"
				id="<?php echo $this->get_field_id( 'display_none_pc' ); ?>"
				class="checkbox"
				<?php checked( $display_none_pc ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'display_none_pc' ); ?>"><?php _e( '［PC］非表示', 'emanon-premium' ); ?></label>
		</p>

		<hr>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'active_bg_color' ); ?>"
				id="<?php echo $this->get_field_id( 'active_bg_color' ); ?>"
				class="checkbox"
				<?php checked( $active_bg_color ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'active_bg_color' ); ?>"><?php _e( '背景色を有効にする', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bg_color' ); ?>">
				<?php _e( '背景色', 'emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'bg_color' ); ?>"
			id="<?php echo $this->get_field_id( 'bg_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#ffffff"
			value="<?php echo esc_attr( $bg_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_color' ); ?>">
				<?php _e( 'タイトル', 'emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'title_color' ); ?>"
			id="<?php echo $this->get_field_id( 'title_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#333333"
			value="<?php echo esc_attr( $title_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'sub_title_color' ); ?>">
				<?php _e( 'サブタイトル', 'emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'sub_title_color' ); ?>"
			id="<?php echo $this->get_field_id( 'sub_title_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#484848"
			value="<?php echo esc_attr( $sub_title_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'lead_color' ); ?>">
				<?php _e( 'リード文', 'emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'lead_color' ); ?>"
			id="<?php echo $this->get_field_id( 'lead_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#333333"
			value="<?php echo esc_attr( $lead_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'icon_color' ); ?>">
				<?php _e( 'アイコン','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'icon_color' ); ?>"
			id="<?php echo $this->get_field_id( 'icon_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#333333"
			value="<?php echo esc_attr( $icon_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'icon_bg_color' ); ?>">
				<?php _e( 'アイコン［背景色］','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'icon_bg_color' ); ?>"
			id="<?php echo $this->get_field_id( 'icon_bg_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#ffffff"
			value="<?php echo esc_attr( $icon_bg_color ); ?>"
			>
		</p>

		<?php
	}

	/**
	 * Widgetフォームの値を保存用にサニタイズ
	 *
	 * @param array $new_instance 新しいオプション値
	 * @param array $old_instance 以前のオプション値
	 *
	 * @return array 保存（更新）する設定データ
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']           = wp_kses_post( $new_instance['title'] );
		$instance['sub_title']       = wp_kses_post( $new_instance['sub_title'] );
		$instance['lead']            = wp_kses_post( $new_instance['lead'] );
		$instance['nav_menu']        = (int) $new_instance['nav_menu'];
		$instance['header_center']   = (bool) $new_instance['header_center'];
		$instance['lead_left']       = (bool) $new_instance['lead_left'];
		$instance['content_width']   = esc_attr( $new_instance['content_width'] );
		$instance['section_padding'] = esc_attr( $new_instance['section_padding'] );
		$instance['display_none_pc'] = (bool) $new_instance['display_none_pc'];
		$instance['active_bg_color'] = (bool) $new_instance['active_bg_color'];
		$instance['bg_color']        = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['title_color']     = sanitize_hex_color( $new_instance['title_color'] );
		$instance['sub_title_color'] = sanitize_hex_color( $new_instance['sub_title_color'] );
		$instance['lead_color']      = sanitize_hex_color( $new_instance['lead_color'] );
		$instance['icon_color']      = sanitize_hex_color( $new_instance['icon_color'] );
		$instance['icon_bg_color']   = sanitize_hex_color( $new_instance['icon_bg_color'] );
		return $instance;
	}

} // class Icon_Menu_Section_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_icon_menu_section_widget' );
	function emanon_register_icon_menu_section_widget() {
		register_widget( 'Icon_Menu_Section_Widget' );
}
