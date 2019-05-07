<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Product_model');
		$this->load->model('admin/Category_model');
		$this->load->model('Favourite_model');
		$this->load->model('admin/General_setting_model');
		$this->load->model('User_model');
		$this->load->model('Order_model');
		// if (!$this->session->has_userdata('user_email') || !$this->session->has_userdata('user_role')) {
		// 	redirect(base_url() . 'login');
		// }
	}


	public function index() {
		$data['has_placed_order'] = $this->Order_model->has_placed_order();
		$data['categories'] = $this->Category_model->category_list();
		$data['products'] = $this->Product_model->product_list();
		$data['general_setting'] = $this->General_setting_model->get_general_setting();
		$this->load->view('home', $data);
	}

	public function view($product_id = 0) {
		$cart_products = json_decode(get_cookie('products'));
		$data['cart_products'] = array();
		(!empty($cart_products)) ? $data['cart_products'] = $cart_products : false ;
		$data['product'] = $this->Product_model->edit_product($product_id);
		if ($data['product']->product_slug != $GLOBALS['slug']) {
			redirect(base_url() . $data['product']->product_slug . '-2' . $data['product']->product_id);
		}
		$data['categories'] = $this->Category_model->category_list();
		# CHECK IF CURRENT USER HAS ALREADY ADDED PRODUCT TO FAVOURITE OR NOT
		$data['already_favourite'] = $this->Favourite_model->check_if_favourite(['product_id' => $product_id, 'user_id' => $this->session->userdata('user_id')]);
		// $data['general_setting'] = $this->General_setting_model->get_general_setting();
		$data['has_placed_order'] = $this->Order_model->has_placed_order();
		$data['sorted_categories'] = $this->Category_model->sorted_category();
		$this->load->view('product', $data);
	}

	public function search($text) {
		$data['products'] = $this->Product_model->search_product($text);
		if ($this->input->post('price_range')) {
			$price_range = $this->input->post('price_range');
			$price_range = str_replace('Rs', '', $price_range);
			$price_range = str_replace(' ', '', $price_range);
			$price_range = explode('-', $price_range);
			$data['minvalue'] = $price_range[0];
			$data['maxvalue'] = $price_range[1];
		} else {
			$data['minvalue'] = 0;
			$data['maxvalue'] = 2000;
		}
		$data['general_setting'] = $this->General_setting_model->get_general_setting();
		$data['has_placed_order'] = $this->Order_model->has_placed_order();
		$data['sorted_categories'] = $this->Category_model->sorted_category();
		$data['featured_products'] = $this->Product_model->featured_products();
		$data['searched_word'] = $text;
		$this->load->view('search', $data);
	}

	public function favourites() {
		$favourite_products = [];
  	if (isset($_COOKIE["favourite_products"])) {
  		$favourite_products = json_decode($_COOKIE["favourite_products"]);
  	}
  	if (count($favourite_products) > 0) {
  		$data['products'] = $this->Product_model->product_list($favourite_products, []);
  	} else {
  		$data['products'] = [];
  	}
		$data['general_setting'] = $this->General_setting_model->get_general_setting();
  	$data['has_placed_order'] = $this->Order_model->has_placed_order();
		$data['sorted_categories'] = $this->Category_model->sorted_category();
		$this->load->view('favourites', $data);
	}

	public function cart() {
		$cart_products = [];
  	if (isset($_COOKIE["cart_products"])) {
  		$cart_products = json_decode($_COOKIE["cart_products"]);
  	}
  	if (count($cart_products) > 0) {
  		$data['products'] = $this->Product_model->product_list($cart_products, [], 'array');
  	} else {
  		$data['products'] = [];
  	}
  	$data['general_setting'] = $this->General_setting_model->get_general_setting();
  	$data['has_placed_order'] = $this->Order_model->has_placed_order();
		$data['sorted_categories'] = $this->Category_model->sorted_category();
		$this->load->view('cart', $data);
	}

	public function set_session_for_cart_items() {
		$cart_items = json_encode($this->input->post('cart_items'));
		$cart_items_with_price = [];
		$total = 0;
		foreach ($this->input->post('cart_items') as $item) {
			// GET PROUDCT PRICE
			// BY PRODUCT ID
			$this->db->where('product_id', $item['product_id']);
			$price = $this->db->get('products')->row()->product_new_price;
			$item['price'] = $price;
			$total += (int) $price * $item['product_count'];
			array_push($cart_items_with_price, $item);
		}
		$this->session->set_userdata('cart_items', json_encode($cart_items_with_price));
		$this->session->set_userdata('order_total', $total);
		echo json_encode(true);
	}

	public function submit_order() {
		$data['sorted_categories'] = $this->Category_model->sorted_category();
		$this->session->set_flashdata('requested_url', ltrim($_SERVER['REQUEST_URI'], '/'));
		$data['cart_items_details'] = [];
		$data['general_setting'] = $this->General_setting_model->get_general_setting();
		if ($this->session->userdata('user_id')) {
			$cart_products = [];
			if ($this->session->userdata('cart_items')) {
				$cart_products = json_decode($this->session->userdata('cart_items'), true);
			}
			$product_ids = [];
			if (count($cart_products) > 0) {
				foreach ($cart_products as $product) {
					array_push($product_ids, $product['product_id']);
				}
				$data['cart_items_details'] = $this->Product_model->multiple_product_details($product_ids);
			}
			$data['user'] = $this->User_model->single_user_details_by_id($this->session->userdata('user_id'));
			$this->load->view('submit_order', $data);
		} else {
			$this->load->view('login', $data);
		}
	}
}