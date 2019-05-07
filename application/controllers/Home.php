<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('admin/Category_model');
		$this->load->model('admin/Product_model');
		$this->load->model('Favourite_model');
		$this->load->model('admin/General_setting_model');
		$this->load->model('Order_model');
	}

	public function index() {
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
		$data['featured_products'] = $this->Product_model->featured_products();
		$temp_array = $this->Product_model->home_product_list(0, $data);
		$data['products'] = $temp_array["result"];
		$data['product_count'] = $temp_array["product_count"];
		$data['page'] = $temp_array["page"];
		$data['general_setting'] = $this->General_setting_model->get_general_setting();
		$this->load->view('home', $data);
	}



}
