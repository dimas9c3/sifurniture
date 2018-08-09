<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dilihat extends CI_Model {

	function get_all_barang_dilihat($tahun,$bulan)
	{
		$this->db->select('count(tbl_barang.barang_id) as jml_dilihat,tbl_barang.barang_id,tbl_barang.barang_nama');
		$this->db->from('tbl_barang_dilihat');
		$this->db->join('tbl_barang','tbl_barang.barang_id=tbl_barang_dilihat.barang_id','INNER');
		$where      = "year(tbl_barang_dilihat.barang_dilihat_tanggal)= $tahun AND month(tbl_barang_dilihat.barang_dilihat_tanggal) = $bulan";
		$this->db->where($where);
		$this->db->group_by('tbl_barang.barang_id');
		$this->db->order_by('tbl_barang.barang_nama');
		$query 			= $this->db->get();

		if($query->num_rows()>0)
		{
			$data 			= array();
			$no 			= 0;
			foreach($query->result_array() as $i)
			{
				$row 			= array();
				$no++;
				$row[]			= $no;
				$row[]			= $i['barang_nama'];
				$row[]			= $i['jml_dilihat'];

				$data[]			= $row;
			}
		}else
		{
			$data 			= array();
			$row			= array();
			$row[]			= '';
			$row[]			= '';
			$row[]			= '';

			$data[]			= $row;
		}

		return $data 		= array(
			'data'			=> $data
		);
	}

}

/* End of file Model_dilihat.php */
/* Location: ./application/models/Model_dilihat.php */