<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( !function_exists('json_dump') ) {
	
	function json_dump($callback) {
		$ci =& get_instance();
		if ( $ci->input->is_ajax_request() ) {
			header('Content-type: application/json');
			$result = $callback();
			echo json_encode( $result );
		}
	}

}