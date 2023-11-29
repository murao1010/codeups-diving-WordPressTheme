<?php
  $voice = esc_url(home_url('/voice'));
  $campaign = esc_url(home_url('/campaign'));
?>

<!-- サイドバー -->
<aside class="blog-main__sidebar blog-main__sidebar--single sidebar">
  <!-- 人気記事 -->
  <div class="sidebar__block popular-article">
    <div class="sidebar__title popular-article__title"><span></span>人気記事</div>
    <div class="popular-article__items">
      <?php
      // この行で記事のアクセス数を取得する関数を呼び出す
      setPostViews(get_the_ID());

      $args = new WP_Query(
        array(
          'post_type'      => 'post',           // 投稿タイプ
          'posts_per_page' => 3,                // 表示数
          'meta_key'       => 'post_views_count', // カスタムフィールド名
          'orderby'        => 'meta_value_num', // カスタムフィールドの値
          'order'          => 'DESC'            // 降順で表示する
        )
      );
      if ($args->have_posts()) :
        while ($args->have_posts()) :
          $args->the_post();
      ?>
          <a href="<?php echo esc_url(get_permalink()); ?>" class="popular-article__item blog-card-small">
            <div class="blog-card-small__image">
              <?php
              if (has_post_thumbnail()) {
                echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
              } else {
                echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/common/noimage.png" alt="サムネイル画像no-image" />';
              }
              ?>
            </div>
            <div class="blog-card-small__body">
              <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>" class="blog-card-small__date">
                <?php echo esc_html(get_the_date('Y.m.d')); ?>
              </time>
              <h3 class="blog-card-small__title"><?php echo esc_html(get_the_title()); ?></h3>
            </div>
          </a>
      <?php
        endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </div>
  </div>
  <!-- 口コミ -->
  <div class="sidebar__block voice-article">
    <div class="sidebar__title voice-article__title"><span></span>口コミ</div>
    <div class="voice-article__items">
      <?php
      $args = [
        'post_type' => 'voice', // カスタム投稿名が「voice」の場合
        'posts_per_page' => 1, // 表示する数
      ];
      $my_query = new WP_Query($args); ?>
      <?php if ($my_query->have_posts()) : // 投稿がある場合
      ?>
        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
          <!-- ▽ ループ開始 ▽ -->
          <a href="#" class="voice-article__item voice-card-small">
            <div class="voice-card-small__image">
              <?php
              $customerImage = get_field('voice_image');
              if (!empty($customerImage)) : ?>
                <img src="<?php echo esc_url($customerImage['url']); ?>" alt="<?php echo esc_attr($customerImage['alt']); ?>">
              <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri('full')); ?>/assets/images/common/noimage.png" alt="サムネイル画像no-image" />
              <?php endif; ?>
            </div>
            <div class="voice-card-small__body">
              <div class="voice-card-small__age-sex"><?php the_field('voice_age_gender'); ?></div>
              <h3 class="voice-card-small__title"><?php the_title(); ?></h3>
            </div>
          </a>
          <!-- △ ループ終了 △ -->
        <?php endwhile; ?>
      <?php else : // 投稿がない場合
      ?>
        <p>まだ投稿がありません。</p>
      <?php endif;
      wp_reset_postdata(); ?>
    </div>
    <div class="sidebar__button-wrap">
      <a href="<?php echo $voice ?>" class="button">View more<span></span></a>
    </div>
  </div>
  <!-- キャンペーン -->
  <div class="sidebar__block campaign-article">
    <div class="sidebar__title campaign-article__title"><span></span>キャンペーン</div>
    <div class="campaign-article__items">
      <?php
      $args = [
        'post_type' => 'campaign', // カスタム投稿名が「campaign」の場合
        'posts_per_page' => 2, // 表示する数
      ];
      $my_query = new WP_Query($args); ?>
      <?php if ($my_query->have_posts()) : // 投稿がある場合
      ?>
        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
          <!-- ▽ ループ開始 ▽ -->
          <a href="" class="campaign-article__item campaign-card-small">
            <div class="campaign-card-small__image">
              <?php
              $customerImage = get_field('campaign_image');
              if (!empty($customerImage)) : ?>
                <img src="<?php echo esc_url($customerImage['url']); ?>" alt="<?php echo esc_attr($customerImage['alt']); ?>">
              <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri('full')); ?>/assets/images/common/noimage.png" alt="サムネイル画像no-image" />
              <?php endif; ?>
            </div>
            <div class="campaign-card-small__body">
              <div class="campaign-card-small__title-block">
                <h3 class="campaign-card-small__title"><?php the_title(); ?></h3>
              </div>
              <div class="campaign-card-small__price-block">
                <p class="campaign-card-small__text">全部コミコミ(お一人様)</p>
                <div class="campaign-card-small__price-wrap">
                  <p class="campaign-card-small__price-before"><?php the_field('campaign_price_before'); ?></p>
                  <p class="campaign-card-small__price-after"><?php the_field('campaign_price_after'); ?></p>
                </div>
              </div>
            </div>
          </a>
          <!-- △ ループ終了 △ -->
        <?php endwhile; ?>
      <?php else : // 投稿がない場合
      ?>
        <p>まだ投稿がありません。</p>
      <?php endif;
      wp_reset_postdata(); ?>
    </div>
    <div class="sidebar__button-wrap sidebar__button-wrap--campaign">
      <a href="<?php echo $campaign ?>" class="button">View more<span></span></a>
    </div>
  </div>
  <!-- アーカイブ -->
  <div class="sidebar__block archive">
    <div class="sidebar__title archive__title"><span></span>アーカイブ</div>
    <div class="archive__wrap">
    <?php
    $year_month = null;
    $year = null;
    $month = null;
    $args = array(
        'post_type' => 'post',   // 投稿タイプを指定
        'orderby' => 'date',     // 日付順で表示
        'order' => 'DESC',
        'posts_per_page' => -1   // すべての投稿を表示
    );
    $the_query = new WP_Query($args);
    ?>
    <ul>
        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php if ($year_month != get_the_date('Y.m')) : // 同じ年月でなければ表示
                    $year_month = get_the_date('Y.m');
                    $year = get_the_date('Y'); // 年の取得
                    $month = get_the_date('m'); // 月の取得
                    ?>
                    <p class="archive__year"><?php echo $year; ?></p>
                    <ul class="archive__lists">
                        <!-- 月別アーカイブリスト -->
                        <li><a href="<?php echo get_month_link($year, $month); ?>"><?php echo $month; ?>月</a></li>
                    </ul>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </ul>
    </div>
  </div>
</aside>