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

    public function update_product()
    {   
        $this->db->set('product_name', $this->input->post('product_name'));
        $this->db->set('product_price', $this->input->post('product_price'));
        $this->db->set('product_desc', $this->input->post('product_desc'));
        $this->db->where('product_id', $this->input->post('product_id'));
        $this->db->update('ocr_product');
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

    public function get_product($user_id, $product_id = FALSE)
    {
        $this->db->select('product_id, product_name, product_price, product_desc');
        $this->db->from('ocr_product');

        if($product_id === FALSE)
        {            
            $this->db->where('product_user_id', $user_id);        

            $query = $this->db->get();

            return $query->result_array();
        }

        $this->db->where('product_user_id', $user_id);
        $this->db->where('product_id', $product_id);

        $query = $this->db->get();

        return $query->row_array();        
    }
}
?>