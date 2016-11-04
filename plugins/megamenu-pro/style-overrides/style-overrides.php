<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // disable direct access
}

if ( ! class_exists('Mega_Menu_Style_Overrides') ) :

/**
 *
 */
class Mega_Menu_Style_Overrides {

	/**
	 * Constructor
	 *
	 * @since 1.0
	 */
	public function __construct() {

		add_filter( 'megamenu_tabs', array( $this, 'add_styling_tab'), 10, 5 );
        add_action( 'wp_ajax_mm_save_menu_item_styles', array( $this, 'ajax_save_menu_item_styles') );
		add_filter( 'megamenu_scss_variables', array( $this, 'add_style_overrides'), 10, 4 );
		add_filter( 'megamenu_load_scss_file_contents', array( $this, 'append_scss'), 10 );
		add_action( 'megamenu_enqueue_admin_scripts', array( $this, 'enqueue_admin_scripts'), 10 );

	}


	/**
	 * Append the custom icon SCSS to the main SCSS file
	 *
	 * @since 1.0
	 * @param string $scss
	 * @param string
	 */
	public function append_scss( $scss ) {

		$path = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'scss/style-overrides.scss';

		$contents = file_get_contents( $path );

 		return $scss . $contents;

	}


	/**
	 * Add the Styling tab to the menu item options
	 *
	 * @since 1.0
	 * @param array $tabs
	 * @param int $menu_item_id
	 * @param int $menu_id
	 * @param int $menu_item_depth
	 * @param array $menu_item_meta
	 * @return string
	 */
	public function add_styling_tab( $tabs, $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) {

		$html  = "<form id='mm_custom_styles'>";
		$html .= "    <input type='hidden' name='_wpnonce' value='" . wp_create_nonce('megamenu_edit') . "' />";	
		$html .= "    <input type='hidden' name='menu_item_id' value='{$menu_item_id}' />";
		$html .= "    <input type='hidden' name='action' value='mm_save_menu_item_settings' />";
		$html .= "    <input type='hidden' name='clear_cache' value='true' />";
		$html .= "    <h4 class='first'>" . __("Menu Items", "megamenupro") . "</h4>";
		$html .= "    <table>";
		$html .= "        <tr class='mega-" . $this->get_setting_state('menu_item_background_from', $menu_item_meta) . "'>";
		$html .= "            <td class='mega-enable'>" . $this->print_theme_option_enabled( 'menu_item_background_from', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) . "</td>";		
		$html .= "            <td class='mega-name'>" . __("Background", "megamenupro") . "</td>";
		$html .= "            <td class='mega-value'>";
		$html .=                  $this->print_theme_color_option('menu_item_background_from', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .=                  $this->print_theme_color_option('menu_item_background_to', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .= "            </td>";
		$html .= "        </tr>";
		$html .= "        <tr class='mega-" . $this->get_setting_state('menu_item_background_hover_from', $menu_item_meta) . "'>";
		$html .= "            <td class='mega-enable'>" . $this->print_theme_option_enabled( 'menu_item_background_hover_from', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) . "</td>";		
		$html .= "            <td class='mega-name'>" . __("Background (Hover)", "megamenupro") . "</td>";
		$html .= "            <td class='mega-value'>";
		$html .=                  $this->print_theme_color_option('menu_item_background_hover_from', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .=                  $this->print_theme_color_option('menu_item_background_hover_to', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .= "            </td>";
		$html .= "        </tr>";
		$html .= "        <tr class='mega-" . $this->get_setting_state('menu_item_link_color', $menu_item_meta) . "'>";
		$html .= "            <td class='mega-enable'>" . $this->print_theme_option_enabled( 'menu_item_link_color', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) . "</td>";		
		$html .= "            <td class='mega-name'>" . __("Font Color", "megamenupro") . "</td>";
		$html .= "            <td class='mega-value'>";
		$html .=                  $this->print_theme_color_option('menu_item_link_color', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .= "            </td>";
		$html .= "        </tr>";
		$html .= "        <tr class='mega-" . $this->get_setting_state('menu_item_link_color_hover', $menu_item_meta) . "'>";
		$html .= "            <td class='mega-enable'>" . $this->print_theme_option_enabled( 'menu_item_link_color_hover', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) . "</td>";		
		$html .= "            <td class='mega-name'>" . __("Font Color (Hover)", "megamenupro") . "</td>";
		$html .= "            <td class='mega-value'>";
		$html .=                  $this->print_theme_color_option('menu_item_link_color_hover', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .= "            </td>";
		$html .= "        </tr>";
		$html .= "        <tr class='mega-" . $this->get_setting_state('menu_item_font_size', $menu_item_meta) . "'>";
		$html .= "            <td class='mega-enable'>" . $this->print_theme_option_enabled( 'menu_item_font_size', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) . "</td>";		
		$html .= "            <td class='mega-name'>" . __("Menu Item Font Size", "megamenupro") . "</td>";
		$html .= "            <td class='mega-value'>";
		$html .=                  $this->print_theme_freetext_option('menu_item_font_size', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .= "            </td>";
		$html .= "        </tr>";
		$html .= "        <tr class='mega-" . $this->get_setting_state('menu_item_icon_size', $menu_item_meta) . "'>";
		$html .= "            <td class='mega-enable'>" . $this->print_theme_option_enabled( 'menu_item_icon_size', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) . "</td>";		
		$html .= "            <td class='mega-name'>" . __("Menu Item Icon Size", "megamenupro") . "</td>";
		$html .= "            <td class='mega-value'>";
		$html .=                  $this->print_theme_freetext_option('menu_item_icon_size', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .= "            </td>";
		$html .= "        </tr>";
		$html .= "        <tr class='mega-" . $this->get_setting_state('menu_item_padding_left', $menu_item_meta) . "'>";
		$html .= "            <td class='mega-enable'>" . $this->print_theme_option_enabled( 'menu_item_padding_left', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) . "</td>";		
		$html .= "            <td class='mega-name'>" . __("Menu Item Padding (Left)", "megamenupro") . "</td>";
		$html .= "            <td class='mega-value'>";
		$html .=                  $this->print_theme_freetext_option('menu_item_padding_left', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .= "            </td>";
		$html .= "        </tr>";
		$html .= "        <tr class='mega-" . $this->get_setting_state('menu_item_padding_right', $menu_item_meta) . "'>";
		$html .= "            <td class='mega-enable'>" . $this->print_theme_option_enabled( 'menu_item_padding_right', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) . "</td>";		
		$html .= "            <td class='mega-name'>" . __("Menu Item Padding (Right)", "megamenupro") . "</td>";
		$html .= "            <td class='mega-value'>";
		$html .=                  $this->print_theme_freetext_option('menu_item_padding_right', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .= "            </td>";
		$html .= "        </tr>";
		$html .= "        <tr class='mega-" . $this->get_setting_state('menu_item_margin_left', $menu_item_meta) . "'>";
		$html .= "            <td class='mega-enable'>" . $this->print_theme_option_enabled( 'menu_item_margin_left', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) . "</td>";		
		$html .= "            <td class='mega-name'>" . __("Menu Item Margin (Left)", "megamenupro") . "</td>";
		$html .= "            <td class='mega-value'>";
		$html .=                  $this->print_theme_freetext_option('menu_item_margin_left', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .= "            </td>";
		$html .= "        </tr>";
		$html .= "        <tr class='mega-" . $this->get_setting_state('menu_item_margin_right', $menu_item_meta) . "'>";
		$html .= "            <td class='mega-enable'>" . $this->print_theme_option_enabled( 'menu_item_margin_right', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) . "</td>";		
		$html .= "            <td class='mega-name'>" . __("Menu Item Margin (Right)", "megamenupro") . "</td>";
		$html .= "            <td class='mega-value'>";
		$html .=                  $this->print_theme_freetext_option('menu_item_margin_right', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .= "            </td>";
		$html .= "        </tr>";
		$html .= "    </table>";
		$html .= "    <h4>" . __("Sub Menu", "megamenu_pro") . "</h4>";
		$html .= "    <table>";
		$html .= "        <tr class='mega-" . $this->get_setting_state('panel_width', $menu_item_meta) . "'>";
		$html .= "            <td class='mega-enable'>" . $this->print_theme_option_enabled( 'panel_width', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) . "</td>";		
		$html .= "            <td class='mega-name'>" . __("Mega Panel Width", "megamenupro") . "</td>";
		$html .= "            <td class='mega-value'>";
		$html .=                  $this->print_theme_freetext_option('panel_width', $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta );
		$html .= "            </td>";
		$html .= "        </tr>";
		$html .= "    </table>";
		$html .= get_submit_button();
		$html .= "</form>";

		$tabs['styling'] = array(
			'title' => __("Styling", "megamenupro"),
			'content' => $html
		);

		return $tabs;
	}


	/**
	 * Returns enabled or disabled depending on the setting state
	 *
	 * @since 1.0
	 * @param string $key
	 * @param array $menu_item_meta
	 * @return string
	 */
	public function get_setting_state( $key, $menu_item_meta ) {

		return isset( $menu_item_meta['styles']['enabled'][$key] ) ? 'enabled' : 'disabled';

	}


	/**
	 * Return the HTML for the 'enabled' checkbox
	 *
	 * @since 1.0
	 * @param string $key
	 * @param int $menu_item_id
	 * @param int $menu_id
	 * @param int $menu_item_depth
	 * @param array $menu_item_meta
	 * @return string
	 */
	public function print_theme_option_enabled( $key, $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) {

		$html = "<input type='checkbox' class='override_toggle_enabled' " . checked($this->get_setting_state($key, $menu_item_meta), 'enabled', false) . " />";

		return $html;

	}


	/**
	 * Return the HTML for a textarea option
	 *
	 * @since 1.0
	 * @param string $key
	 * @param int $menu_item_id
	 * @param int $menu_id
	 * @param int $menu_item_depth
	 * @param array $menu_item_meta
	 * @return string
	 */
	public function print_theme_freetext_option( $key, $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) {

		$enabled = $this->get_setting_state( $key, $menu_item_meta );

		$value = isset( $menu_item_meta['styles'][$enabled][$key] ) ? $menu_item_meta['styles'][$enabled][$key] : "0px";

		$html  = "<input type='text' name='settings[styles][{$enabled}][{$key}]' value='{$value}' />";

		return $html;

	}


    /**
	 * Return the HTML for a color picker
	 *
	 * @since 1.0
	 * @param string $key
	 * @param int $menu_item_id
	 * @param int $menu_id
	 * @param int $menu_item_depth
	 * @param array $menu_item_meta
	 * @return string
	 */
    public function print_theme_color_option( $key, $menu_item_id, $menu_id, $menu_item_depth, $menu_item_meta ) {

		$enabled = isset( $menu_item_meta['styles']['enabled'][$key] ) ? 'enabled' : 'disabled';
		$value = isset( $menu_item_meta['styles'][$enabled][$key] ) ? $menu_item_meta['styles'][$enabled][$key] : '#333';

        if ( $value == 'transparent' ) {
            $value = 'rgba(0,0,0,0)';
        }

        if ( $value == 'rgba(0,0,0,0)' ) {
            $value_text = 'transparent';
        } else {
            $value_text = $value;
        }

        $html  = "<div class='mm-picker-container'>";
        $html .= "    <input type='text' class='mm_colorpicker' name='settings[styles][$enabled][$key]' value='{$value}' />";
        $html .= "    <div class='chosen-color'>{$value_text}</div>";
        $html .= "</div>";

		return $html;

    }


	/**
	 * Modify the list of SASS variables to include a list (of variables) for each menu item with custom styling applied
	 * 
	 * @since 1.0
	 * @param array $vars
	 * @param string $location
	 * @param string $theme
	 * @param int $menu_id
	 * @return string
	 */
	public function add_style_overrides( $vars, $location, $theme, $menu_id ) {

		$menu_items = wp_get_nav_menu_items( $menu_id );

		$custom_vars = array();

		if ( is_array( $menu_items ) ) {

			foreach ( $menu_items as $menu_order => $item ) {

				if ( $settings = get_post_meta($item->ID, "_megamenu", true ) ) {

					if ( isset( $settings['styles']['enabled'] ) ) {

						$styles = array(
							'id' => $item->ID,
							'panel_width' => isset($settings['styles']['enabled']['panel_width']) ? $settings['styles']['enabled']['panel_width'] : 'disabled',
							'menu_item_background_from' => isset($settings['styles']['enabled']['menu_item_background_from']) ? $settings['styles']['enabled']['menu_item_background_from'] : 'disabled',
							'menu_item_background_to' => isset($settings['styles']['enabled']['menu_item_background_to']) ? $settings['styles']['enabled']['menu_item_background_to'] : 'disabled',
							'menu_item_background_hover_from' => isset($settings['styles']['enabled']['menu_item_background_hover_from']) ? $settings['styles']['enabled']['menu_item_background_hover_from'] : 'disabled',
							'menu_item_background_hover_to' => isset($settings['styles']['enabled']['menu_item_background_hover_to']) ? $settings['styles']['enabled']['menu_item_background_hover_to'] : 'disabled',
							'menu_item_link_color' => isset($settings['styles']['enabled']['menu_item_link_color']) ? $settings['styles']['enabled']['menu_item_link_color'] : 'disabled',
							'menu_item_link_color_hover' => isset($settings['styles']['enabled']['menu_item_link_color_hover']) ? $settings['styles']['enabled']['menu_item_link_color_hover'] : 'disabled',
							'menu_item_link_font_size' => isset($settings['styles']['enabled']['menu_item_font_size']) ? $settings['styles']['enabled']['menu_item_font_size'] : 'disabled',
							'menu_item_link_icon_size' => isset($settings['styles']['enabled']['menu_item_icon_size']) ? $settings['styles']['enabled']['menu_item_icon_size'] : 'disabled',
							'menu_item_link_padding_left' => isset($settings['styles']['enabled']['menu_item_padding_left']) ? $settings['styles']['enabled']['menu_item_padding_left'] : 'disabled',
							'menu_item_link_padding_right' => isset($settings['styles']['enabled']['menu_item_padding_right']) ? $settings['styles']['enabled']['menu_item_padding_right'] : 'disabled',
							'menu_item_link_margin_left' => isset($settings['styles']['enabled']['menu_item_margin_left']) ? $settings['styles']['enabled']['menu_item_margin_left'] : 'disabled',
							'menu_item_link_margin_right' => isset($settings['styles']['enabled']['menu_item_margin_right']) ? $settings['styles']['enabled']['menu_item_margin_right'] : 'disabled'
						);

						$custom_vars[ $item->ID ] = $styles;

					}

				}

			}

		}

		//$custom_styles:(
		// (123, red, 150px),
	    // (456, green, null),
		// (789, blue, 90%),());

		if ( count( $custom_vars ) ) {

			$list = "(";

			foreach ( $custom_vars as $id => $vals ) {
				$list .= "(" . implode( ",", $vals ) . "),";
			}

			// Always add an empty list item to meke sure there are always at least 2 items in the list
			// Lists with a single item are not treated the same way by SASS
			$list .= "());"; 

			$vars['style_overrides'] = $list;

		}


		return $vars;

	}


	/**
	 * Enqueue scripts
	 * 
	 * @since 1.0
	 */
	public function enqueue_admin_scripts() {

        wp_enqueue_style( 'megamenu-style-overrides-admin', plugins_url( 'css/admin.css' , __FILE__ ), false, MEGAMENU_PRO_VERSION );
        wp_enqueue_script( 'megamenu-style-overrides', plugins_url( 'js/admin.js' , __FILE__ ), array('jquery'), MEGAMENU_PRO_VERSION );

        if ( is_plugin_active( 'megamenu/megamenu.php' ) ) {

        	wp_enqueue_script( 'spectrum', MEGAMENU_BASE_URL . 'js/spectrum/spectrum.js', array( 'jquery' ), MEGAMENU_VERSION );
        	wp_enqueue_style( 'spectrum', MEGAMENU_BASE_URL . 'js/spectrum/spectrum.css', false, MEGAMENU_VERSION );

        }

	}

}

endif;