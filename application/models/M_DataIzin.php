<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DataIzin extends CI_Model {

	public function tbcuti_list_all() {
		$q=$this->db->select('*')->get('tb_cuti');
		return $q->result();
	}

	public function tbsekolah_list_all() {
		$q=$this->db->select('*')->get('tb_sekolah');
		return $q->result();
	}

	public function tbseminar_list_all() {
		$q=$this->db->select('*')->get('tb_seminar');
		return $q->result();
	}

	public function pegawai_list_all() {
		$q=$this->db->select('*')->get('tb_pegawai');
		return $q->result();
	}

	//

	public function cuti_add_new($id_cuti,$id,$tglawal,$tglakhir,$tempat,$status) {
		$d_t_d = array(
			'id_cuti' => $id_cuti,
			'id' => $id,
			'tglawal' => $tglawal,
			'tglakhir' => $tglakhir,
			'tempat' => $tempat,
			'status' => $status,
		);
		$this->db->insert('tb_izincuti', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data izin cuti berhasil ditambahkan');
	}

	public function sekolah_add_new($id_sekolah,$id,$tglawal,$tglakhir,$tempat,$status) {
		$d_t_d = array(
			'id_sekolah' => $id_sekolah,
			'id' => $id,
			'tglawal' => $tglawal,
			'tglakhir' => $tglakhir,
			'tempat' => $tempat,
			'status' => $status,
		);
		$this->db->insert('tb_izinsekolah', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data izin sekolah berhasil ditambahkan');
	}

	public function seminar_add_new($id_seminar,$id,$tglawal,$tglakhir,$tempat,$status) {
		$d_t_d = array(
			'id_seminar' => $id_seminar,
			'id' => $id,
			'tglawal' => $tglawal,
			'tglakhir' => $tglakhir,
			'tempat' => $tempat,
			'status' => $status,
		);
		$this->db->insert('tb_izinseminar', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data izin seminar berhasil ditambahkan');
	}

	//

	public function cuti_update($id_izin,$id_cuti,$id,$tglawal,$tglakhir,$tempat,$status) {
		$d_t_d = array(
			'id_cuti' => $id_cuti,
			'id' => $id,
			'tglawal' => $tglawal,
			'tglakhir' => $tglakhir,
			'tempat' => $tempat,
			'status' => $status
		);
		$this->db->where( 'id_izin', $id_izin )->update('tb_izincuti', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data izin cuti berhasil diubah');
	}

	public function sekolah_update($id_izin,$id_sekolah,$id,$tglawal,$tglakhir,$tempat,$status) {
		$d_t_d = array(
			'id_sekolah' => $id_sekolah,
			'id' => $id,
			'tglawal' => $tglawal,
			'tglakhir' => $tglakhir,
			'tempat' => $tempat,
			'status' => $status,
		);
		$this->db->where( 'id_izin', $id_izin )->update('tb_izinsekolah', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data izin sekolah berhasil diubah');
	}

	public function seminar_update($id_izin,$id_seminar,$id,$tglawal,$tglakhir,$tempat,$status) {
		$d_t_d = array(
			'id_seminar' => $id_seminar,
			'id' => $id,
			'tglawal' => $tglawal,
			'tglakhir' => $tglakhir,
			'tempat' => $tempat,
			'status' => $status,
		);
		$this->db->where( 'id_izin', $id_izin )->update('tb_izinseminar', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data izin seminar berhasil diubah');
	}

	//

	public function cuti_list_all() {
		$q=$this->db->select('p.nama, ic.id_izin, ic.id, ic.id_cuti, c.nama_cuti, ic.tempat, ic.tglawal, ic.tglakhir, ic.status')
				->from('tb_izincuti as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_cuti as c', 'c.id_cuti = ic.id_cuti', 'LEFT')
				->get();
		return $q->result();
	}

	public function sekolah_list_all() {
		$q=$this->db->select('p.id, p.nama, ic.id_izin, ic.id_sekolah, c.nama_sekolah, ic.tempat, ic.tglawal, ic.tglakhir, ic.status')
				->from('tb_izinsekolah as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_sekolah as c', 'c.id_sekolah= ic.id_sekolah', 'LEFT')
				->get();
		return $q->result();
	}

	public function seminar_list_all() {
		$q=$this->db->select('p.id, p.nama, ic.id_izin, ic.id_seminar, c.nama_seminar, ic.tempat, ic.tglawal, ic.tglakhir, ic.status')
				->from('tb_izinseminar as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_seminar as c', 'c.id_seminar = ic.id_seminar', 'LEFT')
				->get();
		return $q->result();
	}

	//

	public function get_data_cuti($id) {
		$q=$this->db->select('p.nama, ic.id_izin, ic.id, ic.id_cuti, c.nama_cuti, ic.tempat, ic.tglawal, ic.tglakhir, ic.status')
				->from('tb_izincuti as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_cuti as c', 'c.id_cuti = ic.id_cuti', 'LEFT')
				->where( 'ic.id_izin', $id )
				->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_izin/cuti') );
		}
		return $q->row();
	}

	public function get_data_sekolah($id) {
		$q=$this->db->select('p.nama, ic.id_izin, ic.id, ic.id_sekolah, c.nama_sekolah, ic.tempat, ic.tglawal, ic.tglakhir, ic.status')
				->from('tb_izinsekolah as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_sekolah as c', 'c.id_sekolah = ic.id_sekolah', 'LEFT')
				->where( 'ic.id_izin', $id )
				->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_izin/sekolah') );
		}
		return $q->row();
	}

	public function get_data_seminar($id) {
		$q=$this->db->select('p.nama, ic.id_izin, ic.id, ic.id_seminar, c.nama_seminar, ic.tempat, ic.tglawal, ic.tglakhir, ic.status')
				->from('tb_izinseminar as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_seminar as c', 'c.id_seminar = ic.id_seminar', 'LEFT')
				->where( 'ic.id_izin', $id )
				->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/data_izin/seminar') );
		}
		return $q->row();
	}

	///

	public function sekolah_delete($id) {
		$this->db->delete('tb_izinsekolah', array('id_izin' => $id));
	}

	public function cuti_delete($id) {
		$this->db->delete('tb_izincuti', array('id_izin' => $id));
	}

	public function seminar_delete($id) {
		$this->db->delete('tb_izinseminar', array('id_izin' => $id));
	}

}

/* End of file M_DataIzin.php */
/* Location: ./application/models/M_DataIzin.php */