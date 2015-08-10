<?php
class User_model extends CI_Model
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