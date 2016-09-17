<?php
class Users_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function login($user_id, $password)
	{
        $pwd = md5($password);
        //$pwd = $password;
        $sql = "select * from tb_user where UsrId=? and Pwd=?";
        $query = $this->db->query($sql, array($user_id, $pwd));

        if($query->num_rows() == 1){
            //die("TTTTT");
            return $query->result();
        }
        else {
            return false;
        }
	}
}