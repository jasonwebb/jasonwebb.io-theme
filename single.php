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

      <div class="details">
        Added on <?php the_date(); ?> in

        <?php
          $categories = get_the_category();

          if(is_array($categories) && count($categories) > 0) {
        ?>

          <ul class="categories">

            <?php
              foreach($categories as $category)
                if($category->slug != "portfolio" && $category->slug != "work")
                  echo '<li><a href="/category/' . $category->slug . '" class="tag is-light">' . $category->name . '</a></li>';
            ?>

          </ul>

        <?php
          }
        ?>
      </div>
    </div>

    <div class="content">
      <?php the_content(); ?>
    </div>
  </article>
</main>

<?php get_footer(); ?>