<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_barang');
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
		$data['title'] 		= 'Data Barang Ready Stock';
		$this->load->view('admin/barang/View_barang',$data);
	}

	public function get_all_barang()
	{
		$ajax 		= $this->Model_barang->get_all_barang_admin();
		echo json_encode($ajax);
	}

	public function get_barang_by_id()
	{
		$id_barang 			= $this->input->post('id_barang');
		$ajax 				= $this->Model_barang->get_barang_by_id($id_barang);
		echo json_encode($ajax);
	}

	public function get_foto_utama_barang_by_id()
	{
		$id_barang 			= $this->input->post('id_barang');
		$ajax 				= $this->Model_barang->get_foto_utama_barang_by_id($id_barang);
		echo json_encode($ajax);
	}

	public function get_foto_barang_by_id()
	{
		$id_barang 			= $this->input->post('id_barang');
		$foto_utama 		= $this->Model_barang->get_foto_utama_barang_by_id_no_ajax($id_barang);
		$ajax 				= $this->Model_barang->get_foto_barang_by_id($id_barang,$foto_utama);
		echo json_encode($ajax);
	}

	public function tambah_barang()
	{
		$data['title']				= 'Tambah Data Barang';
		$data['warna']				= $this->Model_barang->get_warna_all();
		$this->load->view('admin/barang/View_tambah_barang',$data);
	}

	public function set_barang()
	{
		$jml_foto 			= $this->input->post('jml_foto');
		if(empty($jml_foto)) // Jika foto yang dimasukkan cuma satu
		{
			$jml_foto 		= 1;
		}
		$id_barang 			= $this->Model_barang->find_new_id_barang();
		$nm_barang 			= $this->input->post('tambah_nama');
		$deskripsi 			= $this->input->post('tambah_deskripsi');
		$kategori 			= $this->input->post('tambah_kategori');
		$jual 				= $this->input->post('tambah_jual');
		$diskon 			= $this->input->post('tambah_diskon');
		$dimensi 			= $this->input->post('tambah_dimensi');
		$warna 				= $this->input->post('tambah_warna');
		$barang 			= array(
			'barang_id'			=> $id_barang,
			'sub_kategori_id'	=> $kategori,
			'barang_nama'		=> $nm_barang,
			'barang_harga_jual'	=> $jual,
			'barang_diskon'		=> $diskon,
			'barang_deskripsi'	=> $deskripsi,
			'barang_dimensi'	=> $dimensi
		);

		$this->Model_barang->set_barang($barang); // Simpan data barang

		$jml_warna 			= count($warna);

		if ($jml_warna>0)
		{
			for($i=0;$i<$jml_warna;$i++)
			{
				$wrn[] 			= array(
					'warna_id'			=> $warna[$i],
					'barang_id'			=> $id_barang
				);
			}
			$this->db->insert_batch('tbl_warna_barang', $wrn);
		}

		for($i=0; $i <= $jml_foto; $i++)
	    {
	    	// Fungsi simpan gambar
			$config 					= array();
			$config['upload_path']		= './assets/images/barang/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] 	= TRUE;
		    $this->upload->initialize($config);

			if(!empty($_FILES['tambah_foto'.$i]['name']))
		    {
		        if ($this->upload->do_upload('tambah_foto'.$i))
		        {
		            $gbr = $this->upload->data();
		            $config['image_library']='imagemagick';
					$config["library_path"]  ='/usr/bin/convert';
		            $config['source_image']='./assets/images/barang/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']=TRUE;
					list($width, $height, $type, $attr) = getimagesize('./assets/images/barang/'.$gbr['file_name']);
					$config['width']= $width/5;
		           	$config['height']= $height/5;
		            $config['quality']= '50%';
		            $config['new_image']= './assets/images/barang/'.$gbr['file_name'];
		            $this->image_lib->initialize($config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
					$foto[] 		= array(
						'barang_id'				=> $id_barang,
						'foto_barang_nama'		=> $photo
					);

				}else
				{
		        	redirect('admin/barang');
		        }
		    }

	    }

		$this->db->insert_batch('tbl_foto_barang', $foto); // fungsi  untuk menyimpan multi array ke database

		//Menyimpan foto utama barang
		$barang 		= array(
			'foto_barang_id'			=> $this->Model_barang->find_id_foto_utama_barang($id_barang)
		);

		$this->Model_barang->update_barang($id_barang,$barang);
		redirect('admin/barang');
	}

	function set_foto_utama()
	{
		$id_barang 				= $this->input->post('barang_id');
		$foto_barang_id 		= $this->input->post('foto_barang_id');
		$foto 					= array(
			'foto_barang_id'		=> $foto_barang_id
		);

		$ajax 					= $this->Model_barang->set_foto_utama($id_barang,$foto);
	}

	function delete_barang()
	{
		$id_barang 				= $this->input->post('hapus_id');
		$kategori_old 			= $this->input->post('kategori');
		$subkategori_old 		= $this->input->post('subkategori');

		$ajax 					= $this->Model_barang->delete_barang($id_barang);

		$query 					= $this->Model_barang->get_all_foto_barang_by_id_no_ajax($id_barang);
		foreach($query->result_array() as $i)
		{
			$id_foto_barang 	= $i['foto_barang_id'];
			$foto 				= $i['foto_barang_nama'];
			$path 				= './assets/images/barang/'.$foto;
			unlink($path);
			$this->Model_barang->delete_foto_barang_by_id($id_foto_barang);
		}
		echo json_encode($ajax);
	}

	public function delete_foto_barang_by_id()
	{
		$id_foto_barang 		= $this->input->post('hapus_id');
		$path 					= './assets/images/barang/'.$this->input->post('hapus_nama');
		unlink($path);

		$ajax 					= $this->Model_barang->delete_foto_barang_by_id($id_foto_barang);

		echo json_encode($ajax);
	}

	function edit_barang()
	{
		$id_barang 				= $this->uri->segment(4);
		$data['title']			= 'Edit Data Barang';
		$this->load->view('admin/barang/View_edit_barang',$data);
	}

	function edit_foto()
	{
		$id_barang 			 	= $this->uri->segment(4);
		$data['title']			= 'Data Foto Barang '.$id_barang;
		$this->load->view('admin/barang/View_edit_foto',$data);
	}

	function update_barang()
	{
		$jml_foto 			= $this->input->post('jml_foto');
		if(empty($jml_foto)) // Jika foto yang dimasukkan cuma satu
		{
			$jml_foto 		= 1;
		}
		$id_barang 			= $this->input->post('id_barang');
		$nm_barang 			= $this->input->post('edit_nama');
		$deskripsi 			= $this->input->post('edit_deskripsi');
		$kategori 			= $this->input->post('edit_kategori');
		$kategori_old 		= $this->input->post('edit_kategori_old');
		$jual 				= $this->input->post('edit_jual');
		$dimensi			= $this->input->post('edit_dimensi');
		$barang 			= array(
			'sub_kategori_id'	=> $kategori,
			'barang_nama'		=> $nm_barang,
			'barang_harga_jual'	=> $jual,
			'barang_deskripsi'	=> $deskripsi,
			'barang_dimensi'	=> $dimensi
		);

		$this->Model_barang->update_barang($id_barang,$barang); // Update data barang

		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/barang/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		for($i=0; $i <= $jml_foto; $i++)
	    {
		    $this->upload->initialize($config);

			if(!empty($_FILES['tambah_foto'.$i]['name']))
		    {
		        if ($this->upload->do_upload('tambah_foto'.$i))
		        {
		            $gbr = $this->upload->data();
					$config['image_library']='imagemagick';
					$config["library_path"]  ='/usr/bin/convert';
		            $config['source_image']='./assets/images/barang/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']=TRUE;
					list($width, $height, $type, $attr) = getimagesize('./assets/images/barang/'.$gbr['file_name']);
					$config['width']= $width/5;
		           	$config['height']= $height/5;
		            $config['quality']= '50%';
		            $config['new_image']= './assets/images/barang/'.$gbr['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();

		            $photo 			= $gbr['file_name'];
					$foto[] 		= array(
						'barang_id'				=> $id_barang,
						'foto_barang_nama'		=> $photo
					);
				}else
				{
		        	redirect('admin/barang');
		        }
		    }

	    }

	    // Pengecekan field foto apadakah ada data yang akan diupload
	    $tbh_foto 		= 0;
	    for($i=0; $i <= $jml_foto; $i++)
	    {
	    	if(!empty($_FILES['tambah_foto'.$i]['name']))
		    {
		    	$tbh_foto 		 = ($tbh_foto+1);
		    }else
		    {
		    	$tbh_foto 			= ($tbh_foto+0);
		    }

	    }

		if($tbh_foto>0)
		{
			$this->db->insert_batch('tbl_foto_barang', $foto); // fungsi  untuk menyimpan multi array ke database
		}


		redirect('admin/barang');
	}

	/* ==== Class Kategori === */
	public function kategori()
	{
		$data['title'] 		= 'Kategori Barang';
		$this->load->view('admin/barang/View_kategori',$data);
	}

	public function get_all_kategori()
	{
		$ajax 		= $this->Model_barang->get_all_kategori();
		echo json_encode($ajax);
	}

	public function get_select_kategori_ajax()
	{
		$ajax 		= $this->Model_barang->get_select_kategori_ajax();
		echo json_encode($ajax);
	}

	public function get_kategori_by_id()
	{
		$id_kategori 		= $this->input->post('id_kategori');
		$ajax 				= $this->Model_barang->get_kategori_by_id($id_kategori);

		echo json_encode($ajax);
	}

	public function set_kategori()
	{
		$nm_kategori 		= $this->input->post('tambah_nama');

		$kategori 			= array(
			'kategori_nama'		=> $nm_kategori
		);

		$ajax 				= $this->Model_barang->set_kategori($kategori);
		echo json_encode($ajax);
	}

	public function delete_kategori()
	{
		$id_kategori 		= $this->input->post('hapus_id');

		$ajax 				= $this->Model_barang->delete_kategori($id_kategori);
		echo json_encode($ajax);
	}

	public function update_kategori()
	{
		$id_kategori 		= $this->input->post('edit_id');
		$nm_kategori		= $this->input->post('edit_nama');
		$kategori 			= array(
			'kategori_nama'		=> $nm_kategori
		);

		$ajax 				= $this->Model_barang->update_kategori($id_kategori,$kategori);
		echo json_encode($ajax);
	}

	/* ==== Class Sub Kategori === */
	public function sub_kategori()
	{
		$data['title'] 		= 'Sub Kategori Barang';
		$this->load->view('admin/barang/View_sub_kategori',$data);
	}

	public function get_all_sub_kategori()
	{
		$ajax 		= $this->Model_barang->get_all_sub_kategori();
		echo json_encode($ajax);
	}

	public function get_select_subkategori_ajax()
	{
		$ajax 		= $this->Model_barang->get_select_subkategori_ajax();
		echo json_encode($ajax);
	}

	public function get_sub_kategori_by_id()
	{
		$id_sub_kategori 		= $this->input->post('id_sub_kategori');
		$ajax 					= $this->Model_barang->get_sub_kategori_by_id($id_sub_kategori);

		echo json_encode($ajax);
	}

	public function set_sub_kategori()
	{
		$nm_sub_kategori 		= $this->input->post('tambah_nama');
		$id_kategori 			= $this->input->post('tambah_kategori');

		$sub_kategori 			= array(
			'kategori_id'			=> $id_kategori,
			'sub_kategori_nama'		=> $nm_sub_kategori
		);

		$ajax 				= $this->Model_barang->set_sub_kategori($sub_kategori);
		echo json_encode($ajax);
	}

	public function delete_sub_kategori()
	{
		$id_sub_kategori 		= $this->input->post('hapus_id');

		$ajax 				= $this->Model_barang->delete_sub_kategori($id_sub_kategori);
		echo json_encode($ajax);
	}

	public function update_sub_kategori()
	{
		$id_sub_kategori 		= $this->input->post('edit_id');
		$id_kategori 			= $this->input->post('edit_kategori');
		$nm_sub_kategori		= $this->input->post('edit_nama');
		$sub_kategori 			= array(
			'kategori_id'		=> $id_kategori,
			'sub_kategori_nama'	=> $nm_sub_kategori
		);

		$ajax 				= $this->Model_barang->update_sub_kategori($id_sub_kategori,$sub_kategori);
		echo json_encode($ajax);
	}

}
