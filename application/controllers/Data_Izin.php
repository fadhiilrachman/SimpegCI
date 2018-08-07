<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Izin extends CI_Controller {

	private $m_dataizin;

	function __construct() {
		parent::__construct();
		isnt_adminbaak(function() {
			redirect( base_url('auth/login') );
		});
		$this->load->model('M_DataIzin');
		$this->m_dataizin = $this->M_DataIzin;
		if( $this->session->userdata('user_type') == 'admin' ) {
			$this->user_type = 'Admin';
		} else if( $this->session->userdata('user_type') == 'baak' ) {
			$this->user_type = 'BAAK';
		}
	}

	public function index() {
		$data = generate_page('Data Izin', 'data_izin', $this->user_type);

			$data_content['title_page'] = 'Data Izin';
		$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzin_Read', $data_content, true);
		$this->load->view('V_DataIzin_Admin', $data);
	}

	public function list_ajax() {
		json_dump(function() {
			$result=$this->m_dataizin->izin_list_ajax( $this->m_dataizin->izin_list_all() );
			return array('data' => $result);
		});
	}

	public function nama_izin_ajax($type) {
		$this->c_type=$type;
		json_dump(function() {
			$result=$this->m_dataizin->get_namaizin($this->c_type);
			return $result;
		});
	}

	public function add_new() {
		if( $_SERVER['REQUEST_METHOD'] == 'POST') {
			$id_namaizin= $this->security->xss_clean( $this->input->post('id_namaizin') );
			$id= $this->security->xss_clean( $this->input->post('id') );
			$tglawal= $this->security->xss_clean( $this->input->post('tglawal') );
			$tempat= $this->security->xss_clean( $this->input->post('tempat') );
			$tglakhir= $this->security->xss_clean( $this->input->post('tglakhir') );
			$status= $this->security->xss_clean( $this->input->post('status') );
			$this->form_validation->set_rules('type', 'Type Izin', 'required');
			$this->form_validation->set_rules('id_namaizin', 'Nama Izin', 'required');
			$this->form_validation->set_rules('id', 'Nama Pegawai', 'required');
			$this->form_validation->set_rules('tglawal', 'Tanggal Awal', 'required');
			$this->form_validation->set_rules('tempat', 'Tempat', 'required');
			$this->form_validation->set_rules('tglakhir', 'Tanggal Akhir', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			if(!$this->form_validation->run()) {
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('data_izin/add_new/' . $name) );
			}
			$this->m_dataizin->add_new(
				$id_namaizin,$id,$tglawal,$tglakhir,$tempat,$status
			);
			redirect( base_url('data_izin') );
		}
		$data = generate_page('Entry Data Izin', 'data_izin/add_new', $this->user_type);

			$data_content['title_page'] = 'Entry Data Izin';
			$data_content['pegawai_list_all'] = $this->m_dataizin->pegawai_list_all();
		$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzin_Create', $data_content, true);
		$this->load->view('V_DataIzin_Admin', $data);
	}

	public function edit($id) {
		if( $_SERVER['REQUEST_METHOD'] == 'POST') {
			$id_izin= $this->security->xss_clean( $this->input->post('id_izin') );
			$id_namaizin= $this->security->xss_clean( $this->input->post('id_namaizin') );
			$id_pgn= $this->security->xss_clean( $this->input->post('id') );
			$tglawal= $this->security->xss_clean( $this->input->post('tglawal') );
			$tempat= $this->security->xss_clean( $this->input->post('tempat') );
			$tglakhir= $this->security->xss_clean( $this->input->post('tglakhir') );
			$status= $this->security->xss_clean( $this->input->post('status') );
			
			$this->form_validation->set_rules('id_izin', 'ID Izin', 'required');
			$this->form_validation->set_rules('id_namaizin', 'Nama Izin', 'required');
			$this->form_validation->set_rules('id_pgn', 'Nama Pegawai', 'id');
			$this->form_validation->set_rules('tglawal', 'Tanggal Awal', 'required');
			$this->form_validation->set_rules('tempat', 'Tempat', 'required');
			$this->form_validation->set_rules('tglakhir', 'Tanggal Akhir', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			if(!$this->form_validation->run()) {
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('data_izin/edit/' . $name . '/' . $id) );
			}
			$this->m_dataizin->update(
				$id_izin,$id_namaizin,$id_pgn,$tglawal,$tglakhir,$tempat,$status
			);
			redirect( base_url('data_izin') );
		}
		$data = generate_page('Edit Data Izin', 'data_izin/edit/' . $id, $this->user_type);

			$data_content['title_page'] = 'Edit Data Izin';
			$data_content['data_izin'] = $this->m_dataizin->get_data_izin($id);
			$data_content['namaizin_list'] = $this->m_dataizin->get_namaizin( $data_content['data_izin']->type );
			$data_content['pegawai_list_all'] = $this->m_dataizin->pegawai_list_all();
		$data['content'] = $this->load->view('partial/DataIzinAdmin/V_Admin_DataIzin_Edit', $data_content, true);
		$this->load->view('V_DataIzin_Admin', $data);
	}

	public function delete($id_izin) {
		$this->m_dataizin->delete($id_izin);
		$this->session->set_flashdata('msg_alert', 'Data izin berhasil dihapus');
		redirect( base_url('data_izin') );
	}

}

/* End of file Data_Izin.php */
/* Location: ./application/controllers/Data_Izin.php */