<?php

echo '<div id="nav"><div>';
wp_nav_menu(array('sort_column' => 'menu_order', 'container_id' => 'tertiary', 'menu_class' => 'menu genesis-nav-menu menu-tertiary', 'theme_location' => 'tertiary'));
echo '</div></div>';
?>