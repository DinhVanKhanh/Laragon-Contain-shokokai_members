<?php 
require_once("vendor/autoload.php"); 

/* Start to develop here. Best regards https://php-download.com/ */
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/*
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');

$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
phpinfo();*/

    $inputFileName = "../templates/errSearchImport.xlsx";
    $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
    $workSheet = $objReader->load("../templates/errSearchImport.xlsx");

    var_dump($workSheet);
?>