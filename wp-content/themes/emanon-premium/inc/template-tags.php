<?php
/**
 * テンプレート用タグ
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
 
/**
 * CSS圧縮
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_css_minify' ) ) {
	function emanon_css_minify( $theme_css ) {
		// コメント削除
		$theme_css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $theme_css );
		// タブ削除
		$theme_css = str_replace( array("\r\n", "\r", "\n", "\t" ), '', $theme_css );
		// 空白削除
		$theme_css = str_replace( array( '  ', '    ', '    '), '', $theme_css );
		$theme_css = str_replace( ': ', ':', $theme_css );
		$theme_css = str_replace( ' :', ':', $theme_css );
		$theme_css = str_replace( ' }', '}', $theme_css );
		$theme_css = str_replace( '} ', '}', $theme_css);
		return $theme_css;
	}
}

/**
 * キャッシュtemplate
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_cached_template_part' ) ) {
	function get_emanon_cached_template_part( $slug, $cache_key = '' ) {

		$transient_id = $cache_key;
		$value = get_transient( $transient_id );

		if ( is_customize_preview() && $cache_key ) {//外観＞カスタマイズでプレビュー中の表示

			delete_transient( $transient_id );
			echo get_template_part( $slug );

		} elseif ( $cache_key ) {

			if ( false === $value ) {//キャッシュが存在しない場合の処理

			ob_start();
			get_template_part( $slug );
			$value = ob_get_contents();
			ob_end_clean();

			$expiration = 30 * DAY_IN_SECONDS;//30日間キャッシュ
			set_transient( $transient_id, $value, $expiration );

			}

		echo $value;
		return true;
	
		} else {
	
			echo get_template_part( $slug );
			return;
	
		}
	}
}

/**
 * 現在のスラッグ取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_current_slug' ) ) {
	function get_emanon_current_slug() {
		$home_url = home_url('/');
		$protocol = is_ssl() ? 'https' : 'http';
		$url      = $protocol . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		$slug     = str_replace( $home_url , '' , $url );
		return $slug;
	}
}

/**
 * 現在のURL取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_current_url' ) ) {
	function get_emanon_current_url() {
		$home_url = home_url('/');
		$protocol = is_ssl() ? 'https' : 'http';
		$url      = $protocol . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		return $url;
	}
}

/**
 * 現在のページタイトル取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_current_title' ) ) {
	function get_emanon_current_title(){
		if ( is_singular() ) {
			$title = get_the_title();
		} else {
			$title = wp_get_document_title();
		}
		return $title;
	}
}

/**
 * ページタイトルの取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_title' ) ) {
	function get_emanon_title() {
		$front_page_title     = get_theme_mod( 'front_page_title' );
		$post_title           = get_theme_mod( 'post_title' );
		$page_title           = get_theme_mod( 'page_title' );
		$archive_title        = get_theme_mod( 'archive_title' );
		$search_page_title    = get_theme_mod( 'search_page_title' );
		$not_found_page_title = get_theme_mod( 'not_found_page_title' );
		$sep_type             = get_theme_mod( 'title_separator' );
	
		if ( 'pipe' === $sep_type ) {
			$separator = ' | ';
		} elseif ( 'hyphen' === $sep_type ) {
			$separator = ' - ';
		}
	
		if ( 'site_title_tagline' === $front_page_title && get_bloginfo( 'description' ) ) {
			$catchy = $separator . get_bloginfo( 'description' );
		} else	 {
			$catchy = '';
		}
	
		if ( 'post_title_site_title' === $post_title ) {
			$post_site_name = $separator . get_bloginfo( 'name' );
		} else	 {
			$post_site_name = '';
		}
	
		if ( 'page_title_site_title' === $page_title ) {
			$page_site_name = $separator . get_bloginfo( 'name' );
		} else	 {
			$page_site_name = '';
		}
	
		if ( 'archive_title_site_title' === $archive_title ) {
			$archive_site_name = $separator . get_bloginfo( 'name' );
		} else	 {
			$archive_site_name = '';
		}
	
		if ( 'search_page_title_site_title' === $search_page_title ) {
			$search_page_site_name = $separator . get_bloginfo( 'name' );
		} else	 {
			$search_page_site_name = '';
		}
	
		if ( 'not_found_page_title_site_title' === $not_found_page_title ) {
			$not_found_page_site_name = $separator . get_bloginfo( 'name' );
		} else	 {
			$not_found_page_site_name = '';
		}
	
		$title = get_emanon_current_title();
	
		if ( is_front_page() ) {
			$title = get_bloginfo( 'name' ) . $catchy;
		} elseif ( is_home() ) {
			$title = $title . $page_site_name;
		} elseif ( is_singular() ) {
			$title = $title . $post_site_name;
		} elseif ( is_post_type_archive() ) {
			$title = $title . $archive_site_name;
		} elseif ( is_category() ) {
			$title = $title . $archive_site_name;
		} elseif ( is_tax( ) ) {
			$title = $title . $archive_site_name;
		} elseif ( is_tag() ) {
			$title = $title . $archive_site_name;
		} elseif ( is_year() ) {
			$title = $title . $separator . __( 'アーカイブリスト', 'emanon-premium' ) . $archive_site_name;
		} elseif ( is_month( ) ) {
			$title = $title . $separator .__( 'アーカイブリスト', 'emanon-premium' ) . $archive_site_name;
		} elseif ( is_date() ) {
			$title = $title . $separator . __( 'アーカイブリスト', 'emanon-premium' ) . $archive_site_name;
		} elseif ( is_author() ) {
			$title = get_the_author_meta( 'display_name', get_query_var( 'author' ) ) . __( 'の投稿記事', 'emanon-premium' ) . $archive_site_name;
		} elseif ( is_search() ) {
			$title = get_search_query() . $separator . __( '検索結果', 'emanon-premium' ) . $search_page_site_name;
		} elseif ( is_404() ) {
			$title = $title . $not_found_page_site_name;
		}
	
		return ( strip_tags( $title ) );
	
	}
}

/**
 * アイキャッチ取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_post_thumbnail' ) ) {
	function get_emanon_post_thumbnail( $size ) {
		$thumbnail_id  = get_post_thumbnail_id();
		$thumbnail_img = wp_get_attachment_image_src( $thumbnail_id, $size );
		$thumbnail_src = $thumbnail_img[0];
		$thumbnail_alt = get_the_title();
		return '<img src="'.$thumbnail_src.'" alt="'.$thumbnail_alt.'">';
	}
}

if ( ! function_exists( 'get_emanon_post_thumbnail_url' ) ) {
	function get_emanon_post_thumbnail_url( $size ) {
		$thumbnail_id  = get_post_thumbnail_id();
		$thumbnail_img = wp_get_attachment_image_src( $thumbnail_id, $size );
		$thumbnail_src = $thumbnail_img[0];
		return $thumbnail_src;
	}
}

/**
 * コメント欄の表示カスタマイズ
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_comment' ) ) {
	function emanon_comment( $comment, $args, $depth ) {
		if ( 'div' === $args['style'] ) {
				$tag       = 'div';
				$add_below = 'comment';
		} else {
				$tag       = 'li';
				$add_below = 'div-comment';
		}
		$rating      = get_comment_meta( $comment->comment_ID, 'rating', true );
		$rating_args = array(
			'rating' => $rating,
			'max'    => 5,
		);
		$form_rating = get_theme_mod( 'display_comment_form_rating' );
	?>
		<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
				<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 120 ); ?>
		</div>
		<div class="comment-meta">
			<span class="comment-reply">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => __( '返信','emanon-premium' ) ) ) ); ?>
			</span>
			<?php
					printf( __( '<cite>%1$s</cite><span class="comment-date">%2$s at %3$s</span>', 'emanon-premium' ),
					get_comment_author_link(),
					get_comment_date(),
					get_comment_time()
				);
			?>
		</div>
		<?php
			if ( $form_rating ) {
				echo ( get_emanon_star_rating( $rating_args ) );
			}
		?>
		<div class="comment-text">
		<?php comment_text() ?>
		</div>
		<div class="comment-edit">
			<?php edit_comment_link( esc_html__( '【編集】','emanon-premium' ) ); ?>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
	<?php
	}
}

/**
 * コメント欄に評価項目を追加
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'add_comment_meta_values' ) ) {
	function add_comment_meta_values( $comment_id ) {
		if ( isset($_POST['rating']) ) {
		$rating = wp_filter_nohtml_kses($_POST['rating']);
		add_comment_meta( $comment_id, 'rating', $rating, false );
		}
	}
	add_action( 'comment_post', 'add_comment_meta_values', 1 );
}

/**
 * Star Rating
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_star_rating' ) ) {
	function get_emanon_star_rating( $args = array() ) {
		$defaults  = array(
			'rating' => 0,
			'max'    => 5,
			
		);
	
		$parsed_args = wp_parse_args( $args, $defaults );
	
		$rating      = (float) str_replace( ',', '.', $parsed_args['rating'] );
	
		$full_stars  = floor( $rating );
		$half_stars  = ceil( $rating - $full_stars );
		$empty_stars = $parsed_args['max'] - $full_stars - $half_stars;
	
		$output      = '<span class="star-rating">';
		$output     .= str_repeat( '<i class="icon-star-full"></i>', $full_stars );
		$output     .= str_repeat( '<i class="icon-star-half"></i>', $half_stars );
		$output     .= str_repeat( '<i class="icon-star-empty"></i>', $empty_stars );
		$output     .= '</span>';
	
		return $output;
	}
}

/**
 * Descriptionの取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_description' ) ) {
	function get_emanon_description() {
		global $wp_query, $page, $paged;
		$post                  = $wp_query->get_queried_object();
		$meta_post_description = post_custom( 'emanon_meta_description' );
		$top_description       = get_theme_mod( 'top_description' );
		$sep_type              = get_theme_mod( 'title_separator' );
	
		if ( 'pipe' === $sep_type ) {
			$separator = ' | ';
		} elseif ( 'hyphen' === $sep_type ) {
			$separator = ' - ';
		}
	
		if ( is_front_page() ) {
			if ( $top_description ) {
				$top_description = get_theme_mod( 'top_description' );
			} else {
				$top_description = get_bloginfo( 'description' );
			}
			$resume = $top_description;
			if ( is_paged() ) {
				$resume = trim( get_bloginfo( 'name' ) ) . $separator . __( '記事リスト', 'emanon-premium' ) ." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_home() ) {
				$resume = __( '記事リスト', 'emanon-premium' );
				if ( is_paged() ) {
				$resume = __( '記事リスト', 'emanon-premium' ) ." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_singular() ) {
			if ( ! empty( $post->post_password ) ) {
				$resume = __( 'この投稿はパスワードで保護されているためページの概要を表示できません。', 'emanon-premium' );
				} elseif ( $meta_post_description ) {
					$resume = $meta_post_description;
				} else {
					$content = $post->post_content;
					if( '' !== strpos( $content, '<!--nextpage-->') ) {
						$num = $page ? $page - 1 : 0;
						$split_contents = explode( '<!--nextpage-->', $content );
						$content = $split_contents[$num];
					}
					$resume = mb_substr( strip_tags( $content ), 0, 120 );
				}
		} elseif ( is_post_type_archive( 'news' ) ) {
				$label  = get_post_type_object( get_post_type() )->label;
				$resume = get_theme_mod( 'news_taxonomy_meta_description' );
				if ( empty( $resume ) ) {
					$resume = $label . $separator . __( 'アーカイブリスト', 'emanon-premium' );
				}
				if ( is_paged() ) {
					$resume = $label . $separator . __( 'アーカイブリスト', 'emanon-premium' )." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_post_type_archive( 'seminar' ) ) {
				$label  = get_post_type_object( get_post_type() )->label;
				$resume = get_theme_mod( 'seminar_taxonomy_meta_description' );
				if ( empty( $resume ) ) {
					$resume = $label . $separator . __( 'アーカイブリスト', 'emanon-premium' );
				}
				if ( is_paged() ) {
					$resume = $label . $separator . __( 'アーカイブリスト', 'emanon-premium' )." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_post_type_archive( 'request' ) ) {
				$label  = get_post_type_object( get_post_type() )->label;
				$resume = get_theme_mod( 'request_taxonomy_meta_description' );
				if ( empty( $resume ) ) {
					$resume = $label . $separator . __( 'アーカイブリスト', 'emanon-premium' );
				}
				if ( is_paged() ) {
					$resume = $label . $separator . __( 'アーカイブリスト', 'emanon-premium' )." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_category() ) {
				$term_id = get_queried_object_id();
				$resume  = get_term_meta( $term_id, 'cat_meta_description', true );
				if ( empty( $resume ) ) {
					$resume = single_cat_title('','') . $separator . __( 'アーカイブリスト', 'emanon-premium' );
				}
				if ( is_paged() ) {
					$resume = single_cat_title('','') . $separator . __( 'アーカイブリスト', 'emanon-premium' )." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_tax( 'news-cat' ) ) {
				$term_id = get_queried_object_id();
				$resume = get_term_meta( $term_id, 'cat_meta_description', true );
				if ( empty( $resume ) ) {
					$resume = single_term_title('','') . $separator . __( 'アーカイブリスト', 'emanon-premium' );
				}
				if ( is_paged() ) {
					$resume = single_term_title('','') . $separator . __( 'アーカイブリスト', 'emanon-premium' )." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_tax( 'seminar-cat' ) ) {
				$term_id = get_queried_object_id();
				$resume  = get_term_meta( $term_id, 'cat_meta_description', true );
				if ( empty( $resume ) ) {
					$resume = single_term_title('','') . $separator . __( 'アーカイブリスト', 'emanon-premium' );
				}
				if ( is_paged() ) {
					$resume = single_term_title('','') . $separator . __( 'アーカイブリスト', 'emanon-premium' )." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_tax( 'request-cat' ) ) {
				$term_id = get_queried_object_id();
				$resume  = get_term_meta( $term_id, 'cat_meta_description', true );
				if ( empty( $resume ) ) {
					$resume = single_term_title('','') . $separator . __( 'アーカイブリスト', 'emanon-premium' );
				}
				if ( is_paged() ) {
					$resume = single_term_title('','') . $separator . __( 'アーカイブリスト', 'emanon-premium' )." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif( is_tag( ) ) {
				$resume = trim( strip_tags( tag_description() ) );
				if ( empty( $resume ) ) {
					$resume = single_tag_title('','') . $separator . __( 'アーカイブリスト', 'emanon-premium' );
				}
				if ( is_paged() ) {
					$resume = single_tag_title('','') . $separator .__( 'アーカイブリスト', 'emanon-premium' )." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_year() ) {
				$resume = get_the_time( 'Y' ) . __( '年', 'emanon-premium' ) . $separator . __( 'アーカイブリスト', 'emanon-premium' );
				if ( get_query_var( 'paged' ) > 1 ) {
					$resume = get_the_time( 'Y' ) . __( '年', 'emanon-premium' ) . $separator . __( 'アーカイブリスト', 'emanon-premium' )." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_month( ) ) {
				$resume = get_the_time( 'Y' ) . __( '年', 'emanon-premium' ) . get_the_time( 'm' ) . __( '月', 'emanon-premium' ) . $separator . __( 'アーカイブリスト', 'emanon-premium' );
				if ( is_paged() ) {
					$resume = get_the_time( 'Y' ) . __( '年', 'emanon-premium' ) . get_the_time( 'm' ) . __( '月', 'emanon-premium' ) . $separator . __( 'アーカイブリスト', 'emanon-premium' )." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_date() ) {
				$resume = get_the_time( 'Y' ) . __( '年', 'emanon-premium' ) . get_the_time( 'm' ) . __( '月', 'emanon-premium' ) . get_the_time( 'd' ) . __( '日', 'emanon-premium' ). $separator . __( 'アーカイブリスト', 'emanon-premium' );
				if ( is_paged() ) {
					$resume = get_the_time( 'Y' ) . __( '年', 'emanon-premium' ) . get_the_time( 'm' ) . __( '月', 'emanon-premium' ) . get_the_time( 'd' ) . __( '日', 'emanon-premium' ). $separator .__( 'アーカイブリスト', 'emanon-premium' )." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_author() ) {
				$resume = get_the_author_meta( 'user_description');
				if ( is_paged() ) {
					$resume = get_the_author_meta( 'display_name', get_query_var( 'author' ) ) . $separator . __( 'アーカイブリスト', 'emanon-premium' )." - ". sprintf( __( '%sページ目', 'emanon-premium' ), max( $paged, $page ) );
				}
		} elseif ( is_search() ) {
				$resume = get_search_query() . $separator . __( '検索結果の一覧', 'emanon-premium' );
		} elseif ( is_404() ) {
				$resume = __( '残念ながらこちらにはページはありません。サイトのURLをご確認いただくか検索をお試しください。', 'emanon-premium' );
		} // End if()
				$resume = str_replace( "\n", "", $resume );
				$resume = strip_shortcodes( $resume );
		return $resume;
	}
}

if ( ! function_exists( 'emanon_description' ) ) {
	function emanon_description() {
		echo esc_html( strip_tags( get_emanon_description() ) );
	}
}

/**
 * OGP typeの取得と表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_ogp_type' ) ) {
	function get_emanon_ogp_type() {
		if ( is_front_page() ) {
			$type = 'website';
		} else {
			$type = 'article';
		}
		return $type;
	}
}

if ( ! function_exists( 'emanon_ogp_type' ) ) {
	function emanon_ogp_type() {
		echo get_emanon_ogp_type();
	}
}

/**
 * Facebook opg用 prefix属性の表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_ogp_prefix' ) ) {
	function emanon_ogp_prefix() {
		$enable_ogp = get_theme_mod( 'enable_facebook_ogp' );
		$ogp_prefix = "";
	
		if ( $enable_ogp ) {
			$ogp_prefix = ' prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# ' . get_emanon_ogp_type() . ': https://ogp.me/ns/' . get_emanon_ogp_type() . '#"';
		}
		echo $ogp_prefix;
	}
}

/**
 * OGP URLの表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_ogp_url' ) ) {
	function emanon_ogp_url() {
		echo esc_url( get_emanon_current_url() );
	}
}

/**
 * OGP titleの表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_ogp_title' ) ) {
	function emanon_ogp_title() {
		echo esc_html( get_emanon_title() );
	}
}

/**
 * OGP画像の表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_ogp_image' ) ) {
	function emanon_ogp_image() {
		$no_image           = T_DIRE_URI . '/assets/images/no-img/1200_675.png';
		$default_ogp_image   = get_theme_mod( 'default_ogp_image', '' );
		if ( $default_ogp_image ) {
			$default_image = $default_ogp_image;
		} else {
			$default_image = $no_image;
		}
		$thumbnail_image_id = get_post_thumbnail_id();
		$thumbnail_image    = wp_get_attachment_image_src( $thumbnail_image_id, 'full');
		$home_image         = get_theme_mod( 'home_heade_image_pc', '' );
		$term_id            = get_queried_object_id();
		$term_image         = get_term_meta( $term_id, 'cat_image_pc', true );
		$seminar_image      = get_theme_mod( 'seminar_heade_image_pc', '' );
		$request_image      = get_theme_mod( 'request_heade_image_pc', '' );
		$news_image         = get_theme_mod( 'news_heade_image_pc', '' );
	
		if ( is_singular() ) {
			if ( has_post_thumbnail() ) {
				$ogp_image = $thumbnail_image[0];
			} elseif ( $default_image ) {
				$ogp_image = $default_image;
			}
		} elseif ( is_category() && $term_image || is_tax() && $term_image ) {
				$ogp_image = $term_image;
		} elseif ( is_post_type_archive( 'news' ) && $news_image ) {
				$ogp_image = $news_image;
		} elseif ( is_post_type_archive( 'seminar' ) && $seminar_image ) {
				$ogp_image = $seminar_image;
		} elseif ( is_post_type_archive( 'request' ) && $request_image ) {
				$ogp_image = $request_image;
		} elseif ( is_home() && $home_image ) {
				$ogp_image = $home_image;
		} else {
				$ogp_image = $default_image;
		}
	
		echo esc_url( $ogp_image );
	}
}

/**
 * Facebook Application IDの取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_facebook_app_id' ) ) {
	function get_emanon_facebook_app_id() {
		$facebook_app_id = get_theme_mod( 'facebook_app_id', '' );
		return trim( $facebook_app_id );
	}
}

/**
 * Facebook Application IDの表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_facebook_app_id' ) ) {
	function emanon_facebook_app_id() {
		echo esc_html( get_emanon_facebook_app_id() );
	}
}

/**
 * Twitterカードの表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_twitter_card_type' ) ) {
	function emanon_twitter_card_type() {
		$twitter_card_type = get_theme_mod( 'twitter_card_type', 'summary' );
		echo esc_attr( strip_tags( $twitter_card_type ) );
	}
}

/**
 * サブタイトル
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_subtitle' ) ) {
	function emanon_subtitle() {
		$subtitle = post_custom( 'emanon_subtitle' );
		if ( 0 == strlen( $subtitle ) )
		return;
		echo '<span class="article-title__sub">' . esc_html( $subtitle ) . '</span>' . "\n";
	}
}

/**
 * ピックアップスライダー カテゴリーの表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_header_pickup_slider_category' ) ) {
	function emanon_header_pickup_slider_category() {
		$category = get_the_category();
		if( isset ( $category ) ) {
			$cat      = $category[0];
			$cat_id   = $category[0]->cat_ID;
			$cat_name = $cat->cat_name;
		}
		echo '<div class="slider-cat cat-' . $cat_id . '">— ' . $cat_name .' —</div>' . "\n";
	}
}

/**
 * セミナー情報
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_seminar_info' ) ) {
	function emanon_seminar_info() {
		$title        = post_custom( 'emanon_seminar_title' );
		$hall_name    = post_custom( 'emanon_hall_name' );
		$hall_address = post_custom( 'emanon_hall_address' );
		$date         = post_custom( 'emanon_seminar_date' );
		$time         = post_custom( 'emanon_seminar_time' );
		$fee          = post_custom( 'emanon_seminar_fee' );
		$capacity     = post_custom( 'emanon_seminar_capacity' );
		$reception    = post_custom( 'emanon_seminar_reception' );
		?>
	
	<table class="seminar-info">
		<?php if ( $title ): ?>
		<tr>
			<th class="seminar-info__item"><?php _e( 'セミナー名', 'emanon-premium' ); ?></th>
			<td><?php echo esc_html( $title ); ?></td>
		</tr>
		<?php endif; ?>
		<?php if ( $hall_name ): ?>
		<tr>
			<th class="seminar-info__item"><?php _e( '会場名', 'emanon-premium' ); ?></th>
			<td><?php echo esc_html( $hall_name ); ?></td>
		</tr>
		<?php endif; ?>
		<?php if ( $hall_address ): ?>
		<tr>
			<th class="seminar-info__item"><?php _e( '会場住所', 'emanon-premium' ); ?></th>
			<td><?php echo nl2br( esc_html( $hall_address ) ); ?></td>
		</tr>
		<?php endif; ?>
		<?php if ( $date ): ?>
		<tr>
			<th class="seminar-info__item"><?php _e( '開催日', 'emanon-premium' ); ?></th>
			<td><?php echo esc_html( $date ); ?></td>
		</tr>
		<?php endif; ?>
		<?php if ( $time ): ?>
		<tr>
			<th class="seminar-info__item"><?php _e( '開催時間', 'emanon-premium' ); ?></th>
			<td><?php echo esc_html( $time ); ?></td>
		</tr>
		<?php endif; ?>
		<?php if ( $fee ): ?>
		<tr>
			<th class="seminar-info__item"><?php _e( '費用', 'emanon-premium' ); ?></th>
			<td><?php echo esc_html( $fee ); ?></td>
		</tr>
		<?php endif; ?>
		<?php if ( $capacity ): ?>
		<tr>
			<th class="seminar-info__item"><?php _e( '定員', 'emanon-premium' ); ?></th>
			<td><?php echo esc_html( $capacity ); ?></td>
		</tr>
		<?php endif; ?>
	</table>
		<?php
	}
}

/**
 * セミナー開催概要
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_seminar_summary' ) ) {
	function emanon_seminar_summary() {
		$seat_available = post_custom( 'emanon_seminar_seat_available' );
		$warning        = post_custom( 'emanon_seminar_seat_available_warning' );
		$date           = post_custom( 'emanon_seminar_date' );
		$time           = post_custom( 'emanon_seminar_time' );
		$capacity       = post_custom( 'emanon_seminar_capacity' );
		?>
	<div class="seminar-summary u-row u-row-cont-between">
		<?php if ( $seat_available || $date ): ?>
			<?php if ( $date ): ?>
			<div class="seminar-date"><i class="icon-calendar"></i><span class="seminar-date__item"><?php echo esc_html( $date ); ?></span></div>
			<?php endif; ?>
		<?php endif; ?>
		<div class="seminar-seat">
		<?php if ( $capacity ): ?>
		<div class="seminar-seat__capacity"><?php _e( '定員', 'emanon-premium' ); ?><span class="seminar-seat__capacity--item"><?php echo esc_html( $capacity ); ?></span></div>
		<?php endif; ?>
		<?php if ( $seat_available ): ?>
		<div class="seminar-seat__available<?php if ( $warning ) { ?> u-warning-bg<?php } ?>"><?php echo esc_html( $seat_available); ?></div>
		<?php endif; ?>
		</div>
	</div>
		<?php
	}
}

/**
 * セミナー申し込みフォーム
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_seminar_form' ) ) {
	function emanon_seminar_form() {
		$link_text  = post_custom( 'emanon_seminar_link_text' );
		$link_url   = post_custom( 'emanon_seminar_link_url' );
		$microcopy  = post_custom( 'emanon_seminar_microcopy' );
		$short_code = post_custom( 'emanon_seminar_form_short_code' );
		?>
	
	<?php if ( $link_text || $link_url || $short_code ): ?>
	<div class="seminar-form">
		<?php if ( $link_text || $link_url ): ?>
		<div class="seminar-form__btn">
			<a class="c-btn c-btn__main c-btn__m" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_text ); ?></a>
		<div class="seminar-form__microcopy"><p><?php echo esc_html( $microcopy ); ?></p></div>
		</div>
		<?php endif; ?>
		<?php if ( $short_code ): ?>
		<?php echo apply_shortcodes( $short_code ); ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	
		<?php
	}
}

/**
 * カテゴリーページのサブタイトルの表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_category_subtitle' ) ) {
	function emanon_category_subtitle() {
		$term_id       = get_queried_object_id();
		$term_subtitle = get_term_meta( $term_id, 'cat_subtitle', true );
		if ( $term_subtitle ) {
			echo '<span class="archive-title__sub">' . strip_tags( $term_subtitle ) . '</span>';
		}
	}
}

/**
 * カテゴリーページ説明文の取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_archive_description' ) ) {
	function get_emanon_archive_description() {
		$term_id      = get_queried_object_id();
		$category_des = get_term_meta( $term_id, 'cat_description', true );
		$tag_des = tag_description();
	
		if ( is_category() || is_tax() ) {
			$description = $category_des;
		} elseif ( is_tag() ) {
			$description = $tag_des;
		} elseif ( is_author() ) {
			$description = __( '投稿者の記事一覧', 'emanon-premium' );
		} else {
			$description = __( '記事一覧', 'emanon-premium' );
		}
		
		return $description;
	
	}
}

/**
 * カテゴリーページ説明文の表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_archive_description' ) ) {
	function emanon_archive_description() {
		if ( get_emanon_archive_description() ) {
		echo '<div class="archive-description">' . get_emanon_archive_description() . '</div>';
		}
	}
}

/**
 * アイキャッチ画像下のキャプション
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_featured_image_caption' ) ) {
	function emanon_featured_image_caption() {
		$post_caption         = get_theme_mod( 'display_post_thumbnail_caption' );
		$post_news_caption    = get_theme_mod( 'display_post_news_thumbnail_caption' );
		$post_seminar_caption = get_theme_mod( 'display_post_seminar_thumbnail_caption' );
		$post_request_caption = get_theme_mod( 'display_post_request_thumbnail_caption' );
		$page_caption         = get_theme_mod( 'display_page_thumbnail_caption' );
		$caption              = get_post( get_post_thumbnail_id() )->post_excerpt;
		if ( is_singular( 'post' ) && $post_caption && $caption ||
				 is_singular( 'news' ) && $post_news_caption && $caption ||
				 is_singular( 'seminar' ) && $post_seminar_caption && $caption ||
				 is_singular( 'request' ) && $post_request_caption && $caption ||
				 is_page() && $page_caption && $caption ) {
			echo '<div class="thumbnail-caption">' . $caption . '</div>';
		}
	}
}

/**
 * 投稿タグ(カテゴリー)の表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_post_category' ) ) {
	function emanon_post_category() {
		global $post;
	
		if ( is_singular( 'news' ) ) {
			$taxonomy_name = 'news';
			$term_name     = 'news-cat';
		} elseif ( is_singular( 'request' ) ) {
			$taxonomy_name = 'request';
			$term_name     = 'request-cat';
		} elseif ( is_singular( 'seminar' ) ) {
			$taxonomy_name = 'seminar';
			$term_name     = 'seminar-cat';
		} else {
			$taxonomy_name = '';
			$term_name     = '';
		}
	
		$display_category = get_theme_mod( 'display_category', '' );
		$terms            = get_the_terms( $post->ID, $term_name );
	
		if ( $display_category && $terms ) {
		echo '<ul class="meta-category">' . "\n";
			foreach( $terms as $term ) {
				echo '<li class="meta-category__item cat-' . $term->term_id . '"><a href="' . get_term_link( $term->slug, $term_name ) . '">' . $term->name . '</a></li>';
			}
		echo '</ul >' . "\n";
		} elseif ( $display_category ) {
			echo '<ul class="meta-category">' . "\n";
			$cats = $sort = array();
			$post_cats = get_the_category();
			foreach ( $post_cats as $cat ) {
			$layer = count( get_ancestors( $cat->term_id, 'category' ));
			$cats[] = array(
				'name'  => $cat->name,
				'id'    => $cat->term_id,
				'layer' => $layer
			);
			$sort[] = $layer;
			}
			array_multisort($sort, SORT_ASC, $cats);
			foreach ($cats as $cat) {
				echo '<li class="meta-category__item"><a href="'.get_category_link( $cat['id'] ).'">'.$cat['name'].'</a></li>';
			}
			echo '</ul >' . "\n";
		}
	}
}

/**
 * 投稿タグ(カテゴリー)の表示 Post header full width
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_header_cover_category' ) ) {
	function emanon_header_cover_category() {
		global $post;
	
		if ( is_singular( 'news' ) ) {
			$taxonomy_name = 'news';
			$term_name		 = 'news-cat';
		} elseif ( is_singular( 'request' ) ) {
			$taxonomy_name = 'request';
			$term_name		 = 'request-cat';
		} elseif ( is_singular( 'seminar' ) ) {
			$taxonomy_name = 'seminar';
			$term_name		 = 'seminar-cat';
		} else {
			$taxonomy_name = '';
			$term_name		 = '';
		}
	
		$display_category = get_theme_mod( 'display_category', '' );
	
		if ( $display_category && $taxonomy_name ) {
			$terms = get_the_terms( $post->ID, $term_name );
			if ( $terms && ! is_wp_error( $terms ) ) {
				$term = $terms[0]->name;
				$term_id = $terms[0]->term_id;
				echo '<span class="slider-cat cat-' . $term_id . '"><a href="' . esc_url( get_term_link( $term_id , $term_name ) ) . '">— ' . $term	.' —</a></span>' . "\n";
			}
		} elseif ( $display_category && is_singular( 'post' ) ) {
				$category = get_the_category();
				if( isset ( $category ) ) {
					$cat			= $category[0];
					$cat_id		= $category[0]->cat_ID;
					$cat_name = $cat->cat_name;
				echo '<span class="slider-cat cat-' . $cat_id . '"><a href="' . esc_url( get_category_link( $cat_id ) ) . '">— ' . $cat_name .' —</a></span>' . "\n";
			}
		}
	}
}

/**
 * 投稿タグ(日付とコメント、投稿者)の表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_post_meta' ) ) {
	function emanon_post_meta() {
		$entry_date        = get_theme_mod( 'display_entry_date' );
		$modified_date     = get_theme_mod( 'display_modified_date' );
		$comments_number   = get_theme_mod( 'display_comments_number' );
		$author            = get_theme_mod( 'display_author' );
		$avatar            = get_theme_mod( 'display_author_avatar' );
		$reverse           = get_theme_mod( 'reverse_placement_author' );
		if ( $reverse ) {
			$class_reverse   = ' u-row-dir-reverse';
		} else  {
			$class_reverse    = '';
		}
		$user_name         = get_the_author_meta( 'display_name' );
		$avatar_substitute = get_theme_mod( 'author_avatar_substitute_text', 'by' );
		if ( $avatar ) {
			$get_avatar      = get_avatar( get_the_author_meta( 'ID' ), 24, '', $user_name );
		} elseif ( $avatar_substitute ) {
			$get_avatar      = '<span class="meta-post__avatar--substitute">' . $avatar_substitute . '</span>';
		} else  {
			$get_avatar      = '';
		}
	
		if ( 'seminar' === get_post_type() || 'request' === get_post_type() ) {
			return;
		}
	
		if ( $entry_date || $modified_date || $comments_number || $author ) {
			echo '<div class="meta-post u-row u-row-cont-between' . esc_attr( $class_reverse ) . '">' . "\n";
	
			if ( $entry_date || $modified_date || $comments_number ) {
				echo '<div>' . "\n";
			}
	
			if ( $entry_date && $modified_date) {
				echo '<time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . esc_html( get_the_date() ) . '</time>' . "\n";
				echo '<i class="icon-refresh-cw"></i><time datetime="' . esc_attr( get_the_modified_date( 'Y-m-d' ) ) . '">' . esc_html( get_the_modified_date() ) . '</time>' . "\n";
			} elseif ( ! $entry_date && $modified_date ) {
				echo '<i class="icon-refresh-cw"></i><time datetime="' . esc_attr( get_the_modified_date( 'Y-m-d' ) ) . '">' . esc_html( get_the_modified_date() ) . '</time>' . "\n";
			} elseif ( $entry_date && ! $modified_date ) {
				echo '<time datetime="' . esc_attr( get_the_time( 'Y-m-d' ) ) . '">' . esc_html( get_the_date( ) ) . '</time>' . "\n";
			}
	
			if ( $comments_number && ! post_password_required() && get_comments_number() ) {
				comments_popup_link( printf( '<i class="icon-bubbles"></i><span class="screen-reader-text">%s</span>' , get_the_title() ) );
			}
	
			if ( $entry_date || $modified_date || $comments_number ) {
				echo '</div>' . "\n";
			}
	
			if ( $author ) {
				echo '<div class="meta-post__avatar"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . $get_avatar . esc_attr( get_the_author() ) . '</a></div>' . "\n";
			} else {
				echo '<div class="u-display-none">' . esc_attr( get_the_author() ) . '</div>' . "\n";
			}
			echo '</div >' . "\n";
		} // End if.
	
	} // End if
}

/**
 * Twitter urlの取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_twitter_profile_url' ) ) {
	function get_emanon_twitter_profile_url() {
		$twitter_profile_url = get_theme_mod( 'twitter_profile_url' );
		return trim( $twitter_profile_url );
	}
}

/**
 * Facebook urlの取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_facebook_page_url' ) ) {
	function get_emanon_facebook_page_url() {
		$facebook_page_url = get_theme_mod( 'facebook_page_url' );
		return trim( $facebook_page_url );
	}
}

/**
 * Instagram urlの取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_instagram_profile_url' ) ) {
	function get_emanon_instagram_profile_url() {
		$instagram_profile_url = get_theme_mod( 'instagram_profile_url' );
		return trim( $instagram_profile_url );
	}
}

/**
 * youTube urlの取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_youtube_profile_url' ) ) {
	function get_emanon_youtube_profile_url() {
		$youtube_profile_url = get_theme_mod( 'youtube_profile_url' );
		return trim( $youtube_profile_url );
	}
}

/**
 * LINE URLの取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_line_url' ) ) {
	function get_emanon_line_url() {
		$line_url = get_theme_mod( 'line_url' );
		return trim( $line_url );
	}
}

/**
 * Feedly urlの取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_feedly_url' ) ) {
	function get_emanon_feedly_url() {
		$feedly_url = get_theme_mod( 'feedly_url', get_bloginfo( 'rss2_url' ) );
		return trim( $feedly_url );
	}
}

/**
 * Twitter IDの取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_twitter_id' ) ) {
	function get_emanon_twitter_id( $url = null ) {
		if ( ! $url ) {
			$url = get_emanon_twitter_profile_url();
		}
		$res = preg_match( '/twitter\.com\/(.+?)\/?$/i', $url, $matches );
		if ( $res && $matches && $matches[1] ) {
			return $matches[1];
		}
	}
}

/**
 * Twitter IDの表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_twitter_id' ) ) {
	function emanon_twitter_id() {
		echo esc_html( get_emanon_twitter_id() );
	}
}

/**
 * Twitter IDを含めるURLパラメータの取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'get_emanon_twitter_via' ) ) {
	function get_emanon_twitter_via() {
		$twitter_add_mentions = get_theme_mod( 'twitter_add_mentions' );
		if ( $twitter_add_mentions && get_emanon_twitter_id() ) {
			return '&amp;via='.get_emanon_twitter_id();
		}
	}
}

/**
 * カテゴリーの表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_entry_category' ) ) {
	function emanon_entry_category() {
		$post_list      = get_theme_mod( 'display_category_post_list_'. DEVICE );
		$featured_image = get_theme_mod( 'display_featured_image' );
		if ( $post_list ) {
			$terms  = get_the_category();
			if ( $terms && ! is_wp_error( $terms ) ) {
				$term_id                         = $terms[0]->term_id;
				$term_name                       = $terms[0]->name;
				$term_text_color_value           = get_term_meta( $term_id, 'cat_text_color', '#ffffff' );
				$term_background_color           = get_term_meta( $term_id, 'cat_bg_color', emanon_primary_color() );
				$term_background_color_colorcode = str_replace( '#', '', $term_background_color );
				$term_color['red']               = hexdec( substr( $term_background_color_colorcode, 0, 2)  );
				$term_color['green']             = hexdec( substr( $term_background_color_colorcode, 2, 2 ) );
				$term_color['blue']              = hexdec( substr( $term_background_color_colorcode, 4, 2 ) );
				if ( has_post_thumbnail() && $featured_image ) {
					$term_background_color_value = 'rgba('. $term_color['red'] .','. $term_color['green'] .','. $term_color['blue'] .',0.8)';
				} else {
					$term_background_color_value = $term_background_color;
				}
				echo '<span class="cat-name cat-' . $term_id . '" style="background-color:' . $term_background_color_value . ';color:' . $term_text_color_value . '">' . $term_name  .'</span>' . "\n";
			}
		}
	}
}

/**
 * 投稿メタの表示
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_entry_meta' ) ) {
	function emanon_entry_meta() {
		$entry_date          = get_theme_mod( 'display_entry_date_post_list_'. DEVICE );
		$date_style          = get_theme_mod( 'display_entry_date_post_list_style' );
		$publication_date    = get_the_time( 'Y-m-d' );
		$modified_date       = get_the_modified_date( 'Y-m-d' );
		if ( 'modified_date' == $date_style ) {
			$date_tag   = $modified_date;
			$date_name  = get_the_modified_date();
		} else {
			$date_tag   = $publication_date;
			$date_name  = get_the_date();
		}
		$author                 = get_theme_mod( 'display_author_post_list_'. DEVICE );
		$avatar                 = get_theme_mod( 'display_author_avatar_post_list_'. DEVICE );
		$avatar_substitute      = get_theme_mod( 'display_author_avatar_post_list_substitute_'. DEVICE );
		$avatar_substitute_text = get_theme_mod( 'author_avatar_substitute_text', 'by' );
		$user_name              = get_the_author_meta( 'display_name' );
		if ( is_mobile() ) {
			$avatar_size = '20';
		} else {
			$avatar_size = '24';
		}
		if ( $avatar ) {
			$get_avatar      = get_avatar( get_the_author_meta( 'ID' ), $avatar_size, '', $user_name );
		} elseif ( $avatar_substitute && $avatar_substitute_text ) {
			$get_avatar      = '<span class="meta-post__avatar--substitute">' . $avatar_substitute_text . '</span>';
		} else {
			$get_avatar      = '';
		}
		$reverse           = get_theme_mod( 'reverse_placement_author_post_list' );
		if ( $reverse ) {
			$class_reverse   = ' u-row-dir-reverse';
		} else {
			$class_reverse   = '';
		}
		if ( $entry_date || $author ) {
			echo '<div class="article-meta">' . "\n";
			echo '<ul class="u-row u-row-cont-between u-row-item-center' . esc_attr( $class_reverse ) . '">' . "\n";
			if ( $entry_date ) {
				echo '<li class="article-meta__item"><time datetime="' . esc_attr( $date_tag ) . '">' . esc_html( $date_name ) . '</time></li>' . "\n";
			}
			if ( $author ) {
				echo '<li class="article-meta__item"><span class="author">' . $get_avatar . esc_attr( get_the_author() ) . '</span></li>' . "\n";
			}
			echo '</ul >' . "\n";
		echo '</div>' . "\n";
		} // End if
	}
}

/**
 * 人気記事 閲覧数の保存
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if( ! function_exists( 'emanon_set_post_views' ) ) {
	function emanon_set_post_views( $postID ) {
		$number_key = 'post_views_number';
		$number = (int) get_post_meta( $postID, $number_key, true );
		$number = $number + 1;
		update_post_meta( $postID, $number_key, $number );
	}
}

/**
 * 人気記事 閲覧数の取得
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if( ! function_exists( 'get_emanon_post_views' ) ) {
	function get_emanon_post_views( $postID ) {
		$number_key = 'post_views_number';
		$number = (int) get_post_meta( $postID, $number_key, true );
		return $number;
	}
}

/**
 * jQuery(JavaScript)の統合
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
//file.phpの読み込み(ABSPATHは、WordPressのインストールされたパス名を返す定数)
require_once ( ABSPATH . 'wp-admin/includes/file.php' );

if ( ! function_exists( 'get_emanon_minify_js' ) ) {
	function get_emanon_minify_js() {

		$minified_js = get_theme_mod( 'minified_js' );
		if ( is_admin() || ! $minified_js ){
			return;
		}

		$firstview_layout_type     = get_theme_mod( 'firstview_layout_type', 'display_none' );
		$header_eyecatch_particles = get_theme_mod( 'header_eyecatch_particles_background' );
		$header_video_type         = get_theme_mod( 'header_video_type', 'mp4' );
		$footer_background_type    = get_theme_mod( 'footer_background_type', 'none' );
		$footer_youtube_url        = get_theme_mod( 'footer_video_youtube_url' );

		//utility.min.js
		$utility_file      = T_DIRE . '/assets/js/utility.min.js';

		//particle.js
		$particle_file     = T_DIRE . '/assets/js/particles.min.js';
		$particle_set_file = T_DIRE . '/assets/js/particles-set.min.js';

		//YTPlayer.js
		$YTPlayer_file     = T_DIRE . '/assets/js/YTPlayer.min.js';

		//wp-embed.min.js
		$wp_embed_file     = ABSPATH . 'wp-includes/js/wp-embed.min.js';

		//圧縮js
		$minify_file                   = T_DIRE . '/js-min.js';
		$minify_particle_file          = T_DIRE . '/js-min-particle.js';
		$minify_YTPlayer_file          = T_DIRE . '/js-min-YTPlayer.js';
		$minify_particle_YTPlayer_file = T_DIRE . '/js-min-all.js';
	
		//最終的にまとめたjsの中身
		$minify_js                   = '';
		$minify_particle_js          = '';
		$minify_YTPlayer_js          = '';
		$minify_particle_YTPlayer_js = '';

		//日付を入れる変数
		$utility_file_date                  = '';
		$particle_file_date                 = '';
		$particle_set_file_date             = '';
		$YTPlayer_file_date                 = '';
		$wp_embed_file_date                 = '';
		$minify_file_date                   = '';
		$minify_particle_file_date          = '';
		$minify_YTPlayer_file_date          = '';
		$minify_particle_YTPlayer_file_date = '';
		$file_update                        = false;

	if( WP_Filesystem() ) {
		global $wp_filesystem;
	
		if ( ! file_exists( $minify_file ) ) {
			$wp_filesystem->touch( $minify_file );
			$file_update = true;
		}

		if ( ! file_exists( $minify_particle_file ) ) {
			$wp_filesystem->touch( $minify_particle_file );
			$file_update = true;
		}

		if ( ! file_exists( $minify_YTPlayer_file ) ) {
			$wp_filesystem->touch( $minify_YTPlayer_file );
			$file_update = true;
		}

		if ( ! file_exists( $minify_particle_YTPlayer_file ) ) {
			$wp_filesystem->touch( $minify_particle_YTPlayer_file );
			$file_update = true;
		}

		//日付を取得
		$utility_file_date                  = filemtime( $utility_file );
		$particle_file_date                 = filemtime( $particle_file );
		$particle_set_file_date             = filemtime( $particle_set_file );
		$YTPlayer_file_date                 = filemtime( $YTPlayer_file );
		$wp_embed_file_date                 = filemtime( $wp_embed_file );
		$minify_file_date                   = filemtime( $minify_file );
		$minify_particle_file_date          = filemtime( $minify_particle_file );
		$minify_YTPlayer_file_date          = filemtime( $minify_YTPlayer_file );
		$minify_particle_YTPlayer_file_date = filemtime( $minify_particle_YTPlayer_file );

		//ファイル更新日によるminify fileの上書き
		if(
		 $minify_file_date < $utility_file_date 
		|| $minify_file_date < $particle_file_date 
		|| $minify_file_date < $particle_set_file_date 
		|| $minify_file_date < $YTPlayer_file_date 
		|| $minify_file_date < $wp_embed_file_date 
		|| $minify_particle_file_date < $utility_file_date 
		|| $minify_particle_file_date < $particle_file_date 
		|| $minify_particle_file_date < $particle_set_file_date 
		|| $minify_particle_file_date < $YTPlayer_file_date 
		|| $minify_particle_file_date < $wp_embed_file_date 
		|| $minify_YTPlayer_file_date < $utility_file_date 
		|| $minify_YTPlayer_file_date < $particle_file_date 
		|| $minify_YTPlayer_file_date < $particle_set_file_date 
		|| $minify_YTPlayer_file_date < $YTPlayer_file_date 
		|| $minify_YTPlayer_file_date < $wp_embed_file_date 
		|| $minify_particle_YTPlayer_file_date < $utility_file_date 
		|| $minify_particle_YTPlayer_file_date < $particle_file_date 
		|| $minify_particle_YTPlayer_file_date < $particle_set_file_date 
		|| $minify_particle_YTPlayer_file_date < $YTPlayer_file_date 
		|| $minify_particle_YTPlayer_file_date < $wp_embed_file_date ) {
			$file_update = true;
		}

		if( $file_update ) {
			$utility_js      = $wp_filesystem->get_contents( $utility_file );
			$particle_js     = $wp_filesystem->get_contents( $particle_file );
			$particle_set_js = $wp_filesystem->get_contents( $particle_set_file );
			$YTPlayer_js     = $wp_filesystem->get_contents( $YTPlayer_file );
			$wp_embed_js     = $wp_filesystem->get_contents( $wp_embed_file );

			$minify_particle_YTPlayer_js = $utility_js . $particle_js . $particle_set_js . $YTPlayer_js . $wp_embed_js;
			$minify_particle_js          = $utility_js . $particle_js . $particle_set_js . $wp_embed_js;
			$minify_YTPlayer_js          = $utility_js . $YTPlayer_js . $wp_embed_js;
			$minify_js                   = $utility_js . $wp_embed_js;

			$wp_filesystem->put_contents( $minify_particle_YTPlayer_file, $minify_particle_YTPlayer_js );
			$wp_filesystem->put_contents( $minify_particle_file, $minify_particle_js );
			$wp_filesystem->put_contents( $minify_YTPlayer_file, $minify_YTPlayer_js );
			$wp_filesystem->put_contents( $minify_file, $minify_js );
		}

		$minify_particle_YTPlayer_file_uri = T_DIRE_URI . '/js-min-all.js';
		$minify_particle_file_uri          = T_DIRE_URI . '/js-min-particle.js';
		$minify_YTPlayer_file_uri          = T_DIRE_URI . '/js-min-YTPlayer.js';
		$minify_file_uri                   = T_DIRE_URI . '/js-min.js';


		if( file_exists( $minify_particle_YTPlayer_file ) && is_front_page() && 'header_eyecatch' === $firstview_layout_type && $header_eyecatch_particles && 'youtube' === $footer_background_type && $footer_youtube_url ) {
			$file = $minify_particle_YTPlayer_file_uri;
		} elseif( file_exists( $minify_particle_file ) && is_front_page() && 'header_eyecatch' === $firstview_layout_type && $header_eyecatch_particles ) {
			$file = $minify_particle_file_uri;
		} elseif( file_exists( $minify_YTPlayer_file ) && is_front_page() && 'header_video' === $firstview_layout_type && 'youtube' === $header_video_type 
		|| file_exists( $minify_YTPlayer_file ) && 'youtube' === $footer_background_type && $footer_youtube_url ) {
			$file = $minify_YTPlayer_file_uri;
		} elseif( file_exists( $minify_file ) ) {
			$file = $minify_file_uri;
		} else {
			$file = $utility_file;
		}

	}

	return $file;
	
	}
}

/**
 * js.minを反映
 *
 * jQuery(JavaScript)の圧縮が有効の場合に適用
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_style' ) ) {
	function emanon_js() {

		$minified_js      = get_theme_mod( 'minified_js' );
		$utility_file_uri = T_DIRE_URI . '/assets/js/utility.js';
		if ( $minified_js ) {
			return get_emanon_minify_js();
				} else {
			return $utility_file_uri;
		}

	}
}

/**
 * wp-embedを削除
 *
 * jQuery(JavaScript)の圧縮が有効の場合に適用
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		$minified_js= get_theme_mod( 'minified_js' );
		if ( $minified_js ) {
			wp_deregister_script('wp-embed');
		}
	}
);

/**
 * CSSファイルの統合
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

if ( ! function_exists( 'get_emanon_minify_style' ) ) {
	function get_emanon_minify_style() {

		$minified_css = get_theme_mod( 'minified_css' );
		if ( ! $minified_css ) {
			return;
		}

		//オリジナルのcss
		$origin_file      = T_DIRE . '/style.css';

		//block-libraryのcss
		$block_style_file = ABSPATH . 'wp-includes/css/dist/block-library/style.min.css';

		//圧縮のcss
		$minify_file      = T_DIRE . '/style-min.css';
	
		//最終的にまとめたCSSの中身
		$css              = '';
	
		//日付を入れる変数
		$origin_file_date      = '';
		$block_style_file_date = '';
		$minify_file_date      = '';
		$file_update           = false;
	
	if( WP_Filesystem() ) {
		global $wp_filesystem;
	
		if ( ! file_exists( $minify_file ) ) {
			$wp_filesystem->touch( $minify_file );
			$file_update = true;
		}

		//日付を取得
		$origin_file_update      = filemtime( $origin_file );
		$block_style_file_update = filemtime( $block_style_file );
		$minify_file_update      = filemtime( $minify_file );
	
		//ファイル更新日によるminify fileの上書き
		if( $minify_file_update < $origin_file_update 
		|| $minify_file_update < $block_style_file_update ) {
			$file_update = true;
		}
	
		if( $file_update ) {
			$theme_style_css = $wp_filesystem->get_contents( $origin_file );
			$css_block_style = $wp_filesystem->get_contents( $block_style_file );
			$all_css         = $theme_style_css . $css_block_style;
			$css             = emanon_css_minify( $all_css );
			$wp_filesystem->put_contents( $minify_file, $css );
		}
	
		$origin_file_uri = T_DIRE_URI . '/style.css';
		$minify_file_uri = T_DIRE_URI . '/style-min.css';
	
		if( file_exists( $minify_file ) ){
			$file = $minify_file_uri;
		} else {
			$file = $origin_file_uri;
		}

	}
	
	return $file;
	
	}
}

/**
 * style.min.cssを反映
 *
 * CSS圧縮が有効の場合に適用
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_style' ) ) {
	function emanon_style() {
		$minified_css = get_theme_mod( 'minified_css' );
		if ( $minified_css ) {
			return get_emanon_minify_style();
				} else {
			return get_stylesheet_uri();
		}
	}
}

/**
 * wp-block-library-cssを削除
 *
 * CSS圧縮が有効の場合に適用
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		$minified_css = get_theme_mod( 'minified_css' );
		if ( $minified_css ) {
			wp_dequeue_style( 'wp-block-library' );
		}
	}
);

/**
 * fonts googleapis［Noto Sans］のhead出力
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
add_action(
	'wp_head',
	function () {
		$site_title_font_family            = get_theme_mod( 'header_site_title_font_family', 'sans-serif' );
		$site_tagline_font_family          = get_theme_mod( 'header_site_title_font_family', 'sans-serif' );
		$main_visual_title_font_family     = get_theme_mod( 'main_visual_title_font_family', 'sans-serif' );
		$main_visual_sub_title_font_family = get_theme_mod( 'main_visual_sub_title_font_family', 'sans-serif' );
		$main_visual_message_font_family   = get_theme_mod( 'main_visual_message_font_family', 'sans-serif' );
		$h1_font_family                    = get_theme_mod( 'h1_font_family', 'sans-serif' );
		$h2_font_family                    = get_theme_mod( 'h2_font_family', 'sans-serif' );
		$h3_font_family                    = get_theme_mod( 'h3_font_family', 'sans-serif' );
		$h4_font_family                    = get_theme_mod( 'h4_font_family', 'sans-serif' );
		$h5_font_family                    = get_theme_mod( 'h5_font_family', 'sans-serif' );
		$h6_font_family                    = get_theme_mod( 'h6_font_family', 'sans-serif' );
		$site_body_font_family             = get_theme_mod( 'site_body_font_family', 'sans-serif' );
		$global_nav_font_family            = get_theme_mod( 'global_nav_font_family', 'sans-serif' );
		$footer_nav_font_family            = get_theme_mod( 'footer_nav_font_family', 'sans-serif' );
	?>
<?php if ( 'noto_sans_jp' === $site_title_font_family
						|| 'noto_sans_jp' === $site_tagline_font_family
						|| 'noto_sans_jp' === $main_visual_title_font_family
						|| 'noto_sans_jp' === $main_visual_sub_title_font_family
						|| 'noto_sans_jp' === $main_visual_message_font_family
						|| 'noto_sans_jp' === $h1_font_family
						|| 'noto_sans_jp' === $h2_font_family
						|| 'noto_sans_jp' === $h3_font_family
						|| 'noto_sans_jp' === $h4_font_family
						|| 'noto_sans_jp' === $h5_font_family
						|| 'noto_sans_jp' === $h6_font_family
						|| 'noto_sans_jp' === $site_body_font_family
						|| 'noto_sans_jp' === $global_nav_font_family
						|| 'noto_sans_jp' === $footer_nav_font_family ): ?>
<link rel="stylesheet" id='noto-sans-jp-css' href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap">
<?php endif; ?>
<?php
	} ,
	4
);

/**
 * fonts googleapis［Noto Serif］のhead出力
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
add_action(
	'wp_head',
	function () {
		$site_title_font_family            = get_theme_mod( 'header_site_title_font_family', 'sans-serif' );
		$site_tagline_font_family          = get_theme_mod( 'header_site_title_font_family', 'sans-serif' );
		$main_visual_title_font_family     = get_theme_mod( 'main_visual_title_font_family', 'sans-serif' );
		$main_visual_sub_title_font_family = get_theme_mod( 'main_visual_sub_title_font_family', 'sans-serif' );
		$main_visual_message_font_family   = get_theme_mod( 'main_visual_message_font_family', 'sans-serif' );
		$h1_font_family                    = get_theme_mod( 'h1_font_family', 'sans-serif' );
		$h2_font_family                    = get_theme_mod( 'h2_font_family', 'sans-serif' );
		$h3_font_family                    = get_theme_mod( 'h3_font_family', 'sans-serif' );
		$h4_font_family                    = get_theme_mod( 'h4_font_family', 'sans-serif' );
		$h5_font_family                    = get_theme_mod( 'h5_font_family', 'sans-serif' );
		$h6_font_family                    = get_theme_mod( 'h6_font_family', 'sans-serif' );
		$site_body_font_family             = get_theme_mod( 'site_body_font_family', 'sans-serif' );
		$global_nav_font_family            = get_theme_mod( 'global_nav_font_family', 'sans-serif' );
		$footer_nav_font_family            = get_theme_mod( 'footer_nav_font_family', 'sans-serif' );
	?>
<?php if ( 'noto_serif_jp' === $site_title_font_family
						|| 'noto_serif_jp' === $site_tagline_font_family
						|| 'noto_serif_jp' === $main_visual_title_font_family
						|| 'noto_serif_jp' === $main_visual_sub_title_font_family
						|| 'noto_serif_jp' === $main_visual_message_font_family
						|| 'noto_serif_jp' === $h1_font_family
						|| 'noto_serif_jp' === $h2_font_family
						|| 'noto_serif_jp' === $h3_font_family
						|| 'noto_serif_jp' === $h4_font_family
						|| 'noto_serif_jp' === $h5_font_family
						|| 'noto_serif_jp' === $h6_font_family
						|| 'noto_serif_jp' === $site_body_font_family
						|| 'noto_serif_jp' === $global_nav_font_family
						|| 'noto_serif_jp' === $footer_nav_font_family ): ?>
<link rel="stylesheet" id='noto-serif-jp-css' href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&display=swap">
<?php endif; ?>
<?php
	},
	5
);


/**
 * HTMLの圧縮
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_ob_start' ) ) {
	function emanon_ob_start() {
		$html_minified = get_theme_mod( 'minified_html' );
		if ( $html_minified ) {
			$ob_start = ob_start();
			return $ob_start;
		}
	}
}

/**
 * HTMLの圧縮
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_ob_get_clean' ) ) {
	function emanon_ob_get_clean() {
		$html_minified   = get_theme_mod( 'minified_html' );
		if ( $html_minified ) {
			$html_compress = ob_get_clean();
			$html_compress = str_replace( "\t", '', $html_compress );
			$html_compress = str_replace( "\r", '', $html_compress );
			$html_compress = str_replace( "\n", '', $html_compress );
			$html_compress = preg_replace( '/<!--[\s\S]*?-->/', '', $html_compress );
			echo $html_compress;
		}
	}
}

/**
 * jQuery CDN・jQuery migrateの使用
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! is_admin() && ! function_exists( 'emanon_enqueue_script' ) ) {
	function emanon_enqueue_script() {
		// バージョンとURIを取得
		global $wp_scripts;
		$jquery_core        = $wp_scripts->registered['jquery-core'];
		$jquery_core_ver    = $jquery_core->ver;
		$jquery_core_src    = $jquery_core->src;
	
		// CDNの使用判定 jQuery Migrateの使用判定
		$use_jquery_cdn     = get_theme_mod( 'use_jquery_cdn' );
		$use_jquery_cdn_ver = '3.5.1';
	
		// jQueryを削除
		wp_deregister_script( 'jquery' );
		wp_deregister_script( 'jquery-migrate' );
	
		// jQueryを登録・フッターに移動
		if ( $use_jquery_cdn ) {
			wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/'. $use_jquery_cdn_ver .'/jquery.min.js',array(), $use_jquery_cdn_ver, true );
		} else {
			wp_enqueue_script( 'jquery', $jquery_core_src, array(), $jquery_core_ver, true );
		}
	}
}

/**
 * 検索範囲の設定
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
add_action(
	'posts_search',
	function ( $search ) {
		$search_filter_page = get_theme_mod( 'search_object' );
		if ( 'post' === $search_filter_page ) {
			if ( is_search() ) {
				$search .= " AND post_type = 'post'";
			}
			return $search;
		} elseif ( 'post_page' === $search_filter_page ) {
			if ( is_search() ) {
				$search .= " AND (post_type = 'post' OR post_type='page')";
			}
			return $search;
		} // End if()
	}
);

/**
 * 検索結果を絞込
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
add_action(
	'pre_get_posts',
	function ( $query ) {
		$search_filter_cat = get_theme_mod( 'search_exclude_cat' );
		if ( is_admin() || ! $query->is_main_query() ){
			return;
		}
		if ( $query->is_search() ) {
			$query->set('category__not_in', array( $search_filter_cat ) );
		}
		return $query;
	}
);