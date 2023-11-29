<?php get_header(); ?>

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
          <div class="swiper-slide">
            <div class="mv__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/MV-PC_1.jpg" media="(min-width: 768px)">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/MV-SP_1.jpg" alt="綺麗な海を泳ぐウミガメ">
              </picture>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="mv__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/MV-PC_2.jpg" media="(min-width: 768px)">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/MV-SP_2.jpg" alt="海を泳ぐウミガメとダイバー">
              </picture>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="mv__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/MV-PC_3.jpg" media="(min-width: 768px)">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/MV-SP_3.jpg" alt="海と山と青い空">
              </picture>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="mv__image">
              <picture>
                <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/MV-PC_3.jpg" media="(min-width: 768px)">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/MV-SP_3.jpg" alt="白い砂浜と綺麗な海">
              </picture>
            </div>
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
            <div class="swiper-wrapper">
              <div class="swiper-slide campaign__item">
                <div class="campaign-card">
                  <div class="campaign-card__image">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Campaign_1.jpg" alt="熱帯魚の群れ">
                  </div>
                  <div class="campaign-card__body">
                    <div class="campaing-card__title-block">
                      <p class="campaign-card__tag">ライセンス講習</p>
                      <h3 class="campaign-card__title">ライセンス取得</h3>
                    </div>
                    <div class="campaign-card__price-block">
                      <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price-wrap">
                        <p class="campaign-card__price-before">¥56,000</p>
                        <p class="campaign-card__price-after">¥46,000</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide campaign__item">
                <div class="campaign-card">
                  <div class="campaign-card__image">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Campaign_2.jpg" alt="綺麗な海">
                  </div>
                  <div class="campaign-card__body">
                    <div class="campaing-card__title-block">
                      <p class="campaign-card__tag">体験ダイビング</p>
                      <h3 class="campaign-card__title">貸切体験ダイビング</h3>
                    </div>
                    <div class="campaign-card__price-block">
                      <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price-wrap">
                        <p class="campaign-card__price-before">¥24,000</p>
                        <p class="campaign-card__price-after">¥18,000</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide campaign__item">
                <div class="campaign-card">
                  <div class="campaign-card__image">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Campaign_3.jpg" alt="クラゲの群れ">
                  </div>
                  <div class="campaign-card__body">
                    <div class="campaing-card__title-block">
                      <p class="campaign-card__tag">体験ダイビング</p>
                      <h3 class="campaign-card__title">ナイトダイビング</h3>
                    </div>
                    <div class="campaign-card__price-block">
                      <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price-wrap">
                        <p class="campaign-card__price-before">¥10,000</p>
                        <p class="campaign-card__price-after">¥8,000</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide campaign__item">
                <div class="campaign-card">
                  <div class="campaign-card__image">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Campaign_4.jpg" alt="ダイビングの様子">
                  </div>
                  <div class="campaign-card__body">
                    <div class="campaing-card__title-block">
                      <p class="campaign-card__tag">ファンダイビング</p>
                      <h3 class="campaign-card__title">貸切ファンダイビング</h3>
                    </div>
                    <div class="campaign-card__price-block">
                      <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price-wrap">
                        <p class="campaign-card__price-before">¥20,000</p>
                        <p class="campaign-card__price-after">¥16,000</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- 前後の矢印 -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
        <div class="campaign__button-wrap">
          <a href="#" class="button">View&nbsp;more<span></span></a>
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
            <h3 class="about__catchcopy">
              Dive&nbsp;into<br>
              the&nbsp;Ocean
            </h3>
            <div class="about__text-block">
              <p class="about__text">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
              </p>
              <div class="about__button-wrap">
                <a href="#" class="button">View&nbsp;more<span></span></a>
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
              <a href="#" class="button">View&nbsp;more<span></span></a>
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
        <div class="blog__items blog-cards">
          <a href="#" class="blog-cards__item blog-card">
            <div class="blog-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Blog-Card_1.jpg" alt="珊瑚礁">
            </div>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <time datetime="2023-11-17" class="blog-card__date">2023.11.17</time>
              </div>
              <h3 class="blog-card__title">ライセンス取得</h3>
              <div class="blog-card__text-block">
                <p class="blog-card__text">
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                </p>
              </div>
            </div>
          </a>
          <a href="#" class="blog-cards__item blog-card">
            <div class="blog-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Blog-Card_2.jpg" alt="ウミガメ">
            </div>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <time datetime="2023-11-17" class="blog-card__date">2023.11.17</time>
              </div>
              <h3 class="blog-card__title">ウミガメと泳ぐ</h3>
              <div class="blog-card__text-block">
                <p class="blog-card__text">
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                </p>
              </div>
            </div>
          </a>
          <a href="#" class="blog-cards__item blog-card">
            <div class="blog-card__image">
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Blog-Card_3.jpg" alt="サンゴとカクレクマノミ">
            </div>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <time datetime="2023-11-17" class="blog-card__date">2023.11.17</time>
              </div>
              <h3 class="blog-card__title">カクレクマノミ</h3>
              <div class="blog-card__text-block">
                <p class="blog-card__text">
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
                </p>
              </div>
            </div>
          </a>
        </div>
        <div class="blog__button-wrap">
          <a href="#" class="button">View&nbsp;more<span></span></a>
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
        <div class="voice__items voice-cards">
          <a href="#" class="voice-cards__item voice-card">
            <div class="voice-card__head">
              <div class="voice-card__head-textarea">
                <div class="voice-card__tag-wrap">
                  <div class="voice-card__age-sex">20代(女性)</div>
                  <div class="voice-card__tag">ライセンス講習</div>
                </div>
                <h3 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h3>
              </div>
              <div class="voice-card__image js-image-effect">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Voice_1.jpg" alt="麦わら帽子をかぶって微笑む女性">
              </div>
            </div>
            <div class="voice-card__body">
              <div class="voice-card__text-block">
                <p class="voice-card__text">
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                  ここにテキストが入ります。ここにテキストが入ります。
                </p>
              </div>
            </div>
          </a>
          <a href="#" class="voice-cards__item voice-card">
            <div class="voice-card__head">
              <div class="voice-card__head-textarea">
                <div class="voice-card__tag-wrap">
                  <div class="voice-card__age-sex">20代(男性)</div>
                  <div class="voice-card__tag">ファンダイビング</div>
                </div>
                <h3 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h3>
              </div>
              <div class="voice-card__image js-image-effect">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Voice_2.jpg" alt="親指を立ててポーズをとる男性">
              </div>
            </div>
            <div class="voice-card__body">
              <div class="voice-card__text-block">
                <p class="voice-card__text">
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                  ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                  ここにテキストが入ります。ここにテキストが入ります。
                </p>
              </div>
            </div>
          </a>
        </div>
        <div class="voice__button-wrap">
          <a href="#" class="button">View more<span></span></a>
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
          <div class="price__content">
            <div class="price__block price-block">
              <h3 class="price-block__title">ライセンス講習</h3>
              <dl class="price-block__items">
                <div class="price-block__item">
                  <dt>オープンウォーターダイバーコース</dt>
                  <dd>¥50,000</dd>
                </div>
                <div class="price-block__item">
                  <dt>アドバンスドオープンウォーターコース</dt>
                  <dd>¥60,000</dd>
                </div>
                <div class="price-block__item">
                  <dt>レスキュー&nbsp;&#43;&nbsp;EFRコース</dt>
                  <dd>¥70,000</dd>
                </div>
              </dl>
            </div>
            <div class="price__block price-block">
              <h3 class="price-block__title">体験ダイビング</h3>
              <dl class="price-block__items">
                <div class="price-block__item">
                  <dt>ビーチ体験ダイビング(半日)</dt>
                  <dd>¥7,000</dd>
                </div>
                <div class="price-block__item">
                  <dt>ビーチ体験ダイビング(1日)</dt>
                  <dd>¥14,000</dd>
                </div>
                <div class="price-block__item">
                  <dt>ボート体験ダイビング(半日)</dt>
                  <dd>¥10,000</dd>
                </div>
                <div class="price-block__item">
                  <dt>ボート体験ダイビング(1日)</dt>
                  <dd>¥18,000</dd>
                </div>
              </dl>
            </div>
            <div class="price__block price-block">
              <h3 class="price-block__title">ファンダイビング</h3>
              <dl class="price-block__items">
                <div class="price-block__item">
                  <dt>ビーチダイビング(2ダイブ)</dt>
                  <dd>¥14,000</dd>
                </div>
                <div class="price-block__item">
                  <dt>ボートダイビング(2ダイブ)</dt>
                  <dd>¥18,000</dd>
                </div>
                <div class="price-block__item">
                  <dt>スペシャルダイビング(2ダイブ)</dt>
                  <dd>¥24,000</dd>
                </div>
                <div class="price-block__item">
                  <dt>ナイトダイビング(1ダイブ)</dt>
                  <dd>¥10,000</dd>
                </div>
              </dl>
            </div>
            <div class="price__block price-block">
              <h3 class="price-block__title">スペシャルダイビング</h3>
              <dl class="price-block__items">
                <div class="price-block__item">
                  <dt>貸切ダイビング(2ダイブ)</dt>
                  <dd>¥24,000</dd>
                </div>
                <div class="price-block__item">
                  <dt>1日ダイビング(3ダイブ)</dt>
                  <dd>¥32,000</dd>
                </div>
              </dl>
            </div>
          </div>
        </div>
        <div class="price__button-wrap">
          <a href="#" class="button">View&nbsp;more<span></span></a>
        </div>
      </div>
    </section>


<?php get_footer(); ?>

