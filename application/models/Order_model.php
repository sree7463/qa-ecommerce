<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
	function save_order($data, $user_id) {

		$data = array(
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'user_name' => $data['user_name'],
			'user_email' => $data['user_email'],
			'user_address' => $data['user_address'],
			'country' => $data['country'],
			'state' => $data['state'],
			'zip_code' => $data['zip_code'],
			'paymentMethod' => $data['paymentMethod'],
			'name_on_cc' => $data['name_on_cc'],
			'cc_number' => $data['cc_number'],
			'cc_expiration' => $data['cc_expiration'],
			'cc_cvv' => $data['cc_cvv'],
			'order_date' => date("Y-m-d"),
			'product_ids_and_amount' => $this->session->userdata('cart_items'),
			'total' => $this->session->userdata('order_total'),
			'order_status' => 'pending',
			'user_id' => $user_id
		);
		if ($this->db->insert('orders', $data)) {
			return true;
		} else {
			return false;
		}
	}


	public function get_products_prices($product_ids) {
		$product_ids_array = explode(',', $product_ids);
		$this->db->select('products.product_price');
		$this->db->where_in('product_id', $product_ids_array);
		$query = $this->db->get('products');
		$product_price_array = array_map(function($product){return $product->product_price;}, $query->result());
		return $product_price_array;
	}

	public function get_user_orders($user_id) {
		$query = $this->db->query("SELECT * FROM orders WHERE user_id = $user_id ORDER BY order_id DESC");
		$user_orders = $query->result();
		foreach ($user_orders as $order) {
			$order_items = json_decode($order->product_ids_and_amount);
			foreach ($order_items as $item) {
				
			}
		}
		return $query->result();
	}


	// GET ALL ORDERS
	public function get_all_orders() {
		$this->db->join('orders', 'orders.user_id = users.user_id'); 
		$query = $this->db->get('users');
		return $result = $query->result();
	}

	public function has_placed_order() {
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query = $this->db->get("orders");
		if (count($query->result()) > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function get_single_order_details($order_id) {
		$array = array(
			'order_id' => $order_id,
			'user_id' => $this->session->userdata('user_id')
		);
		$this->db->where($array);
		$query = $this->db->get('orders');
		return $query->row();
	}

	public function approve_order($order_id) {
		$array = array(
			'order_status' => 'approved'
		);
		$this->db->set($array);
		$this->db->where('order_id', $order_id);
		$this->db->update('orders');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function disapprove_order($order_id) {
		$array = array(
			'order_status' => 'pending'
		);
		$this->db->set($array);
		$this->db->where('order_id', $order_id);
		$this->db->update('orders');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function delete_order($order_id) {
		 $this->db->where('order_id', $order_id);
	   return $this->db->delete('orders');
	}


}