<?php
require_once './vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
$inputFileName = "./data/demo-file-import.xlsx";

/**  Identify the type of $inputFileName  **/
$inputFileType = IOFactory::identify($inputFileName);

/**  Create a new Reader of the type that has been identified  **/
$reader = IOFactory::createReader($inputFileType);

/**  Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = $reader->load($inputFileName);

/**  Convert Spreadsheet Object to an Array for ease of use  **/
$schdeules = $spreadsheet->getActiveSheet()->toArray();

echo '<pre>';
print_r($schdeules);
echo '</pre>';