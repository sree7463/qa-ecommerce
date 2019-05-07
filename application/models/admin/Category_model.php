<?php 

class Category_model extends CI_Model {
	public function add_category($data) {
		$data = array(
			'category_name' => $data['category_name'],
			'category_slug' => $data['category_slug'],
			'category_meta_title' => $data['category_meta_title'],
			'category_meta_description' => $data['category_meta_description'],
			'category_meta_tags' => $data['category_meta_tags']
		);
		if ($this->db->insert('categories', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function category_exist() {
		$query = array(
			'category_name' => $_POST["category_name"]
		);
		$this->db->where($query);
		$res = $this->db->get('categories')->result();
		if (count($res) > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function category_list() {
		$query = $this->db->get('categories');
		return $result = $query->result();
	}

	public function sorted_category() {
		$query = $this->db->get('sorted_categories');
		$row = $query->row();
		if ($row != NULL) {
			return json_decode($query->row()->categories);
		} else {
			return [];
		}
	}

	// UPDATED SORTED CATEGORIES
	public function save_sorted_categories($sorted_categories) {
		$query = $this->db->get('sorted_categories');
		$row = $query->row();
		if ($row == NULL) {
			$data = array( 
        'categories' => json_encode($sorted_categories)
	    );
			if ($this->db->insert('sorted_categories', $data)) {
				return true;
			} else {
				return false;
			}
		} else {
			$this->db->set('categories', json_encode($sorted_categories), FALSE);
			$this->db->where('id', $row->id);
			if ($this->db->update('sorted_categories')) {
				return true;
			} else {
				return false;
			}
		}
	}


	// GET SPECIFIC CATEGORY
	public function specific_category_with_id($category_id) {
		$this->db->where('id', $category_id);
		$query = $this->db->get('categories');
		return $query->row();
	}

	// THIS FUNCTION WILL RETURN CATEGORY FOR EDIT FORM PURPOSE
	public function edit_category($category_id, $message = "") {
		$this->db->where('id', $category_id);
		$query = $this->db->get('categories');
		$data = array(
			'category' => $query->row(),
			'message' => $message
		);
		$this->load->view('admin/edit_category', $data);
	}


	// THIS FUNCTION WILL RETURN CATEGORY FOR EDIT FORM PURPOSE
	public function update_category($category_id, $category) {
		$data = array(
			'category_name' => $category['category_name'],
			'category_slug' => $category['category_slug'],
			'category_meta_title' => $category['category_meta_title'],
			'category_meta_description' => $category['category_meta_description'],
			'category_meta_tags' => $category['category_meta_tags'],
		);
		$this->db->where('id', $category_id);
		if ($this->db->update('categories', $data)) {
			return true;
		} else {
			return false;
		}
	}


	public function delete_category($category_id) {
		$this->db->where('id', $category_id);
		if ($this->db->delete('categories')) {
			return true;
		} else {
			return false;
		}
	}


	public function clean_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
}