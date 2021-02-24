<?php

/**
 * 
 * @package           ReactThemeCustomizer
 * @author            Hassaan Ali
 * @copyright         2019 Hassaan Ali
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       React Theme Customizer
 * Plugin URI:        https://example.com/
 * Description:       Handles the React Theme Customization.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Hassaan Ali
 * Author URI:        https://github.com/zfhassaan
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       react-theme-enhancer
 */

// Add Primary menu Support 
function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'extra-menu' => __('Extra Menu')
        )
    );
}
add_action('init', 'register_my_menus');

// Add Theme Support
function react_custom_logo_setup()
{
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'react_custom_logo_setup');

// require  plugin_dir_url(__DIR__) . '/includes/theme-menu.php';
require_once dirname(__FILE__) . '/includes/theme-menu.php';

// Sanitize Functions
function sanitize_text($input)
{
    return filter_var($input, FILTER_SANITIZE_STRING);
}


function get_blog_name()
{
    $custom_logo_id = get_theme_mod('custom_logo');
    $menuLocations = get_nav_menu_locations();
    $menuID = $menuLocations['header-menu'];

    return [
        "name" => get_bloginfo('name'),
        "description" => get_bloginfo('description'),
        "url" => get_bloginfo("url"),
        "logo" => wp_get_attachment_image_src($custom_logo_id, 'full'),
        "menus" => wp_get_nav_menu_items($menuID),
        "header-background" => get_theme_mod('customizer_setting_one'),
        "slider_image_main" =>  get_theme_mod("customizer_setting_two"),
        "slider_text" => get_theme_mod('title_text_block'),
        "sliderLearnMore" => get_theme_mod('slider_url'),
        "why_youma" => get_theme_mod('why_youma'),
        "why_description" => get_theme_mod('youma_description'),
    ];
}

add_action('rest_api_init', function () {

    register_rest_route('menus/v1', 'blogname', [
        'methods' => 'GET',
        'callback' => 'get_blog_name',
    ]);
});
