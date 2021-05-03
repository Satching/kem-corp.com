<?php
/**
 * Widget author profile class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Author_Profile_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'author_profile', // Base ID
			__( '[E] 投稿者プロフィール', 'emanon-premium' ), // Name
			array( 'description' => __( '投稿者の情報を表示します。', 'emanon-premium' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @param array $args      ウィジェットの引数 「before_title, after_title, before_widget, after_widget」
	 * @param array $instance  Widgetの設定項目
	 */
	public function widget( $args, $instance ) {
		$custom_news        = apply_filters( 'widget_checkbox', empty( $instance['custom_news'] ) ? '' : $instance['custom_news'], $instance, $this->id_base );
		$custom_seminar     = apply_filters( 'widget_checkbox', empty( $instance['custom_seminar'] ) ? '' : $instance['custom_seminar'], $instance, $this->id_base );

		if ( is_singular ( 'news' ) && ! $custom_news || is_singular ( 'seminar' ) && ! $custom_seminar || is_404() ) {
			return;
		}

		$title              = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$profile_bg_img     = apply_filters( 'widget_checkbox', empty( $instance['profile_bg_img'] ) ? '' : $instance['profile_bg_img'], $instance, $this->id_base );
		$position           = apply_filters( 'widget_checkbox', empty( $instance['position'] ) ? '' : $instance['position'], $instance, $this->id_base );
		$profile            = apply_filters( 'widget_checkbox', empty( $instance['profile'] ) ? '' : $instance['profile'], $instance, $this->id_base );
		$sns                = apply_filters( 'widget_checkbox', empty( $instance['sns'] ) ? '' : $instance['sns'], $instance, $this->id_base );
		$sns_brand_color    = apply_filters( 'widget_checkbox', empty( $instance['sns_brand_color'] ) ? '' : $instance['sns_brand_color'], $instance, $this->id_base );
		$follow_label       = apply_filters( 'widget_text', empty( $instance['sns_follow_label'] ) ? '' : $instance['sns_follow_label'], $instance, $this->id_base );
		$link_url           = apply_filters( 'widget_url', empty( $instance['link_url'] ) ? '' : $instance['link_url'], $instance, $this->id_base );
		$link_text          = apply_filters( 'widget_text', empty( $instance['link_text'] ) ? '' : $instance['link_text'], $instance, $this->id_base );
		$btn_bg             = apply_filters( 'widget_checkbox', empty( $instance['btn_bg'] ) ? '' : $instance['btn_bg'], $instance, $this->id_base );
		$entry              = apply_filters( 'widget_checkbox', empty( $instance['entry'] ) ? '' : $instance['entry'], $instance, $this->id_base );
		$custom_news        = apply_filters( 'widget_checkbox', empty( $instance['custom_news'] ) ? '' : $instance['custom_news'], $instance, $this->id_base );
		$custom_seminar     = apply_filters( 'widget_checkbox', empty( $instance['custom_seminar'] ) ? '' : $instance['custom_seminar'], $instance, $this->id_base );
		$entry_title        = apply_filters( 'widget_text', empty( $instance['entry_title'] ) ? 'Entry List' : $instance['entry_title'], $instance, $this->id_base );
		$orderby            = apply_filters( 'widget_select', empty( $instance['orderby'] ) ? 'date' : $instance['orderby'], $instance, $this->id_base );
		$order              = apply_filters( 'widget_select', empty( $instance['order'] ) ? 'DESC' : $instance['order'], $instance, $this->id_base );
		$show_number        = apply_filters( 'widget_num', empty( $instance['show_number'] ) ? 3 : $instance['show_number'], $instance, $this->id_base );
		$display_image      = apply_filters( 'widget_checkbox', empty( $instance['display_image'] ) ? '' : $instance['display_image'], $instance, $this->id_base );
		if( $display_image ) {
			$class_image = ' has_thumbnail';
		} else {
			$class_image = '';
		}
		$image_crop         = apply_filters( 'widget_checkbox', empty( $instance['image_crop'] ) ? '' : $instance['image_crop'], $instance, $this->id_base );
		$user_id            = get_the_author_meta( 'ID' );
		$user_display_name  = get_the_author_meta( 'display_name' );
		$user_position      = get_the_author_meta( 'user_position' );
		$user_description   = get_the_author_meta( 'user_description') ;
		$user_url           = get_the_author_meta( 'user_url' );
		$user_twitter       = get_the_author_meta( 'user_twitter' );
		$user_facebook      = get_the_author_meta( 'user_facebook') ;
		$user_instagram     = get_the_author_meta( 'user_instagram' );
		$user_youtube       = get_the_author_meta( 'user_youtube' );
		$user_linkedin      = get_the_author_meta( 'user_linkedin' );
		$user_line          = get_the_author_meta( 'user_line' );
		$profile_bg_img_url = get_the_author_meta( 'profile_bg_img_url' );
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>

	<?php if( $user_id ): ?>

		<?php if( $profile_bg_img && $profile_bg_img_url ): ?>
		<div class="author-profile__thumbnail">
			<img src="<?php echo esc_url( $profile_bg_img_url ); ?>">
		</div>
		<?php endif; ?>
		<div class="author-profile__avatar<?php if ( $profile_bg_img && $profile_bg_img_url ) { ?> has-thumbnail<?php } ?>">
			<a href="<?php echo get_author_posts_url( $user_id ); ?>"><?php echo get_avatar( $user_id, 160, '', $user_display_name ); ?></a>
		</div>
		<span class="author-profile__name"><?php echo esc_html( $user_display_name ); ?></span>
		<?php if( $position ) { ?><span class="author-profile__position"><?php echo esc_html( $user_position ); ?></span><?php } ?>
		<?php if( $profile ): ?>
			<div class="author-profile__description">
				<p><?php echo nl2br( esc_html( $user_description ) ); ?></p>
			</div>
		<?php endif; ?>
		<?php if( $sns ): ?>
			<div class="author-profile__sns<?php if ( $sns_brand_color ) { ?> sns-brand-color<?php } ?>">
				<?php if( $user_url || $user_twitter || $user_facebook || $user_instagram || $user_line || $user_linkedin || $user_youtube ){ ?>
				<?php if( $follow_label ): ?>
				<span class="author-profile__sns--label"><?php echo esc_html( $follow_label); ?></span>
				<?php endif; ?>
				<ul class="u-row u-row-wrap u-row-cont-center author-profile__sns--list">
				<?php } ?>
					<?php if( $user_url ): ?>
					<li class="author-profile__sns--item user-url-color"><a href="<?php echo esc_url( $user_url ); ?>" target="_blank" rel="noopener" aria-label="user url"><i class="icon-user"></i></a></li>
					<?php endif; ?>
					<?php if( $user_twitter ): ?>
					<li class="author-profile__sns--item twitter-color"><a href="<?php echo esc_url( $user_twitter ); ?>" target="_blank" rel="noopener nofollow" aria-label="twitter"><i class="icon-twitter"></i></a></li>
					<?php endif; ?>
					<?php if( $user_facebook ): ?>
					<li class="author-profile__sns--item facebook-color"><a href="<?php echo esc_url( $user_facebook ); ?>" target="_blank" rel="noopener nofollow" aria-label="Facebook"><i class="icon-facebook"></i></a></li>
					<?php endif; ?>
					<?php if( $user_instagram ): ?>
					<li class="author-profile__sns--item instagram-color"><a href="<?php echo esc_url( $user_instagram ); ?>" target="_blank" rel="noopener nofollow" aria-label="Instagram"><i class="icon-instagram"></i></a></li>
					<?php endif; ?>
					<?php if( $user_youtube ): ?>
					<li class="author-profile__sns--item youtube-color"><a href="<?php echo esc_url( $user_youtube ); ?>" target="_blank" rel="noopener nofollow" aria-label="youTube"><i class="icon-youtube-square"></i></a></li>
					<?php endif; ?>
					<?php if( $user_line ): ?>
					<li class="author-profile__sns--item line-color"><a href="<?php echo esc_url( $user_line ); ?>" target="_blank" rel="noopener nofollow" aria-label="LINE"><i class="icon-line"></i></a></li>
					<?php endif; ?>
					<?php if( $user_linkedin ): ?>
					<li class="author-profile__sns--item linkedin-color"><a href="<?php echo esc_url( $user_linkedin ); ?>" target="_blank" rel="noopener nofollow" aria-label="Linkedin"><i class="icon-linkedin"></i></a></li>
					<?php endif; ?>
				<?php if( $user_url || $user_twitter || $user_facebook || $user_instagram || $user_linkedin || $user_line || $user_youtube ){ ?>
				</ul>
				<?php } ?>
			</div>
		<?php endif; ?>

		<?php if ( $link_text ): ?>
		<div class="author-profile__btn">
			<a class="c-btn c-btn__<?php if ( $btn_bg ) { ?>main<?php } else { ?>outline<?php } ?> c-btn__m" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_text ); ?></a>
		</div>
		<?php endif; ?>

	<?php endif; ?>

		<?php
		if ( is_singular ( 'news' ) ) {
			$post_name = 'news';
		} elseif ( is_singular ( 'seminar' ) ) {
			$post_name = 'seminar';
		} else {
			$post_name = 'post';
		}
		$defaults = array (
			'post_type'      => $post_name,
			'author'         => $user_id, // 著者ID
			'orderby'        => $orderby,// 並び替え項目の指定
			'order'          => $order, // 昇順・降順の指定
			'posts_per_page' => $show_number, //出力する記事の数
			'no_found_rows'  => true,
			);
		$query = new WP_Query( $defaults );
		if ( $image_crop ) {
			$size  = '160_160';
			$limit = '38';
		} else {
			$size  = '320_180';
			$limit = '36';
		}
		?>

		<?php if( $entry ) { ?>
			<?php if( $entry_title ) { ?><h4 class="author-profile__entry-title"><?php echo esc_html( $entry_title ); ?></h4><?php } ?>
			<ul class="c-post-list<?php echo esc_attr( $class_image ); ?>">
			<?php while ( $query->have_posts() ): $query->the_post(); ?>
				<li class="c-post-list__item">
					<a href="<?php the_permalink();?>" class="c-post-list__link u-img-scale">
						<?php if ( $display_image ): ?>
						<figure class="c-post-list__figure<?php if ( $image_crop ) { ?> image-crop<?php } ?>">
							<?php if ( has_post_thumbnail() ): ?>
							<?php the_post_thumbnail( $size ); ?>
							<?php else: ?>
							<img src="<?php echo T_DIRE_URI; ?>/assets/images/no-img/<?php echo $size; ?>.png" alt="no image">
							<?php endif; ?>
						</figure>
						<?php endif; ?>
						<div class="c-post-list__title<?php if ( $image_crop ) { ?> image-crop<?php } ?>"><?php
						if ( post_password_required() ) {
							echo '<i class="icon-lock"></i>';
						}
						echo wp_trim_words( get_the_title(), $limit, '...' );
						?></div>
					</a>
				</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
		<?php } ?>

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
			'profile_bg_img'   => '',
			'position'         => '',
			'profile'          => '',
			'sns'              => '',
			'sns_brand_color'  => '',
			'sns_follow_label' => '＼ Follow me ／',
			'link_url'         => '',
			'link_text'        => '',
			'btn_bg'           => '',
			'entry'            => '',
			'custom_news'      => '',
			'custom_seminar'   => '',
			'entry_title'      => '記事一覧',
			'orderby'          => 'date',
			'order'            => 'DESC',
			'show_number'      => 3,
			'display_image'    => '',
			'image_crop'       => '',
		);
		$instance         = wp_parse_args( (array) $instance, $defaults );
		$title            = ( $instance['title'] );
		$profile_bg_img   = ( $instance['profile_bg_img'] );
		$position         = ( $instance['position'] );
		$profile          = ( $instance['profile'] );
		$sns              = ( $instance['sns'] );
		$sns_brand_color  = ( $instance['sns_brand_color'] );
		$sns_follow_label = ( $instance['sns_follow_label'] );
		$link_url         = ( $instance['link_url'] );
		$link_text        = ( $instance['link_text'] );
		$btn_bg           = ( $instance['btn_bg'] );
		$entry            = ( $instance['entry'] );
		$custom_news      = ( $instance['custom_news'] );
		$custom_seminar   = ( $instance['custom_seminar'] );
		$entry_title      = ( $instance['entry_title'] );
		$orderby          = ( $instance['orderby'] );
		$order            = ( $instance['order'] );
		$show_number      = ( $instance['show_number'] );
		$display_image    = ( $instance['display_image'] );
		$image_crop       = ( $instance['image_crop'] );
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

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'custom_news' ); ?>"
				id="<?php echo $this->get_field_id( 'custom_news' ); ?>"
				class="checkbox"
				<?php checked( $custom_news ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'custom_news' ); ?>"><?php _e( 'ニュースページの表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'custom_seminar' ); ?>"
				id="<?php echo $this->get_field_id( 'custom_seminar' ); ?>"
				class="checkbox"
				<?php checked( $custom_seminar ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'custom_seminar' ); ?>"><?php _e( 'セミナーページの表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'profile_bg_img' ); ?>"
				id="<?php echo $this->get_field_id( 'profile_bg_img' ); ?>"
				class="checkbox"
				<?php checked( $profile_bg_img ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'profile_bg_img' ); ?>"><?php _e( '背景画像の表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'position' ); ?>"
				id="<?php echo $this->get_field_id( 'position' ); ?>"
				class="checkbox"
				<?php checked( $position ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'position' ); ?>"><?php _e( '役職の表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'profile' ); ?>"
				id="<?php echo $this->get_field_id( 'profile' ); ?>"
				class="checkbox"
				<?php checked( $profile ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'profile' ); ?>"><?php _e( 'プロフィールの表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'sns' ); ?>"
				id="<?php echo $this->get_field_id( 'sns' ); ?>"
				class="checkbox"
				<?php checked( $sns ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'sns' ); ?>"><?php _e( 'SNSボタンの表示', 'emanon-premium' ); ?></label>
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

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sns_follow_label' ) ); ?>">
			<?php _e( 'SNSフォロー ラベル','emanon-premium' ); ?>
			</label>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'sns_follow_label' ); ?>"
				id="<?php echo $this->get_field_id( 'sns_follow_label' ); ?>"
				class="widefat"
				value="<?php echo $sns_follow_label; ?>"
			>
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

		<hr>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'entry' ); ?>"
				id="<?php echo $this->get_field_id( 'entry' ); ?>"
				class="checkbox"
				<?php checked( $entry ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'entry' ); ?>"><?php _e( '記事リストの表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'entry_title' ) ); ?>">
			<?php _e( '記事リスト タイトル','emanon-premium' ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'entry_title' ); ?>"
				id="<?php echo $this->get_field_id( 'entry_title' ); ?>"
				class="widefat"
				value="<?php echo $entry_title; ?>"
			>
		</p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php _e( '記事リストの表示基準', 'emanon-premium' ); ?></label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"
					class="widefat"
					style="width:100px!important"
				>
				<?php
				$orderby = [
					'date'     => __( '公開日', 'emanon-premium' ),
					'modified' => __( '更新日', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $orderby as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['orderby'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php _e( '記事リストの表示順', 'emanon-premium' ); ?></label>
				<select
					name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"
					class="widefat"
					style="width:100px!important"
				>
				<?php
				$order = [
					'DESC' => __( '降順', 'emanon-premium' ),
					'ASC'  => __( '昇順', 'emanon-premium' ),
				];
				?>
				<?php foreach ( $order as $value => $label ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['order'], true ); ?>><?php echo esc_html( $label ); ?></option>
				<?php endforeach; ?>
				</select>
		</p>
	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_number' ) ); ?>">
				<?php _e( '表示件数', 'emanon-premium' ); ?>
			</label>
			<input
				type="show_number"
				name="<?php echo $this->get_field_name( 'show_number' ); ?>"
				id="<?php echo $this->get_field_id( 'show_number' ); ?>"
				class="widefat"
				style="width:50px!important"
				step="1"
				min="1"
				value="<?php echo $show_number; ?>"
			/>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'display_image' ); ?>"
				id="<?php echo $this->get_field_id( 'display_image' ); ?>"
				class="checkbox"
				<?php checked( $display_image ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'display_image' ); ?>"><?php _e( 'アイキャッチ画像表示', 'emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'image_crop' ); ?>"
				id="<?php echo $this->get_field_id( 'image_crop' ); ?>"
				class="checkbox"
				<?php checked( $image_crop ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'image_crop' ); ?>"><?php _e( ' アイキャッチ画像の切り抜き', 'emanon-premium' ); ?></label>
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
		$instance['title']            = esc_html( $new_instance['title'] );
		$instance['custom_news']      = (bool) $new_instance['custom_news'];
		$instance['custom_seminar']   = (bool) $new_instance['custom_seminar'];
		$instance['profile_bg_img']   = (bool) $new_instance['profile_bg_img'];
		$instance['position']         = (bool) $new_instance['position'];
		$instance['profile']          = (bool) $new_instance['profile'];
		$instance['sns']              = (bool) $new_instance['sns'];
		$instance['sns_brand_color']  = (bool) $new_instance['sns_brand_color'];
		$instance['sns_follow_label'] = esc_html( $new_instance['sns_follow_label'] );
		$instance['link_url']         = esc_url( $new_instance['link_url'] );
		$instance['link_text']        = esc_html( $new_instance['link_text'] );
		$instance['btn_bg']           = (bool) $new_instance['btn_bg'];
		$instance['entry']            = (bool) $new_instance['entry'];
		$instance['entry_title']      = esc_html( $new_instance['entry_title'] );
		$instance['orderby']          = esc_attr( $new_instance['orderby'] );
		$instance['order']            = esc_attr( $new_instance['order'] );
		$instance['show_number']      = absint( $new_instance['show_number'] );
		$instance['display_image']    = (bool) $new_instance['display_image'];
		$instance['image_crop']       = (bool) $new_instance['image_crop'];
		return $instance;
	}

} // class Author_Profile_Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_author_profile_widget' );
	function emanon_register_author_profile_widget() {
		register_widget( 'Author_Profile_Widget' );
}
