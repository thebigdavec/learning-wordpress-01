<?php

/*
Template Name: Legalese Layout
 */

get_header();

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <article class="post page columns-one-three">
            <div><h1><?php the_title(); ?></h1></div>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile;
else :
    echo '<p>No content found</p>';
endif;

get_footer();

?>