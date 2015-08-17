<?php
class Customer_model extends CI_Model
{
    var $customer_id = "";

    public function __construct()
    {
        $this->load->database();
    }

    public function get_customer_id()
    {
        return $this->customer_id;
    }

    public function add_profile($user_id)
    {
        return ($this->set_customer() &&  $this->set_profile($user_id));
    }

    public function set_customer()
    {
        $this->customer_id = $this->get_last_customer_id();
        $profile_id = $this->get_last_profile_id();
        $data = array(
            'customer_id' => $this->customer_id,
            'customer_profile_id' => $profile_id
        );

        return $this->db->insert('ocr_customer', $data);
    }

    public function set_profile($user_id)
    {
        $profile_id = $this->get_last_profile_id();
        $data = array(
            'profile_id' => $profile_id,
            'profile_user_id' => $user_id,
            'profile_firstname' => $this->input->post('firstname'),
            'profile_lastname' => $this->input->post('lastname'),
            'profile_email' => $this->input->post('email'),
            'profile_contact_number' => $this->input->post('contact_number'),
            'profile_address' => $this->input->post('address'),
            'profile_facebook' => $this->input->post('facebook'),
            'profile_twitter' => $this->input->post('twitter'),
            'profile_instagram' => $this->input->post('instagram'),
            'profile_category' => 1
        );

        return $this->db->insert('ocr_profile', $data);
    }

    public function update_profile()
    {   
        $this->db->set('profile_firstname', $this->input->post('firstname'));
        $this->db->set('profile_lastname', $this->input->post('lastname'));
        $this->db->set('profile_email', $this->input->post('email'));
        $this->db->set('profile_contact_number', $this->input->post('contact_number'));
        $this->db->set('profile_address', $this->input->post('address'));
        $this->db->set('profile_facebook', $this->input->post('facebook'));
        $this->db->set('profile_twitter', $this->input->post('twitter'));
        $this->db->set('profile_instagram', $this->input->post('instagram'));
        $this->db->where('profile_id', $this->input->post('profile_id'));
        $this->db->update('ocr_profile');
    }

    public function get_profile($user_id ,$profile_id = FALSE)
    {

        if($profile_id === FALSE)
        {
            $this->db->select('profile_id, profile_user_id, profile_firstname, profile_lastname, profile_email, profile_contact_number, profile_address, profile_facebook, profile_twitter, profile_instagram');
            $this->db->where('profile_user_id' , $user_id);
            $this->db->where('profile_category', 1);

            $query = $this->db->get('ocr_profile');

            return $query->result_array();
        }

        $query = $this->db->get_where('ocr_profile', array('profile_id' => $profile_id, 'profile_user_id' => $user_id));        

        return $query->row_array();
    }

    public function get_last_profile_id()
    {
        $query = $this->db->select_max('profile_id')->get('ocr_profile');
        $result = $query->row_array();

        if($result['profile_id'] != null)
        {
          return (int)$result['profile_id'] + 1;
        }
        else
        {
            return 1;
        }
    }

    public function get_last_customer_id()
    {
        $query = $this->db->select_max('customer_id')->get('ocr_customer');
        $result = $query->row_array();

        if($result['customer_id'] != null)
        {
          return (int)$result['customer_id'] + 1;
        }
        else
        {
            return 1;
        }
    }    
}
?>