<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengaturan extends CI_Model {

	function get_all_setting()
	{
		$query 			= $this->db->get('tbl_theme_option');

		return $query;
	}

}

/* End of file Model_pengaturan.php */
/* Location: ./application/models/Model_pengaturan.php */
