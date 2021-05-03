<?php
/**
 * Widget customer feedback section class
 *
 * @since 1.0.0
 * @package Emanon custemium
 */

class Cust_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'cust_section', // Base ID
			__( '[Es] お客様の声', 'emanon-premium' ), // Name
			array( 'description' => __( 'お客様の声をスライダー形式で表示するセクション。', 'emanon-premium' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @param array $args      ウィジェットの引数 「before_title, after_title, before_widget, after_widget」
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		$title            = apply_filters( 'widget_textarea', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$sub_title        = apply_filters( 'widget_text', empty( $instance['sub_title'] ) ? '' : $instance['sub_title'], $instance, $this->id_base );
		$lead             = apply_filters( 'widget_textarea', empty( $instance['lead'] ) ? '' : $instance['lead'], $instance, $this->id_base );
		$link_url         = apply_filters( 'widget_url', empty( $instance['link_url'] ) ? '' : $instance['link_url'], $instance, $this->id_base );
		$link_text        = apply_filters( 'widget_text', empty( $instance['link_text'] ) ? '' : $instance['link_text'], $instance, $this->id_base );
		$show_number      = apply_filters( 'widget_select', empty( $instance['show_number'] ) ? 1 : $instance['show_number'], $instance, $this->id_base );
		$autoplay         = apply_filters( 'widget_checkbox', empty( $instance['autoplay'] ) ? '' : $instance['autoplay'], $instance, $this->id_base );
		$dots             = apply_filters( 'widget_checkbox', empty( $instance['dots'] ) ? '' : $instance['dots'], $instance, $this->id_base );
		$header_center    = apply_filters( 'widget_checkbox', empty( $instance['header_center'] ) ? '' : $instance['header_center'], $instance, $this->id_base );
		$lead_left        = apply_filters( 'widget_checkbox', empty( $instance['lead_left'] ) ? '' : $instance['lead_left'], $instance, $this->id_base );
		$fb_center        = apply_filters( 'widget_checkbox', empty( $instance['fb_center'] ) ? '' : $instance['fb_center'], $instance, $this->id_base );
		$description_left = apply_filters( 'widget_checkbox', empty( $instance['description_left'] ) ? '' : $instance['description_left'], $instance, $this->id_base );
		$content_width    = apply_filters( 'widget_select', empty( $instance['content_width'] ) ? 'normal' : $instance['content_width'], $instance, $this->id_base );
		$section_padding  = apply_filters( 'widget_select', empty( $instance['section_padding'] ) ? 'normal' : $instance['section_padding'], $instance, $this->id_base );
		$active_bg_color  = apply_filters( 'widget_checkbox', empty( $instance['active_bg_color'] ) ? '' : $instance['active_bg_color'], $instance, $this->id_base );
		$btn_bg           = apply_filters( 'widget_checkbox', empty( $instance['btn_bg'] ) ? '' : $instance['btn_bg'], $instance, $this->id_base );
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
					<div class="c-section-widget__lead<?php if ( $lead_left ) { ?> u-text-align-left<?php } ?>" style="color: <?php echo esc_attr( $instance['lead_color'] ); ?>;"><?php echo nl2br( wp_kses_post( $lead ) ); ?></div>
					<?php endif; ?>
				</div><!--/.c-section-widget__heade-->
			</div><!--/.l-content-->
			<?php endif; ?>

			<div <?php if ( ! is_mobile() ) { ?>id="widget-<?php echo esc_attr( $args['widget_id'] ); ?>"<?php } ?>
				class="l-content<?php if ( is_mobile() ) { ?> u-row u-post-scroll<?php } ?>"
				data-autoplay="<?php echo esc_attr( ( $autoplay == true ) ? 'true' : 'false' ); ?>"
				data-dots="<?php echo esc_attr( ( $dots == true ) ? 'true' : 'false' ); ?>"
				data-slidestoshow="<?php echo esc_attr( $show_number ); ?>"
			>
				<?php
					if( $title ) { $h = 'h3'; } else { $h = 'h2'; }
					for( $c = 1; $c < 7; $c++ ) {
					$image_url        = empty( $instance['cust_image_url_'.$c] ) ? '' : $instance['cust_image_url_'.$c];
					$cust_name        = empty( $instance['cust_name_'.$c] ) ? '' : $instance['cust_name_'.$c];
					$cust_job         = empty( $instance['cust_job_'.$c] ) ? '' : $instance['cust_job_'.$c];
					$cust_description = empty( $instance['cust_description_'.$c] ) ? '' : $instance['cust_description_'.$c];
					$rating           = empty( $instance['rating_'.$c] ) ? '1' : $instance['rating_'.$c];
					$rating_args      = array(
						'rating' => $rating,
						'max'    => 5,
					);
				?>
				<?php if ( $image_url || $cust_name || $cust_job || $cust_description ): ?>
				<div class="<?php if ( is_mobile() ) { ?>u-post-scroll__item<?php } else { ?>slider-item<?php } ?> customer-feedback__item">
					<div class="customer-feedback-header">
						<?php if ( $image_url ) : ?>
						<div class="customer-feedback-header__img" style="background-image:url(<?php echo $image_url; ?>);"></div>
						<?php endif; ?>
						<?php if ( $cust_name ) : ?>
						<<?php echo esc_attr( $h ); ?> class="customer-feedback-header__name" style="color: <?php echo esc_attr( $instance['name_color'] ); ?>;"><?php echo esc_html( $cust_name ); ?></<?php echo esc_attr( $h ); ?>>
						<?php endif; ?>
						<?php if ( $cust_job ) : ?>
						<p class="customer-feedback-header__job" style="color: <?php echo esc_attr( $instance['job_name_color'] ); ?>;"><?php echo esc_html( $cust_job ); ?></p>
						<?php endif; ?>
					</div><!--/.customer-feedback-header-->
					<?php if ( $rating > 1 ): ?>
						<?php echo ( get_emanon_star_rating( $rating_args ) ); ?>
					<?php endif; ?>
					<?php if ( $cust_description ) : ?>
					<div class="customer-feedback-description<?php if ( $fb_center ) { ?> u-narrow-width__center<?php } ?>" style="color: <?php echo esc_attr( $instance['description_color'] ); ?>;">
						<div <?php if ( $description_left ) { ?>class="u-text-align-left"<?php } ?>><?php echo nl2br( esc_html( $cust_description ) ); ?></div>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<?php } ?>
	
			</div><!--/.l-content-->
	
			<?php if ( $link_text ): ?>
			<div class="l-content__sm">
				<div class="c-btn__arrow c-section-widget__btn">
					<a class="c-btn c-btn__<?php if ( $btn_bg ) { ?>main<?php } else { ?>outline<?php } ?> c-btn__sm" href="<?php echo ( $link_url ); ?>"><?php echo esc_html( $link_text ); ?><i class="icon-read-arrow-right"></i></a>
				</div>
			</div><!--/.l-content__sm"-->
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
			'title'              => '',
			'sub_title'          => '',
			'lead'               => '',
			'cust_image_url_1'   => '',
			'cust_image_url_2'   => '',
			'cust_image_url_3'   => '',
			'cust_image_url_4'   => '',
			'cust_image_url_5'   => '',
			'cust_image_url_6'   => '',
			'cust_name_1'        => '',
			'cust_name_2'        => '',
			'cust_name_3'        => '',
			'cust_name_4'        => '',
			'cust_name_5'        => '',
			'cust_name_6'        => '',
			'cust_job_1'         => '',
			'cust_job_2'         => '',
			'cust_job_3'         => '',
			'cust_job_4'         => '',
			'cust_job_5'         => '',
			'cust_job_6'         => '',
			'cust_description_1' => '',
			'cust_description_2' => '',
			'cust_description_3' => '',
			'cust_description_4' => '',
			'cust_description_5' => '',
			'cust_description_6' => '',
			'rating_1'           => '',
			'rating_2'           => '',
			'rating_3'           => '',
			'rating_4'           => '',
			'rating_5'           => '',
			'rating_6'           => '',
			'link_url'           => '',
			'link_text'          => '',
			'show_number'        => 1,
			'autoplay'           => '',
			'dots'               => '',
			'header_center'      => '',
			'lead_left'          => '',
			'fb_center'          => '',
			'description_left'   => '',
			'content_width'      => 'normal',
			'section_padding'    => 'normal',
			'active_bg_color'    => '',
			'bg_color'           => '#ffffff',
			'title_color'        => '#333333',
			'sub_title_color'    => '#484848',
			'lead_color'         => '#333333',
			'name_color'         => '#333333',
			'job_name_color'     => '#333333',
			'description_color'  => '#333333',
			'btn_bg'             => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title              = ( $instance['title'] );
		$sub_title          = ( $instance['sub_title'] );
		$lead               = ( $instance['lead'] );
		$link_url           = ( $instance['link_url'] );
		$link_text          = ( $instance['link_text'] );
		$show_number        = ( $instance['show_number'] );
		$autoplay           = ( $instance['autoplay'] );
		$dots               = ( $instance['dots'] );
		$header_center      = ( $instance['header_center'] );
		$lead_left          = ( $instance['lead_left'] );
		$fb_center          = ( $instance['fb_center'] );
		$description_left   = ( $instance['description_left'] );
		$content_width      = ( $instance['content_width'] );
		$section_padding    = ( $instance['section_padding'] );
		$active_bg_color    = ( $instance['active_bg_color'] );
		$bg_color           = ( $instance['bg_color'] );
		$title_color        = ( $instance['title_color'] );
		$sub_title_color    = ( $instance['sub_title_color'] );
		$lead_color         = ( $instance['lead_color'] );
		$name_color         = ( $instance['name_color'] );
		$job_name_color     = ( $instance['job_name_color'] );
		$description_color  = ( $instance['description_color'] );
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
				rows="5"
			><?php echo esc_textarea( $lead ); ?></textarea>
		</p>

		<hr>

		<?php for( $c = 1; $c < 7; $c++ ) { ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'cust_image_url_'.$c ); ?>">
				<?php _e( '画像', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label><br>
			<?php
				$id    = $this->get_field_id( 'cust_image_url_'.$c );
				$name  = $this->get_field_name( 'cust_image_url_'.$c );
				$value = $instance['cust_image_url_'.$c];
				emanon_custom_media_uploader( $name, $value, $id );
			?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cust_name_'.$c ); ?>">
				<?php _e( '氏名', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'cust_name_'.$c ); ?>"
				id="<?php echo $this->get_field_id( 'cust_name_'.$c ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $instance['cust_name_'.$c] ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cust_job_'.$c ); ?>">
				<?php _e( '役職', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'cust_job_'.$c ); ?>"
				id="<?php echo $this->get_field_id( 'cust_job_'.$c ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $instance['cust_job_'.$c] ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cust_description_'.$c ); ?>">
				<?php _e( '説明文', 'emanon-premium' ); ?><?php echo esc_attr( $c ); ?>
			</label>
			<textarea
				name="<?php echo esc_attr( $this->get_field_name( 'cust_description_'.$c ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'cust_description_'.$c ) ); ?>"
				class="widefat"
				rows="5"
			><?php echo esc_textarea( $instance['cust_description_'.$c] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'rating_'.$c  ) ); ?>"><?php _e( '評価スター', 'emanon-premium' ); ?></label><br>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'rating_'.$c  ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'rating_'.$c  ) ); ?>"
					class="widefat"
				>
				<?php
				$value_star = [
					''    => __( 'なし', 'emanon-premium' ),
					'1'   => __( '星1', 'emanon-premium' ),
					'1.5' => __( '星1.5', 'emanon-premium' ),
					'2'   => __( '星2', 'emanon-premium' ),
					'2.5' => __( '星2.5', 'emanon-premium' ),
					'3'   => __( '星3', 'emanon-premium' ),
					'3.5' => __( '星3.5', 'emanon-premium' ),
					'4'   => __( '星4', 'emanon-premium' ),
					'4.5' => __( '星4.5', 'emanon-premium' ),
					'5'   => __( '星5', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $value_star as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['rating_'.$c], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>

		<hr>

		<?php } ?>

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
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_number' ) ); ?>">
			<?php _e( '表示件数［PC］', 'emanon-premium' ); ?>
			</label>
			<select
				name="<?php echo esc_attr( $this->get_field_name( 'show_number' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'show_number' ) ); ?>"
			class="widefat"
			style="width:80px!important"
			>
			<?php
			$show_number = [
				'1' => __( '1', 'emanon-premium' ),
				'2' => __( '2', 'emanon-premium' ),
				'3' => __( '3', 'emanon-premium' ),
			];
			?>
			<?php foreach ( $show_number as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['show_number'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
			</select>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'autoplay' ); ?>"
				id="<?php echo $this->get_field_id( 'autoplay' ); ?>"
				class="checkbox"
				<?php checked( $autoplay ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'autoplay' ); ?>"><?php _e( '自動再生［PC］', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'dots' ); ?>"
				id="<?php echo $this->get_field_id( 'dots' ); ?>"
				class="checkbox"
				<?php checked( $dots ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'dots' ); ?>"><?php _e( 'ドットの表示［PC］', 'emanon-premium' ); ?></label>
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
				name="<?php echo $this->get_field_name( 'fb_center' ); ?>"
				id="<?php echo $this->get_field_id( 'fb_center' ); ?>"
				class="checkbox"
				<?php checked( $fb_center ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'fb_center' ); ?>"><?php _e( '説明文［中央配置］', 'emanon-premium'); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'description_left' ); ?>"
				id="<?php echo $this->get_field_id( 'description_left' ); ?>"
				class="checkbox"
				<?php checked( $description_left ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'description_left' ); ?>"><?php _e( '説明文［左寄席］', 'emanon-premium'); ?></label>
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
			<label for="<?php echo $this->get_field_id( 'active_bg_color' ); ?>"><?php _e( '背景色を有効にする', 'emanon-premium' ); ?></label><br>
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
			<label for="<?php echo $this->get_field_id( 'name_color' ); ?>">
				<?php _e( '氏名', 'emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'name_color' ); ?>"
			id="<?php echo $this->get_field_id( 'name_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#333333"
			value="<?php echo esc_attr( $name_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'job_name_color' ); ?>">
				<?php _e( '役職','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'job_name_color' ); ?>"
			id="<?php echo $this->get_field_id( 'job_name_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#333333"
			value="<?php echo esc_attr( $job_name_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'description_color' ); ?>">
				<?php _e( '説明文','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'description_color' ); ?>"
			id="<?php echo $this->get_field_id( 'description_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#333333"
			value="<?php echo esc_attr( $description_color ); ?>"
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
		$instance['title']                = esc_html( $new_instance['title'] );
		$instance['sub_title']            = wp_kses_post( $new_instance['sub_title'] );
		$instance['lead']                 = wp_kses_post( $new_instance['lead'] );
		for( $c = 1; $c < 7; $c++ ) {
		$instance['cust_image_url_'.$c]   = esc_url_raw( $new_instance['cust_image_url_'.$c] );
		$instance['cust_name_'.$c]        = esc_html( $new_instance['cust_name_'.$c] );
		$instance['cust_job_'.$c]         = esc_html( $new_instance['cust_job_'.$c] );
		$instance['cust_description_'.$c] = esc_html( $new_instance['cust_description_'.$c] );
		$instance['rating_'.$c]           = $new_instance['rating_'.$c];
		}
		$instance['link_url']             = esc_url( $new_instance['link_url'] );
		$instance['link_text']            = esc_html( $new_instance['link_text'] );
		$instance['show_number']          = absint( $new_instance['show_number'] );
		$instance['autoplay']             = (bool) $new_instance['autoplay'];
		$instance['dots']                 = (bool) $new_instance['dots'];
		$instance['header_center']        = (bool) $new_instance['header_center'];
		$instance['lead_left']            = (bool) $new_instance['lead_left'];
		$instance['fb_center']            = (bool) $new_instance['fb_center'];
		$instance['description_left']     = (bool) $new_instance['description_left'];
		$instance['content_width']        = esc_attr( $new_instance['content_width'] );
		$instance['section_padding']      = esc_attr( $new_instance['section_padding'] );
		$instance['active_bg_color']      = (bool) $new_instance['active_bg_color'];
		$instance['bg_color']             = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['title_color']          = sanitize_hex_color( $new_instance['title_color'] );
		$instance['sub_title_color']      = sanitize_hex_color( $new_instance['sub_title_color'] );
		$instance['lead_color']           = sanitize_hex_color( $new_instance['lead_color'] );
		$instance['name_color']           = sanitize_hex_color( $new_instance['name_color'] );
		$instance['job_name_color']       = sanitize_hex_color( $new_instance['job_name_color'] );
		$instance['description_color']    = sanitize_hex_color( $new_instance['description_color'] );
		$instance['btn_bg']               = (bool) $new_instance['btn_bg'];
		return $instance;
	}

} // class cust_Section_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_cust_section_widget' );
	function emanon_register_cust_section_widget() {
		register_widget( 'Cust_Section_Widget' );
}
