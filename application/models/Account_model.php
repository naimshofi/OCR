<?php
class Account_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function login($email, $password)
    {
        $this->db->select('user_id, user_firstname, user_password');
        $this->db->where('user_email', $email);
        $this->db->where('user_password', MD5($password));

        $query = $this->db->get('ocr_user');

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function set_user()
    {
        $user_id = $this->get_last_user_id();

        $data = array(
          'user_id' => $user_id,
          'user_firstname' => $this->input->post('firstname'),
          'user_lastname' => $this->input->post('lastname'),
          'user_email' => $this->input->post('email'),
          'user_password' => MD5($this->input->post('password'))
          );

        return $this->db->insert('ocr_user', $data);
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
        $this->db->select('profile_id, profile_contact_number, profile_facebook, profile_twitter, profile_instagram, profile_address');
        $this->db->from('ocr_user_profile');
        $this->db->join('ocr_user', 'ocr_user.user_id = ocr_user_profile.profile_user_id');
        $this->db->where('profile_user_id', $user_id);

        $query = $this->db->get();
        return $query->row_array();
    }
}
?>