<?php get_header(); ?>

<!-- メインコンテンツ -->
<main>
  <!-- 下層ページのメインビュー -->
  <section class="lower-mv">
    <div class="lower-mv__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/Price-MV-PC.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Price-MV-SP.jpg" alt="">
      </picture>
      <div class="lower-mv__header">
        <h2 class="lower-mv__title">Price</h2>
      </div>
    </div>
  </section>
  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>
  <!-- 料金一覧 -->
  <div class="lower-price price-main">
    <div class="price-main__inner inner">
      <div class="price-main__container">
        <?php
        // 料金表1から4までのループ
        for ($i = 1; $i <= 4; $i++) :
          // 料金表のフィールドを取得
          $priceItems = SCF::get_option_meta('price-options', "price-list_$i");
          $programName = SCF::get_option_meta('price-options', "program_$i");

          // 空でない配列かつ中身が空でない場合に処理を行う
          if (!empty($priceItems) && !empty(array_filter($priceItems[0]))) :
        ?>
            <!-- 価格テーブルの表示 -->
            <div class="price-main__table price-table" id="<?php echo "Course$i"; ?>" data-id="<?php echo "#Course$i"; ?>">
              <div class="price-table-title__block">
                <!-- 共通のアイコンを表示 -->
                <img class="price-table__icon" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/License-course_icon.svg" alt="クジラのアイコン">
                <!-- プログラム名の表示 -->
                <p class="price-table__title"><?php echo $programName; ?></p>
              </div>
              <dl class="price-table__items">
                <?php foreach ($priceItems as $priceItem) : ?>
                  <?php
                  // コース名と価格の取得
                  $course = esc_html($priceItem["course_$i"]);
                  $price = esc_html($priceItem["price_$i"]);
                  ?>
                  <!-- コースと価格の表示 -->
                  <div class="price-table__item <?php echo count($priceItems) === 1 ? 'price-table__item--h88' : ''; ?>">
                    <dt><?php echo $course; ?></dt>
                    <dd><?php echo $price; ?></dd>
                  </div>
                <?php endforeach; ?>
              </dl>
            </div>
        <?php endif;
        endfor;
        ?>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>