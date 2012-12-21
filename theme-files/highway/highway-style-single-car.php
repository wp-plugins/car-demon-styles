<?php
	$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
?>
<style>
.highway-body {
  margin-left: auto;
  margin-right: auto;
}
.sidebar-left-margin {
	width:1.25%;
	max-width:50px;
	min-width:5px;
	height:500px;
	float:left;
}
.detail-page-content {
	margin: 10px 0;
	position: relative;
	width: 488px;
	float: left;
	padding-left: 16px;
}
.detail-page-content h1 {
	font-size: 26px;
	margin-bottom: 10px;
	position: relative;
	width: 468px;
	padding-left: 6px;
	float: left;
}
.quick-glance {
	position: relative;
	overflow: hidden;
}
.quick-list {
	position: relative;
	overflow: hidden;
	min-height: 112px;
	margin-bottom: 6px;
	padding: 10px;
	background: #F7F7F7;
	border: 1px solid white;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	-moz-box-shadow: 0px 0px 1px #929292;
	-webkit-box-shadow: 0px 0px 1px #929292;
	box-shadow: 0px 0px 1px #929292;
	margin-left:0px;
}
.quick-glance li {
	background: url(<?php echo $car_demon_pluginpath; ?>images/arrow.png) left center no-repeat;
	padding: 0 0 2px 20px;
	margin: 5px 0;
}
.quick-list li {
	float: left;
	position: relative;
	overflow: hidden;
	width: 170px;
	padding: 5px 0px 0px 18px;
	margin: 0px 0px 0 4px;
	font-size: 12px;
}
#gallery_holder {
	position: relative;
	width: 490px;
	margin-top: 16px;
}
.detail-page-content .big-view {
	margin: 0 0 16px 0;
	line-height: 0px;
	padding-left: 2px;
	background: none;
	width: 487px;
	height: 366px;
}
.detail-page-content .big-view {
	margin: 0 0 16px 0;
	line-height: 0px;
	padding-left: 2px;
	background: none;
	width: 487px;
	height: 366px;
}
.detail-page-content .big-view img {
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	-moz-box-shadow: 0px 2px 4px #929292;
	-webkit-box-shadow: 0px 2px 4px #929292;
	box-shadow: 0px 1px 4px #929292;
}
span.look_close:hover {
	opacity: .7;
	-o-transition-duration: 0.5s;
	-moz-transition-duration: 0.5s;
	-webkit-transition: opacity 0.5s;
	-webkit-box-shadow: 0px 0px 4px black;
	-moz-box-shadow: 0px 0px 4px #000;
	box-shadow: 0px 0px 4px black;
}
span.look_close {
	opacity: 0;
	-o-transition-duration: 0.5s;
	-moz-transition-duration: 0.5s;
	-webkit-transition: opacity 0.5s;
	background: url(<?php echo $car_demon_pluginpath; ?>images/look_close.png) center center no-repeat #555;
	cursor: pointer;
	height: 366px;
	width: 488px;
	position: absolute;
	z-index: 10;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
}
.car_demon_thumbs {
	float:left;
	vertical-align: top;
	cursor: pointer;
	margin: 0px 4px 8px 3px;
	height: 50px;
	width: 62px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	-moz-box-shadow: 0px 0px 4px #929292;
	-webkit-box-shadow: 0px 0px 4px #929292;
	box-shadow: 0px 0px 4px #929292;
}
.hor_lightbox .car_demon_thumbs {
	float:none;
}
.tabs {
	margin: 4px 0px 20px 10px;
}
.active {
	z-index: 86;
	background: #FAFAFA;
	-moz-box-shadow: 0px 0px 4px #929292;
	-webkit-box-shadow: 0px 0px 4px #929292;
	box-shadow: 0px -2px 2px #929292;
	width: 76px;
	margin: 0px 2px -1px 0px;
	-webkit-border-top-left-radius: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	font-size:10px;
}
.tabs span {
	color: #323B3D;
	display: inline-block;
	height: 34px;
	line-height: 34px;
	text-align: center;
	vertical-align: bottom;
	cursor: pointer;
	position: relative;
	margin-right: 2px;
}
.inactive {
	background: #DDD;
	width: 76px;
	margin: 0px 2px -1px 0px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	font-size:10px;
	z-index: 46;
}
.item-list-inactive {
	padding-top:5px;
	padding-left:5px;
	display:none;
	background: #FAFAFA;
	position: relative;
	width: 490px;
	z-index: 50;
	border-top-left-radius: 0px;
	border-top-right-radius: 5px;
	-moz-border-radius-topleft: 0px;
	-moz-border-radius-topright: 5px;
	border-bottom-left-radius: 5px;
	border-bottom-right-radius: 5px;
	-moz-border-radius-bottomleft: 0px;
	-moz-border-radius-bottomright: 5px;
	-moz-box-shadow: 0px 0px 4px #929292;
	-webkit-box-shadow: 0px 0px 4px #929292;
	box-shadow: 0px 0px 4px #929292;
	min-height:150px;
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
.run_slideshow_div {
	position:absolute;
	color:#CCCCCC;
	font-weight:bold;
	top:12px; 
	left:615px;
}
.hor_lightbox {
	width:600px;
	height:75px;
	overflow:auto;
	white-space: nowrap;
}
.sidebar-left {
	float: left;
	width: 200px;
	max-width:100%;
	padding-top: 10px;
	position: relative;
	z-index: 520;
	margin-left:-30px;
}
.sidebar-right {
	float: left;
	width: 230px;
	padding-top: 10px;
	position: relative;
	z-index: 520;
	margin-left:-25px;
	margin-right:0px;
}
/*========================================================================================*/
.refine-nav {
	position: relative;
	overflow: hidden;
	padding-left: 8px;
	font-size:10px;
}
.refine-nav li {
	cursor: pointer;
	list-style:none;
}
.refine-nav li.first span {
	border: none;
}
.refine-nav li span {
	background: url(<?php echo $car_demon_pluginpath; ?>images/expandable-icon.png) right center no-repeat;
	display: inline-block;
	height: 52px;
	line-height: 52px;
	border-top: 1px dotted #929292;
	width: 166px;
	text-transform: uppercase;
}
.pactive {
	background: url(<?php echo $car_demon_pluginpath; ?>images/expanded-icon.png) right center no-repeat !important;
}

.refine-nav li ul {
	margin: 0 0 12px 0;
}
.refine-nav li ul li {
	color: black;
	text-decoration: none;
	line-height: 24px;
}
/*======================================================================================*/
.loan-calculator {
	background: url(<?php echo $car_demon_pluginpath; ?>images/loan-form-bg.png) left top no-repeat;
	height: 365px;
	width: 166px;
	padding: 22px 13px 22px 13px;
	color: white;
	text-align: right;
	margin-left:40px;
}
.loan-calculator h3 {
	text-align: left;
	margin-bottom: 20px;
	border-bottom: 1px dotted #8EB6CC;
	padding: 0px 0px 10px 0;
}
.calculate-form p {
	height: 32px;
	line-height: 22px;
	margin: 0 0 12px 0;
	font-size: 12px;
}
.calculate-form .loan-title {
	float: left;
	vertical-align: middle;
	font-size: 12px;
}
.calculate-form .l-inputbar {
	background: url(<?php echo $car_demon_pluginpath; ?>images/result-formbar-bg.png) left top no-repeat;
	height: 22px;
	width: 70px;
	border: none;
	padding-left: 3px;
	margin-right: 15px;
}
.calculate-form .calculate-wrapper {
	height: 26px;
	line-height: 26px;
	margin-top: 24px;
	margin-left: -20px;
	text-align: center;
}
.calculate-form .calculate-btn {
	background: url(<?php echo $car_demon_pluginpath; ?>images/calculate-btn.png) left top no-repeat;
	border: none;
	height: 26px;
	width: 99px;
	cursor: pointer;
}
/*=================================================================================================*/
.random_widget_image_style {
	min-width: 130px !important;
	margin-left: 15px;
	margin-right: 0px;
	margin-bottom: 0px;
	border: solid;
	border-width: 1px;
	border-color: gray;
	padding: 3px;
	border-radius: 3px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-box-shadow: 0 0 5px rgba(0,0,0, .3);
	-webkit-box-shadow: 0 0 5px rgba(0, 0, 0, .3);
	box-shadow: 0 0 5px rgba(0, 0, 0, .3);
}
.strong_style {
	font-weight: bold;
	width:75px;
	float:left;
	height:24px;
}
.spec_details {
	width:75px;
	float:left;
	height:24px;
}
.strong_style_big {
	font-weight: bold;
	width:100%;
	float:left;
	height:24px;
	font-size:24px;
}
.spec_details_big {
	width:100%;
	float:left;
	height:24px;
	font-size:22px;
}
.specs li {
	list-style:none;
}
span.banner-used {
	background: url(<?php echo $car_demon_pluginpath; ?>images/banner-used.png) left top no-repeat;
	display: inline-block;
	position: absolute;
	top: -2px;
	left: -2px;
	height: 93px;
	width: 93px;
	z-index: 500;
}
span.banner-new {
	background: url(<?php echo $car_demon_pluginpath; ?>images/banner-new.png) left top no-repeat;
	display: inline-block;
	position: absolute;
	top: -2px;
	left: -2px;
	height: 93px;
	width: 93px;
	z-index: 500;
}
span.banner-low-price {
	background: url(<?php echo $car_demon_pluginpath; ?>images/banner-low-price.png) left top no-repeat;
	display: inline-block;
	position: absolute;
	top: -2px;
	left: -2px;
	height: 93px;
	width: 93px;
	z-index: 500;
}
span.banner-just-added {
	background: url(<?php echo $car_demon_pluginpath; ?>images/banner-just-added.png) left top no-repeat;
	display: inline-block;
	position: absolute;
	top: -2px;
	left: -2px;
	height: 93px;
	width: 93px;
	z-index: 500;
}
span.banner-low-miles {
	background: url(<?php echo $car_demon_pluginpath; ?>images/banner-low-miles.png) left top no-repeat;
	display: inline-block;
	position: absolute;
	top: -2px;
	left: -2px;
	height: 93px;
	width: 93px;
	z-index: 500;
}
span.banner-great-deal {
	background: url(<?php echo $car_demon_pluginpath; ?>images/banner-great-deal.png) left top no-repeat;
	display: inline-block;
	position: absolute;
	top: -2px;
	left: -2px;
	height: 93px;
	width: 93px;
	z-index: 500;
}
</style>