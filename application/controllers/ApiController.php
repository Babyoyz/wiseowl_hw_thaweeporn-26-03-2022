<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {
    
	public function index()
	{   

        $this->load->model('Api_model');
    
        $this->load->database();

        $result = $this->Api_model->get_hw_activities();

        $this->db->close();

       print_r(json_encode($result));

	}

    public function call_insert_hw_activitie(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $json = file_get_contents('php://input');

            $product = json_decode($json);
    
            $data_r = [
                "IDEMployee" => $product->IDEMployee,
                "band" => $product->band,
                "equipment" => $product->equipment,
                "equipmenttype" => $product->equipmenttype,
                "statusselect" => $product->statusselect,

            ];
    
        
    
            $this->load->model('Api_model');
    
            $this->load->database();
    
            $result = $this->Api_model->insert_hw_activitie($data_r);
    
            $this->db->close();
    
           print_r($result) ;
        }else{

            echo "no methods get";


        }
       

    }
    public function getmemberdata(){

        $this->load->model('Api_model');
    
        $this->load->database();

        $result = $this->Api_model->select_member_data();

        $this->db->close();

       print_r(json_encode($result));

    }
    public function getequipment(){

        $this->load->model('Api_model');
    
        $this->load->database();

        $result = $this->Api_model->select_equipment();

        $this->db->close();

       print_r(json_encode($result));

    }
}
