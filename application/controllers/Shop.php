<?php
	class Shop extends MY_Controller{

		function __construct()
		{
			parent:: __construct();
			$this->load->model('Pet_model');
			$this->load->helper("url");
			$this->load->library('cart');
			$this->load->model('Catalog_model');
		}

		public function index(){
			

			$input = array();
			$input['where'] = array('tt' => '0');
			$total_rows = $this->Pet_model->get_total($input);
			
			$this->data['total_rows'] = $total_rows;
			
			//load ra thu vien phan trang
			$this->load->library('pagination');
			$config = array();
			$config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
			$config['base_url']   = base_url('shop/index'); //link hien thi ra danh sach san pham
			$config['per_page']   = 6;//so luong san pham hien thi tren 1 trang
			$config['uri_segment'] = 3;//phan doan hien thi ra so trang tren url

			$config['cur_tag_open'] = '<li > <a class="active">';
			$config['cur_tag_close'] = '</a></li>';
		
		
			//khoi tao cac cau hinh phan trang
			$this->pagination->initialize($config);
			
			$segment = $this->uri->segment(3);
			$segment = intval($segment);
			$input['limit'] = array($config['per_page'], $segment);
			$input['where'] = array('tt' => '0');
			//lay danh sach san pham
			$list = $this->Pet_model->get_list($input);
			$this->data['list'] = $list;
			
			$links = $this->pagination->create_links();
			$lks=$links;
			$lks = '<ul>'.$links;
			$lks = str_replace('<a hr', '<li><a hr' , $lks);
			$lks = str_replace('</a>', '</a></li>' , $lks);
			$lks .= '</ul>';
			$this->data["links"] = $lks;
			// $data = array();
			// $data['pets'] = $this->Pet_model->getLastestPet();
			// $data['petsale'] = $this->Pet_model->getPetSale();
			$carts = $this->cart->contents();
			//tong so san pham co trong gio hang
			$total_items = $this->cart->total_items();
			
			$this->data['carts'] = $carts;
			$this->data['total_items']  =$total_items;
			$this->data['species'] = $this->Catalog_model->getall();
			$this->data['temp'] = 'pages/shop/layout/left';
			$this->load->view('pages/shop/shop',$this->data);
		}
		
		public function pet_detail(){
        
			$id = $this->uri->rsegment('3');
			$id = strval($id);
			$Pet = $this->Pet_model->getInfoPet($id);
			
			$carts = $this->cart->contents();
			//tong so san pham co trong gio hang
			$total_items = $this->cart->total_items();
			
			$this->data['carts'] = $carts;
			$this->data['total_items']  =$total_items;	
			$this->data['Pett'] = $Pet;
			$this->data['species'] = $this->Catalog_model->getall();
			$this->data['temp'] = 'pages/shop/layout/left';
			$this->load->view('pages/shop/product_detail',$this->data);
		}

		public function cart(){
			$id = $this->uri->rsegment('3');
			$id = strval($id);
            $Pet = $this->Pet_model->getInfoPet($id);
           
		
            $this->data['Pett'] = $Pet;
			//$this->data['temp'] = 'cart/index';
			$this->data['species'] = $this->Catalog_model->getall();
			$this->data['temp'] = 'pages/shop/layout/left';
            $this->load->view('pages/shop/cart',$this->data);
		}

		public function catalog(){

			$id = intval($this->uri->rsegment(3));
			$input = array();
			$input['where'] = array('tt' => '0','species_id' =>$id);
			$total_rows = $this->Pet_model->get_total($input);
			$this->data['total_rows'] = $total_rows;
			
			//load ra thu vien phan trang
			$this->load->library('pagination');
			$config = array();
			$config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
			$config['base_url']   = base_url('shop/catalog'); //link hien thi ra danh sach san pham
			$config['per_page']   = 6;//so luong san pham hien thi tren 1 trang
			$config['uri_segment'] = 3;//phan doan hien thi ra so trang tren url

			$config['cur_tag_open'] = '<li > <a class="active">';
			$config['cur_tag_close'] = '</a></li>';
		
		
			//khoi tao cac cau hinh phan trang
			$this->pagination->initialize($config);
			
			$segment = $this->uri->segment(3);
			$segment = intval($segment);
			$input['limit'] = array($config['per_page'], $segment);
			$input['where'] = array('tt' => '0','species_id' =>$id);
			//lay danh sach san pham
			$list = $this->Pet_model->get_list($input);
			$this->data['list'] = $list;
			
			$links = $this->pagination->create_links();
			$lks=$links;
			$lks = '<ul>'.$links;
			$lks = str_replace('<a hr', '<li><a hr' , $lks);
			$lks = str_replace('</a>', '</a></li>' , $lks);
			$lks .= '</ul>';
			$this->data["links"] = $lks;
			$carts = $this->cart->contents();
			//tong so san pham co trong gio hang
			$total_items = $this->cart->total_items();
			
			$this->data['carts'] = $carts;
			$this->data['total_items']  =$total_items;
			$this->data['species'] = $this->Catalog_model->getall();
			// $data = array();
			// $data['pets'] = $this->Pet_model->getLastestPet();
			// $data['petsale'] = $this->Pet_model->getPetSale();
			$this->data['temp'] = 'pages/shop/layout/left';
			$this->load->view('pages/shop/shop',$this->data);
		}
	}