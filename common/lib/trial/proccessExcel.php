<?php
  error_reporting(E_ALL);
  require_once "/websites-data/common_files/lib/phpspreadsheet/vendor/autoload.php";
  /* Start to develop here. Best regards https://php-download.com/ */
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  function readXslx($file) {
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
    $reader->setReadDataOnly(TRUE);
    $spreadsheet = $reader->load($file);
    
    $worksheet = $spreadsheet->getActiveSheet();
    // Get the highest row and column numbers referenced in the worksheet
    $highestRow = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5
    for ($row = 2; $row <= $highestRow; ++$row) {
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
          $result[$row-1][] = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
        }
    }
    return $result;
  }
?>
