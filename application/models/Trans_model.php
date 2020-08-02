<?php 

class Trans_model extends My_Model{

    function __construct()
    {
        parent::__construct();
        $this->table = 'transition';
    }

    public function getall() {

        $query = $this->db->query("SELECT * FROM transition");

        return $query->result();
    }

 
   
}
?>