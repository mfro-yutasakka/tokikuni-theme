<?php get_header(); ?>

<?php
// カスタマイザーの値を取得
$office_name = esc_html(get_theme_mod('office_name', '時國司法書士事務所'));
$phone = esc_html(get_theme_mod('phone_number', '0586-25-0366'));
$phone_tel = esc_attr(get_theme_mod('phone_tel', '0586250366'));
$address = esc_html(get_theme_mod('office_address', '日本、〒491-0858 愛知県一宮市栄２丁目２−５'));
$google_map_url = esc_url(get_theme_mod('google_map_url', 'https://maps.google.com/?cid=5348314544645183231&g_mp=Cidnb29nbGUubWFwcy5wbGFjZXMudjEuUGxhY2VzLlNlYXJjaFRleHQQAhgEIAA'));

$hero_eyebrow = esc_html(get_theme_mod('hero_eyebrow', '一宮市の司法書士事務所'));
$hero_title = esc_html(get_theme_mod('hero_title', '一宮市の司法書士事務所、時國司法書士事務所。'));
$hero_lead = esc_html(get_theme_mod('hero_lead', '時國司法書士事務所は、一宮市にある司法書士事務所です。お気軽にお問い合わせください。'));
$hero_image = esc_url(get_theme_mod('hero_image', 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=800&h=600&fit=crop&q=80'));

$about_heading = esc_html(get_theme_mod('about_heading', '登記・法律のことならお任せください'));

$phone_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>';
$check_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>';
$check_svg_24 = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>';
?>

  <main id="main-content">
    <!-- ヒーローセクション -->
    <section class="hero" id="top" aria-label="メインビジュアル">
      <div class="container">
        <div class="hero-shell">
          <div class="hero-copy">
            <p class="eyebrow"><?php echo $hero_eyebrow; ?></p>
            <h1><?php echo $hero_title; ?></h1>
            <p class="lead"><?php echo $hero_lead; ?></p>
            <ul class="fact-grid">
              <?php for ($i = 1; $i <= 4; $i++) :
                $defaults = array(1 => '営業時間はお問い合わせください', 2 => '詳しくはお電話で', 3 => '初回無料相談・不動産登記', 4 => '一宮市エリア');
                $chip = esc_html(get_theme_mod("fact_chip_{$i}", $defaults[$i]));
              ?>
                <li class="fact-chip"><?php echo $chip; ?></li>
              <?php endfor; ?>
            </ul>
            <div class="button-row">
              <a class="button primary" href="tel:<?php echo $phone_tel; ?>" aria-label="<?php echo $office_name; ?>に電話で相談する <?php echo $phone; ?>">
                <?php echo $phone_svg; ?>
                電話で相談する
              </a>
              <a class="button secondary" href="#access">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                アクセスを見る
              </a>
            </div>
          </div>
          <div class="hero-visual">
            <div class="media-card media-primary">
              <img class="media-card-image" src="<?php echo $hero_image; ?>" alt="<?php echo $office_name; ?>のイメージ" width="800" height="600" loading="eager" style="width:100%;height:auto;aspect-ratio:4/3;object-fit:cover;border-radius:var(--radius-lg);">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 基本情報バー -->
    <section class="quick-info" aria-label="基本情報">
      <div class="container">
        <div class="quick-info-inner">
          <?php
          $qi_icons = array(
            1 => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
            2 => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
            3 => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
          );
          $qi_label_defaults = array(1 => '営業時間', 2 => '初回無料相談', 3 => 'アクセス');
          $qi_value_defaults = array(1 => 'お問い合わせください', 2 => '無料 / 30分', 3 => '一宮市');
          for ($i = 1; $i <= 3; $i++) :
            $qi_label = esc_html(get_theme_mod("qi_label_{$i}", $qi_label_defaults[$i]));
            $qi_value = esc_html(get_theme_mod("qi_value_{$i}", $qi_value_defaults[$i]));
          ?>
          <div class="quick-info-item">
            <div class="quick-info-icon"><?php echo $qi_icons[$i]; ?></div>
            <div class="quick-info-content">
              <div class="quick-info-label"><?php echo $qi_label; ?></div>
              <div class="quick-info-value"><?php echo $qi_value; ?></div>
            </div>
          </div>
          <?php endfor; ?>
        </div>
      </div>
    </section>

    <!-- 事務所について -->
    <section class="section section-alt" id="about" aria-label="事務所について">
      <div class="container">
        <div class="section-head animate-on-scroll">
          <p class="section-eyebrow">ABOUT / 事務所について</p>
          <h2><?php echo $about_heading; ?></h2>
        </div>
        <div class="feature-grid">
          <?php for ($i = 1; $i <= 3; $i++) :
            $title_defaults = array(1 => '不動産登記の専門家', 2 => '会社登記もお任せ', 3 => '相続手続きの支援');
            $desc_defaults = array(1 => '不動産売買・相続に伴う登記手続きを迅速かつ正確に対応いたします。', 2 => '会社設立登記・役員変更・増資など、商業登記も幅広くサポートいたします。', 3 => '遺産分割協議書の作成から相続登記まで、ワンストップで対応いたします。');
            $card_title = esc_html(get_theme_mod("about_card_title_{$i}", $title_defaults[$i]));
            $card_desc = esc_html(get_theme_mod("about_card_desc_{$i}", $desc_defaults[$i]));
          ?>
          <div class="feature-card animate-on-scroll">
            <div class="feature-card-icon"><?php echo $check_svg; ?></div>
            <h3><?php echo $card_title; ?></h3>
            <p><?php echo $card_desc; ?></p>
          </div>
          <?php endfor; ?>
        </div>
      </div>
    </section>

    <!-- 業務内容 -->
    <section class="section section-warm" id="guide" aria-label="取扱業務のご案内">
      <div class="container split-shell">
        <section class="panel animate-on-scroll">
          <div class="section-head">
            <p class="section-eyebrow">SERVICES / 業務内容</p>
            <h2><?php echo esc_html(get_theme_mod('services_heading', '取扱業務のご案内')); ?></h2>
          </div>
          <div class="care-grid">
            <?php
            $svc_count = intval(get_theme_mod('service_count', 5));
            if ($svc_count < 1) $svc_count = 1;
            if ($svc_count > 12) $svc_count = 12;
            $svc_titles_d = array(1 => '初回無料相談', 2 => '不動産登記', 3 => '商業登記', 4 => '相続登記', 5 => '債務整理');
            $svc_prices_d = array(1 => '無料 / 30分', 2 => '¥40,000〜', 3 => '¥30,000〜', 4 => '¥60,000〜', 5 => '¥30,000〜');
            for ($i = 1; $i <= $svc_count; $i++) :
              $title = esc_html(get_theme_mod("service_title_{$i}", isset($svc_titles_d[$i]) ? $svc_titles_d[$i] : ''));
              $price = esc_html(get_theme_mod("service_price_{$i}", isset($svc_prices_d[$i]) ? $svc_prices_d[$i] : ''));
              if (empty($title)) continue;
            ?>
            <article class="care-card animate-on-scroll">
              <div class="care-card-icon"><?php echo $check_svg_24; ?></div>
              <h3><?php echo $title; ?></h3>
              <p><?php echo $price; ?></p>
            </article>
            <?php endfor; ?>
          </div>
        </section>
      </div>
    </section>

    <!-- 事例紹介 -->
    <section class="section section-alt" id="cases" aria-label="事例紹介">
      <div class="container">
        <div class="section-head animate-on-scroll">
          <p class="section-eyebrow">CASES / 事例紹介</p>
          <h2><?php echo esc_html(get_theme_mod('gallery_heading', '事例紹介')); ?></h2>
        </div>
        <div class="case-grid">
          <?php
          $case_count = intval(get_theme_mod('case_count', 1));
          if ($case_count < 1) $case_count = 1;
          if ($case_count > 6) $case_count = 6;
          $case_def_title = array(1 => '相続登記（戸籍等の書類を持参したケース）');
          $case_def_subtitle = array(1 => '土地：1000万円　建物：500万円');
          $case_def_rows = array(1 => "司法書士報酬|55,000円（税込み）\n登録免許税|60,000円\nその他諸費用|10,000円");
          for ($ci = 1; $ci <= $case_count; $ci++) :
            $c_title = esc_html(get_theme_mod("case_title_{$ci}", isset($case_def_title[$ci]) ? $case_def_title[$ci] : ''));
            $c_subtitle = esc_html(get_theme_mod("case_subtitle_{$ci}", isset($case_def_subtitle[$ci]) ? $case_def_subtitle[$ci] : ''));
            $c_rows_raw = get_theme_mod("case_rows_{$ci}", isset($case_def_rows[$ci]) ? $case_def_rows[$ci] : '');
            $c_total_label = esc_html(get_theme_mod("case_total_label_{$ci}", '合計'));
            $c_total_value = esc_html(get_theme_mod("case_total_value_{$ci}", $ci === 1 ? '100,000円' : ''));
            if (empty($c_title)) continue;
          ?>
          <article class="case-card animate-on-scroll">
            <div class="case-card-header">
              <h3><?php echo $c_title; ?></h3>
              <?php if ($c_subtitle) : ?>
              <p class="case-card-subtitle"><?php echo $c_subtitle; ?></p>
              <?php endif; ?>
            </div>
            <table class="case-table">
              <tbody>
                <?php
                $rows = array_filter(array_map('trim', explode("\n", $c_rows_raw)));
                foreach ($rows as $row) :
                  $parts = explode('|', $row, 2);
                  if (count($parts) < 2) continue;
                  $label = esc_html(trim($parts[0]));
                  $value = esc_html(trim($parts[1]));
                ?>
                <tr>
                  <td class="case-label"><?php echo $label; ?></td>
                  <td class="case-value"><?php echo $value; ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              <?php if ($c_total_value) : ?>
              <tfoot>
                <tr class="case-total">
                  <td class="case-label"><?php echo $c_total_label; ?></td>
                  <td class="case-value"><?php echo $c_total_value; ?></td>
                </tr>
              </tfoot>
              <?php endif; ?>
            </table>
          </article>
          <?php endfor; ?>
        </div>
      </div>
    </section>

    <!-- ご相談の流れ -->
    <section class="section" aria-label="ご相談から完了まで">
      <div class="container">
        <div class="section-head animate-on-scroll">
          <p class="section-eyebrow">FLOW / ご相談の流れ</p>
          <h2><?php echo esc_html(get_theme_mod('flow_heading', 'ご相談から完了まで')); ?></h2>
        </div>
        <div class="care-grid">
          <?php
          $flow_title_defaults = array(1 => 'お問い合わせ', 2 => '初回面談・お見積り', 3 => '書類作成・登記申請', 4 => '完了・アフターフォロー');
          $flow_desc_defaults = array(1 => 'お電話またはメールにてお気軽にお問い合わせください。', 2 => 'ご状況をお伺いし、手続きの流れと費用をご説明いたします。', 3 => '必要書類の作成から法務局への申請まで代行いたします。', 4 => '登記完了後の書類をお渡しし、必要に応じてフォローアップいたします。');
          for ($i = 1; $i <= 4; $i++) :
            $flow_title = esc_html(get_theme_mod("flow_title_{$i}", $flow_title_defaults[$i]));
            $flow_desc = esc_html(get_theme_mod("flow_desc_{$i}", $flow_desc_defaults[$i]));
          ?>
          <div class="care-card animate-on-scroll">
            <div class="care-card-icon"><?php echo $check_svg; ?></div>
            <p class="mini-eyebrow">STEP 0<?php echo $i; ?></p>
            <h3><?php echo $flow_title; ?></h3>
            <p><?php echo $flow_desc; ?></p>
          </div>
          <?php endfor; ?>
        </div>
      </div>
    </section>

    <!-- 受付時間 -->
    <section class="section" id="hours" aria-label="受付時間">
      <div class="container split-shell">
        <section class="panel animate-on-scroll">
          <div class="section-head">
            <p class="section-eyebrow">HOURS / 受付時間</p>
            <h2><?php echo esc_html(get_theme_mod('hours_heading', 'お問い合わせ受付時間')); ?></h2>
          </div>
          <div class="hours-grid">
            <?php
            $hours_defaults = array(
              1 => array('label' => '営業時間', 'value' => 'お問い合わせください'),
              2 => array('label' => '定休日',   'value' => 'お問い合わせください'),
              3 => array('label' => '受付方法', 'value' => 'お電話にて'),
              4 => array('label' => 'アクセス', 'value' => 'お問い合わせください'),
            );
            for ($i = 1; $i <= 4; $i++) :
              $label = esc_html(get_theme_mod("hours_label_{$i}", $hours_defaults[$i]['label']));
              $value = esc_html(get_theme_mod("hours_value_{$i}", $hours_defaults[$i]['value']));
            ?>
            <article class="hours-card animate-on-scroll">
              <div class="hours-card-label"><?php echo $label; ?></div>
              <div class="hours-card-value"><?php echo $value; ?></div>
            </article>
            <?php endfor; ?>
          </div>
          <p class="panel-note"><?php echo $office_name; ?><?php echo esc_html(get_theme_mod('hours_note', 'の詳しい営業時間はお電話にてご確認ください。')); ?></p>
        </section>

        <!-- アクセス -->
        <section class="panel animate-on-scroll" id="access" aria-label="アクセス">
          <div class="section-head">
            <p class="section-eyebrow">ACCESS / アクセス</p>
            <h2><?php echo esc_html(get_theme_mod('access_heading', '場所と連絡先')); ?></h2>
          </div>
          <div class="access-card">
            <h3><?php echo $office_name; ?></h3>
            <p class="panel-copy"><?php echo $address; ?></p>
            <ul class="access-list">
              <?php
              $access_item_count = intval(get_theme_mod('access_item_count', 2));
              if ($access_item_count < 1) $access_item_count = 1;
              if ($access_item_count > 6) $access_item_count = 6;
              $access_item_defaults = array(
                1 => '〒491-0858 愛知県一宮市栄２丁目２番５号スクエア栄801号',
                2 => '愛知・岐阜・三重',
              );
              for ($ai = 1; $ai <= $access_item_count; $ai++) :
                $item = esc_html(get_theme_mod("access_item_{$ai}", isset($access_item_defaults[$ai]) ? $access_item_defaults[$ai] : ''));
                if (empty($item)) continue;
              ?>
              <li><?php echo $item; ?></li>
              <?php endfor; ?>
            </ul>
            <p class="panel-note"><?php echo $office_name; ?><?php echo esc_html(get_theme_mod('access_note', '尾張一宮駅から徒歩5分　駐車場有')); ?></p>
          </div>
          <div class="map-frame">
            <iframe
              src="https://maps.google.com/maps?q=<?php echo urlencode(get_theme_mod('office_address', '日本、〒491-0858 愛知県一宮市栄２丁目２−５')); ?>&output=embed&hl=ja"
              width="100%" height="300" style="border:0; border-radius: var(--radius-md);"
              allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"
              title="<?php echo $office_name; ?>の地図">
            </iframe>
          </div>
          <div class="button-row">
            <a class="button secondary" href="<?php echo $google_map_url; ?>" target="_blank" rel="noreferrer">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
              Googleマップを開く
            </a>
          </div>
        </section>
      </div>
    </section>

    <!-- よくある質問 -->
    <section class="section section-alt" id="faq" aria-label="よくある質問">
      <div class="container">
        <div class="section-head animate-on-scroll">
          <p class="section-eyebrow">FAQ / よくある質問</p>
          <h2>よくあるご質問</h2>
        </div>
        <div class="faq-list">
          <?php
          $faq_defaults = array(
            1 => array('q' => '初回相談は無料ですか？', 'a' => '初回のご相談については、まずお電話にてお問い合わせください。'),
            2 => array('q' => '登記費用の目安は？', 'a' => '登記の種類や物件によって異なります。お見積もりはお気軽にご相談ください。'),
            3 => array('q' => '相続の相談もできますか？', 'a' => 'はい、相続登記や遺産分割協議書の作成も対応しております。'),
            4 => array('q' => '秘密厳守ですか？', 'a' => 'はい、司法書士には守秘義務がございます。安心してご相談ください。'),
          );
          for ($i = 1; $i <= 4; $i++) :
            $question = esc_html(get_theme_mod("faq_question_{$i}", $faq_defaults[$i]['q']));
            $answer = esc_html(get_theme_mod("faq_answer_{$i}", $faq_defaults[$i]['a']));
          ?>
          <details class="faq-item"<?php echo ($i === 1) ? ' open' : ''; ?>>
            <summary class="faq-question"><?php echo $question; ?> <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></summary>
            <div class="faq-answer"><p><?php echo $answer; ?></p></div>
          </details>
          <?php endfor; ?>
        </div>
      </div>
    </section>

    <!-- お問い合わせ -->
    <section class="section" id="contact" aria-label="お問い合わせ">
      <div class="container">
        <div class="contact-shell animate-on-scroll">
          <div>
            <h2><?php echo $office_name; ?>へのお問い合わせ</h2>
            <p><?php echo $office_name; ?><?php echo esc_html(get_theme_mod('contact_description', 'へのご相談・お問い合わせはお電話にて承っております。お気軽にお電話ください。')); ?></p>
          </div>
          <div class="contact-actions">
            <a class="button primary large" href="tel:<?php echo $phone_tel; ?>" aria-label="<?php echo $office_name; ?>に電話する <?php echo $phone; ?>">
              <?php echo $phone_svg; ?>
              <?php echo $phone; ?>
            </a>
            <a class="button secondary large" href="#hours">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              受付時間を見る
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
