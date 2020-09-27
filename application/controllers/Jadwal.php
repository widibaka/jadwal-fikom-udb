<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('_jadwalModel');

	}

	public function set_view_count()
	{
		$angka = file_get_contents("view.txt");
		$myfile = fopen("view.txt", "w") or die("Unable to open file!");
		$angka = $angka+1;

		fwrite($myfile, $angka);
		fclose($myfile);
	}

	////////////////////////////////////////////////////////////

	public function index()
	{
		$this->set_view_count();
		$jadwal = $this->db->get('_jadwal')->result_array();

		$data['icon'] = "02.gif";
		$data['title'] = "Home";
		// sidebar
		$jurusan = [];

		foreach ($jadwal as $key => $value) {
			array_push($jurusan, strtoupper($value['jurusan']));
		}

		$data['jurusan'] = array_unique($jurusan);

		// sidebar
		$data['sidebar'] = [
			'Home' => base_url(),
			'TI' => base_url() . 'jadwal/jurusan/TI',
			'MI' => base_url() . 'jadwal/jurusan/MI',
			'SI' => base_url() . 'jadwal/jurusan/SI',
			'TK' => base_url() . 'jadwal/jurusan/TK',
			
			'2' => 'pisahkan',

			'Dosen' => base_url() . 'jadwal/dosen',
			'Ruangan' => base_url() . 'jadwal/ruangan',
			'Aktif' => base_url() . 'jadwal/jadwal_aktif',
		];

		foreach ($data['jurusan'] as $key => $value) {
			$data['sidebar'][$value] = base_url() . 'jadwal/jurusan/' . $value;
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('_jadwal_home', $data);
		$this->load->view('templates/footer', $data);
	}

	public function jurusan($jurusan = '')
	{
		$this->set_view_count();
		$data['icon'] = "02.gif";
		$this->db->where("jurusan", $jurusan);
		$this->db->order_by("kelas", "DESC");
		$jadwal = $this->db->get('_jadwal')->result_array();

		$classes = [];

		foreach ($jadwal as $key => $value) {
			array_push($classes, $value['kelas']);
		}

		$data['classes'] = array_unique($classes);
		$data['jurusan'] = $jurusan;
		$data['card_header'] = "Pilih Kelas";

		$data['icon'] = "02.gif";
		$data['title'] = strtoupper($jurusan);
		// sidebar
		$data['sidebar'] = [
			'Home' => base_url(),
			'TI' => base_url() . 'jadwal/jurusan/TI',
			'MI' => base_url() . 'jadwal/jurusan/MI',
			'SI' => base_url() . 'jadwal/jurusan/SI',
			'TK' => base_url() . 'jadwal/jurusan/TK',

			'2' => 'pisahkan',

			'Dosen' => base_url() . 'jadwal/dosen',
			'Ruangan' => base_url() . 'jadwal/ruangan',
			'Aktif' => base_url() . 'jadwal/jadwal_aktif',
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('_jadwal_jurusan', $data);
		$this->load->view('templates/footer', $data);
	}
	//mahasiswa
	public function kelas($jurusan = '', $kelas = '', $jenis = '')
	{
		$this->set_view_count();
		if ( $jenis == 'semua' ) {
			$data['title'] = "Jadwal Sepekan";
		}else{
			$data['title'] = "Jadwal Hari Ini";
		}
		$data['card_header'] = "Jadwal " . strtoupper($jurusan.$kelas);
		$data['icon'] = "02.gif";
		$data['jurusan'] = $jurusan;
		$data['jenis'] = $jenis;
		$data['kelas'] = $kelas;

		// sidebar
		$data['sidebar'] = [
			'Home' => base_url(),
			'Jadwal Hari Ini' => base_url('jadwal/kelas/') . $jurusan . "/" . $kelas . "/",
			'Jadwal Sepekan' => base_url('jadwal/kelas/') . $jurusan . "/" . $kelas . "/semua",
			'Jadwal Tabel' => base_url('jadwal/jadwal_tabel/') . $jurusan . "/" . $kelas,

			'1' => 'pisahkan',

			'TI' => base_url() . 'jadwal/jurusan/TI',
			'MI' => base_url() . 'jadwal/jurusan/MI',
			'SI' => base_url() . 'jadwal/jurusan/SI',
			'TK' => base_url() . 'jadwal/jurusan/TK',

			'2' => 'pisahkan',

			'Dosen' => base_url() . 'jadwal/dosen',
			'Ruangan' => base_url() . 'jadwal/ruangan',
			'Aktif' => base_url() . 'jadwal/jadwal_aktif',
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/navbar', $data);
		if ( !empty($kelas) ) {
			$this->load->view('_jadwal_mahasiswa', $data);
		}
		$this->load->view('templates/footer', $data);
		$this->load->view('_jadwal_mahasiswa_js', $data);
	}

	public function jadwal_tabel($jurusan = '', $kelas = '')
	{

		if ( $this->input->post() ) {
			if ( $this->input->post('password') == '18a3#' ) {
				$this->_jadwalModel->set_jadwal( 
					$this->input->post('jadwal_id'), 
					$this->input->post('matakul_id'), 
					$this->input->post('jenis'),
					$this->input->post('jam'),
					$this->input->post('hari')
				);
			}
			else{
				$this->session->set_flashdata("message", "<script>alert('Maaf, password salah!')</script>");
				redirect( $this->uri->uri_string() ); //refresh
			}
			
		}
		$data['title'] = "Jadwal Tabel";
		$data['card_header'] = "Jadwal Tabel ".$jurusan.$kelas;
		$data['icon'] = "nezuko.gif";
		

		$this->db->order_by('index_hari', 'ASC');
		$hari = $this->db->get('_jadwal_18a3_hari')->result_array();

		$this->db->order_by('id', 'ASC');
		$jam = $this->db->get('_jadwal_tabel_jam')->result_array();
		
		$data['jurusan'] = $jurusan;
		$data['kelas'] = $kelas;

		$data['hari'] = $hari;
		$data['jam'] = $jam;

		// sidebar
		$data['sidebar'] = [
			'Home' => base_url(),
			'Jadwal Hari Ini' => base_url('jadwal/kelas/') . $jurusan . "/" . $kelas . "/",
			'Jadwal Sepekan' => base_url('jadwal/kelas/') . $jurusan . "/" . $kelas . "/semua",
			'Jadwal Tabel' => base_url('jadwal/jadwal_tabel/') . $jurusan . "/" . $kelas,

			'1' => 'pisahkan',

			'TI' => base_url() . 'jadwal/jurusan/TI',
			'MI' => base_url() . 'jadwal/jurusan/MI',
			'SI' => base_url() . 'jadwal/jurusan/SI',
			'TK' => base_url() . 'jadwal/jurusan/TK',

			'2' => 'pisahkan',

			'Dosen' => base_url() . 'jadwal/dosen',
			'Ruangan' => base_url() . 'jadwal/ruangan',
			'Aktif' => base_url() . 'jadwal/jadwal_aktif',
		];



		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('_jadwal_mahasiswa_tabel', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('_jadwal_mahasiswa_tabel_js', $data);
	}


	//dosen
	public function dosen_index()
	{
		$this->set_view_count();
		$data['icon'] = "miku0.gif";
		$this->db->order_by("dosen", "ASC");
		$jadwal = $this->db->get('_jadwal')->result_array();

		$dosen = [];

		foreach ($jadwal as $key => $value) {
			array_push($dosen, $value['dosen']);
		}

		$data['dosen'] = array_unique($dosen);

		$data['card_header'] = "Pilih Dosen";

		$data['title'] = "Dosen";
		// sidebar
		$data['sidebar'] = [
			'Home' => base_url(),
			'TI' => base_url() . 'jadwal/jurusan/TI',
			'MI' => base_url() . 'jadwal/jurusan/MI',
			'SI' => base_url() . 'jadwal/jurusan/SI',
			'TK' => base_url() . 'jadwal/jurusan/TK',
			
			'2' => 'pisahkan',

			'Dosen' => base_url() . 'jadwal/dosen',
			'Ruangan' => base_url() . 'jadwal/ruangan',
			'Aktif' => base_url() . 'jadwal/jadwal_aktif',
		];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('_jadwal_dosen_index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function dosen($dosen = '' , $jenis = '' )
	{
		$this->set_view_count();
		$dosen_decoded = base64_decode(str_replace('garis_miring', '/', $dosen));
		$data['card_header'] = "Jadwal " . $dosen_decoded;
		
		$data['icon'] = "miku0.gif";
		$data['dosen'] = $dosen;
		$data['jenis'] = $jenis;

		if ( $jenis == 'semua' ) {
			$data['title'] = "Jadwal Sepekan";
		}else{
			$data['title'] = "Jadwal Hari Ini";
		}

		// sidebar
		$data['sidebar'] = [
			'Home' => base_url(),
			'Jadwal Hari Ini' => base_url().'jadwal/dosen/'.$dosen,
			'Jadwal Sepekan' => base_url().'jadwal/dosen/'.$dosen . '/semua',
			'Jadwal Tabel <span class="badge badge-danger">New</span>' => base_url().'jadwal/jadwal_tabel_dosen/'.$dosen,

			'1' => 'pisahkan',

			'TI' => base_url() . 'jadwal/jurusan/TI',
			'MI' => base_url() . 'jadwal/jurusan/MI',
			'SI' => base_url() . 'jadwal/jurusan/SI',
			'TK' => base_url() . 'jadwal/jurusan/TK',

			'2' => 'pisahkan',

			'Dosen' => base_url() . 'jadwal/dosen',
			'Ruangan' => base_url() . 'jadwal/ruangan',
			'Aktif' => base_url() . 'jadwal/jadwal_aktif',
		];

		if ( !empty($dosen) ) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('_jadwal_dosen', $data);
			$this->load->view('templates/footer', $data);
			$this->load->view('_jadwal_dosen_js', $data);
		}else{
			redirect( base_url() . 'jadwal/dosen_index' );
		}
	}


	public function jadwal_tabel_dosen($enc_dosen = '')
	{
		$nama_dosen = base64_decode( str_replace('/', '', $enc_dosen ) );
		$data['title'] = "Jadwal ".$nama_dosen;
		$data['icon'] = "nezuko.gif";
		
		$this->db->order_by('index_hari', 'ASC');
		$hari = $this->db->get('_jadwal_18a3_hari')->result_array();

		$this->db->order_by('id', 'ASC');
		$jam = $this->db->get('_jadwal_tabel_jam')->result_array();
		
		$data['hari'] = $hari;
		$data['jam'] = $jam;
		$data['nama_dosen'] = $nama_dosen;
		$data['enc_dosen'] = $enc_dosen;

		// var_dump($data['hari']);
		// die();

		$this->load->view('_jadwal_dosen_tabel', $data);
	}

	public function jadwal_tabel_ruangan($hari = '')
	{
		$data['title'] = "Jadwal ".$hari;
		$data['icon'] = "nezuko.gif";

		$this->db->order_by('id', 'ASC');
		$jam = $this->db->get('_jadwal_tabel_jam')->result_array();

		$data['hari0'] = $hari;
		$data['jam'] = $jam;
		$data['ruangan0'] = $this->_jadwalModel->get_ruangan_list();

		///////////////////////
		$this->db->order_by("index_hari", "ASC");
		$this->db->order_by("ruang", "ASC");
		$jadwal = $this->db->get('_jadwal')->result_array();

		$hari = [];
		$index_hari = [];
		$ruangan = [];

		foreach ($jadwal as $key => $value) {
			array_push($hari, str_replace(' ', '', $value['hari']));
			array_push($index_hari, str_replace(' ', '', $value['index_hari']));
			array_push($ruangan, $value['ruang']);
		}

		$data['ruangan'] = array_unique($ruangan);
		$data['hari'] = [ array_unique($hari), array_unique($index_hari) ];
		//////////////////////
		$data['index_hari_saat_ini'] = 1;
		$data['hari_saat_ini'] = 'Senin';
		$data['ruangan_saat_ini'] = 'QXVsYSAx';

		$this->load->view('_jadwal_ruangan_tabel', $data);
	}

	public function jadwal_aktif()
	{
		$this->set_view_count();
		$data['title'] = "Jadwal Aktif";
		$data['icon'] = "02.gif";

		$this->load->view('_jadwal_aktif', $data);
	}

	public function set_dosens()
	{
		$jadwal = $this->db->get('_jadwal')->result_array();
		$dosens = [];
		$warnas = [];
		foreach ($jadwal as $key => $value) {
			array_push($dosens, $value['dosen']);
		}

		$dosens = array_unique($dosens);
		foreach ($dosens as $key => $value) {
			$warna = $this->_jadwalModel->rand_color();
			while ( in_array($warna, $warnas) ) {
				$warna = $this->_jadwalModel->rand_color(); // mencegah duplikat warna
			}
			$data = [
				'dosen' => $value,
				'warna' => $warna
			];
			$this->db->insert('_jadwal_dosen' , $data);
			array_push( $warnas, $warna );
		}

	}










	//ruangan
	public function ruangan_index()
	{
		$this->set_view_count();
		$data['title'] = "Jadwal Ruangan";
		$data['icon'] = "tamako.gif";
		$this->db->order_by("index_hari", "ASC");
		$this->db->order_by("ruang", "ASC");
		$jadwal = $this->db->get('_jadwal')->result_array();

		$hari = [];
		$index_hari = [];
		$ruangan = [];

		foreach ($jadwal as $key => $value) {
			array_push($hari, str_replace(' ', '', $value['hari']));
			array_push($index_hari, str_replace(' ', '', $value['index_hari']));
			array_push($ruangan, $value['ruang']);
		}
		$data['ruangan'] = array_unique($ruangan);
		$data['hari'] = [ array_unique($hari), array_unique($index_hari) ];

		$this->load->view('_jadwal_ruangan_index', $data);
	}


	public function ruangan($index_hari_saat_ini = '', $ruangan_saat_ini = '')
	{
		$this->set_view_count();
		$data['title'] = "Jadwal Ruangan";
		$data['icon'] = "tamako.gif";


		if ( empty($index_hari_saat_ini) or empty($ruangan_saat_ini) ) {
			redirect( base_url() . 'jadwal/ruangan_index' );
		}


		$this->db->order_by("index_hari", "ASC");
		$this->db->order_by("ruang", "ASC");
		$jadwal = $this->db->get('_jadwal')->result_array();

		$hari = [];
		$index_hari = [];
		$ruangan = [];

		foreach ($jadwal as $key => $value) {
			array_push($hari, str_replace(' ', '', $value['hari']));
			array_push($index_hari, str_replace(' ', '', $value['index_hari']));
			array_push($ruangan, $value['ruang']);
		}

		$data['ruangan'] = array_unique($ruangan);
		$data['hari'] = [ array_unique($hari), array_unique($index_hari) ];



		$data['index_hari_saat_ini'] = $index_hari_saat_ini;

		// sip sip
		foreach ($hari as $key => $value) {
			if ( $index_hari[$key] == $index_hari_saat_ini ) {
				$data['hari_saat_ini'] = $value;
			}
		}


		$data['ruangan_saat_ini'] = $ruangan_saat_ini;

		$this->load->view( '_jadwal_ruangan', $data );
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

		//  Urutin berdasarkan index hari, dan jam mulai
		$this->db->order_by("index_hari", "ASC");
		$this->db->order_by("jam_mulai", "ASC");

		$jadwal = $this->db->get('_jadwal')->result_array();
		$data['jadwal'] = $this->_jadwalModel->proses_jadwal($jadwal, $mati, $timer_mati);

		$this->load->view('_jadwal_dosen_content', $data);
	}

	public function get_jadwal_ruangan( $index_hari = '', $ruangan ='' )
	{
		$ruangan = base64_decode(str_replace('garis_miring', '/', $ruangan));

		$mati = 'bg-abu-abu';
		$timer_mati = 'd-none';

		$this->db->where("index_hari", $index_hari);
		$this->db->where("ruang", $ruangan);

		//  Urutin berdasarkan index hari, dan jam mulai
		$this->db->order_by("index_hari", "ASC");
		$this->db->order_by("jam_mulai", "ASC");
		$this->db->order_by("ruang", "ASC");

		$jadwal = $this->db->get('_jadwal')->result_array();
		$data['jadwal'] = $this->_jadwalModel->proses_jadwal($jadwal, $mati, $timer_mati);

		$this->load->view('_jadwal_ruangan_content', $data);
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
		//  Urutin berdasarkan index hari, dan jam mulai
		$this->db->order_by("index_hari", "ASC");
		$this->db->order_by("jam_mulai", "ASC");

		$this->db->where("jurusan", strtolower($jurusan));
		$this->db->where("kelas", strtolower($kelas));
		$jadwal = $this->db->get('_jadwal')->result_array();
		$data['jadwal'] = $this->_jadwalModel->proses_jadwal($jadwal, $mati, $timer_mati);

		$this->load->view('_jadwal_mahasiswa_content', $data);
	}
	public function get_jadwal_aktif()
	{
		$mati = 'bg-abu-abu';
		$timer_mati = 'd-none';
		//  Urutin berdasarkan index hari, dan jam mulai
		$this->db->order_by("index_hari", "ASC");
		$this->db->order_by("jam_mulai", "ASC");

		$saat_ini = date('H:i:s');

		// terjemah hari
		$hari = '';
		switch ( date('l') ) {
		  	case "Monday":
		      $hari = 'Senin';
		      break;
		  	case "Tuesday":
		      $hari = 'Selasa';
		      break;
		  	case "Wednesday":
		      $hari = 'Rabu';
		      break;
		  	case "Thursday":
		      $hari = 'Kamis';
		      break;
		  	case "Friday":
		      $hari = 'Jumat';
		      break;
		  	case "Saturday":
		      $hari = 'Sabtu';
		      break;
		    default:
		      $hari = '';
		}

		$this->db->where('jam_mulai <=', $saat_ini);
		$this->db->where('jam_selesai >=', $saat_ini);
		$this->db->where('hari', $hari);
		$jadwal = $this->db->get('_jadwal')->result_array();
		$data['jadwal'] = $this->_jadwalModel->proses_jadwal($jadwal, $mati, $timer_mati);

		$this->load->view('_jadwal_ruangan_content', $data);
	}



















	
}
