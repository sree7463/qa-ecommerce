<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Product_model');
		$this->load->model('admin/Category_model');
		$this->load->model('Favourite_model');
		$this->load->model('Order_model');
		$this->load->model('admin/General_setting_model');
		if (!$this->session->has_userdata('user_email') || !$this->session->has_userdata('user_role')) {
			redirect(base_url() . 'login');
		}
	}

	public function index() {
		$user_id = $this->session->userdata('user_id');
		$data['orders'] = $this->Order_model->get_orders($user_id);
		$data['general_setting'] = $this->General_setting_model->get_general_setting();
		$this->load->view('order', $data);
	}


	public function delete_order() {
		$order_id = $this->input->post('order_id');
		if ($this->Order_model->delete_order($order_id)) {
			echo json_encode(true);
		} else {
			echo json_encode(false);
		}
	}

	public function orders() {
		$data['general_setting'] = $this->General_setting_model->get_general_setting();
		$data['has_placed_order'] = $this->Order_model->has_placed_order();
		$data['sorted_categories'] = $this->Category_model->sorted_category();
		$data['orders'] = $this->Order_model->get_user_orders($this->session->userdata('user_id'));
		$this->load->view('orders', $data);
	}

	public function order_details($order_id) {
		/* GET ORDER INFO */
		$data['order'] = $this->Order_model->get_single_order_details($order_id);
		/* ../ GET ORDER INFO */
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
		$data['categories'] = $this->Category_model->category_list();
		$user_id = $this->session->userdata('user_id');
		$data['favourite_product_ids'] = $this->Favourite_model->get_favourite_product_ids($user_id);
		$this->load->view('order_details', $data);
	}
}