<?php 

class Report_model extends My_Model{

    function __construct()
    {
        parent::__construct();
        $this->table = 'bill';
    }

    public function getInfoItem($id){
        
        $query = $this->db->query(" SELECT bill_detail.food_id as 'foodID',
                                            bill_detail.item_id as 'itemID',
                                            bill_detail.quanlity_food as 'quality_food',
                                            bill_detail.quanlity_item as 'quality_item',
                                            food.price as 'price_food',
                                            item.price as 'price_item',
                                            food.name as 'name_food',
                                            item.name as 'name_item'
                                             FROM bill join bill_detail on bill.id = bill_detail.bill_id
                                                        join food on bill_detail.food_id = food.id
                                                        join item on bill_detail.item_id = item.id
                                             WHERE bill.id = '$id'");
        return $query->result();
    }
    public function getInfoBillDetail($id){
        $query = $this->db->query(" SELECT bill.id,
                                            employee.name as 'em_name',
                                            employee.address as 'em_address',
                                            employee.email as 'em_email',
                                            employee.number_phone as 'em_phone',
                                            created_time, 
                                            total_price,
                                            pet_id, 
                                            bill.active as tt,
                                            customer.name as 'cus_name',
                                            customer.address as 'cus_address',
                                            customer.email as 'cus_email',
                                            customer.number_phone as 'cus_phone',
                                            pet.image as 'image',                         
                                            pet.gender as 'pet_gender',
                                            pet.price as 'pet_price',
                                            pet.sale_id as 'pet_sale',
                                            pet.species_id as 'pet_species'
                                            FROM bill join employee on bill.employee_id = employee.id
                                                      join customer on bill.customer_id = customer.id
                                                      join pet on bill.pet_id = pet.id
                                                     
                                            WHERE bill.id = '$id'");

        return $query->result();
    } 
    public function getInfoBill(){
        $query = $this->db->query(" SELECT bill.id,
                                            employee.name as 'em_name',
                                            created_time, 
                                            total_price, pet_id, 
                                            bill.active as tt,
                                            customer.name as 'cus_name',
                                            pet.image as 'image' 
                                            FROM bill join employee on bill.employee_id = employee.id
                                                      join customer on bill.customer_id = customer.id
                                                      join pet on bill.pet_id = pet.id");

        return $query->result();
    } 

    public function active_invoice($id){
        $query = $this->db->query("UPDATE bill SET active = 0 WHERE id = '$id' ");

        return true;
    }
}
?>