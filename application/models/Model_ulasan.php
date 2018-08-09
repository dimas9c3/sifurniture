<?php 
class Model_ulasan extends Ci_Model
{
	/* ==== ADMIN AREA ==== */
	function get_all_ulasan_admin()
	{
		$this->db->select('*');
		$this->db->from('tbl_ulasan');
		$this->db->order_by('tbl_ulasan.created_at','DESC');
		$query 			 = $this->db->get();

		if($query->num_rows() >0)
		{
			$data 			= array();
			$no 			= 0;
			foreach($query->result_array() as $i)
			{
				$no++;
				$row 		= array();
				$row[]		= $no;
				$row[]		= $i['penjualan_id'];
				$row[]		= $i['ulasan_rating'];
				$row[]		= $i['ulasan_isi'];
				$tpl 		= $i['ulasan_tampil'];

				if($tpl==0)
				{
					$aksi 	=
					"<a href='".base_url().'user/pembelian/detail_pembelian/'.$i['penjualan_id']."'><button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-tambah'><span> Detail Pembelian</span></button></a>
					<button type='button' data='".$i['ulasan_id']."' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-tampil'><span> Tampilkan</span></button>
					<button type='button' data='".$i['ulasan_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-hapus'><span> Hapus Ulasan</span></button>"; 
				}elseif($tpl==1)
				{
					$aksi 	=
					"<a href='".base_url().'user/pembelian/detail_pembelian/'.$i['penjualan_id']."'><button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-tambah'><span> Detail Pembelian</span></button></a>
					<button type='button' data='".$i['ulasan_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-hapus'><span> Hapus Ulasan</span></button>"; 
				}
				$row[]		= $aksi;
				

				$data[] 	= $row;
			}
		}else
		{
			$data 			= array();
			$row 			= array();
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';

			$data[]			= $row;
		}

		return $data 		= array(
			'data'			=> $data
		);
	}

	function get_ulasan_ditampilkan()
	{
		$this->db->select('*');
		$this->db->from('tbl_ulasan');
		$this->db->where('tbl_ulasan.ulasan_tampil','1');
		$this->db->order_by('tbl_ulasan.created_at','DESC');
		$query 			 = $this->db->get();

		if($query->num_rows() >0)
		{
			$data 			= array();
			$no 			= 0;
			foreach($query->result_array() as $i)
			{
				$no++;
				$row 		= array();
				$row[]		= $no;
				$row[]		= $i['penjualan_id'];
				$row[]		= $i['ulasan_rating'];
				$row[]		= $i['ulasan_isi'];
				$tpl 		= $i['ulasan_tampil'];

					$aksi 	=
					"<a href='".base_url().'user/pembelian/detail_pembelian/'.$i['penjualan_id']."'><button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-tambah'><span> Detail Pembelian</span></button></a>
					<button type='button' data='".$i['ulasan_id']."' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-tampil'><span> Jangan Tampilkan</span></button>
					<button type='button' data='".$i['ulasan_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-hapus'><span> Hapus Ulasan</span></button>";
				
				$row[]		= $aksi;
				

				$data[] 	= $row;
			}
		}else
		{
			$data 			= array();
			$row 			= array();
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';

			$data[]			= $row;
		}

		return $data 		= array(
			'data'			=> $data
		);
	}

	/* ==== USER AREA ==== */
	function get_all_ulasan_by_cus($id_customer)
	{
		$this->db->distinct('tbl_penjualan.penjualan_id');
		$this->db->from('tbl_ulasan');
		$this->db->join('tbl_pengguna','tbl_pengguna.id=tbl_ulasan.customer_id');
		$this->db->order_by('tbl_ulasan.created_at','DESC');
		$this->db->where('tbl_pengguna.id ',$id_customer);
		$query 			 = $this->db->get();

		if($query->num_rows() >0)
		{
			$data 			= array();
			$no 			= 0;
			foreach($query->result_array() as $i)
			{
				$no++;
				$row 		= array();
				$row[]		= $no;
				$row[]		= $i['penjualan_id'];
				$row[]		= $i['ulasan_rating'];
				$row[]		= $i['ulasan_isi'];
				$row[]		= 
				"<a href='".base_url().'user/pembelian/detail_pembelian/'.$i['penjualan_id']."'><button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-tambah'><span> Detail Pembelian</span></button></a>
				<a href='".base_url().'user/ulasan/edit_ulasan/'.$i['ulasan_id']."'><button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-info btn-sm item-tambah'><span> Edit Ulasan</span></button></a>
				<button type='button' data='".$i['ulasan_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-hapus'><span> Hapus Ulasan</span></button>";

				$data[] 	= $row;
			}
		}else
		{
			$data 			= array();
			$row 			= array();
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';
			$row[]			= ' ';

			$data[]			= $row;
		}

		return $data 		= array(
			'data'			=> $data
		);
	}

	function get_ulasan_by_id_no_ajax($id_ulasan)
	{
		$this->db->where('ulasan_id',$id_ulasan);
		$query 				= $this->db->get('tbl_ulasan');

		return $query;
	}

	function set_ulasan($ulasan)
	{
		$query 				= $this->db->insert('tbl_ulasan',$ulasan);

		return $query;
	}

	function update_ulasan($id_ulasan,$ulasan)
	{
		$this->db->where('ulasan_id',$id_ulasan);
		$query 				= $this->db->update('tbl_ulasan',$ulasan);

		return $query;
	}

	public function delete_ulasan($id_ulasan)
	{
		$this->db->where('ulasan_id',$id_ulasan);
		$query 				= $this->db->delete('tbl_ulasan');

		return $query;
	}

	/* ==== FRONTEND AREA ==== */

	function get_ulasan_front()
	{
		$this->db->select('*');
		$this->db->from('tbl_ulasan');
		$this->db->join('tbl_pengguna','tbl_pengguna.id=tbl_ulasan.customer_id','INNER');
		$this->db->where('tbl_ulasan.ulasan_tampil','1');
		$query 				= $this->db->get();

		return $query;
	}
}
?>