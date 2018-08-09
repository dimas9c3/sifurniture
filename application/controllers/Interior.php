<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Interior extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_barang');
		$this->load->model('Model_interior');
	}

	public function index()
	{
		
	}

	public function kategori()
	{
		$id_sub1 					= $this->uri->segment('3');
		$data['title'] 				= 'List Jenis Produk Interior';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['sub1']				= $this->Model_interior->get_sub1_by_id($id_sub1);
		$data['list']				= $this->Model_interior->get_kategori_interior_by_id_sub1($id_sub1);
		$this->load->view('frontend/interior/View_kategori_interior',$data);
	}

	public function jenis_interior()
	{
		$id_sub1 					= $this->uri->segment('3');
		$id_sub2 					= $this->uri->segment('4');
		$data['title'] 				= 'List Jenis Produk Interior';
		$data['kategori_navbar'] 	= $this->Model_barang->get_kategori_navbar();
		$data['list']				= $this->Model_interior->get_jenis_interior_front($id_sub1,$id_sub2);
		$this->load->view('frontend/interior/View_jenis_interior',$data);
	}

	public function list_produk()
	{
		$id_kategori 				= $this->uri->segment('3');
		$data['title']				= 'List Produk Interior';
		$data['kategori_navbar']	= $this->Model_barang->get_kategori_navbar();

		$config['base_url'] 		= base_url().'interior/list_produk/'.$id_kategori;
		$config['total_rows'] 		= $this->Model_interior->count_interior_by_id_kategori($id_kategori);
		$config['per_page'] 		= 2;
		$config['uri_segment'] 		= 4;
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
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$this->pagination->initialize($config);

		$data['page']				= $this->pagination->create_links();
		$data['total_row'] 			= $this->Model_interior->count_interior_by_id_kategori($id_kategori);
		$data['list']				= $this->Model_interior->get_list_interior_by_id_kat($id_kategori,$config['per_page'],$pagination);
		$this->load->view('frontend/interior/View_interior',$data);
	}

	public function filter()
	{
		$id_kategori 				= $this->uri->segment('4');
		$data['title']				= 'Produk Barang';
		$data['kategori_navbar']	= $this->Model_barang->get_kategori_navbar();
		$jenis_filter 				= $this->uri->segment('3');

		$config['base_url'] 		= base_url().'interior/filter/'.$jenis_filter.'/'.$id_kategori;
		$config['total_rows'] 		= $this->Model_interior->count_interior_by_id_kategori($id_kategori);
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
		$data['total_row'] 			= $this->Model_interior->count_interior_by_id_kategori($id_kategori);
		$data['list']				= $this->Model_interior->get_list_interior_by_id_kat($id_kategori,$config['per_page'],$pagination);

		$data['page']				= $this->pagination->create_links();

		if($jenis_filter==1)
		{
			$data['list']			= $this->Model_interior->get_interior_by_kategori_front_DESC($id_kategori,$config['per_page'],$pagination);
			$data['jenis_filter'] 	= 1;
		}elseif($jenis_filter==2)
		{
			$data['list']			= $this->Model_interior->get_interior_by_kategori_front_ASC($id_kategori,$config['per_page'],$pagination);
			$data['jenis_filter'] 	= 2;
		}
		$data['total_row'] 			= $this->Model_interior->count_interior_by_id_kategori($id_kategori);

		$this->load->view('frontend/interior/View_interior',$data);
	}

	public function detail()
	{
		$id_interior 				= $this->uri->segment('3');
		$data['title']				= 'Detail Produk Interior';
		$data['kategori_navbar']	= $this->Model_barang->get_kategori_navbar();
		$data['detail']		= $this->Model_interior->get_detail_interior_no_ajax($id_interior);
		$foto_utama 				= $this->Model_interior->get_foto_utama_interior_by_id_no_ajax($id_interior);
		$data['detail_foto']		= $this->Model_interior->get_foto_interior_by_id_no_ajax($id_interior,$foto_utama);
		$this->load->view('frontend/interior/View_detail_interior',$data);
	}

}
