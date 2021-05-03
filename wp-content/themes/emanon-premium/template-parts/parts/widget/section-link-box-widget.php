<?php
/**
 * Widget Link box section class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Emanon_Link_Box_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'link_box_section', // Base ID
			__( '[Es] リンクボックス', 'emanon-premium' ), // Name
			array( 'description' => __( 'リンクボックスを表示するセクション。', 'emanon-premium' ), ) // Args
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
		$style           = apply_filters( 'widget_select', empty( $instance['style'] ) ? 1 : $instance['style'], $instance, $this->id_base );
		$border          = apply_filters( 'widget_checkbox', empty( $instance['border'] ) ? '' : $instance['border'], $instance, $this->id_base );
		$border_bottom   = apply_filters( 'widget_checkbox', empty( $instance['border_bottom'] ) ? '' : $instance['border_bottom'], $instance, $this->id_base );
		$header_center   = apply_filters( 'widget_checkbox', empty( $instance['header_center'] ) ? '' : $instance['header_center'], $instance, $this->id_base );
		$lead_left       = apply_filters( 'widget_checkbox', empty( $instance['lead_left'] ) ? '' : $instance['lead_left'], $instance, $this->id_base );
		$content_width   = apply_filters( 'widget_select', empty( $instance['content_width'] ) ? 'normal' : $instance['content_width'], $instance, $this->id_base );
		$section_padding = apply_filters( 'widget_select', empty( $instance['section_padding'] ) ? 'normal' : $instance['section_padding'], $instance, $this->id_base );
		$active_bg_color = apply_filters( 'widget_checkbox', empty( $instance['active_bg_color'] ) ? '' : $instance['active_bg_color'], $instance, $this->id_base );
		echo $args['before_widget'];
	?>
		<section class="c-section-widget__inner link-box" data-section-padding="<?php echo esc_attr( $section_padding ); ?>" <?php if ( $active_bg_color ) { ?>style="background-color: <?php echo esc_attr( $instance['bg_color'] ); ?>;"<?php } ?>>
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
				</div><!--/.section-widget-header-->
			</div><!--/.l-content-->
			<?php endif; ?>
			<div class="l-content" data-content-width="<?php echo esc_attr( $content_width ); ?>">
				<div class="u-row u-row-wrap wrapper-col">
				<?php
					if( $title ) { $h = 'h3'; } else { $h = 'h2'; }
					for( $c = 1; $c < 10; $c++ ) { ?>
				<?php
					$image_url            = empty( $instance['link_box_image_url_'.$c] ) ? '' : $instance['link_box_image_url_'.$c];
					$link_box_icon        = empty( $instance['link_box_icon_'.$c] ) ? '' : $instance['link_box_icon_'.$c];
					$link_box_title       = empty( $instance['link_box_title_'.$c] ) ? '' : $instance['link_box_title_'.$c];
					$link_box_description = empty( $instance['link_box_description_'.$c] ) ? '' : $instance['link_box_description_'.$c];
					$link_box_url         = empty( $instance['link_box_url_'.$c] ) ? '' : $instance['link_box_url_'.$c];
					$target_blank         = apply_filters( 'widget_checkbox', empty( $instance['target_blank_'.$c] ) ? '' : $instance['target_blank_'.$c], $instance, $this->id_base );
					$link_box_color       = empty( $instance['link_box_color_'.$c] ) ? '' : $instance['link_box_color_'.$c];
				?>
				<?php if ( $image_url || $link_box_icon || $link_box_title || $link_box_description ) : ?>
				<div class="col-<?php echo $col ; ?><?php if ( $link_box_url ) { ?> u-shadow-none<?php } ?><?php if ( $border ) { ?> u-border-solid<?php } ?><?php if ( $link_box_url ) { ?> has-link<?php } ?> link-box__item"<?php if ( $border_bottom ) { ?> style="border-bottom: 3px solid <?php echo esc_attr( $link_box_color ); ?>;"<?php } ?>>
					<?php if ( $link_box_url ) { ?><a href="<?php echo esc_url( $link_box_url ); ?>" <?php if ( $target_blank ) { ?>target="_blank"<?php } ?>><?php } ?>
					<?php if ( 3 === $style || 4 === $style ) { ?><div class="u-row u-row-wrap u-row-item-center link-box__list"><?php } ?>
						<div class="<?php if ( 3 === $style || 4 === $style ) { ?>link-box__item-header<?php } else { ?>u-text-align-center<?php } ?>">
							<?php if ( $image_url ) : ?>
							<div<?php if ( 2 === $style || 4 === $style ) { ?> class="link-box__item-circle"<?php } ?>>
								<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_html( $link_box_title ); ?>">
							</div>
							<?php elseif ( $link_box_icon ) : ?>
							<div class="link-box__item-icon"><i style="color: <?php echo esc_attr( $link_box_color ); ?>;" class="<?php echo esc_html( $link_box_icon ); ?>"></i></div>
							<?php endif; ?>
						</div>
					<?php if ( $link_box_title || $link_box_description ) : ?>
						<div<?php if ( 3 === $style || 4 === $style ) { ?> class="link-box__item-info"<?php } ?>>
							<?php if ( $link_box_title ) : ?>
							<<?php echo esc_attr( $h ); ?> class="link-box__item-title"><?php echo esc_html( $link_box_title ); ?></<?php echo esc_attr( $h ); ?>>
							<?php endif; ?>
							<?php if ( $link_box_description ) : ?>
							<div class="link-box__item-description"><?php echo nl2br( esc_html( $link_box_description) ); ?></div>
							<?php endif; ?>
						</div><!--/.col-9-->
					<?php endif; ?>
					<?php if ( 3 === $style || 4 === $style ) { ?></div><!--/.pr-box-list--><?php } ?>
					<?php if ( $link_box_url ) { ?></a><?php } ?>
				</div>
				<?php endif; ?>
				<?php } ?>
				</div><!--/.row-wrapper-->
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
			'title'            => '',
			'sub_title'        => '',
			'lead'             => '',
			'link_box_image_url_1'   => '',
			'link_box_image_url_2'   => '',
			'link_box_image_url_3'   => '',
			'link_box_image_url_4'   => '',
			'link_box_image_url_5'   => '',
			'link_box_image_url_6'   => '',
			'link_box_image_url_7'   => '',
			'link_box_image_url_8'   => '',
			'link_box_image_url_9'   => '',
			'link_box_icon_1'        => '',
			'link_box_icon_2'        => '',
			'link_box_icon_3'        => '',
			'link_box_icon_4'        => '',
			'link_box_icon_5'        => '',
			'link_box_icon_6'        => '',
			'link_box_icon_7'        => '',
			'link_box_icon_8'        => '',
			'link_box_icon_9'        => '',
			'link_box_title_1'       => '',
			'link_box_title_2'       => '',
			'link_box_title_3'       => '',
			'link_box_title_4'       => '',
			'link_box_title_5'       => '',
			'link_box_title_6'       => '',
			'link_box_title_7'       => '',
			'link_box_title_8'       => '',
			'link_box_title_9'       => '',
			'link_box_description_1' => '',
			'link_box_description_2' => '',
			'link_box_description_3' => '',
			'link_box_description_4' => '',
			'link_box_description_5' => '',
			'link_box_description_6' => '',
			'link_box_description_7' => '',
			'link_box_description_8' => '',
			'link_box_description_9' => '',
			'link_box_url_1'         => '',
			'link_box_url_2'         => '',
			'link_box_url_3'         => '',
			'link_box_url_4'         => '',
			'link_box_url_5'         => '',
			'link_box_url_6'         => '',
			'link_box_url_7'         => '',
			'link_box_url_8'         => '',
			'link_box_url_9'         => '',
			'target_blank_1'         => '',
			'target_blank_2'         => '',
			'target_blank_3'         => '',
			'target_blank_4'         => '',
			'target_blank_5'         => '',
			'target_blank_6'         => '',
			'target_blank_7'         => '',
			'target_blank_8'         => '',
			'target_blank_9'         => '',
			'link_box_color_1'       => '#383838',
			'link_box_color_2'       => '#383838',
			'link_box_color_3'       => '#383838',
			'link_box_color_4'       => '#383838',
			'link_box_color_5'       => '#383838',
			'link_box_color_6'       => '#383838',
			'link_box_color_7'       => '#383838',
			'link_box_color_8'       => '#383838',
			'link_box_color_9'       => '#383838',
			'col'              => 4,
			'style'            => 1,
			'border'           => '',
			'border_bottom'    => '',
			'header_center'    => '',
			'lead_left'        => '',
			'content_width'    => 'normal',
			'section_padding'  => 'normal',
			'active_bg_color'  => '',
			'bg_color'         => '#ffffff',
			'title_color'      => '#333333',
			'sub_title_color'  => '#484848',
			'lead_color'       => '#333333',
		);
		$instance        = wp_parse_args( (array) $instance, $defaults );
		$title           = ( $instance['title'] );
		$sub_title       = ( $instance['sub_title'] );
		$lead            = ( $instance['lead'] );
		$col             = ( $instance['col'] );
		$style           = ( $instance['style'] );
		$border          = ( $instance['border'] );
		$border_bottom   = ( $instance['border_bottom'] );
		$header_center   = ( $instance['header_center'] );
		$lead_left       = ( $instance['lead_left'] );
		$content_width   = ( $instance['content_width'] );
		$section_padding = ( $instance['section_padding'] );
		$active_bg_color = ( $instance['active_bg_color'] );
		$bg_color        = ( $instance['bg_color'] );
		$title_color     = ( $instance['title_color'] );
		$sub_title_color = ( $instance['sub_title_color'] );
		$lead_color      = ( $instance['lead_color'] );
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

		<?php for( $c = 1; $c < 10; $c++ ) { ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'link_box_image_url_'.$c ); ?>">
				<?php _e( '画像', 'emanon-premium' ); ?>［<?php echo esc_attr( $c ); ?>］
			</label>
			<?php
				$id    = $this->get_field_id( 'link_box_image_url_'.$c );
				$name  = $this->get_field_name( 'link_box_image_url_'.$c );
				$value = $instance['link_box_image_url_'.$c];
				emanon_custom_media_uploader( $name, $value, $id );
			?>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'link_box_icon_'.$c ); ?>">
			<?php _e( 'アイコン', 'emanon-premium' ); ?>［<?php echo esc_attr( $c ); ?>］
		</label>
		<small><span style="color:#ff0000; font-size:14px;">※ </span><?php _e( '例) icon-bubbles', 'emanon-premium' ); ?></small><br>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'link_box_icon_'.$c ); ?>"
			id="<?php echo $this->get_field_id( 'link_box_icon_'.$c ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['link_box_icon_'.$c] ); ?>"
		>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'link_box_title_'.$c ); ?>">
			<?php _e( 'タイトル', 'emanon-premium' ); ?>［<?php echo esc_attr( $c ); ?>］
		</label>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'link_box_title_'.$c ); ?>"
			id="<?php echo $this->get_field_id( 'link_box_title_'.$c ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['link_box_title_'.$c] ); ?>"
		>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'link_box_description_'.$c ); ?>">
			<?php _e( '説明文', 'emanon-premium' ); ?>［<?php echo esc_attr( $c ); ?>］
		</label>
		<textarea
			name="<?php echo esc_attr( $this->get_field_name( 'link_box_description_'.$c ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'link_box_description_'.$c ) ); ?>"
			class="widefat"
			rows="5"
		><?php echo esc_textarea( $instance['link_box_description_'.$c] ); ?></textarea>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'link_box_url_'.$c ); ?>">
			<?php _e( 'リンク URL', 'emanon-premium' ); ?>［<?php echo esc_attr( $c ); ?>］
		</label>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'link_box_url_'.$c ); ?>"
			id="<?php echo $this->get_field_id( 'link_box_url_'.$c ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['link_box_url_'.$c] ); ?>"
		>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'target_blank_'.$c ); ?>"
				id="<?php echo $this->get_field_id( 'target_blank_'.$c ); ?>"
				class="checkbox"
				<?php checked( $instance['target_blank_'.$c] ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'target_blank_'.$c ); ?>"><?php _e( '新しいウィンドウで表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'link_box_color_'.$c ); ?>">
			<?php _e( '下線・アイコン', 'emanon-premium' ); ?>［<?php echo esc_attr( $c ); ?>］
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'link_box_color_'.$c ); ?>"
			id="<?php echo $this->get_field_id( 'link_box_color_'.$c ); ?>"
			class="emanon_color_field_input"
			data-default-color="#333"
			value="<?php echo esc_attr( $instance['link_box_color_'.$c] ); ?>"
			>
		</p>

		<hr>

		<?php } ?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'col' ) ); ?>">
				<?php _e( 'カラム数［PC］', 'emanon-premium' ); ?>
			</label>
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php _e( 'レイアウト', 'emanon-premium' ); ?></label><br>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"
					class="widefat"
					style="width:190px!important"
				>
				<?php
				$style = [
					'1' => __( 'ボックス', 'emanon-premium' ),
					'2' => __( 'ボックス［円形画像］', 'emanon-premium' ),
					'3' => __( 'リスト', 'emanon-premium' ),
					'4' => __( 'リスト［円形画像］', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $style as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['style'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select><br>
				<small><span style="color:#ff0000; font-size:14px;">※ </span><?php _e( ' 円形画像のレイアウトを適用する場合は、画像の高さと画像の幅を同じサイズにしてください。', 'emanon-premium' ); ?></small>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'border' ); ?>"
				id="<?php echo $this->get_field_id( 'border' ); ?>"
				class="checkbox"
				<?php checked( $border ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'border' ); ?>"><?php _e( '枠線を表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'border_bottom' ); ?>"
				id="<?php echo $this->get_field_id( 'border_bottom' ); ?>"
				class="checkbox"
				<?php checked( $border_bottom ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'border_bottom' ); ?>"><?php _e( '下線を表示', 'emanon-premium' ); ?></label>
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
		$instance['title']                    = wp_kses_post( $new_instance['title'] );
		$instance['sub_title']                = wp_kses_post( $new_instance['sub_title'] );
		$instance['lead']                     = wp_kses_post( $new_instance['lead'] );
		for( $c = 1; $c < 10; $c++ ) {
		$instance['link_box_image_url_'.$c]   = esc_url_raw( $new_instance['link_box_image_url_'.$c] );
		$instance['link_box_icon_'.$c]        = esc_html( $new_instance['link_box_icon_'.$c] );
		$instance['link_box_title_'.$c]       = esc_html( $new_instance['link_box_title_'.$c] );
		$instance['link_box_description_'.$c] = esc_html( $new_instance['link_box_description_'.$c] );
		$instance['link_box_url_'.$c]         = esc_url( $new_instance['link_box_url_'.$c] );
		$instance['target_blank_'.$c]         = (bool) ( $new_instance['target_blank_'.$c] );
		$instance['link_box_color_'.$c]       = sanitize_hex_color( $new_instance['link_box_color_'.$c] );
		}
		$instance['col']                      = absint( $new_instance['col'] );
		$instance['style']                    = absint( $new_instance['style'] );
		$instance['border']                   = (bool) $new_instance['border'];
		$instance['border_bottom']            = (bool) $new_instance['border_bottom'];
		$instance['header_center']            = (bool) $new_instance['header_center'];
		$instance['lead_left']                = (bool) $new_instance['lead_left'];
		$instance['content_width']            = esc_attr( $new_instance['content_width'] );
		$instance['section_padding']          = esc_attr( $new_instance['section_padding'] );
		$instance['active_bg_color']          = (bool) $new_instance['active_bg_color'];
		$instance['bg_color']                 = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['title_color']              = sanitize_hex_color( $new_instance['title_color'] );
		$instance['sub_title_color']          = sanitize_hex_color( $new_instance['sub_title_color'] );
		$instance['lead_color']               = sanitize_hex_color( $new_instance['lead_color'] );
		return $instance;
	}

} // class Link Box Section Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_link_box_section_widget' );
	function emanon_register_link_box_section_widget() {
		register_widget( 'Emanon_Link_Box_Section_Widget' );
}
