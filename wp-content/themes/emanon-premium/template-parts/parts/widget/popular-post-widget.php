<?php
/**
 * Widget popular post class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Popular_Post_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'popular_post', // Base ID
			__( '[E] 人気記事', 'emanon-premium' ), // Name
			array( 'description' => __( '閲覧数順に記事リストを表示します。', 'emanon-premium' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @param array $args      ウィジェットの引数 「before_title, after_title, before_widget, after_widget」
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		$title         = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$number        = apply_filters( 'widget_number', empty( $instance['number'] ) ? 5 : $instance['number'], $instance, $this->id_base );
		$show_rank     = apply_filters( 'widget_checkbox', empty( $instance['show_rank'] ) ? '' : $instance['show_rank'], $instance, $this->id_base );
		$show_views    = apply_filters( 'widget_checkbox', empty( $instance['show_views'] ) ? '' : $instance['show_views'], $instance, $this->id_base );
		$display_image = apply_filters( 'widget_checkbox', empty( $instance['display_image'] ) ? '' : $instance['display_image'], $instance, $this->id_base );
		if( $display_image ) {
			$class_image = ' has_thumbnail';
		} else {
			$class_image = '';
		}
		$image_crop    = apply_filters( 'widget_checkbox', empty( $instance['image_crop'] ) ? '' : $instance['image_crop'], $instance, $this->id_base );
		if ( $image_crop ) {
			$size  = '160_160';
			$limit = '78';
		} else {
			$size  = '320_180';
			$limit = '48';
		}
		$defaults   = array (
			'post_type'      => 'post',
			'posts_per_page' => $number,
			'meta_key'       => 'post_views_number',
			'orderby'        => 'meta_value_num',
			'order'          => 'DESC',
			'no_found_rows'  => true,
		);
		$query      = get_posts( $defaults );
		$i = 1;
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>

			<?php if ( $query ): ?>
				<ul class="c-post-list<?php echo esc_attr( $class_image ); ?>">
				<?php foreach( $query as $post ): ?>
					<li class="c-post-list__item">
						<a href="<?php echo get_permalink( $post->ID ); ?>" class="c-post-list__link u-img-scale">
							<?php if ( $display_image ): ?>
							<figure class="c-post-list__figure<?php if ( $image_crop ) { ?> image-crop<?php } ?>">
								<?php if ( get_the_post_thumbnail_url( $post->ID )  ): ?>
									<img src="<?php echo get_the_post_thumbnail_url( $post->ID, $size ); ?>" alt="<?php echo $post->post_title; ?>">
								<?php else: ?>
									<img src="<?php echo T_DIRE_URI; ?>/assets/images/no-img/<?php echo $size; ?>.png" class="popular-post-thumbnail" alt="no image">
								<?php endif; ?>
							</figure>
							<?php endif; ?>
							<?php if( $show_rank ) echo '<div class="popular-post-rank"><span class="post-rank">'.$i.'</span></div>'; $i++; ?>
							<div class="c-post-list__title<?php if ( $image_crop ) { ?> image-crop<?php } ?>"><?php echo mb_strimwidth( $post->post_title, 0, $limit, "..." ); ?>
							<?php if( $show_views ) echo '<span class="popular-post-views">' . get_post_meta( $post->ID, 'post_views_number', true ) . ' views</span>'; ?>
							</div>
							</a>
					</li>
				<?php endforeach; ?>
				<?php wp_reset_query(); ?>
				</ul>
			<?php else: ?>
			<p><?php _e( 'ランキングを集計中です。', 'emanon-premium' ); ?></p>
			<?php endif; ?>

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
			'title'         => '',
			'number'        => 5,
			'show_rank'     => '',
			'show_views'    => '',
			'display_image' => '',
			'image_crop'    => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title         = ( $instance['title'] );
		$number        = ( $instance['number'] );
		$show_rank     = ( $instance['show_rank'] );
		$display_image = ( $instance['display_image'] );
		$show_views    = ( $instance['show_views'] );
		$image_crop    = ( $instance['image_crop'] );
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
			value="<?php echo $title; ?>"
			>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>">
				<?php _e( '表示件数［最大：10］', 'emanon-premium' ); ?>
			</label>
			<input
				type="number"
				name="<?php echo $this->get_field_name( 'number' ); ?>" 
				id="<?php echo $this->get_field_id( 'number' ); ?>"
				class="widefat"
				style="width:50px!important"
				step="1"
				min="1"
				max="10"
				value="<?php echo $number; ?>"
			/>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'show_rank' ); ?>"
				id="<?php echo $this->get_field_id( 'show_rank' ); ?>"
				class="checkbox"
				<?php checked( $show_rank ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'show_rank' ); ?>"><?php _e( 'ランキングの表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'show_views' ); ?>"
				id="<?php echo $this->get_field_id( 'show_views' ); ?>"
				class="checkbox"
				<?php checked( $show_views ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'show_views' ); ?>"><?php _e( '閲覧数の表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'display_image' ); ?>"
				id="<?php echo $this->get_field_id( 'display_image' ); ?>"
				class="checkbox"
				<?php checked( $display_image ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'display_image' ); ?>"><?php _e( 'アイキャッチ画像の表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'image_crop' ); ?>"
				id="<?php echo $this->get_field_id( 'image_crop' ); ?>"
				class="checkbox"
				<?php checked( $image_crop ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'image_crop' ); ?>"><?php _e( 'アイキャッチ画像の切り抜き', 'emanon-premium' ); ?></label>
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
		$instance['title']         = sanitize_text_field( $new_instance['title'] );
		$instance['number']        = absint( $new_instance['number'] );
		$instance['show_rank']     = (bool) $new_instance['show_rank'];
		$instance['show_views']    = (bool) $new_instance['show_views'];
		$instance['display_image'] = (bool) $new_instance['display_image'];
		$instance['image_crop']    = (bool) $new_instance['image_crop'];
		return $instance;
	}

} // class Popular_Post_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_popular_post_widget' );
	function emanon_register_popular_post_widget() {
		register_widget( 'Popular_Post_Widget' );
}