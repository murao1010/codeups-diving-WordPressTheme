<?php get_header(); ?>

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
  <!-- ブログ一覧 -->
  <div class="lower-blog blog-main">
    <div class="blog-main__inner inner">
      <div class="blog-main__content">
        <div class="blog-main__articles">
          <div class="blog-cards blog-cards--col2">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="blog-cards__item blog-card">
                  <div class="blog-card__image">
                    <?php if (has_post_thumbnail()) : ?>
                      <!-- アイキャッチ画像指定されている場合 -->
                      <?php $post_title = get_the_title(); ?>
                      <?php the_post_thumbnail('full', array('alt' => $post_title,)); ?>
                    <?php else : ?>
                      <!-- アイキャッチ画像指定されていない場合に代替画像を表示 -->
                      <img src="<?php echo esc_url(get_template_directory_uri('full')); ?>/assets/images/common/noimage.png" alt="サムネイル画像no-image" />
                    <?php endif; ?>
                  </div>
                  <div class="blog-card__body">
                    <div class="blog-card__meta">
                      <time datetime="<?php the_time('c'); ?>" class="blog-card__date"><?php the_time('Y/m/d'); ?></time>
                    </div>
                    <h3 class="blog-card__title"><?php the_title(); ?></h3>
                    <div class="blog-card__text-block">
                      <p class="blog-card__text">
                      <?php echo mb_substr(get_the_excerpt(), 0, 85); ?>
                      </p>
                    </div>
                  </div>
                </a>
            <?php endwhile;
            endif; ?>
          </div>
          <!-- WP-Pagenaviのページネーション -->
          <div class="lower-pagination wp-pagenavi wp-pagenavi--single pagination">
            <div class="wp-pagenavi__inner inner">
            <?php wp_pagenavi(); ?>
            </div>
          </div>
        </div>
        <!-- サイドバー -->
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>