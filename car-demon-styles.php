<?php
/*
Plugin Name: Car Demon Styles
Plugin URI: http://www.CarDemons.com/
Description:  Different Styles for your Car Demon install.
Author: CarDemons
Version: 1.0.2
Author URI: http://www.CarDemons.com/

*/

add_action("template_redirect", 'car_demon_styles_theme_redirect');
include('car-demon-styles-include.php');

function car_demon_style_settings_page() {
	add_theme_page( 'Car Demon Styles', 'Car Demon Styles', 'switch_themes', 'car_demon_style_options', 'car_demon_style_options_do_page');
}
add_action('admin_menu', 'car_demon_style_settings_page');

function car_demon_styles() {
	// Array containing all style slugs, to add a new style add a slug for it then add a folder with that slug name and your template files
	$car_demon_styles = 'default, avenue, boulevard, highway, racetrack, suffusion, catch_box, responsive, evolve, neuro';
	$car_demon_styles = explode(',',$car_demon_styles);
	return $car_demon_styles;
}

function car_demon_style_options_do_page() {
	$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
	$car_demon_options = get_option('car_demon_options');
	if (isset($_POST['submit'])) {
		$car_demon_options['car_demon_style'] = $_POST['car_demon_style'];
		$car_demon_options['car_demon_page_style'] = $_POST['car_demon_page_style'];
		update_option( 'car_demon_options', $car_demon_options );
	}
	wp_enqueue_style('car-demon-style-admin-css', WP_CONTENT_URL . '/plugins/car-demon-styles/car-demon-styles-admin.css');

	echo '<h1>Car Demon Styles</h1>';
	echo '<form action="" method="post" />';
		$car_demon_styles = car_demon_styles();
		$vehicle_list_styles = '';
		$vehicle_page_styles = '';
		foreach ($car_demon_styles as $car_demon_style) {
			$current_style = trim($car_demon_style);
			${$current_style.'_check'} = '';
			${$current_style.'_check_page'} = '';
			if (isset($car_demon_options['car_demon_style'])) {
				if ($car_demon_options['car_demon_style'] == $current_style) { ${$current_style.'_check'} = ' checked'; }
			}
			if (isset($car_demon_options['car_demon_page_style'])) {
				if ($car_demon_options['car_demon_page_style'] == $current_style) { ${$current_style.'_check_page'} = ' checked'; }
			}
			$style_name = str_replace('_', ' ', $current_style);
			$style_name = ucwords($style_name);
			$vehicle_list_styles .= '<div class="cd_style_selection" />';
				$vehicle_list_styles .= '<input type="radio" name="car_demon_style" value="'.$current_style.'"'.${$current_style.'_check'}.' />&nbsp;'.$style_name.'<br />';
//				$vehicle_list_styles .= '<img src="'.$car_demon_pluginpath.'images/'.$current_style.'.png" />';
			$vehicle_list_styles .= '</div>';
			$vehicle_page_styles .= '<div class="cd_style_selection" />';
				$vehicle_page_styles .= '<input type="radio" name="car_demon_page_style" value="'.$current_style.'"'.${$current_style.'_check_page'}.' />&nbsp;'.$style_name.'<br />';
//				$vehicle_page_styles .= '<img src="'.$car_demon_pluginpath.'images/'.$current_style.'_page.png" />';
			$vehicle_page_styles .= '</div>';
		}
		echo '<h2>Vehicle List Style</h2>';
			echo $vehicle_list_styles;
		echo '<div class="cd_style_submit_holder" />';
			echo '<h2>Vehicle Page Style</h2>';
		echo '</div>';
			echo $vehicle_page_styles;

		echo '<div class="cd_style_submit_holder" />';
			echo '<br /><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes">';
			echo '</div>';
	echo '</form>';
}

function car_demon_styles_theme_redirect() {
	if ($_SESSION['car_demon_options']['use_theme_files'] != 'Yes') {
		if (isset($_SESSION['car_demon_options']['is_mobile'])) {
			$is_mobile = $_SESSION['car_demon_options']['is_mobile'];
		}
		else {
			$is_mobile = 'No';
		}
		if ($is_mobile != 'Yes') {
			global $wp;
			$plugindir = dirname( __FILE__ );
			$car_demon_options = $_SESSION['car_demon_options'];
			if (!empty($car_demon_options)) {
				$theme_style = $car_demon_options['car_demon_style'];
				$theme_page_style = $car_demon_options['car_demon_page_style'];
			} else {
				$theme_style = 'default';
				$theme_page_style = 'default';
			}
			$template_directory = get_template_directory();
			if (isset($wp->query_vars["post_type"])) {
				$post_type = $wp->query_vars["post_type"];
			}
			else {
				$post_type = '';
			}
			if (isset($wp->query_vars["s"])) {
				$search = $wp->query_vars["s"];
			}
			else {
				$search = '';
			}
			if ($post_type == 'cars_for_sale') {
				if (isset($wp->query_vars["cars_for_sale"])) {
					if ($wp->query_vars["cars_for_sale"]) {
						$templatefilename = 'single-cars_for_sale.php';
					} else {
						$templatefilename = 'archive-cars_for_sale.php';
						$theme_page_style = $theme_style;
					}
				} else {
						$templatefilename = 'archive-cars_for_sale.php';
						$theme_page_style = $theme_style;
				}
				if (file_exists($template_directory . '/' . $templatefilename)) {
					$return_template = $template_directory . '/' . $templatefilename;
				} else {
					$return_template = $plugindir . '/theme-files/' . $theme_page_style .'/' . $templatefilename;
				}
				if ($theme_page_style == 'default') {
					$return_template = str_replace('car-demon-styles','car-demon', $return_template);
					$return_template = str_replace('default','', $return_template);
				}
				do_car_demon_styles_theme_redirect($return_template);
			// Custom Taxonomy
			} elseif (isset($wp->query_vars["vehicle_condition"])) {
				$templatefilename = 'archive-cars_for_sale.php';
				if (file_exists($template_directory . '/' . $templatefilename)) {
					$return_template = $template_directory . '/' . $templatefilename;
				} else {
					$return_template = $plugindir . '/theme-files/' . $theme_style .'/' . $templatefilename;
				}
				if ($theme_style == 'default') {
					$return_template = str_replace('car-demon-styles','car-demon', $return_template);
					$return_template = str_replace('default','', $return_template);
				}
				do_car_demon_styles_theme_redirect($return_template);
			} elseif (isset($wp->query_vars["vehicle_year"])) {
				$templatefilename = 'archive-cars_for_sale.php';
				if (file_exists($template_directory . '/' . $templatefilename)) {
					$return_template = $template_directory . '/' . $templatefilename;
				} else {
					$return_template = $plugindir . '/theme-files/' . $theme_style .'/' . $templatefilename;
				}
				if ($theme_style == 'default') {
					$return_template = str_replace('car-demon-styles','car-demon', $return_template);
					$return_template = str_replace('default','', $return_template);
				}
				do_car_demon_styles_theme_redirect($return_template);
			} elseif (isset($wp->query_vars["vehicle_make"])) {
				$templatefilename = 'archive-cars_for_sale.php';
				if (file_exists($template_directory . '/' . $templatefilename)) {
					$return_template = $template_directory . '/' . $templatefilename;
				} else {
					$return_template = $plugindir . '/theme-files/' . $theme_style .'/' . $templatefilename;
				}
				if ($theme_style == 'default') {
					$return_template = str_replace('car-demon-styles','car-demon', $return_template);
					$return_template = str_replace('default','', $return_template);
				}
				do_car_demon_styles_theme_redirect($return_template);
			} elseif (isset($wp->query_vars["vehicle_model"])) {
				$templatefilename = 'archive-cars_for_sale.php';
				if (file_exists($template_directory . '/' . $templatefilename)) {
					$return_template = $template_directory . '/' . $templatefilename;
				} else {
					$return_template = $plugindir . '/theme-files/' . $theme_style .'/' . $templatefilename;
				}
				if ($theme_style == 'default') {
					$return_template = str_replace('car-demon-styles','car-demon', $return_template);
					$return_template = str_replace('default','', $return_template);
				}
				do_car_demon_styles_theme_redirect($return_template);
			} elseif (isset($wp->query_vars["vehicle_location"])) {
				$templatefilename = 'archive-cars_for_sale.php';
				if (file_exists($template_directory . '/' . $templatefilename)) {
					$return_template = $template_directory . '/' . $templatefilename;
				} else {
					$return_template = $plugindir . '/theme-files/' . $theme_style .'/' . $templatefilename;
				}
				if ($theme_style == 'default') {
					$return_template = str_replace('car-demon-styles','car-demon', $return_template);
					$return_template = str_replace('default','', $return_template);
				}
				do_car_demon_styles_theme_redirect($return_template);
			} elseif (isset($wp->query_vars["vehicle_body_style"])) {
				$templatefilename = 'archive-cars_for_sale.php';
				if (file_exists($template_directory . '/' . $templatefilename)) {
					$return_template = $template_directory . '/' . $templatefilename;
				} else {
					$return_template = $plugindir . '/theme-files/' . $theme_style .'/' . $templatefilename;
				}
				if ($theme_style == 'default') {
					$return_template = str_replace('car-demon-styles','car-demon', $return_template);
					$return_template = str_replace('default','', $return_template);
				}
				do_car_demon_styles_theme_redirect($return_template);
			// Search Cars
			} elseif ($search == 'cars') {
				if ($_GET['car']==1) {
					$templatefilename = 'search.php';
					$return_template = $plugindir . '/theme-files/' . $theme_style .'/' . $templatefilename;
					if ($theme_style == 'default') {
						$return_template = str_replace('car-demon-styles','car-demon', $return_template);
						$return_template = str_replace('default','', $return_template);
					}
					global $post, $wp_query;
					$wp_query->is_404 = false;
					include($return_template);
					die();
				}
			}
		}
	}
}

function do_car_demon_styles_theme_redirect($url) {
    global $post, $wp_query;
    if (have_posts()) {
        include($url);
        die();
    } else {
        $wp_query->is_404 = true;
    }
}

function car_demon_style_deactivation($newname, $newtheme) {
	// Switch Car Demon Style if Predetermined Theme has been activated, if not it sets it back to default style.
	$car_demon_options = get_option('car_demon_options');
	if ($newname == 'Suffusion') { 
		$car_demon_options['car_demon_style'] = 'suffusion';
		$car_demon_options['car_demon_page_style'] = 'suffusion';
	} elseif ($newname == 'Catch Box') { 
		$car_demon_options['car_demon_style'] = 'catch_box';
		$car_demon_options['car_demon_page_style'] = 'catch_box';
	} elseif ($newname == 'Responsive') { 
		$car_demon_options['car_demon_style'] = 'responsive';
		$car_demon_options['car_demon_page_style'] = 'responsive';
	} else {
		$car_demon_options['car_demon_style'] = 'default';
		$car_demon_options['car_demon_page_style'] = 'default';	
	}
	update_option( 'car_demon_options', $car_demon_options );
}
add_action("switch_theme", "car_demon_style_deactivation", 10 , 2);

?>
