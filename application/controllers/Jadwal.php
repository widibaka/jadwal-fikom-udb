<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Jadwal Kuliah Fikom UDB";
		$jadwal = $this->db->get('_jadwal')->result_array();

		$jurusan = [];

		foreach ($jadwal as $key => $value) {
			array_push($jurusan, strtoupper($value['jurusan']));
		}

		$data['jurusan'] = array_unique($jurusan);

		$this->load->view('_jadwal_index', $data);
	}

	public function kelas($jurusan = '', $kelas = '', $jenis = '')
	{
		$data['title'] = "Jadwal " . strtoupper($kelas);
		$data['jurusan'] = $jurusan;
		$data['jenis'] = $jenis;
		$data['kelas'] = $kelas;

		if ( !empty($kelas) ) {
			$this->load->view('_jadwal', $data);
		}
	}

	public function dosen_index()
	{
		$data['title'] = "Jadwal Dosen";
		$this->db->order_by("dosen", "ASC");
		$jadwal = $this->db->get('_jadwal')->result_array();

		$dosen = [];

		foreach ($jadwal as $key => $value) {
			array_push($dosen, $value['dosen']);
		}

		$data['dosen'] = array_unique($dosen);

		$this->load->view('_jadwal_dosen_index', $data);
	}

	public function dosen($dosen = '' , $jenis = '' )
	{
		$dosen_decoded = base64_decode(str_replace('garis_miring', '/', $dosen));
		$data['title'] = "Jadwal " . $dosen_decoded;
		$data['dosen'] = $dosen;
		$data['jenis'] = $jenis;

		if ( !empty($dosen) ) {
			$this->load->view('_jadwal_dosen', $data);
		}
	}

	public function jurusan($jurusan = '')
	{
		$data['title'] = "Jadwal Kuliah " . strtoupper($jurusan);
		$this->db->where("jurusan", $jurusan);
		$this->db->order_by("kelas", "DESC");
		$jadwal = $this->db->get('_jadwal')->result_array();

		$classes = [];

		foreach ($jadwal as $key => $value) {
			array_push($classes, $value['kelas']);
		}

		$data['classes'] = array_unique($classes);
		$data['jurusan'] = $jurusan;

		$this->load->view('_jadwal_jurusan', $data);
	}
	public function get_jadwal_dosen( $dosen = '', $jenis = '' )
	{
		$dosen = base64_decode(str_replace('garis_miring', '/', $dosen));

		if ( $jenis == 'semua' ) {
			$mati = 'bg-abu-abu';
			$timer_mati = 'd-none';
		}else {
			$mati = 'bg-abu-abu d-none';
			$timer_mati = 'd-none';
		}
		$this->db->where("dosen", $dosen);

		// kalau  jenisnya kosong, berarti yg tampil jadwal hari ini. Urutin berdasarkan jam mulai
		if ( empty($jenis) ) {
			$this->db->order_by("jam_mulai", "ASC");
		}
		elseif ( !empty($jenis) ) {
			$this->db->order_by("index_hari", "ASC");
		}
		$jadwal = $this->db->get('_jadwal')->result_array();
		$data['jadwal'] = $this->proses_jadwal($jadwal, $mati, $timer_mati);

		$this->load->view('_jadwal_dosen_content', $data);
	}
	public function get_jadwal($jurusan = '', $kelas, $jenis = '')
	{
		if ( $jenis == 'semua' ) {
			$mati = 'bg-abu-abu';
			$timer_mati = 'd-none';
		}else {
			$mati = 'bg-abu-abu d-none';
			$timer_mati = 'd-none';
		}
		// kalau  jenisnya kosong, berarti yg tampil jadwal hari ini. Urutin berdasarkan jam mulai
		if ( empty($jenis) ) {
			$this->db->order_by("jam_mulai", "ASC");
		}
		elseif ( !empty($jenis) ) {
			$this->db->order_by("index_hari", "ASC");
		}
		$this->db->where("jurusan", strtolower($jurusan));
		$this->db->where("kelas", strtolower($kelas));
		$jadwal = $this->db->get('_jadwal')->result_array();
		$data['jadwal'] = $this->proses_jadwal($jadwal, $mati, $timer_mati);

		$this->load->view('_jadwal_content', $data);
	}
	public function proses_jadwal($jadwal, $mati, $timer_mati)
	{
		for ($i=0; $i < count($jadwal); $i++) { 			
			$selisih_dg_waktu_mulai = time() - strtotime($jadwal[$i]['jam_mulai']);
			$selisih_dg_waktu_selesai = strtotime($jadwal[$i]['jam_selesai']) - time();

			// masukin ke array
			$jadwal[$i]['selisih_dg_waktu_mulai'] = $selisih_dg_waktu_mulai;
			$jadwal[$i]['selisih_dg_waktu_selesai'] = $selisih_dg_waktu_selesai;
			
			// $durasi = strtotime($jadwal[$i]['jam_selesai']) - strtotime($jadwal[$i]['jam_mulai']);
			$jadwal[$i]['nyala'] = '';
			$jadwal[$i]['timer'] = '';
			
			switch ( preg_replace( "/\r|\n/", "", strtolower($jadwal[$i]['hari'])) ) {
			  	case "senin":
			      $jadwal[$i]['day'] = 'monday';
			      break;
			  	case "selasa":
			      $jadwal[$i]['day'] = 'tuesday';
			      break;
			  	case "rabu":
			      $jadwal[$i]['day'] = 'wednesday';
			      break;
			  	case "kamis":
			      $jadwal[$i]['day'] = 'thursday';
			      break;
			  	case "jumat":
			      $jadwal[$i]['day'] = 'friday';
			      break;
			  	case "sabtu":
			      $jadwal[$i]['day'] = 'saturday';
			      break;
			    default:
			      $jadwal[$i]['day'] = '';
			}


			if ( strtolower($jadwal[$i]['day']) == strtolower( date("l") ) ) {
				$limabelas_menit = 60*15;
				$jadwal[$i]['nyala'] .= 'text-dark border-kiri';
				if ( $selisih_dg_waktu_mulai > -$limabelas_menit &&  $selisih_dg_waktu_selesai > 0 ) {
					$jadwal[$i]['nyala'] .= ' myGlower';
				}
			}else{
				$jadwal[$i]['nyala'] .= $mati;
				$jadwal[$i]['timer'] .= $timer_mati;
			}
		}
		return $jadwal;
	}
}
