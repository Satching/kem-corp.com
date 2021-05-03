<?php
/**
 * Widget icon menu class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Icon_Menu_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'icon_menu', // Base ID
			__( '[E] アイコンメニュー', 'emanon-premium' ), // Name
			array( 'description' => __( 'アイコン付きのメニューを表示します。', 'emanon-premium' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @param array $args      ウィジェットの引数 「before_title, after_title, before_widget, after_widget」
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		$title         = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$nav_menu      = apply_filters( 'widget_select', empty( $instance['nav_menu'] ) ? '' : $instance['nav_menu'], $instance, $this->id_base );
		$icon_position = apply_filters( 'widget_select', empty( $instance['icon_position'] ) ? 'on-menu' : $instance['icon_position'], $instance, $this->id_base );
		$style         = apply_filters( 'widget_select', empty( $instance['style'] ) ? 'border' : $instance['style'], $instance, $this->id_base );
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$nav_menu_args  = array(
			'depth'       => 1,
			'fallback_cb' => '',
			'menu'        => $nav_menu,
			'menu_class'  => 'widget-icon-menu'
		);
	?>

	<div class="sidebar-icon-menu">
		<div class="<?php echo esc_attr( $style ); ?> <?php echo esc_attr( $icon_position ); ?>">
			<?php wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) ); ?>
		</div>
	</div>
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
			'title'         => '',
			'nav_menu'      => '',
			'icon_position' => '',
			'style'         => '',
		);
		$instance      = wp_parse_args( (array) $instance, $defaults );
		$title         = ( $instance['title'] );
		$nav_menu      = ( $instance['nav_menu'] );
		$icon_position = ( $instance['icon_position'] );
		$style         = ( $instance['style'] );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'タイトル', 'emanon-premium' ); ?>
			</label>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'title' ); ?>"
				id="<?php echo $this->get_field_id( 'title' ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $title ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>">
				<?php _e( 'メニュー選択', 'emanon-premium' ); ?>
			</label>
				<select
					id="<?php echo $this->get_field_id( 'nav_menu' ); ?>"
					name="<?php echo $this->get_field_name( 'nav_menu' ); ?>"
				>
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

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon_position' ) ); ?>">
				<?php _e( 'アイコン配置', 'emanon-premium' ); ?>
			</label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'icon_position' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'icon_position' ) ); ?>"
					class="widefat"
					style="width:50% !important"
				>
				<?php
				$icon_position = [
					'on-menu'   => __( 'メニュー［上］', 'emanon-premium' ),
					'left-menu' => __( 'メニュー［左］', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $icon_position as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['icon_position'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>">
				<?php _e( 'ボーダー', 'emanon-premium' ); ?>
			</label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"
					class="widefat"
					style="width:50% !important"
				>
				<?php
				$style = [
					'all_border'  => __( '枠線', 'emanon-premium' ),
					'border'      => __( 'ボーダー［区切り］', 'emanon-premium' ),
					'none-border' => __( 'ボーダーなし', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $style as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['style'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
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
		$instance['title']         = sanitize_text_field( $new_instance['title'] );
		$instance['nav_menu']      = (int) $new_instance['nav_menu'];
		$instance['icon_position'] = esc_attr( $new_instance['icon_position'] );
		$instance['style']         = esc_attr( $new_instance['style'] );
		return $instance;
	}

} // class Icon_Menu_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_icon_menu_widget' );
	function emanon_register_icon_menu_widget() {
		register_widget( 'Icon_Menu_Widget' );
}
