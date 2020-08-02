<?php

class Home extends My_Controller{

    function __construct(){
        parent:: __construct();
        $this->load->model('User_model');   
    }

    function index(){
        $data = array();
        $data['role'] = $this->User_model->getRoleByUsername($this->session->userdata('login'));
       
        if($this->session->userdata('login')){
            // if($Role == 0){
                $this->load->view('pages/admin/home_admin',$data,$this->data);
            // }   
            // else{
            //     echo "Ban ko co quyen gi ca";
            // }      
        }
        else{
            redirect(base_url('login'));
        }
        
    }

   
}
?>