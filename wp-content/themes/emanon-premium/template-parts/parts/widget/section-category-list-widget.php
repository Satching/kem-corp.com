<?php
/**
 * Widget category list section class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Emanon_Category_Lists_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'category_lists_section', // Base ID
			__( '[Es] カテゴリーリスト', 'emanon-premium' ), // Name
			array( 'description' => __( '指定カテゴリーをリスト形式で表示するセクション。', 'emanon-premium' ), ) // Args
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
		$content_width   = apply_filters( 'widget_select', empty( $instance['content_width'] ) ? 'normal' : $instance['content_width'], $instance, $this->id_base );
		$section_padding = apply_filters( 'widget_select', empty( $instance['section_padding'] ) ? 'normal' : $instance['section_padding'], $instance, $this->id_base );
		$col             = apply_filters( 'widget_select', empty( $instance['col'] ) ? 4 : $instance['col'], $instance, $this->id_base );
		$list_style      = apply_filters( 'widget_select', empty( $instance['list_style'] ) ? 'item__none' : $instance['list_style'], $instance, $this->id_base );
		$list_underline  = apply_filters( 'widget_checkbox', empty( $instance['list_underline'] ) ? '' : $instance['list_underline'], $instance, $this->id_base );
		$active_bg_color = apply_filters( 'widget_checkbox', empty( $instance['active_bg_color'] ) ? '' : $instance['active_bg_color'], $instance, $this->id_base );
		$btn_bg          = apply_filters( 'widget_checkbox', empty( $instance['btn_bg'] ) ? '' : $instance['btn_bg'], $instance, $this->id_base );
		echo $args['before_widget'];
	?>
		<section class="c-section-widget__inner" data-section-padding="<?php echo esc_attr( $section_padding ); ?>" <?php if ( $active_bg_color ) { ?>style="background-color: <?php echo esc_attr( $instance['bg_color'] ); ?>;"<?php } ?>>
			<?php if ( $title || $sub_title || $lead ): ?>
				<div class="l-content" data-content-width="<?php echo esc_attr( $content_width ); ?>">
					<div class="c-section-widget__header<?php if ( $header_center ) { ?> u-narrow-width__center<?php } ?>">
					<?php if ( $title ) : ?>
					<h2 class="c-section-widget__title" style="color: <?php echo esc_attr( $instance['title_color'] ); ?>;"><?php echo nl2br( wp_kses_post( $title) ); ?></h2>
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
				</div><!--/.l-content-->
			<?php endif; ?>
			<div class="l-content" data-content-width="<?php echo esc_attr( $content_width ); ?>">
				<div class="u-row u-row-wrap wrapper-col">
						<?php
							if( 6 === $col ) { 
								$max_col = 3;
							} elseif( 4 === $col) { 
								$max_col = 4;
							} elseif ( 3 === $col ) {
								$max_col = 5;
							}
							if ( $title ) {
								$h_tag     = 'h3';
							} else {
								$h_tag     = 'h2';
							}
							for( $c = 1; $c < $max_col; $c++ ) { ?>
						<div class="col-<?php echo esc_attr( $col ); ?> cat-content">
							<?php
								$image_url     = empty( $instance['cat_image_url_'.$c] ) ? '' : $instance['cat_image_url_'.$c];
								$cat_icon      = empty( $instance['cat_icon_'.$c] ) ? '' : $instance['cat_icon_'.$c];
								$cat_title     = empty( $instance['cat_title_'.$c] ) ? '' : $instance['cat_title_'.$c];
								$cat_sub_title = empty( $instance['cat_sub_title_'.$c] ) ? '' : $instance['cat_sub_title_'.$c];
							?>
							<?php if ( $image_url || $cat_icon ) : ?>
								<div class="cat-content__thumbnail<?php if ( $image_url && $cat_icon ) { ?> has-icon-thumbnail<?php } elseif ( $cat_icon  ) { ?> has-icon<?php } ?>">
									<?php if ( $image_url ) : ?>
									<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_html( $cat_title ); ?>">
									<?php endif; ?>
									<?php if ( $cat_icon ) : ?>
										<div class="cat-content__icon<?php if ( $image_url ) { ?> has-thumbnail<?php } ?>" style="background-color: <?php echo esc_attr( $instance['cat_icon_bg_color'] ); ?>;"><i class="<?php echo esc_html( $cat_icon ); ?>" style="color: <?php echo esc_attr( $instance['cat_icon_color'] ); ?>;"></i></div>
									<?php endif; ?>
								</div>
							<?php endif; ?>
							<?php if ( $cat_title || $cat_sub_title ) : ?>
							<div class="cat-content__heading">
								<?php if ( $cat_title ) : ?>
								<<?php echo esc_attr( $h_tag ); ?> class="cat-content__title" style="color: <?php echo esc_attr( $instance['cat_title_color'] ); ?>;"><?php echo esc_html( $cat_title ); ?></<?php echo esc_attr( $h_tag ); ?>>
								<?php endif; ?>
								<?php if ( $cat_sub_title ) : ?>
								<div class="cat-content__sub-title" style="color: <?php echo esc_attr( $instance['cat_sub_title_color'] ); ?>;"><?php echo esc_html( $cat_sub_title ); ?></div>
								<?php endif; ?>
							</div><!--/.cat-content__heading--->
							<?php endif; ?>
							<ul class="cat-content__list">
							<?php
								if ( 1 === $c ) {
									$min_i = 1;
									$max_i = 7;
								} elseif ( 2 === $c ) {
									$min_i = 7;
									$max_i = 13;
								} elseif ( 3 === $c ) {
									$min_i = 13;
									$max_i = 19;
								} elseif ( 4 === $c ) {
									$min_i = 19;
									$max_i = 25;
								}
							?>
							<?php for( $i = $min_i; $i < $max_i; $i++ ) { ?>
								<?php
									$term_id   = empty( $instance['cat_id_'.$i] ) ? '' : $instance['cat_id_'.$i];
									$term_name = get_cat_name( $term_id );
								?>
								<?php if ( $term_id ) : ?>
								<li class="cat-content__item<?php if ( $list_underline ) { ?> item__underline<?php } ?> <?php echo esc_attr( $list_style ); ?>">
									<a style="color: <?php echo esc_attr( $instance['cat_name_color'] ); ?>;" href="<?php echo get_category_link( $term_id ); ?>"><?php echo esc_html( $term_name ); ?></a>
								</li>
								<?php endif; ?>
							<?php } ?>
							</ul>
						</div><!--/.col--->
						<?php } ?>
				</div><!--/.u-row-->
			</div><!--/.l-content-->

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
			'title'           => '',
			'sub_title'       => '',
			'lead'            => '',
			'cat_image_url_1' => '',
			'cat_icon_1'      => '',
			'cat_title_1'     => '',
			'cat_sub_title_1' => '',
			'cat_id_1'        => '',
			'cat_id_2'        => '',
			'cat_id_3'        => '',
			'cat_id_4'        => '',
			'cat_id_5'        => '',
			'cat_id_6'        => '',
			'cat_image_url_2' => '',
			'cat_icon_2'      => '',
			'cat_title_2'     => '',
			'cat_sub_title_2' => '',
			'cat_id_7'        => '',
			'cat_id_8'        => '',
			'cat_id_9'        => '',
			'cat_id_10'       => '',
			'cat_id_11'       => '',
			'cat_id_12'       => '',
			'cat_image_url_3' => '',
			'cat_icon_3'      => '',
			'cat_title_3'     => '',
			'cat_sub_title_3' => '',
			'cat_id_13'       => '',
			'cat_id_14'       => '',
			'cat_id_15'       => '',
			'cat_id_16'       => '',
			'cat_id_17'       => '',
			'cat_id_18'       => '',
			'cat_image_url_4' => '',
			'cat_icon_4'      => '',
			'cat_title_4'     => '',
			'cat_sub_title_4' => '',
			'cat_id_19'       => '',
			'cat_id_20'       => '',
			'cat_id_21'       => '',
			'cat_id_22'       => '',
			'cat_id_23'       => '',
			'cat_id_24'       => '',
			'link_url'        => '',
			'link_text'       => '',
			'header_center'   => '',
			'lead_left'       => '',
			'content_width'   => 'normal',
			'section_padding' => 'normal',
			'col'             => 4,
			'list_style'      => 'item__none',
			'list_underline'  => '',
			'active_bg_color'     => '',
			'bg_color'            => '#ffffff',
			'title_color'         => '#333333',
			'sub_title_color'     => '#484848',
			'lead_color'          => '#333333',
			'cat_icon_color'      => '#333333',
			'cat_icon_bg_color'   => '#eeeff0',
			'cat_title_color'     => '#333333',
			'cat_sub_title_color' => '#484848',
			'cat_name_color'      => '#262626',
			'btn_bg'              => '',
		);
		$instance            = wp_parse_args( (array) $instance, $defaults );
		$title               = ( $instance['title'] );
		$sub_title           = ( $instance['sub_title'] );
		$lead                = ( $instance['lead'] );
		$link_url            = ( $instance['link_url'] );
		$link_text           = ( $instance['link_text'] );
		$header_center       = ( $instance['header_center'] );
		$lead_left           = ( $instance['lead_left'] );
		$content_width       = ( $instance['content_width'] );
		$section_padding     = ( $instance['section_padding'] );
		$col                 = ( $instance['col'] );
		$list_style          = ( $instance['list_style'] );
		$list_underline      = ( $instance['list_underline'] );
		$active_bg_color     = ( $instance['active_bg_color'] );
		$bg_color            = ( $instance['bg_color'] );
		$title_color         = ( $instance['title_color'] );
		$sub_title_color     = ( $instance['sub_title_color'] );
		$lead_color          = ( $instance['lead_color'] );
		$cat_icon_color      = ( $instance['cat_icon_color'] );
		$cat_icon_bg_color   = ( $instance['cat_icon_bg_color'] );
		$cat_title_color     = ( $instance['cat_title_color'] );
		$cat_sub_title_color = ( $instance['cat_sub_title_color'] );
		$cat_name_color      = ( $instance['cat_name_color'] );
		$btn_bg              = ( $instance['btn_bg'] );
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

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_image_url_1' ); ?>">
				<?php _e( '画像［1］', 'emanon-premium' ); ?>
			</label>
			<?php
				$id    = $this->get_field_id( 'cat_image_url_1' );
				$name  = $this->get_field_name( 'cat_image_url_1' );
				$value = $instance['cat_image_url_1'];
				emanon_custom_media_uploader( $name, $value, $id );
			?>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'cat_icon_1' ); ?>">
			<?php _e( 'アイコン［1］', 'emanon-premium' ); ?>
		</label>
		<small><span style="color:#ff0000; font-size:14px;">※ </span><?php _e( '例) icon-bubbles', 'emanon-premium' ); ?></small><br>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'cat_icon_1' ); ?>"
			id="<?php echo $this->get_field_id( 'cat_icon_1' ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['cat_icon_1'] ); ?>"
		>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'cat_title_1' ); ?>">
			<?php _e( 'タイトル［1］', 'emanon-premium' ); ?>
		</label>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'cat_title_1' ); ?>"
			id="<?php echo $this->get_field_id( 'cat_title_1' ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['cat_title_1'] ); ?>"
		>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'cat_sub_title_1' ); ?>">
			<?php _e( 'サブタイトル［1］', 'emanon-premium' ); ?>
		</label>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'cat_sub_title_1' ); ?>"
			id="<?php echo $this->get_field_id( 'cat_sub_title_1' ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['cat_sub_title_1'] ); ?>"
		>
		</p>

		<p class="widget-select-label">
			<?php for( $c = 1; $c < 7; $c++ ) { ?>
			<label for="<?php echo $this->get_field_id( 'cat_id_'.$c ); ?>">
			<?php
				$term_id = ( $instance['cat_id_'.$c] );
				wp_dropdown_categories( array(
				'show_option_all' => __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
				'show_count' => true,
				'name'       => esc_attr( $this->get_field_name( 'cat_id_'.$c ) ),
				'selected'   => absint( $term_id ),
				) );
			?>
			</label><br><br>
			<?php } ?>
		</p>

		<hr>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_image_url_2' ); ?>">
				<?php _e( '画像［2］', 'emanon-premium' ); ?>
			</label>
			<?php
				$id    = $this->get_field_id( 'cat_image_url_2' );
				$name  = $this->get_field_name( 'cat_image_url_2' );
				$value = $instance['cat_image_url_2'];
				emanon_custom_media_uploader( $name, $value, $id );
			?>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'cat_icon_2' ); ?>">
		<?php _e( 'アイコン［2］', 'emanon-premium' ); ?>
		</label>
		<small><span style="color:#ff0000; font-size:14px;">※ </span><?php _e( '例) icon-bubbles', 'emanon-premium' ); ?></small><br>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'cat_icon_2' ); ?>"
			id="<?php echo $this->get_field_id( 'cat_icon_2' ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['cat_icon_2'] ); ?>"
		>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'cat_title_2' ); ?>">
		<?php _e( 'タイトル［2］', 'emanon-premium' ); ?>
		</label>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'cat_title_2' ); ?>"
			id="<?php echo $this->get_field_id( 'cat_title_2' ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['cat_title_2'] ); ?>"
		>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'cat_sub_title_2' ); ?>">
		<?php _e( 'サブタイトル［2］', 'emanon-premium' ); ?>
		</label>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'cat_sub_title_2' ); ?>"
			id="<?php echo $this->get_field_id( 'cat_sub_title_2' ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['cat_sub_title_2'] ); ?>"
		>
		</p>

		<p class="widget-select-label">
			<?php for( $c = 7; $c < 13; $c++ ) { ?>
			<label for="<?php echo $this->get_field_id( 'cat_id_'.$c ); ?>">
			<?php
				$term_id = ( $instance['cat_id_'.$c] );
				wp_dropdown_categories( array(
				'show_option_all' => __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
				'show_count' => true,
				'name'       => esc_attr( $this->get_field_name( 'cat_id_'.$c ) ),
				'selected'   => absint( $term_id ),
				) );
			?>
			</label><br><br>
			<?php } ?>
		</p>

		<hr>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_image_url_3' ); ?>">
				<?php _e( '画像［3］', 'emanon-premium' ); ?>
			</label>
			<?php
				$id    = $this->get_field_id( 'cat_image_url_3' );
				$name  = $this->get_field_name( 'cat_image_url_3' );
				$value = $instance['cat_image_url_3'];
				emanon_custom_media_uploader( $name, $value, $id );
			?>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'cat_icon_3' ); ?>">
		<?php _e( 'アイコン［3］', 'emanon-premium' ); ?>
		</label>
		<small><span style="color:#ff0000; font-size:14px;">※ </span><?php _e( '例) icon-bubbles', 'emanon-premium' ); ?></small><br>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'cat_icon_3' ); ?>"
			id="<?php echo $this->get_field_id( 'cat_icon_3' ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['cat_icon_3'] ); ?>"
		>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'cat_title_3' ); ?>">
		<?php _e( 'タイトル［3］', 'emanon-premium' ); ?>
		</label>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'cat_title_3' ); ?>"
			id="<?php echo $this->get_field_id( 'cat_title_3' ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['cat_title_3'] ); ?>"
		>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'cat_sub_title_3' ); ?>">
		<?php _e( 'サブタイトル［3］', 'emanon-premium' ); ?>
		</label>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'cat_sub_title_3' ); ?>"
			id="<?php echo $this->get_field_id( 'cat_sub_title_3' ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['cat_sub_title_3'] ); ?>"
		>
		</p>

		<p class="widget-select-label">
			<?php for( $c = 13; $c < 19; $c++ ) { ?>
			<label for="<?php echo $this->get_field_id( 'cat_id_'.$c ); ?>">
			<?php
				$term_id = ( $instance['cat_id_'.$c] );
				wp_dropdown_categories( array(
				'show_option_all' => __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
				'show_count' => true,
				'name'       => esc_attr( $this->get_field_name( 'cat_id_'.$c ) ),
				'selected'   => absint( $term_id ),
				) );
			?>
			</label><br><br>
			<?php } ?>
		</p>

		<hr>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_image_url_4' ); ?>">
				<?php _e( '画像［4］', 'emanon-premium' ); ?>
			</label>
			<?php
				$id    = $this->get_field_id( 'cat_image_url_4' );
				$name  = $this->get_field_name( 'cat_image_url_4' );
				$value = $instance['cat_image_url_4'];
				emanon_custom_media_uploader( $name, $value, $id );
			?>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'cat_icon_4' ); ?>">
			<?php _e( 'アイコン［4］', 'emanon-premium' ); ?>
		</label>
		<small><span style="color:#ff0000; font-size:14px;">※ </span><?php _e( '例) icon-bubbles', 'emanon-premium' ); ?></small><br>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'cat_icon_4' ); ?>"
			id="<?php echo $this->get_field_id( 'cat_icon_4' ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['cat_icon_4'] ); ?>"
		>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'cat_title_4' ); ?>">
			<?php _e( 'タイトル［4］', 'emanon-premium' ); ?>
		</label>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'cat_title_4' ); ?>"
			id="<?php echo $this->get_field_id( 'cat_title_4' ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['cat_title_4'] ); ?>"
		>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'cat_sub_title_4' ); ?>">
			<?php _e( 'サブタイトル［4］', 'emanon-premium' ); ?>
		</label>
		<input
			type="text"
			name="<?php echo $this->get_field_name( 'cat_sub_title_4' ); ?>"
			id="<?php echo $this->get_field_id( 'cat_sub_title_4' ); ?>"
			class="widefat"
			value="<?php echo esc_attr( $instance['cat_sub_title_4'] ); ?>"
		>
		</p>

		<p class="widget-select-label">
			<?php for( $c = 19; $c < 25; $c++ ) { ?>
			<label for="<?php echo $this->get_field_id( 'cat_id_'.$c ); ?>">
			<?php
				$term_id = ( $instance['cat_id_'.$c] );
				wp_dropdown_categories( array(
				'show_option_all' => __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
				'show_count' => true,
				'name'       => esc_attr( $this->get_field_name( 'cat_id_'.$c ) ),
				'selected'   => absint( $term_id ),
				) );
			?>
			</label><br><br>
			<?php } ?>
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

		<hr>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'list_style' ) ); ?>"><?php _e( 'リストスタイル', 'emanon-premium' ); ?></label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'list_style' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'list_style' ) ); ?>"
					class="widefat"
					style="width:140px!important"
				>
				<?php
				$list_style = [
					'item__none'          => __( 'なし', 'emanon-premium' ),
					'item__disc'          => __( '丸', 'emanon-premium' ),
					'item__checkmark'     => __( 'チェック', 'emanon-premium' ),
					'item__arrow'         => __( '矢印', 'emanon-premium' ),
					'item__arrow--circle' => __( '矢印［円］', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $list_style as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['list_style'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'list_underline' ); ?>"
				id="<?php echo $this->get_field_id( 'list_underline' ); ?>"
				class="checkbox"
				<?php checked( $list_underline ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'list_underline' ); ?>"><?php _e( 'リスト［下線］を有効にする', 'emanon-premium' ); ?></label>
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
				value="<?php echo esc_attr( $instance['bg_color']  ); ?>"
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
			<label for="<?php echo $this->get_field_id( 'cat_icon_color' ); ?>">
				<?php _e( 'アイコン', 'emanon-premium' ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'cat_icon_color' ); ?>"
				id="<?php echo $this->get_field_id( 'cat_icon_color' ); ?>"
				class="emanon_color_field_input"
				data-default-color="#333333"
				value="<?php echo esc_attr( $cat_icon_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_icon_bg_color' ); ?>">
				<?php _e( 'アイコン［背景色］','emanon-premium' ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'cat_icon_bg_color' ); ?>"
				id="<?php echo $this->get_field_id( 'cat_icon_bg_color' ); ?>"
				class="emanon_color_field_input"
				data-default-color="#eeeff0"
				value="<?php echo esc_attr( $cat_icon_bg_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_title_color' ); ?>">
				<?php _e( 'カテゴリー タイトル','emanon-premium' ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'cat_title_color' ); ?>"
				id="<?php echo $this->get_field_id( 'cat_title_color' ); ?>"
				class="emanon_color_field_input"
				data-default-color="#333333"
				value="<?php echo esc_attr( $cat_title_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_sub_title_color' ); ?>">
				<?php _e( 'カテゴリー サブタイトル','emanon-premium' ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'cat_sub_title_color' ); ?>"
				id="<?php echo $this->get_field_id( 'cat_sub_title_color' ); ?>"
				class="emanon_color_field_input"
				data-default-color="#484848"
				value="<?php echo esc_attr( $cat_sub_title_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_name_color' ); ?>">
				<?php _e( 'カテゴリー名','emanon-premium' ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'cat_name_color' ); ?>"
				id="<?php echo $this->get_field_id( 'cat_name_color' ); ?>"
				class="emanon_color_field_input"
				data-default-color="#262626"
				value="<?php echo esc_attr( $cat_name_color ); ?>"
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
		$instance['title']               = wp_kses_post( $new_instance['title'] );
		$instance['sub_title']           = wp_kses_post( $new_instance['sub_title'] );
		$instance['lead']                = wp_kses_post( $new_instance['lead'] );
		for( $c = 1; $c < 5; $c++ ) {
		$instance['cat_image_url_'.$c]   = esc_url_raw( $new_instance['cat_image_url_'.$c] );
		$instance['cat_icon_'.$c]        = esc_html( $new_instance['cat_icon_'.$c] );
		$instance['cat_title_'.$c]       = esc_html( $new_instance['cat_title_'.$c] );
		$instance['cat_sub_title_'.$c]   = esc_html( $new_instance['cat_sub_title_'.$c] );
		}
		for( $c = 1; $c < 25; $c++ ) {
		$instance['cat_id_'.$c]          = absint( $new_instance['cat_id_'.$c] );
		}
		$instance['link_url']            = esc_url( $new_instance['link_url'] );
		$instance['link_text']           = sanitize_text_field( $new_instance['link_text'] );
		$instance['header_center']       = (bool) $new_instance['header_center'];
		$instance['lead_left']           = (bool) $new_instance['lead_left'];
		$instance['content_width']       = esc_attr( $new_instance['content_width'] );
		$instance['section_padding']     = esc_attr( $new_instance['section_padding'] );
		$instance['col']                 = absint( $new_instance['col'] );
		$instance['list_style']          = sanitize_text_field( $new_instance['list_style'] );
		$instance['list_underline']      = (bool) $new_instance['list_underline'];
		$instance['active_bg_color']     = (bool) $new_instance['active_bg_color'];
		$instance['bg_color']            = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['title_color']         = sanitize_hex_color( $new_instance['title_color'] );
		$instance['sub_title_color']     = sanitize_hex_color( $new_instance['sub_title_color'] );
		$instance['lead_color']          = sanitize_hex_color( $new_instance['lead_color'] );
		$instance['cat_icon_color']      = sanitize_hex_color( $new_instance['cat_icon_color'] );
		$instance['cat_icon_bg_color']   = sanitize_hex_color( $new_instance['cat_icon_bg_color'] );
		$instance['cat_title_color']     = sanitize_hex_color( $new_instance['cat_title_color'] );
		$instance['cat_sub_title_color'] = sanitize_hex_color( $new_instance['cat_sub_title_color'] );
		$instance['cat_name_color']      = sanitize_hex_color( $new_instance['cat_name_color'] );
		$instance['btn_bg']              = (bool) $new_instance['btn_bg'];
		return $instance;
	}

} // class  Category_Lists_Section_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_category_lists_section_widget' );
	function emanon_register_category_lists_section_widget() {
		register_widget( 'Emanon_Category_Lists_Section_Widget' );
}