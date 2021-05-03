<?php
/**
 * Widget content box section class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Emanon_Content_Box_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'content_box_section', // Base ID
			__( '[Es] コンテンツボックス', 'emanon-premium' ), // Name
			array( 'description' => __( '画像と文章のコンテンツを表示するセクション。', 'emanon-premium' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @param array $args      ウィジェットの引数 「before_title, after_title, before_widget, after_widget」
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		$title              = apply_filters( 'widget_textarea', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$sub_title          = apply_filters( 'widget_text', empty( $instance['sub_title'] ) ? '' : $instance['sub_title'], $instance, $this->id_base );
		$lead               = apply_filters( 'widget_textarea', empty( $instance['lead'] ) ? '' : $instance['lead'], $instance, $this->id_base );
		$thumbnail_url      = apply_filters( 'widget_url', empty( $instance['thumbnail_url'] ) ? '' : $instance['thumbnail_url'], $instance, $this->id_base );
		$thumbnail_width    = apply_filters( 'widget_select', empty( $instance['thumbnail_width'] ) ? 'widthe-3' : $instance['thumbnail_width'], $instance, $this->id_base );
		$thumbnail_position = apply_filters( 'widget_select', empty( $instance['thumbnail_position'] ) ? 'none' : $instance['thumbnail_position'], $instance, $this->id_base );
		$body_vertical      = apply_filters( 'widget_select', empty( $instance['body_vertical'] ) ? 1 : $instance['body_vertical'], $instance, $this->id_base );
		$body_overlap       = apply_filters( 'widget_select', empty( $instance['body_overlap'] ) ? 'overlap-1' : $instance['body_overlap'], $instance, $this->id_base );
		$body_padding       = apply_filters( 'widget_checkbox', empty( $instance['body_padding'] ) ? 'none' : $instance['body_padding'], $instance, $this->id_base );
		$link_url           = apply_filters( 'widget_url', empty( $instance['link_url'] ) ? '' : $instance['link_url'], $instance, $this->id_base );
		$link_text          = apply_filters( 'widget_text', empty( $instance['link_text'] ) ? '' : $instance['link_text'], $instance, $this->id_base );
		$reverse            = apply_filters( 'widget_checkbox', empty( $instance['reverse'] ) ? '' : $instance['reverse'], $instance, $this->id_base );
		$header_center      = apply_filters( 'widget_checkbox', empty( $instance['header_center'] ) ? '' : $instance['header_center'], $instance, $this->id_base );
		$lead_left          = apply_filters( 'widget_checkbox', empty( $instance['lead_left'] ) ? '' : $instance['lead_left'], $instance, $this->id_base );
		$btn_left           = apply_filters( 'widget_checkbox', empty( $instance['btn_left'] ) ? '' : $instance['btn_left'], $instance, $this->id_base );
		$content_width      = apply_filters( 'widget_select', empty( $instance['content_width'] ) ? 'normal' : $instance['content_width'], $instance, $this->id_base );
		$section_padding    = apply_filters( 'widget_select', empty( $instance['section_padding'] ) ? 'normal' : $instance['section_padding'], $instance, $this->id_base );
		$active_bg_color    = apply_filters( 'widget_checkbox', empty( $instance['active_bg_color'] ) ? '' : $instance['active_bg_color'], $instance, $this->id_base );
		$btn_bg             = apply_filters( 'widget_checkbox', empty( $instance['btn_bg'] ) ? '' : $instance['btn_bg'], $instance, $this->id_base );
		$body_color         = apply_filters( 'widget_checkbox', empty( $instance['body_color'] ) ? '#ffffff' : $instance['body_color'], $instance, $this->id_base );
		$colorcode          = str_replace( '#', '', $body_color );
		$color_red          = hexdec( substr( $colorcode, 0, 2) );
		$color_green        = hexdec( substr( $colorcode, 2, 2 ) );
		$color_blue         = hexdec( substr( $colorcode, 4, 2 ) );
		$opacity            = apply_filters( 'widget_num', empty( $instance['body_opacity'] ) ? 1 : $instance['body_opacity'], $instance, $this->id_base );
		echo $args['before_widget'];
	?>
		<section class="c-section-widget__inner" data-section-padding="<?php echo esc_attr( $section_padding ); ?>" <?php if ( $active_bg_color ) { ?>style="background-color: <?php echo esc_attr( $instance['bg_color'] ); ?>;"<?php } ?>>
			<div class="l-content" data-content-width="<?php echo esc_attr( $content_width ); ?>">
				<div class="u-row u-row-wrap <?php if ( 1 === $body_vertical ) { ?>u-row-item-center<?php } elseif ( 2 === $body_vertical ) { ?>u-row-item-top<?php } elseif ( 3 === $body_vertical ) { ?>u-row-item-bottom<?php } ?><?php if ( $reverse ) { ?> u-row-dir-reverse<?php } ?> content-box">
					<?php if ( $thumbnail_url ) : ?>
					<div class="content-box__thumbnail" data-thumbnail-width="<?php echo esc_attr( $thumbnail_width ); ?>" data-thumbnail-position="<?php echo esc_attr( $thumbnail_position ); ?>" >
						<img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php echo esc_html( $title ); ?>">
					</div><!--/.content-box__thumbnail-->
					<?php endif; ?>

					<?php if ( $title || $sub_title || $lead ) : ?>
					<div class="content-box__body <?php if ( $reverse ) { ?>content-box__left<?php } else { ?>content-box__right<?php } ?>"
						 data-body-padding="<?php echo esc_attr( $body_padding ); ?>"
						 data-body-overlap="<?php echo esc_attr( $body_overlap ); ?>"
						 <?php if ( $thumbnail_url ) { ?> data-thumbnail-width="<?php echo esc_attr( $thumbnail_width ); ?>"<?php } ?>
						 style="background-color: rgba(<?php echo esc_attr( $color_red ); ?>, <?php echo esc_attr( $color_green ); ?>, <?php echo esc_attr( $color_blue ); ?>, <?php echo esc_attr( $opacity ); ?>);">
						<?php if ( $title || $sub_title ) : ?>
						<div class="c-section-widget__header<?php if ( $header_center ) { ?> u-narrow-width__center<?php } ?>">
							<?php if ( $title ) : ?>
							<h2 class="c-section-widget__title" style="color: <?php echo esc_attr( $instance['title_color'] ); ?>;"><?php echo nl2br( wp_kses_post( $title ) ) ?></h2>
							<?php endif; ?>
							<?php if ( $sub_title ) : ?>
							<div class="c-section-widget__sub-title" style="color: <?php echo esc_attr( $instance['sub_title_color'] ); ?>;"><?php echo wp_kses_post( $sub_title ); ?></div>
							<?php endif; ?>
							<?php if ( $lead ) : ?>
							<div class="c-section-widget__lead<?php if ( $lead_left ) { ?> u-text-align-left<?php } ?>" style="color: <?php echo esc_attr( $instance['lead_color'] ); ?>;">
								<?php echo nl2br( wp_kses_post( $lead ) ); ?>
							</div>
							<?php endif; ?>
						</div><!--/.c-section-widget__header-->
						<?php endif; ?>

						<?php if ( $link_text ): ?>
						<div<?php if ( ! $thumbnail_url ) { ?> class="l-content__sm content-box__btn"<?php } ?>>
							<div class="c-btn__arrow c-section-widget__btn<?php if ( $btn_left ) { ?> u-text-align-left<?php } ?>">
								<a class="c-btn c-btn__<?php if ( $btn_bg ) { ?>main<?php } else { ?>outline<?php } ?> c-btn__<?php if ( 2 === $thumbnail_width && $thumbnail_url ) { ?>m<?php } else { ?>sm<?php } ?>" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_text ); ?><i class="icon-read-arrow-right"></i></a>
							</div>
						</div>
						<?php endif; ?>

					</div><!--/.content-box__body-->
				<?php endif; ?>
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
			'title'              => '',
			'sub_title'          => '',
			'lead'               => '',
			'thumbnail_url'      => '',
			'thumbnail_width'    => 'width-3',
			'thumbnail_position' => 'none',
			'body_vertical'      => 1,
			'body_overlap'       => 'overlap-1',
			'body_padding'       => 'none',
			'link_url'           => '',
			'link_text'          => '',
			'reverse'            => '',
			'header_center'      => '',
			'lead_left'          => '',
			'btn_left'           => '',
			'content_width'      => 'normal',
			'section_padding'    => 'normal',
			'active_bg_color'    => '',
			'bg_color'           => '#ffffff',
			'body_color'         => '#ffffff',
			'title_color'        => '#333333',
			'sub_title_color'    => '#484848',
			'lead_color'         => '#333333',
			'body_opacity'       => '1',
			'btn_bg'             => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title              = ( $instance['title'] );
		$sub_title          = ( $instance['sub_title'] );
		$lead               = ( $instance['lead'] );
		$thumbnail_url      = ( $instance['thumbnail_url'] );
		$thumbnail_width    = ( $instance['thumbnail_width'] );
		$thumbnail_position = ( $instance['thumbnail_position'] );
		$body_vertical      = ( $instance['body_vertical'] );
		$body_overlap       = ( $instance['body_overlap'] );
		$body_padding       = ( $instance['body_padding'] );
		$link_url           = ( $instance['link_url'] );
		$link_text          = ( $instance['link_text'] );
		$reverse            = ( $instance['reverse'] );
		$header_center      = ( $instance['header_center'] );
		$lead_left          = ( $instance['lead_left'] );
		$btn_left           = ( $instance['btn_left'] );
		$content_width      = ( $instance['content_width'] );
		$section_padding    = ( $instance['section_padding'] );
		$active_bg_color    = ( $instance['active_bg_color'] );
		$bg_color           = ( $instance['bg_color'] );
		$body_color         = ( $instance['body_color'] );
		$title_color        = ( $instance['title_color'] );
		$sub_title_color    = ( $instance['sub_title_color'] );
		$lead_color         = ( $instance['lead_color'] );
		$body_opacity       = ( $instance['body_opacity'] );
		$btn_bg             = ( $instance['btn_bg'] );
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
				rows="10"
			><?php echo esc_textarea( $lead ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'thumbnail_url' ); ?>">
			<?php _e( '画像', 'emanon-premium' ); ?>
			</label>
			<?php
				$id    = $this->get_field_id( 'thumbnail_url' );
				$name  = $this->get_field_name( 'thumbnail_url' );
				$value = $instance['thumbnail_url'];
				emanon_custom_media_uploader( $name, $value, $id );
			?>
		</p>

		<hr>

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

		<hr>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'thumbnail_width' ) ); ?>"><?php _e( '画像 横幅［%］', 'emanon-premium' ); ?></label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'thumbnail_width' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'thumbnail_width' ) ); ?>"
					class="widefat"
					style="width:80px!important"
				>
				<?php
				$thumbnail_width = [
					'width-1' => __( '30%', 'emanon-premium' ),
					'width-2' => __( '40%', 'emanon-premium' ),
					'width-3' => __( '50%', 'emanon-premium' ),
					'width-4' => __( '60%', 'emanon-premium' ),
					'width-5' => __( '70%', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $thumbnail_width as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['thumbnail_width'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'thumbnail_position' ) ); ?>"><?php _e( '縦配置［画像］', 'emanon-premium' ); ?></label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'thumbnail_position' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'thumbnail_position' ) ); ?>"
					class="widefat"
					style="width:80px!important"
				>
				<?php
				$thumbnail_position = [
					'none'      => __( '0px', 'emanon-premium' ),
					'overlap-1' => __( '32px', 'emanon-premium' ),
					'overlap-2' => __( '64px', 'emanon-premium' ),
					'overlap-3' => __( '-32px', 'emanon-premium' ),
					'overlap-4' => __( '-64px', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $thumbnail_position as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['thumbnail_position'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'body_vertical' ) ); ?>"><?php _e( '縦配置［コンテンツ］', 'emanon-premium' ); ?></label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'body_vertical' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'body_vertical' ) ); ?>"
					class="widefat"
					style="width:80px!important"
				>
				<?php
				$body_vertical = [
					'1' => __( 'ミドル', 'emanon-premium' ),
					'2' => __( 'トップ', 'emanon-premium' ),
					'3' => __( 'ボトム', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $body_vertical as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['body_vertical'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'body_overlap' ) ); ?>"><?php _e( 'オーバーラップ［コンテンツ］', 'emanon-premium' ); ?></label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'body_overlap' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'body_overlap' ) ); ?>"
					class="widefat"
					style="width:80px!important"
				>
				<?php
				$body_overlap = [
					'overlap-0'  => __( '-32px', 'emanon-premium' ),
					'overlap-1'  => __( '-24px', 'emanon-premium' ),
					'overlap-2'  => __( '-16px', 'emanon-premium' ),
					'overlap-3'  => __( '0px', 'emanon-premium' ),
					'overlap-4'  => __( '16px', 'emanon-premium' ),
					'overlap-5'  => __( '24px', 'emanon-premium' ),
					'overlap-6'  => __( '40px', 'emanon-premium' ),
					'overlap-7'  => __( '56px', 'emanon-premium' ),
					'overlap-8'  => __( '72px', 'emanon-premium' ),
					'overlap-9'  => __( '88px', 'emanon-premium' ),
					'overlap-10' => __( '104px', 'emanon-premium' ),
					'overlap-11' => __( '120px', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $body_overlap as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['body_overlap'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'body_padding' ) ); ?>"><?php _e( 'コンテンツ余白', 'emanon-premium' ); ?></label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'body_padding' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'body_padding' ) ); ?>"
					class="widefat"
					style="width:80px!important"
				>
				<?php
				$body_padding = [
					'none'   => __( 'なし', 'emanon-premium' ),
					'small'  => __( '小', 'emanon-premium' ),
					'middle' => __( '中', 'emanon-premium' ),
					'big'    => __( '大', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $body_padding as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['body_padding'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>

		<hr>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'reverse' ); ?>"
				id="<?php echo $this->get_field_id( 'reverse' ); ?>"
				class="checkbox"
				<?php checked( $reverse ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'reverse' ); ?>"><?php _e( '配置の入れ替え', 'emanon-premium' ); ?></label>
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
				name="<?php echo $this->get_field_name( 'btn_left' ); ?>"
				id="<?php echo $this->get_field_id( 'btn_left' ); ?>"
				class="checkbox"
				<?php checked( $btn_left ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'btn_left' ); ?>"><?php _e( 'ボタン［左配置］', 'emanon-premium' ); ?></label>
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
			<label for="<?php echo $this->get_field_id( 'body_color' ); ?>">
				<?php _e( 'コンテンツ', 'emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'body_color' ); ?>"
			id="<?php echo $this->get_field_id( 'body_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#ffffff"
			value="<?php echo esc_attr( $body_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'body_opacity' ) ); ?>">
			<?php _e( 'コンテンツ［透過率］', 'emanon-premium' ); ?>
			</label>
			<br>
			<input
				type="number"
				name="<?php echo $this->get_field_name( 'body_opacity' ); ?>"
				id="<?php echo $this->get_field_id( 'body_opacity' ); ?>"
				class="widefat"
				style="width:60px!important"
				step="0.1"
				min="0"
				max="1"
				value="<?php echo $body_opacity; ?>"
			/>
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
		$instance['title']              = wp_kses_post( $new_instance['title'] );
		$instance['sub_title']          = wp_kses_post( $new_instance['sub_title'] );
		$instance['lead']               = wp_kses_post( $new_instance['lead'] );
		$instance['thumbnail_url']      = esc_url( $new_instance['thumbnail_url'] );
		$instance['thumbnail_width']    = esc_attr( $new_instance['thumbnail_width'] );
		$instance['thumbnail_position'] = esc_attr( $new_instance['thumbnail_position'] );
		$instance['body_vertical']      = absint( $new_instance['body_vertical'] );
		$instance['body_overlap']       = esc_attr( $new_instance['body_overlap'] );
		$instance['body_padding']       = esc_attr( $new_instance['body_padding'] );
		$instance['bg_image_url']       = esc_url( $new_instance['bg_image_url'] );
		$instance['link_url']           = esc_url( $new_instance['link_url'] );
		$instance['link_text']          = esc_html( $new_instance['link_text'] );
		$instance['reverse']            = (bool) $new_instance['reverse'];
		$instance['header_center']      = (bool) $new_instance['header_center'];
		$instance['lead_left']          = (bool) $new_instance['lead_left'];
		$instance['btn_left']           = (bool) $new_instance['btn_left'];
		$instance['content_width']      = esc_attr( $new_instance['content_width'] );
		$instance['section_padding']    = esc_attr( $new_instance['section_padding'] );
		$instance['active_bg_color']    = (bool) $new_instance['active_bg_color'];
		$instance['bg_color']           = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['body_color']         = sanitize_hex_color( $new_instance['body_color'] );
		$instance['body_opacity']       = esc_attr( $new_instance['body_opacity'] );
		$instance['title_color']        = sanitize_hex_color( $new_instance['title_color'] );
		$instance['sub_title_color']    = sanitize_hex_color( $new_instance['sub_title_color'] );
		$instance['lead_color']         = sanitize_hex_color( $new_instance['lead_color'] );
		$instance['btn_bg']             = (bool) $new_instance['btn_bg'];
		return $instance;
	}

} // class Emanon_Content_Box_Section_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_content_box_section_widget' );
	function emanon_register_content_box_section_widget() {
		register_widget( 'Emanon_Content_Box_Section_Widget' );
}
