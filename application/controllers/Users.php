<?php
class Users extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('users_model');
            $this->load->helper('url_helper');
            $this->load->helper('url');
        }

        public function login($user_id="tst", $password="pwd")
        {
        	$user_id = $this->input->post('user_name');
        	$password = $this->input->post('user_pwd');

            $res = $this->users_model->login($user_id, $password); 

            if($res == false){
				redirect("/pages/view/loginfail"); 

            }else{
            	$user_info = $res[0];
            	$newdata = array(
		        'username'  => $user_info->Name,
		        'user_id'  => $user_info->UsrId,
		        'logged_in' => TRUE);

				$this->session->set_userdata($newdata);
            }
			redirect("/pages/view");
	   }

	   public function logout(){
            $array_items = array('username', 'user_id', 'logged_in');

			$this->session->unset_userdata($array_items);
			redirect("/pages/view");	   	
	   }

}