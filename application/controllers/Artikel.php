<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_artikel');
		$this->load->model('Model_barang');
	}

	public function index()
	{
		
	}

	public function detail()
	{
		$id_artikel 				= $this->uri->segment('3');
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['detail'] 			= $this->Model_artikel->detail_artikel($id_artikel);

		$this->load->view('frontend/artikel/v_detail_artikel',$data);
	}

}

/* End of file Artikel.php */
/* Location: ./application/controllers/Artikel.php */