<?php
/**
 * Shapla functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Shapla
 */

$shapla = (object) array(
	'main' 			=> require get_template_directory() . '/inc/class-shapla.php',
	'customizer' 	=> require get_template_directory() . '/inc/class-shapla-customizer.php',
);

/**
 * Load template hooks and functions file.
 */
require get_template_directory() . '/inc/shapla-functions.php';
require get_template_directory() . '/inc/shapla-template-hooks.php';
require get_template_directory() . '/inc/shapla-template-functions.php';
require get_template_directory() . '/inc/class-shapla-structured-data.php';
require get_template_directory() . '/inc/customizer/init.php';

/**
 * Load Jetpack compatibility class.
 */
if ( class_exists( 'Jetpack' ) ) {
	$shapla->jetpack = require 'inc/class-shapla-jetpack.php';
}


if ( shapla_is_woocommerce_activated() ) {
	require get_template_directory() . '/inc/woocommerce/shapla-woocommerce-template-hooks.php';
	require get_template_directory() . '/inc/woocommerce/shapla-woocommerce-template-functions.php';
}



if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/class-shapla-admin.php';
	require get_template_directory() . '/inc/admin/class-shapla-meta-boxes.php';
}