<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi_Izin extends CI_Controller {

	private $m_ki;
	private $user_type;

	function __construct() {
		parent::__construct();
		isnt_adminbaak(function() {
			redirect( base_url('auth/login') );
		});
		$this->load->model('M_KonfirmasiIzin');
		$this->m_ki = $this->M_KonfirmasiIzin;
		if( $this->session->userdata('user_type') == 'admin' ) {
			$this->user_type = 'Admin';
		} else if( $this->session->userdata('user_type') == 'baak' ){
			$this->user_type = 'BAAK';
		}
	}

	public function list_ajax() {
		json_dump(function() {
			$result=$this->m_ki->izin_list_ajax( $this->m_ki->izin_list_all() );
			return array('data' => $result);
		});
	}

	public function index() {
		$data = generate_page('Konfirmasi Izin', 'konfirmasi_izin', $this->user_type);

			$data_content['title_page'] = 'Konfirmasi Izin';
		$data['content'] = $this->load->view('partial/KonfirmasiIzinAdmin/V_KonfirmasiIzinAdmin', $data_content, true);
		$this->load->view('V_KonfirmasiIzin_Admin', $data);
	}

	public function accept($id_izin) {
		$this->m_ki->accept_izin($id_izin);
		$this->session->set_flashdata('msg_alert', 'Pengajuan izin berhasil diaccept');
		redirect( base_url('konfirmasi_izin') );
	}

	public function reject($id_izin) {
		$this->m_ki->reject_izin($id_izin);
		$this->session->set_flashdata('msg_alert', 'Pengajuan izin berhasil direject');
		redirect( base_url('konfirmasi_izin') );
	}

}

/* End of file Konfirmasi_Izin.php */
/* Location: ./application/controllers/Konfirmasi_Izin.php */