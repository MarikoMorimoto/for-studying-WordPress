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
	if ( is_singular( 'post') ) { // 個別の投稿か
		$category_obj = get_the_category();
		return $category_obj[0]->name;
	} elseif ( is_page() ) {
		return get_the_title();
	} elseif( is_category() ) { // カテゴリーページか
		return single_cat_title(); // 現在のカテゴリー名を出力
	}

	return '';
}

/**
 * 子ページを取得する関数
 *
 * @param int $number 指定なしのときは -1 全件取得
 *
 * @return WP_Query
 */
function get_child_pages( $number = -1 ) {
	$parent_id = get_the_ID();
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
	if ( is_page() ) {
		return get_the_post_thumbnail( get_queried_object()->ID, 'detail' );
	} elseif ( is_category( 'news' ) || is_singular( 'post' ) ) {
		return '<img src="' . get_template_directory_uri() . '/assets/images/bg-page-news.jpg" />';
	} else {
		return '<img src="' . get_template_directory_uri() . '/assets/images/bg-page-dummy.jpg" />';
	}
}