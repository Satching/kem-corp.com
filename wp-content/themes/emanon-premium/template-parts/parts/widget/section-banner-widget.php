<?php
/**
 * Widget banner section class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Emanon_Banner_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'banner_section', // Base ID
			__( '[Es] バナー', 'emanon-premium' ), // Name
			array( 'description' => __( 'バナーを表示するセクション', 'emanon-premium' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @param array $args      ウィジェットの引数 「before_title, after_title, before_widget, after_widget」
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		$title           = apply_filters( 'widget_textarea', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$sub_title       = apply_filters( 'widget_text', empty( $instance['sub_title'] ) ? '' : $instance['sub_title'], $instance, $this->id_base );
		$lead            = apply_filters( 'widget_textarea', empty( $instance['lead'] ) ? '' : $instance['lead'], $instance, $this->id_base );
		$col             = apply_filters( 'widget_select', empty( $instance['col'] ) ? 4 : $instance['col'], $instance, $this->id_base );
		$header_center   = apply_filters( 'widget_checkbox', empty( $instance['header_center'] ) ? '' : $instance['header_center'], $instance, $this->id_base );
		$lead_left       = apply_filters( 'widget_checkbox', empty( $instance['lead_left'] ) ? '' : $instance['lead_left'], $instance, $this->id_base );
		$box_center      = apply_filters( 'widget_checkbox', empty( $instance['box_center'] ) ? '' : $instance['box_center'], $instance, $this->id_base );
		$overlay         = apply_filters( 'widget_checkbox', empty( $instance['overlay'] ) ? '' : $instance['overlay'], $instance, $this->id_base );
		$content_width   = apply_filters( 'widget_select', empty( $instance['content_width'] ) ? 'normal' : $instance['content_width'], $instance, $this->id_base );
		$section_padding = apply_filters( 'widget_select', empty( $instance['section_padding'] ) ? 'normal' : $instance['section_padding'], $instance, $this->id_base );
		$active_bg_color = apply_filters( 'widget_checkbox', empty( $instance['active_bg_color'] ) ? '' : $instance['active_bg_color'], $instance, $this->id_base );
		$btn_bg          = apply_filters( 'widget_checkbox', empty( $instance['btn_bg'] ) ? '' : $instance['btn_bg'], $instance, $this->id_base );
		echo $args['before_widget'];
	?>
		<section class="c-section-widget__inner" data-section-padding="<?php echo esc_attr( $section_padding ); ?>" <?php if ( $active_bg_color ) { ?>style="background-color: <?php echo esc_attr( $instance['bg_color'] ); ?>;"<?php } ?>>
			<?php if ( $title || $sub_title || $lead ): ?>
				<div class="l-content" data-content-width="<?php echo esc_attr( $content_width ); ?>">
					<div class="c-section-widget__header<?php if ( $header_center ) { ?> u-narrow-width__center<?php } ?>">
						<?php if ( $title ) : ?>
						<h2 class="c-section-widget__title" style="color: <?php echo esc_attr( $instance['title_color'] ); ?>;"><?php echo nl2br( wp_kses_post( $title ) ); ?></h2>
						<?php endif; ?>
						<?php if ( $sub_title ) : ?>
						<div class="c-section-widget__sub-title" style="color: <?php echo esc_attr( $instance['sub_title_color'] ); ?>;"><?php echo wp_kses_post( $sub_title ); ?></div>
					<?php endif; ?>
					<?php if ( $lead ) : ?>
					<div class="c-section-widget__lead<?php if ( $lead_left ) { ?> u-text-align-left<?php } ?>" style="color: <?php echo esc_attr( $instance['lead_color'] ); ?>;">
						<?php echo nl2br( wp_kses_post( $lead ) ); ?>
					</div>
					<?php endif; ?>
					</div><!--/.l-content-->
				</div><!--/.section-widget-header-->
			<?php endif; ?>
				<div class="l-content" data-content-width="<?php echo esc_attr( $content_width ); ?>">
					<div class="u-row u-row-wrap wrapper-col">
					<?php for( $c = 1; $c < 7; $c++ ) { ?>
					<?php
						$image_url          = empty( $instance['banner_image_url_'.$c] ) ? '' : $instance['banner_image_url_'.$c];
						$banner_title       = empty( $instance['banner_title_'.$c] ) ? '' : $instance['banner_title_'.$c];
						$banner_sub_title   = empty( $instance['banner_sub_title_'.$c] ) ? '' : $instance['banner_sub_title_'.$c];
						$banner_description = empty( $instance['banner_description_'.$c] ) ? '' : $instance['banner_description_'.$c];
						$banner_url         = empty( $instance['banner_url_'.$c] ) ? '' : $instance['banner_url_'.$c];
					?>
					<?php if ( $image_url || $banner_title || $banner_description ) : ?>
					<div class="col-<?php echo $col ; ?>">
						<?php if ( $banner_url ) { ?><a href="<?php echo ( $banner_url ); ?>"><?php } ?>
							<?php if ( $image_url ): ?>
							<div class="banner-box u-img-scale<?php if ( $overlay ) { ?> u-img-overlay<?php } ?>">
								<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_html( $banner_title ); ?>">
								<div class="banner-box__inner<?php if ( $box_center ) { ?> u-text-align-center<?php } ?>">
								<?php if ( $banner_title ): ?>
								<div class="center-col banner-box__title" style="color: <?php echo esc_attr( $instance['box_title_color'] ); ?>;"><?php echo esc_html( $banner_title ); ?></div>
								<?php endif; ?>
								<?php if ( $banner_sub_title ) : ?>
								<div class="banner-box__sub-title" style="color: <?php echo esc_attr( $instance['box_sub_title_color'] ); ?>;"><?php echo esc_html( $banner_sub_title ); ?></div>
								<?php endif; ?>
								</div>
							</div><!--/.banner-img-->
							<?php endif; ?>
						<?php if ( $banner_url ) { ?></a><?php } ?>
						<?php if ( $banner_description ) : ?>
						<div class="banner-box__description" style="color: <?php echo esc_attr( $instance['box_description_color'] ); ?>;">
							<?php echo nl2br( esc_html( $banner_description ) ); ?>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				<?php } ?>
				</div><!--/.u-row-->
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
			'title'                 => '',
			'sub_title'             => '',
			'lead'                  => '',
			'banner_image_url_1'    => '',
			'banner_image_url_2'    => '',
			'banner_image_url_3'    => '',
			'banner_image_url_4'    => '',
			'banner_image_url_5'    => '',
			'banner_image_url_6'    => '',
			'banner_title_1'        => '',
			'banner_title_2'        => '',
			'banner_title_3'        => '',
			'banner_title_4'        => '',
			'banner_title_5'        => '',
			'banner_title_6'        => '',
			'banner_sub_title_1'    => '',
			'banner_sub_title_2'    => '',
			'banner_sub_title_3'    => '',
			'banner_sub_title_4'    => '',
			'banner_sub_title_5'    => '',
			'banner_sub_title_6'    => '',
			'banner_description_1'  => '',
			'banner_description_2'  => '',
			'banner_description_3'  => '',
			'banner_description_4'  => '',
			'banner_description_5'  => '',
			'banner_description_6'  => '',
			'banner_url_1'          => '',
			'banner_url_2'          => '',
			'banner_url_3'          => '',
			'banner_url_4'          => '',
			'banner_url_5'          => '',
			'banner_url_6'          => '',
			'col'                   => 4,
			'header_center'         => '',
			'lead_left'             => '',
			'box_center'            => '',
			'overlay'               => '',
			'content_width'         => 'normal',
			'section_padding'       => 'normal',
			'active_bg_color'       => '',
			'bg_color'              => '#ffffff',
			'title_color'           => '#333333',
			'sub_title_color'       => '#484848',
			'lead_color'            => '#333333',
			'box_title_color'       => '#ffffff',
			'box_sub_title_color'   => '#ffffff',
			'box_description_color' => '#333333',
			'btn_bg'                => '',
		);
		$instance              = wp_parse_args( (array) $instance, $defaults );
		$title                 = ( $instance['title'] );
		$sub_title             = ( $instance['sub_title'] );
		$lead                  = ( $instance['lead'] );
		$col                   = ( $instance['col'] );
		$header_center         = ( $instance['header_center'] );
		$lead_left             = ( $instance['lead_left'] );
		$box_center            = ( $instance['box_center'] );
		$overlay               = ( $instance['overlay'] );
		$content_width         = ( $instance['content_width'] );
		$section_padding       = ( $instance['section_padding'] );
		$overlay               = ( $instance['overlay'] );
		$active_bg_color       = ( $instance['active_bg_color'] );
		$bg_color              = ( $instance['bg_color'] );
		$title_color           = ( $instance['title_color'] );
		$sub_title_color       = ( $instance['sub_title_color'] );
		$lead_color            = ( $instance['lead_color'] );
		$box_title_color       = ( $instance['box_title_color'] );
		$box_sub_title_color   = ( $instance['box_sub_title_color'] );
		$box_description_color = ( $instance['box_description_color'] );
		$btn_bg                = ( $instance['btn_bg'] );
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

		<?php for( $c = 1; $c < 7; $c++ ) {?>
		<p>
			<label for="<?php echo $this->get_field_id( 'banner_image_url_'.$c ); ?>">
				<?php _e( '画像', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label>
			<?php
				$id    = $this->get_field_id( 'banner_image_url_'.$c );
				$name  = $this->get_field_name( 'banner_image_url_'.$c );
				$value = $instance['banner_image_url_'.$c];
				emanon_custom_media_uploader( $name, $value, $id );
			?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'banner_title_'.$c ); ?>">
				<?php _e( 'タイトル', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'banner_title_'.$c ); ?>"
				id="<?php echo $this->get_field_id( 'banner_title_'.$c ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $instance['banner_title_'.$c] ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'banner_sub_title_'.$c ); ?>">
				<?php _e( 'サブタイトル', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'banner_sub_title_'.$c ); ?>"
				id="<?php echo $this->get_field_id( 'banner_sub_title_'.$c ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $instance['banner_sub_title_'.$c] ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'banner_description_'.$c ); ?>">
				<?php _e( '説明文', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label>
			<textarea
				name="<?php echo esc_attr( $this->get_field_name( 'banner_description_'.$c ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'banner_description_'.$c ) ); ?>"
				class="widefat"
				rows="5"
			><?php echo esc_textarea( $instance['banner_description_'.$c] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'banner_url_'.$c ) ); ?>">
				<?php _e( 'リンク URL', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'banner_url_'.$c ); ?>"
				id="<?php echo $this->get_field_id( 'banner_url_'.$c ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $instance['banner_url_'.$c] ); ?>"
			>
		</p>

		<?php } ?>

		<hr>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'col' ) ); ?>"><?php _e( 'カラム数［PC］', 'emanon-premium' ); ?></label>
			<select
				name="<?php echo esc_attr( $this->get_field_name( 'col' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'col' ) ); ?>"
				class="widefat"
				style="width:80px!important"
			>
			<?php
			$col = [
				'6' => __( '2', 'emanon-premium' ),
				'4' => __( '3', 'emanon-premium' ),
				'3' => __( '4', 'emanon-premium' ),
			];
			?>
			<?php foreach ( $col as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['col'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
			</select>
		</p>

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
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'box_center' ); ?>"
				id="<?php echo $this->get_field_id( 'box_center' ); ?>"
				class="checkbox"
				<?php checked( $box_center ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'box_center' ); ?>"><?php _e( 'ボックス内［中央寄せ］', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'overlay' ); ?>"
				id="<?php echo $this->get_field_id( 'overlay' ); ?>"
				class="checkbox"
				<?php checked( $overlay ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'overlay' ); ?>"><?php _e( 'オーバーレイ', 'emanon-premium' ); ?></label>
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
			<label for="<?php echo $this->get_field_id( 'box_title_color' ); ?>">
				<?php _e( 'ボックス タイトル','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'box_title_color' ); ?>"
			id="<?php echo $this->get_field_id( 'box_title_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#ffffff"
			value="<?php echo esc_attr( $box_title_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box_sub_title_color' ); ?>">
				<?php _e( 'ボックス サブタイトル','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'box_sub_title_color' ); ?>"
			id="<?php echo $this->get_field_id( 'box_sub_title_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#ffffff"
			value="<?php echo esc_attr( $box_sub_title_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'box_description_color' ); ?>">
				<?php _e( 'ボックス 説明文','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'box_description_color' ); ?>"
			id="<?php echo $this->get_field_id( 'box_description_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#333333"
			value="<?php echo esc_attr( $box_description_color ); ?>"
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
		$instance['title']                  = wp_kses_post( $new_instance['title'] );
		$instance['sub_title']              = wp_kses_post( $new_instance['sub_title'] );
		$instance['lead']                   = wp_kses_post( $new_instance['lead'] );
		for( $c = 1; $c < 7; $c++ ) {
		$instance['banner_image_url_'.$c]   = esc_url_raw( $new_instance['banner_image_url_'.$c] );
		$instance['banner_title_'.$c]       = esc_html( $new_instance['banner_title_'.$c] );
		$instance['banner_sub_title_'.$c]   = esc_html( $new_instance['banner_sub_title_'.$c] );
		$instance['banner_description_'.$c] = esc_html( $new_instance['banner_description_'.$c] );
		$instance['banner_url_'.$c]         = esc_url( $new_instance['banner_url_'.$c] );
		}
		$instance['col']                    = absint( $new_instance['col'] );
		$instance['header_center']          = (bool) $new_instance['header_center'];
		$instance['lead_left']              = (bool) $new_instance['lead_left'];
		$instance['box_center']             = (bool) $new_instance['box_center'];
		$instance['overlay']                = (bool) $new_instance['overlay'];
		$instance['content_width']          = esc_attr( $new_instance['content_width'] );
		$instance['section_padding']        = esc_attr( $new_instance['section_padding'] );
		$instance['active_bg_color']        = (bool) $new_instance['active_bg_color'];
		$instance['bg_color']               = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['title_color']            = sanitize_hex_color( $new_instance['title_color'] );
		$instance['sub_title_color']        = sanitize_hex_color( $new_instance['sub_title_color'] );
		$instance['lead_color']             = sanitize_hex_color( $new_instance['lead_color'] );
		$instance['box_title_color']        = sanitize_hex_color( $new_instance['box_title_color'] );
		$instance['box_sub_title_color']    = sanitize_hex_color( $new_instance['box_sub_title_color'] );
		$instance['box_description_color']  = sanitize_hex_color( $new_instance['box_description_color'] );
		$instance['btn_bg']                 = (bool) $new_instance['btn_bg'];
		return $instance;
	}

} // class Banner_Section_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_banner_section_widget' );
	function emanon_register_banner_section_widget() {
		register_widget( 'Emanon_Banner_Section_Widget' );
}
