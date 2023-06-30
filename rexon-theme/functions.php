<?php
add_filter('show_admin_bar', '__return_false');

function rexontheme_theme_support(): void
{
    //this adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    #add_theme_support('side');
}
add_action('after_setup_theme','rexontheme_theme_support');

function rexontheme_menus(): void
{
    $locations = array(
        'primary' => 'desktop primary left sidebar',
        'footer'=> 'footer menu items'
        );
    register_nav_menus($locations);
}
add_action('init','rexontheme_menus');
function rexontheme_register_styles(): void
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('rexontheme-style', src: get_template_directory_uri(). "/style.css", deps: array('rexontheme-bootstrap'), ver: $version);
    wp_enqueue_style('rexontheme-bootstrap', src: "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css",ver: '4.4.1');
    wp_enqueue_style('rexontheme-fontawesome', src: "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css",ver: '5.13.0');
}
add_action('wp_enqueue_scripts','rexontheme_register_styles');


function rexontheme_register_scripts(): void
{

    wp_enqueue_script('rexontheme-jquery', src: 'https://code.jquery.com/jquery-3.4.1.slim.min.js', ver: '3.4.1', in_footer: true);
    wp_enqueue_script('rexontheme-popper', src: 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', ver: '1.16.0', in_footer: true);
    wp_enqueue_script('rexontheme-bootstrap', src: 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', ver: '3.4.1', in_footer: true);
    wp_enqueue_script('rexontheme-main', src: get_template_directory_uri() .'/assets/js/main.js', ver: '1.0', in_footer: true);
}
add_action('wp_enqueue_scripts','rexontheme_register_scripts');

function rexontheme_widget_areas(): void
{
	register_sidebar(
		array(
			'before_title' =>'',
			'after_title'=>'',
			'before_widget'=>'<ul class="social-list list-inline py-3 mx-auto">',
			'after_widget'=>'</ul>',
			'name'=>'Sidebar area',
			'id'=>'sidebar-1',
			'description'=>'Sidebar Widget Area'
		),

	);
	register_sidebar(
		array(
			'before_title' =>'',
			'after_title'=>'',
			'before_widget'=>'<ul class="social-list list-inline py-3 mx-auto">',
			'after_widget'=>'</ul>',
			'name'=>'Footer area',
			'id'=>'footer-1',
			'description'=>'footer Widget Area'
		),

	);
}
add_action('widgets_init','rexontheme_widget_areas');
