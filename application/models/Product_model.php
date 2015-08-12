<?php
class Product_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function set_product($user_id)
    {
        $product_id = $this->get_last_product_id();

        $data = array(
            'product_id' => $product_id,
            'product_name' => $this->input->post('product_name'),
            'product_price' => $this->input->post('product_price'),
            'product_desc' => $this->input->post('product_desc'),
            'product_user_id' => $user_id
            );

        return $this->db->insert('ocr_product', $data);
    }

    public function update_profile($user_id)
    {   
        $this->db->set('profile_firstname', $this->input->post('firstname'));
        $this->db->set('profile_lastname', $this->input->post('lastname'));
        $this->db->set('profile_contact_number', $this->input->post('contact_number'));
        $this->db->set('profile_address', $this->input->post('address'));
        $this->db->set('profile_facebook', $this->input->post('facebook'));
        $this->db->set('profile_twitter', $this->input->post('twitter'));
        $this->db->set('profile_instagram', $this->input->post('instagram'));
        $this->db->where('profile_user_id', $user_id);
        $this->db->update('ocr_profile');
    }

    public function get_last_product_id()
    {
        $query = $this->db->select_max('product_id')->get('ocr_product');
        $result = $query->row_array();

        if($result['product_id'] != null)
        {
          return (int)$result['product_id'] + 1;
        }
        else
        {
            return 1;
        }
    }

    public function get_all_product($user_id)
    {
        $this->db->select('product_id, product_name, product_price, product_desc');
        $this->db->from('ocr_product');
        $this->db->where('product_user_id', $user_id);        

        $query = $this->db->get();
        return $query->result_array();
    }
}
?>