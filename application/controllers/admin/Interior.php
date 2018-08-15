<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Interior extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_interior');
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
	}

	public function index()
	{
		$data['title'] 		= 'Data Interior';
		$this->load->view('admin/interior/View_interior',$data);
	}

	public function get_all_interior()
	{
		$ajax 		= $this->Model_interior->get_all_interior_admin();
		echo json_encode($ajax);
	}

	public function tambah_interior()
	{
		$data['title']				= 'Tambah Data Interior';
		$this->load->view('admin/interior/View_tambah_interior',$data);
	}

	public function set_interior()
	{
		$jml_foto 			= $this->input->post('jml_foto');
		if(empty($jml_foto)) // Jika foto yang dimasukkan cuma satu
		{
			$jml_foto 		= 1;
		}
		$id_interior 		= $this->Model_interior->find_new_id_interior();
		$nm_barang 			= $this->input->post('tambah_nama');
		$deskripsi 			= $this->input->post('tambah_deskripsi');
		$spek 				= $this->input->post('tambah_spek');
		$kategori 			= $this->input->post('tambah_kategori');
		$jual 				= $this->input->post('tambah_jual');
		$diskon 			= $this->input->post('tambah_diskon');
		$interior 			= array(
			'interior_id'			=> $id_interior,
			'kategori_interior_id'	=> $kategori,
			'interior_nama'			=> $nm_barang,
			'interior_harga_jual'	=> $jual,
			'interior_diskon'		=> $diskon,
			'interior_deskripsi'	=> $deskripsi,
			'interior_spek'			=> $spek
		);

		$this->Model_interior->set_interior($interior); // Simpan data Interior

		for($i=0; $i <= $jml_foto; $i++)
	    {
	    	// Fungsi simpan gambar
			$config 					= array();
			$config['upload_path']		= './assets/images/interior/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] 	= TRUE;
		    $this->upload->initialize($config);

			if(!empty($_FILES['tambah_foto'.$i]['name']))
		    {
		        if ($this->upload->do_upload('tambah_foto'.$i))
		        {
		            $gbr = $this->upload->data();
		           	$config['image_library']='imagemagick';
		            $config['source_image']='./assets/images/interior/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
					$config['maintain_ratio']=TRUE;
 				   list($width, $height, $type, $attr) = getimagesize('./assets/images/interior/'.$gbr['file_name']);
 				   	$config['width']= $width/5;
 				   	$config['height']= $height/5;
 				   	$config['quality']= '50%';
		            $config['new_image']= './assets/images/interior/'.$gbr['file_name'];
		            $this->image_lib->initialize($config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
					$foto[] 		= array(
						'interior_id'				=> $id_interior,
						'foto_interior_nama'		=> $photo
					);

				}else
				{
		        	redirect('admin/interior');
		        }
		    }
		}

		    $this->db->insert_batch('tbl_foto_interior', $foto); // fungsi  untuk menyimpan multi array ke database

			// Menyimpan foto utama Interior
			$interior 		= array(
				'foto_interior_id'			=> $this->Model_interior->find_id_foto_utama_interior($id_interior)
			);

			$this->Model_interior->update_interior($id_interior,$interior);

			redirect('admin/interior');

	}

	function delete_interior()
	{
		$id_interior 			= $this->input->post('hapus_id');

		$ajax 					= $this->Model_interior->delete_interior($id_interior);

		$query 					= $this->Model_interior->get_all_foto_interior_by_id_no_ajax($id_interior);
		foreach($query->result_array() as $i)
		{
			$id_foto_interior 	= $i['foto_interior_id'];
			$foto 				= $i['foto_interior_nama'];
			$path 				= './assets/images/interior/'.$foto;
			unlink($path);
			$this->Model_interior->delete_foto_interior_by_id($id_foto_interior);
		}
		echo json_encode($ajax);
	}

	function edit_interior()
	{
		$id_interior 				= $this->uri->segment(4);
		$data['title']				= 'Edit Data Interior';
		$this->load->view('admin/interior/View_edit_interior',$data);
	}

	/* ==== Class Kategori Interior === */
	public function kategori_interior()
	{
		$data['title'] 		= 'Kategori Utama Interior';
		$this->load->view('admin/interior/View_kategori_interior',$data);
	}

	public function get_all_kategori_interior()
	{
		$ajax 		= $this->Model_interior->get_all_kategori_interior();
		echo json_encode($ajax);
	}

	public function get_select_kategori_interior_ajax()
	{
		$ajax 		= $this->Model_interior->get_select_kategori_interior_ajax();
		echo json_encode($ajax);
	}

	public function get_kategori_interior_by_id()
	{
		$id_kategori 		= $this->input->post('id_kategori');
		$ajax 				= $this->Model_interior->get_kategori_interior_by_id($id_kategori);

		echo json_encode($ajax);
	}

	public function set_kategori_interior()
	{
		$id_kategori 		= $this->Model_interior->find_new_id_kategori_interior();
		$nm_kategori 		= $this->input->post('tambah_nama');
		$sub1 				= $this->input->post('tambah_sub1');
		$sub2 				= $this->input->post('tambah_sub2');

		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/kategori_interior/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);

			if(!empty($_FILES['tambah_foto']['name']))
		    {
		        if ($this->upload->do_upload('tambah_foto'))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='imagemagick';
		            $config['source_image']='./assets/images/kategori_interior/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
					$config['maintain_ratio']=TRUE;
					list($width, $height, $type, $attr) = getimagesize('./assets/images/kategori_interior/'.$gbr['file_name']);
					$config['width']= $width/5;
		           	$config['height']= $height/5;
		            $config['quality']= '50%';
		            $config['new_image']= './assets/images/kategori_interior/'.$gbr['file_name'];
		            $this->image_lib->initialize($config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
		            $kategori 			= array(
						'kategori_interior_id'				=> $id_kategori,
						'sub_1_kategori_interior_id'		=> $sub1,
						'sub_2_kategori_interior_id'		=> $sub2,
						'kategori_interior_nama'			=> $nm_kategori,
						'kategori_interior_foto'			=> $photo);
					$ajax 				= $this->Model_interior->set_kategori_interior($kategori);
					echo json_encode($ajax);
				}else
				{
		        	redirect('admin/interior/kategori_interior');
		        }
		    }

	}

	public function delete_kategori_interior()
	{
		$id_kategori 		= $this->input->post('hapus_id');
		$foto 				= $this->input->post('foto');
		$path 				= './assets/images/kategori_interior/'.$foto;

		$ajax 				= $this->Model_interior->delete_kategori_interior($id_kategori);
		unlink($path);
		echo json_encode($ajax);
	}

	public function update_kategori_interior()
	{
		$id_kategori 		= $this->input->post('edit_id');
		$nm_kategori 		= $this->input->post('edit_nama');
		$sub1 				= $this->input->post('edit_sub1');
		$sub2 				= $this->input->post('edit_sub2');

		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/kategori_interior/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);

			if(!empty($_FILES['edit_foto']['name']))
		    {
		    	$foto 			= $this->input->post('edit_foto_old');
		    	$path 			= './assets/images/kategori_interior/'.$foto;
		    	unlink($path);

		        if ($this->upload->do_upload('edit_foto'))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='imagemagick';
		            $config['source_image']='./assets/images/kategori_interior/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
					$config['maintain_ratio']=TRUE;
					list($width, $height, $type, $attr) = getimagesize('./assets/images/kategori_interior/'.$gbr['file_name']);
					$config['width']= $width/5;
		           	$config['height']= $height/5;
		            $config['quality']= '50%';
		            $config['new_image']= './assets/images/kategori_interior/'.$gbr['file_name'];
		            $this->image_lib->initialize($config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
		            $kategori 			= array(
						'sub_1_kategori_interior_id'		=> $sub1,
						'sub_2_kategori_interior_id'		=> $sub2,
						'kategori_interior_nama'			=> $nm_kategori,
						'kategori_interior_foto'			=> $photo);
					$ajax 				= $this->Model_interior->update_kategori_interior($id_kategori,$kategori);
					echo json_encode($ajax);
				}else
				{
		        	$kategori 			= array(
						'sub_1_kategori_interior_id'		=> $sub1,
						'sub_2_kategori_interior_id'		=> $sub2,
						'kategori_interior_nama'			=> $nm_kategori);
					$ajax 				= $this->Model_interior->update_kategori_interior($id_kategori,$kategori);
					echo json_encode($ajax);
		        }
		    }
	}

	/* ==== Class Sub 1 Kategori Interior === */
	public function sub_1_kategori_interior()
	{
		$data['title'] 		= 'Sub 1 Kategori Interior';
		$this->load->view('admin/interior/View_sub_1_kategori_interior',$data);
	}

	public function get_all_sub_1_kategori_interior()
	{
		$ajax 		= $this->Model_interior->get_all_sub_1_kategori_interior();
		echo json_encode($ajax);
	}

	public function get_select_sub_1_kategori_ajax()
	{
		$ajax 		= $this->Model_interior->get_select_sub_1_kategori_ajax();
		echo json_encode($ajax);
	}

	public function get_sub_1_kategori_interior_by_id()
	{
		$id_sub_1_kategori 		= $this->input->post('id_sub_kategori');
		$ajax 					= $this->Model_interior->get_sub_1_kategori_interior_by_id($id_sub_1_kategori);

		echo json_encode($ajax);
	}

	public function set_sub_1_kategori_interior()
	{
		$id_sub_1_kategori 		= $this->Model_interior->find_new_id_sub_1_kategori_interior();
		$nm_sub_1_kategori 		= $this->input->post('tambah_nama');

		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/sub_1_kategori_interior/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);

			if(!empty($_FILES['tambah_foto']['name']))
		    {
		        if ($this->upload->do_upload('tambah_foto'))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='imagemagick';
		            $config['source_image']='./assets/images/sub_1_kategori_interior/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
					$config['maintain_ratio']=TRUE;
					list($width, $height, $type, $attr) = getimagesize('./assets/images/sub_1_kategori_interior/'.$gbr['file_name']);
					$config['width']= $width/5;
		           	$config['height']= $height/5;
		            $config['quality']= '50%';
		            $config['new_image']= './assets/images/sub_1_kategori_interior/'.$gbr['file_name'];
		            $this->image_lib->initialize($config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
		            $sub_1_kategori 			= array(
						'sub_1_kategori_interior_id'		=> $id_sub_1_kategori,
						'sub_1_kategori_interior_nama'		=> $nm_sub_1_kategori,
						'sub_1_kategori_interior_foto'		=> $photo);
					$ajax 				= $this->Model_interior->set_sub_1_kategori_interior($sub_1_kategori);
					echo json_encode($ajax);
				}else
				{
		        	redirect('admin/interior/sub_1_kategori_interior');
		        }
		    }

	}

	public function delete_sub_1_kategori_interior()
	{
		$id_sub_1_kategori 		= $this->input->post('hapus_id');
		$foto 					= $this->input->post('foto');
		$path 					= './assets/images/sub_1_kategori_interior/'.$foto;

		$ajax 					= $this->Model_interior->delete_sub_1_kategori_interior($id_sub_1_kategori);
		$ajax1 					= unlink($path);
		echo json_encode($ajax1);
	}

	public function update_sub_1_kategori_interior()
	{
		$id_sub_1_kategori 		= $this->input->post('edit_id');
		$nm_sub_1_kategori		= $this->input->post('edit_nama');
		$foto_old 				= $this->input->post('edit_foto_old');

		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/sub_1_kategori_interior/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);

			if(!empty($_FILES['edit_foto']['name']))
		    {
		    	$path 			= './assets/images/sub_1_kategori_interior/'.$foto_old; // hapus images lama
		    	unlink($path)	;

		        if ($this->upload->do_upload('edit_foto'))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='imagemagick';
		            $config['source_image']='./assets/images/sub_1_kategori_interior/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
					$config['maintain_ratio']=TRUE;
					list($width, $height, $type, $attr) = getimagesize('./assets/images/sub_1_kategori_interior/'.$gbr['file_name']);
					$config['width']= $width/5;
		           	$config['height']= $height/5;
		            $config['quality']= '50%';
		            $config['new_image']= './assets/images/sub_1_kategori_interior/'.$gbr['file_name'];
		            $this->image_lib->initialize($config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
		            $sub_1_kategori 			= array(
						'sub_1_kategori_interior_nama'		=> $nm_sub_1_kategori,
						'sub_1_kategori_interior_foto'		=> $photo);
					$ajax 				= $this->Model_interior->update_sub_1_kategori_interior($id_sub_1_kategori,$sub_1_kategori);
					echo json_encode($ajax);
				}else
				{
		        	 $sub_1_kategori 			= array(
						'sub_1_kategori_interior_nama'		=> $nm_sub_1_kategori);
					$ajax 				= $this->Model_interior->update_sub_1_kategori_interior($id_sub_1_kategori,$sub_1_kategori);
					echo json_encode($ajax);
		        }
		    }
	}



	/* ==== Class Sub 2 Kategori Interior === */
	public function sub_2_kategori_interior()
	{
		$data['title'] 		= 'Sub 2 Kategori Interior';
		$this->load->view('admin/interior/View_sub_2_kategori_interior',$data);
	}

	public function get_all_sub_2_kategori_interior()
	{
		$ajax 		= $this->Model_interior->get_all_sub_2_kategori_interior();
		echo json_encode($ajax);
	}

	public function get_select_sub_2_kategori_ajax()
	{
		$ajax 		= $this->Model_interior->get_select_sub_2_kategori_ajax();
		echo json_encode($ajax);
	}

	public function get_sub_2_kategori_interior_by_id()
	{
		$id_sub_2_kategori 		= $this->input->post('id_sub_kategori');
		$ajax 					= $this->Model_interior->get_sub_2_kategori_interior_by_id($id_sub_2_kategori);

		echo json_encode($ajax);
	}

	public function set_sub_2_kategori_interior()
	{
		$id_sub_2_kategori 		= $this->Model_interior->find_new_id_sub_2_kategori_interior();
		$nm_sub_2_kategori 		= $this->input->post('tambah_nama');

		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/sub_2_kategori_interior/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);

			if(!empty($_FILES['tambah_foto']['name']))
		    {
		        if ($this->upload->do_upload('tambah_foto'))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='imagemagick';
		            $config['source_image']='./assets/images/sub_2_kategori_interior/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
					$config['maintain_ratio']=TRUE;
					list($width, $height, $type, $attr) = getimagesize('./assets/images/sub_2_kategori_interior/'.$gbr['file_name']);
					$config['width']= $width/5;
		           	$config['height']= $height/5;
		            $config['quality']= '50%';
		            $config['new_image']= './assets/images/sub_2_kategori_interior/'.$gbr['file_name'];
		            $this->image_lib->initialize($config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
		            $sub_2_kategori 			= array(
						'sub_2_kategori_interior_id'		=> $id_sub_2_kategori,
						'sub_2_kategori_interior_nama'		=> $nm_sub_2_kategori,
						'sub_2_kategori_interior_foto'		=> $photo);
					$ajax 				= $this->Model_interior->set_sub_2_kategori_interior($sub_2_kategori);
					echo json_encode($ajax);
				}else
				{
		        	redirect('admin/interior/sub_2_kategori_interior');
		        }
		    }

	}

	public function delete_sub_2_kategori_interior()
	{
		$id_sub_2_kategori 		= $this->input->post('hapus_id');
		$foto 					= $this->input->post('foto');
		$path 					= './assets/images/sub_2_kategori_interior/'.$foto;

		$ajax 					= $this->Model_interior->delete_sub_2_kategori_interior($id_sub_2_kategori);
		$ajax1 					= unlink($path);
		echo json_encode($ajax1);
	}

	public function update_sub_2_kategori_interior()
	{
		$id_sub_2_kategori 		= $this->input->post('edit_id');
		$nm_sub_2_kategori		= $this->input->post('edit_nama');
		$foto_old 				= $this->input->post('edit_foto_old');

		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/sub_2_kategori_interior/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);

			if(!empty($_FILES['edit_foto'.$i]['name']))
		    {
		    	$path 			= './assets/images/sub_2_kategori_interior/'.$foto_old; // hapus images lama
		    	unlink($path)	;

		        if ($this->upload->do_upload('edit_foto'.$i))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='imagemagick';
		            $config['source_image']='./assets/images/sub_2_kategori_interior/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
					$config['maintain_ratio']=TRUE;
					list($width, $height, $type, $attr) = getimagesize('./assets/images/sub_2_kategori_interior/'.$gbr['file_name']);
					$config['width']= $width/5;
		           	$config['height']= $height/5;
		            $config['quality']= '50%';
		            $config['new_image']= './assets/images/sub_2_kategori_interior/'.$gbr['file_name'];
		            $this->image_lib->initialize($config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
		            $sub_2_kategori 			= array(
						'sub_2_kategori_interior_nama'		=> $nm_sub_2_kategori,
						'sub_2_kategori_interior_foto'		=> $photo);
					$ajax 				= $this->Model_interior->update_sub_2_kategori_interior($id_sub_2_kategori,$sub_2_kategori);
					echo json_encode($ajax);
				}else
				{
		        	 $sub_2_kategori 			= array(
						'sub_2_kategori_interior_nama'		=> $nm_sub_2_kategori);
					$ajax 				= $this->Model_interior->update_sub_2_kategori_interior($id_sub_2_kategori,$sub_2_kategori);
					echo json_encode($ajax);
		        }
		    }
	}

}
