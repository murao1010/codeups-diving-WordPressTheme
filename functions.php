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
/*記事のアクセス数を表示*/
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

/*記事のアクセス数を保存*/
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
 * 表示件数変更
 * 管理画面＞設定＞表示設定 は10件で設定している
 */
function change_posts_per_page($query) {
  if ( is_admin() || ! $query->is_main_query() )
      return;

	/* カスタム投稿の表示件数変更*/
  if ( $query->is_post_type_archive('campaign') ) {
      $query->set( 'posts_per_page', '4' );
  }
  if ( $query->is_post_type_archive('voice') ) {
      $query->set( 'posts_per_page', '6' );
  }

	/* カスタムタクソノミーの表示件数変更*/
	if ( $query->is_tax('campaign_category') ) {
    $query->set( 'posts_per_page', '4' );
  }
	if ( $query->is_tax('voice_category') ) {
    $query->set( 'posts_per_page', '6' );
  }
}

add_action( 'pre_get_posts', 'change_posts_per_page' );


/**
 * Contact Form 7 セレクトボックスの選択肢をカスタム投稿のタイトルから自動生成
 */
//関数の作成
function campaign_selectlist($tag, $unused)
{
    //セレクトボックスの名前が'menu-65'かどうか
    if ($tag['name'] != 'menu-65') {
        return $tag;
    }

    //get_posts()でセレクトボックスの中身を作成する
    //クエリの作成
    $args = array(
        'numberposts' => -1,
        'post_type' => 'campaign', //カスタム投稿タイプを指定
        //並び順⇒セレクトボックス内の表示順
        'orderby' => 'ID',
        'order' => 'ASC'
    );

    //クエリをget_posts()に入れる
    $job_posts = get_posts($args);

    //クエリがなければ戻す
    if (!$job_posts) {
        return $tag;
    }

    //セレクトボックスにforeachで入れる
    foreach ($job_posts as $job_post) {
        $tag['raw_values'][] = $job_post->post_title;
        $tag['values'][] = $job_post->post_title;
        $tag['labels'][] = $job_post->post_title;
    }

    return $tag;
}
add_filter('wpcf7_form_tag', 'campaign_selectlist', 10, 2);

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

/**
 * Contact Form 7で自動挿入されるPタグ、brタグを削除
 */
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

/**
 * the_archive_title 余計な文字を削除
 */
add_filter( 'get_the_archive_title', function ($title) {
  if (is_category()) {
      $title = single_cat_title('',false);
  } elseif (is_tag()) {
      $title = single_tag_title('',false);
} elseif (is_tax()) {
    $title = single_term_title('',false);
} elseif (is_post_type_archive() ){
  $title = post_type_archive_title('',false);
} elseif (is_date()) {
    $title = get_the_time('Y年n月');
} elseif (is_search()) {
    $title = '検索結果：'.esc_html( get_search_query(false) );
} elseif (is_404()) {
    $title = '「404」ページが見つかりません';
} else {

}
  return $title;
});

/**
 * SCFでのオプションページ作成
 * @param string $page_title ページのtitle属性値
 * @param string $menu_title 管理画面のメニューに表示するタイトル
 * @param string $capability メニューを操作できる権限（manage_options とか）
 * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
 * @param string|null $icon_url メニューに表示するアイコンの URL
 * @param int $position メニューの位置
 */
SCF::add_options_page( 'CodeUps-Diving', 'ギャラリー画像', 'manage_options', 'gallery-options','dashicons-images-alt2','7' );
SCF::add_options_page( 'CodeUps-Diving', '料金一覧', 'manage_options', 'price-options','dashicons-money-alt','8' );
SCF::add_options_page( 'CodeUps-Diving', 'よくある質問', 'manage_options', 'faq-options','dashicons-editor-help','9' );

/**
 * 固定ページの不要な項目を非表示にする
 */
function my_remove_post_editor_support() {
  remove_post_type_support( 'page', 'editor' );//本文
  remove_post_type_support( 'page', 'thumbnail' ); // アイキャッチ
}
add_action( 'init' , 'my_remove_post_editor_support' );

/**
 * 固定ページのメタボックスを非表示にする
 */
function remove_pageedit_metabox() {
  remove_meta_box( 'postcustom','page','normal' ); // カスタムフィールド
  remove_meta_box( 'commentstatusdiv','page','normal' ); // ディスカッション
  remove_meta_box( 'slugdiv','page','normal' ); // スラッグ
  remove_meta_box( 'authordiv','page','normal' ); // 投稿者
  remove_meta_box( 'pageparentdiv', 'page', 'normal' ); // ページ属性
  remove_meta_box( 'revisionsdiv','page','normal' ); // リビジョン
  remove_meta_box( 'submitdiv', 'page', 'side' ); // 公開
}
add_action('admin_menu','remove_pageedit_metabox');

/**
 * カスタム投稿のタイトル部分のプレースホルダー
 */
function custom_editor_placeholder($placeholder, $post) {
  if ($post->post_type == 'voice') {
    $placeholder = 'タイトルを入力【20字以内で入力してください】';
  } elseif ($post->post_type == 'campaign') {
    $placeholder = 'キャンペーン名を入力してください';
  }

  return $placeholder;
}

add_filter('enter_title_here', 'custom_editor_placeholder', 10, 2);
