<?php
function boulevard_display_car($post_id) {
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
	$vehicle_engine = get_post_meta($post_id, "_engine_value", true);
	$title = $vehicle_year . ' ' . $vehicle_make . ' '. $vehicle_model;
	$title = substr($title, 0, 19);
	$stock_value = get_post_meta($post_id, "_stock_value", true);
	$mileage_value = get_post_meta($post_id, "_mileage_value", true);
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
		$compare = '<input'.$in_compare.' id="compare_'.$post_id.'" title="Compare" type="checkbox" onclick="update_car('.$post_id.',this);" />';
	}
	$link = get_permalink($post_id);
	if (isset($_COOKIE["sales_code"])) {
		$link = $link .'?sales_code='.$_COOKIE["sales_code"];
	}
	$main_photo = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post_id ) );
	$photo_count = boulevard_count_photos($post_id);
?>
<div class="random">
	<div class="item0">
		<table style="width:100%;" cellpadding="0" cellspacing="0" class="fs11">
			<tbody>
				<tr>		
					<td class="itemcb0">
						<?php echo $compare; ?>
					</td>
					<td class="itemdesctdwidth">
						<div style="padding-bottom: 3px;">
							<span class="fbold attention fs16" onclick="open_car_demon_lightbox_details('<?php echo $post_id; ?>');"><?php echo $title; ?></span>
						</div>
						<div style="overflow:hidden;height:15px;"><strong><?php echo $vehicle_condition; ?>, <?php echo $vehicle_body_style; ?>, <?php echo $vehicle_vin; ?></strong></div>
						<table border="0" cellpadding="0" cellspacing="0" class="itemphotoinfo0" style="margin-top:5px;">
							<tbody><tr>
								<td class="itemphotobox0">
									<div class="itemphoto"><img onclick="open_car_demon_lightbox_photos('<?php echo $post_id; ?>');" src="<?php echo $main_photo; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" class="fs10 text" style="width:107px; height:80px; border:none;"></div>
								</td>
								<td class="iteminfo0">
											<div style="height:17px">
												<div class="itemcolort">Engine:</div>
												<div class="itemcolor"><?php echo $vehicle_engine; ?></div>
												<div style="clear:both"></div>
											</div>
											<div style="height:17px">
												<div class="itemcolort">Trans:</div>
												<div class="itemcolor"><?php echo $vehicle_transmission; ?></div>
												<div style="clear:both"></div>
											</div>
											<div style="height:17px">
												<div class="itemcolort">Mileage:</div>
												<div class="itemcolor"><?php echo $vehicle_mileage; ?></div>
												<div style="clear:both"></div>
											</div>
											<div style="height:17px">
												<div class="itemcolort">Exterior:</div>
												<div class="itemcolor"><?php echo $vehicle_exterior_color; ?></div>
												<div style="clear:both"></div>
											</div>
											<div style="height:17px">
												<div class="itemcolort">Interior:</div>
												<div class="itemcolor"><?php echo $vehicle_interior_color; ?></div>
												<div style="clear:both"></div>
											</div>
								</td>
									<td class="itemhistimg">
									</td>
							</tr>
						</tbody></table>
					</td>
					<td class="pricebox0">
						<?php echo get_vehicle_price_style_boulevard($post_id); ?>
					</td>
				</tr>
				<tr>
					<td style="width:20px; padding:0;"></td>
					<td class="itemLinks fs11" colspan="2">
						<div class="buttonlink" onclick="open_car_demon_lightbox_photos('<?php echo $post_id; ?>');">
							<img src="<?php echo $car_demon_pluginpath; ?>images/photo.png" alt="<?php echo $title; ?> - View photos">View <?php echo $photo_count; ?> Photos
						</div>
						<div class="buttonlink" onclick="open_contact_us('<?php echo $post_id; ?>');">
							<img src="<?php echo $car_demon_pluginpath; ?>images/phone.png" alt="<?php echo $title; ?> - Contact Us">Contact Us
						</div>
						<div class="buttonlink" onclick="email_friend('<?php echo $post_id; ?>');">
							<img src="<?php echo $car_demon_pluginpath; ?>images/email_go.png" alt="<?php echo $title; ?> - Email a Friend">Email a Friend
						</div>
						<div class="buttonlink" onclick="open_car_demon_lightbox_details('<?php echo $post_id; ?>');">
							<img src="<?php echo $car_demon_pluginpath; ?>images/zoom.png" alt="<?php echo $title; ?> - View Details">Overview
						</div>

						<div class="stocknumquotelink" style="width: 146px; position: relative;">
							<div class="stocknumforitem" style="position: absolute; top: -20px; right: 0px;">
								Stock<span class="fbold"># B1249935</span>
							</div>
							<div class="buttonlink" style="margin-right:0px;float:right;">
								<a class="textLink" href="<?php echo $link; ?>" target="_top">
									<img src="<?php echo $car_demon_pluginpath; ?>images/information.png" alt="<?php echo $title; ?> - View Details">View Details
								</a>
							</div>
						</div>
					<div style="clear:both"></div>
				</td>
			</tr>
		</tbody></table>
	</div>
</div>
<?php
}

function get_vehicle_price_style_boulevard($post_id) {
	$vehicle_location = strip_tags(get_the_term_list( $post_id, 'vehicle_location', '','', '', '' ));
	$vehicle_condition = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_condition', '','', '', '' )),0);
	if ($vehicle_location == '') {
		$vehicle_location = 'Default';
		$vehicle_location_slug = 'default';
	}
	else {
		$vehicle_location_term = get_term_by('name', $vehicle_location, 'vehicle_location');
		$vehicle_location_slug = $vehicle_location_term->slug;
		$vehicle_condition = strip_tags(get_the_term_list( $post_id, 'vehicle_condition', '','', '', '' ));
	}
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
			$price .= '<div class="no_price_style">'.get_option($vehicle_location_slug.'_no_new_price').'</div>';
		}
		else {
			$price .= '<div class="no_price_style">'.get_option($vehicle_location_slug.'_no_used_price').'</div>';
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

function boulevard_count_photos($post_id) {
	$image_list = get_post_meta($post_id, '_images_value', true);
	$thumbnails = split(",",$image_list);
	$total_pics = count($thumbnails);
	if ($total_pics < 1) {
		$thumbnails = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' =>'image') );
		$total_pics = count($thumbnails);
	}
//	if ($total_pics > 27) { $total_pics = 27; }
	return $total_pics;
}
?>