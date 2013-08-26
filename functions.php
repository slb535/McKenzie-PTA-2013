<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define('CHILD_THEME_NAME', 'Genesis Sample Theme');
define('CHILD_THEME_URL', 'http://www.studiopress.com/');
define('CHILD_THEME_VERSION', '2.0.0');

//* Enqueue Lato Google font
add_action('wp_enqueue_scripts', 'genesis_sample_google_fonts');

function genesis_sample_google_fonts() {
    wp_enqueue_style('google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION);
    wp_enqueue_style('google-font-arvo', '//fonts.googleapis.com/css?family=Arvo:300,700', array(), CHILD_THEME_VERSION);
}

//* Add HTML5 markup structure
add_theme_support('html5');

//* Add viewport meta tag for mobile browsers
add_theme_support('genesis-responsive-viewport');

//* Add support for custom background
add_theme_support('custom-background');

//* Add support for 3-column footer widgets
add_theme_support('genesis-footer-widgets', 3);


// Remove Custom Menu support
remove_theme_support('genesis-menus');

// Default Menus: registers menus
add_theme_support('genesis-menus', array('primary' => 'Primary Navigation Menu', 'secondary' => 'Secondary Navigation Menu', 'tertiary' => 'Tertiary Navigation Menu'));

add_action('genesis_before_header', 'open_navbar_wrap');

function open_navbar_wrap() {
    ?>
    <div class="top-navbar-wrap"><div class="top-navbar">
            <?php
        }

//* Reposition the secondary navigation menu
        remove_action('genesis_after_header', 'genesis_do_subnav');
        add_action('genesis_before_header', 'genesis_do_subnav');

//* Reposition the secondary navigation menu
        remove_action('genesis_after_header', 'genesis_do_tertnav');
        add_action('genesis_before_header', 'genesis_do_tertnav');



//* Reposition the primary navigation menu
        remove_action('genesis_after_header', 'genesis_do_nav');


        add_action('genesis_before_header', 'close_navbar_wrap');

        function close_navbar_wrap() {
            ?>
            <div class="clearfix"></div></div></div>
    <?php
}

/** Custom image sizes */
add_image_size('group-thumbnail', 50, 40, TRUE);


// Use somewhere else or delete
add_action('genesis_before_header', 'pta_clear_floats');

function pta_clear_floats() {
    ?>
    <div class="clearfix"></div>
    <?php
}

/** Remove the post meta function */
remove_action('genesis_after_post_content', 'genesis_post_meta');
?>
