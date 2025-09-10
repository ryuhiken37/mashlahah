<?php
function mashlahah_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption']);
    register_nav_menus([
        'primary' => __('Primary Menu','mashlahah'),
    ]);
}
add_action('after_setup_theme', 'mashlahah_setup');

function mashlahah_scripts() {
    wp_enqueue_style('mashlahah-style', get_stylesheet_uri(), [], '1.0');
    wp_enqueue_style('mashlahah-tailwind', get_template_directory_uri().'/assets/css/tailwind.css', [], '1.0');
    wp_enqueue_script('mashlahah-main', get_template_directory_uri().'/assets/js/main.js', ['jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts','mashlahah_scripts');

function mashlahah_widgets() {
    register_sidebar([
        'name' => __('Sidebar','mashlahah'),
        'id' => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
}
add_action('widgets_init','mashlahah_widgets');