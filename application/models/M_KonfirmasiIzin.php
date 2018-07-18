<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_KonfirmasiIzin extends CI_Model {

	public function cuti_list_all() {
		$q=$this->db->select('p.nama, ic.id_izin, ic.id, ic.id_cuti, c.nama_cuti, ic.tempat, ic.tglawal, ic.tglakhir, ic.status')
				->from('tb_izincuti as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_cuti as c', 'c.id_cuti = ic.id_cuti', 'LEFT')
				->where('status', 'waiting')
				->get();
		return $q->result();
	}

	public function sekolah_list_all() {
		$q=$this->db->select('p.nama, ic.id_izin, ic.id, ic.id_sekolah, c.nama_sekolah, ic.tempat, ic.tglawal, ic.tglakhir, ic.status')
				->from('tb_izinsekolah as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_sekolah as c', 'c.id_sekolah = ic.id_sekolah', 'LEFT')
				->where('status', 'waiting')
				->get();
		return $q->result();
	}

	public function seminar_list_all() {
		$q=$this->db->select('p.nama, ic.id_izin, ic.id, ic.id_seminar, c.nama_seminar, ic.tempat, ic.tglawal, ic.tglakhir, ic.status')
				->from('tb_izinseminar as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_seminar as c', 'c.id_seminar = ic.id_seminar', 'LEFT')
				->where('status', 'waiting')
				->get();
		return $q->result();
	}

	public function accept_izin($id_izin, $type) {
		$d_t_d = array(
			'status' => 'approved'
		);
		$this->db->where('id_izin', $id_izin)->update('tb_izin' . $type, $d_t_d);
	}

	public function reject_izin($id_izin, $type) {
		$d_t_d = array(
			'status' => 'rejected'
		);
		$this->db->where('id_izin', $id_izin)->update('tb_izin' . $type, $d_t_d);
	}

}

/* End of file M_KonfirmasiIzin.php */
/* Location: ./application/models/M_KonfirmasiIzin.php */