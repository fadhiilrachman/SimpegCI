<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $m_auth;

	function __construct() {
		parent::__construct();
		$this->load->model('M_Auth');
		$this->m_auth = $this->M_Auth;
	}

	public function index() {
		is_login(function() {
			redirect( base_url('dashboard') );
		});
		isnt_login(function() {
			redirect( base_url('auth/login') );
		});
	}

	public function login() {
		is_login(function() {
			redirect( base_url('dashboard') );
		});
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			$resp_recaptcha= $this->input->post('g-recaptcha-response');
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$data = array(
				'secret' => '6LftN2IUAAAAAOlWDseBz4IYxaU36vLE9Ey0f5_2',
				'response' => $resp_recaptcha
			);
			$options = array(
				'http' => array (
					'method' => 'POST',
					'content' => http_build_query($data)
				)
			);
			$context  = stream_context_create($options);
			$verify = file_get_contents($url, false, $context);
			$captcha_success=json_decode($verify);
			if ($captcha_success->success==false) {
				$this->session->set_flashdata('msg_alert', 'Captcha tidak valid');
				redirect( base_url('auth/login') );
			}
			$email= $this->security->xss_clean( $this->input->post('email') );
			$password= $this->security->xss_clean( $this->input->post('password') );
			// validasi
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if(!$this->form_validation->run()) {
				$this->session->set_flashdata('msg_alert', 'Masukkan email dan password');
				redirect( base_url('auth/login') );
			}
			// lakukan login
			$this->m_auth->doLogin($email, $password);
		} else {
			$this->load->view('V_Auth');
		}
	}

	public function lost_password() {
		is_login(function() {
			redirect( base_url('dashboard') );
		});
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			$resp_recaptcha= $this->input->post('g-recaptcha-response');
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$data = array(
				'secret' => '6LftN2IUAAAAAOlWDseBz4IYxaU36vLE9Ey0f5_2',
				'response' => $resp_recaptcha
			);
			$options = array(
				'http' => array (
					'method' => 'POST',
					'content' => http_build_query($data)
				)
			);
			$context  = stream_context_create($options);
			$verify = file_get_contents($url, false, $context);
			$captcha_success=json_decode($verify);
			if ($captcha_success->success==false) {
				$this->session->set_flashdata('msg_alert', 'Captcha tidak valid');
				redirect( base_url('auth/lost_password') );
			}
			$email= $this->security->xss_clean( $this->input->post('email') );
			// validasi
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
			if(!$this->form_validation->run()) {
				$this->session->set_flashdata('msg_alert', 'Masukkan email anda');
				redirect( base_url('auth/lost_password') );
			}
			// lakukan reset password
			$this->m_auth->doResetPassword($email, $password);
		} else {
			$this->load->view('V_LostPassword');
		}
	}

	public function logout() {
		isnt_login(function() {
			redirect( base_url('auth/login') );
		});
		$this->session->sess_destroy();
		redirect( base_url() );
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/Auth.php */