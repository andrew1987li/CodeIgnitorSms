<?php
class Pages extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
                $this->load->helper('url_helper');
        }



        public function view($page = 'home')
        {

            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter
	        $sess_id = $this->session->userdata('logged_in');

           if(!empty($sess_id) && $sess_id == TRUE)
           {
                $data['view_msg'] ="Hi,".$this->session->userdata('username');
           }else{
                $data['view_msg'] = "Please log in to use all functions";
           }

	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/'.$page, $data);
	        $this->load->view('templates/footer', $data);
	    }
}