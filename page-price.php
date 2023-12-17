<?php get_header(); ?>

  <!-- メインコンテンツ -->
  <main>
    <!-- 下層ページのメインビュー -->
    <section class="lower-mv">
      <div class="lower-mv__image">
        <picture>
          <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/Price-MV-PC.jpg" media="(min-width: 768px)">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Price-MV-SP.jpg" alt="">
        </picture>
        <div class="lower-mv__header">
          <h2 class="lower-mv__title">Price</h2>
        </div>
      </div>
    </section>
    <!-- パンくず -->
    <?php get_template_part('/breadcrumb') ?>
    <!-- 料金一覧 -->
    <div class="lower-price price-main">
      <div class="price-main__inner inner">
        <div class="price-main__container">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <!-- ライセンス講習 -->
          <?php
            $licensePrices = SCF::get('price_license'); // 繰り返しフィールドの値を取得する
            if (!empty($licensePrices) && !empty(array_filter($licensePrices[0]))) : // 空でない配列かつ中身が空でない場合に処理を行う
          ?>
          <div class="price-main__table price-table" id="LicenseCourse" data-id="#LicenseCourse">
            <div class="price-table-title__block">
              <img class="price-table__icon" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/License-course_icon.svg" alt="クジラのアイコン">
              <p class="price-table__title">ライセンス講習</p>
            </div>
            <dl class="price-table__items">
            <?php
              foreach ($licensePrices as $licensePrice) :
                $licenseCourse = esc_html($licensePrice['license_course']);
                $licenseFee = esc_html($licensePrice['license_fee']);
            ?>
              <div class="price-table__item <?php echo count($licensePrices) === 1 ? 'price-table__item--h88' : ''; ?>">
                <dt><?php echo $licenseCourse; ?></dt>
                <dd><?php echo $licenseFee; ?></dd>
              </div>
            <?php endforeach; ?>
          </dl>
          </div>
          <?php endif;?>
          <!-- 体験ダイビング -->
          <?php
            $trialPrices = SCF::get('price_trial-diving'); // 繰り返しフィールドの値を取得する
            if (!empty($trialPrices) && !empty(array_filter($trialPrices[0]))) : // 空でない配列かつ中身が空でない場合に処理を行う
          ?>
          <div class="price-main__table price-table" id="TrialDiving" data-id="#TrialDiving">
            <div class="price-table-title__block">
              <img class="price-table__icon" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/License-course_icon.svg" alt="クジラのアイコン">
              <p class="price-table__title">体験ダイビング</p>
            </div>
            <dl class="price-table__items">
              <?php
                foreach ($trialPrices as $trialPrice) : // 繰り返し構文で各値を順次取り出す
                  $trialCourse = esc_html($trialPrice['trial-diving_course']); // trial-diving_courseをエスケープ処理して変数に代入する
                  $trialFee = esc_html($trialPrice['trial-diving_fee']); // trial-diving_feeをエスケープ処理して変数に代入する
                  ?>
                  <div class="price-table__item <?php echo count($trialPrice) === 1 ? 'price-table__item--h88' : ''; ?>">
                    <dt><?php echo $trialCourse; ?></dt>
                    <dd><?php echo $trialFee; ?></dd>
                  </div>
                  <?php
                endforeach;
              ?>
            </dl>
          </div>
          <?php endif;?>
          <!-- ファンダイビング -->
          <?php
            $funPrices = SCF::get('price_fun-diving'); // 繰り返しフィールドの値を取得する
            if (!empty($funPrices) && !empty(array_filter($funPrices[0]))) : // 空でない配列かつ中身が空でない場合に処理を行う
          ?>
          <div class="price-main__table price-table" id="FunDiving" data-id="#FunDiving">
            <div class="price-table-title__block">
              <img class="price-table__icon" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/License-course_icon.svg" alt="クジラのアイコン">
              <p class="price-table__title">ファンダイビング</p>
            </div>
            <dl class="price-table__items">
              <?php
                foreach ($funPrices as $funPrice) : // 繰り返し構文で各値を順次取り出す
                  $funCourse = esc_html($funPrice['fun-diving_course']); // fun-diving_courseをエスケープ処理して変数に代入する
                  $funFee = esc_html($funPrice['fun-diving_fee']); // fun-diving_feeをエスケープ処理して変数に代入する
                  ?>
                  <div class="price-table__item <?php echo count($funPrice) === 1 ? 'price-table__item--h88' : ''; ?>">
                    <dt><?php echo $funCourse; ?></dt>
                    <dd><?php echo $funFee; ?></dd>
                  </div>
                  <?php
                endforeach;
              ?>
            </dl>
          </div>
          <?php endif;?>
          <!-- スペシャルダイビング -->
          <?php
            $specialPrices = SCF::get('price_special'); // 繰り返しフィールドの値を取得する
            if (!empty($specialPrices) && !empty(array_filter($specialPrices[0]))) : // 空でない配列かつ中身が空でない場合に処理を行う
          ?>
          <div class="price-main__table price-table">
            <div class="price-table-title__block">
              <img class="price-table__icon" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/License-course_icon.svg" alt="クジラのアイコン">
              <p class="price-table__title">スペシャルダイビング</p>
            </div>
            <dl class="price-table__items">
              <?php
                foreach ($specialPrices as $specialPrice) : // 繰り返し構文で各値を順次取り出す
                  $specialCourse = esc_html($specialPrice['special_course']); // special_courseをエスケープ処理して変数に代入する
                  $specialFee = esc_html($specialPrice['special_fee']); // special_feeをエスケープ処理して変数に代入する
                  ?>
                  <div class="price-table__item <?php echo count($specialPrices) === 1 ? 'price-table__item--h88' : ''; ?>">
                    <dt><?php echo $specialCourse; ?></dt>
                    <dd><?php echo $specialFee; ?></dd>
                  </div>
                  <?php
                endforeach;
              ?>
            </dl>
          </div>
          <?php endif;?>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>

<?php get_footer(); ?>