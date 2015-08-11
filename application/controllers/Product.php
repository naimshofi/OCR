<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
    	$this->load->model('product_model');
    }

	public function index()
	{
		redirect('/product/add/');
	}

	public function not_logged_in()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect('/user/login/');
		}
	}

	public function view_all()
	{
		$this->not_logged_in();

		$result = $this->product_model->get_all_product($this->session->userdata['logged_in']['id']);

		$data['product'] = $result;
		$data['is_logged_in'] = $this->session->userdata('logged_in');
		$data['page_title'] = "All My Product";
		$data['page_desc'] = "This is the product informations that you have recorded.";

		$this->load->view('layout/header', $data);
		$this->load->view('product/view_all');
		$this->load->view('layout/footer');

	}	

	public function add()
	{
		$this->not_logged_in();

		$data['is_logged_in'] = $this->session->userdata('logged_in');
		$data['page_title'] = "Add Your Product";
		$data['page_desc'] = "Insert the product you are selling. This record will be used when you enter your selling record for the customer.";

		$this->load->library('form_validation');
	    $this->form_validation->set_error_delimiters('<div class="status alert alert-danger">', '</div>');

	    $this->form_validation->set_rules('product_name', 'Product name', 'required');
	    $this->form_validation->set_rules('product_price', 'Product price', 'required|callback_regex_match');

	   	if ($this->form_validation->run() === FALSE)
	   	{
	   		$this->load->view('layout/header', $data);
			$this->load->view('product/add');
			$this->load->view('layout/footer');
	   	}
	   	else
	   	{
	   		$this->product_model->set_product($this->session->userdata['logged_in']['id']);
	   		redirect('/product/view_all/');
	   	}		
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

	public function regex_match($str)
	{
		if(1 === preg_match("/\b\d{1,3}(?:\.\d{2})\b/", $str))
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('regex_match','The %s field is not valid price format');
			return FALSE;
		}
	}
}