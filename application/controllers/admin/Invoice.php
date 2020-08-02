<?php
class Invoice extends MY_Controller{

    function __construct()
    {
        parent:: __construct();
        $this->load->model('Report_model');
        $this->load->model('User_model');
        $this->load->model('Pet_model');
        $this->load->model('Item_model');
        $this->load->model('Food_model');
    }

    function index(){
        $data = array();
        $data['build'] = $this->Report_model->getInfoBill();
        $data['role'] = $this->User_model->getRoleByUsername($this->session->userdata('login'));
           
        $this->load->view('pages/admin/invoice/invoice',$data);
        
    }

    function detail(){
        $id = $this->uri->rsegment('3');
        $id = strval($id);
        $data = array();
        $data['info'] = $this->Report_model->getInfoBillDetail($id);
        $data['item'] = $this->Report_model->getInfoItem($id);
        $data['active'] = $this->Report_model->active_invoice($id);
        $data['role'] = $this->User_model->getRoleByUsername($this->session->userdata('login'));

        $this->load->view('pages/admin/invoice/static_invoice',$data);
       
    }
    function active(){
        $id = $this->uri->rsegment('3');
        $id = strval($id);

        if($this->Report_model->active_invoice($id)){
            $this->session->set_flashdata('message','Update Successfully !!!');
        }else{
            $this->session->set_flashdata('message','insert Failed !!!');
        }
        // chuyen thong bao den trang admin
        redirect(base_url('admin/invoice'));
    }
}

?>