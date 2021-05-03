<?php
/**
 * Widget posts list section class
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

class Post_List_Section_Widget extends WP_Widget {

	/**
	 * ウィジェットを登録
	 */
	public function __construct() {
		parent::__construct(
			'posts_list_section', // Base ID
			__( '[Es] 記事一覧［お知らせ］', 'emanon-premium' ), // Name
			array( 'description' => __( 'お知らせ形式で記事一覧を表示するセクション。', 'emanon-premium' ), ) // Args
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
		$col_1_title     = apply_filters( 'widget_title', empty( $instance['col_1_title'] ) ? '' : $instance['col_1_title'], $instance, $this->id_base );
		$col_1           = apply_filters( 'widget_select', empty( $instance['col_1'] ) ? 2 : $instance['col_1'], $instance, $this->id_base );
		$col_2_title     = apply_filters( 'widget_title', empty( $instance['col_2_title'] ) ? '' : $instance['col_2_title'], $instance, $this->id_base );
		$col_2           = apply_filters( 'widget_select', empty( $instance['col_2'] ) ? 1 : $instance['col_2'], $instance, $this->id_base );
		$link_url_1      = apply_filters( 'widget_url', empty( $instance['link_url_1'] ) ? '' : $instance['link_url_1'], $instance, $this->id_base );
		$link_url_2      = apply_filters( 'widget_url', empty( $instance['link_url_2'] ) ? '' : $instance['link_url_2'], $instance, $this->id_base );
		$header_center   = apply_filters( 'widget_checkbox', empty( $instance['header_center'] ) ? '' : $instance['header_center'], $instance, $this->id_base );
		$lead_left       = apply_filters( 'widget_checkbox', empty( $instance['lead_left'] ) ? '' : $instance['lead_left'], $instance, $this->id_base );
		$show_number     = apply_filters( 'widget_num', empty( $instance['show_number'] ) ? 5 : $instance['show_number'], $instance, $this->id_base );
		$display_cat     = apply_filters( 'widget_checkbox', empty( $instance['display_cat'] ) ? '' : $instance['display_cat'], $instance, $this->id_base );
		$display_date    = apply_filters( 'widget_checkbox', empty( $instance['display_date'] ) ? '' : $instance['display_date'], $instance, $this->id_base );
		$content_width   = apply_filters( 'widget_select', empty( $instance['content_width'] ) ? 'normal' : $instance['content_width'], $instance, $this->id_base );
		$section_padding = apply_filters( 'widget_select', empty( $instance['section_padding'] ) ? 'normal' : $instance['section_padding'], $instance, $this->id_base );
		$active_bg_color = apply_filters( 'widget_checkbox', empty( $instance['active_bg_color'] ) ? '' : $instance['active_bg_color'], $instance, $this->id_base );
		$btn_bg          = apply_filters( 'widget_checkbox', empty( $instance['btn_bg'] ) ? '' : $instance['btn_bg'], $instance, $this->id_base );
		if( $title ) { $h = 'h3'; } else { $h = 'h2'; }
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
				<div class="<?php if ( 1 != $col_2 ) { ?>u-row u-row-wrap wrapper-col<?php } ?>">
				<?php if ( 1 != $col_1 ) : ?>
				<div<?php if ( 1 != $col_2 ) { ?> class="col-6"<?php } ?>>
					<?php if ( $col_1_title ) : ?>
						<div class="post-list-header">
						<<?php echo esc_attr( $h ); ?> class="post-list-header__title<?php if ( $header_center ) {  ?> u-text-align-center<?php } ?>" style="color: <?php echo esc_attr( $instance['cat_title_color'] ); ?>;"><?php echo esc_html( $col_1_title ); ?></<?php echo esc_attr( $h ); ?>>
						</div>
					<?php endif; ?>
					<?php
						if ( 2 === $col_1 ) {
							$post_type = 'post';
							$taxonomy_1  = 'category';
						} elseif ( 3 === $col_1 ) {
							$post_type = 'post';
							$taxonomy_1  = 'category';
							$term_id   = apply_filters( 'widget_select', empty( $instance['cat_id_1'] ) ? '' : $instance['cat_id_1'], $instance, $this->id_base );
						} elseif ( 4 === $col_1 ) {
							$post_type = 'news';
							$taxonomy_1  = 'news-cat';
							$term_id   = apply_filters( 'widget_select', empty( $instance['term_id_1'] ) ? '' : $instance['term_id_1'], $instance, $this->id_base );
						} elseif ( 5 === $col_1 ) {
							$post_type = 'seminar';
							$taxonomy_1  = 'seminar-cat';
							$term_id   = apply_filters( 'widget_select', empty( $instance['term_id_2'] ) ? '' : $instance['term_id_2'], $instance, $this->id_base );
						}
						if ( 2 === $col_1 ) {
							$defaults = array (
								'post_type'      => $post_type, // 投稿タイプ
								'posts_per_page' => $show_number, //出力する記事の数
								'no_found_rows'  => true,
								);
						} elseif ( 0 == $term_id ) {
							$defaults = array (
								'post_type'      => $post_type, // 投稿タイプ
								'posts_per_page' => $show_number, //出力する記事の数
								'no_found_rows'  => true,
								'tax_query'      => array(
										array (
											'taxonomy' => $taxonomy_1, //タクソノミー名
											'field'    => 'id',
											'terms'    => 'any', //タームのID
										),
									)
							);
						} else {
							$defaults = array (
								'post_type'      => $post_type, // 投稿タイプ
								'posts_per_page' => $show_number, //出力する記事の数
								'no_found_rows'  => true,
								'tax_query'      => array(
										array (
											'taxonomy' => $taxonomy_1, //タクソノミー名
											'field'    => 'id',
											'terms'    => $term_id, //タームのID
										),
									)
							);
						}
						$query = new WP_Query( $defaults );
						?>
						<ul class="post-list">
						<?php while ( $query->have_posts() ): $query->the_post(); ?>
							<li class="post-list__item">
								<a class="post-list__link" href="<?php echo get_permalink(); ?>">
								<?php if ( $display_cat || $display_date ) : ?>
									<div class="post-list-meta<?php if ( $display_cat ) { ?> has-cat<?php } ?>">
									<?php
										$terms        = get_the_terms( get_the_ID(), $taxonomy_1 );
										$accent_color = get_theme_mod( 'accent_color', '#009dee' );
										if ( $terms && ! is_wp_error( $terms ) ) {
											$term_1    = $terms[0]->name;
											$term_id_1 = $terms[0]->term_id;
											$cat_text_color_1 = get_term_meta( $term_id_1, 'cat_text_color', '#fff' );
											$cat_bg_color_1   = get_term_meta( $term_id_1, 'cat_bg_color', $accent_color );
										}
										if ( $display_cat ) {
											if( $cat_text_color_1 || $cat_bg_color_1 ) {
											echo '<span class="post-list-meta__cat cat-' . $term_id_1 . '" style="background-color:' . $cat_bg_color_1 . '; color:' . $cat_text_color_1 . ';">' . $term_1 . '</span>' . "\n";
											} else {
											echo '<span class="post-list-meta__cat cat-' . $term_id_1 . '">' . $term_1 . '</span>' . "\n";
											}
										}
									?>
									<?php if ( $display_date ) : ?>
									<time class="date published" style="color: <?php echo esc_attr( $instance['meta_date_color'] ); ?>;" datetime="<?php echo esc_attr( get_the_time( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
									<?php endif; ?>
									</div>
								<?php endif; ?>
								<p class="post-list__title" style="color: <?php echo esc_attr( $instance['list_title_color'] ); ?>;"><?php
										if ( post_password_required() ) {
											echo '<i class="icon-lock"></i>';
										}
										the_title();
									?></p>
								</a>
							</li>
						<?php endwhile; wp_reset_postdata(); ?>
						</ul>
					</div><!--/.col-6-->
					<?php endif; ?>

				<?php if ( 1 != $col_2 ) : ?>
				<div<?php if ( 1 != $col_2 ) { ?> class="col-6"<?php } ?>>
					<?php if ( $col_2_title ): ?>
					<div class="post-list-header">
						<<?php echo esc_attr( $h ); ?> class="post-list-header__title<?php if ( $header_center ) {  ?> u-text-align-center<?php } ?>" style="color: <?php echo esc_attr( $instance['cat_title_color'] ); ?>;"><?php echo esc_html( $col_2_title ); ?></<?php echo esc_attr( $h ); ?>>
					</div>
					<?php endif; ?>
					<?php
						if ( 2 === $col_2 ) {
							$post_type  = 'post';
							$taxonomy_2 = 'category';
						} elseif ( 3 === $col_2 ) {
							$post_type  = 'post';
							$taxonomy_2 = 'category';
							$term_id    = apply_filters( 'widget_select', empty( $instance['cat_id_2'] ) ? '' : $instance['cat_id_2'], $instance, $this->id_base );
						} elseif ( 4 === $col_2 ) {
							$post_type  = 'news';
							$taxonomy_2 = 'news-cat';
							$term_id    = apply_filters( 'widget_select', empty( $instance['term_id_3'] ) ? '' : $instance['term_id_3'], $instance, $this->id_base );
						} elseif ( 5 === $col_2 ) {
							$post_type  = 'seminar';
							$taxonomy_2 = 'seminar-cat';
							$term_id    = apply_filters( 'widget_select', empty( $instance['term_id_4'] ) ? '' : $instance['term_id_4'], $instance, $this->id_base );
						}
						if ( 2 === $col_2 ) {
							$defaults = array (
								'post_type'      => $post_type, // 投稿タイプ
								'posts_per_page' => $show_number, //出力する記事の数
								'no_found_rows'  => true,
								);
						} elseif ( 0 == $term_id ) {
							$defaults = array (
								'post_type'      => $post_type, // 投稿タイプ
								'posts_per_page' => $show_number, //出力する記事の数
								'no_found_rows'  => true,
								'tax_query'      => array(
										array (
											'taxonomy' => $taxonomy_2, //タクソノミー名
											'field'    => 'id',
											'terms'    => 'any', //タームのID
										),
									)
							);
						} else {
							$defaults = array (
								'post_type'      => $post_type, // 投稿タイプ
								'posts_per_page' => $show_number, //出力する記事の数
								'no_found_rows'  => true,
								'tax_query'      => array(
										array (
											'taxonomy' => $taxonomy_2, //タクソノミー名
											'field'    => 'id',
											'terms'    => $term_id, //タームのID
										),
									)
							);
						}
						$query = new WP_Query( $defaults );
						?>
						<ul class="post-list">
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<li class="post-list__item">
								<a class="post-list__link" href="<?php echo get_permalink(); ?>">
								<?php if ( $display_cat || $display_date ) : ?>
									<div class="post-list-meta<?php if ( $display_cat ) { ?> has-cat<?php } ?>">
									<?php
										$terms        = get_the_terms( get_the_ID(), $taxonomy_2 );
										$accent_color = get_theme_mod( 'accent_color', '#009dee' );
										if ( $terms && ! is_wp_error( $terms ) ) {
											$term_2    = $terms[0]->name;
											$term_id_2 = $terms[0]->term_id;
											$cat_text_color_2 = get_term_meta( $term_id_2, 'cat_text_color', '#fff' );
											$cat_bg_color_2   = get_term_meta( $term_id_2, 'cat_bg_color', $accent_color );
										}
										if ( $display_cat ) {
											if( $cat_text_color_2 || $cat_bg_color_2 ) {
											echo '<span class="post-list-meta__cat cat-' . $term_id_2 . '" style="background-color:' . $cat_bg_color_2 . '; color:' . $cat_text_color_2 . ';">' . $term_2 . '</span>' . "\n";
											} else {
											echo '<span class="post-list-meta__cat cat-' . $term_id_2 . '">' . $term_2 . '</span>' . "\n";
											}
										}
									?>
									<?php if ( $display_date ) : ?>
									<time class="date published" style="color: <?php echo esc_attr( $instance['meta_date_color'] ); ?>;" datetime="<?php echo esc_attr( get_the_time( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
									<?php endif; ?>
									</div>
								<?php endif; ?>
								<p class="ellipsis post-list__title" style="color: <?php echo esc_attr( $instance['list_title_color'] ); ?>;">
									<?php
										if ( post_password_required() ) {
											echo '<i class="icon-lock"></i>';
										}
										the_title();
									?>
								</p>
							</a>
						</li>
						<?php endwhile; wp_reset_postdata(); ?>
						</ul>
					</div><!--/.col-6-->
					<?php endif; ?>
					</div><!--/.row-wrapper-->
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
			'title'            => '',
			'sub_title'        => '',
			'lead'             => '',
			'col_1_title'      => '',
			'col_1'            => 2,
			'cat_id_1'         => '',
			'term_id_1'        => '',
			'term_id_2'        => '',
			'col_2_title'      => '',
			'col_2'            => 1,
			'cat_id_2'         => '',
			'term_id_3'        => '',
			'term_id_4'        => '',
			'header_center'    => '',
			'lead_left'        => '',
			'content_width'    => 'normal',
			'section_padding'  => 'normal',
			'show_number'      => 5,
			'display_cat'      => '',
			'display_date'     => '',
			'active_bg_color'  => '',
			'bg_color'         => '#ffffff',
			'title_color'      => '#333333',
			'sub_title_color'  => '#484848',
			'lead_color'       => '#333333',
			'cat_title_color'  => '#333333',
			'meta_date_color'  => '#484848',
			'list_title_color' => '#484848',
			'btn_bg'           => '',
		);
		$instance         = wp_parse_args( (array) $instance, $defaults );
		$title            = ( $instance['title'] );
		$sub_title        = ( $instance['sub_title'] );
		$lead             = ( $instance['lead'] );
		$col_1_title      = ( $instance['col_1_title'] );
		$col_1            = ( $instance['col_1'] );
		$cat_id_1         = ( $instance['cat_id_1'] );
		$term_id_1        = ( $instance['term_id_1'] );
		$term_id_2        = ( $instance['term_id_2'] );
		$col_2_title      = ( $instance['col_2_title'] );
		$col_2            = ( $instance['col_2'] );
		$term_id_2        = ( $instance['cat_id_2'] );
		$term_id_3        = ( $instance['term_id_3'] );
		$term_id_4        = ( $instance['term_id_4'] );
		$show_number      = ( $instance['show_number'] );
		$display_cat      = ( $instance['display_cat'] );
		$display_date     = ( $instance['display_date'] );
		$header_center    = ( $instance['header_center'] );
		$lead_left        = ( $instance['lead_left'] );
		$content_width    = ( $instance['content_width'] );
		$section_padding  = ( $instance['section_padding'] );
		$active_bg_color  = ( $instance['active_bg_color'] );
		$bg_color         = ( $instance['bg_color'] );
		$title_color      = ( $instance['title_color'] );
		$sub_title_color  = ( $instance['sub_title_color'] );
		$lead_color       = ( $instance['lead_color'] );
		$cat_title_color  = ( $instance['cat_title_color'] );
		$meta_date_color  = ( $instance['meta_date_color'] );
		$list_title_color = ( $instance['list_title_color'] );
		$btn_bg           = ( $instance['btn_bg'] );
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
				<?php _e( 'サブタイトル', 'emanon-premium' ); ?></label>
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
			><?php echo esc_textarea( $instance['lead'] ); ?></textarea>
		</p>

		<hr>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'col_1_title' ) ); ?>">
			<?php _e( 'タイトル［左］','emanon-premium' ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'col_1_title' ); ?>"
				id="<?php echo $this->get_field_id( 'col_1_title' ); ?>"
				class="widefat"
				value="<?php echo $col_1_title; ?>"
			>
		</p>

		<p>
			<?php
				if ( get_theme_mod( 'add_news' ) && get_theme_mod( 'seminar' ) ) {
					$article_type_1 = [
						'2'  => __( '投稿', 'emanon-premium' ),
						'3'  => __( 'カテゴリー', 'emanon-premium' ),
						'4'  => __( 'ニュース', 'emanon-premium' ),
						'5'  => __( 'セミナー', 'emanon-premium' ),
					];
				} elseif ( get_theme_mod( 'add_news' ) && ! get_theme_mod( 'seminar' ) ) {
					$article_type_1 = [
						'2'  => __( '投稿', 'emanon-premium' ),
						'3'  => __( 'カテゴリー', 'emanon-premium' ),
						'4'  => __( 'ニュース', 'emanon-premium' ),
					];
				} elseif ( ! get_theme_mod( 'add_news' ) && ! get_theme_mod( 'seminar' ) ) {
					$article_type_1 = [
						'2'  => __( '投稿', 'emanon-premium' ),
						'3'  => __( 'カテゴリー', 'emanon-premium' ),
					];
				}
			?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'col_1' ) ); ?>"><?php _e( '記事の種類', 'emanon-premium' ); ?></label><br>
			<select
				name="<?php echo esc_attr( $this->get_field_name( 'col_1' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( 'col_1' ) ); ?>"
				class="widefat"
			>
			<?php foreach ( $article_type_1 as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['col_1'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
			</select>
		</p>

		<small class="notes"><span class="red">※</span><?php _e( '記事を絞り込み表示する場合、記事の種類に合わせてカテゴリーを選択します。', 'emanon-premium' ); ?></small>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_id_1' ); ?>">
			<?php
				_e( 'カテゴリー［投稿］', 'emanon-premium' );
				$defaults  =  array(
				'show_option_all' =>  __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
				'show_count'      => true,
				'taxonomy'        => 'category',
				'name'            => esc_attr( $this->get_field_name( 'cat_id_1' ) ),
				'selected' => absint( $term_id_1 ),
				);
				wp_dropdown_categories( $defaults );
			?>
			</label>
		</p>

	<?php if ( get_theme_mod( 'add_news' ) ): ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'term_id_1' ); ?>">
			<?php
				_e( 'カテゴリー［ニュース］', 'emanon-premium' );
				$defaults =  array(
				'show_option_all' => __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
				'show_num'        => true,
				'taxonomy'        => 'news-cat',
				'name'            => esc_attr( $this->get_field_name( 'term_id_1' ) ),
				'selected'        => absint( $term_id_1 ),
				);
				wp_dropdown_categories( $defaults );
			?>
			</label>
		</p>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'add_seminar' ) ): ?>
			<p>
			<label for="<?php echo $this->get_field_id( 'term_id_2' ); ?>">
			<?php
				_e( 'カテゴリー［セミナー］', 'emanon-premium' );
				$defaults =  array(
				'show_option_all' =>  __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
				'show_num'        => true,
				'taxonomy'        => 'seminar-cat',
				'name'            => esc_attr( $this->get_field_name( 'term_id_2' ) ),
				'selected'        => absint( $term_id_2 ),
				);
				wp_dropdown_categories( $defaults );
			?>
			</label>
		</p>
	<?php endif; ?>

		<hr>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'col_2_title' ) ); ?>">
			<?php _e( 'タイトル［右］','emanon-premium' ); ?>
			</label><br>
			<input
				type="text"
				name="<?php echo $this->get_field_name( 'col_2_title' ); ?>"
				id="<?php echo $this->get_field_id( 'col_2_title' ); ?>"
				class="widefat"
				value="<?php echo $col_2_title; ?>"
			>
		</p>

		<p>
			<?php
			if ( get_theme_mod( 'add_news' ) && get_theme_mod( 'seminar' ) ) {
					$article_type_2 = [
						'1'  => __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
						'2'  => __( '投稿', 'emanon-premium' ),
						'3'  => __( 'カテゴリー', 'emanon-premium' ),
						'4'  => __( 'ニュース', 'emanon-premium' ),
						'5'  => __( 'セミナー', 'emanon-premium' ),
					];
				} elseif ( get_theme_mod( 'add_news' ) && ! get_theme_mod( 'seminar' ) ) {
					$article_type_2 = [
						'1'  => __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
						'2'  => __( '投稿', 'emanon-premium' ),
						'3'  => __( 'カテゴリー', 'emanon-premium' ),
						'4'  => __( 'ニュース', 'emanon-premium' ),
					];
				} elseif ( ! get_theme_mod( 'add_news' ) && ! get_theme_mod( 'seminar' ) ) {
					$article_type_2 = [
						'1'  => __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
						'2'  => __( '投稿', 'emanon-premium' ),
						'3'  => __( 'カテゴリー', 'emanon-premium' ),
					];
				}
			?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'col_2' ) ); ?>"><?php _e( '記事の種類', 'emanon-premium' ); ?></label><br>
			<select
					name="<?php echo esc_attr( $this->get_field_name( 'col_2' ) ); ?>"
					id="<?php echo esc_attr( $this->get_field_id( 'col_2' ) ); ?>"
					class="widefat"
			>
			<?php foreach ( $article_type_2 as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['col_2'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
			</select>
		</p>

		<small class="notes"><span class="red">※</span><?php _e( '記事を絞り込み表示する場合、記事の種類に合わせてカテゴリーを選択します。', 'emanon-premium' ); ?></small>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_id_2'); ?>">
			<?php
				_e( 'カテゴリー［投稿］', 'emanon-premium' );
				$defaults  =  array(
				'show_option_all' =>  __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
				'show_count'      => true,
				'taxonomy'        => 'category',
				'name'            => esc_attr( $this->get_field_name( 'cat_id_2' ) ),
				'selected' => absint( $term_id_2 ),
				);
				wp_dropdown_categories( $defaults );
			?>
			</label>
		</p>

	<?php if ( get_theme_mod( 'add_news' ) ): ?>
			<p>
			<label for="<?php echo $this->get_field_id( 'term_id_3' ); ?>">
			<?php
				_e( 'カテゴリー［ニュース］', 'emanon-premium' );
				$defaults =  array(
				'show_option_all' => __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
				'show_count'      => true,
				'taxonomy'        => 'news-cat',
				'name'            => esc_attr( $this->get_field_name( 'term_id_3' ) ),
				'selected'        => absint( $term_id_3 ),
				);
				wp_dropdown_categories( $defaults );
			?>
			</label>
		</p>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'add_seminar' ) ): ?>
			<p>
			<label for="<?php echo $this->get_field_id( 'term_id_4' ); ?>">
			<?php
				_e( 'カテゴリー［セミナー］', 'emanon-premium' );
				$defaults =  array(
				'show_option_all' => __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
				'show_count'      => true,
				'taxonomy'        => 'seminar-cat',
				'name'            => esc_attr( $this->get_field_name( 'term_id_4' ) ),
				'selected'        => absint( $term_id_4 ),
				);
				wp_dropdown_categories( $defaults );
			?>
			</label>
		</p>
	<?php endif; ?>

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

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'display_cat' ); ?>"
				id="<?php echo $this->get_field_id( 'display_cat' ); ?>"
				class="checkbox"
				<?php checked( $display_cat ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'display_cat' ); ?>"><?php _e( 'カテゴリー名の表示','emanon-premium' ); ?></label>
		</p>

		<p>
			<input
				type="checkbox"
				name="<?php echo $this->get_field_name( 'display_date' ); ?>"
				id="<?php echo $this->get_field_id( 'display_date' ); ?>"
				class="checkbox"
				<?php checked( $display_date ); ?>
			/>
			<label for="<?php echo $this->get_field_id( 'display_date' ); ?>"><?php _e( '公開日の表示','emanon-premium' ); ?></label>
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
			<label for="<?php echo $this->get_field_id( 'cat_title_color' ); ?>">
				<?php _e( 'タイトル［左］・タイトル［右］','emanon-premium' ); ?>
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
			<label for="<?php echo $this->get_field_id( 'meta_date_color' ); ?>">
				<?php _e( '公開日','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'meta_date_color' ); ?>"
			id="<?php echo $this->get_field_id( 'meta_date_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#484848"
			value="<?php echo esc_attr( $meta_date_color ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'list_title_color' ); ?>">
				<?php _e( 'リスト タイトル','emanon-premium' ); ?>
			</label><br>
			<input
			type="text"
			name="<?php echo $this->get_field_name( 'list_title_color' ); ?>"
			id="<?php echo $this->get_field_id( 'list_title_color' ); ?>"
			class="emanon_color_field_input"
			data-default-color="#484848"
			value="<?php echo esc_attr( $list_title_color ); ?>"
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
		$instance['col_1_title']      = esc_html( $new_instance['col_1_title'] );
		$instance['col_1']            = absint( $new_instance['col_1'] );
		$instance['cat_id_1']         = absint( $new_instance['cat_id_1'] );
		$instance['term_id_1']        = absint( $new_instance['term_id_1'] );
		$instance['term_id_2']        = absint( $new_instance['term_id_2'] );
		$instance['col_2_title']      = esc_html( $new_instance['col_2_title'] );
		$instance['col_2']            = absint( $new_instance['col_2'] );
		$instance['cat_id_2']         = absint( $new_instance['cat_id_2'] );
		$instance['term_id_3']        = absint( $new_instance['term_id_3'] );
		$instance['term_id_4']        = absint( $new_instance['term_id_4'] );
		$instance['header_center']    = (bool) $new_instance['header_center'];
		$instance['lead_left']        = (bool) $new_instance['lead_left'];
		$instance['content_width']    = esc_attr( $new_instance['content_width'] );
		$instance['section_padding']  = esc_attr( $new_instance['section_padding'] );
		$instance['show_number']      = absint( $new_instance['show_number'] );
		$instance['display_cat']      = (bool) $new_instance['display_cat'];
		$instance['display_date']     = (bool) $new_instance['display_date'];
		$instance['active_bg_color']  = (bool) $new_instance['active_bg_color'];
		$instance['bg_color']         = sanitize_hex_color( $new_instance['bg_color'] );
		$instance['title_color']      = sanitize_hex_color( $new_instance['title_color'] );
		$instance['sub_title_color']  = sanitize_hex_color( $new_instance['sub_title_color'] );
		$instance['lead_color']       = sanitize_hex_color( $new_instance['lead_color'] );
		$instance['cat_title_color']  = sanitize_hex_color( $new_instance['cat_title_color'] );
		$instance['meta_date_color']  = sanitize_hex_color( $new_instance['meta_date_color'] );
		$instance['list_title_color'] = sanitize_hex_color( $new_instance['list_title_color'] );
		$instance['btn_bg']           = (bool) $new_instance['btn_bg'];
		return $instance;
	}
} // class Post List Section Widget

// Widgetの登録
add_action( 'widgets_init', 'emanon_register_post_list_section_widget' );
	function emanon_register_post_list_section_widget() {
		register_widget( 'Post_List_Section_Widget' );
}