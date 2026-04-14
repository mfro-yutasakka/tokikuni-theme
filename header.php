<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="theme-color" content="#1A5276">
  <?php wp_head(); ?>
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'></text></svg>">
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <a class="skip-link" href="#main-content">本文へスキップ</a>

  <?php
  $office_name = esc_html(get_theme_mod('office_name', '時國司法書士事務所'));
  $office_subtitle = esc_html(get_theme_mod('office_subtitle', '一宮市 / 司法書士事務所'));
  $phone = esc_html(get_theme_mod('phone_number', '0586-25-0366'));
  $phone_tel = esc_attr(get_theme_mod('phone_tel', '0586250366'));
  ?>

  <header class="site-header">
    <div class="container header-inner">
      <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo $office_name; ?> トップへ">
        <?php if (has_custom_logo()) : ?>
          <div class="brand-logo"><?php the_custom_logo(); ?></div>
        <?php else : ?>
          <div class="brand-mark" aria-hidden="true"></div>
        <?php endif; ?>
        <div class="brand-copy">
          <div class="site-name"><?php echo $office_name; ?></div>
          <div class="site-meta"><?php echo $office_subtitle; ?></div>
        </div>
      </a>
      <a class="header-phone" href="tel:<?php echo $phone_tel; ?>" aria-label="<?php echo $office_name; ?>に電話する <?php echo $phone; ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        <span><?php echo $phone; ?></span>
      </a>
      <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-nav" aria-label="メニュー" data-menu-toggle>
        <span class="menu-bars" aria-hidden="true">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </button>
      <nav class="site-nav" id="site-nav" aria-label="メインナビゲーション">
        <a class="nav-link" href="#about">事務所について</a>
        <a class="nav-link" href="#guide">業務内容</a>
        <a class="nav-link" href="#hours">受付時間</a>
        <a class="nav-link" href="#access">アクセス</a>
        <a class="nav-link" href="#faq">よくある質問</a>
        <a class="nav-call" href="tel:<?php echo $phone_tel; ?>" aria-label="<?php echo $office_name; ?>に電話する <?php echo $phone; ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
          <span>電話する</span>
        </a>
      </nav>
    </div>
    <div class="nav-backdrop" data-nav-close aria-hidden="true"></div>
  </header>
