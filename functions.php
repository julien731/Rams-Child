<?php
/**
 * @package   Rams Child
 * @author    Julien Liabeuf <julien@liabeuf.fr>
 * @license   GPL-2.0+
 * @link      https://julienliabeuf.com
 * @copyright 2016 Julien Liabeuf
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_enqueue_scripts', 'rams_child_load_resources' );
/**
 * Load child theme resources
 *
 * @since 1.0.0
 * @return void
 */
function rams_child_load_resources() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'widgets_init', 'rams_child_register_sidebar' );
function rams_child_register_sidebar() {
	register_sidebar( array(
		'name'          => esc_attr__( 'Main Sidebar', 'rams-child' ),
		'id'            => 'main',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'rams-child' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
}