<?php
	$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
?>
<style>
	.wp-pagenavi .pages {
		display:none;
	}
	.car_item{
		clear: both;
		float: left;
		width: 600px;

		font: 13px/1.231 arial,helvetica,clean,sans-serif;
		padding:1%;
		
		background-color: white;
		border-bottom: 2px solid #CCC;
		-moz-border-radius: 5px;
		border-radius: 5px;
		margin: 0 0 2em;

		position: relative;
		width: auto;
	}
	.main_photo {
		float: left;
		height: 83px;
		width: 20%;
		text-align:center;
	}
	.photo_thumb {
		width:110px;
		height:83px;
	}
	.car_title {
		font-size:125%;
		font-weight:bold;
		color:#006699;
		float:left;
		width:50%;
	}
	.description {
		float: left;
		width: 55%;
		font-size:85%;
	}
	.description_left{
		float: left;
		width: 50%;
	}
	.description_right{
		float: left;
		width: 50%;
	}
	.description_label {
		float: left;
		width: 50%;
	}
	.description_text {
		float: left;
		width: 50%;
	}
	.description_text_vin {
		float: left;
		width:100%;
		text-align:right;
	}
	.price {
		float: left;
		width: 23%;
		padding-left:2%;
	}
	.price_label {
		width: 50%;
		font-size:85%;
		color:#555;
		float:left;
	}
	.price_value {
		width: 50%;
		font-size:95%;
		color:#222;
		float:left;
	}
	.price_line {
		float:left;
		width:100%;
		border-bottom:solid;
		border-bottom-color:#CCCCCC;
		height:1px;
		line-height:1px;
	}
	.final_price_label {
		width: 70%;
		font-size:100%;
		font-weight:bold;
		color:#050;
		float:left;
	}
	.final_price_value {
		width: 70%;
		font-size:120%;
		font-weight:bold;
		color:#96262B;
		float:right;
		text-align:right;
	}
	.compare {
		float:right;
		width:20%;
	}
	.compare_label {
		float:left;
		font-size:85%;
		width:50%;
		text-align:left;
		margin-top:4px;
	}
	.compare_input {
		float:left;
		text-align:right;
		width:48%;
		padding-right:2px;
	}
	.no_price_style {
		font-size:135%;
		float:left;
	}
</style>