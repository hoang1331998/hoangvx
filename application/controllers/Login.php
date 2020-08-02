<?php

class Login extends MY_Controller{

    
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('form', 'url', 'cookie'));     

        $this->load->model('User_model');
    }

    function index(){   
      
        if($this->session->userdata('login')){
           
            redirect(base_url('admin'));
            
        }else{
            
            if($this->input->post()){

                $this->form_validation->set_rules('login','Login','callback_check_login');
                if($this->form_validation->run()){

                    $info = $this->input->post('username');                   
                   
                    $this->session->set_userdata('login',$info);

                    redirect(base_url('admin',$info));
                }
            }
            
            $this->load->view('pages/admin/login');
        }     
    }

    function check_login(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // $password = md5($password);

        
        $where = array('username'=>$username, 'password'=>$password);

        if($this->User_model->check_exists($where)){

            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Username or Password not exists !!!');
        return false;      
    }
    function logout(){

        if($this->session->userdata('login')){

            $this->session->unset_userdata('login');
            session_unset('login');
            session_destroy();
        }
        redirect(base_url('login'));
    }
}