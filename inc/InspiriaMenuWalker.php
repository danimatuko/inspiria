<?php

class InspiriaMenuWalker extends Walker_Nav_Menu {
    // This function is called when the walker starts the unordered list for a submenu.
    function start_lvl(&$output, $depth = 0, $args = null) {
        // Depth-dependent classes and IDs for submenu
        $indent = str_repeat("\t", $depth);
        $submenu_class = ($depth > 0) ? 'submenu' : ''; // Add 'submenu' class for nested submenus
        $output .= "\n$indent<ul class=\"dropdown-menu $submenu_class\">\n";
    }

    // This function is called when the walker starts an individual list item.
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        // Extract and add 'nav-item' class to the list item
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';

        // Check if the item has a submenu
        $has_submenu = in_array('menu-item-has-children', $classes) || in_array('page-item-has-children', $classes);
        if ($has_submenu) {
            $classes[] = 'submenu'; // Add 'submenu' class for items with a submenu
            $classes[] = 'dropdown'; // Add 'dropdown' class for dropdown functionality
        }

        // Create a space-separated string of classes for the list item
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        // Create ID attribute for the list item
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        // Build the opening tag for the list item
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        // Extract and filter attributes for the link
        $atts = array();
        $atts['title']  = !empty($item->title) ? esc_attr($item->title) : '';
        $atts['target'] = !empty($item->target) ? esc_attr($item->target) : '';
        $atts['rel']    = !empty($item->xfn) ? esc_attr($item->xfn) : '';
        $atts['href']   = !empty($item->url) ? esc_url($item->url) : '';

        // Apply filters to modify link attributes
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        // Build the string of attributes for the link
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // Build the opening tag for the link
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . ' class="nav-link">';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        // Combine the output for the list item and apply filters
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
