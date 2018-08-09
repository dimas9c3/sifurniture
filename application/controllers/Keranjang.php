<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_barang');
	}

	public function index()
	{
		$data['title'] 				= 'Keranjang';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['simmilar']			= $this->Model_barang->get_barang_simmilar_cart();
		$data['cart']			 	= $this->cart->contents();
		$this->load->view('frontend/keranjang/View_keranjang',$data);
	}

	public function tambah_keranjang()
	{
		$id_barang 					= $this->input->post('id_brg');
		$nama_barang 				= $this->input->post('nm_brg');
		$harga_barang 				= $this->input->post('hrg_brg');
        $keranjang					= array(
        	'id'	=> $id_barang,
        	'qty'   => 1,
        	'price'	=> $harga_barang,
        	'name'	=> $nama_barang
        );

        $ajax 			= $this->cart->insert($keranjang);
        echo json_encode($ajax);
	}

}
