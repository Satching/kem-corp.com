<?php
/**
 * Breadcrumb
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

function emanon_breadcrumb() {

	if ( 'page' == get_option( 'show_on_front' ) ) { // 管理画面「設定」-「表示設定」post | page
		$page_for_posts       = get_option( 'page_for_posts' ); // フロントページの表示 > 投稿ページ
		$page_for_posts_link  = get_permalink( $page_for_posts );
		$page_for_posts_title = get_the_title( $page_for_posts );
	} else {
		$page_for_posts = '';
	}

	$wp_object  = get_queried_object();
	$icon_home  = '<i class="icon-home"></i>';
	$separator   = '<i class="icon-chevron-right"></i>';
	$json_array = array();

	// パンくず先頭文字の設定
	$home = get_theme_mod( 'breadcrumb_home_name', get_bloginfo('name') );
	if( $home ) {
		$bread_home = '<span class="breadcrumb-home">'. $home .'</span>';
		} else {
		$home = 'Home';
		$bread_home = '';
	}

	// Start the breadcrumb
	$bread_crumb = '<!--breadcrumb-->
	<div class="breadcrumb">
		<nav>
			<ol class="breadcrumb__inner">
				<li class="breadcrumb__item"><a href="' . home_url( '/' ) . '">' . $icon_home  . $bread_home . '</a>' . $separator . '</li>';

	// Homeページ
	if ( is_home() && $page_for_posts ) {
		$bread_crumb .= '<li class="breadcrumb__item"><span>' . $page_for_posts_title . '</span></li>';
	}

		// 投稿ページ
		if ( is_single() ) {
		$post_type         = $wp_object->post_type;
		$post_type_name    = esc_html( get_post_type_object( $post_type )->label );
		$post_archive_link = esc_url( get_post_type_archive_link( $post_type ) );

		// デフォルトの投稿タイプ
		if ( is_singular( 'post' ) ) {

			if ( $page_for_posts ) {
				$bread_crumb .= '<li class="breadcrumb__item"><a href="' . $page_for_posts_link . '"><span>'. $page_for_posts_title . '</span></a>' . $separator . '</li>';
			}

		// カスタム投稿タイプ
		} elseif ( $post_type !== 'post' ) {
			// カスタム投稿タイプ名を表示
			$bread_crumb .= '<li class="breadcrumb__item"><a href="'. $post_archive_link .'"><span>'. $post_type_name .'</span></a>' . $separator . '</li>';

			// カスタム投稿タイプのタクソノミーを取得
			$taxonomies = get_object_taxonomies( $post_type, $output = 'names' );
				foreach ( $taxonomies as $taxonomy_name ) {
					if ( 'names' == $output ) {
						$taxonomy = $taxonomy_name;
					}
				}
		}

		// タームを取得
		$post_id = $wp_object->ID;
		$taxonomy = 'category';
		$terms   = get_the_terms( $post_id, $taxonomy );

		if ( $terms && ! is_wp_error( $terms ) ) {

			// ターム親IDを取得
			$parents_list = array();
			foreach ( $terms as $term ) {
				if ( 0 != $term->parent ) {
					$parents_list[] = $term->parent;
				}
			}

			// タームのみ取得
			$child_list = array();
			foreach ( $terms as $term ) {
				if ( ! in_array( $term->term_id, $parents_list ) ) {
					$child_list[] = $term;
				}
			}
			$term = $child_list[0];

			if ( 0 != $term->parent ) {
			// 親タームを表示
			$parents = array_reverse( get_ancestors( $term->term_id, $taxonomy ) );
				foreach ( $parents as $parent_id ) {
					$parent_term = get_term( $parent_id, $taxonomy );
					$parent_link = esc_url( get_term_link( $parent_id, $taxonomy ) );
					$parent_name = esc_html( $parent_term->name );
					$bread_crumb .= '<li class="breadcrumb__item"><a href="' . $parent_link . '"><span>' . $parent_name . '</span></a>' . $separator . '</li>';
				}
			}
	
			// 最下層のタームを表示
			$term_link = esc_url( get_term_link( $term->term_id, $taxonomy ) );
			$term_name = esc_html( $term->name );
			$bread_crumb .= '<li class="breadcrumb__item"><a href="' . $term_link . '"><span>' . $term_name . '</span></a>' . $separator . '</li>';
	
		} // End if( $terms && ! is_wp_error( $terms ) )

		// 投稿タイプのタイトルを表示
		$title        = apply_filters( 'the_title', $wp_object->post_title );
		$bread_crumb .= '<li class="breadcrumb__item"><span>' . esc_html( $title ) . '</span></li>';

	// 固定ページ
	} elseif ( is_page() ) {

	// 固定ページの親ページを表示
	if ( 0 != $wp_object->post_parent ) {
		$page_id = $wp_object->ID;
		$parents = array_reverse( get_post_ancestors( $page_id ) );
		foreach( $parents as $parent_id ) {
			$parent_link = esc_url( get_permalink( $parent_id ) );
			$parent_title = esc_html( get_the_title( $parent_id ) );
			$bread_crumb .= '<li class="breadcrumb__item"><a href="' . $parent_link . '"><span>' . $parent_title . '</span></a>' . $separator . '</li>';
		}
	}
	// 固定ページのタイトルを表示
	$title        = apply_filters( 'the_title', $wp_object->post_title );
	$bread_crumb .= '<li class="breadcrumb__item"><span>' . esc_html( $title ) . '</span></li>';

	// 投稿タイプアーカイブページ
	} elseif ( is_post_type_archive() ) {

	$bread_crumb .= '<li class="breadcrumb__item"><span>' . esc_html( $wp_object->label ) . '</span></li>';

	// 日付に関連するアーカイブページ
	} elseif ( is_date() ) {
		$year  = get_query_var('year');
		$month = get_query_var('monthnum');
		$day   = get_query_var('day');

		// 日別アーカイブ
		if ( is_day() && $year && $month && $day ) {
			$bread_crumb .= '<li class="breadcrumb__item"><a href="' . get_year_link( $year ) . '"><span>' . $year . __( '年', 'emanon-premium' ) .'</span></a>' . $separator . '</li>';
			$bread_crumb .= '<li class="breadcrumb__item"><a href="' . get_month_link( $year, $month ). '"><span>' . $month . __( '月', 'emanon-premium' ) . '</span></a>' . $separator . '</li>';
			$bread_crumb .= '<li class="breadcrumb__item"><span>'. $day . __( '日', 'emanon-premium' ) .'</span></li>';
	
		// 月別アーカイブ
		} elseif ( is_month() && $year && $month ) {
			$bread_crumb .= '<li class="breadcrumb__item"><a href="' . get_year_link( $year ) . '"><span>' . $year . __( '年', 'emanon-premium' ) .'</span></a>' . $separator . '</li>';
			$bread_crumb .= '<li class="breadcrumb__item"><span>'. get_the_time( $month ) . __( '月', 'emanon-premium' ) .'</span></li>';
	
		// 年別アーカイブ
		} elseif ( $year ) {
			$bread_crumb .= '<li class="breadcrumb__item"><span>' . $year . __( '年', 'emanon-premium' ) . '</span></li>';
		}

	// 投稿者アーカイブ
	} elseif ( is_author() ) {
		$bread_crumb .= '<li class="breadcrumb__item"><span>' . get_the_author_meta( 'display_name' ).'</span></li>';

	// その他のアーカイブ
	} elseif ( is_archive() ) {
		$taxonomy  = $wp_object->taxonomy;
		$term_id   = $wp_object->term_id;
		$term_name = $wp_object->name;

		if ( is_tax() ) {
			$post_type        = get_taxonomy( $taxonomy )->object_type[0];
			$post_type_object = get_post_type_object( $post_type );
			$taxonomy_name    = esc_html( $post_type_object->labels->name );
			$taxonomy_link    = esc_url( get_post_type_archive_link( $post_type ) );
			$bread_crumb .= '<li class="breadcrumb__item"><a href="' . esc_url( $taxonomy_link ) . '"><span>'. $taxonomy_name. '</span></a>' . $separator . '</li>';
		} elseif ( $page_for_posts ) {
			$bread_crumb .= '<li class="breadcrumb__item"><a href="' . $page_for_posts_link . '"><span>'. $page_for_posts_title . '</span></a>' . $separator . '</li>';
		}

		if ( 0 != $wp_object->parent ) {
			$parents = array_reverse( get_ancestors( $term_id, $taxonomy ) );
			foreach( $parents as $parent_id ) {
				$parent_term = get_term( $parent_id, $taxonomy );
				$parent_link = esc_url( get_term_link( $parent_id, $taxonomy ) );
				$parent_name = esc_html( $parent_term->name );
				$bread_crumb .= '<li class="breadcrumb__item"><a href="'. $parent_link .'"><span>'. $parent_name .'</span></a>' . $separator . '</li>';
			}
		}

		// タームタイトルの表示
		$bread_crumb .= '<li class="breadcrumb__item"><span>'. esc_html( $term_name ) .'</span></li>';

	// 404ページ
	} elseif ( is_404() ) {
		$bread_crumb .= '<li class="breadcrumb__item"><span>' . __( '404ページ', 'emanon-premium' ) . '</span></li>';

	// 検索結果ページ
	} elseif ( is_search() ) {
		$bread_crumb .= '<li class="breadcrumb__item"><span>' . __( '検索結果', 'emanon-premium' ) . '</span></li>';
	}

	// END the breadcrumb
	$bread_crumb .= '</ol>
			</nav>
		</div><!--/.breadcrum-->
		<!--end breadcrumb-->';

	return $bread_crumb;
}

echo emanon_breadcrumb();
