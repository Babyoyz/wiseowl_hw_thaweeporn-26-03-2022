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

    public function check_HWID($params){

        $this->db->where('HwID =', $params); 
        $query = $this->db->get('hardwares');
        if($query->num_rows() != 0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }

    public function insert_hardware($params){

        $HwID = $params['HwID'];
        $Namehardware = $params['Namehardware'];
        $Type = $params['Type'];
        $brand = $params['brand'];
        $CreateBy = "admin";

                       $data = array(
                            'HwID' => $HwID,
                            'Namehardware' => $Namehardware,
                            'Type' => $Type,
                            'brand' => $brand,
                            'CreateBy' => $CreateBy,
                    );
                    
                    return  $this->db->insert('hardwares', $data);
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

    public function update_hardwaretakeback($params){


        $HwID = $params['HwID'];

                $this->db->set('borrowerID', null);
                $this->db->set('statushd', null);
                $this->db->where('HwID', $HwID);
                $this->db->update('hardwares'); 
                
    }

    public function getdatacart(){

  
        $this->db->select('count(*) as countdata');
        $this->db->from('hw_activities');
        $this->db->where('typeactivities =', 1); 
        $query1 = $this->db->get_compiled_select();
        
        $this->db->select('count(*) as countdata');
        $this->db->from('hw_activities');
        $this->db->where('typeactivities =', 2); 
        $query2 = $this->db->get_compiled_select();
        
        $this->db->select('count(*) as countdata');
        $this->db->from('hw_activities');
        $this->db->where('typeactivities =', 3); 
        $query3 = $this->db->get_compiled_select();

        $query = $this->db->query($query1 .' UNION '. $query2 .' UNION '. $query3);

        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }

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

    public function select_equipment_report(){

        $this->db->select('a.ID,
        a.HwID,
        a.Namehardware,
        a.Type AS TypeHardware,
        a.brand,
        a.CreatedDate,
        a.UpDateDated,
        a.UpDateDated,
        a.borrowerID,
        a.statushd,
        b.FristName,
        b.Position,
        ');
        $this->db->from('hardwares a'); 
        $this->db->join('employees b', 'a.borrowerID = b.ID', 'left');      
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

}

?>