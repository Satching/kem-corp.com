<?php
/**
 * Widget section pickup category list
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Pickup_Category_List_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'pickup_category_list_section', // Base ID
			__( '[Es] 記事一覧［指定］', 'emanon-premium' ), // Name
			array( 'description' => __( 'おすすめ記事の表示・カテゴリー指定の記事を表示するセクション。', 'emanon-premium' ), ) // Args
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
		$link_text       = apply_filters( 'widget_text', empty( $instance['link_text'] ) ? '' : $instance['link_text'], $instance, $this->id_base );
		$show_number     = apply_filters( 'widget_num', empty( $instance['show_number_'. DEVICE] ) ? 3 : $instance['show_number_'. DEVICE], $instance, $this->id_base );
		$pickup_list     = apply_filters( 'widget_checkbox', empty( $instance['pickup_list'] ) ? '' : $instance['pickup_list'], $instance, $this->id_base );
		$cat_id          = apply_filters( 'widget_select', empty( $instance['cat_id'] ) ? '' : $instance['cat_id'], $instance, $this->id_base );
		$header_center   = apply_filters( 'widget_checkbox', empty( $instance['header_center'] ) ? '' : $instance['header_center'], $instance, $this->id_base );
		$lead_left       = apply_filters( 'widget_checkbox', empty( $instance['lead_left'] ) ? '' : $instance['lead_left'], $instance, $this->id_base );
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
						<?php if ( $title  ): ?>
						<h2 class="c-section-widget__title" style="color: <?php echo esc_attr( $instance['title_color'] ); ?>;"><?php echo nl2br( wp_kses_post( $title ) ); ?></h2>
						<?php endif; ?>
						<?php if ( $sub_title ) : ?>
						<div class="c-section-widget__sub-title" style="color: <?php echo esc_attr( $instance['sub_title_color'] ); ?>;"><?php echo wp_kses_post( $sub_title ); ?></div>
						<?php endif; ?>
						<?php if ( $lead ) : ?>
						<div class="c-section-widget__lead<?php if ( $lead_left ) { ?> u-text-align-left<?php } ?>" style="color: <?php echo esc_attr( $instance['lead_color'] ); ?>;"><?php echo nl2br( wp_kses_post( $lead ) ); ?></div>
					<?php endif; ?>
					</div><!--/.section-widget-header-->
				</div><!--/.l-content-->
				<?php endif; ?>

				<div class="l-content" data-content-width="<?php echo esc_attr( $content_width ); ?>">
					<div class="u-row u-row-wrap wrapper-col has-sp-card-2">
					<?php
						$pick_up           = $pickup_list ? 'emanon_featured_entry' : false;
						$cat               = $pickup_list ?  false : $cat_id;
						$arg = array (
							'post_type'      => 'post',
							'order'          => 'DESC',
							'orderby'        => 'post_date',
							'meta_key'       => $pick_up,
							'posts_per_page' => $show_number,
							'cat'            => $cat,
						);
						$post_query        = new WP_Query( $arg );
						while ( $post_query->have_posts() ) : $post_query->the_post();
							get_template_part( 'template-parts/parts/archive-list/archive-list' );
						endwhile;
					?>
					</div>
				<?php if ( $link_text && ! $pickup_list ): ?>
					<div class="l-content__sm">
						<div class="c-btn__arrow c-section-widget__btn">
							<a class="c-btn c-btn__<?php if ( $btn_bg ) { ?>main<?php } else { ?>outline<?php } ?> c-btn__sm" href="<?php echo get_category_link( $cat_id ); ?>"><?php echo esc_html( $link_text ); ?><i class="icon-read-arrow-right"></i></a>
						</div>
					</div><!--/.l-content__sm-->
				<?php endif; ?>
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
			'title'           => '',
			'sub_title'       => '',
			'lead'            => '',
			'link_text'       => '',
			'pickup_list'     => '',
			'cat_id'          => '',
			'show_number_pc'  => 3,
			'show_number_sp'  => 3,
			'header_center'   => '',
			'lead_left'       => '',
			'content_width'   => 'normal',
			'section_padding' => 'normal',
			'active_bg_color' => '',
			'bg_color'        => '#ffffff',
			'title_color'     => '#333333',
			'sub_title_color' => '#484848',
			'lead_color'      => '#333333',
			'btn_bg'          => '',
		);
		$instance       = wp_parse_args( (array) $instance, $defaults );

		$title           = ( $instance['title'] );
		$sub_title       = ( $instance['sub_title'] );
		$lead            = ( $instance['lead'] );
		$link_text       = ( $instance['link_text'] );
		$pickup_list     = ( $instance['pickup_list'] );
		$cat_id          = ( $instance['cat_id'] );
		$show_number_pc  = ( $instance['show_number_pc'] );
		$show_number_sp  = ( $instance['show_number_sp'] );
		$header_center   = ( $instance['header_center'] );
		$lead_left       = ( $instance['lead_left'] );
		$content_width   = ( $instance['content_width'] );
		$section_padding = ( $instance['section_padding'] );
		$active_bg_color = ( $instance['active_bg_color'] );
		$bg_color        = ( $instance['bg_color'] );
		$title_color     = ( $instance['title_color'] );
		$sub_title_color = ( $instance['sub_title_color'] );
		$lead_color      = ( $instance['lead_color'] );
		$btn_bg          = ( $instance['btn_bg'] );
		?>
		<p>
			<small class="notes"><span class="red">※</span><?php _e( 'Emanon設定＞タブ「レイアウト」のカラムレイアウト設定＞フロントページが反映されます。','emanon-premium' ); ?></small>
		</p>
	
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

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>">
			<?php _e( 'リンク テキスト', 'emanon-premium' ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'link_text' ); ?>"
				id="<?php echo $this->get_field_id( 'link_text' ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $link_text ) ?>"
			><br>
			<small class="notes"><span class="red">※</span><?php _e( 'カテゴリー指定時に反映されます。', 'emanon-premium' ); ?></small>
		</p>

		<hr>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'pickup_list' ); ?>"
				id="<?php echo $this->get_field_id( 'pickup_list' ); ?>"
				class="checkbox"
				<?php checked( $pickup_list ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'pickup_list' ); ?>"><?php _e( 'おすすめ記事を表示', 'emanon-premium' ); ?></label><br>
			<small class="notes"><span class="red">※</span><?php _e( 'カテゴリーの指定は無効になります。', 'emanon-premium' ); ?></small>
		</p>

		<p class="widget-select-label">
			<label for="<?php echo $this->get_field_id( 'cat_id' ); ?>">
			<?php
				$cat_id = ( $instance['cat_id'] );
				_e( 'カテゴリー', 'emanon-premium' );
				wp_dropdown_categories( array(
				'show_option_all' => __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
				'show_count' => true,
				'name' => esc_attr( $this->get_field_name( 'cat_id' ) ),
				'selected' => absint( $cat_id ),
				) );
			?>
			</label>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_number_pc' ) ); ?>">
			<?php _e( '表示件数［PC］', 'emanon-premium' ); ?>
			</label>
				<br>
			<input
				type="number"
				name="<?php echo $this->get_field_name( 'show_number_pc' ); ?>"
				id="<?php echo $this->get_field_id( 'show_number_pc' ); ?>"
				class="widefat"
				style="width:50px!important"
				min="1"
				step="1"
				value="<?php echo $show_number_pc; ?>"
			/>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_number_sp' ) ); ?>">
			<?php _e( '表示件数［SP］','emanon-premium' ); ?>
			</label>
				<br>
			<input
				type="number"
				name="<?php echo $this->get_field_name( 'show_number_sp' ); ?>"
				id="<?php echo $this->get_field_id( 'show_number_sp' ); ?>"
				class="widefat"
				style="width:50px!important"
				min="1"
				step="1"
				value="<?php echo $show_number_sp; ?>"
			/>
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
		$instance['title']           = wp_kses_post( $new_instance['title'] );
		$instance['sub_title']       = wp_kses_post( $new_instance['sub_title'] );
		$instance['lead']            = wp_kses_post( $new_instance['lead'] );
		$instance['link_text']       = esc_html( $new_instance['link_text'] );
		$instance['show_number_pc']  = absint( $new_instance['show_number_pc'] );
		$instance['show_number_sp']  = absint( $new_instance['show_number_sp'] );
		$instance['pickup_list']     = (bool) $new_instance['pickup_list'];
		$instance['cat_id']          = absint( $new_instance['cat_id'] );
		$instance['header_center']   = (bool) $new_instance['header_center'];
		$instance['lead_left']       = (bool) $new_instance['lead_left'];
		$instance['content_width']   = esc_attr( $new_instance['content_width'] );
		$instance['section_padding'] = esc_attr( $new_instance['section_padding'] );
		$instance['active_bg_color'] = (bool) $new_instance['active_bg_color'];
		$instance['bg_color']        = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['title_color']     = sanitize_hex_color( $new_instance['title_color'] );
		$instance['sub_title_color'] = sanitize_hex_color( $new_instance['sub_title_color'] );
		$instance['lead_color']      = sanitize_hex_color( $new_instance['lead_color'] );
		$instance['btn_bg']          = (bool) $new_instance['btn_bg'];
		return $instance;
	}

} // class  Category_Box_Section_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_pickup_category_list_section_widget' );
	function emanon_register_pickup_category_list_section_widget() {
		register_widget( 'Pickup_Category_List_Section_Widget' );
}