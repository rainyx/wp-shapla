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

//移除WordPress头部加载DNS预获取（dns-prefetch）
function remove_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( wp_dependencies_unique_hosts(), $hints );
    }

    return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );

// 移除emoji表情script
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links');
remove_action('wp_head', 'feed_links_extra');