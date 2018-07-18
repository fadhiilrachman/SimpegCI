<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DaftarIzin extends CI_Model {

	
	public function cuti_list_all() {
		$q=$this->db->select('p.nama, ic.id_izin, ic.id, ic.id_cuti, c.nama_cuti, ic.tempat, ic.tglawal, ic.tglakhir, ic.status')
				->from('tb_izincuti as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_cuti as c', 'c.id_cuti = ic.id_cuti', 'LEFT')
				->where('ic.id', $this->session->userdata('user_id'))
				->get();
		return $q->result();
	}

	public function sekolah_list_all() {
		$q=$this->db->select('p.nama, ic.id_izin, ic.id, ic.id_sekolah, c.nama_sekolah, ic.tempat, ic.tglawal, ic.tglakhir, ic.status')
				->from('tb_izinsekolah as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_sekolah as c', 'c.id_sekolah = ic.id_sekolah', 'LEFT')
				->where('ic.id', $this->session->userdata('user_id'))
				->get();
		return $q->result();
	}

	public function seminar_list_all() {
		$q=$this->db->select('p.nama, ic.id_izin, ic.id, ic.id_seminar, c.nama_seminar, ic.tempat, ic.tglawal, ic.tglakhir, ic.status')
				->from('tb_izinseminar as ic')
				->join('tb_pegawai as p', 'p.id = ic.id', 'LEFT')
				->join('tb_seminar as c', 'c.id_seminar = ic.id_seminar', 'LEFT')
				->where('ic.id', $this->session->userdata('user_id'))
				->get();
		return $q->result();
	}

}

/* End of file M_DaftarIzin.php */
/* Location: ./application/models/M_DaftarIzin.php */