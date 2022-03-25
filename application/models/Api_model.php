<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api_model extends CI_Model {

    public $title;
    public $content;
    public $date;
    
  
    public function get_hw_activities()
    {
        
           $this->db->select('*');
           $this->db->from('hw_activities a'); 
           $this->db->join('hardwares b', 'b.ID=a.hardwareID', 'left');
           $this->db->join('employees c', 'c.ID=a.CreateBy', 'left');   
           $this->db->order_by('c.CreatedDate','DESC');         

           $query = $this->db->get(); 

           if($query->num_rows() != 0)
           {
               return $query->result_array();
           }
           else
           {
               return false;
           }

           
    }

    public function insert_hw_activitie($params){

            $name = $params['Name'];

            $data = array(
                'hardwareID' => '1',
                'borrowerName' => $name,
                'typeactivities' => '3',
                'CreateBy' => '2'
        );
        
        return  $this->db->insert('hw_activities', $data);

    }
    
}

?>