<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_Keterangan extends CI_Controller {
	private $m_ai;

	function __construct() {
		parent::__construct();
		$this->load->model('M_AjukanIzin');
		$this->m_ai = $this->M_AjukanIzin;
	}

	public function index()
	{
		redirect( base_url('auth/login') );
	}

	public function cuti($id)
	{
		$data['type'] = 'cuti';
		$data['user_name'] = $this->session->userdata('user_name');
		$data['data'] = $this->m_ai->get_data_cuti($id);

		$data['nama_izin'] = $data['data']->nama_cuti;
		$data['nama'] = explode(' ', $data['data']->nama)[0];
		$diff  = date_diff( date_create($data['data']->tglawal), date_create($data['data']->tglakhir) );
		$data['selama'] = $diff->format('%d hari');
		$data['tglawal'] = date_format( date_create($data['data']->tglawal), 'd/m/Y');
		$data['tglakhir'] = date_format( date_create($data['data']->tglakhir), 'd/m/Y');
		$this->load->view('Surat_Keterangan', $data);
	}

	public function sekolah($id)
	{
		$data['type'] = 'sekolah';
		$data['user_name'] = $this->session->userdata('user_name');
		$data['data'] = $this->m_ai->get_data_sekolah($id);

		$data['nama_izin'] = $data['data']->nama_sekolah;
		$data['nama'] = explode(' ', $data['data']->nama)[0];
		$diff  = date_diff( date_create($data['data']->tglawal), date_create($data['data']->tglakhir) );
		$data['selama'] = $diff->format('%d hari');
		$data['tglawal'] = date_format( date_create($data['data']->tglawal), 'd/m/Y');
		$data['tglakhir'] = date_format( date_create($data['data']->tglakhir), 'd/m/Y');
		$this->load->view('Surat_Keterangan', $data);
	}

	public function seminar($id)
	{
		$data['type'] = 'seminar';
		$data['user_name'] = $this->session->userdata('user_name');
		$data['data'] = $this->m_ai->get_data_seminar($id);

		$data['nama_izin'] = $data['data']->nama_seminar;
		$data['nama'] = explode(' ', $data['data']->nama)[0];
		$diff  = date_diff( date_create($data['data']->tglawal), date_create($data['data']->tglakhir) );
		$data['selama'] = $diff->format('%d hari');
		$data['tglawal'] = date_format( date_create($data['data']->tglawal), 'd/m/Y');
		$data['tglakhir'] = date_format( date_create($data['data']->tglakhir), 'd/m/Y');
		$this->load->view('Surat_Keterangan', $data);
	}

}

/* End of file Surat_Keterangan.php */
/* Location: ./application/controllers/Surat_Keterangan.php */