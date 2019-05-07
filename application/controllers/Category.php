<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Product_model');
		$this->load->model('admin/Category_model');
		$this->load->model('Favourite_model');
		$this->load->model('admin/General_setting_model');
		$this->load->model('Order_model');
		// if (!$this->session->has_userdata('user_email') || !$this->session->has_userdata('user_role')) {
		// 	redirect(base_url() . 'login');
		// }
	}


	public function index() {
		$data['maxvalue'] = "1000";
		$data['categories'] = $this->Category_model->category_list();
		$data['products'] = $this->Product_model->product_list();
		$user_id = $this->session->userdata('user_id');
		$data['has_placed_order'] = $this->Order_model->has_placed_order();
		$data['favourite_product_ids'] = $this->Favourite_model->get_favourite_product_ids($user_id);
		$data['category'] = $this->Category_model->specific_category_with_id($category_id);
		$this->load->view('home', $data);
	}

	public function view($category_id = 0) {
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
		$data['has_placed_order'] = $this->Order_model->has_placed_order();
		$data['sorted_categories'] = $this->Category_model->sorted_category();
		$data['products'] = $this->Product_model->category_product_list($category_id, $data);
		$data['categories'] = $this->Category_model->category_list();
		$data['category'] = $this->Category_model->specific_category_with_id($category_id);
		if ($GLOBALS['slug'] != $data['category']->category_slug) {
			redirect(base_url() . $data['category']->category_slug . '-1' . $data['category']->id);
		}
		$user_id = $this->session->userdata('user_id');
		$data['favourite_product_ids'] = $this->Favourite_model->get_favourite_product_ids($user_id);
		$data['category'] = $this->Category_model->specific_category_with_id($category_id);
		$this->load->view('category_products', $data);
	}

}