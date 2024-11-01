<?php
/*
Plugin Name: Youtube Subscribe Link Locker
Plugin URI: http://subscribetodownload.net/
Description: Convert each downloader of your content into a youtube channel subscriber in a most genuine way.
Version: 1.1
Author: Jasminder Pal Singh (Z-G)
License: GPL
*/
add_action('admin_menu','ytsll_menu');
add_action('admin_init','ytsll_init');
add_action('init','ytsll_show');
add_action('wp_enqueue_scripts','ytsll_loadJs');
add_action('wp_enqueue_scripts', 'ytsll_loadStyle');
add_action('admin_enqueue_scripts', 'ytsll_loadStyleAdmin');


function ytsll_loadStyleAdmin(){
	wp_enqueue_style('ytsll_style_admin',plugins_url('css/admin.css',__FILE__));
	
	}

function ytsll_loadStyle(){
	wp_enqueue_style('ytsll_style',plugins_url('css/style.css',__FILE__));
	
	}


function ytsll_loadJs(){
	wp_enqueue_script('ytsll_js',plugins_url('js/script.js',__FILE__),array('jquery'));
	
	}

function ytsll_menu(){
	add_options_page('Youtube Subscribe Link/Content Locker', 'Youtube Subscribe Link Locker','manage_options','ytsll_settings','ytsll_plugin_options');
}

function ytsll_init(){
	register_setting('ytsll_group','ytsll_dashboardTitle');
	register_setting('ytsll_group','ytsll_numberOfItems');
	}

function ytsll_plugin_options(){
	?>
    <div class="ytsll_wrap">
    <h2>Youtube Subscribe/Content Link Locker</h2>
    <h3 class="yt_msg">1. After <a href="http://subscribetodownload.net/files/userarena/" target="_blank">log In</a> to userpanel , Copy Shortcode from <strong><em>Shortcode for Locked Link</em></strong> column under <em>All Links</em> section below and paste anywhere in posts or pages <br />
    2. You can replace button_image value with your own image url i.e https://subscribetodownload.net/logo.png</h3>
   <h2 class="yt_button"><a href="http://subscribetodownload.net/files/userarena/" target="_blank">Login To Userpanel</a></h2>
   <h4 class="yt_button">Don't have an account ? <a href="http://subscribetodownload.net/trial.php" target="_blank">Sign Up for a Free account.</a></h4>
    </div>
    <?php
	}




function ytsll_show(){
	add_shortcode('ytSubLinkLocker','ytsll_zgIntegrate');
	
	}
function ytsll_zgIntegrate($args,$content){
	$button_img = plugins_url("img/logo.png",__FILE__);
	if($args["button_image"] != $button_img){
		$button_img = $args["button_image"];
		}
	if($args["button_image"] == "default"){
		$button_img = plugins_url("img/logo.png",__FILE__);
		}
	
	$bt_code = '<a href="javascript:(download)" class="ytSubLinkLocker" yt_link="'.esc_attr($args["id"]).'"><img src='.$button_img.'></a>';
	return $bt_code;
	}
	

?>