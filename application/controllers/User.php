<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('admin/Category_model');
		$this->load->model('admin/Product_model');
		$this->load->model('Favourite_model');
		$this->load->model('admin/General_setting_model');
		$this->load->model('Order_model');
		if (stripos($_SERVER['REQUEST_URI'], "404") > 0 || stripos($_SERVER['REQUEST_URI'], "login") > 0 || stripos($_SERVER['REQUEST_URI'], "register") > 0 || ($this->session->has_userdata('user_email') || $this->session->has_userdata('user_id'))) {
			// USER SESSION IS SET OR URL DOES NOT HAVE LOGIN
		} else {
			redirect(base_url() . 'login');
		}
	}

	public function index() {
		if ($this->session->has_userdata('user_email') && $this->session->has_userdata('user_role')) {
			$data['maxvalue'] = "1000";
			$data['categories'] = $this->Category_model->category_list();
			$data['products'] = $this->Product_model->product_list();
			$user_id = $this->session->userdata('user_id');
			$data['favourite_product_ids'] = $this->Favourite_model->get_favourite_product_ids($user_id);
			$data['general_setting'] = $this->General_setting_model->get_general_setting();
			$data['has_placed_order'] = $this->Order_model->has_placed_order();
			$this->load->view('home', $data);
		} else {
			redirect(base_url() . 'login');
		}
	}


	public function home() {
		if ($this->session->has_userdata('user_email') && $this->session->has_userdata('user_role')) {
			$data['maxvalue'] = "1000";
			if ($this->input->post('maximum_price') != NULL) {
				$data['maxvalue'] = $this->input->post('maximum_price');
			}
			$data['has_placed_order'] = $this->Order_model->has_placed_order();
			$data['sorted_categories'] = $this->Category_model->sorted_category();
			$data['featured_products'] = $this->Product_model->featured_products();
			$data['general_setting'] = $this->General_setting_model->get_general_setting();
			$data['products'] = $this->Product_model->product_list(0, $data);
			$this->load->view('home', $data);
		} else {
			redirect(base_url() . 'login');
		}
	}

	public function dashboard() {
		if ($this->session->has_userdata('user_email') && $this->session->has_userdata('user_role')) {
			$data['general_setting'] = $this->General_setting_model->get_general_setting();
			$data['has_placed_order'] = $this->Order_model->has_placed_order();
			$this->load->view('includes/userpanel/dashboard', $data);
		} else {
			redirect(base_url() . 'login');
		}
	}

	public function orders() {
		if ($this->session->has_userdata('user_email') && $this->session->has_userdata('user_role')) {
			$data['general_setting'] = $this->General_setting_model->get_general_setting();
			$data['has_placed_order'] = $this->Order_model->has_placed_order();
			$this->load->view('includes/userpanel/orders', $data);
		} else {
			redirect(base_url() . 'login');
		}
	}

	public function addresses() {
		if ($this->session->has_userdata('user_email') && $this->session->has_userdata('user_role')) {
			if ($this->uri->segment(3) == 'edit' && $this->uri->segment(4) == 'billing-address') {
				$data['general_setting'] = $this->General_setting_model->get_general_setting();
				$data['has_placed_order'] = $this->Order_model->has_placed_order();
				$this->load->view('includes/userpanel/billing_addr_edit', $data);
			} else if ($this->uri->segment(3) == 'edit' && $this->uri->segment(4) == 'shipping-address') {
				$data['general_setting'] = $this->General_setting_model->get_general_setting();
				$data['has_placed_order'] = $this->Order_model->has_placed_order();
				$this->load->view('includes/userpanel/shipping_addr_edit', $data);
			} else {
				$data['general_setting'] = $this->General_setting_model->get_general_setting();
				$data['has_placed_order'] = $this->Order_model->has_placed_order();
				$this->load->view('includes/userpanel/addresses', $data);
			}
		} else {
			redirect(base_url() . 'login');
		}
	}

	public function account_details() {
		if ($this->session->has_userdata('user_email') && $this->session->has_userdata('user_role')) {
			$data['general_setting'] = $this->General_setting_model->get_general_setting();
			$data['has_placed_order'] = $this->Order_model->has_placed_order();
			$this->load->view('includes/userpanel/account_details', $data);
		} else {
			redirect(base_url() . 'login');
		}
	}


	public function register() {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = array(
				'user_name' => $this->clean_input($_POST['user_name']),
				'user_email' => $this->clean_input($_POST['user_email']),
				'user_city' => $this->clean_input($_POST["user_city"]),
				'user_password' => password_hash($this->clean_input($_POST["password"]), PASSWORD_DEFAULT),
				'user_role' => 'customer',
				'user_status' => 'unblocked'
			);
			if ($this->User_model->add_user($data)) {
				$data['general_setting'] = $this->General_setting_model->get_general_setting();
				$data['sorted_categories'] = $this->Category_model->sorted_category();
				$this->session->set_flashdata('registered', 'You have been registered successfully');
				$this->load->view('login', $data);
			}

		} else if ($this->session->has_userdata('user_role')) {
			redirect(base_url());
		} else {
			$data['general_setting'] = $this->General_setting_model->get_general_setting();
			$data['sorted_categories'] = $this->Category_model->sorted_category();
			$this->load->view('register', $data);
		}
	}


	public function login() {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$email = $this->clean_input($_POST["user_email"]);
			$password = $this->clean_input($_POST["user_password"]);
			$data = array(
				'email' => $email,
				'password' => $password
			);
			$data = $this->User_model->verify_user($data);
			if (isset($data['login'])) {
				$data['sorted_categories'] = $this->Category_model->sorted_category();
				$data['general_setting'] = $this->General_setting_model->get_general_setting();
				$this->load->view('login', $data);
			} else {
				if ($this->session->flashdata('requested_url')) {
					$url = $this->session->flashdata('requested_url');
					redirect(base_url() . $url);
				}
				if ($this->session->userdata('user_role') == 'admin') {
					redirect(base_url());
				} else {
					redirect(base_url());
				}
			}
		} else if ($this->session->has_userdata('user_role') && $this->session->userdata('user_role') == 'customer') {
			$url = prep_url(base_url());
			redirect($url);
		} else if ($this->session->has_userdata('user_role') && $this->session->userdata('user_role') == 'admin') {
			$url = prep_url(base_url() . 'admin');
			redirect($url);
		} else {
			$data['general_setting'] = $this->General_setting_model->get_general_setting();
			$data['sorted_categories'] = $this->Category_model->sorted_category();
			$this->load->view('login', $data);
		}
	}


	public function favourites() {
		$cart_products = json_decode(get_cookie('products'));
		$data['cart_products'] = array();
		(!empty($cart_products)) ? $data['cart_products'] = $cart_products : false ;
		$data['categories'] = $this->Category_model->category_list();
		$user_id = $this->session->userdata('user_id');
		$data['general_setting'] = $this->General_setting_model->get_general_setting();
		$data['products'] = $this->Favourite_model->get_favourite_products($user_id);
		$this->load->view('favourites', $data);
	}


	public function remove_favourite() {
		$data = $this->input->post(['user_id', 'product_id']);
		if ($this->Favourite_model->remove_favourite($data)) {
			echo json_encode(true);
		} else {
			echo json_encode(false);
		}
	}

	public function logout() {
		$this->session->unset_userdata(['user_id', 'user_email', 'user_role']);
		redirect(base_url());
	}


	public function clean_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	
	public function f04() {
		$this->load->view('404');
	}

	public function nojs() {
		$this->load->view('nojs');
	}


}
