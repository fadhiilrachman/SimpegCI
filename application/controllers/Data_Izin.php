<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Izin extends CI_Controller {

	private $m_dataizin;

	function __construct() {
		parent::__construct();
		isnt_admin(function() {
			redirect( base_url('auth/login') );
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
		$this->load->view('V_DataIzin_Admin', $data);
	}

	public function sekolah() {
		$data = generate_page('Data Izin Cuti', 'data_izin/sekolah', 'Admin');

			$data_content['title_page'] = 'Data Izin Sekolah';
			$data_content['list_all'] = $this->m_dataizin->sekolah_list_all();
		$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzinSekolah_Read', $data_content, true);
		$this->load->view('V_DataIzin_Admin', $data);
	}

	public function seminar() {
		$data = generate_page('Data Izin Seminar', 'data_izin/seminar', 'Admin');

			$data_content['title_page'] = 'Data Izin Seminar';
			$data_content['list_all'] = $this->m_dataizin->seminar_list_all();
		$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzinSeminar_Read', $data_content, true);
		$this->load->view('V_DataIzin_Admin', $data);
	}

	//

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
				$this->m_dataizin->cuti_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data izin cuti berhasil dihapus');
				redirect( base_url('data_izin/cuti') );
				break;
			case 'sekolah':
				$this->m_dataizin->sekolah_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data izin sekolah berhasil dihapus');
				redirect( base_url('data_izin/sekolah') );
				break;
			case 'seminar':
				$this->m_dataizin->seminar_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data izin seminar berhasil dihapus');
				redirect( base_url('data_izin/seminar') );
				break;
			
			default:
				redirect( base_url() );
				break;
		}

	}

	//

	public function edit() {

		$name=$this->uri->segment('3');
		$id=$this->uri->segment('4');
		
		switch ($name) {
			case 'cuti':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_izin= $this->security->xss_clean( $this->input->post('id_izin') );
					$id_cuti= $this->security->xss_clean( $this->input->post('id_cuti') );
					$id_pgn= $this->security->xss_clean( $this->input->post('id') );
					$tglawal= $this->security->xss_clean( $this->input->post('tglawal') );
					$tempat= $this->security->xss_clean( $this->input->post('tempat') );
					$tglakhir= $this->security->xss_clean( $this->input->post('tglakhir') );
					$status= $this->security->xss_clean( $this->input->post('status') );
					
					$this->form_validation->set_rules('id_izin', 'ID Izin', 'required');
					$this->form_validation->set_rules('id_cuti', 'Nama Cuti', 'required');
					$this->form_validation->set_rules('id_pgn', 'Nama Pegawai', 'id');
					$this->form_validation->set_rules('tglawal', 'Tanggal Awal', 'required');
					$this->form_validation->set_rules('tempat', 'Tempat', 'required');
					$this->form_validation->set_rules('tglakhir', 'Tanggal Akhir', 'required');
					$this->form_validation->set_rules('status', 'Status', 'required');

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_izin/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_dataizin->cuti_update(
						$id_izin,$id_cuti,$id_pgn,$tglawal,$tglakhir,$tempat,$status
					);
					redirect( base_url('data_izin/cuti') );
				}
				$data = generate_page('Edit Data Izin Cuti', 'data_izin/edit/' . $name . '/' . $id, 'Admin');

					$data_content['title_page'] = 'Edit Data Izin Cuti';
					$data_content['data_cuti'] = $this->m_dataizin->get_data_cuti($id);
					$data_content['cuti_list_all'] = $this->m_dataizin->tbcuti_list_all();
					$data_content['pegawai_list_all'] = $this->m_dataizin->pegawai_list_all();
				$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzinCuti_Edit', $data_content, true);
				$this->load->view('V_DataIzin_Admin', $data);
				break;
			case 'sekolah':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_izin= $this->security->xss_clean( $this->input->post('id_izin') );
					$id_sekolah= $this->security->xss_clean( $this->input->post('id_sekolah') );
					$id_pgn= $this->security->xss_clean( $this->input->post('id') );
					$tglawal= $this->security->xss_clean( $this->input->post('tglawal') );
					$tempat= $this->security->xss_clean( $this->input->post('tempat') );
					$tglakhir= $this->security->xss_clean( $this->input->post('tglakhir') );
					$status= $this->security->xss_clean( $this->input->post('status') );
					
					$this->form_validation->set_rules('id_izin', 'ID Izin', 'required');
					$this->form_validation->set_rules('id_sekolah', 'Nama Sekolah', 'required');
					$this->form_validation->set_rules('id_pgn', 'Nama Pegawai', 'id');
					$this->form_validation->set_rules('tglawal', 'Tanggal Awal', 'required');
					$this->form_validation->set_rules('tempat', 'Tempat', 'required');
					$this->form_validation->set_rules('tglakhir', 'Tanggal Akhir', 'required');
					$this->form_validation->set_rules('status', 'Status', 'required');

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_izin/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_dataizin->sekolah_update(
						$id_izin,$id_sekolah,$id_pgn,$tglawal,$tglakhir,$tempat,$status
					);
					redirect( base_url('data_izin/sekolah') );
				}
				$data = generate_page('Edit Data Izin Sekolah', 'data_izin/edit/' . $name . '/' . $id, 'Admin');

					$data_content['title_page'] = 'Edit Data Izin Sekolah';
					$data_content['data_sekolah'] = $this->m_dataizin->get_data_sekolah($id);
					$data_content['sekolah_list_all'] = $this->m_dataizin->tbsekolah_list_all();
					$data_content['pegawai_list_all'] = $this->m_dataizin->pegawai_list_all();
				$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzinSekolah_Edit', $data_content, true);
				$this->load->view('V_DataIzin_Admin', $data);
				break;
			case 'seminar':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_izin= $this->security->xss_clean( $this->input->post('id_izin') );
					$id_seminar= $this->security->xss_clean( $this->input->post('id_seminar') );
					$id_pgn= $this->security->xss_clean( $this->input->post('id') );
					$tglawal= $this->security->xss_clean( $this->input->post('tglawal') );
					$tempat= $this->security->xss_clean( $this->input->post('tempat') );
					$tglakhir= $this->security->xss_clean( $this->input->post('tglakhir') );
					$status= $this->security->xss_clean( $this->input->post('status') );
					
					$this->form_validation->set_rules('id_izin', 'ID Izin', 'required');
					$this->form_validation->set_rules('id_seminar', 'Nama Seminar', 'required');
					$this->form_validation->set_rules('id_pgn', 'Nama Pegawai', 'id');
					$this->form_validation->set_rules('tglawal', 'Tanggal Awal', 'required');
					$this->form_validation->set_rules('tempat', 'Tempat', 'required');
					$this->form_validation->set_rules('tglakhir', 'Tanggal Akhir', 'required');
					$this->form_validation->set_rules('status', 'Status', 'required');

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_izin/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_dataizin->seminar_update(
						$id_izin,$id_seminar,$id_pgn,$tglawal,$tglakhir,$tempat,$status
					);
					redirect( base_url('data_izin/seminar') );
				}
				$data = generate_page('Edit Data Izin Seminar', 'data_izin/edit/' . $name . '/' . $id, 'Admin');

					$data_content['title_page'] = 'Edit Data Izin Seminar';
					$data_content['data_seminar'] = $this->m_dataizin->get_data_seminar($id);
					$data_content['seminar_list_all'] = $this->m_dataizin->tbseminar_list_all();
					$data_content['pegawai_list_all'] = $this->m_dataizin->pegawai_list_all();
				$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzinSeminar_Edit', $data_content, true);
				$this->load->view('V_DataIzin_Admin', $data);
		}
	}

	//

	public function add_new() {

		if( empty($this->uri->segment('3'))) {
			redirect( base_url('/dashboard') );
		}

		$name=$this->uri->segment('3');
			
		switch ($name) {
			case 'cuti':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_cuti= $this->security->xss_clean( $this->input->post('id_cuti') );
					$id= $this->security->xss_clean( $this->input->post('id') );
					$tglawal= $this->security->xss_clean( $this->input->post('tglawal') );
					$tempat= $this->security->xss_clean( $this->input->post('tempat') );
					$tglakhir= $this->security->xss_clean( $this->input->post('tglakhir') );
					$status= $this->security->xss_clean( $this->input->post('status') );
					$this->form_validation->set_rules('id_cuti', 'Nama Cuti', 'required');
					$this->form_validation->set_rules('id', 'Nama Pegawai', 'required');
					$this->form_validation->set_rules('tglawal', 'Tanggal Awal', 'required');
					$this->form_validation->set_rules('tempat', 'Tempat', 'required');
					$this->form_validation->set_rules('tglakhir', 'Tanggal Akhir', 'required');
					$this->form_validation->set_rules('status', 'Status', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_izin/add_new/' . $name) );
					}
					$this->m_dataizin->cuti_add_new(
						$id_cuti,$id,$tglawal,$tglakhir,$tempat,$status
					);
					redirect( base_url('data_izin/' . $name) );
				}
				$data = generate_page('Entry Data Izin Cuti', 'data_izin/add_new/cuti', 'Admin');

					$data_content['title_page'] = 'Entry Data Izin Cuti';
					$data_content['cuti_list_all'] = $this->m_dataizin->tbcuti_list_all();
					$data_content['pegawai_list_all'] = $this->m_dataizin->pegawai_list_all();
				$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzinCuti_Create', $data_content, true);
				$this->load->view('V_DataIzin_Admin', $data);
				break;
			case 'sekolah':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_sekolah= $this->security->xss_clean( $this->input->post('id_sekolah') );
					$id= $this->security->xss_clean( $this->input->post('id') );
					$tglawal= $this->security->xss_clean( $this->input->post('tglawal') );
					$tempat= $this->security->xss_clean( $this->input->post('tempat') );
					$tglakhir= $this->security->xss_clean( $this->input->post('tglakhir') );
					$status= $this->security->xss_clean( $this->input->post('status') );
					$this->form_validation->set_rules('id_sekolah', 'Nama Sekolah', 'required');
					$this->form_validation->set_rules('id', 'Nama Pegawai', 'required');
					$this->form_validation->set_rules('tglawal', 'Tanggal Awal', 'required');
					$this->form_validation->set_rules('tempat', 'Tempat', 'required');
					$this->form_validation->set_rules('tglakhir', 'Tanggal Akhir', 'required');
					$this->form_validation->set_rules('status', 'Status', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_izin/add_new/' . $name) );
					}
					$this->m_dataizin->sekolah_add_new(
						$id_sekolah,$id,$tglawal,$tglakhir,$tempat,$status
					);
					redirect( base_url('data_izin/' . $name) );
				}
				$data = generate_page('Entry Data Izin Sekolah', 'data_izin/add_new/sekolah', 'Admin');

					$data_content['title_page'] = 'Entry Data Izin Sekolah';
					$data_content['sekolah_list_all'] = $this->m_dataizin->tbsekolah_list_all();
					$data_content['pegawai_list_all'] = $this->m_dataizin->pegawai_list_all();
				$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzinSekolah_Create', $data_content, true);
				$this->load->view('V_DataIzin_Admin', $data);
				break;
			case 'seminar':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_seminar= $this->security->xss_clean( $this->input->post('id_seminar') );
					$id= $this->security->xss_clean( $this->input->post('id') );
					$tglawal= $this->security->xss_clean( $this->input->post('tglawal') );
					$tempat= $this->security->xss_clean( $this->input->post('tempat') );
					$tglakhir= $this->security->xss_clean( $this->input->post('tglakhir') );
					$status= $this->security->xss_clean( $this->input->post('status') );
					$this->form_validation->set_rules('id_seminar', 'Nama Seminar', 'required');
					$this->form_validation->set_rules('id', 'Nama Pegawai', 'required');
					$this->form_validation->set_rules('tglawal', 'Tanggal Awal', 'required');
					$this->form_validation->set_rules('tempat', 'Tempat', 'required');
					$this->form_validation->set_rules('tglakhir', 'Tanggal Akhir', 'required');
					$this->form_validation->set_rules('status', 'Status', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_izin/add_new/' . $name) );
					}
					$this->m_dataizin->seminar_add_new(
						$id_seminar,$id,$tglawal,$tglakhir,$tempat,$status
					);
					redirect( base_url('data_izin/' . $name) );
				}
				$data = generate_page('Entry Data Izin Seminar', 'data_izin/add_new/seminar', 'Admin');

					$data_content['title_page'] = 'Entry Data Izin Seminar';
					$data_content['seminar_list_all'] = $this->m_dataizin->tbseminar_list_all();
					$data_content['pegawai_list_all'] = $this->m_dataizin->pegawai_list_all();
				$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzinSeminar_Create', $data_content, true);
				$this->load->view('V_DataIzin_Admin', $data);
				break;
		}
	}

}

/* End of file Data_Izin.php */
/* Location: ./application/controllers/Data_Izin.php */