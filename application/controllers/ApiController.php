<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {


    function __construct() {
        parent::__construct();

        header('Content-Type: application/json');

    }

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
                "HwID" => $product->HwID,
                "statusselect" => $product->statusselect,

            ];
    
            $this->load->model('Api_model');
    
            $this->load->database();
            
            $Querycheck_hw = $this->Api_model->select_check_statushw($product->HwID);

            if($Querycheck_hw > 0 ){

                
                $this->db->close();

                $arr = [
                    "statusCode" => 200,
                    "statusvalue" => -1,
                    "Des" => "มีคนยืมอุปกรณ์ตัวนี้ไปแล้วครับ"
                ];

                echo json_encode( $arr );

            }else{

                $data_r = [
                    "hardwareID" => $product->HwID,
                    "EmployeeID" => $product->IDEMployee,
                    "typeactivities" => $product->statusselect,
                   
                ];

                $result = $this->Api_model->insert_hw_activitie($data_r);
                
                $data_update_statushd = [

                    "borrowerID" => $product->IDEMployee,
                    "statushd" => $product->statusselect,
                    "HwID" =>$product->HwID

                ];

                $this->Api_model->updatestatusHW($data_update_statushd);
                $this->db->close();
    
               if($result == 1){

                $arr = [
                    "statusCode" => 200,
                    "statusvalue" => 100,
                    "Des" => "บันทึกข้อมูลสำเร็จ"
                ];

                echo json_encode( $arr );

                return;
               }else{

                $arr = [
                    "statusCode" => 500,
                    "statusvalue" => 100,
                    "Des" => "ไม่สามารถบันทึกข้อมูลได้"
                ];

                echo json_encode( $arr );

                return;

               }

            }

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
