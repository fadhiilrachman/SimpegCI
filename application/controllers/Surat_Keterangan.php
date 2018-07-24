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
		$data['dl'] = false;
		if( $_SERVER['REQUEST_METHOD'] == 'GET') {
			if( isset($_GET['dl']) ) {
				$data['dl'] = true;
				header("Content-type: application/vnd.ms-word");
				header("Content-Disposition: attachment; filename=SkBAAK-001-{$id}.doc");
			}
		}
		$data['id'] = $id;
		$data['type_id'] = '001';
		$data['type'] = 'cuti';
		$data['user_name'] = $this->session->userdata('user_name');
		$data['data'] = $this->m_ai->get_data_cuti($id);

		$data['nama_izin'] = $data['data']->nama_cuti;
		$data['tempat_lahir'] = strtoupper($data['data']->tempat_lahir);
		$data['tanggal_lahir'] = date_format( date_create($data['data']->tanggal_lahir), 'd M Y');
		$data['alamat'] = $data['data']->alamat;
		$data['nama'] = explode(' ', $data['data']->nama)[0];
		$diff  = date_diff( date_create($data['data']->tglawal), date_create($data['data']->tglakhir) );
		$data['selama'] = $diff->format('%d hari');
		$data['tglawal'] = date_format( date_create($data['data']->tglawal), 'd M Y');
		$data['tglakhir'] = date_format( date_create($data['data']->tglakhir), 'd M Y');
		$this->load->view('Surat_Keterangan_New', $data);
	}

	public function sekolah($id)
	{
		$data['dl'] = false;
		if( $_SERVER['REQUEST_METHOD'] == 'GET') {
			if( isset($_GET['dl']) ) {
				$data['dl'] = true;
				header("Content-type: application/vnd.ms-word");
				header("Content-Disposition: attachment; filename=SkBAAK-002-{$id}.doc");
			}
		}
		$data['id'] = $id;
		$data['type_id'] = '002';
		$data['type'] = 'sekolah';
		$data['user_name'] = $this->session->userdata('user_name');
		$data['data'] = $this->m_ai->get_data_sekolah($id);

		$data['nama_izin'] = $data['data']->nama_sekolah;
		$data['tempat_lahir'] = strtoupper($data['data']->tempat_lahir);
		$data['tanggal_lahir'] = date_format( date_create($data['data']->tanggal_lahir), 'd M Y');
		$data['alamat'] = $data['data']->alamat;
		$data['nama'] = explode(' ', $data['data']->nama)[0];
		$diff  = date_diff( date_create($data['data']->tglawal), date_create($data['data']->tglakhir) );
		$data['selama'] = $diff->format('%d hari');
		$data['tglawal'] = date_format( date_create($data['data']->tglawal), 'd M Y');
		$data['tglakhir'] = date_format( date_create($data['data']->tglakhir), 'd M Y');
		$this->load->view('Surat_Keterangan_New', $data);
	}

	public function seminar($id)
	{
		$data['dl'] = false;
		if( $_SERVER['REQUEST_METHOD'] == 'GET') {
			if( isset($_GET['dl']) ) {
				$data['dl'] = true;
				header("Content-type: application/vnd.ms-word");
				header("Content-Disposition: attachment; filename=SkBAAK-003-{$id}.doc");
			}
		}
		$data['id'] = $id;
		$data['type_id'] = '003';
		$data['type'] = 'seminar';
		$data['user_name'] = $this->session->userdata('user_name');
		$data['data'] = $this->m_ai->get_data_seminar($id);

		$data['nama_izin'] = $data['data']->nama_seminar;
		$data['tempat_lahir'] = strtoupper($data['data']->tempat_lahir);
		$data['tanggal_lahir'] = date_format( date_create($data['data']->tanggal_lahir), 'd M Y');
		$data['alamat'] = $data['data']->alamat;
		$data['nama'] = explode(' ', $data['data']->nama)[0];
		$diff  = date_diff( date_create($data['data']->tglawal), date_create($data['data']->tglakhir) );
		$data['selama'] = $diff->format('%d hari');
		$data['tglawal'] = date_format( date_create($data['data']->tglawal), 'd M Y');
		$data['tglakhir'] = date_format( date_create($data['data']->tglakhir), 'd M Y');
		$this->load->view('Surat_Keterangan_New', $data);
	}

}

/* End of file Surat_Keterangan.php */
/* Location: ./application/controllers/Surat_Keterangan.php */