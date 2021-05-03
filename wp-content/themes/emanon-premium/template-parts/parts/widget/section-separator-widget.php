<?php
/**
 * Widget separator section class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Emanon_Separator_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'separator_section', // Base ID
			__( '[Es] 区切り', 'emanon-premium' ), // Name
			array( 'description' => __( 'セクション間に配置する区切りデザインです。', 'emanon-premium' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @param array $args      ウィジェットの引数 「before_title, after_title, before_widget, after_widget」
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		$display_none_sp = apply_filters( 'widget_checkbox', empty( $instance['display_none_sp'] ) ? '' : $instance['display_none_sp'], $instance, $this->id_base );
		if ( is_mobile() && $display_none_sp ) {
			return;
		}
		$display_none_pc = apply_filters( 'widget_checkbox', empty( $instance['display_none_pc'] ) ? '' : $instance['display_none_pc'], $instance, $this->id_base );
		if ( ! is_mobile() && $display_none_pc ) {
			return;
		}
		$separator       = apply_filters( 'widget_select', empty( $instance['separator'] ) ? 'separator-arch' : $instance['separator'], $instance, $this->id_base );
		$bg_color        = apply_filters( 'widget_color', empty( $instance['bg_color'] ) ? '#fff' : $instance['bg_color'], $instance, $this->id_base );
		$separator_color = apply_filters( 'widget_color', empty( $instance['separator_color'] ) ? '#f5f5f5' : $instance['separator_color'], $instance, $this->id_base );
		echo $args['before_widget'];
	?>
		<div class="separator-section-wrapper <?php echo esc_attr( $separator ); ?>" style="background-color: <?php echo esc_attr( $bg_color ); ?>;">
			<?php if ( 'separator-arch' === $separator ): ?>
			<svg class="separator-section-arch" style="fill: <?php echo esc_attr( $separator_color ); ?>;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
				<path d="M0 100 C40 0 60 0 100 100 Z"></path>
			</svg><!--/.separator-section-arch-->
			<?php elseif ( 'separator-wave' === $separator ): ?>
			<svg class="separator-section-wave" style="fill: <?php echo esc_attr( $separator_color ); ?>;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
				<path d="M 0 58 s 188.29 32 508 32 c 290 0 494 -35 494 -35 v 45 h -1002 z"></path>
			</svg><!--/.separator-section-wave-->
			<?php elseif ( 'separator-double-wave' === $separator ): ?>
			<svg class="separator-section-double-wave" style="fill: <?php echo esc_attr( $separator_color ); ?>;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
				<path d="M 0 14 s 88.64 3.48 300 36 c 260 40 514 27 703 -10 l 12 28 l 3 36 h -1018 z"></path>
				<path d="M 0 45 s 271 45.13 500 32 c 157 -9 330 -47 515 -63 v 86 h -1015 z"></path>
				<path d="M 0 58 s 188.29 32 508 32 c 290 0 494 -35 494 -35 v 45 h -1002 z"></path>
			</svg><!--/.separator-section-double-wave-->
			<?php elseif ( 'separator-two-wave' === $separator ): ?>
			<svg class="separator-section-two-wave" style="fill: <?php echo esc_attr( $separator_color ); ?>;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1700 125">
			<path d="M411.508257,69.4430067 C620.022076,69.4430067 765.627462,123.195712 1018.94865,106.096466 C1272.26983,88.9972199 1261.00061,31.1844231 1543.63349,5.19177089 C1617.05737,-1.56073949 1667.98789,-0.587323324 1700.01983,8.9765625 L1700.01983,125 L0,125 C135.329626,87.9620045 272.499045,69.4430067 411.508257,69.4430067 Z"></path>
			</svg><!--/.separator-section-two-wave-->
			<?php elseif ( 'separator-tilt-right' === $separator ): ?>
			<svg class="separator-section-tilt-right" style="fill: <?php echo esc_attr( $separator_color ); ?>;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 100" preserveAspectRatio="none">
				<path d="M0,100 v-100 L100,100 Z"></path>
			</svg><!--/.separator-section-tilt-right-->
			<?php elseif ( 'separator-tilt-left' === $separator ): ?>
			<svg class="separator-section-tilt-left" style="fill: <?php echo esc_attr( $separator_color ); ?>;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 100" preserveAspectRatio="none">
				<path d="M0,100 h100 v-100 Z"></path>
			</svg><!--/.separator-section-tilt-left-->
			<?php elseif ( 'separator-triangle' === $separator ): ?>
			<svg class="separator-section-triangle" style="fill: <?php echo esc_attr( $separator_color ); ?>;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 64" preserveAspectRatio="none">
				<path d="M 0 0 H 960 V 64 Z M 1920 0 H 960 V 64 Z"></path>
			</svg><!--/.separator-section-triangle-->
			<?php elseif ( 'separator-triangle-center' === $separator ): ?>
			<svg class="separator-section-triangle-center" style="fill: <?php echo esc_attr( $separator_color ); ?>;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 148 48" preserveAspectRatio="none">
				<path d="M 0 0 H 74 V 48 Z M 148 0 H 74 V 48 Z"></path>
			</svg><!--/.separator-section-triangle-center-->
			<?php elseif ( 'separator-horizontal'  === $separator ): ?>
			<div class="separator-section-horizontal" style="background-color:<?php echo esc_attr( $separator_color ); ?>;"></div>
			<?php endif; ?>
		</div><!--/.separator-section-wrapper-->
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
			'separator'       => 'separator-arch',
			'display_none_sp' => '',
			'display_none_pc' => '',
			'bg_color'        => '#ffffff',
			'separator_color' => '#f8f8f8',
		);
		$instance         = wp_parse_args( (array) $instance, $defaults );
		$separator        = ( $instance['separator'] );
		$display_none_sp  = ( $instance['display_none_sp'] );
		$display_none_pc  = ( $instance['display_none_pc'] );
		$bg_color         = ( $instance['bg_color'] );
		$separator_color  = ( $instance['separator_color'] );
	?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'separator' ) ); ?>"><?php _e( '区切りデサイン', 'emanon-premium' ); ?></label><br>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'separator' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'separator' ) ); ?>"
					class="widefat"
				>
				<?php
				$separator = [
					'separator-arch'            => __( 'アーチ', 'emanon-premium' ),
					'separator-wave'            => __( 'ウェーブ', 'emanon-premium' ),
					'separator-double-wave'     => __( '２重ウェーブ', 'emanon-premium' ),
					'separator-two-wave'        => __( 'ダブルウェーブ', 'emanon-premium' ),
					'separator-tilt-right'      => __( '右斜め', 'emanon-premium' ),
					'separator-tilt-left'       => __( '左斜め', 'emanon-premium' ),
					'separator-triangle'        => __( 'トライアングル', 'emanon-premium' ),
					'separator-triangle-center' => __( 'トライアングル［中央］', 'emanon-premium' ),
					'separator-horizontal'      => __( 'ライン', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $separator as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['separator'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'display_none_sp' ); ?>"
				id="<?php echo $this->get_field_id( 'display_none_sp' ); ?>"
				class="checkbox"
				<?php checked( $display_none_sp ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'display_none_sp' ); ?>"><?php _e( '［SP］非表示', 'emanon-premium' ); ?></label>
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

		<p>
			<label for="<?php echo $this->get_field_id( 'bg_color' ); ?>">
				<?php _e( '背景色', 'emanon-premium' ); ?>
			</label>
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
			<label for="<?php echo $this->get_field_id( 'separator_color' ); ?>">
				<?php _e( '区切り線','emanon-premium' ); ?>
			</label>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'separator_color' ); ?>"
			id="<?php echo $this->get_field_id( 'separator_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#f8f8f8"
			value="<?php echo esc_attr( $separator_color ); ?>"
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
		$instance['separator']       = esc_attr( $new_instance['separator'] );
		$instance['display_none_sp'] = (bool) $new_instance['display_none_sp'];
		$instance['display_none_pc'] = (bool) $new_instance['display_none_pc'];
		$instance['bg_color']        = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['separator_color'] = sanitize_hex_color( $new_instance['separator_color'] );
		return $instance;
	}

} // class Emanon_Separator_Section_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_separator_section_widget' );
	function emanon_register_separator_section_widget() {
		register_widget( 'Emanon_Separator_Section_Widget' );
}
