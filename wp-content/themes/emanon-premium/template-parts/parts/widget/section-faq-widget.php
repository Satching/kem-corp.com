<?php
/**
 * Widget FAQ section class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class FAQ_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'faq_section', // Base ID
			__( '[Es] FAQ', 'emanon-premium' ), // Name
			array( 'description' => __( '開閉式のFAQを表示するセクション。', 'emanon-premium' ), ) // Args
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
		$two_columns     = apply_filters( 'widget_checkbox', empty( $instance['two_columns'] ) ? '' : $instance['two_columns'], $instance, $this->id_base );
		$link_url        = apply_filters( 'widget_url', empty( $instance['link_url'] ) ? '' : $instance['link_url'], $instance, $this->id_base );
		$link_text       = apply_filters( 'widget_text', empty( $instance['link_text'] ) ? '' : $instance['link_text'], $instance, $this->id_base );
		$toggle          = apply_filters( 'widget_checkbox', empty( $instance['toggle'] ) ? '' : $instance['toggle'], $instance, $this->id_base );
		$header_center   = apply_filters( 'widget_checkbox', empty( $instance['header_center'] ) ? '' : $instance['header_center'], $instance, $this->id_base );
		$lead_left       = apply_filters( 'widget_checkbox', empty( $instance['lead_left'] ) ? '' : $instance['lead_left'], $instance, $this->id_base );
		$content_width   = apply_filters( 'widget_select', empty( $instance['content_width'] ) ? 'normal' : $instance['content_width'], $instance, $this->id_base );
		$section_padding = apply_filters( 'widget_select', empty( $instance['section_padding'] ) ? 'normal' : $instance['section_padding'], $instance, $this->id_base );
		$active_bg_color = apply_filters( 'widget_checkbox', empty( $instance['active_bg_color'] ) ? '' : $instance['active_bg_color'], $instance, $this->id_base );
		$btn_bg          = apply_filters( 'widget_checkbox', empty( $instance['btn_bg'] ) ? '' : $instance['btn_bg'], $instance, $this->id_base );
		if ( $title ) {
			$h_tag     = 'h3';
		} else {
			$h_tag     = 'h2';
		}
		if ( $two_columns ) {
			$min_left  = '1';
			$max_left  = '6';
			$min_right = '6';
			$max_right = '11';
		} else {
			$min_left  = '1';
			$max_left  = '11';
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
					<div class="c-section-widget__lead<?php if ( $lead_left ) { ?> u-text-align-left<?php } ?>" style="color: <?php echo esc_attr( $instance['lead_color'] ); ?>;">
							<?php echo nl2br( wp_kses_post( $lead ) ); ?>
					</div>
					<?php endif; ?>
				</div><!--/.c-section-widget__header-->
			</div><!--/.l-content-->
			<?php endif; ?>
			<div class="l-content" data-content-width="<?php echo esc_attr( $content_width ); ?>">
				<div class="faq-section u-row u-row-wrap wrapper-col">
					<dl class="js-acordion <?php if ( $two_columns ) { ?>col-6<?php } else { ?>col-12<?php } ?>">
						<?php for( $c = $min_left; $c < $max_left; $c++ ) { ?>
						<?php
							$question = empty( $instance['question_'.$c] ) ? '' : $instance['question_'.$c];
							$answer   = empty( $instance['answer_'.$c] ) ? '' : $instance['answer_'.$c];
						?>
						<?php if ( $question ) : ?>
						<dt class="c-acordion__title u-row u-row-item-center<?php if ( $toggle ) { ?> is-toggle<?php } ?><?php if ( ! $toggle ) { ?> is-active<?php } ?>" style="background-color: <?php echo esc_attr( $instance['question_bg_color'] ); ?>; color: <?php echo esc_attr( $instance['question_text_color'] ); ?>;">
							<<?php echo esc_attr( $h_tag ); ?> class="c-acordion__item">
							<span class="faq-section__icon">Q</span><?php echo esc_html( $question ); ?></<?php echo esc_attr( $h_tag ); ?>>
							<div class="c-acordion__icon"><span style="background-color: <?php echo esc_attr( $instance['question_text_color'] ); ?>;"></span><span style="background-color: <?php echo esc_attr( $instance['question_text_color'] ); ?>;"></span></div>
						</dt>
						<dd class="c-acordion__text <?php if ( $toggle ) { ?>u-display-none<?php } else { ?>u-display-block<?php } ?> "style="background-color: <?php echo esc_attr( $instance['answer_bg_color'] ); ?>; color: <?php echo esc_attr( $instance['answer_text_color'] ); ?>;"><?php echo nl2br( esc_html( $answer ) ); ?></dd>
						<?php endif; ?>
						<?php } ?>
					</dl>
					<?php if ( $two_columns ) : ?>
					<dl class="js-acordion col-6 faq-section__right">
						<?php for( $c = $min_right; $c < $max_right; $c++ ) { ?>
						<?php
							$question = empty( $instance['question_'.$c] ) ? '' : $instance['question_'.$c];
							$answer   = empty( $instance['answer_'.$c] ) ? '' : $instance['answer_'.$c];
						?>
						<?php if ( $question ) : ?>
						<dt class="c-acordion__title u-row u-row-item-center<?php if ( $toggle ) { ?> is-toggle<?php } ?><?php if ( ! $toggle ) { ?> is-active<?php } ?>" style="background-color: <?php echo esc_attr( $instance['question_bg_color'] ); ?>; color: <?php echo esc_attr( $instance['question_text_color'] ); ?>;">
							<<?php echo esc_attr( $h_tag ); ?> class="c-acordion__item">
							<span class="faq-section__icon">Q</span><?php echo esc_html( $question ); ?></<?php echo esc_attr( $h_tag ); ?>>
							<div class="c-acordion__icon"><span style="background-color: <?php echo esc_attr( $instance['question_text_color'] ); ?>;"></span><span style="background-color: <?php echo esc_attr( $instance['question_text_color'] ); ?>;"></span></div>
						</dt>
						<?php endif; ?>
						<dd class="c-acordion__text <?php if ( $toggle ) { ?>u-display-none<?php } else { ?>u-display-block<?php } ?> "style="background-color: <?php echo esc_attr( $instance['answer_bg_color'] ); ?>; color: <?php echo esc_attr( $instance['answer_text_color'] ); ?>;"><?php echo nl2br( esc_html( $answer ) ); ?></dd>
						<?php } ?>
					</dl>
					<?php endif; ?>
				</div><!--/.u-row-->

				<?php if ( $link_text ): ?>
				<div class="l-content__sm">
					<div class="c-btn__arrow c-section-widget__btn">
						<a class="c-btn c-btn__<?php if ( $btn_bg ) { ?>main<?php } else { ?>outline<?php } ?> c-btn__sm" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_text ); ?><i class="icon-read-arrow-right"></i></a>
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
			'title'                  => '',
			'sub_title'              => '',
			'lead'                   => '',
			'question_1'             => '',
			'question_2'             => '',
			'question_3'             => '',
			'question_4'             => '',
			'question_5'             => '',
			'question_6'             => '',
			'question_7'             => '',
			'question_8'             => '',
			'question_9'             => '',
			'question_10'            => '',
			'answer_1'               => '',
			'answer_2'               => '',
			'answer_3'               => '',
			'answer_4'               => '',
			'answer_5'               => '',
			'answer_6'               => '',
			'answer_7'               => '',
			'answer_8'               => '',
			'answer_9'               => '',
			'answer_10'              => '',
			'link_url'               => '',
			'link_text'              => '',
			'header_center'          => '',
			'lead_left'              => '',
			'content_width'          => 'normal',
			'section_padding'        => 'normal',
			'two_columns'            => '',
			'toggle'                 => '',
			'active_bg_color'        => '',
			'bg_color'               => '#ffffff',
			'title_color'            => '#333333',
			'sub_title_color'        => '#484848',
			'lead_color'             => '#333333',
			'question_bg_color'      => '#e5e7e8',
			'question_text_color'    => '#333333',
			'answer_bg_color'        => '#eeeff0',
			'answer_text_color'      => '#333333',
			'btn_bg'                 => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title               = ( $instance['title'] );
		$sub_title           = ( $instance['sub_title'] );
		$lead                = ( $instance['lead'] );
		$link_url            = ( $instance['link_url'] );
		$link_text           = ( $instance['link_text'] );
		$header_center       = ( $instance['header_center'] );
		$lead_left           = ( $instance['lead_left'] );
		$content_width       = ( $instance['content_width'] );
		$section_padding     = ( $instance['section_padding'] );
		$two_columns         = ( $instance['two_columns'] );
		$toggle              = ( $instance['toggle'] );
		$active_bg_color     = ( $instance['active_bg_color'] );
		$bg_color            = ( $instance['bg_color'] );
		$title_color         = ( $instance['title_color'] );
		$sub_title_color     = ( $instance['sub_title_color'] );
		$lead_color          = ( $instance['lead_color'] );
		$question_bg_color   = ( $instance['question_bg_color'] );
		$question_text_color = ( $instance['question_text_color'] );
		$answer_bg_color     = ( $instance['answer_bg_color'] );
		$answer_text_color   = ( $instance['answer_text_color'] );
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

		<?php for( $c = 1; $c < 11; $c++ ) { ?>
		<p>
		<label for="<?php echo $this->get_field_id( 'question_'.$c ); ?>">
		<?php _e( 'Question', 'emanon-premium' ); ?>［<?php echo esc_attr( $c ); ?>］
		</label>
		<textarea
			name="<?php echo esc_attr( $this->get_field_name( 'question_'.$c ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'question_'.$c ) ); ?>"
			class="widefat"
			rows="2"
		><?php echo esc_textarea( $instance['question_'.$c] ); ?></textarea>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'answer_'.$c ); ?>">
		<?php _e( 'Answer', 'emanon-premium' ); ?>［<?php echo esc_attr( $c ); ?>］
		</label>
		<textarea
			name="<?php echo esc_attr( $this->get_field_name( 'answer_'.$c ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'answer_'.$c ) ); ?>"
			class="widefat"
			rows="5"
		><?php echo esc_textarea( $instance['answer_'.$c] ); ?></textarea>
		</p>
		<?php } ?>

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
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'two_columns' ); ?>"
				id="<?php echo $this->get_field_id( 'two_columns' ); ?>"
				class="checkbox"
				<?php checked( $two_columns ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'two_columns' ); ?>"><?php _e( '2カラム［PC］', 'emanon-premium' ); ?></label>
			<small class="notes"><span class="red">※</span><?php _e( 'Q1からQ5を左に配置し、Q6からQ10を右に配置します。', 'emanon-premium' ); ?></small>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'toggle' ); ?>"
				id="<?php echo $this->get_field_id( 'toggle' ); ?>"
				class="checkbox"
				<?php checked( $toggle ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'toggle' ); ?>"><?php _e( '開閉を有効にする', 'emanon-premium' ); ?></label>
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
			<label for="<?php echo $this->get_field_id( 'question_bg_color' ); ?>">
				<?php _e( 'Question［背景色］','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'question_bg_color' ); ?>"
			id="<?php echo $this->get_field_id( 'question_bg_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#e5e7e8"
			value="<?php echo esc_attr( $question_bg_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'question_text_color' ); ?>">
				<?php _e( 'Question［文字］','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'question_text_color' ); ?>"
			id="<?php echo $this->get_field_id( 'question_text_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#333333"
			value="<?php echo esc_attr( $question_text_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'answer_bg_color' ); ?>">
				<?php _e( 'Answer［背景色］','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'answer_bg_color' ); ?>"
			id="<?php echo $this->get_field_id( 'answer_bg_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#eeeff0"
			value="<?php echo esc_attr( $answer_bg_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'answer_text_color' ); ?>">
				<?php _e( 'Answer［文字］','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'answer_text_color' ); ?>"
			id="<?php echo $this->get_field_id( 'answer_text_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#333333"
			value="<?php echo esc_attr( $answer_text_color ); ?>"
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
		for( $c = 1; $c < 11; $c++ ) {
		$instance['question_'.$c]        = esc_html( $new_instance['question_'.$c] );
		$instance['answer_'.$c]          = esc_html( $new_instance['answer_'.$c] );
		}
		$instance['link_url']            = esc_url( $new_instance['link_url'] );
		$instance['link_text']           = sanitize_text_field( $new_instance['link_text'] );
		$instance['header_center']       = (bool) $new_instance['header_center'];
		$instance['lead_left']           = (bool) $new_instance['lead_left'];
		$instance['content_width']       = esc_attr( $new_instance['content_width'] );
		$instance['section_padding']     = esc_attr( $new_instance['section_padding'] );
		$instance['two_columns']         = (bool) $new_instance['two_columns'];
		$instance['toggle']              = (bool) $new_instance['toggle'];
		$instance['active_bg_color']     = (bool) $new_instance['active_bg_color'];
		$instance['bg_color']            = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['title_color']         = sanitize_hex_color( $new_instance['title_color'] );
		$instance['sub_title_color']     = sanitize_hex_color( $new_instance['sub_title_color'] );
		$instance['lead_color']          = sanitize_hex_color( $new_instance['lead_color'] );
		$instance['question_bg_color']   = sanitize_hex_color( $new_instance['question_bg_color'] );
		$instance['question_text_color'] = sanitize_hex_color( $new_instance['question_text_color'] );
		$instance['answer_bg_color']     = sanitize_hex_color( $new_instance['answer_bg_color'] );
		$instance['answer_text_color']   = sanitize_hex_color( $new_instance['answer_text_color'] );
		$instance['btn_bg']              = (bool) $new_instance['btn_bg'];
		return $instance;
	}

} // class FAQ_Section_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_faq_section_widget' );
	function emanon_register_faq_section_widget() {
		register_widget( 'FAQ_Section_Widget' );
}
