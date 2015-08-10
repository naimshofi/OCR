<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

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
    	$this->load->model('account_model');
    }

	public function index()
	{
		redirect('/account/profile/');
	}

	public function not_logged_in()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect('/user/login/');
		}
	}

	public function profile()
	{
		$this->not_logged_in();

		$result = $this->account_model->get_user_profile($this->session->userdata['logged_in']['id']);

		$data['profile'] = $result;
		$data['is_logged_in'] = $this->session->userdata('logged_in');
		$data['page_title'] = "User Profile";
		$data['page_desc'] = "This is the user profile informations.";

		$this->load->view('layout/header', $data);
		$this->load->view('user/profile');
		$this->load->view('layout/footer');
	}

	public function update()
	{
	    $this->not_logged_in();

	    $result = $this->account_model->get_user_profile($this->session->userdata['logged_in']['id']);

		$data['profile'] = $result;		
		$data['is_logged_in'] = $this->session->userdata('logged_in');
		$data['page_title'] = "Update User Profile";
		$data['page_desc'] = "Please add or update your profile informations.";	

	    $this->load->library('form_validation');
	    $this->form_validation->set_error_delimiters('<div class="status alert alert-danger">', '</div>');

	    $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
	    $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
	    $this->form_validation->set_rules('email', 'Email', 'trim|required');
	    $this->form_validation->set_rules('contact_number', 'Contact Number', 'trim|numeric|max_length[15]');

	    if ($this->form_validation->run() === FALSE)
	    {
			$this->load->view('layout/header', $data);
			$this->load->view('user/update_profile');
			$this->load->view('layout/footer');	    
		}
	    else
	    {
	        $this->account_model->update_user_profile($this->session->userdata['logged_in']['id']);
	        redirect('/account/profile/');	
	    }
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