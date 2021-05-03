<?php
/**
 * Widget TOC class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Emanon_TOC_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'toc', // Base ID
			__( '[E] 目次', 'emanon-premium' ), // Name
			array( 'description' => __( '目次（見出し）を表示します。Emanon設定で目次表示の有効化が必要です。', 'emanon-premium' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @param array $args      ウィジェットの引数 「before_title, after_title, before_widget, after_widget」
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		if ( ! is_single() || is_page() ) {
			return;
		}

		$hide_toc        = post_custom( 'emanon_hide_toc' );
		$display_none_sp = apply_filters( 'widget_checkbox', empty( $instance['display_none_sp'] ) ? '' : $instance['display_none_sp'], $instance, $this->id_base );
		if ( $hide_toc || is_mobile() && $display_none_sp ) {
			return;
		}

		$toc_list_info   = get_emanon_toc( get_the_content() );
		$toc_list        = $toc_list_info['outline'];
		$toc_post        = get_theme_mod( 'display_toc_post', '' );
		$toc_page        = get_theme_mod( 'display_toc_page', '' );
		$title           = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		if ( $toc_post && $toc_list && is_singular('post') || $toc_page && $toc_list && is_singular('page') ) {

		echo $args['before_widget'];

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>

		<div id="side-toc"><?php echo $toc_list ; ?></div>

		<?php
			echo $args['after_widget'];
		}

	}
	/**
	 * 管理画面にWidgetを表示
	 *
	 * @param array $instance データベースからの前回保存された値
	 */
	public function form( $instance ) {
		$defaults = array(
			'title'           => __( '目次', 'emanon-premium' ),
			'display_none_sp' => true,
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title           = ( $instance['title'] );
		$display_none_sp = ( $instance['display_none_sp'] );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'タイトル', 'emanon-premium' ); ?></label>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'title' ); ?>"
				id="<?php echo $this->get_field_id( 'title' ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $title ); ?>"
			>
		</p>
		<small class="notes"><span class="red">※</span><?php _e( 'Emanon設定 > 投稿ページ・固定ページで目次の表示を有効にします。', 'emanon-premium' ); ?></small>
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
		$instance['title']           = sanitize_text_field( $new_instance['title'] );
		$instance['display_none_sp'] = (bool) $new_instance['display_none_sp'];
		return $instance;
	}

} // class TOC_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_toc_widget' );
	function emanon_register_toc_widget() {
		register_widget( 'Emanon_TOC_Widget' );
}
