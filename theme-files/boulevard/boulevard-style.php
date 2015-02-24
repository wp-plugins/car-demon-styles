<?php
	$car_demon_pluginpath = str_replace(str_replace('\\', '/', ABSPATH), get_option('siteurl').'/', str_replace('\\', '/', dirname(__FILE__))).'/';
?>
<style>
	.wp-pagenavi .pages {
		display:none;
	}
	.item0 {
		font-family: Arial, Helvetica, sans-serif;
		border:solid;
		border-width:2px;
		border-color:#003399;
		margin-bottom:3px;
		margin-right:5px;
	}
	.itemphoto {
		cursor:pointer;
	}
	.item0, .item1 {
		padding: 5px 10px 5px 5px;
	}
	.fs11 {
		font-size: 11px;
	}
	.itemcb0, .itemcb1 {
		vertical-align: top;
		text-align: left;
		width: 22px;
		font-size: 11px;
		padding-left: 0px;
	}
	.itemdesctdwidth {
		width: 520px;
		vertical-align: top;
	}
	.attention, a.attention, .attention:visited, a.attention:visited {
		color: #004A9E;
		cursor:pointer;
	}
	.itemphotoinfo0, .itemphotoinfo2 {
		width: 100%;
		font-size: 11px;
	}
	.pricebox0, .pricebox1 {
		vertical-align: top;
		font-size: 12px;
		text-align: right;
		line-height: 20px;
		width:150px;
	}
	.fbold {
		font-weight: bold;
	}
	.pricebox0, .pricebox1 {
		font-size: 12px;
		text-align: right;
		line-height: 20px;
	}
	.pricebox0 a, .pricebox0 a:hover, .pricebox0 a:visited, .pricebox1 a, .pricebox1 a:hover, .pricebox1 a:visited, .pricebox2 a, .pricebox2 a:hover, .pricebox2 a:visited {
		text-decoration: none;
	}
	a.textlink:visited {
		color: black;
	}
	.pricebox0 .p, .pricebox1 .p, .pricebox2 .p, .pricebox2 table .p {
		color: #004A9E;
		font-size: 18px;
		font-weight: bold;
		line-height: 1.2em;
	}
	.itemlinks {
		border-top: 1px dashed #004A9E;
		padding-top: 4px;
	}
	.buttonlink {
		float: left;
		margin-right: 5px;
		margin-top: 4px;
		padding: 2px 5px;
		border: 1px solid #004A9E;
		border-image: initial;
		background-color: #DDD;
		vertical-align: middle;
		white-space: nowrap;
		cursor:pointer;
	}
	.buttonlink a{
		color:#000000;
		text-decoration:none;
	}
	.itemlinks a, .itemlinks a:hover, .itemlinks a:visited {
		text-decoration: none;
		color: black;
	}
	.buttonlink img {
		width: 17px;
		height: 16px;
		border-right: 5px solid #DDD;
		vertical-align: middle;
	}
	.stocknumquotelink {
		width: 180px;
		float: right;
	}
	.stocknumforitem {
		text-align: right;
		line-height: 12px;
		width: 186px;
	}
	.quotelinkforitem {
		float: right;
		text-align: right;
		margin-top: 4px;
		width: 123px;
		height: 24px;
		overflow: hidden;
		white-space: nowrap;
	}
	.itemphotobox0, .itemphotobox2 {
		vertical-align: top;
		width: 113px;
		text-align: center;
		padding-bottom: 4px;
	}
	.iteminfo0, .iteminfo2 {
		vertical-align: top;
		padding: 0px 0px 0px 10px;
		line-height: 13px;
	}
	.iteminfo0 p {
		margin-bottom:0px;
	}
	.itemhistimg {
		vertical-align: top;
		width: 70px;
	}
	div.hexcolorbox {
		margin-right: 5px;
		line-height: 10px;
		height: 10px;
		width: 10px;
	}
	div.hexcolorbox {
		border: 1px solid #004A9E;
		border-image: initial;
	}
	.itemcolort {
		float: left;
		font-weight: bold;
		width: 52px;
		vertical-align: top;
		line-height: 13px;
	}
	.itemcolor {
		float: left;
		vertical-align: top;
		line-height: 13px;
	}
	.itemcolorb {
		float: left;
		margin-top: 1px;
	}
	.fs16 {
		font-size: 16px;
	}
	.fbold {
		font-weight: bold;
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
	.boulevard_thumbs {
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
	.hor_lightbox {
		width: 600px;
		height: 75px;
		overflow: auto;
		white-space: nowrap;
		margin-left: 100px;
	}
	#car_demon_light_box_main_img {
		margin-left: -75px;
	}
	.run_slideshow_div {
		display: none !important;
	}
</style>