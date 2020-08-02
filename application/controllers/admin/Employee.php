<?php

class Employee extends MY_Controller{
    
    function __construct(){
        parent:: __construct();
        $this->load->model('User_model');
    }

    function index(){
        $data = array();
		$data['employee'] = $this->User_model->getInfoEmployee();
      
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/employee/index';    
        $this->load->view('pages/admin/employee/list_employee',$data,$this->data);
    }

    function check_id(){

        $id = $this->input->post('id');
        $where = array('id' => $id);
        if($this->User_model->check_exists($where)){

            //tra ve thong bao loi
            $this->form_validation->set_message(__FUNCTION__,'This id already exists');
            return false;
        }else{
            return true;
        }
    }
    function check_username(){

        $username = $this->input->post('username');
        $where = array('username' => $username);
        if($this->User_model->check_exists($where)){

            //tra ve thong bao loi
            $this->form_validation->set_message(__FUNCTION__,'This username already exists');
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
            $this->form_validation->set_rules('email','email','required|valid_email');
            $this->form_validation->set_rules('username','username','required|min_length[6]|max_length[20]|callback_check_username');
            $this->form_validation->set_rules('password','password','required|max_length[11]');
            $this->form_validation->set_rules('re_password','re_password','required|matches[password]');
            $this->form_validation->set_rules('gender','gender','required');
            
            //Nhap lieu chinh xacs
            if($this->form_validation->run()){
                //them vao database
                $this->load->library('upload_library');
                $upload_path = 'assets/img/employee';
                $upload_data = $this->upload_library->upload($upload_path, 'image');  
                $image = '';
                if(isset($upload_data['file_name']))
                {
                    $image = $upload_data['file_name'];
                }
                $id     = $this->input->post('id');
                $name   = $this->input->post('name');
                $email = $this->input->post('email');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $re_password = $this->input->post('re_password');
                $gender = $_POST['gender'];    
                $role = $_POST['role'];       
                $data = array(
                    'id'     => $id,      
                    'name'   =>$name,
                    'email'  =>$email,
                    'username' =>$username,
                    'password' =>$password, 
                    'gender' => $gender,
                    'role_id'  => $role,
                    'image' => $image,
                );

                if($this->User_model->create($data)){
                    $this->session->set_flashdata('message','Insert Successfully !!!');
                }else{
                    $this->session->set_flashdata('message','insert Failed !!!');
                }
                // chuyen thong bao den trang admin
                redirect(base_url('admin/employee'));
            }
        }
        
        $this->data['temp'] = 'admin/employee/create';
        $this->load->view('pages/admin/employee/add_employee',$this->data);
    }

    function edit(){
        
        $id = $this->uri->rsegment('3');
        $id = strval($id);
        $employee = $this->User_model->get_info($id);
        if(!$employee)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'This employee is not exist');
            redirect(base_url('admin/employee'));
        }
        $this->data['employee'] = $employee;

        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post()){
            $this->form_validation->set_rules('id','id','required|max_length[11]');
            $this->form_validation->set_rules('name','name','required');
            $this->form_validation->set_rules('email','email','required|valid_email');
            $this->form_validation->set_rules('username','username','required|min_length[4]|max_length[20]');
            $this->form_validation->set_rules('password','password','required|max_length[11]');
            $this->form_validation->set_rules('re_password','re_password','required|matches[password]');
            $this->form_validation->set_rules('gender','gender','required');
            

            //Nhap lieu chinh xacs
            if($this->form_validation->run()){
                //them vao database
                $this->load->library('upload_library');
                $upload_path = 'assets/img/employee';
                $upload_data = $this->upload_library->upload($upload_path, 'image');  
                $image = '';
                if(isset($upload_data['file_name']))
                {
                    $image = $upload_data['file_name'];
                }
                $id     = $this->input->post('id');
                $name   = $this->input->post('name');
                $email = $this->input->post('email');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $re_password = $this->input->post('re_password');
                $gender = $_POST['gender'];    
                $role = $_POST['role'];       
                $data = array(
                    'id'     => $id,      
                    'name'   =>$name,
                    'email'  =>$email,
                    'username' =>$username,
                    'password' =>$password, 
                    'gender' => $gender,
                    'role_id'  => $role,
                    'image' => $image,
                );

                if($this->User_model->update($employee->id,$data)){
                    $this->session->set_flashdata('message','Edit Successfully !!');
                }else{
                    $this->session->set_flashdata('message','Edit failed');
                }
                // chuyen thong bao den trang admin
                redirect(base_url('admin/employee'));
            }
        }
        $this->data['temp'] = 'admin/employee/edit';
        $this->load->view('pages/admin/employee/edit_employee',$this->data);
    }

    

    function delete($id){

        $id = $this->uri->rsegment('3');
        $id = strval($id);
        
        
        $info = $this->User_model->get_info($id);
        if(!$info){

            $this->session->set_flashdata('message','This employee is not exist !!! ');
            redirect(base_url('admin/employee'));
        }
        // xoa du lieu
        $this->User_model->delete_employee_id($id);
        $this->session->set_flashdata('message', 'Delete successfully !!!');
        redirect(base_url('admin/employee'));
    }
}
?>