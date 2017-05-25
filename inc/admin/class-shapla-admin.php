<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists('Shapla_Admin') ):

class Shapla_Admin {

	public function __construct()
	{
		add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ) );
		add_action( 'admin_menu', array( $this, 'shapla_admin_menu_page'  ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	public function admin_scripts( $hook_suffix )
	{
		if( $hook_suffix != 'appearance_page_shapla-welcome' ) {
			return;
        }

        wp_enqueue_style( 'thickbox' );
		wp_enqueue_script( 'thickbox' );
        wp_enqueue_style( 'shapla-admin-style', get_template_directory_uri() . '/assets/css/admin.css' );
	}

	/**
	 * Add custom footer text on plugins page.
	 *
	 * @param string $text
	 */
	public function admin_footer_text( $text )
	{
		global $hook_suffix;

		$footer_text = sprintf( esc_html__('If you like %1$s Shapla %2$s please leave us a %3$s rating. A huge thanks in advance!', 'shapla' ), '<strong>', '</strong>', '<a href="https://wordpress.org/support/theme/shapla/reviews/?filter=5" target="_blank" data-rated="Thanks :)">&starf;&starf;&starf;&starf;&starf;</a>');

		if ( $hook_suffix == 'appearance_page_shapla-welcome' ) {
			return $footer_text;
		}

		return $text;
	}

	public function shapla_admin_menu_page()
	{
		add_theme_page( 
	        __( 'Shapla', 'shapla' ),
	        __( 'Shapla', 'shapla' ),
	        'manage_options',
	        'shapla-welcome',
	        array( $this, 'welcome_page_callback' )
	    );
	}

	public function welcome_page_callback()
	{
		?>
			<h1><?php esc_html_e( 'Shapla', 'shapla' ); ?></h1>
			<div class="shapla-row">
				<div class="shapla-col s12">
					<div class="shapla-card">
						<div class="container">
							<h1><?php esc_html_e( 'Shapla features', 'shapla' ); ?></h1>
							<ol>
								<li>
									<strong><?php esc_html_e( 'Zero Page Builders:', 'shapla' ); ?></strong>
									<?php echo sprintf( esc_html__( 'Page builders are great, if you need one. If you don\'t, they\'re bloat. Shapla is compatible with all most popular free page builder like %2$sPage Builder by SiteOrigin%1$s, %3$sElementor%1$s, %4$sBeaver Builder%1$s, or ever premium page builder like %5$sDivi%1$s &amp; %6$sVisual Composer%1$s', 'shapla') , '</a>', '<a class="thickbox" href=" ' . admin_url( 'plugin-install.php?tab=plugin-information&plugin=siteorigin-panels') . '">', '<a class="thickbox" href="' . admin_url( 'plugin-install.php?tab=plugin-information&plugin=elementor') . '">', '<a class="thickbox" href="' . admin_url( 'plugin-install.php?tab=plugin-information&plugin=beaver-builder-lite-version') . '">', '<a target="_blank" href="https://www.elegantthemes.com/plugins/divi-builder/">', '<a target="_blank" href="https://vc.wpbakery.com/">' ); ?>
								</li>
								<li>
									<strong><?php esc_html_e( 'Zero Sliders:', 'shapla' ); ?></strong>
									<?php echo sprintf( esc_html__( 'Shapla lets you choose the appropriate plugin for your slider needs. You may choose free slider like %2$sNivo Image Slider%1$s, %3$sImage Slider%1$s, %4$sCarousel Slider%1$s or ever premium slider like %5$sSlider Revolution%1$s, %6$sMaster Slider%1$s, %7$sLayerSlider%1$s and more.', 'shapla' ), '</a>', '<a class="thickbox" href="' . admin_url( 'plugin-install.php?tab=plugin-information&plugin=nivo-image-slider') . '">', '<a class="thickbox" href="' . admin_url( 'plugin-install.php?tab=plugin-information&plugin=image-slider-responsive') . '">', '<a class="thickbox" href="' . admin_url( 'plugin-install.php?tab=plugin-information&plugin=carousel-slider') . '">', '<a target="_blank" href="https://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380">', '<a target="_blank" href="https://codecanyon.net/item/master-slider-wordpress-responsive-touch-slider/7467925">', '<a target="_blank" href="https://codecanyon.net/item/layerslider-responsive-wordpress-slider-plugin/1362246">' ); ?>
								</li>
								<li>
									<strong><?php esc_html_e( 'Zero Shortcodes:', 'shapla' ); ?></strong>
									<?php esc_html_e( 'With Shapla, you only get what you need. That means no superfluous shortcodes and other extraneous nonsense.', 'shapla' ); ?>
								</li>
								<li>
									<strong><?php esc_html_e( 'WooCommerce integration:', 'shapla' ); ?></strong>
									<?php echo sprintf( esc_html__( 'Shapla maybe is not great for %sWooCommerce%s but it support all features of WooCommerce.', 'shapla'), '<a class="thickbox" href="' . admin_url( 'plugin-install.php?tab=plugin-information&plugin=woocommerce') . '">', '</a>'); ?>
								</li>
								<li>
									<strong><?php esc_html_e( 'Portfolio:', 'shapla' ); ?></strong>
									<?php echo sprintf( esc_html__( 'Shapla has tight integration with full features of %sFilterable Portfolio%s plugin.', 'shapla'), '<a class="thickbox" href="' . admin_url( 'plugin-install.php?tab=plugin-information&plugin=filterable-portfolio') . '">', '</a>'); ?>
								</li>
								<li>
									<strong><?php esc_html_e( 'Responsive:', 'shapla' ); ?></strong>
									<?php esc_html_e( 'Whether you view a Shapla portfolio, blog or store on a laptop / desktop computer or handheld device, it will adapt and display beautifully.', 'shapla' ); ?>
								</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="shapla-row">
				<div class="shapla-col s4">
					<div class="shapla-card">
						<div class="container">
							<h2><?php esc_html_e( 'Suggest a feature', 'shapla' ); ?></h2>
							<p><?php echo sprintf( esc_html__( 'Any kind of suggestion are welcomed to improve Shapla. Please send your suggestion at %s', 'shapla'), '<a href="mailto:sayful.islam001@gmail.com">sayful.islam001@gmail.com</a>' ); ?></p>
						</div>
					</div>
				</div>
				<div class="shapla-col s4">
					<div class="shapla-card">
						<div class="container">
							<h2><?php esc_html_e( 'Contribute to Shapla', 'shapla' ); ?></h2>
							<p><?php echo sprintf( esc_html__( 'Would you like to translate Shapla into your language? Get involved on %sWordPress.org%s', 'shapla'), '<a target="_blank" href="https://translate.wordpress.org/projects/wp-themes/shapla">', '</a>' ); ?>.</p>
						</div>
					</div>
				</div>
				<div class="shapla-col s4">
					<div class="shapla-card">
						<div class="container">
							<h2><?php esc_html_e( 'Get support', 'shapla' ); ?></h2>
							<p><?php echo sprintf( esc_html__( 'If you need support, you can try posting on the WordPress.org %ssupport forums%s', 'shapla'), '<a target="_blank" href="https://wordpress.org/support/theme/shapla">', '</a>' ); ?>.</p>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
}

new Shapla_Admin();

endif;