<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller
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
		$this->load->model('Model_pengaturan');

		/* Setting */
		$sett 						= $this->Model_pengaturan->get_all_setting();
		$row 						= $sett->row_array();
		$this->email 				= $row['theme_option_email'];
		$this->email_pass 			= $row['theme_option_email_pass'];
		$this->telepon 				= $row['theme_option_telepon'];
		$this->jam 					= $row['theme_option_operasional'];
		$this->wa 					= $row['theme_option_whatsapp'];
		$this->alamat 				= $row['theme_option_alamat'];
		$this->rek 					= $row['theme_option_rekening'];
		$this->faq 					= $row['theme_option_faq'];
		$this->privacy 				= $row['theme_option_privacy'];
		$this->carrer 				= $row['theme_option_career'];
		$this->partner 				= $row['theme_option_partner'];
		$this->contact 				= $row['theme_option_contact'];
	}

	public function index()
	{
		$data['email'] 				= $this->email;
		$data['email_pass']			= $this->email_pass;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['wa']					= $this->wa;
		$data['alamat']				= $this->alamat;
		$data['rek']				= $this->rek;
		$data['title'] 				= 'Pengaturan Aplikasi';
		$this->load->view('admin/pengaturan/View_pengaturan',$data);
	}

	public function pengaturan_lanjutan()
	{
		$data['email'] 				= $this->email;
		$data['email_pass']			= $this->email_pass;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['wa']					= $this->wa;
		$data['alamat']				= $this->alamat;
		$data['rek']				= $this->rek;
		$data['faq']				= $this->faq;
		$data['privacy']			= $this->privacy;
		$data['career']				= $this->carrer;
		$data['partner']			= $this->partner;
		$data['contact']			= $this->contact;
		$data['links']				= $this->Model_pengaturan->get_all_setting();
		$data['links2']				= $this->Model_pengaturan->get_all_setting();
		$data['title'] 				= 'Pengaturan Aplikasi Lanjutan';
		$this->load->view('admin/pengaturan/View_pengaturan_lanjutan',$data);
	}

	public function pengaturan_gambar()
	{
		$data['email'] 				= $this->email;
		$data['email_pass']			= $this->email_pass;
		$data['telepon']			= $this->telepon;
		$data['jam']				= $this->jam;
		$data['wa']					= $this->wa;
		$data['alamat']				= $this->alamat;
		$data['rek']				= $this->rek;
		$data['faq']				= $this->faq;
		$data['privacy']			= $this->privacy;
		$data['career']				= $this->carrer;
		$data['partner']			= $this->partner;
		$data['contact']			= $this->contact;
		$data['title'] 				= 'Pengaturan Aplikasi Gambar';
		$this->load->view('admin/pengaturan/View_pengaturan_gambar',$data);
	}

	public function update_pengaturan()
	{
		$email 						= $this->input->post('email');
		$email_pass 				= $this->input->post('email_pass');
		$wa 						= $this->input->post('whatsapp');
		$telepon 					= $this->input->post('telepon');
		$alamat 					= $this->input->post('alamat');
		$operasional 				= $this->input->post('operasional');
		$rek 						= $this->input->post('rek');

		$pengaturan 				= array(
			'theme_option_email'			=> $email,
			'theme_option_email_pass'		=> $email_pass,
			'theme_option_whatsapp'			=> $wa,
			'theme_option_telepon'			=> $telepon,
			'theme_option_alamat'			=> $alamat,
			'theme_option_operasional'		=> $operasional,
			'theme_option_rekening'			=> $rek
		);

		$query 								= $this->Model_pengaturan->update_pengaturan($pengaturan);

		redirect('admin/pengaturan');
	}

	public function update_pengaturan_lanjutan()
	{
		$faq 						= $this->input->post('faq');
		$privacy 					= $this->input->post('privacy');
		$career 					= $this->input->post('career');
		$partner 					= $this->input->post('partner');
		$contact 					= $this->input->post('contact');

		$pengaturan 				= array(
				'theme_option_faq'			=> $faq,
				'theme_option_privacy'		=> $privacy,
				'theme_option_career'		=> $career,
				'theme_option_partner'		=> $partner,
				'theme_option_contact'		=> $contact
		);

		$query 						= $this->Model_pengaturan->update_pengaturan_lanjutan($pengaturan);

		$query						= $this->Model_pengaturan->get_all_setting();
		foreach($query->result_array() as $i)
		{
			$id 					= $i['theme_option_id'];
			$id_links 				= $this->input->post('id_links_'.$id);
			$tit 					= $this->input->post('links_tit_'.$id);
			$isi 					= $this->input->post('links_isi_'.$id);

			$pengaturan 			= array(
				'theme_option_links_title'		=> $tit,
				'theme_option_links'			=> $isi
			);

			$query 					= $this->Model_pengaturan->update_pengaturan_links($id_links,$pengaturan);
		}

		redirect('admin/pengaturan/pengaturan_lanjutan');
	}

	public function tambah_links()
	{
		$links 				= array(
			'theme_option_links_title'			=> 'LINK BARU',
			'theme_option_links'				=> 'LINK BARU'
		);

		$this->db->insert('tbl_theme_option',$links);

		redirect('admin/pengaturan/pengaturan_lanjutan');
	}

	public function delete_links()
	{
		$id 				= $this->uri->segment('4');
		$this->db->where('theme_option_id',$id);
		$this->db->where('theme_option_id !=','1');
		$this->db->delete('tbl_theme_option');

		redirect('admin/pengaturan/pengaturan_lanjutan');
	}

	public function get_all_banner()
	{
		$ajax 				= $this->Model_pengaturan->get_all_banner();

		echo json_encode($ajax);
	}

	public function simpan_banner()
	{
		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/banner/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);

		if(!empty($_FILES['tambah_foto']['name']))
		{
			if ($this->upload->do_upload('tambah_foto'))
			{
				$gbr = $this->upload->data();
				$config['image_library']='imagemagick';
				$config["library_path"]  ='/usr/bin/convert';
				$config['source_image']='./assets/images/banner/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']=TRUE;
				list($width, $height, $type, $attr) = getimagesize('./assets/images/banner/'.$gbr['file_name']);
				$config['width']= $width/2;
				$config['height']= $height/2;
				$config['quality']= '90%';
				$config['new_image']= './assets/images/banner/'.$gbr['file_name'];
				$this->image_lib->initialize($config);
				$this->image_lib->resize();

				$photo 			= $gbr['file_name'];
				$foto 			= array(
					'banner_item'		=> $photo
				);

				$this->db->insert('tbl_banner',$foto);
			}else
			{
				redirect('admin');
			}
		}

	redirect('admin/pengaturan/pengaturan_gambar');
	}

	public function tampil_banner()
	{
		$id_banner					= $this->input->post('id');

		$tampil 					= array(
			'banner_status'			=> '1'
		);

		$this->db->where('banner_id',$id_banner);
		$query 						= $this->db->update('tbl_banner',$tampil);

		echo json_encode($query);
	}

	public function sembunyi_banner()
	{
		$id_banner					= $this->input->post('id');

		$tampil 					= array(
			'banner_status'			=> '0'
		);

		$this->db->where('banner_id',$id_banner);
		$query 						= $this->db->update('tbl_banner',$tampil);

		echo json_encode($query);
	}

	public function delete_banner()
	{
		$id_banner 					= $this->input->post('id');
		$foto 						= $this->input->post('foto');

		$this->db->where('banner_id',$id_banner);
		$query 						= $this->db->delete('tbl_banner');

		$path 						= './assets/images/banner/'.$foto;
		unlink($path);

		echo json_encode($query);
	}

	public function get_all_iklan()
	{
		$ajax 						= $this->Model_pengaturan->get_all_iklan();

		echo json_encode($ajax);
	}

	public function simpan_iklan()
	{
		$iklan 						= $this->input->post('iklan');
		// Fungsi simpan gambar
		$config 					= array();
		$config['upload_path']		= './assets/images/iklan/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] 	= TRUE;
		$this->upload->initialize($config);

		if(!empty($_FILES['tambah_foto']['name']))
		{
			if ($this->upload->do_upload('tambah_foto'))
			{
				$gbr = $this->upload->data();
				$config['image_library']='imagemagick';
				$config["library_path"]  ='/usr/bin/convert';
				$config['source_image']='./assets/images/iklan/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']=TRUE;
				list($width, $height, $type, $attr) = getimagesize('./assets/images/iklan/'.$gbr['file_name']);
				$config['width']= $width/2;
				$config['height']= $height/2;
				$config['quality']= '90%';
				$config['new_image']= './assets/images/iklan/'.$gbr['file_name'];
				$this->image_lib->initialize($config);
				$this->image_lib->resize();

				$photo 			= $gbr['file_name'];
				$foto 			= array(
					'iklan_item'		=> $photo,
					'iklan_text'		=> $iklan
				);

				$this->db->insert('tbl_iklan',$foto);
			}else
			{
				redirect('admin');
			}
		}

	redirect('admin/pengaturan/pengaturan_gambar');
	}
}
