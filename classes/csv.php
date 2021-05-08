<?php

namespace TEST;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

use Exception;

class CSV {

    /**
     * @var string|null
     */
    private $_csv_file = null;

    /**
     * @param string $csv_file - путь до csv-файла
     */
    public function __construct($csv_file) {
        if (file_exists($csv_file)) {
            $this->_csv_file = $csv_file;
        } else {
            throw new Exception("Файл не найден");
        }
    }


    /**
     * @param array $csv          - массив данных
     * @param       $new_csv_file - название файла
     */
    public function setCSV(array $csv, $new_csv_file) {
        $handle = fopen($new_csv_file, 'w');
        foreach ($csv as $value) {
            fputcsv($handle, $value);
        }
        echo('<pre>Новая таблица готова</pre>');

        fclose($handle);
    }

    /**
     * Метод для чтения из csv-файла. Возвращает массив с данными из csv
     * @return array;
     */
    public function getCSV() {
        $handle = fopen($this->_csv_file, "r");

        $array_line_full = [];
        while (($line = fgetcsv($handle, 0, "|")) !== false) {
            $array_line_full[$line[0]] = $line[1];
        }
        fclose($handle);

        return $array_line_full;
    }

}
