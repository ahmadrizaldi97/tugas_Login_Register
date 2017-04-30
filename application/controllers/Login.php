<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('loginmodel');
	}

	 function index()
	 {
	   $this->load->view('loginview');
	 
	 }

	 public function ceklogin()
	 {
	 	//This method will have the credentials validation
	   $this->load->library('form_validation');
	 
	   $this->form_validation->set_rules('username', 'Username', 'trim|required');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
	 
	   if($this->form_validation->run() == FALSE)
	   {
	     //Field validation failed.  User redirected to login page
	     $this->load->view('loginview');
	   }
	   else
	   {
	     //Go to private area
	     redirect('pegawai', 'refresh');
	   }
	 }
	 
	 function check_database($password)
	 {
	   //Field validation succeeded.  Validate against database
	   $username = $this->input->post('username');
	 
	   //query the database
	   $result = $this->loginmodel->login($username, $password);
	 
	   if($result)
	   {
	     $sess_array = array();
	     foreach($result as $row)
	     {
	       $sess_array = array(
	         'id' => $row->id,
	         'username' => $row->username
	       );
	       $this->session->set_userdata('logged_in', $sess_array);
	     }
	     return TRUE;
	   }
	   else
	   {
	     $this->form_validation->set_message('check_database', 'Invalid username or password');
	     return false;
	   }
	 }

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
	    session_destroy();
	    redirect('pegawai', 'refresh');
	}

	public function register()
	{

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[conf_password]');
		$this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registerview');
		} else {
			$this->loginmodel->insert();
			echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
			$this->load->view('loginview');
		}
	}

	


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
 ?>