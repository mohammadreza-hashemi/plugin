<?php
/**
 * @package wltickeer
 * @version 1.7.2
 */
/*
Plugin Name: wlticker
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.7.2
Author URI: http://ma.tt/
*/
define('wlticker_plugin_name', 'wlticker');

require_once 'classes/class.php';

global $wlticker;
$wlticker = new WLTICKER();

