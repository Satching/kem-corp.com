<?php
/**
 * Widget site profile class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Emanon_Site_Profile_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'site_profile', // Base ID
			__( '[E] サイトプロフィール', 'emanon-premium' ), // Name
			array( 'description' => __( 'サイト名（ロゴ）・サイト説明文を表示します。', 'emanon-premium' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @param array $args      ウィジェットの引数 「before_title, after_title, before_widget, after_widget」
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		$title             = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$site_title_logo   = apply_filters( 'widget_checkbox', empty( $instance['site_title_logo'] ) ? '' : $instance['site_title_logo'], $instance, $this->id_base );
		$site_title_center = apply_filters( 'widget_checkbox', empty( $instance['site_title_center'] ) ? '' : $instance['site_title_center'], $instance, $this->id_base );
		$site_logo_height  = apply_filters( 'widget_number', empty( $instance['site_logo_height'] ) ? 32 : $instance['site_logo_height'], $instance, $this->id_base );
		$lead              = apply_filters( 'widget_textarea', empty( $instance['lead'] ) ? '' : $instance['lead'], $instance, $this->id_base );
		$link_url          = apply_filters( 'widget_url', empty( $instance['link_url'] ) ? '' : $instance['link_url'], $instance, $this->id_base );
		$link_text         = apply_filters( 'widget_text', empty( $instance['link_text'] ) ? '' : $instance['link_text'], $instance, $this->id_base );
		$btn_bg            = apply_filters( 'widget_checkbox', empty( $instance['btn_bg'] ) ? '' : $instance['btn_bg'], $instance, $this->id_base );
		$btn_center        = apply_filters( 'widget_checkbox', empty( $instance['btn_center'] ) ? '' : $instance['btn_center'], $instance, $this->id_base );
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>

		<?php
			$header_logo_id  = get_theme_mod( 'custom_logo' );
			$header_logo_url = wp_get_attachment_image_url( $header_logo_id , 'full' );
			if ( $header_logo_id ) {
				$header_logo_tag = '<img src="' . esc_url( $header_logo_url ) . '" alt="' . get_bloginfo( 'name' ) . '" style="height:' . absint( $site_logo_height ) . 'px;">';
			} else {
				$header_logo_tag = get_bloginfo( 'name' );
			}
		?>

		<?php if ( $site_title_logo ) : ?>
		<div class="site-profile__title<?php if ( $site_title_center ) { echo ' u-text-align-center'; } ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo ( $header_logo_tag ); ?></a>
		</div>
		<?php endif; ?>

		<?php if ( $lead ) : ?>
		<div class="site-profile__description">
			<?php echo nl2br( wp_kses_post( $lead ) ); ?>
		</div>
		<?php endif; ?>

		<?php if ( $link_text ): ?>
		<div class="site-profile__btn<?php if ( $btn_center ) { echo ' u-text-align-center'; } ?>">
			<a class="c-btn c-btn__<?php if ( $btn_bg ) { ?>main<?php } else { ?>outline<?php } ?> c-btn__m" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_text ); ?></a>
		</div>
		<?php endif; ?>

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
			'title'             => '',
			'site_title_logo'   => '',
			'site_title_center' => '',
			'site_logo_height'  => 32,
			'lead'              => '',
			'link_url'          => '',
			'link_text'         => '',
			'btn_bg'            => '',
			'btn_center'        => '',
		);
		$instance  = wp_parse_args( (array) $instance, $defaults );
		$title             = ( $instance['title'] );
		$site_title_logo   = ( $instance['site_title_logo'] );
		$site_title_center = ( $instance['site_title_center'] );
		$site_logo_height  = ( $instance['site_logo_height'] );
		$lead              = ( $instance['lead'] );
		$link_url          = ( $instance['link_url'] );
		$link_text         = ( $instance['link_text'] );
		$btn_bg            = ( $instance['btn_bg'] );
		$btn_center        = ( $instance['btn_center'] );
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
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'site_title_logo' ); ?>"
				id="<?php echo $this->get_field_id( 'site_title_logo' ); ?>"
				class="checkbox"
				<?php checked( $site_title_logo ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'site_title_logo' ); ?>"><?php _e( 'ロゴ・サイトタイトルの表示', 'emanon-premium' ); ?></label><br>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'site_title_center' ); ?>"
				id="<?php echo $this->get_field_id( 'site_title_center' ); ?>"
				class="checkbox"
				<?php checked( $site_title_center ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'site_title_center' ); ?>"><?php _e( 'ロゴ・サイトタイトル［中央配置］', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>">
				<?php _e( 'ロゴの高さ（px）', 'emanon-premium' ); ?>
			</label>
			<input
				type="number"
				name="<?php echo $this->get_field_name( 'site_logo_height' ); ?>" 
				id="<?php echo $this->get_field_id( 'site_logo_height' ); ?>"
				class="widefat"
				style="width:50px!important"
				step="1"
				value="<?php echo $site_logo_height; ?>"
			/>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'lead' ) ); ?>">
			<?php _e( 'リード文', 'emanon-premium' ); ?>
			</label>
			<textarea
				name="<?php echo esc_attr( $this->get_field_name( 'lead' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'lead' ) ); ?>"
				class="widefat"
				rows="10"
			><?php echo esc_textarea( $lead ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_url' ) ); ?>">
			<?php _e( 'リンク URL', 'emanon-premium' ); ?>
			</label>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'link_url' ); ?>"
				id="<?php echo $this->get_field_id( 'link_url' ); ?>"
				class="widefat"
				value="<?php echo $link_url; ?>"
			>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>">
			<?php _e( 'リンク テキスト', 'emanon-premium' ); ?>
			</label>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'link_text' ); ?>"
				id="<?php echo $this->get_field_id( 'link_text' ); ?>"
				class="widefat"
				value="<?php echo $link_text; ?>"
			>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'btn_bg' ); ?>"
				id="<?php echo $this->get_field_id( 'btn_bg' ); ?>"
				class="checkbox"
				<?php checked( $btn_bg ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'btn_bg' ); ?>"><?php _e( 'ボタン 背景色', 'emanon-premium' ); ?></label><br>
			<small class="notes"><span class="red">※</span><?php _e( 'ボタン枠線の色が背景色に反映されます。', 'emanon-premium' ); ?></small>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'btn_center' ); ?>"
				id="<?php echo $this->get_field_id( 'btn_center' ); ?>"
				class="checkbox"
				<?php checked( $btn_center ); ?>
			/>
			<label><?php _e( 'ボタンレイアウト［中央］', 'emanon-premium' ); ?></label>
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
		$instance['title']             = sanitize_text_field( $new_instance['title'] );
		$instance['site_title_logo']   = (bool) $new_instance['site_title_logo'];
		$instance['site_title_center'] = (bool) $new_instance['site_title_center'];
		$instance['site_logo_height']  = absint( $new_instance['site_logo_height'] );
		$instance['lead']              = wp_kses_post( $new_instance['lead'] );
		$instance['link_url']          = esc_url( $new_instance['link_url'] );
		$instance['link_text']         = sanitize_text_field( $new_instance['link_text'] );
		$instance['btn_bg']            = (bool) $new_instance['btn_bg'];
		$instance['btn_center']        = (bool) $new_instance['btn_center'];
		return $instance;
	}

} // class Site_Profile_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_site_profile_widget' );
	function emanon_register_site_profile_widget() {
		register_widget( 'Emanon_Site_Profile_Widget' );
}
