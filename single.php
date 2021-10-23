<?php get_header(); ?>

<?php the_post(); ?>

<main id="main" tabindex="-1">
  <article class="post" id="main" tabindex="-1">
    <div class="header">
      <?php
      if( has_post_thumbnail() ) {
      ?>

        <div class="banner">
          <img src="<?php the_post_thumbnail_url('banner'); ?>" alt="<?php the_title(); ?>">
        </div>

      <?php
      }
      ?>

      <h1 class="title"><?php the_title(); ?></h1>
      <div class="date"><?php the_date(); ?></div>
    </div>

    <div class="content">
      <?php the_content(); ?>
    </div>
  </article>
</main>

<?php get_footer(); ?>