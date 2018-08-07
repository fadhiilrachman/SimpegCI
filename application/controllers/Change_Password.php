<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_Password extends CI_Controller {

	private $m_cp;

	function __construct() {
		parent::__construct();
		$this->load->model('M_ChangePassword');
		$this->m_cp = $this->M_ChangePassword;
		isnt_login(function() {
			redirect( base_url('dashboard') );
		});
		if( $this->session->userdata('user_type') == 'admin' ) {
			$this->user_type = 'Admin';
		} else if( $this->session->userdata('user_type') == 'baak' ) {
			$this->user_type = 'BAAK';
		} else if( $this->session->userdata('user_type') == 'pegawai' ) {
			$this->user_type = 'Pegawai';
		}
	}

	public function index() {
		if( $_SERVER['REQUEST_METHOD'] == 'POST') {
			$old_pass= $this->security->xss_clean( $this->input->post('old_pass') );
			$new_pass= $this->security->xss_clean( $this->input->post('new_pass') );
			$conf_new_pass= $this->security->xss_clean( $this->input->post('conf_new_pass') );

			$this->form_validation->set_rules('old_pass', 'Password Lama', 'required');
			$this->form_validation->set_rules('new_pass', 'Password Baru', 'required');
			$this->form_validation->set_rules('conf_new_pass', 'Konfirmasi Password Baru', 'required');
			if(!$this->form_validation->run()) {
				$this->session->set_flashdata('msg_alert', validation_errors());
				redirect( base_url('change_password') );
			}
			// to-do
			$this->m_cp->change_password(
				$old_pass,$new_pass,$conf_new_pass
			);
			redirect( base_url('change_password') );
		}
		$data = generate_page('Ganti Password', 'change_password', $this->user_type);

			$data_content['title_page'] = 'Ganti Password';
		$data['content'] = $this->load->view('partial/ChangePassword', $data_content, true);
		$this->load->view('V_Change_Password', $data);
	}

}

/* End of file Change_Password.php */
/* Location: ./application/controllers/Change_Password.php */