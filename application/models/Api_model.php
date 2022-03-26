<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api_model extends CI_Model {

    public $title;
    public $content;
    public $date;
    
  
    public function get_hw_activities()
    {
           $this->db->select('a.ID AS hwc_ID,
           a.hardwareID,
           a.EmployeeID,
           a.typeactivities AS status,
           a.CreatedDate AS hwc_CreateDate,
           b.Namehardware,
           b.brand,
           b.Type as Typehardware,
           c.FristName,
           c.LastName,
           c.Position');
           $this->db->from('hw_activities a'); 
           $this->db->join('hardwares b', 'a.hardwareID = b.ID', 'left');
           $this->db->join('employees c', 'a.EmployeeID = c.ID', 'left');   
           $this->db->order_by('hwc_CreateDate','DESC');         
           $this->db->distinct();
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

        //     $name = $params['Name'];

 

        // "IDEMployee" => $product->IDEMployee,
        //         "band" => $product->band,
        //         "equipment" => $product->equipment,
        //         "equipmenttype" => $product->equipmenttype,
        //         "statusselect" => $product->statusselect,
                
            $Namehardware = $params['equipment'];
            $Type = $params['equipmenttype'];
            $brand = $params['band'];

                $data_inserthw = array(
                'Namehardware' => $Namehardware,
                'Type' => $Type,
                'brand' => $brand,
                'IDemployees' => 'admin'
                );

              $Query_insert = $this->db->insert('hardwares', $data_inserthw);

              
            //   if($Query_insert == 1){

            //                $data = array(
            //                     'hardwareID' => '1',
            //                     'EmployeeID' => $name,
            //                     'typeactivities' => '3',
            //             );
                        
            //             return  $this->db->insert('hw_activities', $data);
            //   }
    }

    public function select_member_data(){

        $query = $this->db->get('employees');

        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }


    }
    
    public function select_equipment(){

        $query = $this->db->get('hardwares');

        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }


    }
}

?>