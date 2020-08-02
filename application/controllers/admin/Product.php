<?php

class Product extends CI_Controller{
    
    function __construct(){
        parent:: __construct();
        $this->load->model('Pet_model');
        $this->load->model('User_model');
    }

    function index(){
        $data = array();
		$data['pets'] = $this->Pet_model->getLastestPet();
        $data['role'] = $this->User_model->getRoleByUsername($this->session->userdata('login'));

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/product/index';    
        $this->load->view('pages/admin/product/list_pet',$data,$this->data);
    }

    function check_id(){

        $id = $this->input->post('id');
        $where = array('id' => $id);
        if($this->Pet_model->check_exists($where)){

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
        //neu co du lieu up len thi kiem tra
        if($this->input->post()){
            $this->form_validation->set_rules('id','id','required|max_length[11]|callback_check_id');

            //Nhap lieu chinh xacs
            if($this->form_validation->run()){
                //them vao database
                $this->load->library('upload_library');
                $upload_path = 'assets/img/pet';
                $upload_data = $this->upload_library->upload($upload_path, 'image');  
                $image = '';
                if(isset($upload_data['file_name']))
                {
                    $image = $upload_data['file_name'];
                }
                $id     = $this->input->post('id');
                $age    = $this->input->post('age');
                $description = $_POST['description'];
                $price  = $this->input->post('price');
                $price  = str_replace(',', '', $price);
                $species_id = $_POST['species_id'];
                $gender = $_POST['gender'];
                $sale_id = $_POST['sale_id'];
                $data = array(
                    'id'     => $id,
                    'age'    => $age,
                    'description' => $description,
                    'price'  => $price,
                    'species_id' => $species_id,
                    'gender' => $gender,
                    'sale_id' => $sale_id,
                    'image' => $image,
                );

                if($this->Pet_model->create($data)){
                    $this->session->set_flashdata('message','Insert Successfully !!!');
                }else{
                    $this->session->set_flashdata('message','insert Failed !!!');
                }
                // chuyen thong bao den trang admin
                redirect(base_url('admin/product'));
            }
        }
        $data = array();
        $data['role'] = $this->User_model->getRoleByUsername($this->session->userdata('login'));

        $this->data['temp'] = 'admin/product/create';
        $this->load->view('pages/admin/product/add_pet',$data,$this->data);
    }

    function edit(){
       
        $id = $this->uri->rsegment('3');
        $id = strval($id);
        $Pet = $this->Pet_model->get_info($id);
        if(!$Pet)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'This product is not exist');
            redirect(base_url('admin/product'));
        }
        $this->data['Pet'] = $Pet;
        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post()){
            $this->form_validation->set_rules('id','id','required|max_length[11]');

            //Nhap lieu chinh xacs
            if($this->form_validation->run()){
                //them vao database
                $this->load->library('upload_library');
                $upload_path = 'assets/img/pet';
                $upload_data = $this->upload_library->upload($upload_path, 'image');  
                $image = '';
                if(isset($upload_data['file_name']))
                {
                    $image = $upload_data['file_name'];
                }
                $id     = $this->input->post('id');
                $age    = $this->input->post('age');
                $description = $_POST['description'];
                $price  = $this->input->post('price');
                $price  = str_replace(',', '', $price);
                $species_id = $_POST['species_id'];
                $gender = $_POST['gender'];
                $sale_id = $_POST['sale_id'];
                $data = array(
                    'id'     => $id,
                    'age'    => $age,
                    'description' => $description,
                    'price'  => $price,
                    'species_id' => $species_id,
                    'gender' => $gender,
                    'sale_id' => $sale_id,
                    'image' => $image,
                );

                if($this->Pet_model->update($Pet->id,$data)){
                    $this->session->set_flashdata('message','Edit Successfully !!');
                }else{
                    $this->session->set_flashdata('message','Edit failed');
                }
                // chuyen thong bao den trang admin
                redirect(base_url('admin/product'));
            }
        }
        $Dat = array();
        $Dat['role'] = $this->User_model->getRoleByUsername($this->session->userdata('login'));

        $this->data['temp'] = 'admin/product/edit';
        $this->load->view('pages/admin/product/edit_pet',$Dat + $this->data);
    }

    

    function delete($id){

        $id = $this->uri->rsegment('3');
        $id = strval($id);
        
        
        $info = $this->Pet_model->get_info($id);
        if(!$info){

            $this->session->set_flashdata('message','This pet is not exist !!! ');
            redirect(base_url('admin/product'));
        }
        // xoa du lieu
        $this->Pet_model->delete_pet_id($id);
        $this->session->set_flashdata('message', 'Delete successfully !!!');
        redirect(base_url('admin/product'));
    }
}
?>