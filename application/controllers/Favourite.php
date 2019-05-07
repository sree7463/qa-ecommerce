<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Favourite extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/Product_model');
		$this->load->model('admin/Category_model');
		$this->load->model('Favourite_model');
		if (!$this->session->has_userdata('user_email') || !$this->session->has_userdata('user_role')) {
			redirect(base_url() . 'login');
		}
	}

	public function add_favourite() {
		$data['user_id'] = $this->input->post('user_id');
		$data['product_id'] = $this->input->post('product_id');
		$response = $this->Favourite_model->product_favourite($data);
		echo $response;
	}

	# PRODUCT CONTROLLER IS DIRECTLY COMMUNICATING WITH FAVOURITE MODEL
	// public function check_if_added() {

	// }
}

?>