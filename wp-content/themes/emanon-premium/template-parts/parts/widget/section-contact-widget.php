<?php
/**
 * Widget contact section class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Contact_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'contact_section', // Base ID
			__( '[Es] コンタクト', 'emanon-premium' ), // Name
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
		$col             = apply_filters( 'widget_select', empty( $instance['col'] ) ? 1 : $instance['col'], $instance, $this->id_base );
		$bg_image_url    = apply_filters( 'widget_url', empty( $instance['bg_image_url'] ) ? '' : $instance['bg_image_url'], $instance, $this->id_base );
		$bg_image_sp_url = apply_filters( 'widget_url', empty( $instance['bg_image_sp_url'] ) ? '' : $instance['bg_image_sp_url'], $instance, $this->id_base );
		$fixed           = apply_filters( 'widget_checkbox', empty( $instance['fixed'] ) ? '' : $instance['fixed'], $instance, $this->id_base );
		$content_width   = apply_filters( 'widget_select', empty( $instance['content_width'] ) ? 'normal' : $instance['content_width'], $instance, $this->id_base );
		$overlay_opacity = apply_filters( 'widget_num', empty( $instance['overlay_opacity'] ) ? '0' : $instance['overlay_opacity'], $instance, $this->id_base );
		$active_bg_color = apply_filters( 'widget_checkbox', empty( $instance['active_bg_color'] ) ? '' : $instance['active_bg_color'], $instance, $this->id_base );
		echo $args['before_widget'];
	?>
		<?php
			if ( $bg_image_sp_url && is_mobile() ) {
				$image_url = $bg_image_sp_url;
				} else {
				$image_url = $bg_image_url;
			}
		?>
		<section class="c-section-widget__inner u-text-align-center" style="color: <?php echo esc_attr( $instance['text_color'] ); ?>;
			<?php if ( $image_url ) { ?> background-image: url(<?php echo $image_url; ?>); background-position: center; background-size: cover; background-repeat: no-repeat;<?php if ( $fixed && ! is_mobile() ) { ?> background-attachment: fixed;<?php } ?><?php } ?>;">
			<div class="l-content c-section-widget__zindex" data-content-width="<?php echo esc_attr( $content_width ); ?>">
			<?php
				if ( 1 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-1' );
				} elseif ( 2 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-2' );
				} elseif ( 3 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-3' );
				} elseif ( 4 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-4' );
				} elseif ( 5 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-5' );
				} elseif ( 6 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-6' );
				} elseif ( 7 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-7' );
				} elseif ( 8 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-8' );
				} elseif ( 9 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-9' );
				} elseif ( 10 === $col ) {
					get_template_part( 'template-parts/parts/cta/contact-10' );
				}
			?>
			</div><!--/.l-content-->
			<div class="c-section-widget__overlay" <?php if ( $active_bg_color ) { ?> style="background-color: <?php echo esc_attr( $instance['bg_color'] ); ?>; opacity: <?php echo $overlay_opacity; ?>;"<?php } ?>></div>
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
			'col'             => 1,
			'bg_image_url'    => '',
			'bg_image_sp_url' => '',
			'fixed'           => '',
			'content_width'   => 'normal',
			'text_color'      => '#333333',
			'active_bg_color' => '',
			'bg_color'        => '#ffffff',
			'overlay_opacity' => 0.6,
		);
		$instance        = wp_parse_args( (array) $instance, $defaults );
		$col             = ( $instance['col'] );
		$bg_image_url    = ( $instance['bg_image_url'] );
		$bg_image_sp_url = ( $instance['bg_image_sp_url'] );
		$fixed           = ( $instance['fixed'] );
		$content_width   = ( $instance['content_width'] );
		$text_color      = ( $instance['text_color'] );
		$active_bg_color = ( $instance['active_bg_color'] );
		$bg_color        = ( $instance['bg_color'] );
		$overlay_opacity = ( $instance['overlay_opacity'] );
	?>
		<p>
			<small class="notes"><span class="red">※</span><?php _e( 'Emanon設定＞タブ「CTA」の設定が反映されます。','emanon-premium' ); ?></small>
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
				<?php
				$col = [
					'1'  => __( 'ロゴ | TEL', 'emanon-premium' ),
					'2'  => __( 'ロゴ | ボタン［1］', 'emanon-premium' ),
					'3'  => __( 'ロゴ | TEL | ボタン［1］', 'emanon-premium' ),
					'4'  => __( 'ロゴ | ボタン［1］ | ボタン［2］', 'emanon-premium' ),
					'5'  => __( 'TEL', 'emanon-premium' ),
					'6'  => __( 'TEL | ボタン［1］', 'emanon-premium' ),
					'7'  => __( 'TEL | ボタン［1］ | ボタン［2］', 'emanon-premium' ),
					'8'  => __( 'ボタン［1］', 'emanon-premium' ),
					'9'  => __( 'ボタン［1］ | ボタン［2］', 'emanon-premium' ),
					'10' => __( 'ボタン［1］ | ボタン［2］ | ボタン［3］', 'emanon-premium' ),
				];
				?>
					<?php foreach ( $col as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['col'], true ); ?>><?php echo esc_html( $label ); ?></option>
					<?php endforeach; ?>
				</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bg_image_url' ); ?>">
				<?php _e( '背景画像［PC］', 'emanon-premium' ); ?>
			</label>
			<?php
				$id    = $this->get_field_id( 'bg_image_url' );
				$name  = $this->get_field_name( 'bg_image_url' );
				$value = $bg_image_url;
				emanon_custom_media_uploader( $name, $value, $id );
			?>
			<small class="notes"><span class="red">※</span><?php _e( 'パソコン表示に適用されます。','emanon-premium' ); ?></small>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'bg_image_sp_url' ); ?>">
				<?php _e( '背景画像［SP］', 'emanon-premium' ); ?>
			</label>
			<?php
				$id    = $this->get_field_id( 'bg_image_sp_url' );
				$name  = $this->get_field_name( 'bg_image_sp_url' );
				$value = $bg_image_sp_url;
				emanon_custom_media_uploader( $name, $value, $id );
			?>
			<small class="notes"><span class="red">※</span><?php _e( 'スマホ表示に適用されます。','emanon-premium' ); ?></small>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'fixed' ); ?>"
				id="<?php echo $this->get_field_id( 'fixed' ); ?>"
				class="checkbox"
				<?php checked( $fixed ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'fixed' ); ?>">
				<?php _e( '背景画像を固定', 'emanon-premium' ); ?>
			</label>
			<small class="notes"><span class="red">※</span><?php _e( 'パソコン表示のみ適用されます。','emanon-premium' ); ?></small>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'content_width' ) ); ?>">
				<?php _e( 'コンテンツ幅', 'emanon-premium' ); ?>
			</label>
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
			<label for="<?php echo $this->get_field_id( 'text_color' ); ?>">
				<?php _e( 'テキスト', 'emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'text_color' ); ?>"
			id="<?php echo $this->get_field_id( 'text_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#333333"
			value="<?php echo esc_attr( $text_color ); ?>"
			>
		</p>

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
			<label for="<?php echo esc_attr( $this->get_field_id( 'overlay_opacity' ) ); ?>">
			<?php _e( 'オーバーレイ［透過率］', 'emanon-premium' ); ?>
			</label><br>
			<input
				type="number"
				name="<?php echo $this->get_field_name( 'overlay_opacity' ); ?>"
				id="<?php echo $this->get_field_id( 'overlay_opacity' ); ?>"
				class="widefat"
				style="width:60px!important"
				step="0.1"
				min="0"
				max="1"
				value="<?php echo $overlay_opacity; ?>"
			/>
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
		$instance['col']             = absint( $new_instance['col'] );
		$instance['bg_image_url']    = esc_url_raw( $new_instance['bg_image_url'] );
		$instance['bg_image_sp_url'] = esc_url_raw( $new_instance['bg_image_sp_url'] );
		$instance['fixed']           = (bool) $new_instance['fixed'];
		$instance['content_width']   = esc_attr( $new_instance['content_width'] );
		$instance['text_color']      = sanitize_hex_color( $new_instance['text_color'] );
		$instance['active_bg_color'] = (bool) $new_instance['active_bg_color'];
		$instance['bg_color']        = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['overlay_opacity'] = esc_attr( $new_instance['overlay_opacity'] );
		return $instance;
	}

} // class Contact_Section_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_contact_section_widget' );
	function emanon_register_contact_section_widget() {
		register_widget( 'Contact_Section_Widget' );
}
