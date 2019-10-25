<?php
/**
 * Theme functions and definitions.
 * This child theme was generated by Merlin WP.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/*
 * If your child theme has more than one .css file (eg. ie.css, style.css, main.css) then
 * you will have to make sure to maintain all of the parent theme dependencies.
 *
 * Make sure you're using the correct handle for loading the parent theme's styles.
 * Failure to use the proper tag will result in a CSS file needlessly being loaded twice.
 * This will usually not affect the site appearance, but it's inefficient and extends your page's loading time.
 *
 * @link https://codex.wordpress.org/Child_Themes
 */
function ntagricom_child_enqueue_styles() {
    wp_enqueue_style( 'nt-agricom-style' , get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'nt-agricom-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'nt-agricom-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'ntagricom_child_enqueue_styles' );



function load_js_assets() {
    

    /* Page Unique Javascript */
    if ( is_page(get_page_by_title('Home')->ID) ) {
        wp_enqueue_script( 'footerScript-custom', get_stylesheet_directory_uri() . '/assets/js/home.js', array(), false, true );
    } elseif ( is_page(get_page_by_title('Workstreams')->ID) ) {
        wp_enqueue_script('my-jquery', 'https://code.jquery.com/jquery-1.7.2.js', array('jquery'), '', false);
        wp_enqueue_script('my-js', 'https://code.highcharts.com/maps/highmaps.js', array('jquery'), '', false);
        wp_enqueue_script('my-js2', 'https://code.highcharts.com/maps/modules/data.js', array('jquery'), '', false);
        wp_enqueue_script('my-js3', 'https://code.highcharts.com/maps/modules/exporting.js', array('jquery'), '', false);
        wp_enqueue_script('my-js4', 'https://code.highcharts.com/maps/modules/offline-exporting.js', array('jquery'), '', false); 
        wp_enqueue_script( 'footerScript-map', get_stylesheet_directory_uri() . '/assets/js/map.js', array(), false, true );
    } elseif ( is_page(get_page_by_title('Our Impact 2')->ID) ) {
        wp_enqueue_script('my-jquery', 'https://code.jquery.com/jquery-1.7.2.js', array('jquery'), '', false);
        wp_enqueue_script('my-js', 'https://code.highcharts.com/highcharts.js', array('jquery'), '', false);
        wp_enqueue_script('my-js2', 'https://code.highcharts.com/maps/modules/data.js', array('jquery'), '', false);
        wp_enqueue_script('my-js3', 'https://code.highcharts.com/maps/modules/exporting.js', array('jquery'), '', false);
        wp_enqueue_script('my-js4', 'https://code.highcharts.com/maps/modules/offline-exporting.js', array('jquery'), '', false);
        wp_enqueue_script( 'footerScript-barchart', get_stylesheet_directory_uri() . '/assets/js/barchart.js', array(), false, true );
    } else {
        return 0;
    }
}
 
add_action('wp_enqueue_scripts', 'load_js_assets');