<?php 

class Admin extends CI_Controller {

	function __construct() {

		parent::__construct();
		if ($this->session->userdata('user_role') !== 'admin') {
			redirect(base_url('admin/login'));
		}
		$this->load->model('admin/User_model');
		$this->load->model('admin/Category_model');
		$this->load->model('admin/Product_model');
		$this->load->model('Order_model');
		$this->load->model('admin/General_setting_model');

	}



	public function index() {
		$data['user_count'] = count($this->User_model->user_list());
		$data['product_count'] = count($this->Product_model->product_list());
		$data['category_count'] = count($this->Category_model->category_list());
		$data['orders'] = $this->Order_model->get_all_orders();
		$data['order_count'] = count($data['orders']);
		$this->load->view('admin/home', $data);
	}


	public function add_category() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->load->model('admin/Category_model');
			if ($this->Category_model->category_exist()) {
				$message = '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error!</strong> Category with same name already exist!
				</div>';
			} else if ($this->Category_model->add_category($_POST)) {
				$message = '<div class="alert alert-success alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Success!</strong> Category added successfully!
				</div>';
			} else {
				$message = '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error!</strong> Category was not added!
				</div>';
			}
			
			$data = array(
				'message' => $message,
				'category_name' => $_POST['category_name'],
				'category_slug' => $_POST['category_slug'],
				'category_meta_title' => $_POST['category_meta_title'],
				'category_meta_description' => $_POST['category_meta_description'],
				'category_meta_tags' => $_POST['category_meta_tags'],
			);
			$this->load->view('admin/add_category', $data);
		} else {
			$this->load->view('admin/add_category');
		}
	}


	public function category_list() {
		$result = $this->Category_model->category_list();
		$sorted_categories = $this->Category_model->sorted_category();
		$data = array(
			'categories' => $result,
			'sorted_categories' => $sorted_categories
		);
		$this->load->view('admin/category_list', $data);
	}

	public function save_sorted_categories() {
		$sorted_categories = $this->input->post('sorted_categories');
		if ($this->Category_model->save_sorted_categories($sorted_categories)) {
			echo json_encode(true);
		} else {
			echo json_encode(false);
		}
	}


	public function edit_category($id = 0) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->load->model('admin/Category_model');
			if ($this->Category_model->update_category($id, $_POST)) {
				$message = '<div class="alert alert-success alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Success!</strong> Category updated successfully!
				</div>';
			} else {
				$message = '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error!</strong> Category was not updated!
				</div>';
			}
			$this->load->model('admin/Category_model');
			$this->Category_model->edit_category($id, $message);
		} else {
			$this->load->model('admin/Category_model');
			$this->Category_model->edit_category($id);
		}
	}


	public function delete_category($category_id) {
		$this->load->model('admin/Category_model');
		if ($this->Category_model->delete_category($category_id)) {
			$message = '<div class="alert alert-success alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Success!</strong> Category deleted successfully!
				</div>';
		} else {
			$message = '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error!</strong> Category was not deleted!
				</div>';
		}
		$data['message'] = $message;
		$data['sorted_categories'] = $this->Category_model->sorted_category();
		$this->load->model('admin/Category_model');
		$result = $this->Category_model->category_list();
		$data['categories'] = $result;
		$this->load->view('admin/category_list', $data);
	}


	public function add_product() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$this->load->model('admin/Product_model');
			if ($this->Product_model->add_product($_POST)) {
				$message = '<div class="alert alert-success alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Success!</strong> Product added successfully!
				</div>';
			} else {
				$message = '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error!</strong> Product was not added!
				</div>';
			}
			$data = array(
				'message' => $message,
				'product_name' => $_POST['product_name'],
				'product_slug' => $_POST['product_slug'],
				'product_meta_title' => $_POST['product_meta_title'],
				'product_meta_description' => $_POST['product_meta_description'],
				'product_meta_keywords' => $_POST['product_meta_keywords'],
				'product_tag' => $_POST['product_tag'],
				'product_new_price' => $_POST['product_new_price'],
				'product_old_price' => $_POST['product_old_price'],
				'product_detail' => $_POST['product_detail']
			);
			
			$data['added_category'] = $this->input->post('category');
			$data['categories'] = $this->Category_model->category_list();
			$this->load->view('admin/add_product', $data);
		} else {
			$data['categories'] = $this->Category_model->category_list();
			$this->load->view('admin/add_product', $data);
		}
	}


	public function product_list() {
		$this->load->model('admin/Product_model');
		$result = $this->Product_model->all_products();
		$data['products'] = $result;
		$this->load->view('admin/product_list', $data);
	}

	public function edit_product($id = 0) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->load->model('admin/Product_model');
			if ($this->Product_model->update_product($id, $_POST)) {
				$message = '<div class="alert alert-success alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Success!</strong> Product updated successfully!
				</div>';
			} else {
				$message = '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error!</strong> Product was not updated!
				</div>';
			}
			$product = $this->Product_model->edit_product($id);
			$categories = $this->Category_model->category_list();
			$data = array(
				'message' => $message,
				'product' => $product,
				'categories' => $categories
			);
			$this->load->view('admin/edit_product', $data);
		} else {
			$data['categories'] = $this->Category_model->category_list();
			$data['product'] = $this->Product_model->edit_product($id);
			$this->load->view('admin/edit_product', $data);
		}
	}

	public function delete_product($product_id) {
		$this->load->model('admin/Product_model');
		$product = $this->Product_model->product_list($product_id);
		if (count($product) > 0) {
			$product_images = $product[0]->product_images;
			if ($this->Product_model->delete_product($product_id)) {
				### FIRST DELETE PRODUCT RELATED IMAGES ###
				$images_array = explode(',', $product_images);
				foreach ($images_array as $i) {
					$f = 'Assets/images/products/' . $i;
					if (file_exists($f) && !empty($i)) {
						unlink($f);
					}
					$f2 = 'Assets/images/products/thumbnails/' . $i;
					if (file_exists($f2) && !empty($i)) {
						unlink($f2);
					}
				}
				### ../ FIRST DELETE RELATED PRODUCT IMAGES ###
				$message = '<div class="alert alert-success alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Success!</strong> Product deleted successfully!
					</div>';
			} else {
				$message = '<div class="alert alert-danger alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Error!</strong> Product was not deleted!
					</div>';
			}
			$data['message'] = $message;
			$this->load->model('admin/Product_model');
			$result = $this->Product_model->all_products();
			$data['products'] = $result;
			$this->load->view('admin/product_list', $data);
		} else {
			$result = $this->Product_model->product_list();
			$data['products'] = $result;
			$this->load->view('admin/product_list', $data);
		}
	}

	public function user_list() {
		$data['users'] = $this->User_model->user_list();
		$this->load->view('admin/user_list', $data);
	}

	public function block_user($user_id) {
		if ($this->User_model->block_user($user_id)) {
			$message = '<div class="alert alert-success alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Success!</strong> User blocked successfully!
				</div>';
		} else {
			$message = '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error!</strong> User was not blocked!
				</div>';
		}
		$data['message'] = $message;
		$data['users'] = $this->User_model->user_list();
		$this->load->view('admin/user_list', $data);
	}

	public function unblock_user($user_id) {
		if ($this->User_model->unblock_user($user_id)) {
			$message = '<div class="alert alert-success alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Success!</strong> User unblocked successfully!
				</div>';
		} else {
			$message = '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error!</strong> User was not unblocked!
				</div>';
		}
		$data['message'] = $message;
		$data['users'] = $this->User_model->user_list();
		$this->load->view('admin/user_list', $data);
	}


	public function order_list() {
		$data['orders'] = $this->Order_model->get_all_orders();
		$this->load->view('admin/order_list', $data);
	}


	public function setting() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->General_setting_model->save_setting()) {
				$data['message'] = '<div class="alert alert-success alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Success!</strong> General settings updated successfully!
				</div>';
			} else {
				$data['message'] = '<div class="alert alert-danger alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Error!</strong> General settings were not updated!
				</div>';
			}
			$data['general_setting'] = $this->General_setting_model->get_general_setting();
			$this->load->view('admin/setting', $data);
		} else {
			$data['general_setting'] = $this->General_setting_model->get_general_setting();
			$this->load->view('admin/setting', $data);
		}
	}


	public function delete_product_image() {
		header('Content-Type: application/json');
		$product_id = $this->input->post('product_id');
		$image_name = $this->input->post('image_name');
		if ($this->Product_model->delete_product_image($product_id, $image_name)) {
			echo json_encode(true);
		} else {
			echo json_encode(false);
		}
	}

	public function approve_order($order_id) {
		if ($this->Order_model->approve_order($order_id)) {
			$this->session->set_flashdata('order_message', '<div class="alert alert-success alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Success!</strong> Order updated successfully.
			</div>');
			redirect(base_url() . 'admin');
		} else {
			$this->session->set_flashdata('order_message', '<div class="alert alert-danger alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Error!</strong> Order updation failed.
			</div>');
			redirect(base_url() . 'admin');
		}
	}

	public function disapprove_order($order_id) {
		if ($this->Order_model->disapprove_order($order_id)) {
			$this->session->set_flashdata('order_message', '<div class="alert alert-success alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Success!</strong> Order updated successfully.
			</div>');
			redirect(base_url() . 'admin');
		} else {
			$this->session->set_flashdata('order_message', '<div class="alert alert-danger alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Error!</strong> Order updation failed.
			</div>');
			redirect(base_url() . 'admin');
		}
	}

	public function delete_user($user_id) {
		if ($this->User_model->delete_user($user_id)) {
			$this->session->set_flashdata('user_deleted', 'User deleted successfully');
		}
		$data['users'] = $this->User_model->user_list();
		$this->load->view('admin/user_list', $data);
	}


	public function logout() {
		$this->session->unset_userdata('user_email');
		$this->session->unset_userdata('user_role');
		redirect(base_url());
	}
}