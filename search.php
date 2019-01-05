<?php get_header(); ?>

<div class="search-page results-page page">
    <?php
        get_search_query();

        if (have_posts()) {
			$count = 1;

    	    while (have_posts()) {
                the_post();
    ?>

        <div class="media">
            <figure class="media-left">
                <a href="<?php the_permalink(); ?>" class="image">
                    <?php the_post_thumbnail('thumbnail', ['alt' => get_the_title(), 'title' => get_the_title()]); ?>
                </a>
            </figure>
            <div class="media-content">
                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
                <a href="<?php the_permalink(); ?>" class="excerpt">
                    <span class="date"><?php the_time('F jS, Y'); ?></span> &ndash; 
                    <?= get_the_excerpt(); ?>
                </a>
            </div>
        </div>

    <?php
        }
    }
    ?>

    <?php 
    // See functions.php for custom_pagination() function
    custom_pagination(); 
    ?>
</div>

<?php get_footer(); ?>