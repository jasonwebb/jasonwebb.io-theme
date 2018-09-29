<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

$page = $_GET['page'];
$offset = $_GET['offset'];
$cat = get_category_by_slug($page)->cat_ID;;

// If academic page is requested, skip the WP post query
if(isset($page) && $page == 'academic') {
  require('academic.php');
  return;
}

// Ensure that offset is sanitized
if(!isset($offset)) {
  $offset = 0;
}

// Run the WP post query
query_posts(
  array(
    'category__and' => array(21, $cat),
    'posts_per_page' => -1,
    'offset' => $offset
  )
);

// For each work item post, pass the data to a work item template
if(have_posts()) {
  while(have_posts()) {
    the_post();
    $featured_images;

    // See Dynamic Featured Image API - https://github.com/ankitpokhrel/Dynamic-Featured-Image/wiki/Retrieving-data-in-a-theme
    if(class_exists('Dynamic_Featured_Image')) {
      global $dynamic_featured_image;
      $featured_images = $dynamic_featured_image->get_featured_images();
    }

    // TODO: Replace wth JSON object
    require('work-item-template.php');
  }
} else {
  echo 'Hello world';
}
?>