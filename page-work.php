<?php get_header(); ?>

<section class="work-page page" data-page-title="Work">
  <nav class="work-controls has-text-centered">
    <ul>
      <?php
      $categories = get_categories();
      
      foreach($categories as $category) {
        if( $category->name != 'Uncategorized' &&
          $category->name != 'Work' &&
          $category->name != 'Other') {
      ?>

      <li>
        <a href="#<?= $category->slug; ?>" class="tag is-light">
          <?= $category->name; ?>
        </a>
      </li>

      <?php
        }
      }
      ?>

      <li><a href="#academic" class="tag is-light">Academic</a></li>
    </ul>
  </nav>

  <div class="work-items"></div>
</section>

<?php get_footer(); ?>