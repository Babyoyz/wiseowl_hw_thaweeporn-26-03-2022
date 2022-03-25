<?php
   
   require APPPATH . 'libraries/REST_Controller.php';     

   class Api extends REST_Controller {    
   

   
       public function index()
       {   
        $json = file_get_contents('php://input');

        return "OK";
        //    $this->load->model('Api_model');
   
        //    $this->load->database();
   
        //    $result = $this->Api_model->get_hw_activities();
   
        //    $this->db->close();
   
        //    print_r($result);
       }
   

   
   }
    	
?>