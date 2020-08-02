<?php 

class Item_model extends My_Model{

    function __construct()
    {
        parent::__construct();
        $this->table = 'item';
    }

    public function getInfoItem(){

        $query = $this->db->query(" SELECT * FROM item ");

        return $query->result();
    }
    public function delete_item_id($id){
        $this->db->where('id',$id);
        $this->db->delete('item');
    }
   
}
?>