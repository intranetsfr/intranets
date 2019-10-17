<?php

/**
 * ROTY Jeremy <rotyjeremy@gmail.com>
 * Users
 */
class Users extends Intranets_Controller
{

	public function __construct()
	{
		parent::__construct();
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	}
	public function login()
	{
		$inputs = inputs();
		$data['result'] = false;
		$data['users_email'] = "";
		$data['users_password'] = "";

		$api_mobile = true;
		if (isset($_POST['users_email']) && $api_mobile) {
			$data['users_email'] = $users_email = $this->input->post("users_email");
			$data['users_password'] = $users_password = $this->input->post("users_password");

			$this->form_validation->set_rules("users_email", "users_email", "trim|required|valid_email", array(
				"trim" => "",
				"required" => "Votre e-mail n'est pas valide",
				"valid_email" => "Votre e-mail n'est pas au bon format",
			));
			$this->form_validation->set_rules("users_password", "users_password", "trim|required", array(
				"trim" => "",
				"required" => "Votre pseudo est obligatoire",
			));
			if ($this->form_validation->run() == FALSE) {
				$data['message'] = validation_errors('', '<br />');
			} else {
				$this->db->where("users_email", $users_email);
				$infoWithEmail = $this->User->info();
				if (isset($infoWithEmail['users_id']) && $infoWithEmail['users_id'] > 0) {
					$data['result'] = true;
					$data['users_token'] = $infoWithEmail['users_token'];
				}else{

				}
			}
			$this->view($data);
		} else {
			$data['title'] = "Subscribe";
			$data['view'] = "pages/users/subscribe";
		}
	}

	public function subscribe()
	{
		$inputs = inputs();
		$data['result'] = false;

		$data['users_gender'] = "";
		$data['users_email'] = "";
		$data['users_conditions'] = "";
		$data['users_nickname'] = "";

		$api_mobile = true;
		if (isset($_POST['users_email']) && $api_mobile) {
			$data['users_gender'] = $users_gender = $this->input->post("users_gender");
			$data['users_email'] = $users_email = $this->input->post("users_email");
			$data['users_conditions'] = $users_conditions = $this->input->post("users_conditions");
			$data['users_nickname'] = $users_nickname = $this->input->post("users_nickname");

			$this->form_validation->set_rules("users_gender", "users_gender", "trim|required", array(
				"trim" => "",
				"required" => "Votre sexe est obligatoire",
			));
			$this->form_validation->set_rules("users_email", "users_email", "trim|required|valid_email|is_unique[users.users_email]", array(
				"trim" => "",
				"required" => "Votre e-mail n'est pas valide",
				"valid_email" => "Votre e-mail n'est pas au bon format",
				"is_unique" => "Un compte existe déjà chez Osez. Avez-vous oublié ?"
			));
			$this->form_validation->set_rules("users_conditions", "users_conditions", "trim|required", array(
				"trim" => "",
				"required" => "Vous devez accepter les conditions générales d'utilisation.",
			));
			$this->form_validation->set_rules("users_nickname", "users_nickname", "trim|required|min_length[2]|max_length[255]", array(
				"trim" => "",
				"required" => "Votre pseudo est obligatoire",
				"min_length" => "Votre pseudo est bien trop court.",
				"max_length" => "Votre pseudo est bien trop long."
			));
			if ($this->form_validation->run() == FALSE) {
				$data['message'] = validation_errors('', '<br />');
			} else {
				$users_token = md5(time());
				$data_insert = array(
					"users_gender" => $users_gender,
					"users_email" => $users_email,
					"users_date_insert" => date("Y-m-d H:i:s"),
					"users_nickname" => $users_nickname,
					"users_token" => $users_token,
				);
				$this->db->insert("users", $data_insert);
				$data['users_id'] = $this->db->insert_id();
				if (isset($data['users_id']) && $data['users_id'] > 0) {
					$data['result'] = true;
					$data['users_token'] = $users_token;
				}
			}
			$this->view($data);
		} else {
			$data['title'] = "Subscribe";
			$data['view'] = "pages/users/subscribe";
		}
	}

	public function forgetpassword()
	{
		$data['title'] = "Forget password ?";
		$data['view'] = "pages/users/forgetpassword";
		$this->view($data);
	}

	public function redefinedpassword()
	{

		$data['title'] = "Redefined Password";
		$data['view'] = "pages/users/redefinedpassword";
		$this->view($data);
	}

	public function purchase()
	{
		$data['title'] = "Purchase";
		$data['view'] = "pages/users/purchase";
		$this->view($data);
	}

	public function paiement()
	{
		$data['title'] = "Paiement";
		$data['view'] = "pages/users/paiement";
		$this->view($data);
	}
}

?>
