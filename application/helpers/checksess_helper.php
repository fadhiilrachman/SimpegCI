<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('isnt_admin') ) {
	
	function isnt_admin($callback) {
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'admin') {
			$callback();
		}
	}

}

if( !function_exists('isnt_baak') ) {
	
	function isnt_baak($callback) {
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'baak') {
			$callback();
		}
	}

}

if( !function_exists('isnt_pegawai') ) {
	
	function isnt_pegawai($callback) {
		$ci =& get_instance();
		if ( $ci->session->userdata('user_type') !== 'pegawai') {
			$callback();
		}
	}

}