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


    public function select_check_statushw($params){

        // $this->db->where('hardwareID', $params); 
        // $this->db->where('typeactivities =', '1'); 
        // $this->db->order_by('CreatedDate', 'DESC');
        // $query = $this->db->get('hw_activities',1);

        $this->db->where('ID =', $params); 
        $this->db->where('statushd =', '1'); 
        $query = $this->db->get('hardwares');

        if($query->num_rows() != 0)
        {
            return $query->num_rows();
        }
        else
        {
            return false;
        }

    }

    public function insert_hw_activitie($params){

            $hardwareID = $params['hardwareID'];
            $EmployeeID = $params['EmployeeID'];
            $typeactivities = $params['typeactivities'];


                           $data = array(
                                'hardwareID' => $hardwareID,
                                'EmployeeID' => $EmployeeID,
                                'typeactivities' => $typeactivities,
                        );
                        
                        return  $this->db->insert('hw_activities', $data);
             
    }


    public function updatestatusHW($params){

        $borrowerID = $params['borrowerID'];
        $statushd = $params['statushd'];
        $HwID = $params['HwID'];

                    $data = array(
                        'borrowerID' => $borrowerID,
                        'statushd'  => $statushd,
                       
                );

                $this->db->set('borrowerID', $borrowerID);
                $this->db->set('statushd', $statushd);
                $this->db->where('ID', $HwID);
                $this->db->update('hardwares'); 
                

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