<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengaturan extends CI_Model {

	function get_all_setting()
	{
		$query 			= $this->db->get('tbl_theme_option');

		return $query;
	}

	function get_setting_by_id($id_links)
	{
		$this->db->where('theme_option_id',$id_links);
		$query 			= $this->db->get('tbl_theme_option');

		return $query;
	}

	function get_all_banner()
	{
		$query 			= $this->db->get('tbl_banner');

		if ($query->num_rows() > 0)
		{
			$data 				= array();
			foreach($query->result_array() as $i)
			{
				$sts 			= $i['banner_status'];

				if ($sts==1)
				{
					$status 	= 'Tampil';
				}else {
					$status 	= 'Tidak Ditampilkan';
				}
				$path 			=
				$row 			= array();
				$row[] 			= "<a href='".base_url()."assets/images/banner/".$i['banner_item']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/banner/".$i['banner_item']."'></a";
				$row[]			= $status;
				$row[]			= "
					<button type='button' id='".$i['banner_id']."' class='btn btn-primary btn-tampil' name='button'>Tampil</button>
					<button type='button' id='".$i['banner_id']."' class='btn btn-primary btn-sembunyi' name='button'>Jangan Tampil</button>
					<button type='button' id='".$i['banner_id']."' foto='".$i['banner_item']."' class='btn btn-danger btn-hapus' name='button'>Hapus</button>

				";

				$data[]			= $row;
			}
		}else
		{
			$data 				= array();
			$row 				= array();
			$row[]				= '';
			$row[]				= '';
			$row[]				= '';

			$data[]			 	= $row;
		}

		return $data 			= array(
			'data'				=> $data
		);
	}

	function get_all_banner_front()
	{
		$this->db->where('banner_status','1');
		$query 					= $this->db->get('tbl_banner');

		return $query;
	}

	function update_pengaturan($pengaturan)
	{
		$this->db->where('theme_option_id','1');
		$query 					= $this->db->update('tbl_theme_option',$pengaturan);

		return $query;
	}

	function update_pengaturan_lanjutan($pengaturan)
	{
		$this->db->where('theme_option_id','1');
		$query 					= $this->db->update('tbl_theme_option',$pengaturan);

		return $query;
	}

	function update_pengaturan_links($id_links,$pengaturan)
	{
		$this->db->where('theme_option_id',$id_links);
		$query 					= $this->db->update('tbl_theme_option',$pengaturan);

		return $query;
	}

	function get_all_iklan()
	{
		$query 			= $this->db->get('tbl_iklan');

		if ($query->num_rows() > 0)
		{
			$data 				= array();
			foreach($query->result_array() as $i)
			{
				$sts 			= $i['iklan_status'];

				if ($sts==1)
				{
					$status 	= 'Tampil';
				}else {
					$status 	= 'Tidak Ditampilkan';
				}
				$path 			=
				$row 			= array();
				$row[] 			= "<a href='".base_url()."assets/images/iklan/".$i['iklan_item']."'><img width='100' height='100' class='img-responsive float-right' src='".base_url()."assets/images/iklan/".$i['iklan_item']."'></a";
				$row[]			= $status;
				$row[]			= "
					<!--<button type='button' id='".$i['iklan_id']."' class='btn btn-primary btn-tampil' name='button'>Tampil</button>
					<button type='button' id='".$i['iklan_id']."' class='btn btn-primary btn-sembunyi' name='button'>Jangan Tampil</button>
					<button type='button' id='".$i['iklan_id']."' class='btn btn-info btn-edit' name='button'>Edit</button>
					<button type='button' id='".$i['iklan_id']."' foto='".$i['iklan_item']."' class='btn btn-danger btn-hapus' name='button'>Hapus</button>-->

				";

				$data[]			= $row;
			}
		}else
		{
			$data 				= array();
			$row 				= array();
			$row[]				= '';
			$row[]				= '';
			$row[]				= '';

			$data[]			 	= $row;
		}

		return $data 			= array(
			'data'				=> $data
		);
	}

	function get_all_iklan_front()
	{
		$query 					= $this->db->get('tbl_iklan');

		return $query;
	}

}

/* End of file Model_pengaturan.php */
/* Location: ./application/models/Model_pengaturan.php */
