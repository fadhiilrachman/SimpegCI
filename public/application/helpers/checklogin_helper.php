<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('is_login') ) {
	
	function is_login($callback) {
		$ci =& get_instance();
		if ( $ci->session->userdata('is_logged_in')) {
			$callback();
		}
	}

}

if( !function_exists('isnt_login') ) {
	
	function isnt_login($callback) {
		$ci =& get_instance();
		if ( !$ci->session->userdata('is_logged_in')) {
			$callback();
		}
	}

}