<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_Izin extends CI_Controller {

	private $m_di;

	public function __construct()
	{
		parent::__construct();
		isnt_pegawai(function() {
			redirect( base_url('auth/login') );
		});
		$this->load->model('M_DaftarIzin');
		$this->m_di = $this->M_DaftarIzin;
	}

	public function delete() {
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
				$this->m_di->cuti_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data izin cuti berhasil dihapus');
				redirect( base_url('daftar_izin/cuti') );
				break;
			case 'sekolah':
				$this->m_di->sekolah_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data izin sekolah berhasil dihapus');
				redirect( base_url('daftar_izin/sekolah') );
				break;
			case 'seminar':
				$this->m_di->seminar_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data izin seminar berhasil dihapus');
				redirect( base_url('daftar_izin/seminar') );
				break;
			
			default:
				redirect( base_url() );
				break;
		}

	}

	public function cuti() {
		$data = generate_page('Daftar Izin Cuti', 'daftar_izin/cuti', 'Pegawai');

			$data_content['title_page'] = 'Daftar Izin Cuti';
			$data_content['list_all'] = $this->m_di->cuti_list_all();
		$data['content'] = $this->load->view('partial/DaftarIzinPegawai/V_Cuti_DaftarIzinPegawai', $data_content, true);
		$this->load->view('V_DaftarIzin_Pegawai', $data);
	}

	public function sekolah() {
		$data = generate_page('Daftar Izin Cuti', 'daftar_izin/sekolah', 'Pegawai');

			$data_content['title_page'] = 'Daftar Izin Sekolah';
			$data_content['list_all'] = $this->m_di->sekolah_list_all();
		$data['content'] = $this->load->view('partial/DaftarIzinPegawai/V_Sekolah_DaftarIzinPegawai', $data_content, true);
		$this->load->view('V_DaftarIzin_Pegawai', $data);
	}

	public function seminar() {
		$data = generate_page('Daftar Izin Seminar', 'daftar_izin/seminar', 'Pegawai');

			$data_content['title_page'] = 'Daftar Izin Seminar';
			$data_content['list_all'] = $this->m_di->seminar_list_all();
		$data['content'] = $this->load->view('partial/DaftarIzinPegawai/V_Seminar_DaftarIzinPegawai', $data_content, true);
		$this->load->view('V_DaftarIzin_Pegawai', $data);
	}

}

/* End of file Daftar_Izin.php */
/* Location: ./application/controllers/Daftar_Izin.php */