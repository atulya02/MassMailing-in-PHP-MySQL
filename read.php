<?php

 
use PhpSpreadsheet\Spreadsheet;
use PhpSpreadsheet\Reader\Csv as Csv;
use PhpSpreadsheet\Reader\Xlsx as Xlsx;

 
$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 
if(isset($_FILES['File']['name']) && in_array($_FILES['File']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['File']['name']);
     $extension = end($arr_file);
     
     if($extension=='csv')
     {
        $reader = new Csv();
     }
     else
        $reader = new Xlsx();
    
    
    
 
    $spreadsheet = $reader->load($_FILES['File']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
    print_r($sheetData);
}
?>