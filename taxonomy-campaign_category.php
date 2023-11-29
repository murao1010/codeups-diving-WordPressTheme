<?php get_header(); ?>

  <!-- メインコンテンツ -->
  <main>
    <!-- 下層ページのメインビュー -->
    <section class="lower-mv">
      <div class="lower-mv__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/Campaign-MV-PC.jpg" media="(min-width: 768px)">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Campaign-MV-SP.jpg" alt="２匹の黄色い魚が泳いでいる様子">
        </picture>
      </div>
      <div class="lower-mv__header">
        <h2 class="lower-mv__title">Campaign</h2>
      </div>
    </section>
    <!-- パンくず -->
    <?php get_template_part('/breadcrumb') ?>
    <!-- キャンペーン -->
    <div class="lower-campaign campaign-main">
      <div class="campaign-main__inner inner">
        <!-- キャンペーン カテゴリー -->
        <nav class="campaign-main__category-warp category">
          <ul class="category__items">
            <li class="category__item">
              <a href="<?php echo esc_url(home_url('/campaign')); ?>">ALL</a>
            </li>
            <?php
          $terms = get_terms(array(
            'taxonomy' => 'campaign_category',
            'hide_empty' => false,
          ));
          if ($terms) {
            foreach ($terms as $term) {
          ?>
            <li class="category__item <?php echo (is_tax('campaign_category', $term->term_id)) ? 'is-active' : ''; ?>">
              <a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
            </li>
          <?php
            }
          }
          ?>
          </ul>
        </nav>
        <!-- キャンペーン アイテム -->
        <div class="campaign-main__contents">
        <?php
        $term_object = get_queried_object();
        $term_slug = $term_object->slug;
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'campaign',
          'posts_per_page' => 4,
          'taxonomy' => 'campaign_category',
          'term' => $term_slug,
          'paged' => $paged,
        );
        $the_query = new WP_Query($args);
        ?>

        <?php if ($the_query -> have_posts()) : while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
          <div class="campaign-main__item">
            <div class="campaign-main-card">
              <div class="campaign-main-card__image">
              <?php
                  $customerImage = get_field('campaign_image');
                  if (!empty($customerImage)) : ?>
                    <img src="<?php echo esc_url($customerImage['url']); ?>" alt="<?php echo esc_attr($customerImage['alt']); ?>">
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri('full')); ?>/assets/images/common/noimage.png" alt="サムネイル画像no-image" />
                  <?php endif; ?>
              </div>
              <div class="campaign-main-card__body">
                <div class="campaign-main-card__title-block">
                  <p class="campaign-main-card__tag">
                  <?php
                      $terms = get_the_terms($post->ID, 'campaign_category');
                      if (!empty($terms)) {
                        foreach ($terms as $term) :
                          echo $term->name;
                        endforeach;
                      } else {
                        echo '未分類';
                      }
                      ?>
                  </p>
                  <h3 class="campaign-main-card__title"><?php the_title(); ?></h3>
                </div>
                <div class="campaign-main-card__price-block">
                  <p class="campaign-main-card__text">全部コミコミ(お一人様)</p>
                  <div class="campaign-main-card__price-wrap">
                    <p class="campaign-main-card__price-before"><?php the_field('campaign_price_before'); ?></p>
                    <p class="campaign-main-card__price-after"><?php the_field('campaign_price_after'); ?></p>
                  </div>
                </div>
                <div class="campaign-main-card__text-block">
                  <p class="campaign-main-card__text2"><?php the_field('campaign_text'); ?></p>
                </div>
                <div class="campaign-main-card__info">
                  <p class="campaign-main-card__info-date"><?php the_field('campaign_date'); ?></p>
                  <p class="campaign-main-card__info-text">ご予約・お問い合わせはコチラ</p>
                </div>
                <div class="campaign-main-card__button-wrap">
                  <a href="<?php echo esc_url(home_url('/page-contact.php')); ?>" class="button">Contact&nbsp;us<span></span></a>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile;
          endif; ?>
        </div>
      </div>
    </div>

    <!-- ページネーション -->
    <div class="lower-pagination pagination">
      <div class="pagination__inner inner">
      <?php if (function_exists('wp_pagenavi')) {
        wp_pagenavi(array('query' => $the_query));
      } ?>
      </div>
    </div>

<?php get_footer(); ?>