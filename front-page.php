<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<?php

/** Code for custom loop */
function my_custom_loop() {
    ?>




    <?php
    $args = array(
        'cat' => 139,
        'order' => 'ASC',
    );
    $posts = query_posts($args);
    if (have_posts())

        ?>
    <div class = "grouping first one-half">

        <h2 class = "group-category">Category Name</h2>
        <?php
        while (have_posts()) : the_post();
            ?>
            <div class = "group-article">

                <?php
                if (function_exists("has_post_thumbnail") && has_post_thumbnail()) {
                    the_post_thumbnail(array(50, 40), array("class" => "group-thumbnail"));
                }
                ?>
                <h1 class = "group-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <?php
                    the_content("Read more . . .");
                    ?>

                    <div class="group-divider"></div>
            </div>
        <?php endwhile;
        ?>
    </div>
    <?php wp_reset_query();
    ?>



    <div class = "one-half">
        LOOP
    </div>
    <div class = "clearfix"></div>

    <div id = "article-list">

        <?php query_posts($query_string . '&cat=-115');
        ?>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>



                <div <?php post_class() ?> id="post-<?php the_ID(); ?>">


                    <?php
                    if (function_exists("has_post_thumbnail") && has_post_thumbnail()) {
                        the_post_thumbnail(array(125, 100), array("class" => "thumbnail"));
                    }
                    ?>

                    <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>



                    <!-- <div class="entry"> not sure why this is here -->






                    <?php the_content("Read more . . ."); ?>


                    <!-- </div>-->

                    <div class="date">

                        <!--   <div class="postmetadata">
                              &nbsp;
                          Posted on: <?php the_time('F jS, Y') ?>
                                              </div> -->

                    </div>


                </div>

            <?php endwhile; ?>

            <?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

        <?php else : ?>

            <h2>Page Not Available Yet</h2>

            <p>We are in the process of updating all of the content for the new school year. We hope to have current information on this topic very very soon. Please check back or <a href="<?php bloginfo('rss2_url'); ?>">subscribe to our RSS feed</a>.


            <?php endif; ?>

    </div> <!-- end article-list -->

    <?php
}

/** Replace the standard loop with our custom loop */
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'my_custom_loop');

genesis()
?>