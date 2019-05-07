<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Product_model');
		$this->load->model('admin/Category_model');
		$this->load->model('Favourite_model');
		$this->load->model('Order_model');
		$this->load->model('admin/General_setting_model');
		$this->load->model('User_model');
		if (!$this->session->has_userdata('user_email') || !$this->session->has_userdata('user_role')) {
			redirect(base_url() . 'login');
		}
	}

	public function index() {
		$ids = json_decode(get_cookie('products'));
		if (!empty($ids)) {
			$data['products'] = $this->Product_model->product_list($ids);
		} else {
			$data['products'] = array();
		}
		$data['general_setting'] = $this->General_setting_model->get_general_setting();
		$this->load->view('cart', $data);
	}

	public function products_json_format() {
		$ids = json_decode(get_cookie('products'));
		if (!empty($ids)) {
			$data['products'] = $this->Product_model->product_list($ids);
		} else {
			$data['products'] = array();
		}
		echo json_encode($data);
	}


	public function checkout() {
		$ids = json_decode(get_cookie('products'));
		if (!empty($ids)) {
			$data['products'] = $this->Product_model->product_list($ids);
			$this->load->view('checkout');
		} else {
			$data['message'] = '<div class="alert alert-danger alert-dismissible mt-4">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Error!</strong> First add products to cart!
			</div>';
			$data['categories'] = $this->Category_model->category_list();
			$data['products'] = $this->Product_model->product_list();
			$user_id = $this->session->userdata('user_id');
			$data['favourite_product_ids'] = $this->Favourite_model->get_favourite_product_ids($user_id);
			$data['general_setting'] = $this->General_setting_model->get_general_setting();
			$this->load->view('home', $data);
		}
	}


	public function save_order() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if ($this->session->userdata('cart_items')) {
				$user_id = $this->session->userdata('user_id');
				if ($this->Order_model->save_order($_POST, $user_id)) {
					$data['message'] = '<div class="alert alert-success alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Success!</strong> Order placed successfully!
					</div>';
				} else {
					$data['message'] = '<div class="alert alert-danger alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Error!</strong> Order was not placed!
					</div>';
				}
				$data['cart_items_details'] = [];
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
				}
				$data['user'] = $this->User_model->single_user_details_by_id($this->session->userdata('user_id'));
				// $data['products'] = $this->Product_model->product_list($ids);
				$data['general_setting'] = $this->General_setting_model->get_general_setting();
				$this->load->view('submit_order', $data);
			}
		} else {
			$this->load->view('404');
		}
	}
}