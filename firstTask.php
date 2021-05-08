<?php

use TEST\CSV;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

$csv = new CSV(SOURCE_FILE_CSV);
$dataFromCSV = $csv->getCSV();

$newCSV = array_fill(1, 300, array_fill(1, 300, 0));

foreach ($dataFromCSV as $key => $value) {
    $newCSV[floor($key / 300) + 1][$key % 300] = $value;
}

$csv->setCSV($newCSV, OUTPUT_FILE_CSV);

echo('<a href="index.html">Вернуться</a>');
