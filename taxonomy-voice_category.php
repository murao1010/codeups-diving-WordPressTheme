<?php get_header(); ?>

<!-- メインコンテンツ -->
<main>
  <!-- 下層ページのメインビュー -->
  <section class="lower-mv">
    <div class="lower-mv__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/Voice-MV-PC.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Voice-MV-SP.jpg" alt="ダイバー達が綺麗な海に浮いている様子">
      </picture>
    </div>
    <div class="lower-mv__header">
      <h2 class="lower-mv__title">Voice</h2>
    </div>
  </section>
  <!-- パンくず -->
  <?php get_template_part('/breadcrumb') ?>
  <!-- お客様の声 -->
  <div class="lower-voice voice-main">
    <div class="voice-main__inner inner">
      <!-- お客様の声 カテゴリー -->
      <nav class="voice-main__category-warp category">
        <ul class="category__items">
          <li class="category__item">
            <a href="<?php echo esc_url(home_url('/voice')); ?>">ALL</a>
          </li>
          <?php
          $terms = get_terms(array(
            'taxonomy' => 'voice_category',
            'hide_empty' => false,
          ));
          if ($terms) :
            foreach ($terms as $term) :
          ?>
              <li class="category__item <?php echo (is_tax('voice_category', $term->term_id)) ? 'is-active' : ''; ?>">
                <a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
              </li>
          <?php
            endforeach;
          endif;
          ?>
        </ul>
      </nav>
      <!-- お客様の声 アイテム -->
      <div class="voice-main__contents voice-cards">
        <!-- WPループ処理開始 -->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="voice-cards__item voice-card">
              <div class="voice-card__head">
                <div class="voice-card__head-textarea">
                  <div class="voice-card__tag-wrap">
                    <?php if (have_rows('voice_age_gender')) : ?>
                      <?php while (have_rows('voice_age_gender')) : the_row(); ?>
                        <?php if (!empty(get_sub_field('age'))) : ?>
                          <div class="voice-card__age-sex"><?php the_sub_field('age'); ?>代(<?php the_sub_field('gender'); ?>)</div>
                        <?php endif; ?>
                        <div class="voice-card__tag">
                          <?php
                          $terms = get_the_terms($post->ID, 'voice_category');
                          if (!empty($terms)) :
                            foreach ($terms as $term) :
                              echo $term->name;
                            endforeach;
                          else :
                            echo '未分類';
                          endif;
                          ?>
                        </div>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  </div>
                  <h3 class="voice-card__title"><?php the_title(); ?></h3>
                </div>
                <div class="voice-card__image">
                  <?php
                  $customerImage = get_field('voice_image');
                  if (!empty($customerImage)) : ?>
                    <img src="<?php echo esc_url($customerImage['url']); ?>" alt="<?php echo esc_attr($customerImage['alt']); ?>">
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri('full')); ?>/assets/images/common/noimage.png" alt="サムネイル画像no-image" />
                  <?php endif; ?>
                </div>
              </div>
              <div class="voice-card__body">
                <div class="voice-card__text-block">
                  <p class="voice-card__text"><?php the_field('voice_main'); ?></p>
                </div>
              </div>
            </div>
        <?php endwhile;
        endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
    <!-- ページネーション -->
    <div class="lower-pagination pagination">
      <div class="pagination__inner inner">
        <?php wp_pagenavi(); ?>
      </div>
    </div>

    <?php get_footer(); ?>