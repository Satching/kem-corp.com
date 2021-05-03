<?php
/**
 * Widget SNS follow class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class SNS_Follow_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'sns_follow', // Base ID
			__( '[E] SNSフォロー', 'emanon-premium' ), // Name
			array( 'description' => __( 'SNSフォローボタンをアイコン形式で表示します。', 'emanon-premium' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @param array $args      ウィジェットの引数 「before_title, after_title, before_widget, after_widget」
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {

		$title           = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$facebook        = apply_filters( 'widget_checkbox', empty( $instance['facebook'] ) ? '' : $instance['facebook'], $instance, $this->id_base );
		$twitter         = apply_filters( 'widget_checkbox', empty( $instance['twitter'] ) ? '' : $instance['twitter'], $instance, $this->id_base );
		$instagram       = apply_filters( 'widget_checkbox', empty( $instance['instagram'] ) ? '' : $instance['instagram'], $instance, $this->id_base );
		$youtube         = apply_filters( 'widget_checkbox', empty( $instance['youtube'] ) ? '' : $instance['youtube'], $instance, $this->id_base );
		$line            = apply_filters( 'widget_checkbox', empty( $instance['line'] ) ? '' : $instance['line'], $instance, $this->id_base );
		$rss             = apply_filters( 'widget_checkbox', empty( $instance['rss'] ) ? '' : $instance['rss'], $instance, $this->id_base );
		$sns_btn_round   = apply_filters( 'widget_checkbox', empty( $instance['sns_btn_round'] ) ? '' : $instance['sns_btn_round'], $instance, $this->id_base );
		$sns_brand_color = apply_filters( 'widget_checkbox', empty( $instance['sns_brand_color'] ) ? '' : $instance['sns_brand_color'], $instance, $this->id_base );
		if ( $sns_btn_round ) {
			$class_circle = 'sns-follow__circle';
			$color        = 'bg';
		} else {
			$class_circle = 'u-opacity-hover';
			$color        = 'color';
		}
		if ( $sns_brand_color ) {
			$class_brand = 'sns-brand-color';
		} else {
			$class_brand = 'is-initial';
		}
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>

	<div class="widget-sns-follow__inner <?php echo esc_attr( $class_brand ); ?>">
		<ul class="u-row u-row-cont-center">
			<?php if ( $facebook ): ?>
			<li class="widget-sns-follow__item facebook-<?php echo esc_attr( $color ); ?>">
				<a class="<?php echo esc_attr( $class_circle ); ?>" href="<?php echo esc_html( get_emanon_facebook_page_url() ); ?>" target="blank" rel="noopener" aria-label="Facebookでフォロー"><i class="icon-facebook"></i></a>
			</li>
			<?php endif; ?>
			<?php if ( $twitter ): ?>
			<li class="widget-sns-follow__item twitter-<?php echo esc_attr( $color ); ?>">
				<a class="<?php echo esc_attr( $class_circle ); ?>" href="<?php echo esc_html( get_emanon_twitter_profile_url() ); ?>" target="blank" rel="noopener" aria-label="Twitterでフォロー"><i class="icon-twitter"></i></a>
			</li>
			<?php endif; ?>
			<?php if ( $instagram ): ?>
			<li class="widget-sns-follow__item instagram-<?php echo esc_attr( $color ); ?>">
				<a class="<?php echo esc_attr( $class_circle ); ?>" href="<?php echo esc_html( get_emanon_instagram_profile_url() ); ?>" target="blank" rel="noopener" aria-label="Instagramでフォロー"><i class="icon-instagram"></i></a>
			</li>
			<?php endif; ?>
			<?php if ( $youtube ): ?>
			<li class="widget-sns-follow__item youtube-<?php echo esc_attr( $color ); ?>">
				<a class="<?php echo esc_attr( $class_circle ); ?>" href="<?php echo esc_html( get_emanon_youtube_profile_url() ); ?>" target="blank" rel="noopener" aria-label="youTubeでフォロー"><i class="icon-youtube-square"></i></a>
			</li>
			<?php endif; ?>
			<?php if( $line ): ?>
			<li class="widget-sns-follow__item line-<?php echo esc_attr( $color ); ?>">
				<a class="<?php echo esc_attr( $class_circle ); ?>" href="<?php echo esc_html( get_emanon_line_url() ); ?>" target="blank" rel="noopener" aria-label="LINEでフォロー"><i class="icon-line"></i></a>
			</li>
			<?php endif; ?>
			<?php if ( $rss ): ?>
			<li class="widget-sns-follow__item feedly-<?php echo esc_attr( $color ); ?>">
				<a class="<?php echo esc_attr( $class_circle ); ?>" href="https://feedly.com/i/subscription/feed/<?php echo esc_url( get_emanon_feedly_url() ); ?>" target="blank" rel="noopener" aria-label="Feedlyでフォロー"><i class="icon-rss"></i></a>
			</li>
			<?php endif; ?>
		</ul><!--/.u-row-->
	</div><!--/.sns-follow__item-->

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
			'facebook'        => '',
			'twitter'         => '',
			'instagram'       => '',
			'youtube'         => '',
			'line'            => '',
			'rss'             => '',
			'sns_btn_round'   => '',
			'sns_brand_color' => '',
		);
		$instance        = wp_parse_args( (array) $instance, $defaults );
		$title           = ( $instance['title'] );
		$facebook        = ( $instance['facebook'] );
		$twitter         = ( $instance['twitter'] );
		$instagram       = ( $instance['instagram'] );
		$youtube         = ( $instance['youtube'] );
		$line            = ( $instance['line'] );
		$rss             = ( $instance['rss'] );
		$sns_btn_round   = ( $instance['sns_btn_round'] );
		$sns_brand_color = ( $instance['sns_brand_color'] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'タイトル', 'emanon-premium' ); ?>
			</label>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'title' ); ?>"
				id="<?php echo $this->get_field_id( 'title' ); ?>"
				class="widefat"
				value="<?php echo esc_attr( $title ); ?>"
			>
		</p>
		<small class="notes"><span class="red">※</span><?php _e( '各SNSボタンのURLは、Emanon設定 > SNSで指定します。', 'emanon-premium' ); ?></small>
		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'facebook' ); ?>"
				id="<?php echo $this->get_field_id( 'facebook' ); ?>"
				class="checkbox"
				<?php checked( $facebook ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebookの表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'twitter' ); ?>"
				id="<?php echo $this->get_field_id( 'twitter' ); ?>"
				class="checkbox"
				<?php checked( $twitter ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitterの表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'instagram' ); ?>"
				id="<?php echo $this->get_field_id( 'instagram' ); ?>"
				class="checkbox"
				<?php checked( $instagram ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagramの表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'youtube' ); ?>"
				id="<?php echo $this->get_field_id( 'youtube' ); ?>"
				class="checkbox"
				<?php checked( $youtube ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'YouTubeの表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'line' ); ?>"
				id="<?php echo $this->get_field_id( 'line' ); ?>"
				class="checkbox"
				<?php checked( $line ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'line' ); ?>"><?php _e( 'LINEの表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'rss' ); ?>"
				id="<?php echo $this->get_field_id( 'rss' ); ?>"
				class="checkbox"
				<?php checked( $rss ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e( 'RSSの表示', 'emanon-premium' ); ?></label>
		</p>

		<hr>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'sns_btn_round' ); ?>"
				id="<?php echo $this->get_field_id( 'sns_btn_round' ); ?>"
				class="checkbox"
				<?php checked( $sns_btn_round ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'sns_btn_round' ); ?>"><?php _e( 'SNSボタン［円形］', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'sns_brand_color' ); ?>"
				id="<?php echo $this->get_field_id( 'sns_brand_color' ); ?>"
				class="checkbox"
				<?php checked( $sns_brand_color ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'sns_brand_color' ); ?>"><?php _e( 'SNSボタン［ブランドカラー］', 'emanon-premium' ); ?></label>
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
		$instance['title']           = esc_html( $new_instance['title'] );
		$instance['facebook']        = (bool) $new_instance['facebook'];
		$instance['twitter']         = (bool) $new_instance['twitter'];
		$instance['instagram']       = (bool) $new_instance['instagram'];
		$instance['youtube']         = (bool) $new_instance['youtube'];
		$instance['line']            = (bool) $new_instance['line'];
		$instance['rss']             = (bool) $new_instance['rss'];
		$instance['sns_btn_round']   = (bool) $new_instance['sns_btn_round'];
		$instance['sns_brand_color'] = (bool) $new_instance['sns_brand_color'];
		return $instance;
	}

} // class SNS_Follow_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_sns_follow_widget' );
	function emanon_register_sns_follow_widget() {
		register_widget( 'SNS_Follow_Widget' );
}
