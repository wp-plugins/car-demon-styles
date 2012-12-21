<?php
$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
$car_demon_pluginpath_actual = str_replace('car-demon-styles/theme-files/boulevard/','car-demon/theme-files/',$car_demon_pluginpath);
?>
<style>
	.boulevard_lightbox_detail_main_photo {
		float:left;
		width:400px;
		height:320px;
		margin:5px;
		border:solid;
		border-width:2px;
		border-color:#003399;
	}
	#car_demon_light_box_details {
		width:740px;
		height:570px;
		overflow:auto;
		background:#CCCCCC;
	}
	.car_demon_photo_box {
		display:none;
		background:#000000;
		width:800px;
		height:600px;		
		padding: 9px;
		border: 3px solid gray;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
		border-radius: 10px;
		-moz-box-shadow: 0 0 5px rgba(0,0,0, .3);
		-webkit-box-shadow: 0 0 5px 
		rgba(0, 0, 0, .3);
		box-shadow: 0 0 5px 
		rgba(0, 0, 0, .3);
	}
	.close_light_box {
		position:absolute;
		margin-left:740px;
		color:#CCCCCC;
		font-family:Arial, Helvetica, sans-serif;
		font-weight:bold;
		cursor:pointer;
	}
	.run_slideshow_div {
		position:absolute;
		color:#CCCCCC;
		font-weight:bold;
		top:12px; 
		left:615px;
	}
	.photo_next {
		cursor:pointer;
		position:absolute; 
		top:465px; 
		left:715px;
	}
	.photo_next:hover {
		top:467px;
		left:717px
	}
	.photo_prev {
		cursor:pointer;
		position:absolute; 
		top:465px; 
		left:55px;
	}
	.photo_prev:hover {
		top:467px;
		left:57px
	}
	.fin_specs {
		float:left;
	}
	.trade_specs {
		float:left;
	}
	.specs {
		font-size:12px;
	}
	.refine-nav li {
		list-style:none;
		width:290px;
		float:left;
	}
	.strong_style {
		float:left;
		width:40%;
	}
	.spec_details {
		float:left;
		width:50%;
	}
	.boulevard_description {
		width:690px;
		height:170px;
		border:solid;
		border-width:2px;
		border-color:#003399;
		float:left;
		margin-left:20px;
		overflow:auto;
		padding:5px;
	}
	.button_box {
		margin-left:10px;
		margin-top:5px;
		margin-bottom:5px;
		float:left;
		width:90%;
	}
</style>
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
function photo_img_array() {
	var carImg = new Array;
	var imgArrayList = document.getElementById("current_img_array").value;
	var imgArray = imgArrayList.split(",");
	carImg = imgArray;
	return carImg;
}
setInterval(function(){car_slide_show()},3000);

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
function open_car_demon_lightbox_details(post_id) {
	jQuery("#car_demon_light_box").trigger('close');
	jQuery("#car_demon_light_box").lightbox_me({
		overlayCSS: {background: 'black', opacity: .6}
	});
	var loading = "<img style='margin-top: 175px; margin-left:275px;' src='<?php echo $car_demon_pluginpath; ?>images/loading.gif' />";
	document.getElementById('car_demon_light_box_details').style.display = "block";
	document.getElementById('car_demon_light_box_details').innerHTML = loading;
	document.getElementById('car_demon_photo_box').style.display = "block";
	document.getElementById('car_demon_light_box_main_email').style.display = "none";
	document.getElementById('car_demon_light_box_main_img').style.display = "none";
	document.getElementById('car_demon_thumb_box').style.display = "none";
	document.getElementById('photo_next').style.display = "none";
	document.getElementById('photo_prev').style.display = "none";
	document.getElementById('run_slideshow_div').style.display = "none";
	document.getElementById('run_slideshow').checked = false;
	jQuery.ajax({
		type: 'POST',
		data: {'post_id': post_id},
		url: "<?php echo $car_demon_pluginpath; ?>boulevard_lightbox_handler.php?action=get_details",
		timeout: 5000,
		error: function ef_() {},
		dataType: "html",
		success: function ef_(html){
			document.getElementById('car_demon_light_box_details').innerHTML = html;
		}
	})
}
function open_car_demon_lightbox_photos(post_id) {
	jQuery("#car_demon_light_box").trigger('close');
	jQuery("#car_demon_light_box").lightbox_me({
		overlayCSS: {background: 'black', opacity: .6}
	});
	var loading = "<img style='margin-top: 175px; margin-left:275px;' src='<?php echo $car_demon_pluginpath; ?>images/loading.gif' />";
	document.getElementById('car_demon_light_box_main_img').style.display = "none";
	document.getElementById('car_demon_light_box_details').style.display = "block";
	document.getElementById('car_demon_light_box_details').innerHTML = loading;
	document.getElementById('car_demon_photo_box').style.display = "block";
	document.getElementById('car_demon_light_box_main_email').style.display = "none";
	document.getElementById('car_demon_light_box_main_img').style.display = "none";
	document.getElementById('car_demon_thumb_box').style.display = "none";
	document.getElementById('photo_next').style.display = "inline";
	document.getElementById('photo_prev').style.display = "none";
	document.getElementById('run_slideshow').checked = false;
	document.getElementById('car_demon_light_box_main_img').style.display = "block";
	document.getElementById('car_demon_thumb_box').style.display = "block";
	document.getElementById('car_demon_photo_box').style.display = "block";
	document.getElementById('run_slideshow_div').style.display = "inline";
	jQuery.ajax({
		type: 'POST',
		data: {'post_id': post_id},
		url: "<?php echo $car_demon_pluginpath; ?>boulevard_lightbox_handler.php?action=get_main_photo",
		timeout: 5000,
		error: function ef_() {},
		dataType: "html",
		success: function ef_(html){
			document.getElementById('car_demon_light_box_details').style.display = "none";
			document.getElementById('car_demon_light_box_main_img').style.display = "inline";
			document.getElementById('car_demon_light_box_main_img').src = html;
		}
	})
	jQuery.ajax({
		type: 'POST',
		data: {'post_id': post_id},
		url: "<?php echo $car_demon_pluginpath; ?>boulevard_lightbox_handler.php?action=get_photo_thumbs",
		timeout: 5000,
		error: function ef_() {},
		dataType: "html",
		success: function ef_(html){
			document.getElementById('car_demon_thumb_box').innerHTML = html;
		}
	})
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
function email_friend(post_id) {
	jQuery("#car_demon_light_box").trigger('close');
	jQuery("#car_demon_light_box").lightbox_me({
		overlayCSS: {background: 'black', opacity: .6}
	});
	document.getElementById('car_demon_light_box_details').style.display = "block";
	var loading = "<img style='margin-top: 175px; margin-left:275px;' src='<?php echo $car_demon_pluginpath; ?>images/loading.gif' />";
	document.getElementById('car_demon_light_box_details').innerHTML = loading;
	document.getElementById('car_demon_light_box_main_email').style.display = "block";
	document.getElementById('car_demon_light_box_main_img').style.display = "none";
	document.getElementById('car_demon_thumb_box').style.display = "none";
	document.getElementById('photo_next').style.display = "none";
	document.getElementById('photo_prev').style.display = "none";
	document.getElementById('run_slideshow_div').style.display = "none";
	document.getElementById('run_slideshow').checked = false;
	document.getElementById('car_demon_photo_box').style.display = "block";
	jQuery.ajax({
		type: 'POST',
		data: {'post_id': post_id},
		url: "<?php echo $car_demon_pluginpath; ?>boulevard_lightbox_handler.php?action=email_friend",
		timeout: 5000,
		error: function ef_() {},
		dataType: "html",
		success: function ef_(html){
			document.getElementById('car_demon_light_box_details').style.display = "block";
			document.getElementById('car_demon_light_box_details').innerHTML = html;
		}
	})
}
function open_contact_us(post_id) {
	jQuery("#car_demon_light_box").trigger('close');
	jQuery("#car_demon_light_box").lightbox_me({
		overlayCSS: {background: 'black', opacity: .6}
	});
	document.getElementById('car_demon_light_box_details').style.display = "block";
	var loading = "<img style='margin-top: 175px; margin-left:275px;' src='<?php echo $car_demon_pluginpath; ?>images/loading.gif' />";
	document.getElementById('car_demon_light_box_details').innerHTML = loading;
	document.getElementById('car_demon_light_box_main_email').style.display = "block";
	document.getElementById('car_demon_light_box_main_img').style.display = "none";
	document.getElementById('car_demon_thumb_box').style.display = "none";
	document.getElementById('photo_next').style.display = "none";
	document.getElementById('photo_prev').style.display = "none";
	document.getElementById('run_slideshow_div').style.display = "none";
	document.getElementById('run_slideshow').checked = false;
	document.getElementById('car_demon_photo_box').style.display = "block";
	jQuery.ajax({
		type: 'POST',
		data: {'post_id': post_id},
		url: "<?php echo $car_demon_pluginpath; ?>boulevard_lightbox_handler.php?action=contact_us",
		timeout: 5000,
		error: function ef_() {},
		dataType: "html",
		success: function ef_(html){
			document.getElementById('car_demon_light_box_details').style.display = "block";
			document.getElementById('car_demon_light_box_details').innerHTML = html;
		}
	})
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
			url: "<?php echo $car_demon_pluginpath_actual; ?>forms/car-demon-email-friend-handler.php?send_email=1",
			timeout: 5000,
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
//-->
</script>
<?php
	$post_id = '';
	$list_phone = '';
	$cc = '';
	$send_receipt = '';
	$send_receipt_msg = '';
	echo car_demon_display_vehicle_contacts_js($post_id, $list_phone, $cc, $send_receipt, $send_receipt_msg);
?>
<div class="car_demon_light_box" id="car_demon_light_box">
	<div class="car_demon_photo_box" id="car_demon_photo_box"">
		<div class="close_light_box" onclick="close_car_demon_lightbox();">(close) X</div>
		<div id="car_demon_light_box_main_email" style="margin-left:80px; margin-top:25px;"></div>
		<div id="car_demon_light_box_details" style="margin-left:30px; margin-top:25px;"></div>
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