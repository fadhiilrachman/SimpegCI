<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

	public function total_admin() {
		$q=$this->db->query('SELECT COUNT(*) FROM tb_admin');
		return $q->row_array()['COUNT(*)'];
	}

	public function total_dataizin() {
		$q=$this->db->query('SELECT ( (SELECT COUNT(*) FROM tb_izincuti) + (SELECT COUNT(*) FROM tb_izinsekolah) + (SELECT COUNT(*) FROM tb_izinseminar) ) AS TOTAL');
		return $q->row_array()['TOTAL'];
	}

	public function total_izinterkonfirmasi() {
		$q=$this->db->query("SELECT ( (SELECT COUNT(*) FROM tb_izincuti WHERE status!='waiting') + (SELECT COUNT(*) FROM tb_izinsekolah WHERE status!='waiting') + (SELECT COUNT(*) FROM tb_izinseminar WHERE status!='waiting') ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}

	public function total_pegawai() {
		$q=$this->db->query('SELECT COUNT(*) FROM tb_pegawai');
		return $q->row_array()['COUNT(*)'];
	}

	public function pegawai_total_izincuti() {
		$q=$this->db->query("SELECT COUNT(*) FROM tb_izincuti WHERE id='{$this->session->userdata('user_id')}'");
		return $q->row_array()['COUNT(*)'];
	}

	public function pegawai_total_izinsekolah() {
		$q=$this->db->query("SELECT COUNT(*) FROM tb_izinsekolah WHERE id='{$this->session->userdata('user_id')}'");
		return $q->row_array()['COUNT(*)'];
	}

	public function pegawai_total_izinseminar() {
		$q=$this->db->query("SELECT COUNT(*) FROM tb_izinseminar WHERE id='{$this->session->userdata('user_id')}'");
		return $q->row_array()['COUNT(*)'];
	}

	public function pegawai_izin_terkonfirmasi() {
		$q=$this->db->query("SELECT ( (SELECT COUNT(*) FROM tb_izincuti WHERE status!='waiting' AND id='{$this->session->userdata('user_id')}') + (SELECT COUNT(*) FROM tb_izinsekolah WHERE status!='waiting' AND id='{$this->session->userdata('user_id')}') + (SELECT COUNT(*) FROM tb_izinseminar WHERE status!='waiting' AND id='{$this->session->userdata('user_id')}') ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}

	public function baak_total_izincuti() {
		$q=$this->db->query("SELECT COUNT(*) FROM tb_izincuti");
		return $q->row_array()['COUNT(*)'];
	}

	public function baak_total_izinsekolah() {
		$q=$this->db->query("SELECT COUNT(*) FROM tb_izinsekolah");
		return $q->row_array()['COUNT(*)'];
	}

	public function baak_total_izinseminar() {
		$q=$this->db->query("SELECT COUNT(*) FROM tb_izinseminar");
		return $q->row_array()['COUNT(*)'];
	}

	public function baak_izin_terkonfirmasi() {
		$q=$this->db->query("SELECT ( (SELECT COUNT(*) FROM tb_izincuti WHERE status!='waiting') + (SELECT COUNT(*) FROM tb_izinsekolah WHERE status!='waiting') + (SELECT COUNT(*) FROM tb_izinseminar WHERE status!='waiting') ) AS TOTAL");
		return $q->row_array()['TOTAL'];
	}

}

/* End of file M_Dashboard.php */
/* Location: ./application/models/M_Dashboard.php */