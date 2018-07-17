<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $m_dashboard;

	function __construct() {
		parent::__construct();
		$this->load->model('M_Dashboard');
		$this->m_dashboard = $this->M_Dashboard;
	}

	public function index() {
		switch ( $this->session->userdata('user_type') ) {
			case 'admin':
				$data = generate_page('Dashboard', 'dashboard', 'Admin');
				$this->load->view('V_Dashboard_Admin', $data);
				break;
			case 'pegawai':
				$data = generate_page('Dashboard', 'dashboard', 'Pegawai');
				$this->load->view('V_Dashboard_Pegawai', $data);
				break;
			
			default:
				# code...
				break;
		}
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */