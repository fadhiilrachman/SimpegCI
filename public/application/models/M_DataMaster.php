<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DataMaster extends CI_Model {

	public function admin_list_all() {
		$q=$this->db->select('*')->get('tb_admin');
		return $q->result();
	}

	public function jabatan_list_all() {
		$q=$this->db->select('*')->get('tb_jabatan');
		return $q->result();
	}

	public function bidang_list_all() {
		$q=$this->db->select('*')->get('tb_bidang');
		return $q->result();
	}

	public function pegawai_list_all() {
		$q=$this->db->select('*')
				->from('tb_pegawai as p')
				->join('tb_bidang as b', 'b.id_bidang = p.id_bidang', 'LEFT')
				->join('tb_jabatan as j', 'j.id_jabatan = p.id_jabatan', 'LEFT')
				->get();
		return $q->result();
	}

	public function namaizin_list_all() {
		$q=$this->db->select('*')->get('tb_namaizin');
		return $q->result();
	}

	public function get_list_bidang() {
		$q=$this->db->select('*')->get('tb_bidang');
		return $q->result();
	}

	public function get_list_jabatan() {
		$q=$this->db->select('*')->get('tb_jabatan');
		return $q->result();
	}

	public function get_data_jabatan($id) {
		$q=$this->db->select('*')->from('tb_jabatan')->where('id_jabatan', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_master/jabatan') );
		}
		return $q->row();
	}

	public function get_data_bidang($id) {
		$q=$this->db->select('*')->from('tb_bidang')->where('id_bidang', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_master/bidang') );
		}
		return $q->row();
	}

	public function get_data_namaizin($id) {
		$q=$this->db->select('*')->from('tb_namaizin')->where('id_namaizin', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_master/cuti') );
		}
		return $q->row();
	}

	public function get_data_admin($id) {
		$q=$this->db->select('*')->from('tb_admin')->where('id_user', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_master/admin') );
		}
		return $q->row();
	}

	public function get_data_pegawai($id) {
		$q=$this->db->select('*')
				->from('tb_pegawai as p')
				->join('tb_bidang as b', 'b.id_bidang = p.id_bidang', 'LEFT')
				->join('tb_jabatan as j', 'j.id_jabatan = p.id_jabatan', 'LEFT')
				->where('id', $id)
				->limit(1)
				->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_master/pegawai') );
		}
		return $q->row();
	}

	public function jabatan_update($id,$nama_jabatan) {
		$d_t_d = array(
			'nama_jabatan' => $nama_jabatan
		);
		$this->db->where('id_jabatan', $id)->update('tb_jabatan', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data jabatan berhasil diubah');
	}

	public function bidang_update($id,$nama_bidang) {
		$d_t_d = array(
			'nama_bidang' => $nama_bidang
		);
		$this->db->where('id_bidang', $id)->update('tb_bidang', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data bidang berhasil diubah');
	}

	public function namaizin_update($id_namaizin,$type,$nama_izin) {
		$d_t_d = array(
			'type' => $type,
			'nama_izin' => $nama_izin
		);
		$this->db->where('id_namaizin', $id_namaizin)->update('tb_namaizin', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data nama izin berhasil diubah');
	}

	public function admin_update($id_user,$username, $email, $namalengkap, $password, $type, $avatar) {
		$d_t_d = array(
			'id_user' => $id_user,
			'username' => $username,
			'email' => $email,
			'namalengkap' => $namalengkap,
			'type' => $type
		);
		if( !empty($password) ) {
			$d_t_d['password'] = md5($password);
		}
		if( !empty($avatar) ) {
			$d_t_d['avatar'] = $avatar;
		}
		$this->db->where('id_user', $id_user)->update('tb_admin', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data admin berhasil diubah');
	}

	public function pegawai_update(
		$id,$nama,$nip,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$pendidikan_terakhir,$status_perkawinan,
		$status_pegawai,$id_jabatan,$id_bidang,$agama,$alamat,$no_ktp,$no_rumah,$no_handphone,$email,
		$password,$id_user,$tanggal_pengangkatan,$avatar
	) {
		$d_t_d = array(
			'nama' => $nama,
			'nip' => $nip,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'pendidikan_terakhir' => $pendidikan_terakhir,
			'status_perkawinan' => $status_perkawinan,
			'status_pegawai' => $status_pegawai,
			'id_jabatan' => $id_jabatan,
			'id_bidang' => $id_bidang,
			'agama' => $agama,
			'alamat' => $alamat,
			'no_ktp' => $no_ktp,
			'no_rumah' => $no_rumah,
			'no_handphone' => $no_handphone,
			'email' => $email,
			'id_user' => $id_user,
			'tanggal_pengangkatan' => $tanggal_pengangkatan
		);
		if( !empty($password) ) {
			$d_t_d['password'] = md5($password);
		}
		if( !empty($avatar) ) {
			$d_t_d['avatar'] = $avatar;
		}
		$this->db->where('id', $id)->update('tb_pegawai', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data pegawai berhasil diubah');
	}

	public function admin_delete($id) {
		$this->db->delete('tb_admin', array('id_user' => $id));
	}

	public function jabatan_delete($id) {
		$this->db->delete('tb_jabatan', array('id_jabatan' => $id));
	}

	public function bidang_delete($id) {
		$this->db->delete('tb_bidang', array('id_bidang' => $id));
	}

	public function pegawai_delete($id) {
		$this->db->delete('tb_pegawai', array('id' => $id));
	}

	public function namaizin_delete($id) {
		$this->db->delete('tb_namaizin', array('id_namaizin' => $id));
	}

	public function admin_add_new(
		$username, $email, $namalengkap, $password, $type, $avatar=0
	) {
		$d_t_d = array(
			'username' => $username,
			'email' => $email,
			'namalengkap' => $namalengkap,
			'password' => md5($password),
			'type' => $type,
			'avatar' => $avatar
		);
		if( empty($avatar) ) {
			$d_t_d['avatar'] = 'avatar.png';
		}
		$this->db->insert('tb_admin', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Admin baru berhasil ditambahkan');
	}

	public function jabatan_add_new(
		$nama_jabatan
	) {
		$d_t_d = array(
			'nama_jabatan' => $nama_jabatan
		);
		$this->db->insert('tb_jabatan', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Jabatan baru berhasil ditambahkan');
	}

	public function bidang_add_new(
		$nama_bidang
	) {
		$d_t_d = array(
			'nama_bidang' => $nama_bidang
		);
		$this->db->insert('tb_bidang', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Bidang baru berhasil ditambahkan');
	}

	public function namaizin_add_new(
		$type,$nama_izin
	) {
		$d_t_d = array(
			'type' => $type,
			'nama_izin' => $nama_izin
		);
		$this->db->insert('tb_namaizin', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Nama izin baru berhasil ditambahkan');
	}

	public function pegawai_add_new(
		$nama,$nip,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$pendidikan_terakhir,$status_perkawinan,
		$status_pegawai,$id_jabatan,$id_bidang,$agama,$alamat,$no_ktp,$no_rumah,$no_handphone,$email,
		$password,$id_user,$tanggal_pengangkatan,$avatar=0
	) {
		$d_t_d = array(
			'nama' => $nama,
			'nip' => $nip,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'pendidikan_terakhir' => $pendidikan_terakhir,
			'status_perkawinan' => $status_perkawinan,
			'status_pegawai' => $status_pegawai,
			'id_jabatan' => $id_jabatan,
			'id_bidang' => $id_bidang,
			'agama' => $agama,
			'alamat' => $alamat,
			'no_ktp' => $no_ktp,
			'no_rumah' => $no_rumah,
			'no_handphone' => $no_handphone,
			'email' => $email,
			'password' => md5($password),
			'id_user' => $id_user,
			'tanggal_pengangkatan' => $tanggal_pengangkatan,
			'avatar' => $avatar
		);
		if( empty($avatar) ) {
			$d_t_d['avatar'] = 'avatar.png';
		}
		$this->db->insert('tb_pegawai', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Pegawai baru berhasil ditambahkan');
	}

}

/* End of file M_DataMaster.php */
/* Location: ./application/models/M_DataMaster.php */