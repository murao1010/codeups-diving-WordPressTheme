<?php get_header(); ?>

<?php
$campaign = esc_url(home_url('/campaign'));
$about = esc_url(home_url('/about'));
$information = esc_url(home_url('/information'));
$blog = esc_url(home_url('/blog'));
$voice = esc_url(home_url('/voice'));
$pricePage = esc_url(home_url('/price'));
$contact = esc_url(home_url('/contact'));
?>

<body class="js-fixed">
  <!-- ローディング -->
  <div class="loading js-loading">
    <div class="loading__wrapper">
      <div class="loading__inner js-loading-title">
        <h2 class="loading__main">DIVING</h2>
        <p class="loading__sub">into&nbsp;the&nbsp;ocean</p>
      </div>
      <div class="loading__mask">
        <img class="loading__img-left loading__img-left--fadeUp1" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/loading_1.jpg" alt="綺麗な海を泳ぐウミガメ" />
        <img class="loading__img-right loading__img-right--fadeUp2" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/loading_2.jpg" alt="綺麗な海を泳ぐウミガメ" />
      </div>
    </div>
  </div>

  <!-- メインコンテンツ -->
  <main>
    <!-- ファーストビュー -->
    <section class="mv">
      <!-- Swiper -->
      <div class="js-mv-swiper">
        <div class="swiper-wrapper">
        <?php
          // ACFで作成したカスタムフィールドから画像情報を取得
          $i = 1;
          while ($desktop_image = get_field('desktop_image_' . $i)) :
            $mobile_image = get_field('mobile_image_' . $i);

            // デスクトップ画像とモバイル画像が両方存在する場合にのみ処理を追加
            if ($desktop_image && $mobile_image) :
          ?>
            <div class="swiper-slide">
              <div class="mv__image">
                <picture>
                  <source srcset="<?php echo esc_url($desktop_image['url']); ?>" media="(min-width: 768px)">
                  <img src="<?php echo esc_url($mobile_image['url']); ?>" alt="<?php echo esc_attr($mobile_image['alt']); ?>">
                </picture>
              </div>
            </div>
          <?php
            endif;
            $i++;
          endwhile;
          ?>
        </div>
      </div>
      </div>
      <div class="mv__header">
        <h2 class="mv__title">DIVING</h2>
        <p class="mv__sub-title">into&nbsp;the&nbsp;ocean</p>
      </div>
    </section>
    <!-- キャンペーン -->
    <section class="campaign top-campaign">
      <div class="campaign__inner inner">
        <div class="campaign__title section-title">
          <p class="section-title__en">campaign</p>
          <h2 class="section-title__jp">キャンペーン</h2>
        </div>
        <div class="campaign__content">
          <!-- Swiper -->
          <div class="swiper js-campaign-swiper">
            <?php
            $args = [
              'post_type' => 'campaign',
              'posts_per_page' => 4,
            ];
            $the_query = new WP_Query($args);
            ?>
            <?php if ($the_query->have_posts()) : ?>
              <div class="swiper-wrapper">
                <!-- ▼ Swiper ループ ▼ -->
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                  <div class="swiper-slide campaign__item">
                    <div class="campaign-card">
                      <div class="campaign-card__image">
                        <?php
                        $customerImage = get_field('campaign_image');
                        if (!empty($customerImage)) : ?>
                          <img src="<?php echo esc_url($customerImage['url']); ?>" alt="<?php echo esc_attr($customerImage['alt']); ?>">
                        <?php else : ?>
                          <img src="<?php echo esc_url(get_template_directory_uri('full')); ?>/assets/images/common/noimage.png" alt="サムネイル画像no-image" />
                        <?php endif; ?>
                      </div>
                      <div class="campaign-card__body">
                        <div class="campaing-card__title-block">
                          <p class="campaign-card__tag">
                            <?php
                            $terms = get_the_terms($post->ID, 'campaign_category');
                            if (!empty($terms)) :
                              foreach ($terms as $term) :
                                echo $term->name;
                              endforeach;
                              else :
                                echo '未分類';
                              endif;
                            ?>
                          </p>
                          <h3 class="campaign-card__title"><?php the_title(); ?></h3>
                        </div>
                        <div class="campaign-card__price-block">
                          <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                          <div class="campaign-card__price-wrap">
                            <?php if (!empty(get_field('campaign_price_before'))) : ?>
                              <p class="campaign-card__price-before"><?php the_field('campaign_price_before'); ?></p>
                            <?php endif; ?>
                            <?php if (!empty(get_field('campaign_price_after'))) : ?>
                              <p class="campaign-card__price-after"><?php the_field('campaign_price_after'); ?></p>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
                <!-- ▲ Swiper ループ ▲ -->
                <?php wp_reset_postdata(); ?>
                <?php else : ?>
                <p>まだ投稿がありません。</p>
                <?php endif; ?>
              </div>
          </div>
          <!-- 前後の矢印 -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
        <div class="campaign__button-wrap">
          <a href="<?php echo $campaign; ?>" class="button">View&nbsp;more<span></span></a>
        </div>
      </div>
    </section>
    <!-- 私たちについて -->
    <section class="about top-about">
      <div class="about__inner inner">
        <div class="about__title section-title">
          <p class="section-title__en">about us</p>
          <h2 class="section-title__jp">私たちについて</h2>
        </div>
        <div class="about__container">
          <div class="about__images">
            <div class="about__image-1">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/About_1.jpg" alt="屋根の上のシーサー">
            </div>
            <div class="about__image-2">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/About_2.jpg" alt="綺麗な海を泳ぐ黄色い熱帯魚">
            </div>
          </div>
          <div class="about__contents-wrap">
            <?php
            $page_id = get_page_by_path('about');
            $page_id = $page_id->ID; //ページIDを取得して$page_idに代入
            ?>
            <h3 class="about__catchcopy">
              <?php echo nl2br(get_field('about_cathchcopy', $page_id)); ?>
            </h3>
            <div class="about__text-block">
              <p class="about__text">
                <?php echo nl2br(get_field('about_leadcopy', $page_id)); ?>
              </p>
              <div class="about__button-wrap">
                <a href="<?php echo $about; ?>" class="button">View&nbsp;more<span></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ダイビング情報 -->
    <section class="information top-information">
      <div class="information__inner inner">
        <div class="information__title section-title">
          <p class="section-title__en">information</p>
          <h2 class="section-title__jp">ダイビング情報</h2>
        </div>
        <div class="information__contents">
          <div class="information__image js-image-effect">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Infomation_1.jpg" alt="珊瑚礁と熱帯魚">
          </div>
          <div class="information__content">
            <h3 class="information__content-title">ライセンス講習</h3>
            <div class="information__text-block">
              <p class="information__text">
                当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>
                正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
              </p>
            </div>
            <div class="information__button-wrap">
              <a href="<?php echo $information; ?>" class="button">View&nbsp;more<span></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ブログ -->
    <section class="blog top-blog">
      <div class="blog__inner inner">
        <div class="blog__title section-title section-title--white">
          <p class="section-title__en">blog</p>
          <h2 class="section-title__jp">ブログ</h2>
        </div>
        <?php
        $args = [
          'post_type' => 'post',
          'posts_per_page' => 3
        ];
        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>
          <div class="blog__items blog-cards">
            <!-- ▼ ブログ投稿 ループ ▼ -->
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
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
            <?php endwhile; ?>
            <!-- ▲ ブログ投稿 ループ ▲ -->
          </div>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p>まだ投稿がありません。</p>
        <?php endif; ?>
        <div class="blog__button-wrap">
          <a href="<?php echo $blog ?>" class="button">View&nbsp;more<span></span></a>
        </div>
      </div>
    </section>
    <!-- お客様の声 -->
    <section class="voice top-voice">
      <div class="voice__inner inner">
        <div class="voice__title section-title">
          <p class="section-title__en">voice</p>
          <h2 class="section-title__jp">お客様の声</h2>
        </div>
        <?php
        $args = [
          'post_type' => 'voice',
          'posts_per_page' => 2
        ];
        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>
          <div class="voice__items voice-cards">
            <!-- ▼ お客様の声 ループ ▼ -->
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <div class="voice-cards__item voice-card">
                <div class="voice-card__head">
                  <div class="voice-card__head-textarea">
                    <div class="voice-card__tag-wrap">
                    <?php if (have_rows('voice_age_gender')) : ?>
                        <?php while (have_rows('voice_age_gender')) : the_row(); ?>
                          <?php if (!empty(get_sub_field('age'))) : ?>
                            <div class="voice-card__age-sex"><?php the_sub_field('age'); ?>代(<?php the_sub_field('gender'); ?>)</div>
                          <?php endif; ?>
                        <?php endwhile; ?>
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
                    </div>
                    <h3 class="voice-card__title"><?php the_title(); ?></h3>
                  </div>
                  <div class="voice-card__image js-image-effect">
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
                    <p class="voice-card__text">
                      <?php
                      $voice_main = get_field('voice_main');
                      // 文字列を250文字までに制限
                      $limited_content = mb_substr($voice_main, 0, 200);
                      // 制限されたコンテンツを出力
                      echo $limited_content;
                      ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            <!-- ▲ お客様の声 ループ ▲ -->
          </div>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p>まだ投稿がありません。</p>
        <?php endif; ?>
        <div class="voice__button-wrap">
          <a href="<?php echo $voice ?>" class="button">View more<span></span></a>
        </div>
      </div>
    </section>
    <!-- 料金一覧 -->
    <section class="price top-price">
      <div class="price__inner inner">
        <div class="price__title section-title">
          <p class="section-title__en">price</p>
          <h2 class="section-title__jp">料金一覧</h2>
        </div>
        <div class="price__contents">
          <div class="price__image js-image-effect">
            <picture>
              <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/Price.jpg" media="(min-width: 768px)">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Price-SP.jpg" alt="PCのときは珊瑚と小魚、スマホの時はウミガメ">
            </picture>
          </div>
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <div class="price__content">
                <?php
                // 料金表1から4までのループ
                for ($i = 1; $i <= 4; $i++) :
                  // 料金表のフィールドを取得
                  $priceItems = SCF::get_option_meta('price-options', "price-list_$i");
                  $programName = SCF::get_option_meta('price-options', "program_$i");

                  // 空でない配列かつ中身が空でない場合に処理を行う
                  if (!empty($priceItems) && !empty(array_filter($priceItems[0]))) :
                ?>
                    <div class="price__block price-block">
                      <h3 class="price-block__title"><?php echo $programName; ?></h3>
                      <dl class="price-block__items">
                        <?php foreach ($priceItems as $priceItem) : ?>
                          <div class="price-block__item">
                            <?php
                            // コース名と価格の取得
                            $course = esc_html($priceItem["course_$i"]);
                            $price = esc_html($priceItem["price_$i"]);
                            ?>
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
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <div class="price__button-wrap">
          <a href="<?php echo $pricePage ?>" class="button">View&nbsp;more<span></span></a>
        </div>
      </div>
    </section>


    <?php get_footer(); ?>