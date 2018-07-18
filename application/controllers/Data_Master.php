<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Master extends CI_Controller {

	private $m_datamaster;

	function __construct() {
		parent::__construct();
		isnt_admin(function() {
			redirect( base_url('auth/login') );
		});
		$this->load->model('M_DataMaster');
		$this->m_datamaster = $this->M_DataMaster;
	}

	public function index() {
		redirect( base_url('dashboard') );
	}

	public function admin() {
		$data = generate_page('Data Master Admin', 'data_master/admin', 'Admin');

			$data_content['title_page'] = 'Data Master Admin';
			$data_content['list_all'] = $this->m_datamaster->admin_list_all();
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function jabatan() {
		$data = generate_page('Data Master Jabatan', 'data_master/jabatan', 'Admin');

			$data_content['title_page'] = 'Data Master Jabatan';
			$data_content['list_all'] = $this->m_datamaster->jabatan_list_all();
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterJabatan_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function bidang() {
		$data = generate_page('Data Master Bidang', 'data_master/bidang', 'Admin');

			$data_content['title_page'] = 'Data Master Bidang';
			$data_content['list_all'] = $this->m_datamaster->bidang_list_all();
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterBidang_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
		
	}

	public function pegawai() {
		$data = generate_page('Data Master Pegawai', 'data_master/pegawai', 'Admin');

			$data_content['title_page'] = 'Data Master Pegawai';
			$data_content['list_all'] = $this->m_datamaster->pegawai_list_all();
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterPegawai_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function cuti() {
		$data = generate_page('Data Master Cuti', 'data_master/cuti', 'Admin');

			$data_content['title_page'] = 'Data Master Cuti';
			$data_content['list_all'] = $this->m_datamaster->cuti_list_all();
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterCuti_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function sekolah() {
		$data = generate_page('Data Master Sekolah', 'data_master/sekolah', 'Admin');

			$data_content['title_page'] = 'Data Master Sekolah';
			$data_content['list_all'] = $this->m_datamaster->sekolah_list_all();
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterSekolah_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function seminar() {
		$data = generate_page('Data Master Seminar', 'data_master/seminar', 'Admin');

			$data_content['title_page'] = 'Data Master Seminar';
			$data_content['list_all'] = $this->m_datamaster->seminar_list_all();
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterSeminar_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
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
			case 'admin':
				$this->m_datamaster->admin_delete($id);
				$this->session->set_flashdata('msg_alert', 'Akun admin berhasil dihapus');
				redirect( base_url('data_master/admin') );
				break;
			case 'jabatan':
				$this->m_datamaster->jabatan_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data jabatan berhasil dihapus');
				redirect( base_url('data_master/jabatan') );
				break;
			case 'nilai':
				$this->m_datamaster->bidang_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data bidang berhasil dihapus');
				redirect( base_url('data_master/bidang') );
				break;
			case 'pegawai':
				$this->m_datamaster->pegawai_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data pegawai berhasil dihapus');
				redirect( base_url('data_master/pegawai') );
				break;
			case 'cuti':
				$this->m_datamaster->cuti_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data cuti berhasil dihapus');
				redirect( base_url('data_master/cuti') );
				break;
			case 'sekolah':
				$this->m_datamaster->sekolah_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data sekolah berhasil dihapus');
				redirect( base_url('data_master/sekolah') );
				break;
			case 'seminar':
				$this->m_datamaster->seminar_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data seminar berhasil dihapus');
				redirect( base_url('data_master/seminar') );
				break;
			
			default:
				redirect( base_url() );
				break;
		}

	}

	//

	public function edit() {
		if( empty($this->uri->segment('3'))) {
			redirect( base_url() );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url() );
		}

		$name=$this->uri->segment('3');
		$id=$this->uri->segment('4');
		
		switch ($name) {
			case 'jabatan':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id= $this->security->xss_clean( $this->input->post('id_jabatan') );
					$nama_jabatan= $this->security->xss_clean( $this->input->post('nama_jabatan') );
					// validasi
					$this->form_validation->set_rules('id_jabatan', 'ID', 'required');
					$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_datamaster->jabatan_update(
						$id,$nama_jabatan
					);
					redirect( base_url('data_master/jabatan') );
				}
				$data = generate_page('Edit Data Master Jabatan', 'data_master/edit/' . $name . '/' . $id, 'Admin');

					$data_content['title_page'] = 'Edit Data Master Jabatan';
					$data_content['data_jabatan'] = $this->m_datamaster->get_data_jabatan($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterJabatan_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'bidang':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id= $this->security->xss_clean( $this->input->post('id_bidang') );
					$nama_bidang= $this->security->xss_clean( $this->input->post('nama_bidang') );
					// validasi
					$this->form_validation->set_rules('id_bidang', 'ID', 'required');
					$this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required');

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_datamaster->bidang_update(
						$id,$nama_bidang
					);
					redirect( base_url('data_master/bidang') );
				}
				$data = generate_page('Edit Data Master Bidang', 'data_master/edit/' . $name . '/' . $id, 'Admin');

					$data_content['title_page'] = 'Edit Data Master Bidang';
					$data_content['data_bidang'] = $this->m_datamaster->get_data_bidang($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterBidang_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'cuti':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id= $this->security->xss_clean( $this->input->post('id_cuti') );
					$nama_cuti= $this->security->xss_clean( $this->input->post('nama_cuti') );
					// validasi
					$this->form_validation->set_rules('id_cuti', 'ID', 'required');
					$this->form_validation->set_rules('nama_cuti', 'Nama Cuti', 'required');

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_datamaster->cuti_update(
						$id,$nama_cuti
					);
					redirect( base_url('data_master/cuti') );
				}
				$data = generate_page('Edit Data Master Cuti', 'data_master/edit/' . $name . '/' . $id, 'Admin');

					$data_content['title_page'] = 'Edit Data Master Cuti';
					$data_content['data_cuti'] = $this->m_datamaster->get_data_cuti($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterCuti_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'sekolah':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id= $this->security->xss_clean( $this->input->post('id_sekolah') );
					$nama_sekolah= $this->security->xss_clean( $this->input->post('nama_sekolah') );
					// validasi
					$this->form_validation->set_rules('id_sekolah', 'ID', 'required');
					$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required');

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_datamaster->sekolah_update(
						$id,$nama_sekolah
					);
					redirect( base_url('data_master/sekolah') );
				}
				$data = generate_page('Edit Data Master Sekolah', 'data_master/edit/' . $name . '/' . $id, 'Admin');

					$data_content['title_page'] = 'Edit Data Master Sekolah';
					$data_content['data_sekolah'] = $this->m_datamaster->get_data_sekolah($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterSekolah_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'seminar':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id= $this->security->xss_clean( $this->input->post('id_seminar') );
					$nama_seminar= $this->security->xss_clean( $this->input->post('nama_seminar') );
					// validasi
					$this->form_validation->set_rules('id_seminar', 'ID', 'required');
					$this->form_validation->set_rules('nama_seminar', 'Nama Seminar', 'required');

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_datamaster->seminar_update(
						$id,$nama_seminar
					);
					redirect( base_url('data_master/seminar') );
				}
				$data = generate_page('Edit Data Master Seminar', 'data_master/edit/' . $name . '/' . $id, 'Admin');

					$data_content['title_page'] = 'Edit Data Master Seminar';
					$data_content['data_seminar'] = $this->m_datamaster->get_data_seminar($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterSeminar_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'pegawai':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id= $this->security->xss_clean( $this->input->post('id') );

					$nama= $this->security->xss_clean( $this->input->post('nama') );
					$nip= $this->security->xss_clean( $this->input->post('nip') );
					$tempat_lahir= $this->security->xss_clean( $this->input->post('tempat_lahir') );
					$tanggal_lahir= $this->security->xss_clean( $this->input->post('tanggal_lahir') );
					$jenis_kelamin= $this->security->xss_clean( $this->input->post('jenis_kelamin') );
					$pendidikan_terakhir= $this->security->xss_clean( $this->input->post('pendidikan_terakhir') );
					$status_perkawinan= $this->security->xss_clean( $this->input->post('status_perkawinan') );
					$status_pegawai= $this->security->xss_clean( $this->input->post('status_pegawai') );
					$id_jabatan= $this->security->xss_clean( $this->input->post('id_jabatan') );
					$id_bidang= $this->security->xss_clean( $this->input->post('id_bidang') );
					$agama= $this->security->xss_clean( $this->input->post('agama') );
					$alamat= $this->security->xss_clean( $this->input->post('alamat') );
					$no_ktp= $this->security->xss_clean( $this->input->post('no_ktp') );
					$no_rumah= $this->security->xss_clean( $this->input->post('no_rumah') );
					$no_handphone= $this->security->xss_clean( $this->input->post('no_handphone') );
					$email= $this->security->xss_clean( $this->input->post('email') );
					$password= $this->security->xss_clean( $this->input->post('password') );
					$id_user= $this->security->xss_clean( $this->input->post('id_user') );
					$tanggal_pengangkatan= $this->security->xss_clean( $this->input->post('tanggal_pengangkatan') );
					$avatar = '';
					// avatar
					if ( $this->security->xss_clean( $_FILES["avatar"] ) ) {
						$config['upload_path']          = './uploads/avatar/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 2000;
						$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);
				 
						$this->load->library('upload', $config);
				 
						if ( !$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect( base_url('data_master/edit/' . $name . '/' . $id) );
						} else {
							$avatar = $this->upload->data()['file_name'];
						}
					}
					
					// validasi
					$this->form_validation->set_rules('id', 'ID User', 'required');

					$this->form_validation->set_rules('nama', 'Nama', 'required');
					$this->form_validation->set_rules('nip', 'NIP', 'required');
					$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
					$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
					$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
					$this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');
					$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');
					$this->form_validation->set_rules('status_pegawai', 'status_pegawai', 'required');
					$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
					$this->form_validation->set_rules('id_bidang', 'Bidang', 'required');
					$this->form_validation->set_rules('agama', 'Agama', 'required');
					$this->form_validation->set_rules('alamat', 'Alamat', 'required');
					$this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
					$this->form_validation->set_rules('no_rumah', 'No Rumah', 'required');
					$this->form_validation->set_rules('no_handphone', 'No Handphone', 'required');
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
					$this->form_validation->set_rules('password', 'Password', '');
					$this->form_validation->set_rules('id_user', 'ID User', 'required');
					$this->form_validation->set_rules('tanggal_pengangkatan', 'Tanggal Pengangkatan', 'required');
					
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' . $id) );
					}
					// to-do
					$this->m_datamaster->pegawai_update(
					$id,$nama,$nip,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$pendidikan_terakhir,$status_perkawinan,
					$status_pegawai,$id_jabatan,$id_bidang,$agama,$alamat,$no_ktp,$no_rumah,$no_handphone,$email,
					$password,$id_user,$tanggal_pengangkatan,$avatar
					);
					redirect( base_url('data_master/pegawai') );
				}
				$data = generate_page('Edit Data Master Pegawai', 'data_master/edit/' . $name . '/' . $id, 'Admin');

					$data_content['list_bidang'] = $this->m_datamaster->get_list_bidang();
					$data_content['list_jabatan'] = $this->m_datamaster->get_list_jabatan();
					$data_content['title_page'] = 'Edit Data Master Pegawai';
					$data_content['data_pegawai'] = $this->m_datamaster->get_data_pegawai($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterPegawai_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'admin':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_user= $this->security->xss_clean( $this->input->post('id_user') );
					$username= $this->security->xss_clean( $this->input->post('username') );
					$email= $this->security->xss_clean( $this->input->post('email') );
					$namalengkap= $this->security->xss_clean( $this->input->post('namalengkap') );
					$password= $this->security->xss_clean( $this->input->post('password') );
					$type= $this->security->xss_clean( $this->input->post('type') );
					$avatar = '';
					// avatar
					if ( $this->security->xss_clean( $_FILES["avatar"] ) ) {
						$config['upload_path']          = './uploads/avatar/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 2000;
						$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);
				 
						$this->load->library('upload', $config);
				 
						if ( !$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect( base_url('data_master/edit/' . $name . '/' . $id) );
						} else {
							$avatar = $this->upload->data()['file_name'];
						}
					}
					// validasi
					$this->form_validation->set_rules('id_user', 'id_user', 'required');
					$this->form_validation->set_rules('username', 'Username', 'required');
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
					$this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
					$this->form_validation->set_rules('password', 'Password', '');
					$this->form_validation->set_rules('type', 'Type', 'required');

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/edit/' . $name . '/' . $id) );
					}
					$this->m_datamaster->admin_update(
						$id_user, $username, $email, $namalengkap, $password, $type, $avatar
					);
					redirect( base_url('data_master/' . $name) );
				}

				$data = generate_page('Edit Data Master Admin', 'data_master/edit/' . $name . '/' . $id, 'Admin');

					$data_content['title_page'] = 'Edit Data Master Admin';
					$data_content['data_admin'] = $this->m_datamaster->get_data_admin($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
		}
	}

	//

	public function add_new() {

		if( empty($this->uri->segment('3'))) {
			redirect( base_url() );
		}

		$name=$this->uri->segment('3');
			
		switch ($name) {
			case 'jabatan':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$nama_jabatan= $this->security->xss_clean( $this->input->post('nama_jabatan') );
					$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					$this->m_datamaster->jabatan_add_new(
						$nama_jabatan
					);
					redirect( base_url('data_master/' . $name) );
				}
				$data = generate_page('Entry Data Master Jabatan', 'data_master/add_new/jabatan', 'Admin');

					$data_content['title_page'] = 'Entry Data Master Jabatan';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterJabatan_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'bidang':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$nama_bidang= $this->security->xss_clean( $this->input->post('nama_bidang') );
					$this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					$this->m_datamaster->bidang_add_new(
						$nama_bidang
					);
					redirect( base_url('data_master/' . $name) );
				}
				$data = generate_page('Entry Data Master Bidang', 'data_master/add_new/bidang', 'Admin');

					$data_content['title_page'] = 'Entry Data Master Bidang';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterBidang_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'cuti':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$nama_cuti= $this->security->xss_clean( $this->input->post('nama_cuti') );
					$this->form_validation->set_rules('nama_cuti', 'Nama Cuti', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					$this->m_datamaster->cuti_add_new(
						$nama_cuti
					);
					redirect( base_url('data_master/' . $name) );
				}
				$data = generate_page('Entry Data Master Cuti', 'data_master/add_new/cuti', 'Admin');

					$data_content['title_page'] = 'Entry Data Master Cuti';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterCuti_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'sekolah':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$nama_sekolah= $this->security->xss_clean( $this->input->post('nama_sekolah') );
					$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					$this->m_datamaster->sekolah_add_new(
						$nama_sekolah
					);
					redirect( base_url('data_master/' . $name) );
				}
				$data = generate_page('Entry Data Master Sekolah', 'data_master/add_new/sekolah', 'Admin');

					$data_content['title_page'] = 'Entry Data Master Sekolah';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterSekolah_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'seminar':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$nama_seminar= $this->security->xss_clean( $this->input->post('nama_seminar') );
					$this->form_validation->set_rules('nama_seminar', 'Nama Seminar', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					$this->m_datamaster->seminar_add_new(
						$nama_seminar
					);
					redirect( base_url('data_master/' . $name) );
				}
				$data = generate_page('Entry Data Master Seminar', 'data_master/add_new/seminar', 'Admin');

					$data_content['title_page'] = 'Entry Data Master Seminar';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterSeminar_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'admin':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$username= $this->security->xss_clean( $this->input->post('username') );
					$email= $this->security->xss_clean( $this->input->post('email') );
					$namalengkap= $this->security->xss_clean( $this->input->post('namalengkap') );
					$password= $this->security->xss_clean( $this->input->post('password') );
					$type= $this->security->xss_clean( $this->input->post('type') );
					$avatar = '';
					// avatar
					if ( $this->security->xss_clean( $_FILES["avatar"] ) ) {
						$config['upload_path']          = './uploads/avatar/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 2000;
						$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);
				 
						$this->load->library('upload', $config);
				 
						if ( !$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect( base_url('data_master/edit/' . $name . '/' . $id) );
						} else {
							$avatar = $this->upload->data()['file_name'];
						}
					}
					// validasi
					$this->form_validation->set_rules('username', 'Username', 'required');
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
					$this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
					$this->form_validation->set_rules('password', 'Password', 'required');
					$this->form_validation->set_rules('type', 'Type', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					$this->m_datamaster->admin_add_new(
						$username, $email, $namalengkap, $password, $type, $avatar
					);
					redirect( base_url('data_master/' . $name) );
				}
				$data = generate_page('Entry Data Master Admin', 'data_master/add_new/admin', 'Admin');

					$data_content['title_page'] = 'Entry Data Master Admin';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'pegawai':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$nama= $this->security->xss_clean( $this->input->post('nama') );
					$nip= $this->security->xss_clean( $this->input->post('nip') );
					$tempat_lahir= $this->security->xss_clean( $this->input->post('tempat_lahir') );
					$tanggal_lahir= $this->security->xss_clean( $this->input->post('tanggal_lahir') );
					$jenis_kelamin= $this->security->xss_clean( $this->input->post('jenis_kelamin') );
					$pendidikan_terakhir= $this->security->xss_clean( $this->input->post('pendidikan_terakhir') );
					$status_perkawinan= $this->security->xss_clean( $this->input->post('status_perkawinan') );
					$status_pegawai= $this->security->xss_clean( $this->input->post('status_pegawai') );
					$id_jabatan= $this->security->xss_clean( $this->input->post('id_jabatan') );
					$id_bidang= $this->security->xss_clean( $this->input->post('id_bidang') );
					$agama= $this->security->xss_clean( $this->input->post('agama') );
					$alamat= $this->security->xss_clean( $this->input->post('alamat') );
					$no_ktp= $this->security->xss_clean( $this->input->post('no_ktp') );
					$no_rumah= $this->security->xss_clean( $this->input->post('no_rumah') );
					$no_handphone= $this->security->xss_clean( $this->input->post('no_handphone') );
					$email= $this->security->xss_clean( $this->input->post('email') );
					$password= $this->security->xss_clean( $this->input->post('password') );
					$id_user= $this->security->xss_clean( $this->input->post('id_user') );
					$tanggal_pengangkatan= $this->security->xss_clean( $this->input->post('tanggal_pengangkatan') );
					$avatar = '';
					// avatar
					if ( $this->security->xss_clean( $_FILES["avatar"] ) ) {
						$config['upload_path']          = './uploads/avatar/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 2000;
						$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);
				 
						$this->load->library('upload', $config);
				 
						if ( !$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect( base_url('data_master/edit/' . $name . '/' . $id) );
						} else {
							$avatar = $this->upload->data()['file_name'];
						}
					}
					// validasi
					$this->form_validation->set_rules('nama', 'Nama', 'required');
					$this->form_validation->set_rules('nip', 'NIP', 'required');
					$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
					$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
					$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
					$this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');
					$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'required');
					$this->form_validation->set_rules('status_pegawai', 'status_pegawai', 'required');
					$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
					$this->form_validation->set_rules('id_bidang', 'Bidang', 'required');
					$this->form_validation->set_rules('agama', 'Agama', 'required');
					$this->form_validation->set_rules('alamat', 'Alamat', 'required');
					$this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
					$this->form_validation->set_rules('no_rumah', 'No Rumah', 'required');
					$this->form_validation->set_rules('no_handphone', 'No Handphone', 'required');
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
					$this->form_validation->set_rules('password', 'Password', 'required');
					$this->form_validation->set_rules('id_user', 'ID User', 'required');
					$this->form_validation->set_rules('tanggal_pengangkatan', 'Tanggal Pengangkatan', 'required');
					
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect( base_url('data_master/add_new/' . $name) );
					}
					// to-do
					$this->m_datamaster->pegawai_add_new(
					$nama,$nip,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$pendidikan_terakhir,$status_perkawinan,
					$status_pegawai,$id_jabatan,$id_bidang,$agama,$alamat,$no_ktp,$no_rumah,$no_handphone,$email,
					$password,$id_user,$tanggal_pengangkatan,$avatar
					);
					redirect( base_url('data_master/' . $name) );
				}
				$data = generate_page('Entry Data Master Pegawai', 'data_master/add_new/pegawai', 'Admin');

					$data_content['list_bidang'] = $this->m_datamaster->get_list_bidang();
					$data_content['list_jabatan'] = $this->m_datamaster->get_list_jabatan();
					$data_content['title_page'] = 'Entry Data Master Pegawai';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterPegawai_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
		}
	}

}

/* End of file Data_Master.php */
/* Location: ./application/controllers/Data_Master.php */