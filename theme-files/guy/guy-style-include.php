<?php
function guy_display_car($post_id) {
	$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
	$car_demon_pluginpath = str_replace('includes', '', $car_demon_pluginpath);
	$vehicle_year = strip_tags(get_the_term_list( $post_id, 'vehicle_year', '','', '', '' ));
	$vehicle_make = strip_tags(get_the_term_list( $post_id, 'vehicle_make', '','', '', '' ));
	$vehicle_model = strip_tags(get_the_term_list( $post_id, 'vehicle_model', '','', '', '' ));
	$vehicle_condition = strip_tags(get_the_term_list( $post_id, 'vehicle_condition', '','', '', '' ));
	$vehicle_body_style = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_body_style', '','', '', '' )),0);
	$vehicle_location = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_location', '','', '', '' )),0);
	$vehicle_stock_number = get_post_meta($post_id, "_stock_value", true);
	$vehicle_vin = rwh(get_post_meta($post_id, "_vin_value", true),0);
	$vehicle_exterior_color = get_post_meta($post_id, "_exterior_color_value", true);
	$vehicle_interior_color = get_post_meta($post_id, "_interior_color_value", true);
	$vehicle_mileage = get_post_meta($post_id, "_mileage_value", true);
	$vehicle_transmission = get_post_meta($post_id, "_transmission_value", true);
	$title = get_car_title($post_id);
	$stock_value = get_post_meta($post_id, "_stock_value", true);
	$mileage_value = get_post_meta($post_id, "_mileage_value", true);
	if (isset($_SESSION['car_demon_options']['use_compare'])) {
		if ($_SESSION['car_demon_options']['use_compare'] == 'Yes') {
			$in_compare = '';
			if (isset($_SESSION['car_demon_compare'])) {
				$compare_these = split(',',$_SESSION['car_demon_compare']);
			} else {
				$compare_these = array();
			}
			if (in_array($post_id,$compare_these)) {
				$in_compare = ' checked="checked"';
			}
			$compare = '<div class="compare">';
				$compare .= '<div class="compare_input">';
					$compare .= '<input'.$in_compare.' id="compare_'.$post_id.'" type="checkbox" onclick="update_car('.$post_id.',this);" />';
				$compare .= '</div>';
				$compare .= '<div class="compare_label">';
					$compare .= 'Compare';
				$compare .= '</div>';
			$compare .= '</div>';
		}
	}
	$link = get_permalink($post_id);
	if (isset($_COOKIE["sales_code"])) {
		$link = $link .'?sales_code='.$_COOKIE["sales_code"];
	}
	$main_photo = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post_id ) );
	
?>
<div class="random car_item">
<!--// Guy //-->
<div class="art-content-layout-row responsive-layout-row-2">
<div class="art-layout-cell layout-item-1" style="width: 50%;">
<h3>Featured</h3>
<hr style="border: none; background-color: #cccccc; color: #cccccc; height: 1px;">
<p style="text-align: center;"><img class="art-lightbox" alt="" src="<?php echo $main_photo;?>" width="445" height="313"></p>
</div>
<div class="art-layout-cell layout-item-1" style="width: 50%;">
<h1 class="item sell"><?php echo $title; ?></h1>
<p>&nbsp;</p>
<table class="art-article" style="width: 100%;">
<tbody>
<tr>
<td style="width: 17%;"><span style="font-weight: bold;">Year/Reg:</span></td>
<td style="width: 17%;"><span class="description_text"><?php echo $vehicle_year; ?></span></td>
<td style="width: 17%;"><span style="font-weight: bold;">Mileage:</span></td>
<td style="width: 17%;"><span class="description_text"><?php echo $vehicle_mileage; ?></span></td>
<td style="width: 16%;"><span style="font-weight: bold;">Engine size:</span></td>
<td style="width: 16%;">2.8</td>
</tr>
<tr>
<td style="width: 17%;"><span style="font-weight: bold;">Fuel type:</span></td>
<td style="width: 17%;">Petrol</td>
<td style="width: 17%;"><span style="font-weight: bold;">Gearbox:</span></td>
<td style="width: 17%;">Automatic</td>
<td style="width: 16%;"><span style="font-weight: bold;">Body style:</span></td>
<td style="width: 16%;"><span class="description_text"><?php echo $vehicle_body_style; ?></span></td>
</tr>
<tr>
<td style="width: 17%;"></td>
<td style="width: 17%;"></td>
<td style="width: 17%;"></td>
<td style="width: 17%;"></td>
<td style="width: 16%;"></td>
<td style="width: 16%;"></td>
</tr>
</tbody>
</table>
<p>Beige Gold, Another Px To Clear from Burton Vehicles….! This LEXUS LS 4.0 V8 Automatic is in Beige Gold,This car benefits from Full Premium Electric Cream Leather Memory Heated Seats,Electric Sunroof,Stereo,Electric Windows x 4,Electric Heated Mirrors,Auto Dimming Mirrors,Auto Lights,Auto Rain Sensing Wipers,Cruise Control,Automatic..</p>
<p><a class="art-button" style="font-weight: bold; font-size: 24px;" href="#"><span style="color: #000000;"><?php echo get_vehicle_price_style_guy($post_id); ?></span></a></p>
<p style="text-align: left;"><a class="art-button" href="#">Read More</a></p>
</div>
</div>
<!--// Guy //-->
</div>
<?php
}
function get_vehicle_price_style_guy($post_id) {
	$is_sold = get_post_meta($post_id, 'sold', true);
	$spacer = '';
	$vehicle_condition = '';
	if (isset($_SESSION['car_demon_options']['currency_symbol'])) {
		$currency_symbol = $_SESSION['car_demon_options']['currency_symbol'];
	} else {
		$currency_symbol = "$";
	}
	if (isset($_SESSION['car_demon_options']['currency_symbol_after'])) {
		$currency_symbol_after = $_SESSION['car_demon_options']['currency_symbol_after'];
		if (!empty($currency_symbol_after)) {
			$currency_symbol = "";
		}
	} else {
		$currency_symbol_after = "";
	}	
	if ($is_sold == "Yes") {
		$sold = "<div class='car_sold'>".__("SOLD", "car-demon")."</div>";
		return $sold;
	}
	$vehicle_location = strip_tags(get_the_term_list( $post_id, 'vehicle_location', '','', '', '' ));
	if ($vehicle_location == '') {
		$vehicle_location = 'Default';
		$vehicle_location_slug = 'default';
	} else {
		$vehicle_location_term = get_term_by('name', $vehicle_location, 'vehicle_location');
		$vehicle_location_slug = $vehicle_location_term->slug;
		$vehicle_condition = strip_tags(get_the_term_list( $post_id, 'vehicle_condition', '','', '', '' ));
	}
	if ($vehicle_condition == 'New') {
		$show_price = get_option($vehicle_location_slug.'_show_new_prices');
	} else {
		$show_price = get_option($vehicle_location_slug.'_show_used_prices');
	}
	$price = '';
	if ($show_price == 'Yes') {
		$vehicle_price = get_post_meta($post_id, "_price_value", true);
		$vehicle_price_pack = (int)$vehicle_price;
		if ($vehicle_price == 0) {
			$vehicle_price = ' Call '.$currency_symbol;
		}
		$selling_price = get_post_meta($post_id, "_msrp_value", true);
		$rebate = get_post_meta($post_id, "_rebates_value", true);
		$dealer_discount = get_post_meta($post_id, "_discount_value", true);
		$your_price = $vehicle_price;
		$spacer = "";
		if (!empty($selling_price)) {
			$selling_price_label = get_post_meta($post_id, '_msrp_label', true);
			if (empty($selling_price_label)) {
				$selling_price_label = __('Selling Price', 'car-demon');
			}
			$price .= '<div id="selling_price" class="car_selling_price"><div class="car_price_text">'. $currency_symbol. $selling_price . $currency_symbol_after .'</div> :'.$selling_price_label.'</div>';
		}
		if (!empty($rebate)) {
			$rebate_label = get_post_meta($post_id, '_rebate_label', true);
			if (empty($rebate_label)) {
				$rebate_label = __('Rebate', 'car-demon');
			}
			$price .= '<div id="rebate" class="car_rebate"><div class="car_price_text">'. $currency_symbol. $rebate . $currency_symbol_after. '</div> :'.$rebate_label.'</div>';
		}
		else {
			$spacer = '<div class="car_rebate"><div class="car_price_text">&nbsp;</div>&nbsp;</div>';
		}
		if (!empty($dealer_discount)){
			$discount_label = get_post_meta($post_id, '_discount_label', true);
			if (empty($discount_label)) {
				$discount_label = __('Xtra Discount', 'car-demon');
			}
			$price .= '<div class="car_dealer_discounts"><div class="car_price_text">'. $currency_symbol . $dealer_discount . $currency_symbol_after .'</div> :'.$discount_label.'</div>';
		}
		else {
			$spacer = '<div class="car_rebate"><div class="car_price_text">&nbsp;</div>&nbsp;</div>';		
		}
		$price_label = get_post_meta($post_id, '_price_label', true);
		if (empty($price_label)) {
			$price_label = __('Your Price', 'car-demon');
		}
		$price .= '<div id="your_price_text" class="car_your_price">'.$price_label.':</div>';
		$price .= '<div id="your_price" class="car_final_price">'. $currency_symbol .$your_price . $currency_symbol_after .'</div>';
	} else {
		if ($vehicle_condition == 'New') {
			$price .= '<p>&nbsp;</p><div class="car_retail_price">'.get_option($vehicle_location_slug.'_no_new_price').'</div>';
		}
		else {
			$price .= '<p>&nbsp;</p><div class="car_retail_price">'.get_option($vehicle_location_slug.'_no_used_price').'</div>';
		}
	}
	$sold_status = get_post_meta($post_id, "sold", true);
  	if ($sold_status == 'yes') {
		$pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
		$pluginpath = str_replace('includes','',$pluginpath);
		$price = '<div id="your_price_text" class="your_price_text">';
			$price .= '<img src="'.$pluginpath.'theme-files\images\sold.gif" alt="Sold" title="Sold" /><br />';
		$price .= '</div>';
	}
	$price .= '</div>';
	$price = '<div class="car_price_details" id="car_price_details">'.$spacer.$price;
	return $price;
}
?>