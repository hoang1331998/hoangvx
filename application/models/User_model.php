<?php 

class User_model extends My_Model{

    function __construct()
    {
        parent::__construct();
        $this->table = 'employee';
    }

    public function getInfoEmployee() {

        $query = $this->db->query("SELECT * FROM employee");

        return $query->result();
    }

    function getRoleByUsername($username){

        $query = $this->db->query("SELECT * FROM employee where employee.username = '$username'");
        return $query->result();
    }

    public function delete_employee_id($id){
        $this->db->where('id',$id);
        $this->db->delete('employee');
    }
   
}
?>