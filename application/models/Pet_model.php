<?php
class Pet_model extends MY_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = 'pet';
    }

    public function getLastestPet() {

        $query = $this->db->query("SELECT * FROM pet  ");

        return $query->result();
    }
    public function getPetSale(){
        $query = $this->db->query("SELECT * FROM pet WHERE sale_id != '' and pet.tt = '0' ");

        return $query->result();
    }

    public function delete_pet_id($id){
        $this->db->where('id',$id);
        $this->db->delete('pet');
    }
    public function getInfoPet($id){
        $query = $this->db->query("SELECT * FROM pet WHERE id = '$id' ");

        return $query->result();
    }
    public function getPetBuild(){
        $query = $this->db->query("SELECT * FROM pet WHERE pet.tt = '0' ");

        return $query->result();
    }
    public function UpDatePet($id){
        $query = $this->db->query("UPDATE pet SET pet.tt = 1 WHERE id = '$id' ");

        return true;
    }

 
   ////////////////////////////////////////////
   public function countAll(){
       return $this->db->count_all("pet");
   }
   public function count_pet_rest(){
    $query = $this->db->query("SELECT count(*) as 'count' FROM pet WHERE pet.tt = 1 ");
    $count = $query->result();
    return $count;
}
   public function listPet($record, $start){
        $this->db->limit($record,$start);
        $query=$this->db->get("pet");
        return $query->result_array();
   }
}