<?php
require 'vendor/autoload.php';

use League\Csv\Reader;
use League\Csv\Statement;

// Đường dẫn tới file CSV
$csvFile = 'chuyen_khoan.csv';  // Thay thế bằng đường dẫn thực tế

// Đọc file CSV
$csv = Reader::createFromPath($csvFile, 'r');
$csv->setHeaderOffset(0);  // Dòng đầu tiên sẽ làm header (các tiêu đề cột)

// Tạo một mảng để chứa dữ liệu
$data = [];

// Lấy toàn bộ bản ghi từ CSV
$records = $csv->getRecords(); // Đối tượng Iterator

// Duyệt qua từng bản ghi và lưu vào mảng
foreach ($records as $record) {
    $data[] = [
        'date_time' => $record['date_time'],  // Cột date_time
        'trans_no'  => $record['trans_no'],   // Cột trans_no
        'credit'    => $record['credit'],     // Cột credit
        'debit'     => $record['debit'],      // Cột debit
        'detail'    => $record['detail']      // Cột detail
    ];
}

// Chuyển đổi mảng sang định dạng JSON
$jsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// Lưu dữ liệu JSON vào file
$jsonFile = 'output.json';  // Thay thế bằng đường dẫn thực tế
file_put_contents($jsonFile, $jsonData);

echo "Đã chuyển đổi thành công dữ liệu từ CSV sang JSON.\n";

ini_set()