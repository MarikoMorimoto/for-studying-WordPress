<?php
function my_enqueue_scripts() {
	$uri = esc_url( get_template_directory_uri() );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bundle_js' , $uri . '/assets/js/bundle.js' , array() );
	wp_enqueue_style( 'my_styles' , $uri . '/assets/css/styles.css' , [] );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );

// ヘッダー・フッターのカスタムメニュー化
register_nav_menus( array(
	'place_global' => 'グローバル',
	'place_footer' => 'フッターナビ'
) );

// メイン画像上にテンプレートごとの文字列を表示
function get_main_title() {
	if ( is_singular( 'post') ) { // is_singular() は、固定ページか投稿ページのときtrueを返す。引数に（カスタム）投稿タイプ名（投稿・固定どちらもの）を指定することができる。
		$category_obj = get_the_category();
		return $category_obj[0]->name;
	} elseif ( is_page() ) { // 固定ページかどうか
		return get_the_title();
	} elseif ( is_category() || is_tax() ) { // カテゴリーページもしくはタクソノミーページか
		return single_cat_title(); // 現在のカテゴリーもしくはタクソノミー名を出力
	} elseif ( is_search() ) {
		return 'サイト内検索結果';
	} elseif ( is_404() ) {
		return 'ページが見つかりません';
	} elseif ( is_singular( 'daily_contribution' ) ) {
		$term_obj = get_the_terms( get_queried_object()->ID, 'event' ); // get_the_terms で記事に紐づいているタームのオブジェクトの配列を取得する
		return $term_obj[0]->name;
	}

	return '';
}

/**
 * 子ページを取得する関数
 *
 * @param int $number 指定なしのときは -1 全件取得
 * @param int|null $specified_id 指定なしのときはnull
 *
 * @return WP_Query
 */
function get_child_pages( int $number = -1, int $specified_id = null ): WP_Query {
	if ( isset( $specified_id ) ) :
		$parent_id = $specified_id;
	else :
		$parent_id = get_the_ID();
	endif;

	$args = array(
		'posts_per_page'    => $number,
		'post_type'         => 'page',
		'orderby'           => 'menu_order', // 何を元にして並び替えするか ここでは管理画面で設定した並び
		'order'             => 'ASC',
		'post_parent'       => $parent_id,
	);
	$child_pages = new WP_Query( $args );
	return $child_pages;
}

/**
 * アイキャッチ画像を利用できるようにする
 * 管理画面にアイキャッチ画像を設定するためのUIが追加される
 */
add_theme_support( 'post-thumbnails' );

/**
 * トップページのメイン画像用のサイズ設定
 * add_image_size() を定義（記述）したあとに画像をアップロードすると、そのサイズの画像が生成される。
 */
add_image_size( 'top', 1077, 622, true );

/**
 * 地域貢献活動一覧画像用のサイズ設定
 */
add_image_size( 'contribution', 557, 280, true );

/**
 * トップページの地域貢献活動にて使用している画像用のサイズ設定
 */
add_image_size( 'front-contribution', 255, 189, true );

/**
 * 企業情報・店舗情報一覧画像用のサイズ設定
 */
add_image_size( 'common', 465, 252, true );

/**
 * 各ページのメイン画像用のサイズ設定
 */
add_image_size( 'detail', 1100, 330, true );

/**
 * 検索一覧画像用のサイズ設定
 */
add_image_size( 'search', 168, 168, true );

/**
 * 各テンプレートごとのメイン画像を表示
 *
 * @return string メイン画像を表示するimgタグ
 */
function get_main_image() {
	if ( is_page() || is_singular( 'daily_contribution' ) ) {
		if ( function_exists( 'get_field' ) && get_field( 'main_image' ) ) { // get_field() はプラグインAdvance Custom Fields 固有の関数であり、プラグインを無効化すると関数が存在しなくなる。そのため存在チェックを挟む。
			$attachment_id = get_field( 'main_image' ); // 管理画面にて、ACFの当該フィールドキーを「main_image」にし、戻り値に添付画像のIDを返すよう、設定している。
			if ( is_front_page() ) {
				return wp_get_attachment_image( $attachment_id, 'top' );
			}
			return wp_get_attachment_image( $attachment_id, 'detail' );
		} else {
			return get_the_post_thumbnail( get_queried_object()->ID, 'detail' );
		}
	} elseif ( is_category( 'news' ) || is_singular( 'post' ) ) {
		return '<img src="' . get_template_directory_uri() . '/assets/images/bg-page-news.jpg" />';
	} elseif ( is_search() || is_404() ) {
		return '<img src="' . get_template_directory_uri() . '/assets/images/bg-page-search.jpg" />';
	} else {
		return '<img src="' . get_template_directory_uri() . '/assets/images/bg-page-dummy.png" />';
	}
}

/**
 * 特定の記事を抽出する関数
 *
 * @param string $post_type 投稿タイプ
 * @param string|null $taxonomy 記事に紐づくタームが属する、タクソノミーのスラッグ
 * @param string|null $term 記事に紐づくタームのスラッグ
 * @param int $number 取得したい記事数 デフォルトは-1（全件取得）
 *
 * @return WP_Query
 */
function get_specific_post( string $post_type, string $taxonomy = null, string $term = null, int $number = -1 ): WP_Query {
	if ( ! $term ) { // 第三引数の $term を省略したときには 指定したタクソノミーに関する記事をすべて取得
		$terms_obj = get_terms( $taxonomy );
		$term = wp_list_pluck( $terms_obj, 'slug' ); // 第一引数にオブジェクトまたは連想配列の配列、第二引数にオブジェクトのプロパティ名または連想配列のキーを指定することで、配列内のオブジェクトまたは連想配列から特定の値だけを抽出する。
	}
	$args = array(
		'post_type'         => $post_type,
		'posts_per_page'    => $number,
		'tax_query'         => array( // 配列形式でタクソノミーに関する指定をして、柔軟に記事を取得できる
			array(
				'taxonomy'   => $taxonomy,
				'field'      => 'slug',
				'terms'      => $term,
			),
		),
	);
	$specific_posts = new WP_Query( $args );
	return $specific_posts;
}

/**
 * ページネーション
 *
 * @return void
 */
function page_navi() {
	the_posts_pagination( array(
		'mid_size'  => 2, // 現在のページの左右２ページずつを（存在すれば）ページネーションに表示
		'prev_text' => '<',
		'next_text' => '>',
	) );
}

/**
 * 抜粋分の最後につく文字列を変更
 *
 * @return string
 */
function cms_excerpt_more() {
	return '...';
}
add_filter( 'excerpt_more', 'cms_excerpt_more' );

/**
 * 抜粋分の文字数を変更 ：WP Multibyte Patch標準は110文字
 *
 * @return int
 */
function cms_excerpt_length() {
	return 80;
}
add_filter( 'excerpt_mblength', 'cms_excerpt_length' );

// 抜粋機能を固定ページで使えるように設定（デフォルトでは固定ページで抜粋分を指定できない。自動出力される）
add_post_type_support( 'page', 'excerpt' );

/**
 * 抜粋分を指定した長さにして返す
 *
 * @return string $value
 */
function get_flexible_excerpt( $number ) {
	$value = get_the_excerpt();
	$value = wp_trim_words( $value, $number, '...' );
	return $value;
}

/**
 * get_the_excerpt() で取得する文字列に改行タグを挿入
 */
function apply_excerpt_br( $value ) {
	return nl2br( $value );
}
add_filter( 'get_the_excerpt', 'apply_excerpt_br' );

/**
 * ウィジェット機能を有効化
 */
function theme_widgets_init() {
	register_sidebar( array(
		'name'          => 'サイドバーウィジェットエリア',
		'id'            => 'primary-widget-area',
		'description'   => '固定ページのサイドバー',
		'before_widget' => '<aside class="side-inner">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );