<?php
//============================================================================================
//  Set image sizes
//============================================================================================
// Enable Featured Image functionality
add_theme_support('post-thumbnails');

// Custom thumbnail sizes for galleries and tiles
// NOTE (10/23/2019) - these sizes have been transitioned directly to Wordpress's built-in small, medium, and large sizes under Settings > Media
// add_image_size('gallery-image-large', 888, 618, true);      // full width (1-wide)
// add_image_size('gallery-image-medium', 444, 309, true);     // half width (2-wide)
// add_image_size('gallery-image-small', 296, 206, true);      // one-third width (3-wide)

// Custom sizes for pages and posts
add_image_size('post-banner', 888, 500, true);

// Enable cropping on all Medium images
if(!get_option("medium_crop")) {
  add_option("medium_crop", "1");
} else {
  update_option("medium_crop", "1");
}

// Enable cropping all Large images
if(!get_option("large_crop")) {
  add_option("large_crop", "1");
} else {
  update_option("large_crop", "1");
}

// Make all custom image sizes available as options in the WP admin interface
add_filter('image_size_names_choose', 'add_custom_image_sizes');

function add_custom_image_sizes($sizes) {
  return array_merge($sizes, array(
    'gallery-image-large' => __('Gallery - large'),
    'gallery-image-medium' => __('Gallery - medium'),
    'gallery-image-small' => __('Gallery - small')
  ));
}

//============================================================================================
//  Disable the injection of useless default gallery styles that disrupt flow of markup
//============================================================================================
add_filter( 'use_default_gallery_style', '__return_false' );

//============================================================================================
//  Kill emojis
//============================================================================================
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

//============================================================================================
//  Hide password-protected posts from loop()
//============================================================================================
function wpb_password_post_filter( $where = '' ) {
  if (!is_single() && !is_admin()) {
    $where .= " AND post_password = ''";
  }

  return $where;
}
add_filter( 'posts_where', 'wpb_password_post_filter' );

//============================================================================================
//  Custom pagination - see https://kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin
//============================================================================================
function custom_pagination($pages = '', $range = 2) {
  $showitems = ($range * 2) + 1;

  global $paged;

  if(empty($paged))
    $paged = 1;

  if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;

    if(!$pages) {
        $pages = 1;
    }
  }

  if(1 != $pages) {
    echo '<nav class="pagination is-centered" role="navigation" aria-label="pagination">';
    echo '  <ul class="pagination-list">';

    // Go to first page
    if($paged > 2 && $paged > $range + 1 && $showitems < $pages)
      echo '<li><a href="' . get_pagenum_link(1) . '" aria-label="Go to page 1" class="pagination-link">&laquo;</a></li>';

    // Go to previous page
    if($paged > 1 && $showitems < $pages)
      echo '<li><a href="' . get_pagenum_link($paged - 1) . '" aria-label="Go to previous page" class="pagination-link">&lsaquo;</a></li>';

    // Go to specific page
    for ($i=1; $i <= $pages; $i++) {
      if (1 != $pages &&
        (!($i >= $paged + $range + 1
              || $i <= $paged - $range - 1
            ) || $pages <= $showitems )) {
              echo '<li><a href="';

              if($paged == $i) {
                echo 'javascript:void(0)';
              } else {
                echo get_pagenum_link($i);
              }

              echo '" class="pagination-link';

              if($paged == $i) {
                echo ' is-current';
              }

              echo '">' . $i . '</a></li>';
      }
    }

    if ($paged < $pages && $showitems < $pages)
      echo '<li><a href="' . get_pagenum_link($paged + 1) . '" class="pagination-link">&rsaquo;</a></li>';

    if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages)
      echo '<li><a href="' . get_pagenum_link($pages) . '" class="pagination-link">&raquo;</a></li>';

    echo '  </ul>';
    echo '</nav>';
  }
}
?>