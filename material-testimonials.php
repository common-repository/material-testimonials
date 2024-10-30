<?php
/*
 * Plugin Name: Material Testimonials
 * Plugin URI:  https://github.com/ImDR/material-testimonials
 * Description: Just an another wordpress plugin
 * Version:     1.5
 * Author:      Dinesh Rawat
 * Author URI:  https://imdr.github.io/
 * Text Domain: material-testimonials
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

define('MATTESTI_PLUGIN',  plugin_dir_url(__FILE__));

function mattesti_add_plugin_scripts() {
	wp_enqueue_style( 'owlcarousel2', MATTESTI_PLUGIN.'css/owl.carousel.min.css', array(), '2.2.1' );
	wp_enqueue_style( 'font-awesome', MATTESTI_PLUGIN.'css/font-awesome.min.css', array(), '4.7' );

	wp_enqueue_style( 'material-testimonials', MATTESTI_PLUGIN.'css/style.css', array(), '1.5' );
	
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'owlcarousel2', MATTESTI_PLUGIN.'js/owl.carousel.min.js', array('jquery'), '2.2.1', true );
}
add_action( 'wp_enqueue_scripts', 'mattesti_add_plugin_scripts' );


include_once ('inc/mattesti-post-register.php');
include_once ('inc/mattesti-post-metabox.php');
include_once ('inc/mattesti-shortcode.php');
include_once ('inc/mattesti-doc-page.php');
?>