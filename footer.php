    <?php
    $contact = esc_url(home_url('/contact'));
    ?>

    <!-- お問い合わせ -->
    <?php if (! is_404() && ! is_page(array('contact', 'thanks'))) : ?>
    <section class="contact top-contact">
      <div class="contact__inner inner">
        <div class="contact__contents">
          <div class="contact__detail">
            <div class="contact__logo">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps_1.svg" alt="codeups">
            </div>
            <div class="contact__map-area">
              <div class="contact__map-text">
                沖縄県那覇市1-1<br>
                TEL:0120-000-0000<br>
                営業時間:8:30-19:00<br>
                定休日:毎週火曜日
              </div>
              <div class="contact__map">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114546.12332901891!2d127.52880581040466!3d26.210781257400313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e5697141a6b58b%3A0x2cd8aff616585e98!2z5rKW57iE55yM6YKj6KaH5biC!5e0!3m2!1sja!2sjp!4v1691284832444!5m2!1sja!2sjp"
                  width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
          <div class="contact__contact">
            <div class="contact__title-wrap">
              <div class="contact__title section-title">
                <p class="section-title__en section-title__en--big-fs">contact</p>
                <h2 class="section-title__jp section-title__jp--contact">お問い合わせ</h2>
              </div>
            </div>
            <p class="contact__link">ご予約・お問い合わせはコチラ</p>
            <div class="contact__button-wrap">
              <a href="<?php echo $contact?>" class="button">Contact&nbsp;us<span></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php endif; ?>
  <?php if (! is_404() && ! is_page('thanks')) : ?>
  <!-- トップに戻るボタン -->
  <div class="top-button">
    <a href="header"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/toTOP.png" alt="画面の上部に戻るボタン"></a>
  </div>
  <?php endif; ?>
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
  // $contact = esc_url(home_url('/contact'));
  $privacy = esc_url(home_url('/privacypolicy'));
  $terms = esc_url(home_url('/terms-of-service'));
  $sitemap = esc_url(home_url('/sitemap'));
  ?>


<!-- フッターメニュー -->
  <footer>
    <div class="footer top-footer <?php if (is_404()) {echo 'footer--mt0 top-footer--mt0'; }; ?>">
      <div class="footer__inner inner">
        <div class="footer__heading">
          <div class="footer__logo">
            <a href="<?php echo $home; ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps_2.svg" alt="codeups"></a>
          </div>
          <div class="footer__sns">
            <a href="https://www.facebook.com" target="_blank" class="footer__sns-facebook"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Facebook-Logo.png"
                alt="facebookのロゴマーク"></a>
            <a href="https://www.instagram.com" target="_blank" class="footer__sns-instagram"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Instagram-Logo.png"
                alt="instagramのロゴマーク"></a>
          </div>
        </div>
        <div class="footer__body">
          <div class="footer__body-left">
            <div class="footer__column">
              <ul class="footer__nav">
                <li class="footer__nav-item">
                  <a href="<?php echo $campaign; ?>">キャンペーン</a>
                  <ul class="footer__sub-nav">
                  <?php $course_terms = get_terms('campaign_category', array('hide_empty'=>false)); ?>
                  <?php foreach($course_terms as $course_term ) : ?>
                    <li class="footer__sub-nav-item">
                      <a href="<?php echo get_term_link($course_term,'campaign_category'); ?>"><?php echo $course_term->name; ?></a>
                    </li>
                  <?php endforeach; ?>
                  </ul>
                </li>
                <li class="footer__nav-item">
                  <a href="<?php echo $about; ?>">私たちについて</a>
                </li>
              </ul>
            </div>
            <div class="footer__column">
              <ul class="footer__nav">
                <li class="footer__nav-item">
                  <a href="<?php echo $information; ?>">ダイビング情報</a>
                  <ul class="footer__sub-nav">
                    <li class="footer__sub-nav-item">
                      <a href="<?php echo $information; ?>?active-tab=tab-1" class="js-tab-switch" data-tab="tab-1">ライセンス講習</a>
                    </li>
                    <li class="footer__sub-nav-item">
                      <a href="<?php echo $information; ?>?active-tab=tab-3" class="js-tab-switch" data-tab="tab-3">体験ダイビング</a>
                    </li>
                    <li class="footer__sub-nav-item">
                      <a href="<?php echo $information; ?>?active-tab=tab-2" class="js-tab-switch" data-tab="tab-2">ファンダイビング</a>
                    </li>
                  </ul>
                </li>
                <li class="footer__nav-item">
                  <a href="<?php echo $blog; ?>">ブログ</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="footer__body-right">
            <div class="footer__column">
              <ul class="footer__nav">
                <li class="footer__nav-item">
                  <a href="<?php echo $voice; ?>">お客様の声</a>
                </li>
                <li class="footer__nav-item">
                  <a href="<?php echo $price; ?>">料金一覧</a>
                  <ul class="footer__sub-nav">
                  <?php
                    // 料金表1から4までのループ
                    for ($i = 1; $i <= 4; $i++) :
                      // 料金表のフィールドを取得
                      $priceItems = SCF::get_option_meta('price-options', "price-list_$i");
                      $programName = SCF::get_option_meta('price-options', "program_$i");
                      // 空でない配列かつ中身が空でない場合に処理を行う
                      if (!empty($priceItems) && !empty(array_filter($priceItems[0]))) :
                    ?>
                    <li class="footer__sub-nav-item">
                      <a href="<?php echo $price; ?>#<?php echo "Course$i"; ?>"><?php echo $programName; ?></a>
                    </li>
                    <?php endif;
                    endfor;
                    ?>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="footer__column">
              <ul class="footer__nav">
                <li class="footer__nav-item">
                  <a href="<?php echo $faq; ?>">よくある質問</a>
                </li>
                <li class="footer__nav-item footer__nav-item--mt">
                  <a href="<?php echo $privacy; ?>">プライバシー<br class="u-mobile">ポリシー</a>
                </li>
                <li class="footer__nav-item footer__nav-item--mt">
                  <a href="<?php echo $terms; ?>">利用規約</a>
                </li>
                <li class="footer__nav-item footer__nav-item--mt">
                  <a href="<?php echo $contact; ?>">お問い合わせ</a>
                </li>
                <li class="footer__nav-item footer__nav-item--mt">
                  <a href="<?php echo $sitemap; ?>">サイトマップ</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="footer__copyright">
        <small>Copyright &copy; 2021 - 2023 CodeUps LLC. All Rights Reserved.</small>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>

</html>