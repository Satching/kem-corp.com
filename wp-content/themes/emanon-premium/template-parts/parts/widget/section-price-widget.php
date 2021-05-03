<?php
/**
 * Widget price section class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Emanon_Price_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'price_section', // Base ID
			__( '[Es] 料金', 'emanon-premium' ), // Name
			array( 'description' => __( '料金テーブルを表示するセクションです。', 'emanon-premium' ), ) // Args
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
		$link_url        = apply_filters( 'widget_url', empty( $instance['link_url'] ) ? '' : $instance['link_url'], $instance, $this->id_base );
		$link_text       = apply_filters( 'widget_text', empty( $instance['link_text'] ) ? '' : $instance['link_text'], $instance, $this->id_base );
		$header_center   = apply_filters( 'widget_checkbox', empty( $instance['header_center'] ) ? '' : $instance['header_center'], $instance, $this->id_base );
		$lead_left       = apply_filters( 'widget_checkbox', empty( $instance['lead_left'] ) ? '' : $instance['lead_left'], $instance, $this->id_base );
		$col             = apply_filters( 'widget_select', empty( $instance['col'] ) ? 6 : $instance['col'], $instance, $this->id_base );
		$content_width   = apply_filters( 'widget_select', empty( $instance['content_width'] ) ? 'normal' : $instance['content_width'], $instance, $this->id_base );
		$border          = apply_filters( 'widget_checkbox', empty( $instance['border'] ) ? '' : $instance['border'], $instance, $this->id_base );
		$slider_sp       = apply_filters( 'widget_checkbox', empty( $instance['slider_sp'] ) ? '' : $instance['slider_sp'], $instance, $this->id_base );
		$section_padding = apply_filters( 'widget_select', empty( $instance['section_padding'] ) ? 'normal' : $instance['section_padding'], $instance, $this->id_base );
		$margin          = apply_filters( 'widget_number', empty( $instance['margin'] ) ? 1 : $instance['margin'], $instance, $this->id_base );
		$btn_bg          = apply_filters( 'widget_checkbox', empty( $instance['btn_bg'] ) ? '' : $instance['btn_bg'], $instance, $this->id_base );
		$active_bg_color = apply_filters( 'widget_checkbox', empty( $instance['active_bg_color'] ) ? '' : $instance['active_bg_color'], $instance, $this->id_base );
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
				</div><!--/.section-widget-header-->
			</div><!--/.l-content-->
			<?php endif; ?>

			<div class="price-table" style="margin-top: <?php echo esc_attr( $instance['margin'] ); ?>px">
				<div class="l-content" data-content-width="<?php echo esc_attr( $content_width ); ?>">
					<div class="u-row u-row-wrap wrapper-col<?php if ( $slider_sp ) { ?> u-post-scroll<?php } ?>">
					<?php
						if( $title ) { $h = 'h3'; } else { $h = 'h2'; }
						if( 6 === $col ) {
							$max = 3;
						} elseif( 4 === $col ) {
							$max = 4;
						} elseif( 3 === $col ) {
							$max = 5;
						}
						for( $c = 1; $c < $max; $c++ ) { ?>
					<?php
						$price_label            = empty( $instance['price_label_'.$c] ) ? '' : $instance['price_label_'.$c];
						$image_url              = empty( $instance['price_image_url_'.$c] ) ? '' : $instance['price_image_url_'.$c];
						$price_icon             = empty( $instance['price_icon_'.$c] ) ? '' : $instance['price_icon_'.$c];
						$price_title            = empty( $instance['price_title_'.$c] ) ? '' : $instance['price_title_'.$c];
						$price                  = empty( $instance['price_'.$c] ) ? '' : $instance['price_'.$c];
						$microcopy              = empty( $instance['microcopy_'.$c] ) ? '' : $instance['microcopy_'.$c];
						$price_description      = empty( $instance['price_description_'.$c] ) ? '' : $instance['price_description_'.$c];
						$price_url              = empty( $instance['price_url_'.$c] ) ? '' : $instance['price_url_'.$c];
						$price_label_bg_color   = empty( $instance['price_label_bg_color_'.$c] ) ? '' : $instance['price_label_bg_color_'.$c];
						$price_label_text_color = empty( $instance['price_label_text_color_'.$c] ) ? '' : $instance['price_label_text_color_'.$c];
						$price_icon_color       = empty( $instance['price_icon_color_'.$c] ) ? '' : $instance['price_icon_color_'.$c];
						if ( $border && $price_url ) {
							$class_border = 'u-shadow-hover';
						} elseif ( ! $border && $price_url ) {
							$class_border = 'u-shadow-none';
						} elseif ( $border ) {
							$class_border = 'u-border-solid';
						} else {
							$class_border = 'u-border-none';
						}
					?>
					<?php if ( $price_label || $image_url || $price_icon || $price_title || $price || $price_description ) : ?>
						<div class="col-<?php echo esc_attr( $col ); ?> <?php echo esc_attr( $class_border ) ?> price-table__item<?php if ( $price_label ) { ?> has-price-label<?php } ?><?php if ( $slider_sp ) { ?> u-post-scroll__item<?php } ?>">
							<?php if ( $price_url ) { ?><a href="<?php echo ( $price_url ); ?>"><?php } ?>
							<div class="price-table__header">
								<?php if ( $price_label ) : ?>
								<span class="price-table__label" style="background-color: <?php echo esc_attr( $price_label_bg_color ); ?>; color: <?php echo esc_attr( $price_label_text_color ); ?>;"><?php echo wp_kses_post( $price_label ); ?></span>
								<?php endif; ?>
								<?php if ( $image_url ) : ?>
								<div class="price-table__thumbnail"><img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_html( $price_title ); ?>"></div>
								<?php elseif ( $price_icon ) : ?>
								<div class="price-table__icon"><i style="color: <?php echo esc_attr( $price_icon_color ); ?>;" class="<?php echo esc_html( $price_icon ); ?>"></i></div>
								<?php endif; ?>
								<?php if ( $price_title ) : ?>
								<span class="price-table__title"><?php echo wp_kses_post( $price_title ); ?></span>
								<?php endif; ?>
								<?php if ( $price ) : ?>
								<<?php echo esc_attr( $h ); ?> class="price-table__plan"><?php echo wp_kses_post( $price ); ?></<?php echo esc_attr( $h ); ?>>
								<?php endif; ?>
								<?php if ( $microcopy ) : ?>
								<div class="price-table__microcopy"><?php echo wp_kses_post( $microcopy ); ?></div>
								<?php endif; ?>
							</div>
							<?php if ( $price_description ) : ?>
							<div class="price-table__description"><?php echo nl2br( wp_kses_post( $price_description) ); ?></div>
							<?php endif; ?>
						<?php if ( $price_url ) { ?></a><?php } ?>
					</div><!--/.col-4-->
					<?php endif; ?>
					<?php } ?>
					</div><!--/.row-wrapper-->
				</div><!--/.l-content-->
			</div><!--/#panel-1-->

			<?php if ( $link_text ): ?>
			<div class="l-content__sm">
				<div class="c-btn__arrow c-section-widget__btn">
					<a class="c-btn c-btn__<?php if ( $btn_bg ) { ?>main<?php } else { ?>outline<?php } ?> c-btn__sm" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_text ); ?><i class="icon-read-arrow-right"></i></a>
				</div>
			</div><!--/.l-content__sm-->
			<?php endif; ?>

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
			'title'                    => '',
			'sub_title'                => '',
			'lead'                     => '',
			'col'                      => 2,
			'price_label_1'            => '',
			'price_label_2'            => '',
			'price_label_3'            => '',
			'price_label_4'            => '',
			'price_image_url_1'        => '',
			'price_image_url_2'        => '',
			'price_image_url_3'        => '',
			'price_image_url_4'        => '',
			'price_icon_1'             => '',
			'price_icon_2'             => '',
			'price_icon_3'             => '',
			'price_icon_4'             => '',
			'price_icon_5'             => '',
			'price_icon_6'             => '',
			'price_title_1'            => '',
			'price_title_2'            => '',
			'price_title_3'            => '',
			'price_title_4'            => '',
			'price_1'                  => '',
			'price_2'                  => '',
			'price_3'                  => '',
			'price_4'                  => '',
			'microcopy_1'              => '',
			'microcopy_2'              => '',
			'microcopy_3'              => '',
			'microcopy_4'              => '',
			'price_description_1'      => '',
			'price_description_2'      => '',
			'price_description_3'      => '',
			'price_description_4'      => '',
			'price_url_1'              => '',
			'price_url_2'              => '',
			'price_url_3'              => '',
			'price_url_4'              => '',
			'price_label_bg_color_1'   => '#eeeff0',
			'price_label_bg_color_2'   => '#eeeff0',
			'price_label_bg_color_3'   => '#eeeff0',
			'price_label_bg_color_4'   => '#eeeff0',
			'price_label_text_color_1' => '#484848',
			'price_label_text_color_2' => '#484848',
			'price_label_text_color_3' => '#484848',
			'price_label_text_color_4' => '#484848',
			'price_icon_color_1'       => '#484848',
			'price_icon_color_2'       => '#484848',
			'price_icon_color_3'       => '#484848',
			'price_icon_color_4'       => '#484848',
			'link_url'                 => '',
			'link_text'                => '',
			'header_center'            => '',
			'lead_left'                => '',
			'slider_sp'                => '',
			'active_bg_color'          => '',
			'content_width'            => 'normal',
			'section_padding'          => 'normal',
			'margin'                   => 0,
			'border'                   => 0,
			'bg_color'                 => '#ffffff',
			'title_color'              => '#333333',
			'sub_title_color'          => '#484848',
			'lead_color'               => '#333333',
			'btn_bg'                   => '',
		);
		$instance        = wp_parse_args( (array) $instance, $defaults );
		$title           = ( $instance['title'] );
		$sub_title       = ( $instance['sub_title'] );
		$lead            = ( $instance['lead'] );
		$col             = ( $instance['col'] );
		$link_url        = ( $instance['link_url'] );
		$link_text       = ( $instance['link_text'] );
		$header_center   = ( $instance['header_center'] );
		$lead_left       = ( $instance['lead_left'] );
		$border          = ( $instance['border'] );
		$slider_sp       = ( $instance['slider_sp'] );
		$content_width   = ( $instance['content_width'] );
		$section_padding = ( $instance['section_padding'] );
		$margin          = ( $instance['margin'] );
		$active_bg_color = ( $instance['active_bg_color'] );
		$bg_color        = ( $instance['bg_color'] );
		$title_color     = ( $instance['title_color'] );
		$sub_title_color = ( $instance['sub_title_color'] );
		$lead_color      = ( $instance['lead_color'] );
		$btn_bg          = ( $instance['btn_bg'] );
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

		<?php for( $c = 1; $c < 5; $c++ ) { ?>

		<p>
		<label for="<?php echo $this->get_field_id( 'price_label_'.$c ); ?>">
		<?php _e( 'ラベル', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
		</label><br>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'price_label_'.$c ); ?>"
			id="<?php echo $this->get_field_id( 'price_label_'.$c ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['price_label_'.$c] ); ?>"
		>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'price_image_url_'.$c ); ?>">
			<?php _e( '画像', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label><br>
			<?php
				$id    = $this->get_field_id( 'price_image_url_'.$c );
				$name  = $this->get_field_name( 'price_image_url_'.$c);
				$value = $instance['price_image_url_'.$c];
				emanon_custom_media_uploader( $name, $value, $id );
			?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'price_title_'.$c ); ?>">
			<?php _e( 'タイトル', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'price_title_'.$c ); ?>"
				id="<?php echo $this->get_field_id( 'price_title_'.$c ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $instance['price_title_'.$c] ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'price_icon_'.$c ); ?>">
			<?php _e( 'アイコン', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label><br>
			<small><span style="color:#ff0000; font-size:14px;">※ </span><?php _e( '例) icon-bubbles', 'emanon-premium' ); ?></small><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'price_icon_'.$c ); ?>"
				id="<?php echo $this->get_field_id( 'price_icon_'.$c ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $instance['price_icon_'.$c] ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'price_'.$c ); ?>">
			<?php _e( '料金', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'price_'.$c ); ?>"
				id="<?php echo $this->get_field_id( 'price_'.$c ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $instance['price_'.$c] ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'microcopy_'.$c ); ?>">
			<?php _e( 'マイクロコピー', 'emanon-premium'); ?><?php echo esc_attr( $c ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'microcopy_'.$c ); ?>"
				id="<?php echo $this->get_field_id( 'microcopy_'.$c ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $instance['microcopy_'.$c] ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'price_description_'.$c ); ?>">
			<?php _e( '説明文', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label><br>
			<textarea
				name="<?php echo esc_attr( $this->get_field_name( 'price_description_'.$c ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'price_description_'.$c ) ); ?>"
				class="widefat"
				rows="5"
			><?php echo esc_html( $instance['price_description_'.$c] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'price_url_'.$c ) ); ?>">
			<?php _e( 'リンク URL', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'price_url_'.$c ); ?>"
				id="<?php echo $this->get_field_id( 'price_url_'.$c ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $instance['price_url_'.$c] ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'price_label_bg_color_'.$c ); ?>">
			<?php _e( 'ラベル［背景色］', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'price_label_bg_color_'.$c ); ?>"
			id="<?php echo $this->get_field_id( 'price_label_bg_color_'.$c ); ?>"
			class="emanon_color_field_input"
			data-default-color="#eeeff0"
			value="<?php echo esc_attr( $instance['price_label_bg_color_'.$c] ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'price_label_text_color_'.$c ); ?>">
			<?php _e( 'ラベル', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'price_label_text_color_'.$c ); ?>"
			id="<?php echo $this->get_field_id( 'price_label_text_color_'.$c ); ?>"
			class="emanon_color_field_input"
			data-default-color="#484848"
			value="<?php echo esc_attr( $instance['price_label_text_color_'.$c] ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'price_icon_color_'.$c ); ?>">
			<?php _e( 'アイコン', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'price_icon_color_'.$c ); ?>"
			id="<?php echo $this->get_field_id( 'price_icon_color_'.$c ); ?>"
			class="emanon_color_field_input"
			data-default-color="#484848"
			value="<?php echo esc_attr( $instance['price_icon_color_'.$c] ); ?>"
			>
		</p>

		<hr>

		<?php } ?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_url' ) ); ?>">
			<?php _e( 'リンク URL', 'emanon-premium' ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'link_url' ); ?>"
				id="<?php echo $this->get_field_id( 'link_url' ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $link_url ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>">
			<?php _e( 'リンク テキスト', 'emanon-premium' ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'link_text' ); ?>"
				id="<?php echo $this->get_field_id( 'link_text' ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $link_text ); ?>"
			>
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
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'border' ); ?>"
				id="<?php echo $this->get_field_id( 'border' ); ?>"
				class="checkbox"
				<?php checked( $border ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'border' ); ?>"><?php _e( '枠線を表示する', 'emanon-premium' ); ?></label><br>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'slider_sp' ); ?>"
				id="<?php echo $this->get_field_id( 'slider_sp' ); ?>"
				class="checkbox"
				<?php checked( $slider_sp ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'slider_sp' ); ?>"><?php _e( 'スライダー［SP］', 'emanon-premium'); ?></label>
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'col' ) ); ?>"><?php _e( 'カラム数［PC］', 'emanon-premium' ); ?></label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'col' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'col' ) ); ?>"
					class="widefat"
					style="width:80px!important"
				>
				<?php
				$col = [
					'6'  => __( '2', 'emanon-premium' ),
					'4'  => __( '3', 'emanon-premium' ),
					'3'  => __( '4', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $col as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['col'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'margin' ); ?>">
				<?php _e( '余白［上部］', 'emanon-premium' ); ?>
			</label>
			<br>
			<small><span style="color:#ff0000; font-size:14px;">※ </span><?php _e( '料金テーブルの余白［上部］の設定', 'emanon-premium' ); ?></small><br>
			<input
			type="number" 
			id="<?php echo $this->get_field_id( 'margin' ); ?>"
			name="<?php echo $this->get_field_name( 'margin' ); ?>"
			style="width:60px!important"
			step="8"
			min="0"
			value="<?php echo $margin; ?>"
			>
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
		$instance['title']                      = wp_kses_post( $new_instance['title'] );
		$instance['sub_title']                  = wp_kses_post( $new_instance['sub_title'] );
		$instance['lead']                       = wp_kses_post( $new_instance['lead'] );
		for( $c = 1; $c < 7; $c++ ) {
		$instance['price_label_'.$c]            = wp_kses_post( $new_instance['price_label_'.$c] );
		$instance['price_image_url_'.$c]        = esc_url_raw( $new_instance['price_image_url_'.$c] );
		$instance['price_icon_'.$c]             = esc_html( $new_instance['price_icon_'.$c] );
		$instance['price_title_'.$c]            = wp_kses_post( $new_instance['price_title_'.$c] );
		$instance['price_'.$c]                  = wp_kses_post( $new_instance['price_'.$c] );
		$instance['microcopy_'.$c]              = wp_kses_post( $new_instance['microcopy_'.$c] );
		$instance['price_description_'.$c]      = wp_kses_post( $new_instance['price_description_'.$c] );
		$instance['price_url_'.$c]              = esc_url( $new_instance['price_url_'.$c] );
		$instance['price_label_bg_color_'.$c]   = sanitize_hex_color( $new_instance['price_label_bg_color_'.$c] );
		$instance['price_label_text_color_'.$c] = sanitize_hex_color( $new_instance['price_label_text_color_'.$c] );
		$instance['price_icon_color_'.$c]       = sanitize_hex_color( $new_instance['price_icon_color_'.$c] );
		}
		$instance['link_url']                   = esc_url( $new_instance['link_url'] );
		$instance['link_text']                  = sanitize_text_field( $new_instance['link_text'] );
		$instance['header_center']              = (bool) $new_instance['header_center'];
		$instance['lead_left']                  = (bool) $new_instance['lead_left'];
		$instance['border']                     = (bool) $new_instance['border'];
		$instance['slider_sp']                  = (bool) $new_instance['slider_sp'];
		$instance['content_width']              = esc_attr( $new_instance['content_width'] );
		$instance['section_padding']            = esc_attr( $new_instance['section_padding'] );
		$instance['col']                        = absint( $new_instance['col'] );
		$instance['margin']                     = (int) $new_instance['margin'];
		$instance['active_bg_color']            = (bool) $new_instance['active_bg_color'];
		$instance['bg_color']                   = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['title_color']                = sanitize_hex_color( $new_instance['title_color'] );
		$instance['sub_title_color']            = sanitize_hex_color( $new_instance['sub_title_color'] );
		$instance['lead_color']                 = sanitize_hex_color( $new_instance['lead_color'] );
		$instance['btn_bg']                     = (bool) $new_instance['btn_bg'];
		return $instance;
	}

} // class Price_Section_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_price_section_widget' );
	function emanon_register_price_section_widget() {
		register_widget( 'Emanon_Price_Section_Widget' );
}