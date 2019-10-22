<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

// Get data passed by JS
$dataString = file_get_contents('php://input');
$data = json_decode($dataString);

// Use the 'work' category as the initial filter
$categories = array(get_category_by_slug('work')->cat_ID);

// If another category has been provided, combine it with 'work'
if(isset($data->category) && $data->category != null) {
  array_push($categories, get_category_by_slug($data->category)->cat_ID);
}

// Return all posts by default
$count = -1;

// If a limit is provided, use it instead
if(isset($data->count) && $data->count != null) {
  $count = $data->count;
}

// Retrieve the WP posts matching the categories requested
query_posts(array(
  'category__and' => $categories,
  'posts_per_page' => $count,
  'meta_query' => array(array('key' => '_thumbnail_id'))
));

// Compile the most relevant data from the posts in a simpler format
$posts = array();
if(have_posts()) {
  while(have_posts()) {
    the_post();

    if(has_post_thumbnail()) {
      $post_data = array(
        "title" => get_the_title(),
        "year" => get_the_date('Y'),
        "url" => get_the_permalink(),
        "image_large" => get_the_post_thumbnail_url(get_the_ID(), 'gallery-image-large'),
        "image_medium" => get_the_post_thumbnail_url(get_the_ID(), 'gallery-image-medium'),
        "image_small" => get_the_post_thumbnail_url(get_the_ID(), 'gallery-image-small')
      );

      array_push($posts, $post_data);
    }
  }
}

// Output the post information as JSON
header('Content-type: application/json');
echo json_encode($posts);
?>