<?php
/*
 Plugin Name: BetterPress
 Plugin URI: http://artandthemachine.com/betterpress
 Description: A Plugin for integration of a betterplace.org project
 Version: 0.95.1
 Author: Silas Katzenbach
 Author URI: http://katzenbach.co
 Update Server: http://downloads.wordpress.org/plugin/better-press.zip
 Min WP Version: 3.0
 Max WP Version: 3.6
 License: GPL2
 */
/*
 Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : katzenbach@firemail.de)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License, version 2, as
 published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
require_once 'am_bp_Includes.php';
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '\Template');
 
add_action('init', 'am_bp_init');
add_action('widgets_init', 'registerWidget');

function am_bp_init() {
	load_plugin_textdomain('BetterPress');
	am_bp_debugObject::init(-1);
	am_bp_PluginFunctions::initPluginFunctionsObject();
}

function registerWidget() {
	register_widget("am_bp_Widget");
}
