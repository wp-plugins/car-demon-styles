<?php
$newPath = dirname(__FILE__);
if (!stristr(PHP_OS, 'WIN')) {
	$is_it_iis = 'Apache';
}
else {
	$is_it_iis = 'Win';
}
if ($is_it_iis == 'Apache') {
	$newPath = str_replace('wp-content/plugins/car-demon-styles/theme-files/boulevard', '', $newPath);
	include_once($newPath."/wp-load.php");
	include_once($newPath."/wp-includes/wp-db.php");
}
else {
	$newPath = str_replace('wp-content\plugins\car-demon-styles\theme-files\boulevard', '', $newPath);
	include_once($newPath."\wp-load.php");
	include_once($newPath."\wp-includes/wp-db.php");
}

$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';

if (isset($_GET['action'])) {
	if ($_GET['action']=='get_details') {
		echo get_boulevard_details($_POST['post_id']);
	}
	
	if ($_GET['action']=='get_main_photo') {
		echo get_boulevard_main_photo($_POST['post_id']);
	}
	
	if ($_GET['action']=='get_photo_thumbs') {
		echo get_boulevard_photo_thumbs($_POST['post_id']);
	}
	
	if ($_GET['action']=='email_friend') {
		require($newPath.'wp-content/plugins/car-demon/forms/car-demon-form-key-class.php');
		$cd_formKey = new cd_formKey();
		echo get_boulevard_email_friend($_POST['post_id']);
	}
	
	if ($_GET['action']=='contact_us') {
		require($newPath.'wp-content/plugins/car-demon/forms/car-demon-form-key-class.php');
		$cd_formKey = new cd_formKey();
		echo get_boulevard_contact_us($_POST['post_id']);
	}
}

function get_boulevard_details($post_id) {
	$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
	$vehicle_body_style = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_body_style', '','', '', '' )),0);
	$vehicle_vin = rwh(get_post_meta($post_id, "_vin_value", true),0);
	$vehicle_year = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_year', '','', '', '' )),0);
	$vehicle_make = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_make', '','', '', '' )),0);
	$vehicle_model = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_model', '','', '', '' )),0);
	$vehicle_condition = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_condition', '','', '', '' )),0);
	$vehicle_location = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_location', '','', '', '' )),0);
	$vehicle_stock_number = get_post_meta($post_id, "_stock_value", true);
	$vehicle_exterior_color = get_post_meta($post_id, "_exterior_color_value", true);
	$vehicle_interior_color = get_post_meta($post_id, "_interior_color_value", true);
	$vehicle_mileage = get_post_meta($post_id, "_mileage_value", true);
	$vehicle_fuel = get_post_meta($post_id, "_fuel_type_value", true);
	$vehicle_transmission = get_post_meta($post_id, "_transmission_value", true);
	$vehicle_engine = get_post_meta($post_id, "_engine_value", true);
	$vehicle_details = rwh($vehicle_vin,3);
	$vehicle_details .= rwh($vehicle_year,3);
	$vehicle_details .= rwh($vehicle_make,3);
	$vehicle_details .= rwh($vehicle_model,3);
	$vehicle_details .= rwh($vehicle_condition,3);
	$vehicle_details .= rwh($vehicle_body_style,3);
	$vehicle_details .= rwh($vehicle_location,3);
	$car_title = $vehicle_year .'_' . $vehicle_make .'_' . $vehicle_model;
	$car_title = trim($car_title);
	$car_head_title = $vehicle_year .' ' . $vehicle_make .' ' . $vehicle_model;
	$car_title = str_replace(chr(32), '_', $car_title);
	$link = get_permalink($post_id);
	//=========================Contact Info==========================
	$car_contact = get_car_contact($post_id);
	$contact_sales_name = $car_contact['sales_name'];
	$contact_sales_email = $car_contact['sales_email'];
	$contact_sales_phone = $car_contact['sales_phone'];
	$contact_sales_mobile = $car_contact['sales_mobile'];
	$contact_sales_mobile_provider = $car_contact['sales_mobile_provider'];
	$contact_trade_name = $car_contact['trade_name'];
	$contact_trade_email = $car_contact['trade_email'];
	$contact_trade_phone = $car_contact['trade_phone'];
	$contact_trade_url = $car_contact['trade_url'];
	$contact_finance_name = $car_contact['finance_name'];
	$contact_finance_email = $car_contact['finance_email'];
	$contact_finance_phone = $car_contact['finance_phone'];
	$contact_finance_url = $car_contact['finance_url'];
	//===============================================================
	$main_photo = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post_id ) );
	$post_object = get_post($post_id);

	if (!empty($_SESSION['car_demon_options']['vinquery_id'])) {
		if ($vehicle_year > 1984) {
			car_demon_get_vin_query($post_id, $vehicle_vin);
		}
	}
	$vin_query_decode_array = get_post_meta($post_id, 'decode_string');
	if (isset($vin_query_decode_array[0])) {
		$vin_query_decode = $vin_query_decode_array[0];
	} else {
		$vin_query_decode = '';
	}
	if (isset($vin_query_decode['decoded_fuel_economy_city'])) {
		$tab_cnt = 0;
		if (!empty($vin_query_decode['decoded_fuel_economy_city'])) {
			$tab_cnt = $tab_cnt + 5;
			$vin_query = 1;
			$about_cnt = 7;
		} else {
			$vin_query = 0;
		}
	} else {
		$vin_query = 0;
	}
	$content = '';
	if ($vin_query == 1) {
		$content .= get_vin_query_specs($vin_query_decode, $vehicle_vin);
		$content .= get_vin_query_safety($vin_query_decode);
		$content .= get_vin_query_convienience($vin_query_decode);
		$content .= get_vin_query_comfort($vin_query_decode);
		$content .= get_vin_query_entertainment($vin_query_decode);
	}
	if (empty($content)) {
		$content = $post_object->post_content;
		$content = trim($content);
		if (empty($content)) {
			$location_lists = get_the_terms($post_id, "vehicle_location");
			if ($location_lists) {
				foreach ($location_lists as $location_list) {
					$location_slug = $location_list->slug;
				}
			}
			else {
				$location_slug = "default";
			}
			$content = get_option($location_slug.'_default_description');
			if (empty($content)) {
				$content = get_default_description();
			}
		}
	}
	$photo_count = '';
	?>
	<img src="<?php echo $main_photo; ?>" title="<?php echo $car_head_title; ?>" class="boulevard_lightbox_detail_main_photo" />
		<div class="fin_specs">
		<?php if (!empty($contact_finance_url)) { 
				if ($car_contact['finance_popup'] == 'Yes') {
				?>
				<a onclick="window.open('<?php echo $contact_finance_url .'?stock_num='.$vehicle_stock_number; ?>&sales_code=<?php echo $car_contact['sales_code']; ?>','finwin','width=<?php echo $car_contact['finance_width']; ?>, height=<?php echo $car_contact['finance_height']; ?>, menubar=0, resizable=0')">
					<img src="<?php echo $car_demon_pluginpath; ?>images/finance-btn.png" title="Finance Application" />
				</a>
			<?php 
			}
			else {
			?>
				<a href="<?php echo $contact_finance_url .'?stock_num='.$vehicle_stock_number; ?>&sales_code=<?php echo $car_contact['sales_code']; ?>">
					<img src="<?php echo $car_demon_pluginpath; ?>images/finance-btn.png" title="Finance Application" />
				</a>
		<?php 
				}
			}
		?>
		</div>
		<div class="trade_specs">
			<?php
				if (!empty($contact_trade_url)) {
			?>
				<a href="<?php echo $contact_trade_url .'?stock_num='.$vehicle_stock_number; ?>&sales_code=<?php echo $car_contact['sales_code']; ?>">
					<img src="<?php echo $car_demon_pluginpath; ?>images/trade-btn.png" title="Trade-In Application" />
				</a>
			<?php
				}
			?>
		</div>
		<ul class="refine-nav">
			<li class="first">
				<span>Specifications</span>
				<ul class="specs"> 
					<li><div class="strong_style">Condition: </div><div class="spec_details"><?php echo $vehicle_condition;?></div></li>
					<li><div class="strong_style">Mileage: </div><div class="spec_details"><?php echo $vehicle_mileage;?></div></li>
					<li><div class="strong_style">Year: </div><div class="spec_details"><?php echo $vehicle_year;?></div></li>
					<li><div class="strong_style">Make: </div><div class="spec_details"><?php echo $vehicle_make;?></div></li>
					<li><div class="strong_style">Model: </div><div class="spec_details"><?php echo $vehicle_model;?></div></li>
					<li><div class="strong_style">Transmission: </div><div class="spec_details"><?php echo $vehicle_transmission;?></div></li>
					<li><div class="strong_style">Engine: </div><div class="spec_details"><?php echo $vehicle_engine;?></div></li>
					<li><div class="strong_style">Fuel Type: </div><div class="spec_details"><?php echo $vehicle_fuel;?></div></li>
					<li><div class="strong_style">Exterior: </div><div class="spec_details"><?php echo $vehicle_exterior_color;?></div></li>
					<li><div class="strong_style">Interior: </div><div class="spec_details"><?php echo $vehicle_interior_color;?></div></li>
				</ul>
			</li>
		</ul>
		<div class="button_box">
			<div class="buttonlink" onclick="open_car_demon_lightbox_photos('<?php echo $post_id; ?>');">
				<img src="<?php echo $car_demon_pluginpath; ?>images/photo.png" alt="<?php echo $car_head_title; ?> - View photos">View <?php echo $photo_count; ?> Photos
			</div>
			<div class="buttonlink" onclick="open_contact_us('<?php echo $post_id; ?>');">
				<img src="<?php echo $car_demon_pluginpath; ?>images/phone.png" alt="<?php echo $car_head_title; ?> - Contact Us">Contact Us
			</div>
			<div class="buttonlink" onclick="email_friend('<?php echo $post_id; ?>');">
				<img src="<?php echo $car_demon_pluginpath; ?>images/email_go.png" alt="<?php echo $car_head_title; ?> - Email a Friend">Email a Friend
			</div>
			<div class="buttonlink" style="margin-right:0px;float:right;">
				<a class="textLink" href="<?php echo $link; ?>" target="_top">
					<img src="<?php echo $car_demon_pluginpath; ?>images/information.png" alt="<?php echo $car_head_title; ?> - View Details">View Details
				</a>
			</div>
		</div>
		<div class="boulevard_description">
			<?php echo $content; ?>
		</div>
	<?php
}

function get_boulevard_main_photo($post_id) {
	$x = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post_id ) );
	return $x;
}

function get_boulevard_photo_thumbs($post_id) {
	$thumbnails = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' =>'image') );
	$cnt = 0;
	foreach($thumbnails as $thumbnail) {
		$guid = $thumbnail->guid;
		if (!empty($guid)) {
			$cnt = $cnt + 1;
			$car_js .= 'carImg['.$cnt.']="'.trim($thumbnail).'";'.chr(13);
			$photo_array = '<img class="car_demon_thumbs" style="cursor:pointer" onClick=\'MM_swapImage("car_demon_light_box_main_img","","'.trim($guid).'",1);active_img('.$cnt.')\' src="'.trim($guid).'" width="53" />';
			$this_car .= $photo_array;
		}
	}
	$image_list = get_post_meta($post_id, '_images_value', true);
	$stop = 27;
	$thumbnails = split(",",$image_list);
	$cnt = 0;
	$car_js = '';
	$this_car = '';
	foreach($thumbnails as $thumbnail) {
		$pos = strpos($thumbnail,'.jpg');
		if ($pos == true) {
			if ($cnt < $stop) {
				$car_js .= 'carImg['.$cnt.']="'.trim($thumbnail).'";'.chr(13);
				$photo_array = '<img class="boulevard_thumbs" style="cursor:pointer" onClick=\'MM_swapImage("car_demon_light_box_main_img","","'.trim($thumbnail).'",1);active_img('.$cnt.');\' src="'.trim($thumbnail).'" width="53" />';
				$this_car .= $photo_array;
				$cnt = $cnt + 1;
			}
		}
	}
	$total_pics = $cnt - 1;
	$car_js = '
		<input type="hidden" id="current_img_num" value="0" />
		<input type="hidden" id="current_img_name" />
		<input type="hidden" id="current_img_array" value="'.$cnt.'" />
		<input type="hidden" id="image_count" value="'.$total_pics.'" />
		<script>
			function photo_img_array() {
				var carImg = new Array;
				'.$car_js.'
				return carImg;
			}
			setInterval(function(){car_slide_show()},3000);
		</script>';
	$this_car .= $car_js;
	return $this_car;
}

function get_boulevard_email_friend($post_id) {
	global $cd_formKey;
	$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
	$main_photo = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post_id ) );
	$vehicle_year = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_year', '','', '', '' )),0);
	$vehicle_make = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_make', '','', '', '' )),0);
	$vehicle_model = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_model', '','', '', '' )),0);
	$car_head_title = $vehicle_year .' ' . $vehicle_make .' ' . $vehicle_model;
	$vehicle_stock_number = get_post_meta($post_id, "_stock_value", true);
	$link = get_permalink($post_id);
	$photo_count = '';
	$x = '
		<div style="width:100%;height:50px;">&nbsp;</div>
		<div id="ef_contact_final_msg" style="display:none; width:100%; float:left; height:500px; text-align:center;"></div>
		<div id="main_email_friend_div">
			<div style="float:left; width:60%; height:500px; padding:5px;" id="main_email_friend_description">
				<h2 class="fbold attention fs16">'.$car_head_title.'</h2>
				<img src="'. $main_photo .'" title="'.$car_head_title.'" class="boulevard_lightbox_detail_main_photo" />
				<div class="button_box">
					<div class="buttonlink" onclick="open_car_demon_lightbox_photos(\''.$post_id.'\');">
						<img src="'.$car_demon_pluginpath.'images/photo.png" alt="'.$car_head_title.' - View photos">View '.$photo_count.' Photos
					</div>
					<div class="buttonlink" onclick="open_contact_us(\''.$post_id.'\');">
						<img src="'. $car_demon_pluginpath.'images/phone.png" alt="'.$car_head_title.' - Contact Us">Contact Us
					</div>
					<div class="buttonlink">
						<a class="textLink" href="'.$link.'" target="_top">
							<img src="'.$car_demon_pluginpath.'images/information.png" alt="'.$car_head_title.' - View Details">View Details
						</a>
					</div>
				</div>			
			</div>
			<div style="float:left; width:37%; height:500px;" id="main_email_friend_div_form">
			<h2 class="fbold attention fs16">Send this car to a friend</h2>
				<form enctype="multicontact/form-data" action="?send_contact=1" method="post" class="cdform contact-appointment " id="email_friend_form" name="email_friend_form" style="margin: 10px auto 0 auto;">
				'.$cd_formKey->outputKey().'
				<input type="hidden" name="ef_stock_num" id="ef_stock_num" value="'.$vehicle_stock_number.'" />
						<fieldset class="cd-fs1">
						<legend>Your Information</legend>
						<ol class="cd-ol">
							<li class=""><label for="cd_field_2"><span>Your Name</span></label><input type="text" name="ef_cd_name" id="ef_cd_name" class="single fldrequired" value="Your Name" onfocus="ef_clearField(this)" onblur="ef_setField(this)"><span class="reqtxt">*</span></li>
							<li class=""><label for="cd_field_4"><span>Your Email</span></label><input type="text" name="ef_cd_email" id="ef_cd_email" class="single fldemail fldrequired" value=""><span class="emailreqtxt">*</span></li>
							<li class=""><label for="cd_field_2"><span>Friend\'s Name</span></label><input type="text" name="ef_cd_friend_name" id="ef_cd_friend_name" class="single fldrequired" value="Friend Name" onfocus="ef_clearField(this)" onblur="ef_setField(this)"><span class="reqtxt">*</span></li>
							<li class=""><label for="cd_field_4"><span>Friend\'s Email</span></label><input type="text" name="ef_cd_friend_email" id="ef_cd_friend_email" class="single fldemail fldrequired" value=""><span class="emailreqtxt">*</span></li>
						</ol>
						</fieldset>
						<fieldset class="cd-fs4">
						<legend>Your Message</legend>
						<ol class="cd-ol">
							<li id="li-5" class=""><textarea style="margin-left:10px;width:225px;height:70px;" name="ef_comment" id="ef_comment" class="area fldrequired">Check out this '. $car_head_title.', stock number '. $vehicle_stock_number.'!</textarea><br><span class="reqtxt" style="margin-left:10px;"><br>* required</span></li>
						</ol>
						</fieldset>
						<div id="ef_contact_msg" style="display:none;"></div>
						<p class="cd-sb"><input type="button" style="margin-left:120px;" name="ef_search_btn" id="ef_sendbutton" class="search_btn" value="Send Now!" onclick="return ef_car_demon_validate()"></p>
				</form>
			</div>
		</div>
	';
	return $x;
}

function get_boulevard_contact_us($post_id) {
	$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
	$main_photo = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post_id ) );
	$vehicle_year = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_year', '','', '', '' )),0);
	$vehicle_make = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_make', '','', '', '' )),0);
	$vehicle_model = rwh(strip_tags(get_the_term_list( $post_id, 'vehicle_model', '','', '', '' )),0);
	$car_head_title = $vehicle_year .' ' . $vehicle_make .' ' . $vehicle_model;
	$vehicle_stock_number = get_post_meta($post_id, "_stock_value", true);
	$link = get_permalink($post_id);
	$x = '
		<div style="width:100%;height:50px;">&nbsp;</div>
		<div style="float:left; width:60%; height:500px; padding:5px;" id="main_email_friend_description">
			<h2 class="fbold attention fs16">'.$car_head_title.'</h2>
			<img src="'. $main_photo .'" title="'.$car_head_title.'" class="boulevard_lightbox_detail_main_photo" />
			<div class="button_box">
				<div class="buttonlink" onclick="open_car_demon_lightbox_photos(\''.$post_id.'\');">
					<img src="'.$car_demon_pluginpath.'images/photo.png" alt="'.$car_head_title.' - View photos">View Photos
				</div>
				<div class="buttonlink" onclick="email_friend(\''.$post_id.'\');">
					<img src="'. $car_demon_pluginpath.'images/email_go.png" alt="'.$car_head_title.' - Email a Friend">Email a Friend
				</div>
				<div class="buttonlink">
					<a class="textLink" href="'.$link.'" target="_top">
						<img src="'.$car_demon_pluginpath.'images/information.png" alt="'.$car_head_title.' - View Details">View Details
					</a>
				</div>
			</div>			
		</div>
		<div style="float:left; width:37%; height:500px;" id="main_email_friend_div_form">
		';
	$x .= car_demon_display_vehicle_contacts($post_id, '', '', '', '');
	$x .= '</div>';
	return $x;
}
?>