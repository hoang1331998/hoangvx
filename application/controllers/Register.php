<?php
    class Register extends MY_Controller{

        function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->helper(array('form', 'url'));    
            $this->load->library('upload_library'); 
    
            $this->load->model('User_model');
        }

        public function index(){

            if($this->input->post()){
                $this->form_validation->set_rules('username','username','required|max_length[11]|callback_check_username');
                $this->form_validation->set_rules('name', 'Name', 'required'); 
                // $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
                $this->form_validation->set_rules('password', 'password', 'required'); 
                $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|matches[password]'); 
                if($this->form_validation->run()){

                    $this->load->library('upload_library');
                    $upload_path = 'assets/img/avatar';
                    $upload_data = $this->upload_library->upload($upload_path, 'avatar');  
                    $image = '';
                    if(isset($upload_data['file_name']))
                    {
                        $image = $upload_data['file_name'];
                    }
                    $name = $this->input->post('name');
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $data = array(
                        'name' => $name,
                        'username' => $username,
                        'password' => $password,
                        'image' => $image,
                    );
                    if($this->User_model->create($data)){
                        $this->session->set_flashdata('message','Insert Successfully !!!');
                    }else{
                        $this->session->set_flashdata('message','insert Failed !!!');
                    }
                    redirect(base_url('login'));
                }
               
            }
            $this->data['temp'] = 'register/create';
            $this->load->view('pages/admin/createAccount', $this->data);
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

       
    }
?>