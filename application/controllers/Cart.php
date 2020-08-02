<?php
    class Cart extends MY_Controller{
        function __construct()
		{
			parent:: __construct();
            $this->load->model('Pet_model');
            $this->load->library("cart");
		}

     
    function add()
    {
        //lay ra san pham muon them vao gio hang
    
        $id = $this->uri->rsegment(3);
        $id = strval($id);
        $product = $this->Pet_model->get_info($id);
        if(!$product)
        {
            redirect();
        }
        //tong so san pham
        $qty = 1;
        $price = $product->price;
        if($product->discount > 0)
        {
            $price = $product->price - $product->discount;
        }
        
        //thong tin them vao gio hang
        $data = array();
        $data['id'] = $product->id;
        $data['qty'] = $qty;
        $data['name'] = url_title($product->description);
        $data['image_link']  = $product->image;
        $data['price'] = $price;
        $this->cart->insert($data);
        
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url("shop"));
    }
    
    
    function index()
    {
        //thong gio hang
        $carts = $this->cart->contents();
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();
        
        $this->data['carts'] = $carts;
        $this->data['total_items']  =$total_items;
        
       // $this->data['temp']  ='pages/shop/header';
        $this->load->view('pages/shop/cart', $this->data);
    }
    
  
    function update()
    {
        //thong gio hang
        $carts = $this->cart->contents();
        foreach ($carts as $key => $row)
        {
            //tong so luong san pham
            $total_qty = $this->input->post('qty_'.$row['id']);
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data);
        }
        
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }
    
    
    function del(){

        $id = $this->uri->rsegment(3);
        $id = strval($id);
        //trường hợp xóa 1 sản phẩm nào đó trong giỏ hàng
        if($id){
            //thong gio hang
            $carts = $this->cart->contents();
            foreach ($carts as $key => $row)
            {
                if($row['id'] == $id)
                {
                    //tong so luong san pham
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data);
                }
            }
        }else{
            //xóa toàn bô giỏ hang
            $this->cart->destroy();
        }
        
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }
    public function remove(){
        $this->cart->destroy();
        redirect(base_url('cart'));
    }

    public function checkout(){
        
       
        $carts = $this->cart->contents();
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();
        
        $this->data['carts'] = $carts;
        $this->data['total_items']  =$total_items;
        $this->load->view('pages/shop/checkout', $this->data);
    }
    public function success(){

        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post()){
            //Nhap lieu chinh xacs
            if($this->form_validation->run()){
                //them vao database
  
                $name   = $this->input->post('customer_name');
                $toltal = $_POST['total'];
                
             
                $data = array(
                    'name'     => $name,
                    'total_price'    => $toltal
                   
                );

                $this->Trans_model->create($data);
            }
        }

        $this->cart->destroy();
        $carts = $this->cart->contents();
      
        $total_items = $this->cart->total_items();
        
        $this->data['carts'] = $carts;
        $this->data['total_items']  =$total_items;
        $this->load->view("pages/shop/success", $this->data);
    }
}
?>