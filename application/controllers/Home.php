<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_barang');
		$this->load->model('Model_interior');
		$this->load->model('Model_custom');
		$this->load->model('Model_ulasan');
		$this->load->model('Model_artikel');
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
		$data['title'] 				= 'Prototype Beranda SIFURNITURE';
		$data['populer']			= $this->Model_barang->get_barang_populer_front();
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['interior']			= $this->Model_interior->get_interior_front();
		$data['style']			 	= $this->Model_custom->get_style_front();
		$data['ulasan']				= $this->Model_ulasan->get_ulasan_front();
		$data['artikel']			= $this->Model_artikel->get_artikel_front();
		$this->load->view('frontend/home/View_home',$data);
	}
}
