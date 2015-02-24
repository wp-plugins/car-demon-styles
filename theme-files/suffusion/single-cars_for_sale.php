<?php
/**
 * The Template for displaying all single cars.
 *
 * @package WordPress
 * @subpackage CarDemonStyle
 * @since CarDemonStyle 0.1.3
 */
$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
get_header();
include('suffusion-style-include.php');
include('suffusion-style-single-car.php');
include('suffusion_js.php');
if ( have_posts() ) while ( have_posts() ) : the_post();
	$post_id = get_the_ID();
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
	$car_url = get_permalink($post_id);
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
	$detail_output = '<li><strong>Stock#:</strong> '.$vehicle_stock_number.'</li>';
	$detail_output .= '<li><strong>VIN#:</strong> '.$vehicle_vin.'</li>';
	$detail_output .= '<li><strong>Condition:</strong> '.$vehicle_condition.'</li>';
	$detail_output .= '<li><strong>Mileage:</strong> '.$vehicle_mileage.'</li>';
	$detail_output .= '<li><strong>Color:</strong> '.$vehicle_exterior_color.'/'.$vehicle_interior_color.'</li>';
	$detail_output .= '<li><strong>Transmission:</strong> '.$vehicle_transmission.'</li>';
	$detail_output .= '<li><strong>Engine:</strong> '.$vehicle_engine.'</li>';
	$vehicle_price = get_post_meta($post_id, "_price_value", true);
	$detail_output .= '<li><strong>Price:</strong> $'.$vehicle_price.'</li>';
	$thumbnails = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' =>'image') );
	$cnt = 0;
	$main_guid = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post_id ) );
	$car_js = 'carImg['.$cnt.']="'.trim($main_guid).'";'.chr(13);
	foreach($thumbnails as $thumbnail) {
		$guid = $thumbnail->guid;
		if (!empty($guid)) {
			$cnt = $cnt + 1;
			$car_js .= 'carImg['.$cnt.']="'.trim($guid).'";'.chr(13);
			$photo_array = '<li><img class="car_demon_thumbs" style="cursor:pointer" onClick=\'MM_swapImage("'.$car_title.'_pic","","'.trim($guid).'",1);active_img('.$cnt.')\' src="'.trim($guid).'" width="53" /></li>';
			$this_car .= $photo_array;
		}
	}
	$image_list = get_post_meta($post_id, '_images_value', true);
	$stop = 27;
	$thumbnails = split(",",$image_list);
	$cnt = 0;
	foreach($thumbnails as $thumbnail) {
		$pos = strpos($thumbnail,'.jpg');
		if($pos == true) {
			if ($cnt < $stop) {
				$car_js .= 'carImg['.$cnt.']="'.trim($thumbnail).'";'.chr(13);
				$photo_array = '<img class="suffusion_thumbs" style="cursor:pointer" onClick=\'MM_swapImage("'.$car_title.'_pic","","'.trim($thumbnail).'",1);active_img('.$cnt.');\' src="'.trim($thumbnail).'" width="53" />';
				$this_car .= $photo_array;
				$cnt = $cnt + 1;
			}
		}
	}
	$total_pics = $cnt - 1;
	$car_js = '
		<input type="hidden" id="current_img_num" value="0" />
		<input type="hidden" id="current_img_name" />
		<input type="hidden" id="image_count" value="'.$total_pics.'" />
		<script>
			function photo_img_array() {
				var carImg = new Array;
				'.$car_js.'
				return carImg;
			}
			setInterval(function(){car_slide_show()},3000);
		</script>';
	$this_car = $car_js;
	$content = get_the_content();
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
	$tab_cnt = 1;
	$vin_query = '';
	$about_cnt = 2;
	$content = get_the_content();
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
	if ($_SESSION['car_demon_options']['use_about'] == 'Yes') {
		$about = 1;
		$tab_cnt = $tab_cnt + 1;
	}
	else {
		$about = '';
	}
	if (!empty($_SESSION['car_demon_options']['vinquery_id'])) {
		if ($vehicle_year > 1984) {
			car_demon_get_vin_query($post_id, $vehicle_vin);
		}
	}
	$vin_query_decode_array = get_post_meta($post_id, 'decode_string');
	if (isset($vin_query_decode_array[0])) {
		$vin_query_decode = $vin_query_decode_array[0];
	} else {
		$vin_query_decode = array();
	}
	if (!empty($vin_query_decode['decoded_fuel_economy_city'])) {
		$tab_cnt = $tab_cnt + 5;
		$vin_query = 1;
		$about_cnt = 7;
	}
	else {
		$vin_query = 0;
	}
?>
<div class="car_demon_light_box" id="car_demon_light_box">
	<div class="car_demon_photo_box" id="car_demon_photo_box"">
		<div class="close_light_box" onclick="close_car_demon_lightbox();">(close) X</div>
		<div id="car_demon_light_box_main_email" style="margin-left:80px; margin-top:25px;"></div>
		<div id="car_demon_light_box_main" style="margin-left:80px; margin-top:25px;">
			<img id="car_demon_light_box_main_img" src="" />
			<div class="run_slideshow_div" onclick="car_slide_show();" id="run_slideshow_div">
				<input type="checkbox" id="run_slideshow" /> Run Slideshow
			</div>
			<div class="photo_next" id="photo_next">
				<img src="<?php echo $car_demon_pluginpath; ?>images/btn_next.png" onclick="get_next_img();" title="Next" />
			</div>
			<div class="photo_prev" id="photo_prev">
				<img src="<?php echo $car_demon_pluginpath; ?>images/btn_prev.png" onclick="get_prev_img();" title="Previous" />
			</div>
		</div>
		<div class="hor_lightbox" id="car_demon_thumb_box" style="margin-left:100px;">
			
		</div>
	</div>
</div>

    <div id="main-col">
		<?php suffusion_before_begin_content(); ?>
  	<div id="content">
	<article <?php post_class();?> id="post-<?php the_ID(); ?>">			
<div class="suffusion_car_body" id="tab1">
	<div class="photos">
		<div class="main_photo">
			<img title="<?php echo $car_head_title; ?>" onclick="open_car_demon_lightbox('<?php echo $car_title; ?>_pic');" onerror="ImgError(this, 'no_photo.gif');" id="<?php echo $car_title; ?>_pic" name="<?php echo $car_title; ?>_pic" class="car_demon_main_photo" width="358px" height="271" src="<?php echo $main_guid; ?>">
		</div>
		<div class="photo_thumbs" id="photo_thumbs">
		<?php echo $this_car; ?>
		</div>
	</div>
    <div class="car_description">
		<div class="car_title">
			<?php echo $car_head_title; ?>
		</div>
		<div class="description_left">
			<div class="description_label">Stock #:</div>
			<div class="description_text"><?php echo $vehicle_stock_number;?></div>
			<div class="description_label">Condition:</div>
			<div class="description_text"><?php echo $vehicle_condition;?></div>
			<div class="description_label">Year:</div>
			<div class="description_text"><?php echo $vehicle_year;?></div>
			<div class="description_label">Make:</div>
			<div class="description_text"><?php echo $vehicle_make;?></div>
			<div class="description_label">Model:</div>
			<div class="description_text"><?php echo $vehicle_model;?></div>
			<div class="description_label">Body Style:</div>
			<div class="description_text"><?php echo $vehicle_body_style;?></div>
		</div>
		<div class="description_right">
			<div class="description_label">Transmission:</div>
			<div class="description_text"><?php echo $vehicle_transmission;?></div>
			<div class="description_label">Mileage:</div>
			<div class="description_text"><?php echo $vehicle_mileage;?></div>
			<div class="description_label">Ext. Color:</div>
			<div class="description_text"><?php echo $vehicle_exterior_color;?></div>
			<div class="description_label">Vin Number:</div>
			<div class="description_text_vin"><?php echo $vehicle_vin;?></div>
		</div>
		<div class="price">
			<?php echo get_vehicle_price_style_suffusion($post_id); ?>
		</div>
	</div>
	<div class="car_contact">
		<div class="car_contact_info">
			For Sales Call: <?php echo $contact_sales_name; ?>
			<br />at <?php echo $contact_sales_phone; ?>
		</div>
		<div class="car_contact_buttons">
					<?php if (!empty($contact_finance_url)) { 
							if ($car_contact['finance_popup'] == 'Yes') {
							?>
							<a style="cursor:pointer;" onclick="window.open('<?php echo $contact_finance_url .'?stock_num='.$vehicle_stock_number; ?>&sales_code=<?php echo $car_contact['sales_code']; ?>','finwin','width=<?php echo $car_contact['finance_width']; ?>, height=<?php echo $car_contact['finance_height']; ?>, menubar=0, resizable=0')">
								<img src="<?php echo $car_demon_pluginpath; ?>images/finance-btn.png" /></a>
						<?php
						}
						else {
						?>
							<a href="<?php echo $contact_finance_url .'?stock_num='.$vehicle_stock_number; ?>&sales_code=<?php echo $car_contact['sales_code']; ?>">
								<img src="<?php echo $car_demon_pluginpath; ?>images/finance-btn.png" /></a>
					<?php 
							}
						}
					?>
					<?php
						if (!empty($contact_trade_url)) {
					?>
						<a href="<?php echo $contact_trade_url .'?stock_num='.$vehicle_stock_number; ?>&sales_code=<?php echo $car_contact['sales_code']; ?>">
							<img src="<?php echo $car_demon_pluginpath; ?>images/trade-btn.png" /></a>
					<?php
						}
					?>
		</div>
	</div>
	<div class="tab_container" style="margin-top:10px;">
		<nav id="nav" class="tab fix">
			<ul id="tablist">
				<li onclick="switch_tab('1');" id="tab_title_1" class="tab_inactive"><a>Description</a></li>
				<?php 
				$total_tabs = 1;
				if ($vin_query == 1) { 
					$total_tabs = 6;
					?>
					<li onclick="switch_tab('2');" id="tab_title_2" class="tab_inactive"><a>Specs</a></li>
					<li onclick="switch_tab('3');" id="tab_title_3" class="tab_inactive"><a>Safety</a></li>
					<li onclick="switch_tab('4');" id="tab_title_4" class="tab_inactive"><a>Convenience</a></li>
					<li onclick="switch_tab('5');" id="tab_title_5" class="tab_inactive"><a>Comfort</a></li>
					<li onclick="switch_tab('6');" id="tab_title_6" class="tab_inactive"><a>Entertainment</a></li>
				<?php } ?>
				<?php if ($about == 1) { 
						if ($total_tabs == 1) { $total_tabs = 2; }
						if ($total_tabs == 6) { $total_tabs = 7; }
					?>
					<li onclick="switch_tab('<?php echo $total_tabs; ?>');" id="tab_title_<?php echo $total_tabs; ?>" class="tab_inactive"><a>About</a></li>
				<?php } ?>
			</ul>
		</nav>
	</div>
	<div class="tab_content_area_container">
		<div class="tab_content_area">
			<div class="tab_content active" id="tab_1">
				<?php echo $content; ?>
			</div>
		<?php 
			if ($vin_query == 1) {
			$specs = get_vin_query_specs($vin_query_decode, $vehicle_vin);
			$safety = get_vin_query_safety($vin_query_decode);
			$convienience = get_vin_query_convienience($vin_query_decode);
			$comfort = get_vin_query_comfort($vin_query_decode);
			$entertainment = get_vin_query_entertainment($vin_query_decode);
			?>
			<div class="tab_content tab_inactive_content" id="tab_2">
				<?php echo $specs; ?>
			</div>
			<div class="tab_content tab_inactive_content" id="tab_3">
				<?php echo $safety; ?>
			</div>
			<div class="tab_content tab_inactive_content" id="tab_4">
				<?php echo $convienience; ?>
			</div>
			<div class="tab_content tab_inactive_content" id="tab_5">
				<?php echo $comfort; ?>
			</div>
			<div class="tab_content tab_inactive_content" id="tab_6">
				<?php echo $entertainment; ?>
			</div>
		<?php } ?>
		<?php if ($about == 1) { 
			?>
				<div class="tab_content tab_inactive_content" id="tab_<?php echo $total_tabs;?>">
					<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
						<div id="entry-author-info">
							<?php
							if ($_COOKIE['sales_code']) {
								$user_id = $_COOKIE['sales_code'];
								$user_location = esc_attr( get_the_author_meta( 'user_location', $user_id ) );
								$location_approved = 0;
								if ($vehicle_location == $user_location) {
									$location_approved = 1;
								}
								else {
									$location_approved = esc_attr( get_the_author_meta( 'lead_locations', $user_id ) );
								}
							}
							if ($location_approved == 1) {
								$user_sales_type = 0;
								if ($vehicle_condition == 'New') {
									$user_sales_type = get_the_author_meta('lead_new_cars', $user_id);	
								}
								else {
									$user_sales_type = get_the_author_meta('lead_used_cars', $user_id);		
								}
							}
							if ($user_sales_type == 1) {
								echo build_user_hcard($_COOKIE['sales_code'], 1);
							}
							else {
								echo build_location_hcard($vehicle_location, $vehicle_condition);
							} ?>
						</div><!-- #entry-author-info -->
					<?php endif; ?>
				</div>
		<?php } ?>
		</div>
	</div>
	</article>
<script>
	function switch_tab(num) {
		var total_tabs = <?php echo $total_tabs+1; ?>;
		i = 1;
		while (i<total_tabs) {
			if (i != num) {
				document.getElementById("tab_"+i).style.display = "none";
				document.getElementById("tab_title_"+i).style.background = "#DDE";
			}
			else {
				document.getElementById("tab_"+i).style.display = "inline";
				document.getElementById("tab_title_"+i).style.background = "white";
			}
			i++;
		}
	}
</script>

<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
</div>
<?php get_footer(); ?>