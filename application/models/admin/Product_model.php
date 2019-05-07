<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
	public function add_product($data) {

		if (!empty($_FILES['product_images']['name'][0])) {
			# SAVE PRODUCT IMAGES ON SERVER #
			$images = array();$product_images = array();
			for ($i = 0; $i < count($_FILES['product_images']['name']); $i++) {
				$images[$i]['name'] = $_FILES['product_images']['name'][$i];
				$images[$i]['type'] = $_FILES['product_images']['type'][$i];
				$images[$i]['tmp_name'] = $_FILES['product_images']['tmp_name'][$i];
			}

			foreach ($images as $image) {
				$target_dir = "Assets/images/products/";
				$file_name = round(microtime(true) * 1000) . ' ' . basename($image["name"]);
				$file_name = str_replace('_', '-', $file_name);
				$file_name = str_replace(' ', '-', $file_name);
				array_push($product_images, $file_name);
				$target_file = $target_dir . $file_name;
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
				if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
				  return false;
				} else {
					### GET ORIGINAL IMAGE WIDTH AND HEIGHT ###
					$image_width = getimagesize($image['tmp_name'])[0];
			    $image_height = getimagesize($image['tmp_name'])[1];
					### ../ GET ORIGINAL IMAGE WIDTH AND HEIGHT ###
					move_uploaded_file($image["tmp_name"], $target_file);
					#### SAVE THUMBNAILS CODE
					$thumb_file = $target_dir . 'thumbnails/' . $file_name;
	        $new_width = 160;
	        $new_height = round(($image_height * $new_width) / $image_width);
	        resize_image($target_file, $new_width,  $new_height, $thumb_file);
					#### ../ SAVE THUMBNAILS CODE
				}
			}
			$product_images = implode(",", $product_images);
		}

		$product_category = implode(',', $_POST['category']);
		$data = array(
			'product_name' => $this->clean_input($data['product_name']),
			'product_slug' => $this->clean_input($data['product_slug']),
			'product_meta_title' => $this->clean_input($data['product_meta_title']),
			'product_meta_description' => $this->clean_input($data['product_meta_description']),
			'product_meta_keywords' => $this->clean_input($data['product_meta_keywords']),
			'product_category' => $product_category,
			'product_tag' => $this->clean_input($data['product_tag']),
			'product_new_price' => $this->clean_input($data['product_new_price']),
			'product_old_price' => $this->clean_input($data['product_old_price']),
			'product_detail' => $this->clean_input($data['product_detail'])
		);
		if (isset($_POST['publish'])) {
			$data['publish'] = 1;
		} else {
			$data['publish'] = 0;
		}
		if (isset($_POST['display_on_homepage'])) {
			$data['display_on_homepage'] = 1;
		} else {
			$data['display_on_homepage'] = 0;
		}
		if (isset($product_images)) {
			$data['product_images'] = $product_images;
		}

		if ($this->db->insert('products', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function product_list($ids = 0, $data = [], $type = '') {
		if ($ids == 0) {
			if (isset($data['minvalue'])) {
				$minvalue = $data['minvalue'];
				$maxvalue = $data['maxvalue'];
			} else {
				$minvalue = 0;
				$maxvalue = 2000;
			}
			// $this->db->where("product_new_price BETWEEN '$minvalue' AND $maxvalue");
			// $this->db->where(array('product_tag' => NULL));
			// $this->db->where(array('display_on_homepage' => 1));
			// $this->db->order_by("product_id", "desc");
			// $query = $this->db->get('products');
			$query = $this->db->query("SELECT * FROM products WHERE display_on_homepage = 1 AND (product_tag = '' OR product_tag = NULL) AND (product_new_price BETWEEN $minvalue AND $maxvalue) ORDER BY product_id DESC");
			if ($type == 'array') {
			  return $result = $query->row_array();
			} else {
				return $result = $query->result();
			}
		} else {
			// PASS ARRAY OF IDS LIKE [1] OR [1,2,3]
			$this->db->where_in('product_id', $ids);
			$query = $this->db->get('products');
			return $result = $query->result();
		}
	}

	// FOR PAGINATION
	public function home_product_list($ids = 0, $data = [], $type = '') {
		if ($ids == 0) {
			if (isset($data['minvalue'])) {
				$minvalue = $data['minvalue'];
				$maxvalue = $data['maxvalue'];
			} else {
				$minvalue = 0;
				$maxvalue = 2000;
			}

			$per_page = 9;
      if(isset($_GET['page'])) {
				$page = $_GET['page'];
      } else {
        $page = "";
      }

      if($page == "" || $page == 1) {
        $page_1 = 0;
      } else {
        $page_1 = ($page * $per_page) - $per_page;
      }

      $product_count = $this->db->query("SELECT * FROM products WHERE display_on_homepage = 1 AND publish = 1 AND (product_tag = '' OR product_tag = NULL)")->num_rows();
      if ($product_count > 0) {
      	$product_count = ceil($product_count / $per_page);
      }
      // $GLOBALS['product_count'] = $product_count;
      // $GLOBALS['page'] = $page;
      // var_dump($count);exit;
			// $this->db->where("product_new_price BETWEEN '$minvalue' AND $maxvalue");
			// $this->db->where(array('product_tag' => NULL));
			// $this->db->where(array('display_on_homepage' => 1));
			// $this->db->order_by("product_id", "desc");
			// $query = $this->db->get('products');
			$query = $this->db->query("SELECT * FROM products WHERE display_on_homepage = 1 AND publish = 1 AND (product_tag = '' OR product_tag = NULL) AND (product_new_price BETWEEN $minvalue AND $maxvalue) ORDER BY product_id DESC LIMIT $page_1, $per_page");


			$result = $query->result();
			return array(
				'result' => $result,
				'product_count' => $product_count,
				'page' => $page
			);
		} else {
			// PASS ARRAY OF IDS LIKE [1] OR [1,2,3]
			$this->db->where_in('product_id', $ids);
			$query = $this->db->get('products');
			return $result = $query->result();
		}
	}

	public function all_products() {
		$query = $this->db->get('products');
		return $result = $query->result();
	}

	public function edit_product($product_id) {
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('products');
		return $query->row();
	}

	public function update_product($product_id, $product) {
		$old_images = '';
		if (isset($product['product_old_images'])) {
			$old_images = implode(',', $product['product_old_images']);
		}

		# SAVE PRODUCT IMAGES ON SERVER #
		if (!empty($_FILES['product_images']['name'][0])) {
			$images = array();$product_images = array();
			for ($i = 0; $i < count($_FILES['product_images']['name']); $i++) {
				$images[$i]['name'] = $_FILES['product_images']['name'][$i];
				$images[$i]['type'] = $_FILES['product_images']['type'][$i];
				$images[$i]['tmp_name'] = $_FILES['product_images']['tmp_name'][$i];
			}

			foreach ($images as $image) {
				$target_dir = "Assets/images/products/";
				$file_name = time() . ' ' . basename($image["name"]);
				$file_name = str_replace(' ', '-', $file_name);
				array_push($product_images, $file_name);
				$target_file = $target_dir . $file_name;
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
				if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				  return false;
				} else {
					### GET ORIGINAL IMAGE WIDTH AND HEIGHT ###
					$image_width = getimagesize($image['tmp_name'])[0];
			    $image_height = getimagesize($image['tmp_name'])[1];
					### ../ GET ORIGINAL IMAGE WIDTH AND HEIGHT ###
					move_uploaded_file($image["tmp_name"], $target_file);
					#### SAVE THUMBNAILS CODE
					$thumb_file = $target_dir . 'thumbnails/' . $file_name;
	        $new_width = 160;
	        $new_height = round(($image_height * $new_width) / $image_width);
	        resize_image($target_file, $new_width,  $new_height, $thumb_file);
					#### ../ SAVE THUMBNAILS CODE
				}
			}
			$product_images = implode(",", $product_images);
			if (!empty($old_images)) {
				$product_images = $old_images . ',' . $product_images;
			} else {
				$product_images = $old_images . $product_images;
			}
		}

		
		$product_category = implode(',', $_POST['category']);
		$data = array(
			'product_name' => $this->clean_input($_POST['product_name']),
			'product_slug' => $this->clean_input($_POST['product_slug']),
			'product_meta_title' => $this->clean_input($_POST['product_meta_title']),
			'product_meta_description' => $this->clean_input($_POST['product_meta_description']),
			'product_meta_keywords' => $this->clean_input($_POST['product_meta_keywords']),
			'product_category' => $product_category,
			'product_tag' => $this->clean_input($_POST['product_tag']),
			'product_new_price' => $this->clean_input($_POST['product_new_price']),
			'product_old_price' => $this->clean_input($_POST['product_old_price']),
			'product_detail' => $this->clean_input($_POST['product_detail'])
		);

		if (isset($_POST['publish'])) {
			$data['publish'] = 1;
		} else {
			$data['publish'] = 0;
		}
		if (isset($_POST['display_on_homepage'])) {
			$data['display_on_homepage'] = 1;
		} else {
			$data['display_on_homepage'] = 0;
		}
		if (isset($product_images)) {
			$data['product_images'] = $product_images;
		}
		$this->db->where('product_id', $product_id);
		if ($this->db->update('products', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function category_product_list($category_id, $data) {
		if (isset($data['minvalue'])) {
			$minvalue = $data['minvalue'];
			$maxvalue = $data['maxvalue'];
		} else {
			$minvalue = 0;
			$maxvalue = 1000;
		}
		$query = $this->db->query("SELECT * FROM products WHERE product_new_price AND publish = 1 BETWEEN $minvalue AND $maxvalue 
			HAVING (FIND_IN_SET($category_id, product_category)) ");
		return $query->result();
	}

	public function delete_product($product_id) {
		$this->db->where('product_id', $product_id);
		if ($this->db->delete('products')) {
			return true;
		} else {
			return false;
		}
	}

	public function search_product($text) {
		$text = filter_this($text);
		$this->db->where('product_name', str_replace('+', ' ', $text));
		$q = $this->db->get('products');
		$r = $q->result();
		if ($q->num_rows() > 0) {
			return $r;
		}
		$terms = explode('+', $text);
		foreach($terms as $term){
		  $this->db->or_like('product_name', $term);
		  $this->db->or_like('product_slug', $term);
		  $this->db->or_like('product_meta_title', $term);
		  $this->db->or_like('product_meta_description', $term);
		}
		$this->db->where('publish', 1);
		$query = $this->db->get('products');
		return $query->result();
	}

	public function product_images($product_id) {
		$this->db->where(['product_id' => $product_id]);
		$this->db->select("product_images");
		$query = $this->db->get("products");
		return $query->result();
	}

	public function delete_product_image($product_id, $image_name) {
		header('Content-Type: application/json');
		// if (count($this->product_images($product_id)) > 0) {
		// 	$product_images = $this->product_images($product_id)[0]->product_images;
		// } else { return false; }
		$product_images = $this->product_images($product_id)[0]->product_images;
		
		if (!empty($product_images)) {
			// $images_array = json_decode($product_images);
			$images_array = explode(',', $product_images);
			$position = array_search($image_name, $images_array);
	  	unset($images_array[$position]);
			$new_images = implode(',', $images_array);
			$data = array('product_images' => $new_images);
			$this->db->where(['product_id' => $product_id]);
			if ($this->db->update('products', $data)) {
				unlink('Assets/images/products/' . $image_name);
				return true;
			} else {
				return false;
			}
		}
	}

	public function multiple_product_details($product_ids) {
		$this->db->where_in('product_id', $product_ids);
		$query = $this->db->get('products');
		return $query->result();
	}

	public function featured_products() {
		// $this->db->select('*');
		// $this->db->where("product_tag is NOT NULL");
		$query = $this->db->query('SELECT * FROM products WHERE product_tag != ""');
		return $query->result();
	}

	public function clean_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

}