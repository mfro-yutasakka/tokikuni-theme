<?php
/**
 * メインテンプレート - フロントページにリダイレクト
 */
get_header();
?>

<main id="main-content">
  <div class="container" style="padding: 80px 0;">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
      </article>
    <?php endwhile; else : ?>
      <p>コンテンツがありません。</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
