<?php 

class User_model extends CI_Model {
	public function add_user($data) {
		$this->db->insert('users', $data);
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'login' => '<div class="alert alert-success alert-dismissible">
									  <button type="button" class="close" data-dismiss="alert">&times;</button>
									  <strong>Success!</strong> Account created successfully.You can now login!
									</div>'
			);
			return $data;
		} else {
			return true;
		}
	}

	public function verify_user($user_data) {
		$this->db->where('user_email', $user_data['email']);
		$query = $this->db->get('users');
		$user = $query->row();
		if ($user !== NULL) {
			// NOW CHECK IF PASSWORD MATCH OR NOT
			if (password_verify($user_data['password'], $user->user_password)) {
					if ($user->user_status == 'blocked') {
						$data = array(
						'login' => '<div class="alert alert-danger alert-dismissible">
											  <button type="button" class="close" data-dismiss="alert">&times;</button>
											  <strong>Error!</strong> This user is blocked!
											</div>'
						);
					} else {
						$this->session->set_userdata("user_email", $user->user_email);
						$this->session->set_userdata("user_role", $user->user_role);
						$this->session->set_userdata("user_id", $user->user_id);
						$this->session->set_userdata("user_name", $user->user_name);
					}
			} else {
				$data = array(
					'login' => '<div class="alert alert-danger alert-dismissible">
										  <button type="button" class="close" data-dismiss="alert">&times;</button>
										  <strong>Error!</strong> Wrong email or password.
										</div>'
				);
			}
		} else {
			$data = array(
				'login' => '<div class="alert alert-danger alert-dismissible">
										  <button type="button" class="close" data-dismiss="alert">&times;</button>
										  <strong>Error!</strong> Wrong email or password.
										</div>'
			);
		}
		return $data;
	}



	function single_user_details_by_id($user_id) {
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('users');
		return $query->row();
	}
}


?>