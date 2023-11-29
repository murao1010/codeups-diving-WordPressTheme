<?php get_header(); ?>

  <!-- メインコンテンツ -->
  <main>
    <!-- 下層ページのメインビュー -->
    <section class="lower-mv">
      <div class="lower-mv__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/FAQ-MV-PC.jpg" media="(min-width: 768px)">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/FAQ-MV-SP.jpg" alt="青空と透き通った海と白い砂浜の様子">
        </picture>
      </div>
      <div class="lower-mv__header">
        <h2 class="lower-mv__title">FAQ</h2>
      </div>
    </section>
    <!-- パンくず -->
    <?php get_template_part('/breadcrumb') ?>

    <!-- FAQ -->
    <div class="lower-faq faq-main">
      <div class="faq-main__inner inner">
        <div class="faq-main__contents">
        <?php if ( have_posts() ) : ?>
            <?php while(have_posts()): the_post(); ?>
              <?php
                $faqs = SCF::get('faq'); // 繰り返しフィールドの値を取得する
                if (!empty($faqs)) { // 繰り返しフィールドに値がある場合に処理を行う
                  foreach ($faqs as $faq) { // 繰り返し構文で各値を順次取り出す
                    $faqQuestion = esc_html($faq['faq_q']); // license_courseをエスケープ処理して変数に代入する
                    $faqAnswer = esc_html($faq['faq_a']); // license_feeをエスケープ処理して変数に代入する
                    ?>
                    <div class="faq-main__content qa">
                      <dt class="qa__head">
                        <p class="qa__head-text">
                          <?php echo $faqQuestion ?>
                        </p>
                      </dt>
                      <dd class="qa__body">
                        <p class="qa__body-text">
                          <?php echo $faqAnswer ?>
                        </p>
                      </dd>
                    </div>
                    <?php
                  }
                }
              ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>

<?php get_footer(); ?>