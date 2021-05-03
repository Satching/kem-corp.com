<?php
/**
 * Widget contact section class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Emanon_Contact_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'contact', // Base ID
			__( '[E] コンタクト', 'emanon-premium' ), // Name
			array( 'description' => __( 'Emanon設定＞CTAのコンタクト設定を表示します。', 'emanon-premium' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @param array $args      ウィジェットの引数 「before_title, after_title, before_widget, after_widget」
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$col   = apply_filters( 'widget_select', empty( $instance['col'] ) ? 0 : $instance['col'], $instance, $this->id_base );
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
	?>
			<?php
				if ( 1 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-sidebar-1' );
				} elseif ( 2 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-sidebar-2' );
				} elseif ( 3 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-sidebar-3' );
				} elseif ( 4 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-sidebar-4' );
				} elseif ( 5 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-sidebar-5' );
				} elseif ( 6 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-sidebar-6' );
				} elseif ( 7 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-sidebar-7' );
				}
			?>
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
			'title' => '',
			'col'   => 0,
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title    = ( $instance['title'] );
		$col      = ( $instance['col'] );
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'col' ) ); ?>">
				<?php _e( 'レイアウト', 'emanon-premium' ); ?>
			</label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'col' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'col' ) ); ?>"
					class="widefat"
				>
				<option value="0"><?php _e( '&mdash; 選択 &mdash;','emanon-premium' ); ?></option>
				<?php
				$col = [
					'1'  => __( 'TEL', 'emanon-premium' ),
					'2'  => __( 'TEL | ボタン［1］', 'emanon-premium' ),
					'3'  => __( 'TEL | ボタン［1］ | ボタン［2］', 'emanon-premium' ),
					'4'  => __( 'TEL | ボタン［1］ | ボタン［2］ | ボタン［3］', 'emanon-premium' ),
					'5' => __( 'ボタン［1］', 'emanon-premium' ),
					'6' => __( 'ボタン［1］ | ボタン［2］', 'emanon-premium' ),
					'7' => __( 'ボタン［1］ | ボタン［2］ | ボタン［3］', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $col as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['col'], true ); ?>><?php echo esc_html( $label ); ?></option>
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
		$instance['title']  = esc_html( $new_instance['title'] );
		$instance['col']    = absint( $new_instance['col'] );
		return $instance;
	}

} // class Contact_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_contact_widget' );
	function emanon_register_contact_widget() {
		register_widget( 'Emanon_Contact_Widget' );
}
