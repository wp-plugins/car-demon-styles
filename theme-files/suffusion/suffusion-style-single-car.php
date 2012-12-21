<?php
	$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
?>
<style>
	.suffusion_car_body {
		padding: 5px;
		clear: both;
		float: left;
		width: 700px;
		font: 14px/1.231 arial,helvetica,clean,sans-serif;
	}
	.tab_content {
		width:640px;
	}
	.photos {
		width:358px;
		float:left;
	}
	.main_photo {
		margin: 3px;
		margin-left:0px;
		clear: both;
		float: left;
		height: 271px;
		width: 358px;
		border:solid;
		border-width:1px;
		border-color:#AAA;
		cursor:pointer;
	}
	.photo_thumbs {
		width: 358px;
		height:65px;
		float:left;
		overflow: auto;
		white-space: nowrap;
	}
	.suffusion_thumbs {
		margin-right:3px;
	}
	.car_title {
		font-size:125%;
		font-weight:bold;
		color:#006699;
		float:left;
		width:100%;
	}
	.car_description {
		margin: 3px;
		margin-left:10px;
		float: left;
		height: 335px;
		width: 315px;
		border:solid;
		border-width:1px;
		border-color:#555;
		padding:3px;
		background-color:#EEE;
	}
	.description_left{
		margin-top: 10px;
		float: left;
		width: 100%;
	}
	.description_right{
		float: left;
		width: 100%;
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
		width: 100%;
		margin-left:1%;
		margin-top:5px;
		padding-left:2%;
	}
	.price_label {
		width: 50%;
		font-size:115%;
		color:#555;
		float:left;
	}
	.price_value {
		width: 50%;
		font-size:115%;
		color:#222;
		float:left;
	}
	.price_line {
		float:left;
		width:90%;
		border-bottom:solid;
		border-bottom-color:#CCCCCC;
		height:1px;
		line-height:1px;
	}
	.final_price_label {
		width: 70%;
		font-size:120%;
		font-weight:bold;
		color:#050;
		float:left;
	}
	.final_price_value {
		width: 70%;
		font-size:140%;
		font-weight:bold;
		color:#96262B;
		float:right;
		text-align:left;
	}
	.car_contact {
		width:680px;
		height:100px;
		background:#EEE;
		border:solid;
		border-width:1px;
		float:left;
		padding:5px;
		margin-top:5px;
	}
	.car_contact_info {
		width:45%;
		float:left;
		font-size:125%;
		font-weight:bold;
		color:#006699;
		padding-top:20px;
		padding-left:5%;
	}
	.car_contact_buttons {
		width:50%;
		float:left;	
		margin-top:20px;
	}
	.tab_container {
		float:left;
		width:692px;
	}
	#tablist {
		padding: 3px 0;
		margin-left: 0;
		border-bottom: 1px solid #778;
		font: bold 12px Verdana, sans-serif;
		margin-bottom:0px;
		margin-top:5px;
	}
	.tab_inactive{
		list-style: none;
		margin: 0;
		display: inline;
		padding: 3px 0.5em;
		margin-left: 3px;
		border: 1px solid #778;
		border-bottom: none;
		background: #DDE;
		text-decoration: none;
		cursor:pointer;
	}
	
	#tablist li:hover {
		color: #000;
		background: #AAE;
		border-color: #227;
	}
	.tab_current {
		list-style: none;
		margin: 0;
		display: inline;
		padding: 3px 0.5em;
		margin-left: 3px;
		border: 1px solid #778;
		text-decoration: none;
		cursor:pointer;
		background: white;
		border-bottom: 1px solid white;
	}
	.tab_content_area_container {
		margin-top:0px;
		margin-left:0px;
		border:solid;
		border-width:1px;
		border-top:none;
		float:left;
		width:690px;
		margin-right:10px;
	}
	.tab_content_area {
		padding:10px;
		float:left;
		width:690px;
	}
	.tab_inactive_content {
		display:none;
	}
	.sidebar-right {
		float:left;
		margin-left:5%;
	}
	#demon-container {
		width:62.5%;
		float:left;
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
	.decode_table {
		width:97% !important;
	}
</style>