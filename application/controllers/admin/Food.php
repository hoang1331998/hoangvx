<?php
    class Food extends MY_Controller{

        function __construct()
        {
            parent::__construct();
            $this->load->model('Food_model');
            $this->load->model('User_model');  
        }

        function index(){
            $data = array();
            $data['Food'] = $this->Food_model->getInfoFood();
            $data['role'] = $this->User_model->getRoleByUsername($this->session->userdata('login'));

            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $this->data['temp'] = 'admin/food/index';
            $this->load->view('pages/admin/food/list_food',$data,$this->data);
        }

        function check_id(){

            $id = $this->input->post('id');
            $where = array('id' => $id);
            if($this->Food_model->check_exists($where)){
    
                //tra ve thong bao loi
                $this->form_validation->set_message(__FUNCTION__,'This id already exists');
                return false;
            }else{
                return true;
            }
        }
        function create(){
         
            $this->load->library('form_validation');
            $this->load->helper('form');
           
            if($this->input->post()){
                $this->form_validation->set_rules('id','id','required|max_length[11]|callback_check_id');
    
                if($this->form_validation->run()){
                   
                    $this->load->library('upload_library');
                    $upload_path = 'assets/img/item';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');  
                    $image = '';
                    if(isset($upload_data['file_name']))
                    {
                        $image = $upload_data['file_name'];
                    }
                    $id     = $this->input->post('id');
                    $name   = $this->input->post('name');
                    $quantity = $this->input->post('quantity');
                    $price  = $this->input->post('price');
                    $price  = str_replace(',', '', $price);
                    $species_id = $_POST['species_id'];
                    
                    $data = array(
                        'id'     => $id,
                        'name'    => $name,
                        'price'  => $price,
                        'species_id' => $species_id,
                        'quantity' => $quantity,                       
                        'image' => $image,
                    );
    
                    if($this->Food_model->create($data)){
                        $this->session->set_flashdata('message','Insert Successfully !!!');
                    }else{
                        $this->session->set_flashdata('message','insert Failed !!!');
                    }
                    // chuyen thong bao den trang admin
                    redirect(base_url('admin/food'));
                }
            }
            $data = array();
            $data['role'] = $this->User_model->getRoleByUsername($this->session->userdata('login'));

            $this->data['temp'] = 'admin/food/create';
            $this->load->view('pages/admin/food/add_food',$data,$this->data);
        }
    
        function edit(){
            
            $id = $this->uri->rsegment('3');
            $id = strval($id);
            $Food= $this->Food_model->get_info($id);
            if(!$Food)
            {
                
                $this->session->set_flashdata('message', 'This product is not exist');
                redirect(base_url('admin/food'));
            }
            $this->data['Food'] = $Food;
    
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post()){
                $this->form_validation->set_rules('id','id','required|max_length[11]');
    
                
                if($this->form_validation->run()){
                    
                    $this->load->library('upload_library');
                    $upload_path = 'assets/img/food';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');  
                    $image = '';
                    if(isset($upload_data['file_name']))
                    {
                        $image = $upload_data['file_name'];
                    }
                    $id     = $this->input->post('id');
                    $name   = $this->input->post('name');
                    $quantity = $this->input->post('quantity');
                    $price  = $this->input->post('price');
                    $price  = str_replace(',', '', $price);
                    $species_id = $_POST['species_id'];
                    
                    $data = array(
                        'id'     => $id,
                        'name'    => $name,
                        'price'  => $price,
                        'species_id' => $species_id,
                        'quantity' => $quantity,                       
                        'image' => $image,
                    );
    
                    if($this->Food_model->update($Food->id,$data)){
                        $this->session->set_flashdata('message','Edit Successfully !!');
                    }else{
                        $this->session->set_flashdata('message','Edit failed');
                    }
                    // chuyen thong bao den trang admin
                    redirect(base_url('admin/food'));
                }
            }
            $Data = array();
            $Data['role'] = $this->User_model->getRoleByUsername($this->session->userdata('login'));

            $this->data['temp'] = 'admin/food/edit';
            $this->load->view('pages/admin/food/edit_food',$Data+$this->data);
        }
    
        
    
        function delete($id){
    
            $id = $this->uri->rsegment('3');
            $id = strval($id);
            
            
            $info = $this->Food_model->get_info($id);
            if(!$info){
    
                $this->session->set_flashdata('message','This pet is not exist !!! ');
                redirect(base_url('admin/food'));
            }
            // xoa du lieu
            $this->Food_model->delete_food_id($id);
            $this->session->set_flashdata('message', 'Delete successfully !!!');
            redirect(base_url('admin/food'));
        }
    }
?>