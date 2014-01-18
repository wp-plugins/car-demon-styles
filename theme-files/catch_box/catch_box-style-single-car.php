<?php
	$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
?>
<style>
	.catch_box_car_body {
		padding: 5px;
		clear: both;
		float: left;
		width: 700px;
		font: 14px/1.231 arial,helvetica,clean,sans-serif;
	}
	.tab_content {
		width:590px;
	}
	.photos {
		width:358px;
		float:left;
		margin-top: -8px;
	}
	.main_photo {
		margin: 3px;
		margin-left:0px;
		clear: both;
		float: left;
		height: 271px;
		width: 358px;
		cursor:pointer;
	}
	.main_photo img {
		border-bottom: 2px solid #CCC;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}
	.photo_thumbs {
		width: 358px;
		height:65px;
		float:left;
		overflow: auto;
		white-space: nowrap;
	}
	.catch_box_thumbs {
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
		margin-left:10px;
		float: left;
		min-height: 320px;
		max-width: 205px;
		background-color: white;
		border-bottom: 2px solid #CCC;
		-moz-border-radius: 5px;
		border-radius: 5px;
		margin-bottom: 2em;
		padding: 0.5em 1em 1em;	
		margin-top: -5px;
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
		width:590px;
		height:100px;
		float:left;
		padding:5px;
		margin-top:5px;		
		background-color: white;
		border-bottom: 2px solid #CCC;
		-moz-border-radius: 5px;
		border-radius: 5px;
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
		width:40%;
		float:left;	
		margin-top:1%;
		margin-left:10%;
	}
	.tab_container {
		float:left;
		width:592px;
	}
	#tablist {
		padding: 3px 0;
		margin-left: 0;
		font: bold 12px Verdana, sans-serif;
		margin-bottom:0px;
		margin-top:5px;
	}
	.tab_active{
		background: #FFFFFF !important;
	}
	.tab_inactive{
		list-style: none;
		margin: 0;
		display: inline;
		padding: 3px 0.5em;
		margin-left: 3px;
		border: 1px solid #CCC;
		border-bottom: none;
		background: #DDE;
		text-decoration: none;
		cursor:pointer;
		-moz-border-top-left-radius: 5px;
		-moz-border-top-right-radius: 5px;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
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
		border-top:none;
		float:left;
		width:600px;
		margin-right:10px;
		background-color:#FFFFFF;
		border-bottom: 2px solid #CCC;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}
	.tab_content_area {
		padding:10px;
		float:left;
		width:590px;
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