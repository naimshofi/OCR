<?php
class Account_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function set_user_profile($user_id)
    {
        $profile_id = $this->get_last_profile_id();

        $data = array(
            'profile_id' => $profile_id,
            'profile_user_id' => $user_id,
            'profile_firstname' => $this->input->post('firstname'),
            'profile_lastname' => $this->input->post('lastname')
            );

        return $this->db->insert('ocr_user_profile', $data);
    }

    public function update_user_profile($user_id)
    {   
        $this->db->set('profile_firstname', $this->input->post('firstname'));
        $this->db->set('profile_lastname', $this->input->post('lastname'));
        $this->db->set('profile_contact_number', $this->input->post('contact_number'));
        $this->db->set('profile_address', $this->input->post('address'));
        $this->db->set('profile_facebook', $this->input->post('facebook'));
        $this->db->set('profile_twitter', $this->input->post('twitter'));
        $this->db->set('profile_instagram', $this->input->post('instagram'));
        $this->db->where('profile_user_id', $user_id);
        $this->db->update('ocr_user_profile');
    }

    public function get_last_profile_id()
    {
        $query = $this->db->select_max('profile_id')->get('ocr_user_profile');
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

    public function get_user_profile($user_id)
    {
        $this->db->select('user_email, profile_id, profile_firstname, profile_lastname, profile_contact_number, profile_facebook, profile_twitter, profile_instagram, profile_address');
        $this->db->from('ocr_user_profile');
        $this->db->join('ocr_user', 'ocr_user.user_id = ocr_user_profile.profile_user_id');
        $this->db->where('profile_user_id', $user_id);        

        $query = $this->db->get();
        return $query->row_array();
    }
}
?>