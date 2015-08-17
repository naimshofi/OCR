<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

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
    	$this->load->model('customer_model');
    }

	public function index()
	{
		$this->not_logged_in();

		$result = $this->customer_model->get_profile($this->session->userdata['logged_in']['id'], FALSE);

		$data['profile'] = $result;
		$data['is_logged_in'] = $this->session->userdata('logged_in');
		$data['page_title'] = "Customer Profile";
		$data['page_desc'] = "This is all your customers recorded.";

		$this->load->view('layout/header', $data);
		$this->load->view('customer/view_all');
		$this->load->view('layout/footer');
	}

	public function not_logged_in()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect('/user/login/');
		}
	}

	public function view_profile($profile_id = NULL)
	{
		$this->not_logged_in();

		$result = $this->customer_model->get_profile($this->session->userdata['logged_in']['id'], $profile_id);

		$data['profile'] = $result;
		$data['is_logged_in'] = $this->session->userdata('logged_in');
		$data['page_title'] = "Customer Profile";
		$data['page_desc'] = "This is the customer profile informations.";
		$data['gravatar_url'] = md5(strtolower(trim($data['profile']['profile_email'])));

		$this->load->view('layout/header', $data);
		$this->load->view('customer/view_profile');
		$this->load->view('layout/footer');
	}

	public function add_profile()
	{
		$this->not_logged_in();

		$data['is_logged_in'] = $this->session->userdata('logged_in');
		$data['page_title'] = "Add Customer Profile";
		$data['page_desc'] = "PLease enter your customer informations.";

	    $this->load->library('form_validation');
	    $this->form_validation->set_error_delimiters('<div class="status alert alert-danger">', '</div>');

	    $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
	    $this->form_validation->set_rules('contact_number', 'Contact Number', 'trim|numeric|max_length[15]');

	    if ($this->form_validation->run() === FALSE)
	    {
			$this->load->view('layout/header', $data);
			$this->load->view('customer/add_profile');
			$this->load->view('layout/footer');	    
		}
	    else
	    {	        
	        if($this->input->post('save'))
	        {
	        	$this->customer_model->add_profile($this->session->userdata['logged_in']['id']);
	        	redirect('/customer/');
	        }
	        else if($this->input->post('continue'))
	        {
	        	$this->customer_model->add_profile($this->session->userdata['logged_in']['id']);
	        	redirect('/sell/add/'.$this->customer_model->get_customer_id());
	        }
	    }
	}

	public function update_profile($profile_id = NULL)
	{
	    $this->not_logged_in();

	    $result = $this->customer_model->get_profile($this->session->userdata['logged_in']['id'], $profile_id);

		$data['profile'] = $result;		
		$data['is_logged_in'] = $this->session->userdata('logged_in');
		$data['page_title'] = "Update Customer Profile";
		$data['page_desc'] = "Please add or update your customer profile informations.";	

	    $this->load->library('form_validation');
	    $this->form_validation->set_error_delimiters('<div class="status alert alert-danger">', '</div>');

	    $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
	    $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
	    $this->form_validation->set_rules('contact_number', 'Contact Number', 'trim|numeric|max_length[15]');

	    if ($this->form_validation->run() === FALSE)
	    {
			$this->load->view('layout/header', $data);
			$this->load->view('customer/update_profile');
			$this->load->view('layout/footer');	    
		}
	    else
	    {
	        $this->customer_model->update_profile();
	        $url = "/customer/view_profile/".$this->input->post('profile_id');

	        redirect($url);	
	    }
	}
}