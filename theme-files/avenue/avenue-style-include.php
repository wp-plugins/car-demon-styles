<?php
function avenue_display_car($post_id) {
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
	<div class="main_photo">
		<a href="<?php echo $link; ?>">
			<img class="photo_thumb" src="<?php echo $main_photo;?>" alt="" title="<?php echo $title; ?>">
			Details
		</a>
	</div>
	<div class="car_title">
		<?php echo $title; ?>
	</div>
	<?php echo $compare; ?>
	<div class="description">
		<div class="description_left">
			<div class="description_label">Stock #:</div>
			<div class="description_text"><?php echo $vehicle_stock_number; ?></div>
			<div class="description_label">Condition:</div>
			<div class="description_text"><?php echo $vehicle_condition; ?></div>
			<div class="description_label">Year:</div>
			<div class="description_text"><?php echo $vehicle_year; ?></div>
			<div class="description_label">Make:</div>
			<div class="description_text"><?php echo $vehicle_make; ?></div>
			<div class="description_label">Model:</div>
			<div class="description_text"><?php echo $vehicle_model; ?></div>
			<div class="description_label">Body Style:</div>
			<div class="description_text"><?php echo $vehicle_body_style; ?></div>
		</div>
		<div class="description_right">
			<div class="description_label">Transmission:</div>
			<div class="description_text"><?php echo $vehicle_transmission; ?></div>
			<div class="description_label">Mileage:</div>
			<div class="description_text"><?php echo $vehicle_mileage; ?></div>
			<div class="description_label">Ext. Color:</div>
			<div class="description_text"><?php echo $vehicle_exterior_color; ?></div>
			<div class="description_label">Vin Number:</div>
			<div class="description_text_vin"><?php echo $vehicle_vin; ?></div>
		</div>
	</div>
	<?php echo get_vehicle_price_style_avenue($post_id); ?>
</div>
<?php
}

function get_vehicle_price_style_avenue($post_id) {
	$vehicle_location = strip_tags(get_the_term_list( $post_id, 'vehicle_location', '','', '', '' ));
	if ($vehicle_location == '') {
		$vehicle_location = 'Default';
		$vehicle_location_slug = 'default';
	}
	else {
		$vehicle_location_term = get_term_by('name', $vehicle_location, 'vehicle_location');
		$vehicle_location_slug = $vehicle_location_term->slug;
	}
	$vehicle_condition = strip_tags(get_the_term_list( $post_id, 'vehicle_condition', '','', '', '' ));
	if ($vehicle_condition == 'New') {
		$show_price = get_option($vehicle_location_slug.'_show_new_prices');
	}
	else {
		$show_price = get_option($vehicle_location_slug.'_show_used_prices');
	}
	$price = '';
	if ($show_price == 'Yes') {
		$vehicle_price = get_post_meta($post_id, "_price_value", true);
		$vehicle_price_pack = (int)$vehicle_price;
		if ($vehicle_price == 0) {
			$vehicle_price = ' Call $';
		}
		$selling_price = get_post_meta($post_id, "_msrp_value", true);
		$rebate = get_post_meta($post_id, "_rebates_value", true);
		$dealer_discount = get_post_meta($post_id, "_discount_value", true);
		$your_price = $vehicle_price;
		$spacer = "";
		if (!empty($selling_price)) {
			$price .= '<div class="price_label">'.__('Selling Price', 'car-demon').'</div><div class="price_value"> $'. $selling_price .'</div>';
		}
		if (!empty($rebate)) {
			$price .= '<div class="price_label">'.__('Rebate', 'car-demon').'</div><div class="price_value"> $'. $rebate .'</div>';
		}
		else {
			$spacer = '<div class="price_label">&nbsp;</div><div class="price_value"></div>';
		}
		if (!empty($dealer_discount)){
			$price .= '<div class="price_label">'.__('Xtra Discount', 'car-demon').'</div><div class="price_value"> $'. $dealer_discount .'</div>';
		}
		else {
			$spacer = '<div class="price_label">&nbsp;</div><div class="price_value"></div>';
		}
		$price .= '<div class="price_line">&nbsp;</div>';
		$price .= '<div class="final_price_label">'.__('YOUR PRICE', 'car-demon').': </div>';
		$price .= '<div class="final_price_value">$' .$your_price .'</div>';
	}
	else {
		if ($vehicle_condition == 'New') {
			$price .= '<div class="no_price_style">'.get_option($vehicle_location_slug.'_no_new_price').get_option($vehicle_location_slug.'_new_sales_number').'</div>';
		}
		else {
			$price .= '<div class="no_price_style">'.get_option($vehicle_location_slug.'_no_used_price').get_option($vehicle_location_slug.'_used_sales_number').'</div>';
		}
	}
	$sold_status = get_post_meta($post_id, "sold", true);
  	if ($sold_status == 'yes') {
		$pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
		$pluginpath = str_replace('includes','',$pluginpath);
		$price = '<div id="your_price_text" class="your_price_text_style">';
			$price .= '<img src="'.$pluginpath.'images\sold.gif" alt="Sold" title="Sold" /><br />';
		$price .= '</div>';
	}

	$price = '<div class="price">'.$price.'</div>';

	return $price;
}
?>