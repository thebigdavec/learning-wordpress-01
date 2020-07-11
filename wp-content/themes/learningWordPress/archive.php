<?php

get_header();

if (have_posts()) : ?>

<h2><?php

    if ( is_category() ) {
        echo 'Archive of Category: ';
        single_cat_title();
    } elseif ( is_tag() ) {
        echo 'Archive of Tag: ';
        single_tag_title();
    } elseif ( is_author() ) {
        echo 'Archive of Author: ';
        the_post();
        echo get_the_author();
        rewind_posts();
    } elseif ( is_day() ) {
        echo 'Archive of Day: ' . get_the_date();
    } elseif ( is_month() ) {
        echo 'Archive of Month: ' . get_the_date('F Y');
    } elseif ( is_year() ) {
        echo 'Archive of Year: ' . get_the_date('Y');
    } else {
        echo 'Archive:';
    }

    ?></h2>

<?php
    while (have_posts()) : the_post(); ?>
        <article class="post">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="post-info">
                <?php
                $the_date = get_the_date('F jS, Y');
                if ($the_date) {
                    echo $the_date;
                }

                $the_author = get_the_author();
                if ($the_author) {
                    if ($the_date) {
                        echo ' | ';
                    }
                    ?>
                    By <a
                            href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author() ?></a>

                    <?php
                }
                $categories = get_the_category();
                $seperator = ", ";
                $output = "";
                if ($categories) {
                    if ($the_date OR $the_author) {
                        echo ' | ';
                    }
                    foreach ($categories as $category) {
                        if ($output) {
                            $output .= $seperator;
                        } else {
                            $output = "Posted in ";
                        }
                        $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>';
                    }
                    echo $output;
                }
                ?></p>
            <?php the_excerpt(); ?>
        </article>
    <?php endwhile;
else :
    echo '<p>No content found</p>';
endif;

get_footer();

?>
