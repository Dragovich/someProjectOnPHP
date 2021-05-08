<?php

namespace TEST;
require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

use Exception;

class CSV {

    private $_csv_file = null;

    /**
     * @param string $csv_file  - путь до csv-файла
     */
    public function __construct($csv_file) {
        if (file_exists($csv_file)) {
            $this->_csv_file = $csv_file;
        }
        else {
            throw new Exception("Файл не найден");
        }
    }

    public function setCSV(Array $csv, $new_csv_file) {
        $handle = fopen($new_csv_file, 'w');
        foreach ($csv as $value) {
            fputcsv($handle,  $value);
        }
        echo ('<pre>Новая таблица готова</pre>');
        fclose($handle);
    }

    /**
     * Метод для чтения из csv-файла. Возвращает массив с данными из csv
     * @return array;
     */
    public function getCSV() {
        $handle = fopen($this->_csv_file, "r"); //Открываем csv для чтения

        $array_line_full = array(); //Массив будет хранить данные из csv
        //Проходим весь csv-файл, и читаем построчно. 3-ий параметр разделитель поля
        while (($line = fgetcsv($handle, 0, "|")) !== FALSE) {
            $array_line_full[$line[0]] = $line[1]; //Записываем строчки в массив
        }
        fclose($handle); //Закрываем файл
        return $array_line_full; //Возвращаем прочтенные данные
    }

}