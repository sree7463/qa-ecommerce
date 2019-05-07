<?php 

class User_model extends CI_Model {

	public function hello() {
		echo "hello";exit;
	}

	public function user_list() {
		$query = $this->db->get('users');
		return $result = $query->result();
	}

	public function block_user($user_id) {
		$this->db->where('user_id', $user_id);
		$data = array(
			'user_status' => 'blocked'
		);
		return $this->db->update('users', $data);
	}

	public function unblock_user($user_id) {
		$this->db->where('user_id', $user_id);
		$data = array(
			'user_status' => 'unblocked'
		);
		return $this->db->update('users', $data);
	}

	function delete_user($user_id) {
		$this->db->where('user_id', $user_id);
		return $this->db->delete('users');
	}

	function admin_login() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$email = $this->input->post('email');
			$password = $this->input->post('pass');

			$query = $this->db->query("SELECT * FROM users WHERE user_email = '$email' AND user_role = 'admin' LIMIT 1");

			if ($query->num_rows() > 0) {
				$user = $query->row_array();
				if (password_verify($password, $user['user_password'])) {
					$this->session->set_userdata("user_email", $user['user_email']);
					$this->session->set_userdata("user_role", $user['user_role']);
					$this->session->set_userdata("user_id", $user['user_id']);
					return true;
				} else {
					$this->session->set_flashdata('admin_login_failed', 'Wrong email or password');
					redirect(base_url('admin/login'));
				}
			} else {
				$this->session->set_flashdata('admin_login_failed', 'Wrong email or password');
				redirect(base_url('admin/login'));
			}
		}
	}

}
