<div class="work-item columns is-gapless">
  <div class="column is-5">
    <div class="carousel has-dots">
      <?php
      if(isset($featured_images)) {
        foreach($featured_images as $featured_image) {
          // WP reference: https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
          $image = wp_get_attachment_image($featured_image['attachment_id'], 'work-thumbnail');
      ?>

        <div class="carousel__slide">
          <a href="<?php the_permalink(); ?>" class="work-item__image">
            <?= $image; ?>
          </a>
        </div>

      <?php
          }
      }
      ?>
    </div>
  </div>

  <div class="column is-7 work-item__right-column">
    <h3 class="work-item__title">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h3>

    <a href="<?php the_permalink(); ?>" class="work-item__description">
      <span class="date"><?php the_time('F jS, Y'); ?></span> &ndash;
      <?= get_the_excerpt(); ?>
    </a>
  </div>
</div>