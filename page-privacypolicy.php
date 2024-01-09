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
      <h2 class="lower-mv__title">Privacy&nbsp;Policy</h2>
    </div>
  </section>
  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>
  <!-- コンテンツ -->
  <div class="lower-privacy-policy privacy-policy">
    <div class="privacy-policy__inner inner">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <h3 class="privacy-policy__title"><?php the_title(); ?></h3>
          <div class="privacy-policy__wrap">
            <?php the_content(); ?>
          <?php endwhile; ?>
        <?php endif; ?>
          </div>
    </div>
  </div>

  <?php get_footer(); ?>