<?php

/**
 * Functions
 */


/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );

function enqueue_custom_styles_and_scripts()
{
  // Google Fonts - Gotu
  wp_enqueue_style('google-font-gotu', 'https://fonts.googleapis.com/css2?family=Gotu&display=swap');

  // Google Fonts - Lato
  wp_enqueue_style('google-font-lato', 'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');

  // Google Fonts - Noto Sans JP
  wp_enqueue_style('google-font-noto-sans-jp', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap');

  // Google Fonts - Noto Serif JP
  wp_enqueue_style('google-font-noto-serif-jp', 'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;500;700&display=swap');

  // Swiper CSS
  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');

  // Theme Styles
  wp_enqueue_style('theme-style', get_theme_file_uri('/assets/css/style.css'));

  // jQuery
  wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.js', array(), null, true);

  // jQuery Inview
  wp_enqueue_script('jquery-inview', get_theme_file_uri('/assets/js/jquery.inview.min.js'), array('jquery'), null, true);

  // Swiper JS
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), null, true);

  // Custom Script
  wp_enqueue_script('custom-script', get_theme_file_uri('/assets/js/script.js'), array('jquery', 'swiper-js'), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');


/**
 * コンテンツエディターを非表示にする
 */
add_filter('use_block_editor_for_post',function($use_block_editor,$post){
	if($post->post_type==='page'){
		if(in_array($post->post_name,['about','price','faq'])){
			remove_post_type_support('page','editor');
			return false;
		}
	}
	return $use_block_editor;
},10,2);

/**
 * 管理メニューの「投稿」に関する表示を「ブログ（任意）」に変更
 *
 * 参考：https://wordpress-web.and-ha.com/change-management-screen-post/
 */
function change_post_menu_label()
{
	global $menu;
	global $submenu;
	$menu[5][0] = 'ブログ';
	$submenu['edit.php'][5][0] = 'ブログ一覧';
	$submenu['edit.php'][10][0] = '新しいブログ';
	$submenu['edit.php'][16][0] = 'タグ';
}

/**
 * 管理画面上の「投稿」に関する表示を「ブログ」に変更
 *
 * 参考：https://wordpress-web.and-ha.com/change-management-screen-post/
 */
function change_post_object_label()
{
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'ブログ';
	$labels->singular_name = 'ブログ';
	$labels->add_new = _x('追加', 'ブログ');
	$labels->add_new_item = 'ブログの新規追加';
	$labels->edit_item = 'ブログの編集';
	$labels->new_item = '新規ブログ';
	$labels->view_item = 'ブログを表示';
	$labels->search_items = 'ブログを検索';
	$labels->not_found = '記事が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action('init', 'change_post_object_label');
add_action('admin_menu', 'change_post_menu_label');

/**
 * 人気記事抽出
 */
//記事のアクセス数を表示
function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
					delete_post_meta($postID, $count_key);
					add_post_meta($postID, $count_key, '0');
					return "0 View";
	}
	return $count.' Views';
}

//記事のアクセス数を保存
function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
					$count = 0;
					delete_post_meta($postID, $count_key);
					add_post_meta($postID, $count_key, '0');
	}else{
					$count++;
					update_post_meta($postID, $count_key, $count);
	}
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


/**
 * カスタム投稿のパーマリンクを投稿IDに変更する
 *
 * 参考：https://color-piece.com/blog/wp-custom-post-permalink/
 */
add_filter('post_type_link', 'custom_post_link', 1, 2);
function custom_post_link($link, $post) {
  if($post -> post_type === 'voice') {
    // カスタム投稿名が"voice"の投稿のパーマリンクを「/voice/投稿ID/」の形に書き換え
    return home_url('/voice/'.$post->ID);
  } else {
    return $link;
  }
}

/**
 * 書き換えたパーマリンクに対応したリライトルールを追加
 */
add_filter('rewrite_rules_array', 'custom_post_link_rewrite');
function custom_post_link_rewrite($rules) {
  $rewrite_rules = array(
    'voice/([0-9]+)/?$' => 'index.php?post_type=voice&p=$matches[1]',
  );
  return $rewrite_rules + $rules;
}

/**
 * アーカイブの表示件数変更
 * 管理画面＞設定＞表示設定 は1件で設定している
 */
function change_posts_per_page($query) {
  if ( is_admin() || ! $query->is_main_query() )
      return;

	if($query->is_home()){ // ブログ一覧
	$query->set( 'posts_per_page', '10' ); //10件
	}

	if($query->is_date()){ // 月別アーカイブ
		$query->set( 'posts_per_page', '10' ); //10件
		}

  if ( $query->is_post_type_archive('campaign') ) { // カスタム投稿タイプを指定
      $query->set( 'posts_per_page', '4' ); // 表示件数を指定
  }

  if ( $query->is_post_type_archive('voice') ) { // カスタム投稿タイプを指定
      $query->set( 'posts_per_page', '6' ); // 表示件数を指定
  }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

/**
 * サンクスページの表示
 */
add_action('wp_footer', 'redirect_to_thanks_page');
function redirect_to_thanks_page() {
  $homeUrl = home_url();
  echo <<< EOD
    <script>
      document.addEventListener( 'wpcf7mailsent', function( event ) {
        location = '{$homeUrl}/thanks/';
      }, false );
    </script>
  EOD;
}


