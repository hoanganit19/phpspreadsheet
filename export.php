<?php
require_once './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet()->setTitle('Danh sách người dùng');

$headers = [
    'STT',
    'Tên',
    'Email',
    'Điện thoại',
];

$data = [
    [
        'name' => 'User 1',
        'email' => 'user1@gmail.com',
        'phone' => '0123456789',
    ],
    [
        'name' => 'User 2',
        'email' => 'user2@gmail.com',
        'phone' => '0123456789',
    ],
    [
        'name' => 'User 3',
        'email' => 'user3@gmail.com',
        'phone' => '0123456789',
    ],
];

foreach ($headers as $index => $value) {
    $sheet->setCellValue([$index + 1, 1], $value);
}
$rows = 1;
foreach ($data as $item) {
    $rows++;
    $cols = 1;
    $sheet->setCellValue([1, $rows], $rows - 1);
    foreach ($item as $value) {
        $sheet->setCellValue([++$cols, $rows], $value);
    }

}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename=file_' . time() . '.xlsx');
$writer->save('php://output');
