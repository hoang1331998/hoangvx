<?php 

class Food_model extends My_Model{

    function __construct()
    {
        parent::__construct();
        $this->table = 'food';
    }

    public function getInfoFood(){

        $query = $this->db->query(" SELECT * FROM food ");

        return $query->result();
    }
    public function delete_food_id($id){
        $this->db->where('id',$id);
        $this->db->delete('food');
    }
   
}
?>