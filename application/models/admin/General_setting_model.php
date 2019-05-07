<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class General_setting_model extends CI_Model {

	public function save_setting() {
		$data = array(
			'meta_title' => $this->clean_input($this->input->post('meta_title')),
			'meta_description' => $this->clean_input($this->input->post('meta_description')),
			'meta_tags' => $this->clean_input($this->input->post('meta_tags'))
		);

		$this->db->where('id', 1);
		if ($this->db->update('general_setting', $data)) {
			return true;
		} else {
			return false;
		}
	}


	public function get_general_setting() {
		$query = $this->db->get('general_setting');
		return $query->row();
	}


	public function clean_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

}