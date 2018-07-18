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

	public function index() {
		
	}

	public function cuti() {
		$data = generate_page('Konfirmasi Izin Cuti', 'konfirmasi_izin/cuti', $this->user_type);

			$data_content['title_page'] = 'Konfirmasi Izin Cuti';
			$data_content['list_all'] = $this->m_ki->cuti_list_all();
		$data['content'] = $this->load->view('partial/KonfirmasiIzinAdmin/V_Cuti_KonfirmasiIzinAdmin', $data_content, true);
		$this->load->view('V_KonfirmasiIzin_Admin', $data);
	}

	public function sekolah() {
		$data = generate_page('Konfirmasi Izin Cuti', 'konfirmasi_izin/sekolah', $this->user_type);

			$data_content['title_page'] = 'Konfirmasi Izin Sekolah';
			$data_content['list_all'] = $this->m_ki->sekolah_list_all();
		$data['content'] = $this->load->view('partial/KonfirmasiIzinAdmin/V_Sekolah_KonfirmasiIzinAdmin', $data_content, true);
		$this->load->view('V_KonfirmasiIzin_Admin', $data);
	}

	public function seminar() {
		$data = generate_page('Konfirmasi Izin Seminar', 'konfirmasi_izin/seminar', $this->user_type);

			$data_content['title_page'] = 'Konfirmasi Izin Seminar';
			$data_content['list_all'] = $this->m_ki->seminar_list_all();
		$data['content'] = $this->load->view('partial/KonfirmasiIzinAdmin/V_Seminar_KonfirmasiIzinAdmin', $data_content, true);
		$this->load->view('V_KonfirmasiIzin_Admin', $data);
	}

	public function accept() {

		if( empty($this->uri->segment('3'))) {
			redirect( base_url('/dashboard') );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url('/dashboard') );
		}

		$name=$this->uri->segment('3');
		$id=$this->uri->segment('4');

		switch ($name) {
			case 'cuti':
				$this->m_ki->accept_izin($id, $name);
				$this->session->set_flashdata('msg_alert', 'Pengajuan izin cuti berhasil diaccept');
				redirect( base_url('konfirmasi_izin/cuti') );
				break;
			case 'sekolah':
				$this->m_ki->accept_izin($id, $name);
				$this->session->set_flashdata('msg_alert', 'Pengajuan izin sekolah berhasil diaccept');
				redirect( base_url('konfirmasi_izin/sekolah') );
				break;
			case 'seminar':
				$this->m_ki->accept_izin($id, $name);
				$this->session->set_flashdata('msg_alert', 'Pengajuan izin seminar berhasil diaccept');
				redirect( base_url('konfirmasi_izin/seminar') );
				break;
			
			default:
				redirect( base_url() );
				break;
		}

	}

	public function reject() {
		
		if( empty($this->uri->segment('3'))) {
			redirect( base_url('/dashboard') );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url('/dashboard') );
		}

		$name=$this->uri->segment('3');
		$id=$this->uri->segment('4');

		switch ($name) {
			case 'cuti':
				$this->m_ki->reject_izin($id, $name);
				$this->session->set_flashdata('msg_alert', 'Pengajuan izin cuti berhasil direject');
				redirect( base_url('konfirmasi_izin/cuti') );
				break;
			case 'sekolah':
				$this->m_ki->reject_izin($id, $name);
				$this->session->set_flashdata('msg_alert', 'Pengajuan izin sekolah berhasil direject');
				redirect( base_url('konfirmasi_izin/sekolah') );
				break;
			case 'seminar':
				$this->m_ki->reject_izin($id, $name);
				$this->session->set_flashdata('msg_alert', 'Pengajuan izin seminar berhasil direject');
				redirect( base_url('konfirmasi_izin/seminar') );
				break;
			
			default:
				redirect( base_url() );
				break;
		}

	}

}

/* End of file Konfirmasi_Izin.php */
/* Location: ./application/controllers/Konfirmasi_Izin.php */