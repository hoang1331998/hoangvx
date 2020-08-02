<?php

class Species extends MY_Controller{
    
    function __construct(){
        parent:: __construct();
        $this->load->model('Catalog_model');
        $this->load->model('User_model');
    }

    function index(){
       
		$this->data['species'] = $this->Catalog_model->getall();
      
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['role'] = $this->User_model->getRoleByUsername($this->session->userdata('login'));
        $this->data['temp'] = 'admin/employee/index';    
        $this->load->view('pages/admin/species/index',$this->data);
    }

    function check_id(){

        $id = $this->input->post('id');
        $where = array('id' => $id);
        if($this->Catalog_model->check_exists($where)){

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
            $this->form_validation->set_rules('name','name','required');
          
            
            //Nhap lieu chinh xacs
            if($this->form_validation->run()){
                //them vao database
                $this->load->library('upload_library');
              
              
              
                $id     = $this->input->post('id');
                $name   = $this->input->post('name');
                
                $data = array(
                    'id'     => $id,      
                    'name'   =>$name,
               
                );

                if($this->Catalog_model->create($data)){
                    $this->session->set_flashdata('message','Insert Successfully !!!');
                }else{
                    $this->session->set_flashdata('message','insert Failed !!!');
                }
                // chuyen thong bao den trang admin
                redirect(base_url('admin/species'));
            }
        }
        $this->data['role'] = $this->User_model->getRoleByUsername($this->session->userdata('login'));
       // $this->data['temp'] = 'admin/employee/create';
        $this->load->view('pages/admin/species/add_species',$this->data);
    }

    function edit(){
        
        $id = $this->uri->rsegment('3');
        $id = strval($id);
        $species= $this->Catalog_model->get_info($id);
        if(!$species)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'This Species is not exist');
            redirect(base_url('admin/species'));
        }
        $this->data['species'] = $species;

        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post()){
            $this->form_validation->set_rules('id','id','required|max_length[11]');
            $this->form_validation->set_rules('name','name','required');
          

            //Nhap lieu chinh xacs
            if($this->form_validation->run()){
                //them vao database
              
                $id     = $this->input->post('id');
                $name   = $this->input->post('name');
                 
                $data = array(
                    'id'     => $id,      
                    'name'   =>$name
                  
                );

                if($this->Catalog_model->update($species->id,$data)){
                    $this->session->set_flashdata('message','Edit Successfully !!');
                }else{
                    $this->session->set_flashdata('message','Edit failed');
                }
                // chuyen thong bao den trang admin
                redirect(base_url('admin/species'));
            }
        }
        $this->data['role'] = $this->User_model->getRoleByUsername($this->session->userdata('login'));
        $this->data['temp'] = 'admin/species/edit';
        $this->load->view('pages/admin/species/edit_species',$this->data);
    }

    

    function delete($id){

        $id = $this->uri->rsegment('3');
        $id = strval($id);
        
        
        $info = $this->Catalog_model->get_info($id);
        if(!$info){

            $this->session->set_flashdata('message','This Species is not exist !!! ');
            redirect(base_url('admin/employee'));
        }
        // xoa du lieu
        $this->Catalog_model->delete_species_id($id);
        $this->session->set_flashdata('message', 'Delete successfully !!!');
        redirect(base_url('admin/species'));
    }
}
?>