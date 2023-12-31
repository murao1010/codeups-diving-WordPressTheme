<?php get_header(); ?>

  <!-- メインコンテンツ -->
  <main>
    <!-- 下層ページのメインビュー -->
    <section class="lower-mv">
      <div class="lower-mv__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/SiteMAP-MV-PC.jpg" media="(min-width: 768px)">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/SiteMAP-MV-SP.jpg" alt="珊瑚礁とその近くを泳ぐ綺麗な魚群の様子">
        </picture>
      </div>
      <div class="lower-mv__header">
        <h2 class="lower-mv__title">Site&nbsp;MAP</h2>
      </div>
    </section>
    <!-- パンくず -->
    <?php get_template_part('/breadcrumb') ?>

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

    <!-- サイトマップ -->
    <div class="lower-sitemap sitemap">
      <div class="sitemap__inner inner">
        <div class="sitemap__body">
          <div class="sitemap__body-left">
            <div class="sitemap__column">
              <ul class="sitemap__nav">
                <li class="sitemap__nav-item">
                  <a href="<?php echo $campaign; ?>">キャンペーン</a>
                  <ul class="sitemap__sub-nav">
                  <?php $course_terms = get_terms('campaign_category', array('hide_empty'=>false)); ?>
                  <?php foreach($course_terms as $course_term ) : ?>
                    <li class="sitemap__sub-nav-item">
                      <a href="<?php echo get_term_link($course_term,'campaign_category'); ?>"><?php echo $course_term->name; ?></a>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </li>
                <li class="sitemap__nav-item">
                  <a href="<?php echo $about; ?>">私たちについて</a>
                </li>
              </ul>
            </div>
            <div class="sitemap__column">
              <ul class="sitemap__nav">
                <li class="sitemap__nav-item">
                  <a href="<?php echo $information; ?>">ダイビング情報</a>
                  <ul class="sitemap__sub-nav">
                    <li class="sitemap__sub-nav-item">
                      <a href="<?php echo $information; ?>?active-tab=tab-1">ライセンス講習</a>
                    </li>
                    <li class="sitemap__sub-nav-item">
                      <a href="<?php echo $information; ?>?active-tab=tab-3">体験ダイビング</a>
                    </li>
                    <li class="sitemap__sub-nav-item">
                      <a href="<?php echo $information; ?>?active-tab=tab-2">ファンダイビング</a>
                    </li>
                  </ul>
                </li>
                <li class="sitemap__nav-item">
                  <a href="<?php echo $blog; ?>">ブログ</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="sitemap__body-right">
            <div class="sitemap__column">
              <ul class="sitemap__nav">
                <li class="sitemap__nav-item">
                  <a href="<?php echo $voice; ?>">お客様の声</a>
                </li>
                <li class="sitemap__nav-item">
                  <a href="<?php echo $price; ?>">料金一覧</a>
                  <ul class="sitemap__sub-nav">
                  <?php
                    // 料金表1から4までのループ
                    for ($i = 1; $i <= 4; $i++) :
                      // 料金表のフィールドを取得
                      $priceItems = SCF::get_option_meta('price-options', "price-list_$i");
                      $programName = SCF::get_option_meta('price-options', "program_$i");
                      // 空でない配列かつ中身が空でない場合に処理を行う
                      if (!empty($priceItems) && !empty(array_filter($priceItems[0]))) :
                    ?>
                    <li class="sitemap__sub-nav-item">
                      <a href="<?php echo $price; ?>#<?php echo "Course$i"; ?>"><?php echo $programName; ?></a>
                    </li>
                    <?php endif;
                    endfor;
                    ?>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="sitemap__column">
              <ul class="sitemap__nav">
                <li class="sitemap__nav-item">
                  <a href="<?php echo $faq; ?>">よくある質問</a>
                </li>
                <li class="sitemap__nav-item sitemap__nav-item--mt">
                  <a href="<?php echo $privacy; ?>">プライバシー<br class="u-mobile">ポリシー</a>
                </li>
                <li class="sitemap__nav-item sitemap__nav-item--mt">
                  <a href="<?php echo $terms; ?>">利用規約</a>
                </li>
                <li class="sitemap__nav-item sitemap__nav-item--mt">
                  <a href="<?php echo $contact; ?>">お問い合わせ</a>
                </li>
                <li class="sitemap__nav-item sitemap__nav-item--mt">
                  <a href="<?php echo $sitemap; ?>">サイトマップ</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php get_footer(); ?>