<?php get_header(); ?>

  <!-- メインコンテンツ -->
  <main>
    <!-- 下層ページのメインビュー -->
    <section class="lower-mv">
      <div class="lower-mv__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/Contact-MV-PC.jpg" media="(min-width: 768px)">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Contact-MV-SP.jpg" alt="綺麗な海が波打つところを上空から見た様子">
        </picture>
      </div>
      <div class="lower-mv__header">
        <h2 class="lower-mv__title">Contact</h2>
      </div>
    </section>
    <!-- パンくず -->
    <?php get_template_part('/breadcrumb') ?>

    <!-- コンタクトフォーム -->
    <div class="lower-contact contact-main">
      <div class="contact-main__inner inner">
        <p class="contact-main__text js-warningMessage">※必須項目が入力されていません。入力してください。</p>
        <?php echo do_shortcode('[contact-form-7 id="eba1c99" title="お問い合わせフォーム" html_id="js-form" html_class="contact-main__form contact-form"]'); ?>
      </div>
    </div>
  </main>


<?php get_footer(); ?>