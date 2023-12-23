<?php

/**
 * The main template file.
 *
 * @package Inspiria
 */

get_header(); // Include header.php
get_header('slider');
get_template_part('paritals/content', 'blog');
?>







<?php

// Include sidebar.php
//get_sidebar(); 

get_footer();
