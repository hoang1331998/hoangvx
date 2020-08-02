<?php 

class Catalog_model extends My_Model{

    function __construct()
    {
        parent::__construct();
        $this->table = 'species';
    }

    public function getall() {

        $query = $this->db->query("SELECT * FROM species");

        return $query->result();
    }

    // function getRoleByUsername($username){

    //     $query = $this->db->query("SELECT * FROM employee where employee.username = '$username'");
    //     return $query->result();
    // }

    // public function delete_employee_id($id){
    //     $this->db->where('id',$id);
    //     $this->db->delete('employee');
    // }
    public function delete_species_id($id){
        $this->db->where('id',$id);
        $this->db->delete('species');
    }
}
?>