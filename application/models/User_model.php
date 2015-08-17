<?php
class User_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function login($email, $password)
    {
        $this->db->select('user_id, profile_firstname, user_password');
        $this->db->from('ocr_user');
        $this->db->join('ocr_profile', 'user_id = profile_user_id');
        $this->db->where('user_email', $email);
        $this->db->where('user_password', MD5($password));

        $query = $this->db->get();

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
            'user_email' => $this->input->post('email'),
            'user_password' => MD5($this->input->post('password'))
            );

        $this->load->model('profile_model');
        $this->profile_model->set_profile($user_id);

        return $this->db->insert('ocr_user', $data);
    }

    public function get_last_user_id()
    {
        $query = $this->db->select_max('user_id')->get('ocr_user');
        $result = $query->row_array();

        if($result['user_id'] != null)
        {
          return (int)$result['user_id'] + 1;
        }
        else
        {
            return 1;
        }
    }
}
?>