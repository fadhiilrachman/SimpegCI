<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_AjukanIzin extends CI_Model {

	public function get_data_cuti($id) {
		$q=$this->db->select('b.nama_bidang, j.nama_jabatan, p.nama, p.nip, c.nama_cuti, ic.tempat, ic.tglawal, ic.tglakhir')
				->from('tb_izincuti as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_jabatan as j', 'j.id_jabatan = p.id_jabatan', 'LEFT')
				->join('tb_bidang as b', 'b.id_bidang = p.id_bidang', 'LEFT')
				->join('tb_cuti as c', 'c.id_cuti = ic.id_cuti', 'LEFT')
				->where( 'ic.id_izin', $id )
				->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/ajukan_izin/cuti') );
		}
		return $q->row();
	}

	public function get_data_sekolah($id) {
		$q=$this->db->select('b.nama_bidang, j.nama_jabatan, p.nama, p.nip, c.nama_sekolah, ic.tempat, ic.tglawal, ic.tglakhir')
				->from('tb_izinsekolah as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_jabatan as j', 'j.id_jabatan = p.id_jabatan', 'LEFT')
				->join('tb_bidang as b', 'b.id_bidang = p.id_bidang', 'LEFT')
				->join('tb_sekolah as c', 'c.id_sekolah = ic.id_sekolah', 'LEFT')
				->where( 'ic.id_izin', $id )
				->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/ajukan_izin/sekolah') );
		}
		return $q->row();
	}

	public function get_data_seminar($id) {
		$q=$this->db->select('b.nama_bidang, j.nama_jabatan, p.nama, p.nip, c.nama_seminar, ic.tempat, ic.tglawal, ic.tglakhir')
				->from('tb_izinseminar as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_jabatan as j', 'j.id_jabatan = p.id_jabatan', 'LEFT')
				->join('tb_bidang as b', 'b.id_bidang = p.id_bidang', 'LEFT')
				->join('tb_seminar as c', 'c.id_seminar = ic.id_seminar', 'LEFT')
				->where( 'ic.id_izin', $id )
				->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/ajukan_izin/seminar') );
		}
		return $q->row();
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

	public function izin_cuti($id_cuti,$tglawal,$tglakhir,$tempat) {

		$d_t_d = array(
			'id_cuti' => $id_cuti,
			'id' => $this->session->userdata('user_id'),
			'tglawal' => $tglawal,
			'tglakhir' => $tglakhir,
			'tempat' => $tempat,
			'status' => 'waiting',
		);
		$this->db->insert('tb_izincuti', $d_t_d);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	public function izin_sekolah($id_sekolah,$tglawal,$tglakhir,$tempat) {

		$d_t_d = array(
			'id_sekolah' => $id_sekolah,
			'id' => $this->session->userdata('user_id'),
			'tglawal' => $tglawal,
			'tglakhir' => $tglakhir,
			'tempat' => $tempat,
			'status' => 'waiting',
		);
		$this->db->insert('tb_izinsekolah', $d_t_d);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	public function izin_seminar($id_seminar,$tglawal,$tglakhir,$tempat) {

		$d_t_d = array(
			'id_seminar' => $id_seminar,
			'id' => $this->session->userdata('user_id'),
			'tglawal' => $tglawal,
			'tglakhir' => $tglakhir,
			'tempat' => $tempat,
			'status' => 'waiting',
		);
		$this->db->insert('tb_izinseminar', $d_t_d);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

}

/* End of file M_AjukanIzin.php */
/* Location: ./application/models/M_AjukanIzin.php */