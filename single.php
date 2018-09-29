<?php get_header(); ?>

<?php the_post(); ?>

<div class="post page">
  <?php
    $featured_images;

    // See Dynamic Featured Image API - https://github.com/ankitpokhrel/Dynamic-Featured-Image/wiki/Retrieving-data-in-a-theme
    if(class_exists('Dynamic_Featured_Image')) {
      global $dynamic_featured_image;
      $featured_images = $dynamic_featured_image->get_featured_images();
    }

    if(isset($featured_images) && sizeof($featured_images) > 0) {
      $count = 0;
    ?>

  <div class="carousel has-dots">

    <?php  
    foreach($featured_images as $featured_image) {
      // WP reference: https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
      $image = wp_get_attachment_image($featured_image['attachment_id'], 'post-banner');
    ?>

    <div class="carousel__slide<?php if($count > 0) echo ' is-hidden'; ?>">
      <?= $image; ?>
    </div>

    <?php
      $count++;
    }
    ?>

  </div>

  <?php
  }
  ?>

  <header>
    <h1 class="title">
      <?php the_title(); ?>
    </h1>

    <div class="date">
      Added on
      <?php the_date(); ?>
    </div>

    <?php
    $categories = get_the_category();

    if(is_array($categories) && count($categories) > 0) {
    ?>

    <ul class="categories">
      <?php
      foreach($categories as $category) {
        if($category->slug != "portfolio" && $category->slug != "work")
          echo '<li><a href="/category/' . $category->slug . '" class="tag is-light">' . $category->name . '</a></li>';
      }
      ?>
    </ul>

    <?php
    }
    ?>
  </header>

  <section class="post__body">
    <?php the_content(); ?>
  </section>
</div>

<?php get_footer(); ?>