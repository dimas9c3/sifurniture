<?php 
class Model_penjualan extends Ci_Model
{
	/* ==== ADMIN AREA ==== */

	function set_notif_validasi_pembelian($notif)
	{
		$query 			= $this->db->insert('tbl_notifikasi_pembelian',$notif);

		return $query;
	}

	function get_penjualan_active()
	{
		$this->db->select('*');
		$this->db->from('tbl_penjualan','tbl_detail_penjualan','tbl_barang');
		$this->db->join('tbl_detail_penjualan','tbl_detail_penjualan.penjualan_id=tbl_penjualan.penjualan_id');
		$this->db->join('tbl_pengguna','tbl_pengguna.id=tbl_penjualan.customer_id','INNER');
		$this->db->join('tbl_ongkir','tbl_ongkir.ongkir_id=tbl_penjualan.ongkir_id','INNER');
		$this->db->join('tbl_barang','tbl_barang.barang_id=tbl_detail_penjualan.barang_id','INNER');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id','INNER');
		$this->db->where('tbl_penjualan.penjualan_status','1');
		$query 			= $this->db->get();
		if($query->num_rows()>0)
		{
			$data 				= array();
			$no 				= 0;
			$id_penjualan3		= 0;
			foreach($query->result_array() as $i)
			{
				$row 				= array();
				$id_penjualan 		= $i['penjualan_id'];
				$id_penjualan2		= substr($i['penjualan_id'],3);
				$hrg_barang 		= $i['penjualan_harga'];
				$qty_barang 		= $i['penjualan_qty'];
				$subtotal 			= $hrg_barang*$qty_barang;
				$ongkir 			= $i['ongkir_tarif'];
				$sts 				= $i['penjualan_status'];
				if($sts==1)
				{
					$status 		= 'BELUM LUNAS';
				}elseif($sts==0)
				{
					$status 		= 'LUNAS';
				}
				$tf 				= $i['penjualan_transfer'];

				if($id_penjualan2!=$id_penjualan3) // Fungsi agar data tidak dobel, data pertama unik
				{
					$no++;
					$id_pjln 		= $id_penjualan;
					$nm_customer 	= $i['username'];
					$nm_brg 		= "<a href='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'></a>"." ".$i['barang_nama'];
					$qty_barang 	= $qty_barang;
					$hrg_barang 	= $hrg_barang;
					$subtotal 		= $subtotal;
					$ongkir 		= "Rp. ".number_format($ongkir);
					$total 			= "Rp. ".number_format($this->sum_total_penjualan_by_id($id_penjualan));
					$status   		= $status;
					if(!empty($tf))
					{
						$transfer 		= "<a href='".base_url()."assets/images/transaksi/".$i['penjualan_transfer']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/transaksi/".$i['penjualan_transfer']."'></a>";
						$aksi 			= 
						"<button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-tambah'><span> Validasi Penjualan</span></button>
						<button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-batal'><span> Batalkan Transaksi</span></button>";
					}else
					{
						$transfer 		= "BELUM TRANSFER";
						$aksi 			= 
						"<button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-batal'><span> Batalkan Transaksi</span></button>";
					}
					$alamat 		= $i['penjualan_alamat'];
				}
				else
				{
					$no 			= " ";
					$id_pjln 		= " ";
					$nm_customer 	= " ";
					$nm_brg 		= "<a href='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'></a>"." ".$i['barang_nama'];
					$qty_barang 	= $qty_barang;
					$hrg_barang		= $hrg_barang;
					$subtotal 		= $subtotal;
					$ongkir 		= " ";
					$total 			= " ";
					$status 		= " ";
					$transfer 		= " ";
					$aksi 			= " ";
					$alamat 		= " ";
				}

				$id_penjualan3 		= $id_penjualan2;

				$row[] 		= $no;
				$row[] 		= $id_pjln;
				$row[]		= $nm_customer;
				$row[]	  	= $nm_brg;
				$row[]		= $qty_barang;
				$row[]		= "Rp. ".number_format($hrg_barang);
				$row[]		= "Rp. ".number_format($subtotal);
				$row[]		= $ongkir;
				$row[]		= $total;
				$row[]		= $alamat;
				$row[]		= $status;
				$row[]		= $transfer;
				$row[]		= $aksi;

				$data[] 	= $row;
			
			}
				
		}else
		{
			$data 			= array();

			$row[] 		= " ";
			$row[] 		= " ";
			$row[]		= " ";
			$row[]	  	= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";

			$data[] 		= $row;
		}

		return $output 		= array(
			'data' 			=> $data
		);
	}

	function get_riwayat_penjualan_all()
	{
		$this->db->select('*');
		$this->db->from('tbl_penjualan','tbl_detail_penjualan','tbl_barang');
		$this->db->join('tbl_detail_penjualan','tbl_detail_penjualan.penjualan_id=tbl_penjualan.penjualan_id');
		$this->db->join('tbl_pengguna','tbl_pengguna.id=tbl_penjualan.customer_id','INNER');
		$this->db->join('tbl_ongkir','tbl_ongkir.ongkir_id=tbl_penjualan.ongkir_id','INNER');
		$this->db->join('tbl_barang','tbl_barang.barang_id=tbl_detail_penjualan.barang_id','INNER');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id','INNER');
		$this->db->where('tbl_penjualan.penjualan_status','0');
		$query 			= $this->db->get();
		if($query->num_rows()>0)
		{
			$data 				= array();
			$no 				= 0;
			$id_penjualan3		= 0;
			foreach($query->result_array() as $i)
			{
				$row 				= array();
				$id_penjualan 		= $i['penjualan_id'];
				$id_penjualan2		= substr($i['penjualan_id'],3);
				$hrg_barang 		= $i['penjualan_harga'];
				$qty_barang 		= $i['penjualan_qty'];
				$subtotal 			= $hrg_barang*$qty_barang;
				$ongkir 			= $i['ongkir_tarif'];
				$sts 				= $i['penjualan_status'];
				if($sts==1)
				{
					$status 		= 'BELUM LUNAS';
				}elseif($sts==0)
				{
					$status 		= 'LUNAS';
				}
				$tf 				= $i['penjualan_transfer'];

				if($id_penjualan2!=$id_penjualan3) // Fungsi agar data tidak dobel, data pertama unik
				{
					$no++;
					$id_pjln 		= $id_penjualan;
					$nm_customer 	= $i['username'];
					$nm_brg 		= "<a href='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'></a>"." ".$i['barang_nama'];
					$qty_barang 	= $qty_barang;
					$hrg_barang 	= $hrg_barang;
					$subtotal 		= $subtotal;
					$ongkir 		= "Rp. ".number_format($ongkir);
					$total 			= "Rp. ".number_format($this->sum_total_penjualan_by_id($id_penjualan));
					$status   		= $status;
					if(!empty($tf))
					{
						$transfer 		= "<a href='".base_url()."assets/images/transaksi/".$i['penjualan_transfer']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/transaksi/".$i['penjualan_transfer']."'></a>";
						$aksi 			= 
						"<button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-tambah'><span> Batalkan Validasi</span></button>
						<button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-batal'><span> Batalkan Transaksi</span></button>";
					}else
					{
						$transfer 		= "BELUM TRANSFER";
						$aksi 			= 
						"<button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-batal'><span> Batalkan Transaksi</span></button>";
					}
					$alamat 		= $i['penjualan_alamat'];
				}
				else
				{
					$no 			= " ";
					$id_pjln 		= " ";
					$nm_customer 	= " ";
					$nm_brg 		= "<a href='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'></a>"." ".$i['barang_nama'];
					$qty_barang 	= $qty_barang;
					$hrg_barang		= $hrg_barang;
					$subtotal 		= $subtotal;
					$ongkir 		= " ";
					$total 			= " ";
					$status 		= " ";
					$transfer 		= " ";
					$aksi 			= " ";
					$alamat 		= " ";
				}

				$id_penjualan3 		= $id_penjualan2;

				$row[] 		= $no;
				$row[] 		= $id_pjln;
				$row[]		= $nm_customer;
				$row[]	  	= $nm_brg;
				$row[]		= $qty_barang;
				$row[]		= "Rp. ".number_format($hrg_barang);
				$row[]		= "Rp. ".number_format($subtotal);
				$row[]		= $ongkir;
				$row[]		= $total;
				$row[]		= $alamat;
				$row[]		= $status;
				$row[]		= $transfer;
				$row[]		= $aksi;

				$data[] 	= $row;
			
			}
				
		}else
		{
			$data 			= array();

			$row[] 		= " ";
			$row[] 		= " ";
			$row[]		= " ";
			$row[]	  	= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";

			$data[] 		= $row;
		}

		return $output 		= array(
			'data' 			=> $data
		);
	}

	// Penjualan custom design 1 Pilih Material
	function get_penjualan_custom_active()
	{
		$this->db->select('penjualan_custom_id,penjualan_custom_jenis');
		$this->db->from('tbl_penjualan_custom');
		$this->db->where('penjualan_custom_jenis','1');
		$this->db->where('status','1');
		$get 			= $this->db->get();
		if($get->num_rows()>0)
		{
			foreach($get->result_array() as $row);
			{
				$id_custom 		= $row['penjualan_custom_id'];
				$jns 			= $row['penjualan_custom_jenis'];

				if($jns==1)
				{
					$this->db->select('*');
					$this->db->from('tbl_penjualan_custom');
					$this->db->join('tbl_custom','tbl_custom.custom_id=tbl_penjualan_custom.custom_id','INNER');
					$this->db->join('tbl_pengguna','tbl_pengguna.id=tbl_penjualan_custom.customer_id','INNER');
					$this->db->join('tbl_ongkir','tbl_ongkir.ongkir_id=tbl_penjualan_custom.ongkir_id','INNER');
					$this->db->join('tbl_style_custom','tbl_style_custom.style_id=tbl_custom.style_id','INNER');
					$this->db->join('tbl_jenis_custom','tbl_jenis_custom.jenis_id=tbl_custom.jenis_id','INNER');
					$this->db->join('tbl_material_custom','tbl_material_custom.material_id=tbl_custom.material_id','INNER');
					$this->db->join('tbl_coating_custom','tbl_coating_custom.coating_id=tbl_custom.coating_id','INNER');
					$this->db->where('tbl_penjualan_custom.penjualan_custom_jenis','1');
					$this->db->join('tbl_jog_custom','tbl_jog_custom.jog_id=tbl_custom.jog_id','INNER');
					$this->db->where('tbl_penjualan_custom.status','1');
					$query 			= $this->db->get();
					
						$data 		= array();
						$count_aksi = 0;
						foreach($query->result_array() as $i)
						{
							$row 		= array();
							$detail 			= 'Style : <b>'.$i['style_nama'].'</b><br> Jenis Produk : <b>'.$i['jenis_nama'].'</b><br> Material : <b>'.$i['material_nama'].'</b><br> Coating Finishing : <b>'.$i['coating_nama'].'</b><br> Jog: <b>'.$i['jog_nama'].'</b>';
							$hrg_barang 		= $i['harga_jual'];
							$ongkir 			= $i['ongkir_tarif'];
							$subtotal 			= $hrg_barang+$ongkir;
							$dp 				= ($subtotal*30)/100;
							$sts 				= $i['status'];
							$alt 				= $i['alamat'];
							$tf 				= $i['transfer'];
							$catatan 			= $i['catatan'];
							$alamat 			= $i['alamat'];
							$dibayarkan 		= $i['dibayarkan'];
							$kekurangan			= $subtotal-$dibayarkan;

							if(empty($tf))
							{
								if($count_aksi<=0) // Fungsi agar button aksi agar hanya 1 button
								{
									$aksi 			= 
									"<button type='button' data='".$i['penjualan_custom_id']."'data-placement='top' title='Edit data' class='btn btn-success btn-sm item-valid'><span> Validasi Transaksi</span></button>
									<button type='button' data='".$i['penjualan_custom_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-batal'><span> Batalkan Pembelian</span></button>";
									
									if($kekurangan==0 OR $kekurangan<0)
									{
										$status 		= 'LUNAS';
									}else
									{
										$status 		= 'BELUM LUNAS';
									}
									$transfer 		= "<button type='button' data='".$i['penjualan_custom_id']."' data-toggle='modal' data-target='#modal_tambah' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-tambah'><span> Upload Bukti Transfer DP</span></button>";
								}
								else
								{
									$aksi 			= " ";
									$alamat 		= " ";
									$status 		= " ";
									$transfer 		= " ";
								}
								$count_aksi++;
							}else
							{
								if($count_aksi<=0)
								{
									$aksi 			= 
									"<button type='button' data='".$i['penjualan_custom_id']."'data-placement='top' title='Edit data' class='btn btn-success btn-sm item-valid'><span> Validasi Transaksi</span></button><button type='button' data='".$i['penjualan_custom_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-batal'><span> Batalkan Pembelian</span></button>";
									$alamat 			= $i['alamat'];
									if($kekurangan==0 OR $kekurangan<0)
									{
										$status 		= 'LUNAS';
									}else
									{
										$status 		= 'BELUM LUNAS';
									}
									$transfer 		= "<a href='".base_url()."assets/images/transaksi/".$i['transfer']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/transaksi/".$i['transfer']."'></a>";
								}else
								{
									$aksi 			= " ";
									$alamat 		= " ";
									$status 		= " ";
									$transfer 		= " ";
								}
								
								$count_aksi++;
							}
							$row[] 		= "<a href='".base_url()."assets/images/custom/".$i['custom_foto']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/custom/".$i['custom_foto']."'></a>";
							$row[] 		= $detail;
							$row[]		= $hrg_barang;
							$row[]		= $ongkir;
							$row[] 		= $subtotal;
							$row[]		= $dp;
							$row[]		= $dibayarkan;
							$row[]		= $kekurangan;
							$row[]		= $alamat;
							$row[]		= $catatan;
							$row[] 		= $status;
							$row[] 		= $transfer;
							$row[] 		= $aksi;

							$data[] 	= $row;
						} // foreach 2
					
				}
			}
		}elseif($get->num_rows<=0)
		{
			$data 		= array();
			$row[] 		= "";
			$row[]	 	= "";
			$row[]		= "";
			$row[]		= "";
			$row[] 		= "";
			$row[]		= "";
			$row[]		= "";
			$row[] 		= "";
			$row[]		= "";
			$row[]		= "";
			$row[] 		= "";
			$row[] 		= "";
			$row[] 		= "";

			$data[] 	= $row;
		}



		return $output 		= array(
			'data' 			=> $data
		);
	}

	function get_penjualan_custom_design_active()
	{
		$this->db->select('*');
		$this->db->from('tbl_penjualan_custom');
		$this->db->join('tbl_ongkir','tbl_ongkir.ongkir_id=tbl_penjualan_custom.ongkir_id','inner');
		$this->db->join('tbl_pengguna','tbl_pengguna.id=tbl_penjualan_custom.customer_id','INNER');
		$this->db->where('penjualan_custom_jenis','2');
		$this->db->where('status','1');
		$query 			= $this->db->get();
		if($query->num_rows()>0)
		{
			$data 		= array();
			$no   		= 0;
			foreach($query->result_array() as $i)
			{
				$no++;
				$row 		= array();
				$row[]		= $no;
				$row[]		= $i['first_name'].' '.$i['last_name'].' <br>( '.$i['email'].' - '.$i['phone'].' )';
				$row[] 		= "<a href='".base_url()."assets/images/permintaan/".$i['foto_permintaan']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/permintaan/".$i['foto_permintaan']."'></a>";
				$row[] 		= $i['permintaan'];
				$row[]		= $i['ongkir_nama'].' - Rp. '.number_format($i['ongkir_tarif']);
				$row[]		= $i['alamat'];
				$row[]		=	
				"<button type='button' data='".$i['penjualan_custom_id']."' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-selesai'><span> Transaksi Selesai</span></button>
							<button type='button' data='".$i['penjualan_custom_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-batal'><span> Batalkan Transaksi</span></button>";

				$data[] 	= $row;
			} 
		}else
		{
			$data 		= array();
			$row 		= array();
			$row[]		= "Tidak Ada Data";
			$row[]		= "";
			$row[]		= "";
			$row[] 		= "";
			$row[] 		= "";
			$row[]		= "";
			$row[]		= "";

			$data[] 	= $row;
		} // if jns 1


		return $output 		= array(
			'data' 			=> $data
		);
	}

	function batal_custom_design($batal,$id_penjualan)
	{
		$this->db->where('penjualan_custom_id',$id_penjualan);
		$query 			 	= $this->db->update('tbl_penjualan_custom',$batal);

		return $query;
	}

	function selesai_custom_design($selesai,$id_penjualan)
	{
		$this->db->where('penjualan_custom_id',$id_penjualan);
		$query 			 	= $this->db->update('tbl_penjualan_custom',$selesai);

		return $query;
	}

	function validasi_penjualan($id_penjualan,$validasi)
	{
		$this->db->where('penjualan_id',$id_penjualan);
		$query 		= $this->db->update('tbl_penjualan',$validasi);

		return $query;
	}

	function validasi_penjualan_custom($id_penjualan,$validasi)
	{
		$this->db->where('penjualan_custom_id',$id_penjualan);
		$query 		= $this->db->update('tbl_penjualan_custom',$validasi);

		return $query;
	}

	function sum_total_penjualan_by_id($id_penjualan)
	{
		$this->db->select('SUM(tbl_detail_penjualan.penjualan_qty*tbl_detail_penjualan.penjualan_harga)+tbl_ongkir.ongkir_tarif as tot1');
		$this->db->from('tbl_detail_penjualan');
		$this->db->join('tbl_penjualan','tbl_penjualan.penjualan_id=tbl_detail_penjualan.penjualan_id','INNER');
		$this->db->join('tbl_ongkir','tbl_ongkir.ongkir_id=tbl_penjualan.ongkir_id','INNER');
		$this->db->where('tbl_detail_penjualan.penjualan_id',$id_penjualan);
		$query 	 	= $this->db->get();

		$row 		= $query->row_array();
		$total 		= $row['tot1'];


		return $total;
	}


	/* ==== USER AREA ==== */

	// Pembelian ready stock
	function get_pembelian_active_user($id_customer)
	{
		$this->db->select('*');
		$this->db->from('tbl_penjualan','tbl_detail_penjualan','tbl_barang');
		$this->db->join('tbl_detail_penjualan','tbl_detail_penjualan.penjualan_id=tbl_penjualan.penjualan_id');
		$this->db->join('tbl_pengguna','tbl_pengguna.id=tbl_penjualan.customer_id','INNER');
		$this->db->join('tbl_ongkir','tbl_ongkir.ongkir_id=tbl_penjualan.ongkir_id','INNER');
		$this->db->join('tbl_barang','tbl_barang.barang_id=tbl_detail_penjualan.barang_id','INNER');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id','INNER');
		$this->db->where('tbl_penjualan.penjualan_status','1');
		$this->db->where('tbl_penjualan.customer_id',$id_customer);
		$query 			= $this->db->get();
		if($query->num_rows()>0)
		{
			$data 		= array();
			$count_aksi = 0;
			foreach($query->result_array() as $i)
			{
				$row 		= array();
				$hrg_barang 		= $i['penjualan_harga'];
				$qty_barang 		= $i['penjualan_qty'];
				$subtotal 			= $hrg_barang*$qty_barang;
				$ongkir 			= $i['ongkir_tarif'];
				$sts 				= $i['penjualan_status'];
				
				$tf 				= $i['penjualan_transfer'];
				if(empty($tf))
				{
					if($count_aksi<=0) // Fungsi agar button aksi agar hanya 1 button
					{
						$aksi 			= 
						"<button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-batal'><span> Batalkan Pembelian</span></button>";
						$alamat 			= $i['penjualan_alamat'];
						
						if($sts==1)
						{
							$status 		= 'BELUM LUNAS';
						}elseif($sts==0)
						{
							$status 		= 'LUNAS';
						}
						$transfer 		= "<button type='button' data='".$i['penjualan_id']."' data-toggle='modal' data-target='#modal_tambah' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-tambah'><span> Upload Bukti Transfer</span></button>";
					}
					else
					{
						$aksi 			= " ";
						$alamat 		= " ";
						$status 		= " ";
						$transfer 		= " ";
					}
					$count_aksi++;
				}else
				{
					if($count_aksi<=0)
					{
						$aksi 			= 
						"<button type='button' data='".$i['penjualan_id']."' data-toggle='modal' data-target='#modal_tambah' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-tambah'><span> Edit Bukti Transfer</span></button>
						<button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-batal'><span> Batalkan Pembelian</span></button>";
						$alamat 			= $i['penjualan_alamat'];
						if($sts==1)
						{
							$status 		= 'BELUM LUNAS';
						}elseif($sts==0)
						{
							$status 		= 'LUNAS';
						}
						$transfer 		= "<a href='".base_url()."assets/images/transaksi/".$i['penjualan_transfer']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/transaksi/".$i['penjualan_transfer']."'></a>";
					}else
					{
						$aksi 			= " ";
						$alamat 		= " ";
						$status 		= " ";
						$transfer 		= " ";
					}
					
					$count_aksi++;
				}
				$row[] 		= "<a href='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'></a>"." ".$i['barang_nama'];
				$row[] 		= $qty_barang;
				$row[]		= $hrg_barang;
				$row[] 		= $subtotal;
				$row[]		= $ongkir;
				$row[]		= $alamat;
				$row[] 		= $status;
				$row[] 		= $transfer;
				$row[] 		= $aksi;

				$data[] 	= $row;
			}
		}else
		{
			$data 			= array();

			$row[] 			= '';
			$row[] 			= '';
			$row[]			= '';
			$row[] 			= '';
			$row[] 			= '';
			$row[] 			= '';
			$row[] 			= '';
			$row[] 			= '';
			$row[] 			= '';
			$row[] 			= '';

			$data[] 		= $row;
		}

		return $output 		= array(
			'data' 			=> $data
		);
	}

	function get_riwayat_pembelian_by_id_customer($id_customer)
	{
		$this->db->select('*');
		$this->db->from('tbl_penjualan','tbl_detail_penjualan','tbl_barang');
		$this->db->join('tbl_detail_penjualan','tbl_detail_penjualan.penjualan_id=tbl_penjualan.penjualan_id');
		$this->db->join('tbl_pengguna','tbl_pengguna.id=tbl_penjualan.customer_id','INNER');
		$this->db->join('tbl_ongkir','tbl_ongkir.ongkir_id=tbl_penjualan.ongkir_id','INNER');
		$this->db->join('tbl_barang','tbl_barang.barang_id=tbl_detail_penjualan.barang_id','INNER');
		$this->db->join('tbl_foto_barang','tbl_foto_barang.foto_barang_id=tbl_barang.foto_barang_id','INNER');
		$this->db->where('tbl_penjualan.penjualan_status','0');
		$this->db->where('tbl_pengguna.id',$id_customer);
		$this->db->order_by('tbl_penjualan.created_at','DESC');
		$query 			= $this->db->get();
		if($query->num_rows()>0)
		{
			$data 				= array();
			$no 				= 0;
			$id_penjualan3		= 0;
			foreach($query->result_array() as $i)
			{
				$row 				= array();
				$id_penjualan 		= $i['penjualan_id'];
				$id_penjualan2		= substr($i['penjualan_id'],3);
				$hrg_barang 		= $i['penjualan_harga'];
				$qty_barang 		= $i['penjualan_qty'];
				$subtotal 			= $hrg_barang*$qty_barang;
				$ongkir 			= $i['ongkir_tarif'];
				$sts 				= $i['penjualan_status'];
				if($sts==1)
				{
					$status 		= 'BELUM LUNAS';
				}elseif($sts==0)
				{
					$status 		= 'LUNAS';
				}
				$tf 				= $i['penjualan_transfer'];

				if($id_penjualan2!=$id_penjualan3) // Fungsi agar data tidak dobel, data pertama unik
				{
					$no++;
					$id_pjln 		= $id_penjualan;
					$nm_customer 	= $i['username'];
					$nm_brg 		= "<a href='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'></a>"." ".$i['barang_nama'];
					$qty_barang 	= $qty_barang;
					$hrg_barang 	= $hrg_barang;
					$subtotal 		= $subtotal;
					$ongkir 		= "Rp. ".number_format($ongkir);
					$total 			= "Rp. ".number_format($this->sum_total_penjualan_by_id($id_penjualan));
					$status   		= $status;
					if(!empty($tf))
					{
						$transfer 		= "<a href='".base_url()."assets/images/transaksi/".$i['penjualan_transfer']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/transaksi/".$i['penjualan_transfer']."'></a>";
						$aksi 			= 
						"<a href='".base_url()."user/ulasan/tambah_ulasan/".$i['penjualan_id']."'><button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-primary btn-sm'><span> Berikan Ulasan</span></button></a>";
					}else
					{
						$transfer 		= "BELUM TRANSFER";
						$aksi 			= 
						"<button type='button' data='".$i['penjualan_id']."' data-placement='top' title='Edit data' class='btn btn-primary btn-sm item-batal'><span> Berikan Ulasan</span></button>";
					}
					$alamat 		= $i['penjualan_alamat'];
				}
				else
				{
					$no 			= " ";
					$id_pjln 		= " ";
					$nm_customer 	= " ";
					$nm_brg 		= "<a href='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/barang/".$i['foto_barang_nama']."'></a>"." ".$i['barang_nama'];
					$qty_barang 	= $qty_barang;
					$hrg_barang		= $hrg_barang;
					$subtotal 		= $subtotal;
					$ongkir 		= " ";
					$total 			= " ";
					$status 		= " ";
					$transfer 		= " ";
					$aksi 			= " ";
					$alamat 		= " ";
				}

				$id_penjualan3 		= $id_penjualan2;

				$row[] 		= $no;
				$row[] 		= $id_pjln;
				$row[]	  	= $nm_brg;
				$row[]		= $qty_barang;
				$row[]		= "Rp. ".number_format($hrg_barang);
				$row[]		= "Rp. ".number_format($subtotal);
				$row[]		= $ongkir;
				$row[]		= $total;
				$row[]		= $alamat;
				$row[]		= $status;
				$row[]		= $aksi;

				$data[] 	= $row;
			
			}
				
		}else
		{
			$data 			= array();

			$row[] 		= " ";
			$row[] 		= " ";
			$row[]	  	= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";
			$row[]		= " ";

			$data[] 		= $row;
		}

		return $output 		= array(
			'data' 			=> $data
		);
	}

	// Pembelian custom design 1 Pilih Material
	function get_pembelian_custom_active_user($id_customer)
	{
		$this->db->select('penjualan_custom_id,penjualan_custom_jenis');
		$this->db->from('tbl_penjualan_custom');
		$this->db->where('penjualan_custom_jenis','1');
		$this->db->where('customer_id',$id_customer);
		$this->db->where('status','1');
		$get 			= $this->db->get();
		if($get->num_rows()>0)
		{
			foreach($get->result_array() as $row);
			{
				$id_custom 		= $row['penjualan_custom_id'];
				$jns 			= $row['penjualan_custom_jenis'];

				if($jns==1)
				{
					$this->db->select('*');
					$this->db->from('tbl_penjualan_custom');
					$this->db->join('tbl_custom','tbl_custom.custom_id=tbl_penjualan_custom.custom_id','INNER');
					$this->db->join('tbl_pengguna','tbl_pengguna.id=tbl_penjualan_custom.customer_id','INNER');
					$this->db->join('tbl_ongkir','tbl_ongkir.ongkir_id=tbl_penjualan_custom.ongkir_id','INNER');
					$this->db->join('tbl_style_custom','tbl_style_custom.style_id=tbl_custom.style_id','INNER');
					$this->db->join('tbl_jenis_custom','tbl_jenis_custom.jenis_id=tbl_custom.jenis_id','INNER');
					$this->db->join('tbl_material_custom','tbl_material_custom.material_id=tbl_custom.material_id','INNER');
					$this->db->join('tbl_coating_custom','tbl_coating_custom.coating_id=tbl_custom.coating_id','INNER');
					$this->db->where('tbl_penjualan_custom.penjualan_custom_jenis','1');
					$this->db->join('tbl_jog_custom','tbl_jog_custom.jog_id=tbl_custom.jog_id','INNER');
					$this->db->where('tbl_penjualan_custom.status','1');
					$this->db->where('tbl_penjualan_custom.customer_id',$id_customer);
					$query 			= $this->db->get();
					
						$data 		= array();
						$count_aksi = 0;
						foreach($query->result_array() as $i)
						{
							$row 		= array();
							$detail 			= 'Style : <b>'.$i['style_nama'].'</b><br> Jenis Produk : <b>'.$i['jenis_nama'].'</b><br> Material : <b>'.$i['material_nama'].'</b><br> Coating Finishing : <b>'.$i['coating_nama'].'</b><br> Jog: <b>'.$i['jog_nama'].'</b>';
							$hrg_barang 		= $i['harga_jual'];
							$ongkir 			= $i['ongkir_tarif'];
							$subtotal 			= $hrg_barang+$ongkir;
							$dp 				= ($subtotal*30)/100;
							$sts 				= $i['status'];
							$alt 				= $i['alamat'];
							$tf 				= $i['transfer'];
							$catatan 			= $i['catatan'];
							$alamat 			= $i['alamat'];
							$dibayarkan 		= $i['dibayarkan'];
							$kekurangan			= $subtotal-$dibayarkan;

							if(empty($tf))
							{
								if($count_aksi<=0) // Fungsi agar button aksi agar hanya 1 button
								{
									$aksi 			= 
									"<button type='button' data='".$i['penjualan_custom_id']."' data-toggle='modal' data-target='#modal_edit' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-edit'><span> Edit Data Transaksi</span></button>
									<button type='button' data='".$i['penjualan_custom_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-batal'><span> Batalkan Pembelian</span></button>";
									
									if($kekurangan==0 OR $kekurangan<0)
									{
										$status 		= 'LUNAS';
									}else
									{
										$status 		= 'BELUM LUNAS';
									}
									$transfer 		= "<button type='button' data='".$i['penjualan_custom_id']."' data-toggle='modal' data-target='#modal_tambah' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-tambah'><span> Upload Bukti Transfer DP</span></button>";
								}
								else
								{
									$aksi 			= " ";
									$alamat 		= " ";
									$status 		= " ";
									$transfer 		= " ";
								}
								$count_aksi++;
							}else
							{
								if($count_aksi<=0)
								{
									$aksi 			= 
									"<button type='button' data='".$i['penjualan_custom_id']."' data-toggle='modal' data-target='#modal_edit' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-edit'><span> Edit Data Transaksi</span></button><button type='button' data='".$i['penjualan_custom_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-batal'><span> Batalkan Pembelian</span></button>";
									$alamat 			= $i['alamat'];
									if($kekurangan==0 OR $kekurangan<0)
									{
										$status 		= 'LUNAS';
									}else
									{
										$status 		= 'BELUM LUNAS';
									}
									$transfer 		= "<a href='".base_url()."assets/images/transaksi/".$i['transfer']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/transaksi/".$i['transfer']."'></a>";
								}else
								{
									$aksi 			= " ";
									$alamat 		= " ";
									$status 		= " ";
									$transfer 		= " ";
								}
								
								$count_aksi++;
							}
							$row[] 		= "<a href='".base_url()."assets/images/custom/".$i['custom_foto']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/custom/".$i['custom_foto']."'></a>";
							$row[] 		= $detail;
							$row[]		= $hrg_barang;
							$row[]		= $ongkir;
							$row[] 		= $subtotal;
							$row[]		= $dp;
							$row[]		= $dibayarkan;
							$row[]		= $kekurangan;
							$row[]		= $alamat;
							$row[]		= $catatan;
							$row[] 		= $status;
							$row[] 		= $transfer;
							$row[] 		= $aksi;

							$data[] 	= $row;
						} // foreach 2
					
				}
			}
		}elseif($get->num_rows<=0)
		{
			$data 		= array();
			$row[] 		= "";
			$row[]	 	= "";
			$row[]		= "";
			$row[]		= "";
			$row[] 		= "";
			$row[]		= "";
			$row[]		= "";
			$row[] 		= "";
			$row[]		= "";
			$row[]		= "";
			$row[] 		= "";
			$row[] 		= "";
			$row[] 		= "";

			$data[] 	= $row;
		}



		return $output 		= array(
			'data' 			=> $data
		);
	}

	function get_pembelian_custom_by_id_penjualan($id_penjualan)
	{
		$this->db->select('*');
		$this->db->from('tbl_penjualan_custom');
		$this->db->join('tbl_custom','tbl_custom.custom_id=tbl_penjualan_custom.custom_id','INNER');
		$this->db->join('tbl_ongkir','tbl_ongkir.ongkir_id=tbl_penjualan_custom.ongkir_id','INNER');
		$this->db->where('tbl_penjualan_custom.penjualan_custom_id',$id_penjualan);
		$query 			= $this->db->get();

		return $query->result();
	}

	// Pembelian custom design upload foto
	function get_pembelian_custom_design_active_user($id_customer)
	{
		$this->db->where('penjualan_custom_jenis','2');
		$this->db->where('status','1');
		$this->db->where('customer_id',$id_customer);
		$query 			= $this->db->get('tbl_penjualan_custom');
		if($query->num_rows()>0)
		{
			$data 		= array();
			foreach($query->result_array() as $i)
			{
				$row 		= array();
				$row[] 		= "<a href='".base_url()."assets/images/permintaan/".$i['foto_permintaan']."'><img width='100' height='100' class='img-fluid float-right' src='".base_url()."assets/images/permintaan/".$i['foto_permintaan']."'></a>";
				$row[] 		= $i['permintaan'];
				$row[]		= $i['alamat'];
				$row[]		=	
				"<button type='button' data='".$i['penjualan_custom_id']."' data-toggle='modal' data-target='#modal_edit' data-placement='top' title='Edit data' class='btn btn-success btn-sm item-edit'><span> Edit Transaksi</span></button>
				<button type='button' data='".$i['penjualan_custom_id']."' data-placement='top' title='Edit data' class='btn btn-danger btn-sm item-batal'><span> Batalkan Transaksi</span></button>";

				$data[] 	= $row;
			} 
		}else
		{
			$data 		= array();
			$row 		= array();
			$row[] 		= "";
			$row[] 		= "";
			$row[]		= "";
			$row[]		= "";

			$data[] 	= $row;
		} 

		return $output 		= array(
			'data' 			=> $data
		);
	}

	function get_pembelian_custom_design_by_id($id_penjualan)
	{
		$this->db->select('*');
		$this->db->from('tbl_penjualan_custom');
		$this->db->join('tbl_ongkir','tbl_ongkir.ongkir_id=tbl_penjualan_custom.ongkir_id');
		$this->db->join('provinsi','provinsi.id_prov=tbl_ongkir.id_prov');
		$this->db->where('penjualan_custom_id',$id_penjualan);
		$query 					= $this->db->get();

		return $query->result();
	}

	function get_total_all_pembelian_by_id_cus($id_customer)
	{
		$this->db->select('MAX(tbl_ongkir.ongkir_tarif) AS ongkir_tarif,SUM(tbl_detail_penjualan.penjualan_harga*tbl_detail_penjualan.penjualan_qty) AS total');
		$this->db->from('tbl_penjualan');
		$this->db->join('tbl_detail_penjualan','tbl_detail_penjualan.penjualan_id=tbl_penjualan.penjualan_id');
		$this->db->join('tbl_pengguna','tbl_pengguna.id=tbl_penjualan.customer_id','INNER');
		$this->db->join('tbl_ongkir','tbl_ongkir.ongkir_id=tbl_penjualan.ongkir_id','INNER');
		$this->db->where('tbl_pengguna.id',$id_customer);
		$this->db->where('penjualan_status','1');
		$query 		= $this->db->get();
		foreach ($query->result_array() as $i) 
		{
			$data 		= array(
				'total'		=> "Rp. ".number_format($i['total'] + $i['ongkir_tarif'])
			);
		}

		return $data;
	}

	function set_pembelian_user($pembelian)
	{
		$query 			= $this->db->insert('tbl_penjualan',$pembelian);
		return $query;
	}

	function set_pembelian_custom_user($pembelian)
	{
		$query 			= $this->db->insert('tbl_penjualan_custom',$pembelian);
		return $query;
	}

	function set_pembelian_custom_user_design($pembelian)
	{
		$query 			= $this->db->insert('tbl_penjualan_custom',$pembelian);
		return $query;
	}

	function update_pembelian_custom_user_design($id_penjualan,$pembelian)
	{
		$this->db->where('penjualan_custom_id',$id_penjualan);
		$query 			= $this->db->update('tbl_penjualan_custom',$pembelian);

		return $query;
	}

	function set_pengiriman_pembelian_custom($id_penjualan,$pengiriman)
	{
		$this->db->where('penjualan_custom_id',$id_penjualan);
		$query 			= $this->db->update('tbl_penjualan_custom',$pengiriman);

		return $query;
	}

	function set_detail_pembelian_user($detail)
	{
		$query 			= $this->db->insert('tbl_detail_penjualan',$detail);
		return $query;
	}

	function delete_penjualan_by_id($id_penjualan)
	{
		$this->db->where('penjualan_id',$id_penjualan);
		$query 		= $this->db->delete('tbl_penjualan');

		return $query;
	}

	function delete_penjualan_custom_by_id($id_penjualan)
	{
		$this->db->where('penjualan_custom_id',$id_penjualan);
		$query 		= $this->db->delete('tbl_penjualan_custom');

		return $query;
	}

	function delete_penjualan_custom_design_by_id($id_penjualan)
	{
		$this->db->where('penjualan_custom_id',$id_penjualan);
		$query 		= $this->db->delete('tbl_penjualan_custom');

		return $query;
	}

	function delete_all_detail_penjualan($id_penjualan)
	{
		$this->db->where('penjualan_id',$id_penjualan);
		$query 		= $this->db->delete('tbl_detail_penjualan');

		return $query;
	}

	// Mengecek Status Pembelian User apakah masih ada pembelian yg belum selesai
	function tracking_status_pembelian($id_customer)
	{
		$this->db->where('customer_id',$id_customer);
		$query 			= $this->db->get('tbl_penjualan');
		$row 			= $query->row_array();
		$data 			= $row['penjualan_status'];

		return $data;
	}

	// Mencari id baru berdasarkan id max
	function find_new_id_penjualan()
	{
		$query 			= $this->db->query('SELECT MAX(CAST(SUBSTRING(penjualan_id, 4, length(penjualan_id)-3) AS UNSIGNED)) as penjualan_id FROM tbl_penjualan');
		$row 			= $query->row_array();
		$output 		= 'PJN'.($row['penjualan_id']+1);

		return $output;
	}

	function find_new_id_penjualan_custom()
	{
		$query 			= $this->db->query('SELECT MAX(CAST(SUBSTRING(penjualan_custom_id, 4, length(penjualan_custom_id)-3) AS UNSIGNED)) as penjualan_custom_id FROM tbl_penjualan_custom');
		$row 			= $query->row_array();
		$output 		= 'PCT'.($row['penjualan_custom_id']+1);

		return $output;
	}

	function upload_transfer_user($id_penjualan,$transfer)
	{
		$this->db->where('penjualan_id',$id_penjualan);
		$query 			= $this->db->update('tbl_penjualan',$transfer);

		return $query;
	}

	function upload_transfer_custom_user($id_penjualan,$transfer)
	{
		$this->db->where('penjualan_custom_id',$id_penjualan);
		$query 			= $this->db->update('tbl_penjualan_custom',$transfer);

		return $query;
	}
}
?>