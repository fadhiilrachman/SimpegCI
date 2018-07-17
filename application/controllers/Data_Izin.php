<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Izin extends CI_Controller {

	private $m_dataizin;

	function __construct() {
		parent::__construct();
		isnt_admin(function() {
			redirect( base_url('auth/logout') );
		});
		$this->load->model('M_DataIzin');
		$this->m_dataizin = $this->M_DataIzin;
	}

	public function index() {
		
	}

	public function cuti() {
		
	}

	public function sekolah() {
		
	}

	public function seminar() {
		
	}

}

/* End of file Data_Izin.php */
/* Location: ./application/controllers/Data_Izin.php */