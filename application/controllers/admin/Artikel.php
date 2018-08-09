<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		$this->load->model('Model_artikel');
	}

	public function index()
	{
		$data['title']				= 'Data Artikel';
		$this->load->view('admin/artikel/View_artikel',$data);
	}

	public function get_all_artikel()
	{
		$ajax 						= $this->Model_artikel->get_all_artikel();

		echo json_encode($ajax);
	}

	public function get_artikel_by_id()
	{
		$id_artikel 				= $this->input->post('id_artikel');
		$ajax 						= $this->Model_artikel->get_artikel_by_id($id_artikel);

		echo json_encode($ajax);
	}

	public function tambah_artikel()
	{
		$data['title'] 				= 'Tambah Artikel';
		$this->load->view('admin/artikel/View_tambah_artikel',$data);
	}

	public function set_artikel()
	{
		$judul	 			= $this->input->post('tambah_nama');
		$isi 	 			= $this->input->post('tambah_isi');

		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/artikel/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp'; 
		$config['encrypt_name'] 	= TRUE;         	
		    $this->upload->initialize($config);

			if(!empty($_FILES['tambah_foto'.$i]['name']))
		    {	
		        if ($this->upload->do_upload('tambah_foto'.$i))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='gd2';
		            $config['source_image']='./assets/images/artikel/'.$gbr['file_name'];
		            $config['create_thumb']= TRUE;
		            $config['maintain_ratio']= TRUE;
		            $config['quality']= '20%';
		            //$config['width']= 1000;
		            //$config['height']= 1000;
		            $config['new_image']= './assets/images/artikel/'.$gbr['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
					$artikel 			= array(
						'artikel_judul'		=> $judul,
						'artikel_isi'		=> $isi,
						'artikel_foto'	=> $photo
					);
				}else
				{
		        	redirect('admin/artikel');
		        }    
		    }         

		$this->Model_artikel->set_artikel($artikel); // Simpan data artikel

		redirect('admin/artikel');
	}

	public function edit_artikel()
	{
		$data['title']				= 'Edit Artikel';
		$this->load->view('admin/artikel/View_edit_artikel',$data);
	}

	public function update_artikel()
	{
		$id_artikel 		= $this->input->post('id_artikel');
		$judul	 			= $this->input->post('tambah_nama');
		$isi 	 			= $this->input->post('tambah_isi');

		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/artikel/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp'; 
		$config['encrypt_name'] 	= TRUE;         	
		    $this->upload->initialize($config);

			if(!empty($_FILES['tambah_foto'.$i]['name']))
		    {	
		        if ($this->upload->do_upload('tambah_foto'.$i))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='gd2';
		            $config['source_image']='./assets/images/artikel/'.$gbr['file_name'];
		            $config['create_thumb']= TRUE;
		            $config['maintain_ratio']= TRUE;
		            $config['quality']= '20%';
		            //$config['width']= 1000;
		            //$config['height']= 1000;
		            $config['new_image']= './assets/images/artikel/'.$gbr['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
					$artikel 			= array(
						'artikel_judul'		=> $judul,
						'artikel_isi'		=> $isi,
						'artikel_foto'	=> $photo
					);
				}else
				{
		        	redirect('admin/artikel');
		        }    
		    }else
		    {
		    	$artikel 			= array(
						'artikel_judul'		=> $judul,
						'artikel_isi'		=> $isi
					);
		    }         

		$this->Model_artikel->update_artikel($id_artikel,$artikel); // Simpan data artikel

		redirect('admin/artikel');
	}

	public function delete_artikel()
	{
		$id_artikel 			= $this->input->post('hapus_id');
		$foto 					= $this->input->post('foto');

		$ajax 					= $this->Model_artikel->delete_artikel($id_artikel);

		if($ajax=TRUE)
		{
			$path 				= './assets/images/artikel/'.$foto;

			unlink($path);
		}

		echo json_encode($ajax);
	}
}