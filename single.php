<?php get_header(); ?>

<!-- メインコンテンツ -->
<main>
  <!-- 下層ページのメインビュー -->
  <section class="lower-mv">
    <div class="lower-mv__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/Blog-MV-PC.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Blog-MV-SP.jpg" alt="光が差し込む綺麗な海を小魚の大群が泳いでいる様子">
      </picture>
    </div>
    <div class="lower-mv__header">
      <h2 class="lower-mv__title">Blog</h2>
    </div>
  </section>
  <!-- パンくず -->
  <?php get_template_part('/breadcrumb') ?>
  <!-- ブログ -->
  <div class="lower-blog blog-main">
    <div class="blog-main__inner inner">
      <div class="blog-main__content">
        <div class="blog-main__article blog-article">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
          <div class="blog-article__mata">
            <time class="blog-article__published" datetime="<?php the_time('c'); ?>"><?php the_time('Y/m/d'); ?></time>
          </div>
          <h1 class="blog-article__title"><?php the_title(); ?></h1>
          <div class="blog-article__body">
            <div class="blog-article__image">
              <?php if (has_post_thumbnail()) : ?>
                <!-- アイキャッチ画像指定されている場合 -->
                <?php $post_title = get_the_title(); ?>
                <?php the_post_thumbnail('full', array('alt' => $post_title,)); ?>
              <?php else : ?>
                <!-- アイキャッチ画像指定されていない場合に代替画像を表示 -->
                <img src="<?php echo esc_url(get_template_directory_uri('full')); ?>/assets/images/common/noimage.png" alt="サムネイル画像no-image" />
              <?php endif; ?>
            </div>
          </div>
          <div class="blog-article__content">
            <?php the_content(); ?>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
          <!-- ページネーション -->
          <div class="lower-pagination lower-pagination--single pagination">
            <div class="pagination__inner inner">
              <ul class="pagination__items">
                <li class="pagination__prev">
                  <?php
                  $prev_post = get_previous_post();
                  if (!empty($prev_post)) {
                    $url = get_permalink($prev_post->ID);
                    echo '<a class="pagination__item-prev" href="' . esc_url($url) . '"></a>';
                  }
                  ?>
                </li>
                <li class="pagination__next">
                  <?php
                  $next_post = get_next_post();
                  if (!empty($next_post)) {
                    $url = get_permalink($next_post->ID);
                    echo '<a class="pagination__item-next" href="' . esc_url($url) . '"></a>';
                  }
                  ?>
                </li>
              </ul>
            </div>
          </div>




        </div>
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>