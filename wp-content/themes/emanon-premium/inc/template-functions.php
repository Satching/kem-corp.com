<?php
/**
 * テンプレート用フック
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * body_class()に独自classを追加
 */
add_filter(
'body_class',
function ( $classes ) {
if ( is_mobile() ) {
	$news     = get_theme_mod( 'display_header_news_sp' );
} else {
	$news     = '';
}
$layout         = get_theme_mod( 'firstview_layout_type', 'display_none' );
$header_overlay = get_theme_mod( 'frontpage_header_overlay' );
	if ( $header_overlay && 'header_eyecatch'  === $layout ||
	$header_overlay && 'header_image_slider'   === $layout ||
	$header_overlay && 'header_content_slider' === $layout ||
	$header_overlay && 'header_pagebox_slider' === $layout ||
	$header_overlay && 'header_video'          === $layout ) {
	$class_header_overlay = 'is-overlay';
	} else {
	$class_header_overlay = '';
}
	$add_classes = $class_header_overlay;
	$classes[] = $add_classes;
	return $classes;
	}
);

/**
 * 画像選択時のサイズを追加
 */
add_filter(
'image_size_names_choose',
		function ( $sizes ) {
			return array_merge( $sizes, array(
			'1200_675' => '1200px x 675px',
			'800_450'  => '800px x 450px',
			'600_338'  => '600px x 338x',
		));
	}
);

/**
 * titleタグのカスタマイズ
 */
add_filter (
	'document_title_parts',
	function ( $title ) {

		if( is_front_page() ) {
		$front_page_title = get_theme_mod( 'front_page_title' );
			if ( 'site_title' === $front_page_title ) {
				unset( $title['tagline'] );
			}
		} elseif ( is_single() || is_attachment() ) {
		$post_title = get_theme_mod( 'post_title' );
			if ( 'post_title' === $post_title ) {
				unset( $title['site'] );
			}
		} elseif ( is_page() || is_home() ) {
		$page_title = get_theme_mod( 'page_title' );
			if ( 'page_title' === $page_title ) {
				unset( $title['site'] );
			}
		} elseif ( is_archive() ) {
		$archive_title = get_theme_mod( 'archive_title' );
			if ( 'archive_title' === $archive_title ) {
				unset( $title['site'] );
			}
		} elseif ( is_search() ) {
		$search_page_title = get_theme_mod( 'search_page_title' );
			if ( 'search_page_title' === $search_page_title ) {
				unset( $title['site'] );
			}
		} elseif ( is_404() ) {
		$not_found_page_title = get_theme_mod( 'not_found_page_title' );
			if ( 'not_found_page_title' === $not_found_page_title ) {
				unset( $title['site'] );
			}
		} // End if().
		return $title;
	},
	10,
	2
);

/**
 * titleタグのセパレートの設定
 *
 * @since 1.0.0
 **/
add_filter (
	'document_title_separator',
	function ( $separator ) {
		$sep_type = get_theme_mod( 'title_separator' );

		if ( 'pipe' === $sep_type ) {
			$separator = ' | ';
		} elseif ( 'hyphen' === $sep_type ) {
			$separator = ' - ';
		}
		return $separator;
	},
	10,
	2
);

/**
 * JavaScriptを非同期にする
 */
if ( ! is_admin() && ! function_exists( 'add_emanon_defer_script' ) ) {
	add_filter ( 'clean_url', 'add_emanon_defer_script', 11, 1 );
	function add_emanon_defer_script( $url ) {
		$enable_jquery_defer = get_theme_mod( 'enable_jquery_defer' );

		if ( ! $enable_jquery_defer ) {
			return $url;
		}
	
		if ( false === strpos( $url, '.js' ) ) return $url;
		if ( strpos( $url, 'instantpage.js' ) ) return $url;
	
		return "$url' defer";

	}
}

add_filter ( 'script_loader_tag','emanon_remove_script_type' );
function emanon_remove_script_type( $tag ) {
	return str_replace( "type='text/javascript' ", "", $tag );
}

/**
 * module設定
 */
add_filter (
	'script_loader_tag',
	function ( $tag, $handle, $src ) {
		$link_prefetching = get_theme_mod( 'rel_prefetch' );
		if ( 'emanon-rel-prefetch-set' === $handle && $link_prefetching ) {
			$tag = "<script type='module' src='" . esc_url( $src ) . "' defer></script>" . "\n";
		}
		return $tag;
	},
	10,
	3
);

/**
 * 目次の取得
 */
function get_emanon_toc( $content ) {
	$toc_list = '';
	$h_level  = get_theme_mod( 'toc_heading_level', '2-4' );
	if ( preg_match_all( '/<h([' . $h_level . '])>(.*?)<\/h\1>/', $content, $matches, PREG_SET_ORDER )) {
			$min_level = min( array_map( function($m) { return $m[1]; }, $matches ) );
			$current_level = $min_level - 1;
			$sub_levels = array('1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0, '6' => 0);
			foreach ($matches as $m) {
				$level = $m[1];
				$text  = $m[2];
				while ( $current_level > $level ) {
					$current_level--;
					$toc_list .= '</li></ol>';
				}
				if ( $current_level == $level ) {
						$toc_list .= '</li><li class="contents-outline__item">';
				} else {
						while ($current_level < $level) {
								$current_level++;
								$toc_list .= sprintf( '<ol class="indent_%s contents-outline__ol"><li class="contents-outline__item">', $current_level );
						}
						for ($idx = $current_level + 0; $idx < count( $sub_levels ); $idx++ ) {
								$sub_levels[$idx] = 0;
						}
				}
				$sub_levels[$current_level]++;
				$level_fullpath = array();
				for ( $idx = $min_level; $idx <= $level; $idx++ ) {
						$level_fullpath[] = $sub_levels[$idx];
				}
				$target_anchor = '#toc-' . implode( '_', $level_fullpath );
				$toc_list .= sprintf( '<a href="%s">%s</a>', $target_anchor, $text );
				$content = preg_replace( '/<h([' . $h_level . '])>/', '<h\1 toc-anchor="' . $target_anchor . '">', $content, 1 );
			}
			while ( $current_level >= $min_level ) {
				$toc_list .= '</li></ol>';
				$current_level--;
			}
	} // End if().
	return
		array(
			'content' => $content,
			'outline' => $toc_list
		);
}

/**
 * 目次の表示 | Googleアドセンスの表示
 */
add_filter (
	'the_content',
	function ( $content ) {

	if ( ! is_singular( array( 'post', 'page' ) ) || is_front_page() || is_page_template( 'templates/page-author-two-row.php' ) || is_page_template( 'templates/page-author-three-row.php' ) || is_admin() ) {
		return $content;
	}

	// Googleアドセンスコードの出力
	if ( is_single() ) {
		$post_type  = 'post';
	} elseif ( is_page() ) {
		$post_type  = 'page';
	}
	$label        = get_theme_mod( 'ad_label' );
	$ad_h2        = get_theme_mod( 'display_ad_h2_' .$post_type );
	$ad_h2_dr     = get_theme_mod( 'display_ad_h2_dr_' .$post_type .'_' . DEVICE );

	if ( 'display_ad' === $ad_h2 ) {
		$ad_code    = get_theme_mod( 'display_ad_code' );
	} elseif ( 'link_ad' === $ad_h2 ) {
		$ad_code    = get_theme_mod( 'link_ad_code' );
	} else {
		$ad_code    = '';
	}

	$hide_ad      = post_custom( 'emanon_hide_ad' );
	if ( $ad_code && ! $hide_ad ) {
		if ( $label ) {
			$ad_label = sprintf( '<span class="ad-label">' . $label . '</span>' );
		} else {
			$ad_label = '';
		}
		if ( $ad_h2_dr ) {
			$ad_box   = sprintf( '<aside class="ad-h2-above">' . $ad_label . '<div class="u-row u-row-wrap wrapper-col"><div class="col-6 left-rectangle">' . $ad_code . '</div><div class="col-6 right-rectangle">' . $ad_code . '</div></div></aside>' );
		} else {
			$ad_box   = sprintf( '<aside class="ad-h2-above">' . $ad_label . $ad_code . '</aside>' );
		}
	} else {
		$ad_box = '';
	}

	// 目次の出力
	$toc_post = get_theme_mod( 'display_toc_post' );
	$toc_page = get_theme_mod( 'display_toc_page' );
	$hide_toc = post_custom( 'emanon_hide_toc' );
	$tag = '/^<h2.*?>/im';

	if ( $hide_toc && preg_match( $tag, $content, $tags ) ) {
		// h2上にGoogleアドセンスを出力
		$content = preg_replace( $tag, $ad_box.$tags[0], $content, 1);
		return $content;
	} elseif ( $hide_toc ) {
		return $content;
	}

	if ( $toc_post && is_singular( 'post' ) || $toc_page && is_singular( 'page' ) ) {
		$toc_list_info         = get_emanon_toc( $content) ;
		$content               = $toc_list_info['content'];
		$toc_list              = $toc_list_info['outline'];
		$h_level               = get_theme_mod( 'toc_heading_level', '2-6' );
		$toc_title             = get_theme_mod( 'toc_title', __( '目次', 'emanon-premium' ) );
		$disable_toggle_switch = get_theme_mod( 'display_toc_toggle_switch' );

		if ( $disable_toggle_switch ) {
			$toggle_switch = '<div id="js-toc-toggle" class="toc-btn__switch selected"><input type="checkbox" id="toc-close-btn"><label for="toc-close-btn"><span></span></label><div class="slider"></div></div>';
		} else {
			$toggle_switch = '';
		}

		$toc_box = sprintf( '<div class="toc-box"><div class="toc-box__header">' . $hide_toc.  $toc_title . $toggle_switch . '</div><div class="contents-outline">%s</div></div>', $toc_list );

		preg_match( '/<h[' . $h_level . '].*>/', $content, $matches, PREG_OFFSET_CAPTURE );
		if ( $matches ) {
			$pos = $matches[0][1];
			$content = substr( $content, 0, $pos ) . $ad_box . $toc_box . substr( $content, $pos );
		}
	} elseif ( preg_match( $tag, $content, $tags ) ) {
		// 目次非表示の場合、h2上にGoogleアドセンスを出力
		$content = preg_replace( $tag, $ad_box.$tags[0], $content, 1);

	} // End if().

	return $content;

	}
);

/**
 * the archive titleのカスタマイズ
 */
add_filter (
	'get_the_archive_title',
	function ( $title ) {
		if ( is_archive() ) {
			if ( is_category() || is_tax() ) {
				$term_id    = get_queried_object_id();
				$term_title = get_term_meta( $term_id, 'cat_title', true );
				if ( $term_title ) {
					$title = strip_tags( $term_title );
				} else {
					$title = single_cat_title( '', false );
				}
			} elseif ( is_date() ) {
				$year  = get_query_var( 'year' );
				$month = get_query_var( 'monthnum' );
				$day   = get_query_var( 'day' );
				if ( is_day() ) {
					$title = $year . __( '年', 'emanon-premium' ) .$month . __( '月', 'emanon-premium' ) . $day . __( '日', 'emanon-premium' );
				} elseif ( is_month() ) {
					$title = $year . __( '年', 'emanon-premium' ) .$month . __( '月', 'emanon-premium' );
				} elseif ( is_year() ) {
					$title = $year . __( '年', 'emanon-premium' );
				}
			} elseif ( is_tag() ) {
				$title = single_tag_title( '', false );
			} elseif ( is_author() ) {
				$title = get_the_author();
			}
		}
		return $title;
	}
);

/**
 * カテゴリー投稿数の表示スタイルをカスタマイズ
 */
add_filter (
	'wp_list_categories',
	function ( $output ) {
		$output = preg_replace( '/<\/a>\s*\((\d+)\)/',' <span class="count">$1</span></a>', $output );
		return $output;
	},
	10,
	2
);

/**
 * アーカイブ投稿数の表示スタイルをカスタマイズ
 */
add_filter (
	'get_archives_link',
	function ( $output, $args ) {
		$output = preg_replace( '/<\/a>\s*(&nbsp;)\((\d+)\)/',' <span class="count">$2</span></a>', $output );
		return $output;
	},
	10,
	2
);

/**
 * メニュー下に説明文を追加
 */
add_filter (
	'nav_menu_item_title',
	function ( $title, $item, $args, $depth ) {
		if ( 0 != $depth ) {
			return $title;
		}
		$title = sprintf( '<span>%1$s</span>', $title );
		if ( $item->description ) {
			$title = $title . sprintf( '<small class="menu-description">%1$s</small>', esc_html( $item->description ) );
		}
		return $title;
	},
	10,
	4
);

/**
 * 保護ページのタイトルから「保護中：」を削除
 */
add_filter (
	'protected_title_format',
	function () {
		$title = get_theme_mod( 'protected_title', __( '保護中：', 'emanon-premium' ) );
		if ( ! get_theme_mod( 'delete_protected_title' ) ) {
			return '' . esc_html( $title ). ' %s';
		} else {
		return '%s';
		}
	}
);

/**
 * パスワード付きページのカスタマイズ
 */
add_filter (
	'the_password_form',
	function ( $post = 0 ) {
		$post      = get_post( $post );
		$label     = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
		$message   = get_theme_mod( 'protected_message', __( 'このコンテンツはパスワードで保護されています。閲覧するには、以下にパスワードを入力してください。', 'emanon-premium' ) );
		$btn_url   = esc_url( get_theme_mod( 'protected_btn_url' ) );
		$btn_text  = get_theme_mod( 'protected_btn_text' );
		$microcopy = get_theme_mod( 'protected_btn_microcopy' );
		if ( $btn_text ) {
			$cta_btn = '<div class="password-page__btn"><a class="c-btn c-btn__main c-btn__m" href="' . $btn_url . '">' . $btn_text . '</a></div>';
		} else {
			$cta_btn = '';
		}
		if ( $microcopy ) {
			$cta_text = '<div class="password-page__microcopy">' . wp_kses_post( wpautop( $microcopy ) ) . '</div>';
		} else {
			$cta_text = '';
		}
		$output = '<div class="password-page__form"><form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><p>' . nl2br( $message ) . '</p>' . $cta_btn . $cta_text . '<div class="password-page__input"><label for="' . $label . '">' . __( 'パスワード：', 'emanon-premium' ) . ' <input name="post_password" id="' . $label . '" type="password" size="20" /></label><input type="submit" name="Submit" value="' . __( '入力', 'emanon-premium' ) . '" /></form></div></div>';
		return $output;
	}
);

/**
 * 次の記事・前の記事のカスタマイズ
 */
function emanon_post_link( $output, $format, $link, $post, $adjacent ) {
	$display_featured_image = get_theme_mod( 'display_featured_image_pre_nex' );

	if( has_post_thumbnail( $post ) && $display_featured_image ) {
		$thumbnail_img = '<span class="pre_nex_thumbnail">' . get_the_post_thumbnail( $post, '160_160' ) . '</span>';
	} elseif( $display_featured_image ) {
		$thumbnail_img = '<span class="pre_nex_thumbnail"><img src="' . T_DIRE_URI . "/assets/images/no-img/160_160.png" . '" alt="no image" width="80" height="80" /></span>';
	} else {
		$thumbnail_img = '';
	}

	$output = str_replace( '</span>', '</span>' . $thumbnail_img, $output );
	return $output;

}
add_filter ( 'next_post_link', 'emanon_post_link', 10, 5 );
add_filter ( 'previous_post_link', 'emanon_post_link', 10, 5 );