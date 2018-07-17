<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('assets_url') ) {
	
	function assets_url($path, $cached=true) {
		return base_url( 'assets/' . $path . ((!$cached) ?  '?' . time() : ''));
	}

}

if( !function_exists('uploads_url') ) {
	
	function uploads_url($path, $cached=true) {
		return base_url( 'uploads/' . $path . ((!$cached) ?  '?' . time() : ''));
	}

}