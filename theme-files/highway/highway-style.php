<?php
	$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
?>
<style>
	.wp-pagenavi .pages {
		display:none;
	}
	.random {
		background: white url(<?php echo $car_demon_pluginpath; ?>images/sidebar-top-bg.png) center top repeat-x;
		border: 1px solid white;
		position: relative;
		overflow: hidden;
		padding: 5px;
		margin-bottom: 10px;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
		border-radius: 10px;
		-moz-box-shadow: 0px 1px 2px #929292;
		-webkit-box-shadow: 0px 1px 2px #929292;
		box-shadow: 0px 1px 2px #929292;
		max-width:600px;
		width:100%;
	}
	a:active, a:visited {
		color: #607890;
	}
	a {
		text-decoration: none;
	}
	.random .result-detail-wrapper {
		margin-top: 12px;
	}
	.random img {
		float: left;
		position: relative;
		display: inline-block;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
		margin-right: 12px;
		z-index: 197;
		box-shadow: 1px 1px 3px grey;
		-moz-box-shadow: 1px 1px 3px grey;
		-webkit-box-shadow: 1px 1px 3px grey;
	}
	.random .result-detail-wrapper p {
		font: 12px Arial, Helvetica, "Trebuchet MS", sans-serif;
		line-height: 18px;
	}
	.random .result-detail-wrapper .result-price {
		color: #036DA7!important;
		font-weight: bold;
		font: 16px Arial, Helvetica, "Trebuchet MS", sans-serif;
		margin-bottom:0px;
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
	.detail_btn {
		-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
		-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
		box-shadow:inset 0px 1px 0px 0px #ffffff;
		background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f9f9f9), color-stop(1, #e9e9e9) );
		background:-moz-linear-gradient( center top, #f9f9f9 5%, #e9e9e9 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f9f9f9', endColorstr='#e9e9e9');
		background-color:#f9f9f9;
		-moz-border-radius:6px;
		-webkit-border-radius:6px;
		border-radius:6px;
		border:1px solid #dcdcdc;
		display:inline-block;
		color:#666666;
		font-family:arial;
		font-size:15px;
		font-weight:bold;
		padding:6px 24px;
		text-decoration:none;
		text-shadow:1px 1px 0px #ffffff;
		float:right;
	}
	.detail_btn:hover {
		background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #e9e9e9), color-stop(1, #f9f9f9) );
		background:-moz-linear-gradient( center top, #e9e9e9 5%, #f9f9f9 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e9e9e9', endColorstr='#f9f9f9');
		background-color:#e9e9e9;
	}
	.detail_btn:active {
		position:relative;
		top:1px;
	}
	.text_compare_style {
		float:right;
	}
	.car_price_details_style {
		float:right;
		max-width:600px;
	}
	.car_selling_price_style {
		float:left;
		max-width:150px;
		margin-left:3px;
		font-size:12px;
		font-weight:bold;
		color:#666666;
	}
	.car_rebate_style {
		float:left;
		max-width:150px;
		margin-left:3px;
		font-size:12px;
		font-weight:bold;
		color:#00CC33;
		margin-left:8px;
	}
	.car_dealer_discounts_style {
		float:left;
		max-width:150px;
		margin-left:3px;
		font-size:12px;
		font-weight:bold;
		color:#FF0000;
		margin-left:8px;
	}
	.car_retail_price_style {
		float:left;
		max-width:150px;
		margin-left:3px;
		font-size:12px;
		margin-left:8px;
	}
	.car_your_price_style {
		float:left;
		max-width:150px;
		margin-left:3px;
		font-size:16px;
		font-weight:bold;
		margin-left:8px;
	}
	.car_final_price_style {
		float:left;
		max-width:150px;
		margin-left:3px;
		font-size:16px;
		font-weight:bold;
	}
</style>