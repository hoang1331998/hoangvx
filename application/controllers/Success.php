<?php
    class Success extends MY_Controller{

        function __construct()
		{
			parent:: __construct();
			$this->load->model('Pet_model');
		}


        function index(){          
            $this->load->view('pages/shop/layout/submit');
        }
    }
?>