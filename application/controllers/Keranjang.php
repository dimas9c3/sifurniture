<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
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
		$data['email'] 				= $this->email;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
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
