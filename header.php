<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <!-- noindex,nofollow -->
  <meta name="robots" content="noindex, nofollow">
  <?php wp_head(); ?>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-EGG86J58D9"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-EGG86J58D9');
  </script>

</head>

<?php
$home = esc_url(home_url('/'));
$campaign = esc_url(home_url('/campaign'));
$license = esc_url(home_url('/campaign_category/license/'));
$experience = esc_url(home_url('/campaign_category/experience/'));
$diving = esc_url(home_url('/campaign_category/diving/'));
$about = esc_url(home_url('/about'));
$information = esc_url(home_url('/information'));
$blog = esc_url(home_url('/blog'));
$voice = esc_url(home_url('/voice'));
$price = esc_url(home_url('/price'));
$faq = esc_url(home_url('/faq'));
$contact = esc_url(home_url('/contact'));
$privacy = esc_url(home_url('/privacypolicy'));
$terms = esc_url(home_url('/terms-of-service'));
$sitemap = esc_url(home_url('/sitemap'));
?>


  <!-- ヘッダーメニュー -->
  <header class="header">
    <div class="header__inner">
      <h1 class="header__logo">
        <a href="<?php echo $home; ?>" class="header__logo-link"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps.svg" alt="codeups"></a>
      </h1>
      <div class="header__drawer hamburger js-hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <nav class="header__pc-nav pc-nav">
        <ul class="pc-nav__items">
          <li class="pc-nav__item">
            <a href="<?php echo $campaign; ?>" data-en="Campaign">キャンペーン</a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo $about; ?>" data-en="About us">私たちについて</a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo $information; ?>" data-en="Information">ダイビング情報</a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo $blog; ?>" data-en="Blog">ブログ</a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo $voice; ?>" data-en="Voice">お客様の声</a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo $price; ?>" data-en="Price">料金一覧</a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo $faq; ?>" data-en="FAQ">よくある質問</a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo $contact; ?>" data-en="Contact">お問い合わせ</a>
          </li>
        </ul>
      </nav>
      <nav class="header__sp-nav sp-nav js-sp-nav">
        <ul class="sp-nav__items">
          <li class="sp-nav__left-column">
            <ul class="sp-nav__nav">
              <li class="sp-nav__nav-item">
                <a href="<?php echo $campaign; ?>">キャンペーン</a>
                <ul class="sp-nav__sub-nav">
                <?php $course_terms = get_terms('campaign_category', array('hide_empty'=>false)); ?>
                <?php foreach($course_terms as $course_term ) : ?>
                  <li class="sp-nav__sub-nav-item">
                    <a href="<?php echo get_term_link($course_term,'campaign_category'); ?>"><?php echo $course_term->name; ?></a>
                  </li>
                <?php endforeach; ?>
                </ul>
              </li>
              <li class="sp-nav__nav-item">
                <a href="<?php echo $about; ?>">私たちについて</a>
              </li>
              <li class="sp-nav__nav-item">
                <a href="<?php echo $information; ?>">ダイビング情報</a>
                <ul class="sp-nav__sub-nav">
                  <li class="sp-nav__sub-nav-item">
                    <a href="<?php echo $information; ?>?active-tab=tab-1">ライセンス講習</a>
                  </li>
                  <li class="sp-nav__sub-nav-item">
                    <a href="<?php echo $information; ?>?active-tab=tab-3">体験ダイビング</a>
                  </li>
                  <li class="sp-nav__sub-nav-item">
                    <a href="<?php echo $information; ?>?active-tab=tab-2">ファンダイビング</a>
                  </li>
                </ul>
              </li>
              <li class="sp-nav__nav-item">
                <a href="<?php echo $blog; ?>">ブログ</a>
              </li>
            </ul>
          </li>
          <li class="sp-nav__right-column">
            <ul class="sp-nav__nav">
              <li class="sp-nav__nav-item">
                <a href="<?php echo $voice; ?>">お客様の声</a>
              </li>
              <li class="sp-nav__nav-item">
                <a href="<?php echo $price; ?>">料金一覧</a>
                <ul class="sp-nav__sub-nav">
                  <li class="sp-nav__sub-nav-item">
                    <a href="<?php echo $price; ?>#LicenseCourse">ライセンス講習</a>
                  </li>
                  <li class="sp-nav__sub-nav-item">
                    <a href="<?php echo $price; ?>#TrialDiving">体験ダイビング</a>
                  </li>
                  <li class="sp-nav__sub-nav-item">
                    <a href="<?php echo $price; ?>#FunDiving">ファンダイビング</a>
                  </li>
                </ul>
              </li>
              <li class="sp-nav__nav-item">
                <a href="<?php echo $faq; ?>">よくある質問</a>
              </li>
              <li class="sp-nav__nav-item sp-nav__nav-item--mt">
                <a href="<?php echo $privacy; ?>">プライバシー<br>ポリシー</a>
              </li>
              <li class="sp-nav__nav-item sp-nav__nav-item--mt">
                <a href="<?php echo $terms; ?>">利用規約</a>
              </li>
              <li class="sp-nav__nav-item sp-nav__nav-item--mt">
                <a href="<?php echo $contact; ?>">お問い合わせ</a>
              </li>
              <li class="sp-nav__nav-item sp-nav__nav-item--mt">
                <a href="<?php echo $sitemap; ?>">サイトマップ</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header>
