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
      <h2 class="lower-mv__title">Terms&nbsp;of&nbsp;Service</h2>
    </div>
  </section>
  <!-- パンくず -->
  <?php get_template_part('/breadcrumb') ?>
  <!-- コンテンツ -->
  <div class="lower-terms terms">
    <div class="terms__inner inner">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <h3 class="terms__title"><?php the_title(); ?></h3>
          <div class="terms__wrap">
            <?php the_content(); ?>
          <?php endwhile; ?>
        <?php endif; ?>
          </div>
    </div>
  </div>

  <?php get_footer(); ?>