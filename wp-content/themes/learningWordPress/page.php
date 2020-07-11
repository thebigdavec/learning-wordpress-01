<?php

get_header();


if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <article class="post page">
            <?php
            $args = array(
                'child_of' => get_top_ancestor_id(),
                'page_id' => get_the_ID(),
                'title_li' => ''
            );

            if (has_children() OR $post->post_parent > 0) {
                ?>
                <nav class="site-nav children-links">
                    <div class="parent-link">
                        <a href="<?php echo get_the_permalink(get_top_ancestor_id()); ?>">
                            <?php echo get_the_title(get_top_ancestor_id()); ?>
                        </a>
                    </div>
                    <div>
                        <ul>
                            <?php
                            wp_list_pages($args);
                            ?>
                        </ul>
                    </div>
                </nav> <?php } ?>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </article>
    <?php endwhile;
else :
    echo '<p>No content found</p>';
endif;

get_footer();

?>