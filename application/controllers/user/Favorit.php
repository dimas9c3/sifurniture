<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Favorit extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this->load->model('Model_barang');
	}

	public function index()
	{
		$data['title'] 			= 'Produk Yang Anda Favoritkan';
		$this->load->view('user/favorit/View_favorit',$data);
	}

	public function get_all_ulasan_by_cus()
	{
		$users					= $data['tbl_pengguna']= $this->ion_auth->user()->result();
		foreach($users as $value)
		{
        	$username		= $value->email;
        	$id_customer 	= $value->id;
        }

        $ajax 					= $this->Model_ulasan->get_all_ulasan_by_cus($id_customer);

        echo json_encode($ajax);
	}

	public function tambah_ulasan()
	{
		$id_penjualan 			= $this->uri->segment('4');
		

        $data['title']			= 'Tambah Ulasan';
        $this->load->view('user/ulasan/View_tambah_ulasan',$data);
	}

	public function set_ulasan()
	{
		$isi 					= $this->input->post('tambah_isi');
		$rate					= $this->input->post('tambah_rating');
		$id_penjualan			= $this->input->post('tambah_id');
		$users					= $data['tbl_pengguna']= $this->ion_auth->user()->result();
		foreach($users as $value)
		{
        	$username		= $value->email;
        	$id_customer 	= $value->id;
        }

		$ulasan 				= array(
			'ulasan_isi'		=> $isi,
			'ulasan_rating'		=> $rate,
			'penjualan_id'		=> $id_penjualan,
			'customer_id'		=> $id_customer
		);

		$query 					= $this->Model_ulasan->set_ulasan($ulasan);

		redirect('user/pembelian/riwayat_pembelian');
		
	}

	public function edit_ulasan()
	{
		$id_ulasan 				= $this->uri->segment('4');
		$data['title']			= 'Edit Ulasan';
		$data['ulasan']			= $this->Model_ulasan->get_ulasan_by_id_no_ajax($id_ulasan);

		$this->load->view('user/ulasan/View_edit_ulasan',$data);
	}

	public function update_ulasan()
	{
		$isi 					= $this->input->post('tambah_isi');
		$rate					= $this->input->post('tambah_rating');
		$id_ulasan				= $this->input->post('tambah_id_ulasan');

		$ulasan 				= array(
			'ulasan_isi'		=> $isi,
			'ulasan_rating'		=> $rate
		);

		$query 					= $this->Model_ulasan->update_ulasan($id_ulasan,$ulasan);

		redirect('user/ulasan');
		
	}

	public function delete_ulasan()
	{
		$id_ulasan 				= $this->input->post('hapus_id');

		$ajax 					= $this->Model_ulasan->delete_ulasan($id_ulasan);

		echo json_encode($ajax);
	}

}
