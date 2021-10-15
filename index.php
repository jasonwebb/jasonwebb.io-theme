<?php get_header(); ?>

<main class="home-page" id="main" tabindex="-1">
  <h1 class="visually-hidden">Home page</h1>

  <div class="introduction page">
    <?php
      $page = get_page_by_title('Home');
      $content = apply_filters('the_content', $page->post_content);
      echo $content;
    ?>
  </div>

  <?php
  // Retrieve the WP posts matching the categories requested
  query_posts(array(
    'category__and' => array(get_category_by_slug('work')->cat_ID),
    'posts_per_page' => 1,
    'meta_query' => array(array('key' => '_thumbnail_id'))
  ));

  if(have_posts()) {
    while(have_posts()) {
      the_post();

      if(has_post_thumbnail()) {
        $thumbnailID = get_post_thumbnail_id($post->ID);

        $post_data = array(
          "title" => get_the_title(),
          "year" => get_the_date('Y'),
          "url" => get_the_permalink(),
          "full" => wp_get_attachment_image_src($thumbnailID, 'full')[0],
          "image_large" => wp_get_attachment_image_src($thumbnailID, 'large')[0],
          "image_medium" => wp_get_attachment_image_src($thumbnailID, 'medium')[0],
          "image_small" => wp_get_attachment_image_src($thumbnailID, 'thumbnail')[0]
        );

        echo '
          <a href="' . $post_data["url"] .'" class="featured">
            <div class="title">
              <h2>
                <span>
                  <b>' . $post_data["title"] . '</b>
                  <small>(' . $post_data["year"] . ')</small>
                </span>
              </h2>
            </div>

            <img
              srcset="' . $post_data["image_small"] . ' 296w,
                      ' . $post_data["image_medium"] . ' 444w,
                      ' . $post_data["full"] . ' 888w"
              sizes="(max-width: 768px) 296px,
                    (max-width: 1023px) 444px,
                    888px"
              src="' . $post_data["full"] . '"
              alt=""
            >
          </a>
        ';
      }
    }
  }
  ?>

  <ul class="tiles" aria-label="Portfolio samples"></ul>

  <div class="see-more-wrapper">
    <a href="/work" class="button is-ghost">See more of my work</a>
  </div>
</main>

<?php get_footer(); ?>