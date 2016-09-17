<?php
class Smsmsg_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }
    
    public function get_smsmsg($all_flag = TRUE)
	{
        $this->db->from('tb_recsms');
        $this->db->order_by("No", "desc");
        $this->db->limit(10, 0);
        $query = $this->db->get(); 
        return $query->result_array();
        /*
        if ($all_flag === TRUE)
        {
                $this->db->from('tb_recsms');
                $this->db->order_by("No", "desc");
                $this->db->limit(10, 0);
                $query = $this->db->get(); 
                return $query->result_array();
                /*
                $query = $this->db->get('tb_recsms');
                return $query->result_array();
               
        }

        $query = $this->db->get_where('tb_recsms', array('NewSms' => 0));
        return $query->row_array();
        */
	}
}