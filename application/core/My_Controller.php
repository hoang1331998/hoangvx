<?php

class MY_Controller extends CI_Controller{

    // bien gui du lieu qua view
    public $data = array();
    function __construct(){
        // ke thua tu CI_Controller
        parent::__construct();
        $this->load->library(array('form_validation','session'));

        $controller = $this->uri->segment(1);
        switch($controller){
            case 'admin':
            {
                $this->_check_login();
                break;
            }
            case 'home':
            {
                $this->load->view('home');
            }
            default:
            {
                //xu ly ngoai
            }
        }
    }
    private function _check_login(){

        $controller = $this->uri->rsegment('1');// lay ra controller admin
        $controller = strtolower($controller);// ep kieu ve dang chu thuong
        $login = $this->session->userdata('login');

        if( !$login && $controller != 'login' ){

            redirect(base_url('login'));
        }

        if( $login && $controller == 'login'){

            redirect(base_url('admin'));
        }
    }
}