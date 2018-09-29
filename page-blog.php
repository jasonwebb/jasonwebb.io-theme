<?php get_header(); ?>

<section class="blog-page results-page page" data-page-title="Blog">
    <?php
        query_posts(array(
            'posts_per_page' => 10,
            'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1
        ));

        if (have_posts()) {
    	    while (have_posts()) {
                the_post();

                $featured_images;
                $hasThumbnail = has_post_thumbnail();

                // See Dynamic Featured Image API - https://github.com/ankitpokhrel/Dynamic-Featured-Image/wiki/Retrieving-data-in-a-theme
                if(class_exists('Dynamic_Featured_Image')) {
                    global $dynamic_featured_image;
                    $featured_images = $dynamic_featured_image->get_featured_images();

                    if(sizeof($featured_images) > 0) {
                        $hasThumbnail = true;
                    }
                }
    ?>

        <div class="media<?php if(!$hasThumbnail) echo ' has-no-thumbnail'; ?>">
            <a href="<?php the_permalink(); ?>" class="touch-mask"></a>
            <?php
                // Use images from Dynamic Featured Image plugin, if set
                if(isset($featured_images) && sizeof($featured_images) > 0) {
                    $image = wp_get_attachment_image($featured_images[0]['attachment_id'], 'thumbnail');
            ?>

                <figure class="media-left">
                    <a href="<?php the_permalink(); ?>" class="image">
                        <?= $image; ?>
                    </a>
                </figure>

            <?php
                // Otherwise, use WP 'featured' thumbnail
                } elseif(has_post_thumbnail()) {
            ?>

                    <figure class="media-left">
                        <a href="<?php the_permalink(); ?>" class="image">
                            <?php the_post_thumbnail('thumbnail', ['alt' => get_the_title(), 'title' => get_the_title()]); ?>
                        </a>
                    </figure>

            <?php
                }
            ?>
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
    // See functions.php for custom_pagination()
    custom_pagination();
    ?>
</section>

<?php get_footer(); ?>