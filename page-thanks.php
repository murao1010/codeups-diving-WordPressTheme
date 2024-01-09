<?php get_header(); ?>

<!-- メインコンテンツ -->
<main>
  <!-- 下層ページのメインビュー -->
  <section class="lower-mv">
    <div class="lower-mv__image">
      <picture>
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/Contact-MV-PC.jpg" media="(min-width: 768px)">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Contact-MV-SP.jpg" alt="綺麗な海が波打つところを上空から見た様子">
      </picture>
    </div>
    <div class="lower-mv__header">
      <h2 class="lower-mv__title">Contact</h2>
    </div>
  </section>
  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb') ?>

  <div class="lower-contact contact-main">
    <div class="contact-main__inner inner">
      <div class="contact-main__thanks-wrap">
        <p class="contact-main__thanks-text">お問い合わせ内容を送信完了しました。</p>
        <p class="contact-main__thanks-text">
          このたびは、お問い合わせ頂き<br class="sp__br">誠にありがとうございます。<br>
          お送り頂きました内容を確認の上、<br class="sp__br">3営業日以内に折り返しご連絡させて頂きます。<br>
          また、ご記入頂いたメールアドレスへ、<br class="sp__br">自動返信の確認メールをお送りしております。
        </p>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>