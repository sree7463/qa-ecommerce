<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Favourite_model extends CI_Model {
	public function product_favourite($data) {
		$query = $this->db->query("SELECT * FROM favourites WHERE product_id = {$data["product_id"]} AND user_id = {$data["user_id"]}");
		if ($query->num_rows() > 0) {
			$this->db->where($data);
			if ($this->db->delete('favourites')) {
				return "removed";
			}
		} else {
			if ($this->db->insert('favourites', $data)) {
				return "added";
			}
		}
	}

	public function check_if_favourite($data) {
		$this->db->where($data);
		$result = $this->db->get('favourites');
		if ($result->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function remove_favourite($data) {
		$this->db->where($data);
		$this->db->delete('favourites');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function get_favourite_product_ids($user_id) {
		$this->db->select('products.product_id');
		$this->db->from('products');
		$this->db->join('favourites', 'products.product_id = favourites.product_id');
		$this->db->where('favourites.user_id', $user_id);
		$query = $this->db->get();
		$rows = $query->result();
		$array_of_ids = array();
		foreach ($rows as $row) {
			array_push($array_of_ids, $row->product_id);
		}
		return $array_of_ids;
	}


	public function get_favourite_products($user_id) {
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('favourites', 'products.product_id = favourites.product_id');
		$this->db->where('favourites.user_id', $user_id);
		$query = $this->db->get();
		return $query->result();
	}
}