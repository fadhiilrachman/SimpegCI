<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajukan_Izin extends CI_Controller {

	private $m_ai;

	function __construct() {
		parent::__construct();
		isnt_pegawai(function() {
			redirect( base_url('auth/login') );
		});
		$this->load->model('M_AjukanIzin');
		$this->m_ai = $this->M_AjukanIzin;
	}

	public function index()
	{
		redirect( base_url('dashboard') );
	}

	public function cuti()
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') {
			$id_cuti= $this->security->xss_clean( $this->input->post('id_cuti') );
			$tglawal= $this->security->xss_clean( $this->input->post('tglawal') );
			$tglakhir= $this->security->xss_clean( $this->input->post('tglakhir') );
			$tempat= $this->security->xss_clean( $this->input->post('tempat') );

			$this->form_validation->set_rules('id_cuti', 'Nama Cuti', 'required');
			$this->form_validation->set_rules('tglawal', 'Tanggal Awal', 'required');
			$this->form_validation->set_rules('tglakhir', 'Tanggal Akhir', 'required');
			$this->form_validation->set_rules('tempat', 'Tempat', 'required');

			if(!$this->form_validation->run()) {
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('ajukan_izin/cuti') );
			}
			// to-do
			$id_sk = $this->m_ai->izin_cuti(
				$id_cuti,$tglawal,$tglakhir,$tempat
			);

			redirect( base_url('surat_keterangan/cuti/' . $id_sk) );
		}
		$data = generate_page('Ajukan Izin Cuti', 'ajukan_izin/cuti', 'Pegawai');

			$data_content['title_page'] = 'Ajukan Izin Cuti';
			$data_content['list_all'] = $this->m_ai->cuti_list_all();
		$data['content'] = $this->load->view('partial/AjukanIzinPegawai/V_Cuti_AjukanIzinPegawai', $data_content, true);
		$this->load->view('V_AjukanIzin_Admin', $data);
	}

	public function sekolah()
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') {
			$id_sekolah= $this->security->xss_clean( $this->input->post('id_sekolah') );
			$tglawal= $this->security->xss_clean( $this->input->post('tglawal') );
			$tglakhir= $this->security->xss_clean( $this->input->post('tglakhir') );
			$tempat= $this->security->xss_clean( $this->input->post('tempat') );

			$this->form_validation->set_rules('id_sekolah', 'Nama Sekolah', 'required');
			$this->form_validation->set_rules('tglawal', 'Tanggal Awal', 'required');
			$this->form_validation->set_rules('tglakhir', 'Tanggal Akhir', 'required');
			$this->form_validation->set_rules('tempat', 'Tempat', 'required');

			if(!$this->form_validation->run()) {
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('ajukan_izin/sekolah') );
			}
			// to-do
			$id_sk = $this->m_ai->izin_sekolah(
				$id_sekolah,$tglawal,$tglakhir,$tempat
			);

			redirect( base_url('surat_keterangan/sekolah/' . $id_sk) );
		}
		$data = generate_page('Ajukan Izin Sekolah', 'ajukan_izin/sekolah', 'Pegawai');

			$data_content['title_page'] = 'Ajukan Izin Sekolah';
			$data_content['list_all'] = $this->m_ai->sekolah_list_all();
		$data['content'] = $this->load->view('partial/AjukanIzinPegawai/V_Sekolah_AjukanIzinPegawai', $data_content, true);
		$this->load->view('V_AjukanIzin_Admin', $data);
	}

	public function seminar()
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST') {
			$id_seminar= $this->security->xss_clean( $this->input->post('id_seminar') );
			$tglawal= $this->security->xss_clean( $this->input->post('tglawal') );
			$tglakhir= $this->security->xss_clean( $this->input->post('tglakhir') );
			$tempat= $this->security->xss_clean( $this->input->post('tempat') );

			$this->form_validation->set_rules('id_seminar', 'Nama Seminar', 'required');
			$this->form_validation->set_rules('tglawal', 'Tanggal Awal', 'required');
			$this->form_validation->set_rules('tglakhir', 'Tanggal Akhir', 'required');
			$this->form_validation->set_rules('tempat', 'Tempat', 'required');

			if(!$this->form_validation->run()) {
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('ajukan_izin/seminar') );
			}
			// to-do
			$id_sk = $this->m_ai->izin_seminar(
				$id_seminar,$tglawal,$tglakhir,$tempat
			);

			redirect( base_url('surat_keterangan/seminar/' . $id_sk) );
		}
		$data = generate_page('Ajukan Izin Seminar', 'ajukan_izin/seminar', 'Pegawai');

			$data_content['title_page'] = 'Ajukan Izin Seminar';
			$data_content['list_all'] = $this->m_ai->seminar_list_all();
		$data['content'] = $this->load->view('partial/AjukanIzinPegawai/V_Seminar_AjukanIzinPegawai', $data_content, true);
		$this->load->view('V_AjukanIzin_Admin', $data);
	}

}

/* End of file Ajukan_Izin.php */
/* Location: ./application/controllers/Ajukan_Izin.php */