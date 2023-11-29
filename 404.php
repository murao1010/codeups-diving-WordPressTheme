<?php get_header(); ?>

  <!-- メインコンテンツ -->
  <main class="sorry-main">
    <!-- パンくず -->
    <?php get_template_part('/breadcrumb') ?>
    <div class="lower-sorry sorry">
      <div class="sorry__inner inner">
        <h2 class="sorry__title">404</h2>
        <div class="sorry__text-block">
          <p class="sorry__text">
            申し訳ありません。<br>
            お探しのページが見つかりません。
          </p>
        </div>
        <div class="sorry__button-wrap">
          <a href="<?php echo home_url(); ?>" class="button button--white">Page&nbsp;TOP<span></span></a>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); ?>