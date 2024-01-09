<?php get_header(); ?>

<!-- メインコンテンツ -->
<main>
  <!-- 下層ページのメインビュー -->
  <section class="lower-mv">
    <div class="lower-mv__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/Diving-MV-PC.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Diving-MV-SP.jpg" alt="ダイバーが小魚の群れと一緒に泳いでいる様子">
      </picture>
      <div class="lower-mv__header">
        <h2 class="lower-mv__title">Information</h2>
      </div>
    </div>
  </section>
  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>
  <!-- ダイビング情報 -->
  <div class="lower-information information-main">
    <div class="information-main__inner inner">
      <div class="information-main__container">
        <!--メニュー部分-->
        <div class="information-main__menu">
          <div class="information-main__menu-item information-main__menu-item--license js-tab-switch is-active" data-tab="tab-1"><span></span>ライセンス<br class="sp__br">講習</div>
          <div class="information-main__menu-item information-main__menu-item--fun js-tab-switch" data-tab="tab-2"><span></span>ファン<br class="sp__br">ダイビング</div>
          <div class="information-main__menu-item information-main__menu-item--trial js-tab-switch" data-tab="tab-3"><span></span>体験<br class="sp__br">ダイビング</div>
        </div>
        <!--コンテンツ部分-->
        <div class="information-main__contents">
          <!--ライセンス講習-->
          <div class="information-main__content js-tab-cts is-active" data-tab="tab-1">
            <div class="diving-content">
              <div class="diving-content__wrap">
                <p class="diving-content__title">ライセンス講習</p>
                <div class="diving-content__text-block">
                  <p class="diving-content__text">
                    泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
                  </p>
                </div>
              </div>
              <div class="diving-content__image">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Diving-content_1.jpg" alt="ダイバー達が綺麗な海を泳いでいる様子">
              </div>
            </div>
          </div>
        </div>
        <!--ファンダイビング-->
        <div class="information-main__content js-tab-cts" data-tab="tab-2">
          <div class="diving-content">
            <div class="diving-content__wrap">
              <p class="diving-content__title">ファンダイビング</p>
              <div class="diving-content__text-block">
                <p class="diving-content__text">
                  ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
              </div>
            </div>
            <div class="diving-content__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Diving-content_2.jpg" alt="白い小魚の大群が泳ぐ様子">
            </div>
          </div>
        </div>
        <!--体験ダイビング-->
        <div class="information-main__content js-tab-cts" data-tab="tab-3">
          <div class="diving-content">
            <div class="diving-content__wrap">
              <p class="diving-content__title">体験ダイビング</p>
              <div class="diving-content__text-block">
                <p class="diving-content__text">
                  ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
              </div>
            </div>
            <div class="diving-content__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Diving-content_3.jpg" alt="2匹の綺麗な魚が泳いでいる様子">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>