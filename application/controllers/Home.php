<?php
	class Home extends CI_Controller{

		function __construct(){
			parent:: __construct();
			$this->load->model('Pet_model');
			$this->load->library("cart");
		}

		public function index(){	
		
			$this->data['pets'] = $this->Pet_model->getLastestPet();
			$carts = $this->cart->contents();
			//tong so san pham co trong gio hang
			$total_items = $this->cart->total_items();
			
			$this->data['carts'] = $carts;
			$this->data['total_items']  =$total_items;
			$this->data['temp']  ='pages/shop/header';
			$this->load->view('pages/home', $this->data);
		}
	}