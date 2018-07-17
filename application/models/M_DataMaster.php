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

	public function cuti_list_all() {
		$q=$this->db->select('*')->get('tb_cuti');
		return $q->result();
	}

	public function sekolah_list_all() {
		$q=$this->db->select('*')->get('tb_sekolah');
		return $q->result();
	}

	public function seminar_list_all() {
		$q=$this->db->select('*')->get('tb_seminar');
		return $q->result();
	}

	///

	public function update($id_nilai,$id_mahasiswa,$id_matakuliah,$nilai) {
		$d_t_d = array(
			'id_mahasiswa' => $id_mahasiswa,
			'id_matakuliah' => $id_matakuliah,
			'nilai' => $nilai
		);
		$this->db->where('id_nilai', $id_nilai)->update('nilai', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data nilai berhasil diubah');
	}

	//

	public function get_list_bidang() {
		$q=$this->db->select('*')->get('tb_bidang');
		return $q->result();
	}

	public function get_list_jabatan() {
		$q=$this->db->select('*')->get('tb_jabatan');
		return $q->result();
	}

	///

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

	public function get_data_cuti($id) {
		$q=$this->db->select('*')->from('tb_cuti')->where('id_cuti', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_master/cuti') );
		}
		return $q->row();
	}

	public function get_data_sekolah($id) {
		$q=$this->db->select('*')->from('tb_sekolah')->where('id_sekolah', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_master/sekolah') );
		}
		return $q->row();
	}

	public function get_data_seminar($id) {
		$q=$this->db->select('*')->from('tb_seminar')->where('id_seminar', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_master/seminar') );
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

	///

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

	public function cuti_update($id,$nama_cuti) {
		$d_t_d = array(
			'nama_cuti' => $nama_cuti
		);
		$this->db->where('id_cuti', $id)->update('tb_cuti', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data cuti berhasil diubah');
	}

	public function sekolah_update($id,$nama_sekolah) {
		$d_t_d = array(
			'nama_sekolah' => $nama_sekolah
		);
		$this->db->where('id_sekolah', $id)->update('tb_sekolah', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data sekolah berhasil diubah');
	}

	public function seminar_update($id,$nama_seminar) {
		$d_t_d = array(
			'nama_seminar' => $nama_seminar
		);
		$this->db->where('id_seminar', $id)->update('tb_seminar', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data seminar berhasil diubah');
	}

	public function admin_update($id_user,$username, $email, $namalengkap, $password, $type, $avatar='') {
		$d_t_d = array(
			'id_user' => $id_user,
			'username' => $username,
			'email' => $email,
			'namalengkap' => $namalengkap,
			'type' => $type,
			'avatar' => $avatar
		);
		if( !empty($password) ) {
			$d_t_d['password'] = md5($password);
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

	///

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

	public function cuti_delete($id) {
		$this->db->delete('tb_cuti', array('id_cuti' => $id));
	}

	public function sekolah_delete($id) {
		$this->db->delete('tb_sekolah', array('id_sekolah' => $id));
	}

	public function seminar_delete($id) {
		$this->db->delete('tb_seminar', array('id_seminar' => $id));
	}

	///

	public function admin_add_new(
		$username, $email, $namalengkap, $password, $type, $avatar=''
	) {
		$d_t_d = array(
			'username' => $username,
			'email' => $email,
			'namalengkap' => $namalengkap,
			'password' => md5($password),
			'type' => $type,
			'avatar' => $avatar
		);
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
		$this->session->set_flashdata('msg_alert', 'Nama jabatan baru berhasil ditambahkan');
	}

	public function bidang_add_new(
		$nama_bidang
	) {
		$d_t_d = array(
			'nama_bidang' => $nama_bidang
		);
		$this->db->insert('tb_bidang', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Nama bidang baru berhasil ditambahkan');
	}

	public function cuti_add_new(
		$nama_cuti
	) {
		$d_t_d = array(
			'nama_cuti' => $nama_cuti
		);
		$this->db->insert('tb_cuti', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Nama cuti baru berhasil ditambahkan');
	}

	public function sekolah_add_new(
		$nama_sekolah
	) {
		$d_t_d = array(
			'nama_sekolah' => $nama_sekolah
		);
		$this->db->insert('tb_sekolah', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Nama sekolah baru berhasil ditambahkan');
	}

	public function seminar_add_new(
		$nama_seminar
	) {
		$d_t_d = array(
			'nama_seminar' => $nama_seminar
		);
		$this->db->insert('tb_seminar', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Nama seminar baru berhasil ditambahkan');
	}

	public function pegawai_add_new(
		$nama,$nip,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$pendidikan_terakhir,$status_perkawinan,
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
			'password' => md5($password),
			'id_user' => $id_user,
			'tanggal_pengangkatan' => $tanggal_pengangkatan,
			'avatar' => $avatar
		);
		$this->db->insert('tb_pegawai', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Pegawai baru berhasil ditambahkan');
	}

}

/* End of file M_DataMaster.php */
/* Location: ./application/models/M_DataMaster.php */