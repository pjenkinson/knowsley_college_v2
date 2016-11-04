<?php

/*
 * Plugin Name: Max Mega Menu - Pro Addon
 * Plugin URI:  https://maxmegamenu.com
 * Description: Extends the core version of Max Mega Menu with additional functionality.
 * Version:     1.2
 * Author:      Tom Hemsley
 * Author URI:  https://maxmegamenu.com
 * Copyright:   2015 Tom Hemsley (https://maxmegamenu.com)
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // disable direct access
}

if ( ! class_exists('Mega_Menu_Pro') ) :

/**
 *
 */
class Mega_Menu_Pro {


	/**
	 * @var string
	 */
	public $version = '1.2';


	/**
	 * Init
	 *
	 * @since 1.0
	 */
	public static function init() {

		$plugin = new self();

	}


	/**
	 * Constructor
	 *
	 * @since 1.0
	 */
	public function __construct() {

		define( "MEGAMENU_PRO_VERSION", $this->version );
		define( "MEGAMENU_PRO_PLUGIN_FILE", __FILE__ );

		add_filter("megamenu_versions", array( $this, 'add_version_to_header' ) );

		$this->load();

	}

	/**
	 * Adds the version number to the header on the general settings page.
	 *
	 * @since 1.0
	 * @param array $versions
	 * @return array
	 */
	public function add_version_to_header( $versions ) {

		$versions['pro'] = array(
			'text' => __("Pro version", "megamenupro"),
			'version' => MEGAMENU_PRO_VERSION
		);

		return $versions;

	}

	/**
	 * Load the plugin classes
	 *
	 * @since 1.0
	 */
	public function load() {

        if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {
            require_once 'updater/class-tgm-plugin-activation.php';
        }

        add_action( 'tgmpa_register', array( $this, 'check_megamenu_is_installed' ) );

		$path = plugin_dir_path( __FILE__ );

		$classes = array(
			'Mega_Menu_Updater' => $path . 'updater/updater.php',
			'Mega_Menu_Sticky' => $path . 'sticky/sticky.php',
			'Mega_Menu_Google_Fonts' => $path . 'fonts/google/google-fonts.php',
			'Mega_Menu_Custom_Fonts' => $path . 'fonts/custom/custom-fonts.php',
 			'Mega_Menu_Custom_Icon' => $path . 'icons/custom/custom.php',
			'Mega_Menu_Font_Awesome' => $path . 'icons/fontawesome/fontawesome.php',
			'Mega_Menu_Genericons' => $path . 'icons/genericons/genericons.php',
			'Mega_Menu_Style_Overrides' => $path . 'style-overrides/style-overrides.php',
			'Mega_Menu_Roles' => $path . 'roles/roles.php',
			'Mega_Menu_Vertical' => $path . 'vertical/vertical.php',
			'Mega_Menu_Effects' => $path . 'effects/effects.php'
		);

		foreach ( $classes as $classname => $path ) {
			require_once( $path );
			new $classname;
		}

	}

    /**
     *
     */
    public function check_megamenu_is_installed() {

        $plugins = array(
            array(
                'name'      => 'Max Mega Menu',
                'slug'      => 'megamenu',
                'required'  => true,
                'version'   => '1.7.2'
            ),
        );

        $config = array(
            'domain'            => 'megamenupro',           // Text domain - likely want to be the same as your theme.
            'default_path'      => '',                           // Default absolute path to pre-packaged plugins
            'parent_menu_slug'  => 'themes.php',         // Default parent menu slug
            'parent_url_slug'   => 'themes.php',         // Default parent URL slug
            'menu'              => 'install-required-plugins',  // Menu slug
            'strings'           => array(
                'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with Max Mega Menu Pro: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with Max Mega Menu Pro: %1$s.' ), // %1$s = plugin name(s)
            )
        );

        tgmpa( $plugins, $config );

    }

}

add_action( 'plugins_loaded', array( 'Mega_Menu_Pro', 'init' ), 11 );

endif;