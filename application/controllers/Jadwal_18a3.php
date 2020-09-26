<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_18a3 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('_18a3_model');

	}

	public function index()
	{
		if ( $this->input->post() ) {
			if ( $this->input->post('password') == '18a3#' ) {
				$this->_18a3_model->set_jadwal( 
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
		$data['title'] = "Jadwal Khusus TI 18A3";
		$data['icon'] = "nezuko.gif";
		
		$jadwal = $this->db->get('_jadwal_18a3')->result_array();

		$this->db->order_by('index_hari', 'ASC');
		$hari = $this->db->get('_jadwal_18a3_hari')->result_array();

		$matakul = $this->db->get('_jadwal_18a3_matakul')->result_array();

		$this->db->order_by('id', 'ASC');
		$jam = $this->db->get('_jadwal_18a3_jam')->result_array();
		
		$data['hari'] = $hari;
		$data['jam'] = $jam;
		$data['jadwal'] = $jadwal;
		$data['matakul'] = $matakul;


		// var_dump($data['hari']);
		// die();

		$this->load->view('jadwal_18a3', $data);
	}
	
}
