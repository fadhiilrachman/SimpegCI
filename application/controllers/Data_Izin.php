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
		$data = generate_page('Data Izin Cuti', 'data_izin/cuti', 'Admin');

			$data_content['title_page'] = 'Data Izin Cuti';
			$data_content['list_all'] = $this->m_dataizin->cuti_list_all();
		$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzinCuti_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function sekolah() {
		$data = generate_page('Data Izin Cuti', 'data_izin/sekolah', 'Admin');

			$data_content['title_page'] = 'Data Izin Sekolah';
			$data_content['list_all'] = $this->m_dataizin->sekolah_list_all();
		$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzinSekolah_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function seminar() {
		$data = generate_page('Data Izin Seminar', 'data_izin/seminar', 'Admin');

			$data_content['title_page'] = 'Data Izin Seminar';
			$data_content['list_all'] = $this->m_dataizin->seminar_list_all();
		$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzinSeminar_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

}

/* End of file Data_Izin.php */
/* Location: ./application/controllers/Data_Izin.php */