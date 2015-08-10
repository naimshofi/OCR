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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
    	parent::__construct();
    	//call model
    	$this->load->model('user_model');
    }

	public function index()
	{
		redirect('/user/login/');
	}

	public function is_logged_in()
	{
		if($this->session->userdata('logged_in')){
			redirect('/main/');
		}
	}

	public function login()
	{
		$this->is_logged_in();

		$data['is_logged_in'] = $this->session->userdata('logged_in');
		$data['page_title'] = "Login";
		$data['page_desc'] = "Please log in to your account to continue.";

		//User still not logged in == no session
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('password', 'password', 'required|trim|callback_check_login');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('layout/header', $data);
			$this->load->view('user/login', $data);
			$this->load->view('layout/footer');
		}
		else
		{
			redirect('/main/');
		}		
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('/user/login/');
	}

	public function register()
	{
		$this->is_logged_in();
		
		$data['is_logged_in'] = $this->session->userdata('logged_in');
		$data['page_title'] = "Register";
		$data['page_desc'] = "Please enter your correct informations.";

		$this->load->helper('form');
	    $this->load->library('form_validation');

	    $this->form_validation->set_rules('firstname', 'Firstname', 'required');
	    $this->form_validation->set_rules('lastname', 'Lastname', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');

	    if ($this->form_validation->run() === FALSE)
	    {
			$this->load->view('layout/header', $data);
			$this->load->view('user/register', $data);
			$this->load->view('layout/footer');	    
		}
	    else
	    {
	        $this->user_model->set_user();
	        redirect('/user/login/');	
	    }
	}

	public function forgot()
	{
		$this->load->view('user/forgot_password');
	}

	public function check_login()
	{
		$result = $this->user_model->login($this->input->post('email'),$this->input->post('password'));

		if($result)
		{
			$sess_array = array();
			foreach ($result as $row) 
			{
				$sess_array = array(
					'id' => $row->user_id,
					'firstname' => $row->user_firstname
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_login','Invalid email or password');
			return FALSE;
		}
	}
}