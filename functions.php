<?php
/**
 * 時國司法書士事務所テーマ functions
 */

// テーマサポート
function tokikuni_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 40,
        'width'       => 40,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'tokikuni_setup');

// スタイルシート読み込み
function tokikuni_enqueue_styles() {
    wp_enqueue_style('tokikuni-style', get_stylesheet_uri(), array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'tokikuni_enqueue_styles');

// カスタマイザー設定
function tokikuni_customize_register($wp_customize) {

    // ==============================
    // サイトカラー（基本）
    // ==============================
    $wp_customize->add_section('tokikuni_colors', array(
        'title'    => 'サイトカラー（基本）',
        'priority' => 29,
    ));

    $color_settings = array(
        'site_bg_color' => array(
            'label'   => '背景色',
            'desc'    => 'サイト全体の背景色',
            'default' => '#F0F7FC',
        ),
        'site_primary_color' => array(
            'label'   => 'メインカラー',
            'desc'    => 'ボタン・見出し・アイコンなどの色',
            'default' => '#1A5276',
        ),
        'site_accent_color' => array(
            'label'   => 'アクセントカラー',
            'desc'    => '装飾やホバー時の色',
            'default' => '#2E86C1',
        ),
        'site_ink_color' => array(
            'label'   => '文字色',
            'desc'    => '本文テキストの色',
            'default' => '#1A2530',
        ),
        'site_surface_color' => array(
            'label'   => 'カード背景色',
            'desc'    => 'カードやパネルの背景色',
            'default' => '#ffffff',
        ),
    );

    foreach ($color_settings as $id => $opt) {
        $wp_customize->add_setting($id, array(
            'default'           => $opt['default'],
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, array(
            'label'       => $opt['label'],
            'description' => $opt['desc'],
            'section'     => 'tokikuni_colors',
        )));
    }

    // ==============================
    // セクション別カラー
    // ==============================
    $wp_customize->add_section('tokikuni_section_colors', array(
        'title'    => 'サイトカラー（セクション別）',
        'priority' => 29,
    ));

    $section_colors = array(
        'color_header_bg' => array(
            'label'   => 'ヘッダー背景色',
            'desc'    => '上部ヘッダーの背景色（空欄で背景色と同じ）',
            'default' => '',
        ),
        'color_hero_bg' => array(
            'label'   => 'ヒーロー（トップ）背景色',
            'desc'    => 'トップのメインビジュアル部分',
            'default' => '',
        ),
        'color_quickinfo_bg' => array(
            'label'   => '基本情報バー背景色',
            'desc'    => '営業時間などの情報バー',
            'default' => '',
        ),
        'color_about_bg' => array(
            'label'   => '事務所について 背景色',
            'desc'    => '',
            'default' => '',
        ),
        'color_services_bg' => array(
            'label'   => '業務内容 背景色',
            'desc'    => '',
            'default' => '',
        ),
        'color_gallery_bg' => array(
            'label'   => 'ギャラリー 背景色',
            'desc'    => '',
            'default' => '',
        ),
        'color_flow_bg' => array(
            'label'   => 'ご相談の流れ 背景色',
            'desc'    => '',
            'default' => '',
        ),
        'color_hours_bg' => array(
            'label'   => '受付時間・アクセス 背景色',
            'desc'    => '',
            'default' => '',
        ),
        'color_faq_bg' => array(
            'label'   => 'よくある質問 背景色',
            'desc'    => '',
            'default' => '',
        ),
        'color_contact_bg' => array(
            'label'   => 'お問い合わせ 背景色',
            'desc'    => 'お問い合わせバーの背景色',
            'default' => '',
        ),
        'color_footer_bg' => array(
            'label'   => 'フッター背景色',
            'desc'    => 'ページ最下部',
            'default' => '',
        ),
    );

    foreach ($section_colors as $id => $opt) {
        $wp_customize->add_setting($id, array(
            'default'           => $opt['default'],
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, array(
            'label'       => $opt['label'],
            'description' => $opt['desc'],
            'section'     => 'tokikuni_section_colors',
        )));
    }

    // ==============================
    // 基本情報セクション
    // ==============================
    $wp_customize->add_section('tokikuni_basic', array(
        'title'    => '基本情報',
        'priority' => 30,
    ));

    // 事務所名
    $wp_customize->add_setting('office_name', array(
        'default'           => '時國司法書士事務所',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('office_name', array(
        'label'   => '事務所名',
        'section' => 'tokikuni_basic',
        'type'    => 'text',
    ));

    // サブタイトル
    $wp_customize->add_setting('office_subtitle', array(
        'default'           => '一宮市 / 司法書士事務所',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('office_subtitle', array(
        'label'   => 'ヘッダーサブタイトル',
        'section' => 'tokikuni_basic',
        'type'    => 'text',
    ));

    // 電話番号
    $wp_customize->add_setting('phone_number', array(
        'default'           => '0586-25-0366',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('phone_number', array(
        'label'   => '電話番号',
        'section' => 'tokikuni_basic',
        'type'    => 'text',
    ));

    // 電話番号（tel:用）
    $wp_customize->add_setting('phone_tel', array(
        'default'           => '0586250366',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('phone_tel', array(
        'label'       => '電話番号（ハイフンなし）',
        'description' => 'tel:リンク用。例: 0586250366',
        'section'     => 'tokikuni_basic',
        'type'        => 'text',
    ));

    // 住所
    $wp_customize->add_setting('office_address', array(
        'default'           => '日本、〒491-0858 愛知県一宮市栄２丁目２−５',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('office_address', array(
        'label'   => '住所',
        'section' => 'tokikuni_basic',
        'type'    => 'text',
    ));

    // Googleマップ CID
    $wp_customize->add_setting('google_map_url', array(
        'default'           => 'https://maps.google.com/?cid=5348314544645183231&g_mp=Cidnb29nbGUubWFwcy5wbGFjZXMudjEuUGxhY2VzLlNlYXJjaFRleHQQAhgEIAA',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('google_map_url', array(
        'label'   => 'GoogleマップURL',
        'section' => 'tokikuni_basic',
        'type'    => 'url',
    ));

    // ==============================
    // ヒーローセクション
    // ==============================
    $wp_customize->add_section('tokikuni_hero', array(
        'title'    => 'ヒーロー（トップ）',
        'priority' => 31,
    ));

    $wp_customize->add_setting('hero_eyebrow', array(
        'default'           => '一宮市の司法書士事務所',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_eyebrow', array(
        'label'   => 'アイブロウテキスト',
        'section' => 'tokikuni_hero',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_title', array(
        'default'           => '一宮市の司法書士事務所、時國司法書士事務所。',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => '見出し',
        'section' => 'tokikuni_hero',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_lead', array(
        'default'           => '時國司法書士事務所は、一宮市にある司法書士事務所です。お気軽にお問い合わせください。',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_lead', array(
        'label'   => 'リード文',
        'section' => 'tokikuni_hero',
        'type'    => 'textarea',
    ));

    // ヒーロー画像
    $wp_customize->add_setting('hero_image', array(
        'default'           => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=800&h=600&fit=crop&q=80',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label'   => 'ヒーロー画像',
        'section' => 'tokikuni_hero',
    )));

    // ファクトチップ (4つ)
    for ($i = 1; $i <= 4; $i++) {
        $defaults = array(
            1 => '営業時間はお問い合わせください',
            2 => '詳しくはお電話で',
            3 => '初回無料相談・不動産登記',
            4 => '一宮市エリア',
        );
        $wp_customize->add_setting("fact_chip_{$i}", array(
            'default'           => $defaults[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("fact_chip_{$i}", array(
            'label'   => "特徴チップ {$i}",
            'section' => 'tokikuni_hero',
            'type'    => 'text',
        ));
    }

    // ==============================
    // 事務所について
    // ==============================
    $wp_customize->add_section('tokikuni_about', array(
        'title'    => '事務所について',
        'priority' => 32,
    ));

    $wp_customize->add_setting('about_heading', array(
        'default'           => '登記・法律のことならお任せください',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_heading', array(
        'label'   => '見出し',
        'section' => 'tokikuni_about',
        'type'    => 'text',
    ));

    for ($i = 1; $i <= 3; $i++) {
        $title_defaults = array(
            1 => '不動産登記の専門家',
            2 => '会社登記もお任せ',
            3 => '相続手続きの支援',
        );
        $desc_defaults = array(
            1 => '不動産売買・相続に伴う登記手続きを迅速かつ正確に対応いたします。',
            2 => '会社設立登記・役員変更・増資など、商業登記も幅広くサポートいたします。',
            3 => '遺産分割協議書の作成から相続登記まで、ワンストップで対応いたします。',
        );

        $wp_customize->add_setting("about_card_title_{$i}", array(
            'default'           => $title_defaults[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("about_card_title_{$i}", array(
            'label'   => "カード{$i} タイトル",
            'section' => 'tokikuni_about',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("about_card_desc_{$i}", array(
            'default'           => $desc_defaults[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("about_card_desc_{$i}", array(
            'label'   => "カード{$i} 説明",
            'section' => 'tokikuni_about',
            'type'    => 'textarea',
        ));
    }

    // ==============================
    // 業務内容
    // ==============================
    $wp_customize->add_section('tokikuni_services', array(
        'title'    => '業務内容',
        'priority' => 33,
    ));

    // 表示数の設定
    $wp_customize->add_setting('service_count', array(
        'default'           => 5,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('service_count', array(
        'label'       => '表示する業務の数',
        'description' => '1〜12の間で選択してください。',
        'section'     => 'tokikuni_services',
        'type'        => 'number',
        'input_attrs' => array('min' => 1, 'max' => 12, 'step' => 1),
        'priority'    => 1,
    ));

    $svc_titles_defaults = array(
        1 => '初回無料相談', 2 => '不動産登記', 3 => '商業登記',
        4 => '相続登記', 5 => '債務整理', 6 => '', 7 => '',
        8 => '', 9 => '', 10 => '', 11 => '', 12 => '',
    );
    $svc_prices_defaults = array(
        1 => '無料 / 30分', 2 => '¥40,000〜', 3 => '¥30,000〜',
        4 => '¥60,000〜', 5 => '¥30,000〜', 6 => '', 7 => '',
        8 => '', 9 => '', 10 => '', 11 => '', 12 => '',
    );

    for ($i = 1; $i <= 12; $i++) {
        $wp_customize->add_setting("service_title_{$i}", array(
            'default'           => $svc_titles_defaults[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("service_title_{$i}", array(
            'label'   => "サービス{$i} 名称",
            'section' => 'tokikuni_services',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("service_price_{$i}", array(
            'default'           => $svc_prices_defaults[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("service_price_{$i}", array(
            'label'   => "サービス{$i} 料金",
            'section' => 'tokikuni_services',
            'type'    => 'text',
        ));
    }

    // ==============================
    // ギャラリー画像
    // ==============================
    $wp_customize->add_section('tokikuni_gallery', array(
        'title'    => 'ギャラリー画像',
        'priority' => 34,
    ));

    $gallery_defaults = array(
        1 => array('url' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=600&h=450&fit=crop&q=80', 'alt' => '登記相談'),
        2 => array('url' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&h=450&fit=crop&q=80', 'alt' => '書類作成'),
        3 => array('url' => 'https://images.unsplash.com/photo-1497215842964-222b430dc094?w=600&h=450&fit=crop&q=80', 'alt' => '事務所の様子'),
        4 => array('url' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=600&h=450&fit=crop&q=80', 'alt' => '打ち合わせ'),
        5 => array('url' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&h=450&fit=crop&q=80', 'alt' => '不動産登記'),
        6 => array('url' => 'https://images.unsplash.com/photo-1568992687947-868a62a9f521?w=600&h=450&fit=crop&q=80', 'alt' => '丁寧なサポート'),
    );

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("gallery_image_{$i}", array(
            'default'           => $gallery_defaults[$i]['url'],
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "gallery_image_{$i}", array(
            'label'   => "ギャラリー画像 {$i}",
            'section' => 'tokikuni_gallery',
        )));

        $wp_customize->add_setting("gallery_alt_{$i}", array(
            'default'           => $gallery_defaults[$i]['alt'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("gallery_alt_{$i}", array(
            'label'   => "画像{$i} 説明文",
            'section' => 'tokikuni_gallery',
            'type'    => 'text',
        ));
    }

    // ==============================
    // FAQ
    // ==============================
    $wp_customize->add_section('tokikuni_faq', array(
        'title'    => 'よくある質問',
        'priority' => 35,
    ));

    $faq_defaults = array(
        1 => array('q' => '初回相談は無料ですか？', 'a' => '初回のご相談については、まずお電話にてお問い合わせください。'),
        2 => array('q' => '登記費用の目安は？', 'a' => '登記の種類や物件によって異なります。お見積もりはお気軽にご相談ください。'),
        3 => array('q' => '相続の相談もできますか？', 'a' => 'はい、相続登記や遺産分割協議書の作成も対応しております。'),
        4 => array('q' => '秘密厳守ですか？', 'a' => 'はい、司法書士には守秘義務がございます。安心してご相談ください。'),
    );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("faq_question_{$i}", array(
            'default'           => $faq_defaults[$i]['q'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("faq_question_{$i}", array(
            'label'   => "質問 {$i}",
            'section' => 'tokikuni_faq',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("faq_answer_{$i}", array(
            'default'           => $faq_defaults[$i]['a'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("faq_answer_{$i}", array(
            'label'   => "回答 {$i}",
            'section' => 'tokikuni_faq',
            'type'    => 'textarea',
        ));
    }

    // ==============================
    // 基本情報バー
    // ==============================
    $wp_customize->add_section('tokikuni_quickinfo', array(
        'title'    => '基本情報バー',
        'priority' => 31,
    ));

    $qi_defaults = array(
        1 => array('label' => '営業時間', 'value' => 'お問い合わせください'),
        2 => array('label' => '初回無料相談', 'value' => '無料 / 30分'),
        3 => array('label' => 'アクセス', 'value' => '一宮市'),
    );
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("qi_label_{$i}", array(
            'default'           => $qi_defaults[$i]['label'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("qi_label_{$i}", array(
            'label'   => "情報バー{$i} ラベル",
            'section' => 'tokikuni_quickinfo',
            'type'    => 'text',
        ));
        $wp_customize->add_setting("qi_value_{$i}", array(
            'default'           => $qi_defaults[$i]['value'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("qi_value_{$i}", array(
            'label'   => "情報バー{$i} 内容",
            'section' => 'tokikuni_quickinfo',
            'type'    => 'text',
        ));
    }

    // ==============================
    // 業務内容（見出し追加）
    // ==============================
    $wp_customize->add_setting('services_heading', array(
        'default'           => '取扱業務のご案内',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_heading', array(
        'label'   => 'セクション見出し',
        'section' => 'tokikuni_services',
        'type'    => 'text',
        'priority' => 0,
    ));

    // ==============================
    // ギャラリー（見出し追加）
    // ==============================
    $wp_customize->add_setting('gallery_heading', array(
        'default'           => '事務所をご覧ください',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('gallery_heading', array(
        'label'   => 'セクション見出し',
        'section' => 'tokikuni_gallery',
        'type'    => 'text',
        'priority' => 0,
    ));

    // ==============================
    // ご相談の流れ
    // ==============================
    $wp_customize->add_section('tokikuni_flow', array(
        'title'    => 'ご相談の流れ',
        'priority' => 35,
    ));

    $wp_customize->add_setting('flow_heading', array(
        'default'           => 'ご相談から完了まで',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('flow_heading', array(
        'label'   => 'セクション見出し',
        'section' => 'tokikuni_flow',
        'type'    => 'text',
    ));

    $flow_defaults = array(
        1 => array('title' => 'お問い合わせ', 'desc' => 'お電話またはメールにてお気軽にお問い合わせください。'),
        2 => array('title' => '初回面談・お見積り', 'desc' => 'ご状況をお伺いし、手続きの流れと費用をご説明いたします。'),
        3 => array('title' => '書類作成・登記申請', 'desc' => '必要書類の作成から法務局への申請まで代行いたします。'),
        4 => array('title' => '完了・アフターフォロー', 'desc' => '登記完了後の書類をお渡しし、必要に応じてフォローアップいたします。'),
    );
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("flow_title_{$i}", array(
            'default'           => $flow_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("flow_title_{$i}", array(
            'label'   => "STEP {$i} タイトル",
            'section' => 'tokikuni_flow',
            'type'    => 'text',
        ));
        $wp_customize->add_setting("flow_desc_{$i}", array(
            'default'           => $flow_defaults[$i]['desc'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("flow_desc_{$i}", array(
            'label'   => "STEP {$i} 説明",
            'section' => 'tokikuni_flow',
            'type'    => 'textarea',
        ));
    }

    // ==============================
    // 受付時間
    // ==============================
    $wp_customize->add_section('tokikuni_hours', array(
        'title'    => '受付時間',
        'priority' => 36,
    ));

    $wp_customize->add_setting('hours_heading', array(
        'default'           => 'お問い合わせ受付時間',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hours_heading', array(
        'label'   => 'セクション見出し',
        'section' => 'tokikuni_hours',
        'type'    => 'text',
        'priority' => 0,
    ));

    $wp_customize->add_setting('hours_note', array(
        'default'           => 'の詳しい営業時間はお電話にてご確認ください。',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hours_note', array(
        'label'       => '注意書き（事務所名の後に表示）',
        'section'     => 'tokikuni_hours',
        'type'        => 'text',
        'priority'    => 1,
    ));

    $hours_defaults = array(
        1 => array('label' => '営業時間', 'value' => 'お問い合わせください'),
        2 => array('label' => '定休日',   'value' => 'お問い合わせください'),
        3 => array('label' => '受付方法', 'value' => 'お電話にて'),
        4 => array('label' => 'アクセス', 'value' => 'お問い合わせください'),
    );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("hours_label_{$i}", array(
            'default'           => $hours_defaults[$i]['label'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("hours_label_{$i}", array(
            'label'   => "項目{$i} ラベル",
            'section' => 'tokikuni_hours',
            'type'    => 'text',
        ));

        $wp_customize->add_setting("hours_value_{$i}", array(
            'default'           => $hours_defaults[$i]['value'],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("hours_value_{$i}", array(
            'label'   => "項目{$i} 内容",
            'section' => 'tokikuni_hours',
            'type'    => 'text',
        ));
    }

    // ==============================
    // アクセス
    // ==============================
    $wp_customize->add_section('tokikuni_access', array(
        'title'    => 'アクセス',
        'priority' => 37,
    ));

    $wp_customize->add_setting('access_heading', array(
        'default'           => '場所と連絡先',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('access_heading', array(
        'label'   => 'セクション見出し',
        'section' => 'tokikuni_access',
        'type'    => 'text',
    ));

    // アクセス情報の項目数
    $wp_customize->add_setting('access_item_count', array(
        'default'           => 2,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('access_item_count', array(
        'label'       => '情報項目の数',
        'description' => '住所・エリアなどのリスト項目数（1〜6）',
        'section'     => 'tokikuni_access',
        'type'        => 'number',
        'input_attrs' => array('min' => 1, 'max' => 6, 'step' => 1),
    ));

    $access_item_defaults = array(
        1 => '〒491-0858 愛知県一宮市栄２丁目２番５号スクエア栄801号',
        2 => '愛知・岐阜・三重',
        3 => '', 4 => '', 5 => '', 6 => '',
    );
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("access_item_{$i}", array(
            'default'           => $access_item_defaults[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("access_item_{$i}", array(
            'label'   => "情報項目 {$i}",
            'section' => 'tokikuni_access',
            'type'    => 'text',
        ));
    }

    $wp_customize->add_setting('access_note', array(
        'default'           => '尾張一宮駅から徒歩5分　駐車場有',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('access_note', array(
        'label'       => '補足文（事務所名の後に表示）',
        'section'     => 'tokikuni_access',
        'type'        => 'text',
    ));

    // ==============================
    // お問い合わせ
    // ==============================
    $wp_customize->add_section('tokikuni_contact', array(
        'title'    => 'お問い合わせ',
        'priority' => 39,
    ));

    $wp_customize->add_setting('contact_description', array(
        'default'           => 'へのご相談・お問い合わせはお電話にて承っております。お気軽にお電話ください。',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_description', array(
        'label'       => '説明文（事務所名の後に表示）',
        'section'     => 'tokikuni_contact',
        'type'        => 'textarea',
    ));

    // ==============================
    // フッター
    // ==============================
    $wp_customize->add_section('tokikuni_footer', array(
        'title'    => 'フッター',
        'priority' => 40,
    ));

    $wp_customize->add_setting('footer_hours_text', array(
        'default'           => '営業時間はお問い合わせください',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_hours_text', array(
        'label'   => '営業時間テキスト',
        'section' => 'tokikuni_footer',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'tokikuni_customize_register');

// カスタマイザーのカラー設定をインラインCSSで出力
function tokikuni_custom_colors_css() {
    $css = '';

    // 基本カラー
    $bg      = get_theme_mod('site_bg_color', '#F0F7FC');
    $primary = get_theme_mod('site_primary_color', '#1A5276');
    $accent  = get_theme_mod('site_accent_color', '#2E86C1');
    $ink     = get_theme_mod('site_ink_color', '#1A2530');
    $surface = get_theme_mod('site_surface_color', '#ffffff');

    $has_base = ($bg !== '#F0F7FC' || $primary !== '#1A5276' || $accent !== '#2E86C1' || $ink !== '#1A2530' || $surface !== '#ffffff');

    if ($has_base) {
        $css .= ':root{';
        if ($bg !== '#F0F7FC')      $css .= '--bg:' . esc_attr($bg) . ';';
        if ($primary !== '#1A5276') $css .= '--primary:' . esc_attr($primary) . ';';
        if ($accent !== '#2E86C1')  $css .= '--accent:' . esc_attr($accent) . ';--secondary:' . esc_attr($accent) . ';';
        if ($ink !== '#1A2530')     $css .= '--ink:' . esc_attr($ink) . ';';
        if ($surface !== '#ffffff') $css .= '--surface:' . esc_attr($surface) . ';';
        if ($bg !== '#F0F7FC' || $accent !== '#2E86C1') {
            $css .= '--accent-soft:color-mix(in srgb,' . esc_attr($accent) . ' 15%,' . esc_attr($bg) . ');';
        }
        $css .= '}';
    }

    // セクション別カラー
    $section_map = array(
        'color_header_bg'    => '.site-header',
        'color_hero_bg'      => '.hero',
        'color_quickinfo_bg' => '.quick-info',
        'color_about_bg'     => '#about',
        'color_services_bg'  => '#guide',
        'color_gallery_bg'   => '#gallery',
        'color_flow_bg'      => 'section[aria-label="ご相談から完了まで"]',
        'color_hours_bg'     => '#hours',
        'color_faq_bg'       => '#faq',
        'color_contact_bg'   => '.contact-shell',
        'color_footer_bg'    => '.site-footer',
    );
    foreach ($section_map as $setting => $selector) {
        $color = get_theme_mod($setting, '');
        if ($color) {
            $css .= $selector . '{background:' . esc_attr($color) . '!important}';
        }
    }

    if ($css) {
        echo '<style id="tokikuni-custom-colors">' . $css . '</style>';
    }
}
add_action('wp_head', 'tokikuni_custom_colors_css', 20);

// カスタマイザーのリアルタイムプレビュー用JS
function tokikuni_customize_preview_js() {
    $js = '
    var baseMap = {
        "site_bg_color":      "--bg",
        "site_primary_color": "--primary",
        "site_accent_color":  "--accent",
        "site_ink_color":     "--ink",
        "site_surface_color": "--surface"
    };
    Object.keys(baseMap).forEach(function(id) {
        wp.customize(id, function(value) {
            value.bind(function(newval) {
                document.documentElement.style.setProperty(baseMap[id], newval);
                if (id === "site_accent_color") {
                    document.documentElement.style.setProperty("--secondary", newval);
                }
                if (id === "site_bg_color" || id === "site_accent_color") {
                    var bg = wp.customize("site_bg_color")();
                    var ac = wp.customize("site_accent_color")();
                    document.documentElement.style.setProperty("--accent-soft", "color-mix(in srgb, " + ac + " 15%, " + bg + ")");
                }
            });
        });
    });

    var sectionMap = {
        "color_header_bg":    ".site-header",
        "color_hero_bg":      ".hero",
        "color_quickinfo_bg": ".quick-info",
        "color_about_bg":     "#about",
        "color_services_bg":  "#guide",
        "color_gallery_bg":   "#gallery",
        "color_flow_bg":      "section[aria-label=\'ご相談から完了まで\']",
        "color_hours_bg":     "#hours",
        "color_faq_bg":       "#faq",
        "color_contact_bg":   ".contact-shell",
        "color_footer_bg":    ".site-footer"
    };
    Object.keys(sectionMap).forEach(function(id) {
        wp.customize(id, function(value) {
            value.bind(function(newval) {
                var el = document.querySelector(sectionMap[id]);
                if (el) el.style.background = newval || "";
            });
        });
    });
    ';
    wp_add_inline_script('customize-preview', $js);
}
add_action('customize_preview_init', 'tokikuni_customize_preview_js');

// ヘルパー関数
function tokikuni_get($setting, $default = '') {
    return get_theme_mod($setting, $default);
}

// フロントページ設定
function tokikuni_front_page_template($template) {
    if (is_front_page() || is_home()) {
        $front = locate_template('front-page.php');
        if ($front) {
            return $front;
        }
    }
    return $template;
}
add_filter('template_include', 'tokikuni_front_page_template');
