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
	}

	public function index()
	{
		$data['title'] 				= 'Prototype Beranda SIFURNITURE';
		$data['populer']			= $this->Model_barang->get_barang_populer_front();
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['interior']			= $this->Model_interior->get_interior_front();
		$data['style']			 	= $this->Model_custom->get_style_front();
		$data['ulasan']				= $this->Model_ulasan->get_ulasan_front();
		$this->load->view('frontend/home/View_home',$data);
	}

	public function detail()
	{
		$data['title'] 			= 'Prototype Beranda SIFURNITURE';
		$this->load->view('frontend/detail/View_detail',$data);
	}

	public function custom()
	{
		$data['title']			= 'Custom Design';
		$this->load->view('frontend/custom/View_custom',$data);
	}

	public function about()
	{
		$data['title']			= 'About Us';
		$this->load->view('frontend/about/View_about',$data);
	}

	public function step()
	{
		$data['title'] 			= 'Langkah Langkah Panduan Sifurnture';
		$this->load->view('frontend/step/View_step');
	}

}
