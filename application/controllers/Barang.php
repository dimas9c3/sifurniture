<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_barang');
	}

	public function index()
	{
		$data['title'] 				= 'Produk Barang';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$this->load->view('frontend/barang/View_barang',$data);
	}

	public function kategori()
	{
		$id_subkategori 			= $this->uri->segment('3');
		$data['title'] 				= 'Produk Barang';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();

		$config['base_url'] 		= base_url().'barang/kategori/'.$id_subkategori;
		$config['total_rows'] 		= $this->Model_barang->count_barang_by_subkategori($id_subkategori);
		$config['per_page'] 		= 2;
		$config['uri_segment'] 		= 4;
		$config['query_string_segment'] = 'start';

		$config['full_tag_open'] 	= '<ul class="pagination pull-right m-0">';
		$config['full_tag_close'] 	= '</ul>';

		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li class="page-item page-link">';
		$config['first_tag_close'] 	= '</li>';

		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="page-item page-link">';
		$config['last_tag_close'] 	= '</li>';

		$config['next_link'] 		= 'Next';
		$config['next_tag_open'] 	= '<li class="page-item page-link">';
		$config['next_tag_close'] 	= '</li>';

		$config['prev_link'] 		= 'Prev';
		$config['prev_tag_open'] 	= '<li class="page-item page-link">';
		$config['prev_tag_close'] 	= '</li>';

		$config['cur_tag_open'] 	= '<li class="page-item page-link active"><a class="active">';
		$config['cur_tag_close'] 	= '</a></li>';

		$config['num_tag_open'] 	= '<li class="page-item page-link">';
		$config['num_tag_close'] 	= '</li>';
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$this->pagination->initialize($config);

		$data['page']				= $this->pagination->create_links();
		$data['total_row'] 			= $this->Model_barang->count_barang_by_subkategori($id_subkategori);
		$data['barang']				= $this->Model_barang->get_barang_by_subkategori_front($id_subkategori,$config['per_page'],$pagination);
		$this->load->view('frontend/barang/View_barang',$data);
	}

	public function detail()
	{
		$id_barang 					= $this->uri->segment('3');
		$data['title']				= 'Detail Produk Barang';
		$data['kategori_navbar']	= $this->Model_barang->get_kategori_navbar();
		$data['warna']				= $this->Model_barang->get_warna_by_id_brg($id_barang);
		$data['detail_barang']		= $this->Model_barang->get_detail_barang_no_ajax($id_barang);
		$foto_utama 				= $this->Model_barang->get_foto_utama_barang_by_id_no_ajax($id_barang);
		$data['detail_foto']		= $this->Model_barang->get_foto_barang_by_id_no_ajax($id_barang,$foto_utama);
		$data['simmilar']			= $this->Model_barang->get_barang_simmilar($id_barang);
		$this->load->view('frontend/barang/View_detail_barang',$data);
	}

	public function filter()
	{
		$id_subkategori 			= $this->uri->segment('4');
		$data['title']				= 'Produk Barang';
		$data['kategori_navbar']	= $this->Model_barang->get_kategori_navbar();
		$jenis_filter 				= $this->uri->segment('3');

		$config['base_url'] 		= base_url().'barang/filter/'.$jenis_filter.'/'.$id_subkategori;
		$config['total_rows'] 		= $this->Model_barang->count_barang_by_subkategori($id_subkategori);
		$config['per_page'] 		= 2;
		$config['uri_segment'] 		= 5;
		$config['query_string_segment'] = 'start';
		$config['full_tag_open'] 	= '<ul class="pagination m-0">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		$config['next_link'] 		= 'Next';
		$config['next_tag_open'] 	= '<li class="page-item page-link">';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_link'] 		= 'Prev';
		$config['prev_tag_open'] 	= '<li class="page-item page-link">';
		$config['prev_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="page-item"><a class="page-link active">';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['num_tag_open'] 	= '<li class="page-item page-link">';
		$config['num_tag_close'] 	= '</li>';
		$pagination = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$this->pagination->initialize($config);

		$data['page']				= $this->pagination->create_links();

		if($jenis_filter==1)
		{
			$data['barang']			= $this->Model_barang->get_barang_by_subkategori_front_DESC($id_subkategori,$config['per_page'],$pagination);
			$data['jenis_filter'] 	= 1;
		}else
		{
			$data['barang']			= $this->Model_barang->get_barang_by_subkategori_front_ASC($id_subkategori,$config['per_page'],$pagination);
				$data['jenis_filter'] 	= 2;
		}

		$data['total_row'] 			= $this->Model_barang->count_barang_by_subkategori($id_subkategori);

		$this->load->view('frontend/barang/View_barang',$data);
	}

	public function tambah_barang_dilihat()
	{
		$id_barang 					= $this->input->post('id_barang');
		$tgl 						= date('Y-m-d');
		//tambah barang dilihat
		$dilihat 					= array(
			'barang_id'					=> $id_barang,
			'barang_dilihat_tanggal'	=> $tgl
		);

		$this->Model_barang->tambah_barang_dilihat($dilihat); // Simpan barang dilihat
	}

}
