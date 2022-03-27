<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('exports_csv_hardware'))
{
     function exports_csv_hardware($params){

        $namefile = "ExportHardware".date("Y/m/d");
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"{$namefile}".".csv\"");
        header("Pragma: no-cache");
        header("Expires: 0");

        $handle = fopen('php://output', 'w');
        fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

        fputcsv($handle, array("NO","HwID","Namehardware","Type","Brand","CreatedDate","UpDateDated","borrowerName","statushd"));

        $cnt=1;
        foreach ($params as $key) { 

            $status = '';
            $borrowerName = '';

            
            if($key["statushd"] == 1){

                $status = "ยืมอุปกรณ์";

            }else if ($key["statushd"] == 2){

                $status = "คืนอุปกรณ์";
                
            }else if($key["statushd"] == 3){

                $status = "ส่งซ่อม";

            }else {
                $status = "ไม่มีคนยืม";

            }

            if($key["FristName"] != ''){

                $borrowerName = $key["FristName"];
            }else{

                $borrowerName = "ไม่มีคนยืม";
            }
            $narray=array($cnt,$key["HwID"],$key["Namehardware"],$key["TypeHardware"],$key["brand"],$key["CreatedDate"],$key["UpDateDated"],$borrowerName,$status);

            fputcsv($handle, $narray);

            $cnt++;
        }
            fclose($handle);
        exit;
    }



}