<?php
/**
 * Widget seminar section class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Emanon_Seminar_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'seminar_section', // Base ID
			__( '[Es] セミナー', 'emanon-premium' ), // Name
			array( 'description' => __( 'セミナー一覧を表示するセクション。', 'emanon-premium' ), ) // Args
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
		$pc_col          = apply_filters( 'widget_select', empty( $instance['pc_col'] ) ? '' : $instance['pc_col'], $instance, $this->id_base );
		$sp_col          = apply_filters( 'widget_select', empty( $instance['sp_col'] ) ? '' : $instance['sp_col'], $instance, $this->id_base );
		$sp_slider       = apply_filters( 'widget_select', empty( $instance['sp_slider'] ) ? '' : $instance['sp_slider'], $instance, $this->id_base );
		$link_url        = apply_filters( 'widget_url', empty( $instance['link_url'] ) ? '' : $instance['link_url'], $instance, $this->id_base );
		$link_text       = apply_filters( 'widget_text', empty( $instance['link_text'] ) ? '' : $instance['link_text'], $instance, $this->id_base );
		$header_center   = apply_filters( 'widget_checkbox', empty( $instance['header_center'] ) ? '' : $instance['header_center'], $instance, $this->id_base );
		$lead_left       = apply_filters( 'widget_checkbox', empty( $instance['lead_left'] ) ? '' : $instance['lead_left'], $instance, $this->id_base );
		$content_width   = apply_filters( 'widget_select', empty( $instance['content_width'] ) ? 'normal' : $instance['content_width'], $instance, $this->id_base );
		$show_number     = apply_filters( 'widget_num', empty( $instance['show_number'] ) ? 5 : $instance['show_number'], $instance, $this->id_base );
		$section_padding = apply_filters( 'widget_select', empty( $instance['section_padding'] ) ? 'normal' : $instance['section_padding'], $instance, $this->id_base );
		$active_bg_color = apply_filters( 'widget_checkbox', empty( $instance['active_bg_color'] ) ? '' : $instance['active_bg_color'], $instance, $this->id_base );
		$btn_bg          = apply_filters( 'widget_checkbox', empty( $instance['btn_bg'] ) ? '' : $instance['btn_bg'], $instance, $this->id_base );
		if( $title ) { $h = 'h3'; } else { $h = 'h2'; }
		if ( is_mobile() && 'sp-list' === $sp_col ) {
			$title_limit = 48;
		} elseif ( is_mobile() ) {
			$title_limit = 78;
		} elseif ( 'pc-list' === $pc_col ) {
			$title_limit = 44;
		} else {
			$title_limit = 86;
		}
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
				</div><!--/.c-section-widget__header-->
			</div><!--/.l-content-->
			<?php endif; ?>
			<div class="l-content" data-content-width="<?php echo esc_attr( $content_width ); ?>">
				<div class="u-row u-row-wrap wrapper-col has-sp-card-2<?php if ( 'sp-card-1' === $sp_col && $sp_slider ) { ?> u-post-scroll<?php } ?>">
					<?php
						$defaults = array (
							'post_type'      => 'seminar', // 投稿タイプ
							'posts_per_page' => $show_number, //出力する記事の数
							'no_found_rows'  => true,
						);
						$query = new WP_Query( $defaults );
					?>
					<?php while ( $query->have_posts() ): $query->the_post(); ?>
					<?php
						$date           = post_custom( 'emanon_seminar_date' );
						$hall_name      = post_custom( 'emanon_hall_name' );
						$terms          = get_the_terms( get_the_ID(), 'seminar-cat' );
							if ( $terms && ! is_wp_error( $terms ) ) {
								$term_id                         = $terms[0]->term_id;
								$term_name                       = $terms[0]->name;
								$term_text_color                 = get_term_meta( $term_id, 'cat_text_color', '#fff' );
								$term_background_color           = get_term_meta( $term_id, 'cat_bg_color', emanon_primary_color()  );
								$term_background_color_colorcode = str_replace( '#', '', $term_background_color );
								$term_color['red']               = hexdec( substr( $term_background_color_colorcode, 0, 2)  );
								$term_color['green']             = hexdec( substr( $term_background_color_colorcode, 2, 2 ) );
								$term_color['blue']              = hexdec( substr( $term_background_color_colorcode, 4, 2 ) );
								if ( has_post_thumbnail() ) {
									$term_background_color = 'rgba('. $term_color['red'] .','. $term_color['green'] .','. $term_color['blue'] .',0.8)';
								} else {
									$term_background_color = $term_background_color;
								}
							}
					?>
					<article class="<?php echo esc_attr( $sp_col ); ?> <?php echo esc_attr( $pc_col ); ?> u-shadow-hover archive-list<?php if ( has_post_thumbnail() ) { ?> has-thumbnail<?php } ?><?php if ( 'sp-card-1' === $sp_col && $sp_slider ) { ?> u-post-scroll__item<?php } ?>">
						<a href="<?php the_permalink() ?>">
						<?php if ( has_post_thumbnail() ): ?>
						<div class="post-thumbnail">
							<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), '600_338' ); ?>" alt="<?php echo get_the_title(); ?>">
						</div>
						<?php endif; ?>
						<div class="article-info">
							<?php if( $terms && $term_text_color || $terms && $term_background_color ) : ?>
							<span class="cat-name cat-'<?php echo esc_attr( $term_id ); ?>'" style="background-color:<?php echo esc_attr( $term_background_color ); ?>;color:<?php echo esc_attr( $term_text_color ); ?>;">
								<?php echo esc_html( $term_name ); ?>
							</span>
							<?php elseif( $terms ) : ?>
							<span class="cat-name cat-'<?php echo esc_attr( $term_id ); ?>">
								<?php echo esc_html( $term_name ); ?>
							</span>
							<?php endif; ?>
							<<?php echo esc_attr( $h ); ?> class="article-title"><?php
							if ( post_password_required() ) {
								echo '<i class="icon-lock"></i>';
							}
							echo wp_trim_words( get_the_title(), $title_limit, '...' );
							?></<?php echo esc_attr( $h ); ?>>
							<?php if ( $date || $hall_name ): ?>
							<div class="article-meta">
								<ul class="u-row u-row-cont-between">
									<?php if ( $date ): ?>
									<li><i class="icon-calendar"></i><time class="date published"><?php echo esc_html( $date ); ?></time></li>
									<?php endif; ?>
									<?php if ( $hall_name ): ?>
									<li><span class="seminar-hall"><?php echo esc_html( $hall_name ); ?></span></li>
									<?php endif; ?>
								</ul>
							</div><!--/.article-meta-->
							<?php endif; ?>
						</div><!--/.article-info-->
						</a>
					</article>
					<?php endwhile; wp_reset_postdata(); ?>

				</div><!--/.u-row-->

			<?php if ( $link_text ): ?>
			<div class="l-content__sm">
				<div class="c-btn__arrow c-section-widget__btn">
					<a class="c-btn c-btn__<?php if ( $btn_bg ) { ?>main<?php } else { ?>outline<?php } ?> c-btn__sm" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_text ); ?><i class="icon-read-arrow-right"></i></a>
				</div>
			</div><!--/.l-content__sm-->
			<?php endif; ?>

			</div><!--/.l-content-->
		</section><!--/.section-widget-inner-->
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
			'pc_col'          => 'pc-list',
			'sp_col'          => 'sp-list',
			'sp_slider'       => '',
			'link_url'        => '',
			'link_text'       => '',
			'header_center'   => '',
			'lead_left'       => '',
			'show_number'     => 5,
			'content_width'   => 'normal',
			'section_padding' => 'normal',
			'active_bg_color' => '',
			'bg_color'        => '#ffffff',
			'title_color'     => '#333333',
			'sub_title_color' => '#484848',
			'lead_color'      => '#333333',
			'btn_bg'          => '',
		);
		$instance         = wp_parse_args( (array) $instance, $defaults );
		$title            = ( $instance['title'] );
		$sub_title        = ( $instance['sub_title'] );
		$lead             = ( $instance['lead'] );
		$pc_col           = ( $instance['pc_col'] );
		$sp_col           = ( $instance['sp_col'] );
		$sp_slider        = ( $instance['sp_slider'] );
		$link_url         = ( $instance['link_url'] );
		$link_text        = ( $instance['link_text'] );
		$header_center    = ( $instance['header_center'] );
		$lead_left        = ( $instance['lead_left'] );
		$content_width    = ( $instance['content_width'] );
		$show_number      = ( $instance['show_number'] );
		$section_padding  = ( $instance['section_padding'] );
		$active_bg_color  = ( $instance['active_bg_color'] );
		$bg_color         = ( $instance['bg_color'] );
		$title_color      = ( $instance['title_color'] );
		$sub_title_color  = ( $instance['sub_title_color'] );
		$lead_color       = ( $instance['lead_color'] );
		$btn_bg           = ( $instance['btn_bg'] );
		?>

		<?php if ( ! get_posts( 'post_type=seminar' ) ): ?>
		<h4 class="red"><?php _e( 'セミナーページの設定が必要です。','emanon-premium' ); ?></h4>
		<?php endif; ?>

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
			<label for="<?php echo esc_attr( $this->get_field_id( 'pc_col' ) ); ?>">
				<?php _e( 'レイアウト［PC］', 'emanon-premium' ); ?>
			</label>
			<select
				name="<?php echo esc_attr( $this->get_field_name( 'pc_col' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'pc_col' ) ); ?>"
				class="widefat"
				style="width:190px!important"
			>
			<?php
				$pc_col_type = [
					'pc-list'   => __( '［リスト］1カラム', 'emanon-premium' ),
					'pc-card-2' => __( '［カード］2カラム', 'emanon-premium' ),
					'pc-card-3' => __( '［カード］3カラム', 'emanon-premium' ),
				];
			?>
			<?php foreach ( $pc_col_type as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['pc_col'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sp_col' ) ); ?>">
				<?php _e( 'レイアウト［SP］', 'emanon-premium' ); ?>
			</label>
			<select
				name="<?php echo esc_attr( $this->get_field_name( 'sp_col' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'sp_col' ) ); ?>"
				class="widefat"
				style="width:190px!important"
			>
			<?php
				$sp_col_type = [
					'sp-list'   => __( '［リスト］1カラム', 'emanon-premium' ),
					'sp-card-1' => __( '［カード］1カラム', 'emanon-premium' ),
					'sp-card-2' => __( '［カード］2カラム', 'emanon-premium' ),
				];
			?>
			<?php foreach ( $sp_col_type as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['sp_col'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
			</select>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'sp_slider' ); ?>"
				id="<?php echo $this->get_field_id( 'sp_slider' ); ?>"
				class="checkbox"
				<?php checked( $sp_slider ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'sp_slider' ); ?>"><?php _e( 'スライダー［SP］', 'emanon-premium' ); ?></label>
			<small class="notes"><span class="red">※</span><?php _e( '［カード］1カラムに適用されます。', 'emanon-premium' ); ?></small>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_url' ) ); ?>">
			<?php _e( 'リンク URL', 'emanon-premium' ); ?>
			</label><br>
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
			</label><br>
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_number' ) ); ?>">
			<?php _e( '表示件数', 'emanon-premium' ); ?>
			</label>
			<input
				type="number"
				name="<?php echo $this->get_field_name( 'show_number' ); ?>"
				id="<?php echo $this->get_field_id( 'show_number' ); ?>"
				class="widefat"
				style="width:50px!important"
				step="1"
				min="1"
				value="<?php echo $show_number; ?>"
			/>
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
		$instance['title']            = wp_kses_post( $new_instance['title'] );
		$instance['sub_title']        = wp_kses_post( $new_instance['sub_title'] );
		$instance['lead']             = wp_kses_post( $new_instance['lead'] );
		$instance['term_id']          = absint( $new_instance['term_id'] );
		$instance['pc_col']           = sanitize_text_field( $new_instance['pc_col'] );
		$instance['sp_col']           = sanitize_text_field( $new_instance['sp_col'] );
		$instance['sp_slider']        = (bool) $new_instance['sp_slider'];
		$instance['link_url']         = esc_url( $new_instance['link_url'] );
		$instance['link_text']        = esc_html( $new_instance['link_text'] );
		$instance['header_center']    = (bool) $new_instance['header_center'];
		$instance['lead_left']        = (bool) $new_instance['lead_left'];
		$instance['content_width']    = esc_attr( $new_instance['content_width'] );
		$instance['section_padding']  = esc_attr( $new_instance['section_padding'] );
		$instance['show_number']      = absint( $new_instance['show_number'] );
		$instance['active_bg_color']  = (bool) $new_instance['active_bg_color'];
		$instance['bg_color']         = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['title_color']      = sanitize_hex_color( $new_instance['title_color'] );
		$instance['sub_title_color']  = sanitize_hex_color( $new_instance['sub_title_color'] );
		$instance['lead_color']       = sanitize_hex_color( $new_instance['lead_color'] );
		$instance['btn_bg']           = (bool) $new_instance['btn_bg'];
		return $instance;
	}
} // class Seminar Section Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_seminar_section_widget' );
	function emanon_seminar_section_widget() {
		register_widget( 'Emanon_Seminar_Section_Widget' );
}