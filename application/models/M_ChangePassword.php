<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ChangePassword extends CI_Model {

	public function change_password($old_pass,$new_pass,$conf_new_pass) {
		$user_id = $this->session->userdata('user_id');
		if( $this->session->userdata('user_type') == 'pegawai') {
			$kolom = 'id';
			$table = 'tb_pegawai';
		} else {
			$kolom = 'id_user';
			$table = 'tb_admin';
		}
		$q=$this->db->select('password')->from($table)->where($kolom, $user_id)->get();
		$data = $q->row();
		if( md5($old_pass) !== $data->password) {
			$this->session->set_flashdata('msg_alert', 'Password lama tidak sama');
			redirect( base_url('change_password') );
		}
		if( md5($new_pass) !== md5($conf_new_pass)) {
			$this->session->set_flashdata('msg_alert', 'Konfirmasi password baru tidak sama');
			redirect( base_url('change_password') );
		}
		$d_t_d = array(
			'password' => md5($conf_new_pass)
		);
		$this->db->where($kolom, $user_id)->update($table, $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Password berhasil diganti');
	}

}

/* End of file M_ChangePassword.php */
/* Location: ./application/models/M_ChangePassword.php */
