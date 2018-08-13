<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_artikel');
		$this->load->model('Model_barang');
		$this->load->model('Model_pengaturan');

		/* Setting */
		$sett 						= $this->Model_pengaturan->get_all_setting();
		$row 						= $sett->row_array();
		$this->email 				= $row['theme_option_email'];
		$this->telepon 				= $row['theme_option_telepon'];
		$this->jam 					= $row['theme_option_operasional'];
	}

	public function index()
	{

	}

	public function detail()
	{
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$id_artikel 				= $this->uri->segment('3');
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['detail'] 			= $this->Model_artikel->detail_artikel($id_artikel);

		$this->load->view('frontend/artikel/v_detail_artikel',$data);
	}

}

/* End of file Artikel.php */
/* Location: ./application/controllers/Artikel.php */
