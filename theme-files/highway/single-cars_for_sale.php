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
include('highway-style-single-car.php');
?>
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function active_img(cnt) {
   var img = photo_img_array();
   document.getElementById("current_img_num").value = cnt;
   document.getElementById("current_img_name").value = img[cnt];
	var image_count = document.getElementById("image_count").value;
	var num = document.getElementById("current_img_num").value;
	if (image_count == num) {
		document.getElementById("photo_next").style.display = 'none';
	}
	else {
		document.getElementById("photo_next").style.display = 'inline';
	}
	if (num == 0) {
		document.getElementById("photo_prev").style.display = 'none';
	}
	else {
		document.getElementById("photo_prev").style.display = 'inline';
	}
}

function car_slide_show() {
	if (document.getElementById('run_slideshow').checked) {
		var image_count = document.getElementById("image_count").value;
		var num = document.getElementById("current_img_num").value;
		if (image_count == num) {
			active_img(-1);
		}
		get_next_img();
	}
}

function get_next_img() {
	var img = photo_img_array();
	var num = document.getElementById("current_img_num").value;
	num = parseInt(num);
	num = num + 1;
	MM_swapImage("car_demon_light_box_main_img","",img[num],1);
	var image_count = document.getElementById("image_count").value;
	if (image_count == num) {
		document.getElementById("photo_next").style.display = 'none';
	}
	else {
		document.getElementById("photo_next").style.display = 'inline';
	}
	active_img(num);
}

function get_prev_img() {
	var img = photo_img_array();
	var num = document.getElementById("current_img_num").value;
	num = parseInt(num);
	num = num - 1;
	MM_swapImage("car_demon_light_box_main_img","",img[num],1);
	if (num == 0) {
		document.getElementById("photo_prev").style.display = 'none';
	}
	else {
		document.getElementById("photo_prev").style.display = 'inline';
	}
	active_img(num);
}

function car_demon_switch_tabs(active, number, tab_prefix, content_prefix) {
    for (var i=1; i < number+1; i++) {  
      document.getElementById(content_prefix+i).style.display = 'none';  
      document.getElementById(tab_prefix+i).className = 'inactive';  
    }
    document.getElementById(content_prefix+active).style.display = 'block';
    document.getElementById(tab_prefix+active).className = 'active'; 
}
function open_car_demon_lightbox(my_img) {
	jQuery("#car_demon_light_box").lightbox_me({
		overlayCSS: {background: 'black', opacity: .6}
	});
	var num = document.getElementById("current_img_num").value;
	document.getElementById('car_demon_light_box_main_email').style.display = "none";
	if (num == 0) {
		document.getElementById('photo_prev').style.display = "none";
	}
	else {
		document.getElementById('photo_prev').style.display = "inline";
	}
	var image_count = document.getElementById("image_count").value;
	if (image_count == num) {
		document.getElementById("photo_next").style.display = 'none';
	}
	else {
		document.getElementById("photo_next").style.display = 'inline';
	}
	document.getElementById('car_demon_light_box_main_img').style.display = "block";
	document.getElementById('car_demon_thumb_box').style.display = "block";
	document.getElementById('car_demon_photo_box').style.display = "block";
	document.getElementById('run_slideshow_div').style.display = "inline";
	var my_src = jQuery("#"+my_img).attr("src");
	document.getElementById('car_demon_light_box_main_img').src = my_src;
	var box = document.getElementById('car_demon_thumbs').innerHTML;
	var regex = new RegExp(my_img, 'gi');
	var new_box=box.replace(regex,"car_demon_light_box_main_img");
	document.getElementById('car_demon_thumb_box').innerHTML = new_box;
}
function close_car_demon_lightbox() {
	if (document.getElementById('main_email_friend_div')) {
		document.getElementById('main_email_friend_div').innerHTML = "";
		document.getElementById('main_email_friend_div').style.display = "none";
		document.getElementById('car_demon_light_box_main_email').style.display = "none";
	}
	document.getElementById('run_slideshow').checked = false;
	jQuery("#car_demon_light_box").trigger('close');
}
function email_friend() {
	jQuery("#car_demon_light_box").lightbox_me({
		overlayCSS: {background: 'black', opacity: .6}
	});
	document.getElementById('car_demon_light_box_main_email').style.display = "block";
	document.getElementById('car_demon_light_box_main_img').style.display = "none";
	document.getElementById('car_demon_thumb_box').style.display = "none";
	document.getElementById('photo_next').style.display = "none";
	document.getElementById('photo_prev').style.display = "none";
	document.getElementById('run_slideshow_div').style.display = "none";
	document.getElementById('run_slideshow').checked = false;
	document.getElementById('car_demon_photo_box').style.display = "block";
	var box = document.getElementById('email_friend_div').innerHTML;
	var box = box.replace(/email_friend_form_tmp/gi, "email_friend_form");
	var box = box.replace("main_email_friend_div_tmp", "main_email_friend_div");
	var box = box.replace("ef_contact_msg_tmp", "ef_contact_msg");
	var box = box.replace(/_tmp/gi, "");
	document.getElementById('car_demon_light_box_main_email').innerHTML = box;
}
//-----Email a Friend Form Validation Functions
function ef_clearField(fld) {
	if (fld.value == "Your Name") {
		fld.value = "";
	}
	if (fld.value == "Friend Name") {
		fld.value = "";
	}
}
function ef_setField(fld) {
}
function ef_car_demon_validate() {
	var msg = "";
	var name_valid = 0;
	if (email_friend_form.ef_cd_name.value == "") {
		var msg = "You must enter your name.<br />";
		ef_cd_not_valid("ef_cd_name");
	}
	else {
		var name_valid = 1;
	}
	if (email_friend_form.ef_cd_name.value == "Your Name") {
		var msg = "You must enter your name.<br />";
		ef_cd_not_valid("ef_cd_name");
	}
	else {
		if (name_valid == 1) {
			ef_cd_valid("ef_cd_name");
		}
	}
	if (email_friend_form.ef_cd_friend_name.value == "") {
		var msg = msg + "You must enter your friend's name.<br />";
		ef_cd_not_valid("ef_cd_friend_name");
	}
	else {
		var name_valid = 1;
	}
	if (email_friend_form.ef_cd_friend_name.value == "Friend Name") {
		var msg = msg + "You must enter your friend's name.<br />";
		ef_cd_not_valid("ef_cd_friend_name");
	}
	else {
		if (name_valid == 1) {
			ef_cd_valid("ef_cd_friend_name");
		}
	}
	var e_msg = ef_validateEmail(email_friend_form.ef_cd_email, 0);
	if (e_msg == "") {
		ef_cd_valid("ef_cd_email");
	}
	else {
		var msg = msg + e_msg + "<br />";
	}
	var e_msg = ef_validateEmail(email_friend_form.ef_cd_friend_email, 1);
	if (e_msg == "") {
		ef_cd_valid("ef_cd_friend_email");
	}
	else {
		var msg = msg + e_msg + "<br />";
	}
	if (msg != "") {
		document.getElementById("ef_contact_msg").style.display = "block";
		document.getElementById("ef_contact_msg").innerHTML = msg;
		javascript:scroll(0,0);
	}
	else {
		var action = "";
		var your_name = document.getElementById("ef_cd_name").value;
		var your_email = document.getElementById("ef_cd_email").value;
		var friend_name = document.getElementById("ef_cd_friend_name").value;
		var friend_email = document.getElementById("ef_cd_friend_email").value;
		var comment = document.getElementById("ef_comment").value;
		var stock_num = document.getElementById("ef_stock_num").value;
		var form_key = document.getElementById("form_key").value;
		var sending = "<div align='center'><h3>Sending...</h3><img src='<?php echo $car_demon_pluginpath; ?>images/loading.gif' /></div>"
		document.getElementById("main_email_friend_div").innerHTML = sending;
		jQuery.ajax({
			type: 'POST',
			data: {'your_name': your_name, 'your_email':your_email, 'friend_name': friend_name, 'friend_email': friend_email, 'stock_num': stock_num, 'comment':comment, 'form_key': form_key},
			url: "<?php echo $car_demon_pluginpath; ?>forms/car-demon-email-friend-handler.php?send_email=1",
			timeout: 2000,
			error: function ef_() {},
			dataType: "html",
			success: function ef_(html){
				document.getElementById("ef_contact_final_msg").style.display = "block";
				document.getElementById("ef_contact_final_msg").style.background = "#DDDDDD";
				document.getElementById("ef_contact_final_msg").innerHTML = html;
				document.getElementById("main_email_friend_div").style.display = "none";
				javascript:scroll(0,0);
			}
		})
	}
	return false;
}
function ef_cd_not_valid(fld) {
	document.getElementById(fld).style.fontweight = "bold";
	document.getElementById(fld).style.background = "Yellow";
}
function ef_cd_valid(fld) {
	document.getElementById(fld).style.fontweight = "normal";
	document.getElementById(fld).style.background = "#ffffff";
}
function ef_trim(s) {
  return s.replace(/^\s+|\s+$/, '');
}
function ef_validateEmail(fld, msg) {
	var error="";
	var tfld = ef_trim(fld.value);                        // value of field with whitespace trimmed off
	var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
	var illegalChars= /[\(\)\<\>\,\;\:\\"\[\]]/ ;
	if (fld.value == "") {
		fld.style.background = 'Yellow';
		if (msg == 0) {
			error = "You didn't enter an email address.\n";
		}
		else {
			error = "You didn't enter an email address for your friend.\n";
		}
	} else if (!emailFilter.test(tfld)) {              //test email for illegal characters
		fld.style.background = 'Yellow';
		if (msg == 0) {
			error = "Please enter a valid email address.\n";
		}
		else {
			error = "Please enter a valid email address for your friend.\n";
		}
	} else if (fld.value.match(illegalChars)) {
		fld.style.background = 'Yellow';
		if (msg == 0) {
			error = "The email address contains illegal characters.\n";
		}
		else {
			error = "The email address for you friend contains illegal characters.\n";
		}
	} else {
		fld.style.background = 'White';
	}
	return error;
}
jQuery(document).ready(function(){
	jQuery(".side-lift-block ul li span").eq(1).addClass("pactive");
	jQuery(".side-lift-block ul li ul").eq(1).show();
	jQuery(".side-lift-block ul li span").click(function(){
		jQuery(this).next("ul").slideToggle("fast")
		.siblings("ul:visible").slideUp("fast");
		jQuery(this).toggleClass("pactive");
		jQuery(this).siblings("span").removeClass("pactive");
	});

});
function returnPayment_hw() {
	var Principal = document.calc_hw.calc_pr.value;
	var Down_Payment = document.calc_hw.calc_dp.value;
	Principal = Principal - Down_Payment;
	if (document.calc_hw.calc_ir.value==0) {
		var Rate = 0.000000001
	}
	else {
		var Rate = (document.calc_hw.calc_ir.value/100)/12
	}
	var Rate = (document.calc_hw.calc_ir.value/100)/12
	var Term = document.calc_hw.calc_term.value
	document.calc_hw.calc_payment.value ="$" + find_payment_hw(Principal, Rate, Term);
}

function find_payment_hw(PR, IN, PE) {
	var PAY = ((PR * IN) / (1 - Math.pow(1 + IN, -PE)));
	return PAY.toFixed(2);
}
//-->
</script>
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
<?php if ( have_posts() ) while ( have_posts() ) : the_post();
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
//	$detail_output .= '<li><strong>Price:</strong> $'.$vehicle_price.'</li>';
	$detail_output .= get_vehicle_price($post_id);
?>
<div class="highway-body">
<div id="sideBar-left-margin" class="sidebar-left-margin">&nbsp;</div>
<div id="sideBar-left" class="sidebar-left">
		<div class="side-lift-block">
			<ul class="refine-nav">
				<li class="first">
					<span>Specifications</span>
					<ul style="display: none; " class="specs"> 
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
				<li class="">
						<span>Call Us</span>
					<ul style="display: none; " class="specs">
						<li><div class="strong_style_big"><?php echo $contact_sales_name;?> </div><div class="spec_details_big"><?php echo $contact_sales_phone;?></div></li>
					</ul>
				</li>
				<li class="">
					<span>Financing</span>
					<ul style="display: none; " class="specs">
					<?php if (!empty($contact_finance_url)) { 
							if ($car_contact['finance_popup'] == 'Yes') {
							?>
							<p><a onclick="window.open('<?php echo $contact_finance_url .'?stock_num='.$vehicle_stock_number; ?>&sales_code=<?php echo $car_contact['sales_code']; ?>','finwin','width=<?php echo $car_contact['finance_width']; ?>, height=<?php echo $car_contact['finance_height']; ?>, menubar=0, resizable=0')">
								<img src="<?php echo $car_demon_pluginpath; ?>images/finance-btn.png" title="Finance Application" />
							</a></p>
						<?php 
						}
						else {
						?>
							<p><a href="<?php echo $contact_finance_url .'?stock_num='.$vehicle_stock_number; ?>&sales_code=<?php echo $car_contact['sales_code']; ?>">
								<img src="<?php echo $car_demon_pluginpath; ?>images/finance-btn.png" title="Finance Application" />
							</a></p>
					<?php 
							}
						}
					?>
					</ul>
				</li>
				<li class="">
					<span>Trade-In</span>
					<ul style="display: none; " class="specs">
						<?php
							if (!empty($contact_trade_url)) {
						?>
							<p><a href="<?php echo $contact_trade_url .'?stock_num='.$vehicle_stock_number; ?>&sales_code=<?php echo $car_contact['sales_code']; ?>">
								<img src="<?php echo $car_demon_pluginpath; ?>images/trade-btn.png" title="Trade-In Application" />
							</a></p>
						<?php
							}
						?>
					</ul>
				</li>
			</ul>
		</div>		
		<div class="loan-calculator">
			<h3>Financing</h3>
			<form name="calc_hw" class="calculate-form">
				<p><label class="loan-title" for="calc_pr">PURCHASE PRICE:  $</label> 
					<input type="text" size="10" name="calc_pr" value="<?php echo $vehicle_price; ?>" class="l-inputbar" id="calc_pr"></p>
				<p><label class="loan-title" for="calc_dp">DOWN PAYMENT:  $</label>
					<input type="text" size="10" name="calc_dp" id="calc_dp" class="l-inputbar" value="0"></p>
				<p><label class="loan-title" for="calc_ir">INTEREST RATE: %</label>
					<input type="text" size="5" name="calc_ir" id="calc_ir" value="10" class="l-inputbar">    </p>                    
				<p><label class="loan-title" for="calc_term">LOAN TERM: Months   </label>
					<input type="text" size="4" name="calc_term" value="60" id="calc_term" class="l-inputbar">  </p>         
				<p class="calculate-wrapper"><input type="button" name="cmdCalc" value="" class="calculate-btn" onclick="returnPayment_hw();"></p>
				<p><label class="loan-title" for="calc_payment">MONTHLY PAYMENT: $</label>
					<input type="label" size="12" class="l-inputbar" id="calc_payment" name="pmt"></p>
			</form>
    </div>
	<? //php echo car_demon_display_similar_cars($vehicle_body_style, $post_id); ?>
	<br style="clear: both">
</div>
		<div id="demon-container" style="float:left;">
			<div id="demon-content-car" role="main">
<?php
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
	$this_car = '';
	$main_photo = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post_id ) );
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
	$thumbnails = explode(",",$image_list);
	$cnt = 0;
	foreach($thumbnails as $thumbnail) {
		$pos = strpos($thumbnail,'.jpg');
		if($pos == true) {
			if ($cnt < $stop) {
				$car_js .= 'carImg['.$cnt.']="'.trim($thumbnail).'";'.chr(13);
				$photo_array = '<img class="car_demon_thumbs" style="cursor:pointer" onClick=\'MM_swapImage("'.$car_title.'_pic","","'.trim($thumbnail).'",1);active_img('.$cnt.');\' src="'.trim($thumbnail).'" width="62" />';
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
?>
<div class="detail-page-content" style="float:left;">
				<h1><?php echo $car_head_title; ?></h1>
					<ul class="quick-list quick-glance">
						<?php echo $detail_output; ?>
					</ul>
			<div id="gallery_holder" class="big-view">	
				<div id="gallery" class="big-view" style="position: relative; ">					
					<span class="look_close" onclick="open_car_demon_lightbox('<?php echo $car_title; ?>_pic');"></span>
					<div id="main_thumb"><img src="<?php echo $main_photo; ?>" onclick="open_car_demon_lightbox('<?php echo $car_title; ?>_pic');" width="488" class="attachment-gallery" id="<?php echo $car_title; ?>_pic" alt="<?php echo $car_head_title; ?>" title="<?php echo $car_head_title; ?>"></div>
                 </div>
				<div style="clear:both"></div>
			</div>								
			<div style="clear:both"></div>
		</div>
				<div id="demon-post-<?php the_ID(); ?>" style="background-color:#FFFFFF;height:100%;">
<div id="car_features_box" class="car_features_box">
<div style="clear:both"></div>
	<div class="tabs">
			<span class="active-tab active" id="tab_1" onclick="car_demon_switch_tabs(1, <?php echo $tab_cnt;?>, 'tab_', 'content_');">Photos</span>
			<?php if ($vin_query == 1) { ?>
				<span class="inactive" id="tab_2" onclick="javascript:car_demon_switch_tabs(2, <?php echo $tab_cnt;?>, 'tab_', 'content_');">Specs</span>  
				<span class="inactive" id="tab_3" onclick="javascript:car_demon_switch_tabs(3, <?php echo $tab_cnt;?>, 'tab_', 'content_');">Safety</span>
				<span class="inactive" id="tab_4" onclick="javascript:car_demon_switch_tabs(4, <?php echo $tab_cnt;?>, 'tab_', 'content_');">Convenience</span>
				<span class="inactive" id="tab_5" onclick="javascript:car_demon_switch_tabs(5, <?php echo $tab_cnt;?>, 'tab_', 'content_');">Comfort</span>
				<span class="inactive" id="tab_6" onclick="javascript:car_demon_switch_tabs(6, <?php echo $tab_cnt;?>, 'tab_', 'content_');">Entertainment</span>
			<?php } ?>
			<?php if ($about == 1) { ?>
				<span class="inactive" id="tab_<?php echo $about_cnt;?>" onclick="javascript:car_demon_switch_tabs(<?php echo $about_cnt;?>, <?php echo $tab_cnt;?>, 'tab_', 'content_');">About</span>
			<?php } ?>

		<div id="content_1" class="item-list-inactive" style="display:block;"><div style="clear:both"></div>
				<div class="small-view">			
					<ul id="car_demon_thumbs" class="thumbnails">				
						<?php echo $this_car; ?>
					</ul>
					<div style="clear:both"></div>
				</div>
				<?php echo $content; ?>
		</div> 
		<?php if ($vin_query == 1) {
			$specs = get_vin_query_specs($vin_query_decode, $vehicle_vin);
			$safety = get_vin_query_safety($vin_query_decode);
			$convienience = get_vin_query_convienience($vin_query_decode);
			$comfort = get_vin_query_comfort($vin_query_decode);
			$entertainment = get_vin_query_entertainment($vin_query_decode);
			?>
			<div id="content_2" class="item-list-inactive"><div style="clear:both"></div><?php echo $specs; ?></div>
			<div id="content_3" class="item-list-inactive"><div style="clear:both"></div><?php echo $safety; ?></div>  
			<div id="content_4" class="item-list-inactive"><div style="clear:both"></div><?php echo $convienience; ?></div>
			<div id="content_5" class="item-list-inactive"><div style="clear:both"></div><?php echo $comfort; ?></div>
			<div id="content_6" class="item-list-inactive"><div style="clear:both"></div><?php echo $entertainment; ?></div>
		<?php } ?>
		<?php if ($about == 1) { ?>
				<div id="content_<?php echo $about_cnt;?>" class="item-list-inactive" style="display:none;"><div style="clear:both"></div>
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
				</div><!-- #post-## -->
<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
		</div><!-- #container -->
<div id="sidebar-right" class="sidebar-right">
<ul>
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Vehicle Detail Sidebar')) : ?>
	<?php endif; ?>
</ul>
<br style="clear: both">
</div>
</div>
<?php get_footer(); ?>