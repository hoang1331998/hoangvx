<?php

class Product extends MY_Controller{

    function __construct(){
        parent:: __construct();
        $this->load->model('Pet_model');
        $this->load->model('User_model');
    }


}
?>