<?php 

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/User_model');
	}

	public function index() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->User_model->admin_login()) {
				redirect(base_url('admin'));
			}
		} else {
			if (!$this->session->userdata('user_role')) {
				$this->load->view('admin/login');
			} else {
				redirect(base_url());
			}
		}
	}

}