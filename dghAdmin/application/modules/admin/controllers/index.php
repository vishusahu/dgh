<?php

class index extends MX_Controller {

    function __construct() {

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library('encrypt');
        $this->load->helper('date');
    }

    public function index() {

       
        if ($this->input->post('signIn') == 'Sign In') { 
            $userLoginModel = $this->load->model('user_login_model');
            $userLoginModel = new user_login_model();
            $userLoginModel->set_email($this->input->post('username'));
            $userLoginModel->set_password($this->input->post('userpassword'));
            $login = $userLoginModel->login();
            
            if ($login != FALSE) {
                
					
                    $this->session->set_userdata($login);
                    redirect('admin/static-pages');
                
                
            } else {
                $this->session->set_userdata('msg', 'Invalid Username or password. Please try again');
               // redirect(base_url());
            }
        }
        $data['header'] = array('view' => 'templates/header', 'data' => $data);
        $data['main_content'] = array('view' => 'login', 'data' => $data);
        $this->load->view('templates/common_template', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
