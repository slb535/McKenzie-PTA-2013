<?php

function genesis_standard_loop() {

    //* Use old loop hook structure if not supporting HTML5
    if (!genesis_html5()) {
        genesis_legacy_loop();
        return;
    }

    if (have_posts()) : while (have_posts()) : the_post();

            do_action('genesis_before_entry');

            printf('<article class="TEST" %s>', genesis_attr('entry'));

            do_action('genesis_entry_header');

            do_action('genesis_before_entry_content');
            printf('<div %s>', genesis_attr('entry-content'));
            do_action('genesis_entry_content');
            echo '</div>'; //* end .entry-content
            do_action('genesis_after_entry_content');

            do_action('genesis_entry_footer');

            echo '</article>';

            do_action('genesis_after_entry');

        endwhile; //* end of one post
        do_action('genesis_after_endwhile');

    else : //* if no posts exist
        do_action('genesis_loop_else');
    endif; //* end loop
}

?>
