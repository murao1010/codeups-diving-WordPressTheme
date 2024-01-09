<?php get_header(); ?>

<!-- メインコンテンツ -->
<main>
  <!-- 下層ページのメインビュー -->
  <section class="lower-mv">
    <div class="lower-mv__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/Aboutus-MV-PC.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Aboutus-MV-SP.jpg" alt="青い空とシーサー">
      </picture>
      <div class="lower-mv__header">
        <h2 class="lower-mv__title">About&nbsp;us</h2>
      </div>
    </div>
  </section>
  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <!-- 私たちについて -->
  <div class="lower-about about-main">
    <div class="about-main__inner inner">
      <div class="about-main__container">
        <div class="about-main__images">
          <div class="about-main__image-1">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/About_1.jpg" alt="屋根の上のシーサー">
          </div>
          <div class="about-main__image-2">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/About_2.jpg" alt="綺麗な海を泳ぐ黄色い熱帯魚">
          </div>
        </div>
        <div class="about-main__contents-wrap">
          <h3 class="about-main__catchcopy">
            <?php echo nl2br(get_field('about_cathchcopy')); ?>
          </h3>
          <div class="about-main__text-block">
            <p class="about-main__text">
              <?php echo nl2br(get_field('about_leadcopy')); ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ギャラリー -->
  <section class="lower-gallery gallery">
    <div class="gallery__inner inner">
      <div class="gallery__title section-title">
        <p class="section-title__en">gallery</p>
        <h3 class="section-title__jp">フォト</h3>
      </div>
      <div class="gallery__container">
        <?php
        $photos = SCF::get_option_meta('gallery-options', 'gallery_photos');
        if (!empty($photos)) : // 繰り返しフィールドに値がある場合に処理を行う
          foreach ($photos as $photo) : // 繰り返し構文で各値を順次取り出す
            $gallery_image = wp_get_attachment_image_src($photo['gallery_photo'], 'full'); // work_imageを取得して変数に代入する
            if ($gallery_image) :
              $gallery_image_url = esc_url($gallery_image[0]);
              $alt = get_post_meta($gallery_image, '_wp_attachment_image_alt', true);
            endif;
        ?>
            <?php if ($gallery_image) : ?>
              <div class="gallery__image js-gallery">
                <img src="<?php echo $gallery_image_url; ?>" alt="フォトギャラリーの写真">
              </div>
            <?php endif; ?>
          <?php
          endforeach;
        else : ?>
          <p>まだ投稿がありません。</p>
        <?php endif; ?>
      </div>
    </div>
    <div id="gallery__gray-display"></div>
  </section>

  <?php get_footer(); ?>