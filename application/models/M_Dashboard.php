<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

	public function total_admin() {
		$q=$this->db->query('SELECT COUNT(*) FROM tb_admin');
		return $q->row_array()['COUNT(*)'];
	}

	public function total_dataizin() {
		$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_izin ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}

	public function total_izinterkonfirmasi() {
		$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_izin WHERE status!='waiting' ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}

	public function total_pegawai() {
		$q=$this->db->query('SELECT COUNT(*) FROM tb_pegawai');
		return $q->row_array()['COUNT(*)'];
	}

	public function pegawai_total_izincuti() {
		$q=$this->db->query("SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE ni.type='cuti' AND i.id='{$this->session->userdata('user_id')}'");
		return $q->row_array()['COUNT(*)'];
	}

	public function pegawai_total_izinsekolah() {
		$q=$this->db->query("SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE ni.type='sekolah' AND i.id='{$this->session->userdata('user_id')}'");
		return $q->row_array()['COUNT(*)'];
	}

	public function pegawai_total_izinseminar() {
		$q=$this->db->query("SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE ni.type='seminar' AND i.id='{$this->session->userdata('user_id')}'");
		return $q->row_array()['COUNT(*)'];
	}

	public function pegawai_izin_terkonfirmasi() {
		$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE status!='waiting' AND i.id='{$this->session->userdata('user_id')}' ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}

	public function baak_total_izincuti() {
		$q=$this->db->query("SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE ni.type='cuti'");
		return $q->row_array()['COUNT(*)'];
	}

	public function baak_total_izinsekolah() {
		$q=$this->db->query("SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE ni.type='sekolah'");
		return $q->row_array()['COUNT(*)'];
	}

	public function baak_total_izinseminar() {
		$q=$this->db->query("SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE ni.type='seminar'");
		return $q->row_array()['COUNT(*)'];
	}

	public function baak_izin_terkonfirmasi() {
		$q=$this->db->query("SELECT ( SELECT COUNT(*) FROM tb_izin AS i LEFT JOIN tb_namaizin AS ni ON i.id_namaizin=ni.id_namaizin WHERE status!='waiting' ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}

}

/* End of file M_Dashboard.php */
/* Location: ./application/models/M_Dashboard.php */