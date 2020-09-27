<?php 

/**
 * Korek Software Model
 */
class _jadwalModel extends CI_Model
{
	
	function __construct()
	{
		# code...
	}

	public function hitung_durasi($selisih_dg_waktu_mulai)
	{
		$selisih_dg_waktu_mulai = str_replace('-', '', $selisih_dg_waktu_mulai);
		$jam = sprintf('%02d',  floor($selisih_dg_waktu_mulai / (60*60) )   );
		$sisa_setelah_jam = $selisih_dg_waktu_mulai % (60*60);
		$menit = sprintf('%02d',  floor($sisa_setelah_jam / 60)   );
		$sisa_setelah_menit = $selisih_dg_waktu_mulai % 60;
		$detik = sprintf('%02d',  $selisih_dg_waktu_mulai % 60   );

		return $data = [
			'jam' => $jam,
			'menit' => $menit,
			'detik' => $detik,
		];
	}

	public function hitung_waktu_mulai($selisih_dg_waktu_selesai)
	{
		$selisih_dg_waktu_selesai = str_replace('-', '', $selisih_dg_waktu_selesai);
		$jam = sprintf('%02d',  floor($selisih_dg_waktu_selesai / (60*60) )   );
		$sisa_setelah_jam = $selisih_dg_waktu_selesai % (60*60);
		$menit = sprintf('%02d',  floor($sisa_setelah_jam / 60)   );
		$sisa_setelah_menit = $selisih_dg_waktu_selesai % 60;
		$detik = sprintf('%02d',  $selisih_dg_waktu_selesai % 60   );
		
		return $data = [
			'jam' => $jam,
			'menit' => $menit,
			'detik' => $detik,
		];
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
				$jadwal[$i]['nyala'] .= 'text-white border-kiri';
				if ( $selisih_dg_waktu_mulai > -$limabelas_menit &&  $selisih_dg_waktu_selesai > 0 ) {
					$jadwal[$i]['nyala'] .= ' menyala';
				}
			}else{
				$jadwal[$i]['nyala'] .= $mati;
				$jadwal[$i]['timer'] .= $timer_mati;
			}
		}
		return $jadwal;
	}

	public function get_jadwal_mahasiswa_tabel($jam_mulai, $jam_selesai, $hari, $kelas, $jurusan)
	{
		$sepuluh_menit = 20*60;
		// //range-nya dikasih toleransi 20 menit lah
		$jam_mulai_minus_10menit = date('H:i:s', strtotime($jam_mulai) + $sepuluh_menit);
		$jam_selesai_plus_10menit = date('H:i:s', strtotime($jam_selesai) - $sepuluh_menit);

		///////////////////////////////////////////////////////
		$this->db->where('jam_mulai <=', $jam_mulai_minus_10menit);
		$this->db->where('jam_selesai >=', $jam_selesai_plus_10menit);
		$this->db->where('hari', $hari);
		$this->db->where('kelas', $kelas);
		$this->db->where('jurusan', $jurusan);
		$jadwal = $this->db->get('_jadwal')->result_array();

		if ( count($jadwal) > 1 ) { // jika tabrakan

			foreach ($jadwal as $key => $value) {
				$jadwal[$key]['tabrakan'] = true;
				$jadwal[$key]['inisial'] = substr( '#' . $jadwal[$key]['mata_kuliah'] , 0, 10 ) . '...';
			}
		}
		else if ( count($jadwal) == 1 ){
			$jadwal[0]['inisial'] = substr( $jadwal[0]['mata_kuliah'] , 0, 10 ) . '...';
		}
		///////////////////////////////////////////////////////
		$jadwal[0]['aktif'] = $this->cek_jadwal_aktif($jam_mulai, $jam_selesai, $hari);
		
		if ( !empty($jadwal[0]['mata_kuliah']) ) {
			return $jadwal;
		}
		else{
			return false;
		}
	}

	public function get_jadwal_dosen_tabel($jam_mulai, $jam_selesai, $hari, $dosen)
	{
		$sepuluh_menit = 20*60;
		// //range-nya dikasih toleransi 20 menit lah
		$jam_mulai_minus_10menit = date('H:i:s', strtotime($jam_mulai) + $sepuluh_menit);
		$jam_selesai_plus_10menit = date('H:i:s', strtotime($jam_selesai) - $sepuluh_menit);

		$this->db->where('jam_mulai <=', $jam_mulai_minus_10menit);
		$this->db->where('jam_selesai >=', $jam_selesai_plus_10menit);
		$this->db->where('hari', $hari);
		$this->db->where('dosen', $dosen);
		$jadwal = $this->db->get('_jadwal')->row_array();

		$jadwal0 = [];

		if ( $jadwal ) {
			///////////////////////////////////////////////////////
			$this->db->where('jam_mulai <=', $jam_mulai_minus_10menit);
			$this->db->where('jam_selesai >=', $jam_selesai_plus_10menit);
			$this->db->where('hari', $hari);
			$this->db->where('dosen', $dosen);
			$jadwal_array = $this->db->get('_jadwal')->result_array();
			if ( count($jadwal_array) > 1 ) { // jika tabrakan
				$jadwal0['tabrakan'] = true;

				$jadwal['inisial'] = '';
				foreach ($jadwal_array as $key => $value) {
					$jadwal['inisial'] .= ' # ' . strtoupper($value['jurusan']) . $value['kelas'] . '<br>';
				}
			}
			else{
				$jadwal['inisial'] = strtoupper($jadwal['jurusan']).$jadwal['kelas'];
			}
			///////////////////////////////////////////////////////
			$jadwal['aktif'] = $this->cek_jadwal_aktif($jam_mulai, $jam_selesai, $hari);
			
			return array_merge($jadwal, $jadwal0);
		}


		
	}
	public function get_jadwal_ruangan_tabel($jam_mulai, $jam_selesai, $hari, $ruangan)
	{
		$sepuluh_menit = 20*60;
		// //range-nya dikasih toleransi 20 menit lah
		$jam_mulai_minus_10menit = date('H:i:s', strtotime($jam_mulai) + $sepuluh_menit);
		$jam_selesai_plus_10menit = date('H:i:s', strtotime($jam_selesai) - $sepuluh_menit);

		$this->db->where('jam_mulai <=', $jam_mulai_minus_10menit);
		$this->db->where('jam_selesai >=', $jam_selesai_plus_10menit);
		$this->db->where('hari', $hari);
		$this->db->where('ruang', $ruangan);
		$jadwal = $this->db->get('_jadwal')->row_array();

		$jadwal0 = [];

		if ( $jadwal ) {
			///////////////////////////////////////////////////////
			$this->db->where('jam_mulai <=', $jam_mulai_minus_10menit);
			$this->db->where('jam_selesai >=', $jam_selesai_plus_10menit);
			$this->db->where('hari', $hari);
			$this->db->where('ruang', $ruangan);
			$jadwal_array = $this->db->get('_jadwal')->result_array();
			if ( count($jadwal_array) > 1 ) { // jika tabrakan
				$jadwal0['tabrakan'] = true;

				$jadwal['inisial'] = ' # ' . strtoupper( substr( $jadwal['dosen'] , 0 , 4 ) ) . '...';
				$jadwal['mata_kuliah'] = '';
				$jadwal['sifat'] = '';
				$jadwal['sks'] = '';
				$jadwal['dosen'] = '';
				$jadwal['jurusan'] = '';
				$jadwal['kelas'] = '';
				$jadwal['jenis'] = '';
				foreach ($jadwal_array as $key => $value) {
					$jadwal['mata_kuliah'] .= ' # ' . $value['mata_kuliah'].'<br>';
					$jadwal['sifat'] .= ' # ' . $value['sifat'].'<br>';
					$jadwal['sks'] .= ' # ' . $value['sks'].'<br>';
					$jadwal['dosen'] .= ' # ' . $value['dosen'].'<br>';
					$jadwal['jurusan'] .= ' # ' . $value['jurusan'].'<br>';
					$jadwal['kelas'] .= ' # ' . $value['kelas'].'<br>';
					$jadwal['jenis'] .= ' # ' . $value['jenis'].'<br>';
				}
			}
			else{
				$jadwal['inisial'] = strtoupper( substr( $jadwal['dosen'] , 0 , 4 ) ) . '...';
				$jadwal0['warna_dosen'] = $this->get_dosen_color($jadwal['dosen']);
			}
			///////////////////////////////////////////////////////
			$jadwal['aktif'] = $this->cek_jadwal_aktif($jam_mulai, $jam_selesai, $hari);
			
			return array_merge($jadwal, $jadwal0);
		}


		
	}

	public function rand_color() {
	    $str = '#';
	    for($i = 0 ; $i < 3 ; $i++) {
	        $str .= dechex( rand(100 , 255) );
	    }
	    return $str;
	}

	public function get_ruangan_list()
	{
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

		return $data;
	}

	public function get_dosen_color($dosen)
	{
		$this->db->where("dosen", $dosen);
		$jadwal = $this->db->get('_jadwal_dosen')->row_array();

		return $jadwal['warna'];
	}

	public function cek_jadwal_aktif($jam_mulai, $jam_selesai, $hari)
	{
		$aktif = false; // inisialisasi

		$selisih_dg_waktu_mulai = time() - strtotime($jam_mulai);
		$selisih_dg_waktu_selesai = strtotime($jam_selesai) - time();
				
		switch ( preg_replace( "/\r|\n/", "", strtolower($hari)) ) {
		  	case "senin":
		      $hari = 'monday';
		      break;
		  	case "selasa":
		      $hari = 'tuesday';
		      break;
		  	case "rabu":
		      $hari = 'wednesday';
		      break;
		  	case "kamis":
		      $hari = 'thursday';
		      break;
		  	case "jumat":
		      $hari = 'friday';
		      break;
		  	case "sabtu":
		      $hari = 'saturday';
		      break;
		    default:
		      $hari = '';
		}


		if ( strtolower($hari) == strtolower( date("l") ) ) {
			$limabelas_menit = 60*15;
			if ( $selisih_dg_waktu_mulai > -$limabelas_menit &&  $selisih_dg_waktu_selesai > 0 ) {
				return true;
			}
		}
	}

	public function set_jadwal($jadwal_id, $matakul_id, $jenis, $jam, $hari)
	{
		if ( $matakul_id == 'hapus' ) {
			$this->db->where('id', $jadwal_id);
			$this->db->delete('_jadwal_18a3');
		}
		elseif ( !empty($jadwal_id) ) {
			$this->db->where('id', $jadwal_id);
			$data = [
				'id_mata_kuliah' => $matakul_id,
				'jenis' => $jenis
			];
			$this->db->update('_jadwal_18a3', $data);
		}else{
			$data = [
				'hari' => $hari,
				'jam' => $jam,
				'id_mata_kuliah' => $matakul_id,
				'jenis' => $jenis,
			];
			$this->db->insert('_jadwal_18a3', $data);
		}

		
	}

}