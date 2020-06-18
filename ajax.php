<?php
require_once('../../config.php');
require_once('params.php');
require_once('classes/Timetable.php');

use module\classes\Timetable;

$setValMinAndMaxDate = (isset($_POST['setValMinAndMaxDate']) && !empty($_POST['setValMinAndMaxDate'])) ? $_POST['setValMinAndMaxDate'] : null;
$curMinAndMaxDate = (isset($_POST['curMinAndMaxDate']) && !empty($_POST['curMinAndMaxDate'])) ? $_POST['curMinAndMaxDate'] : null;

if ($setValMinAndMaxDate) {
    list($yN, $mN, $dN) = explode('-', $setValMinAndMaxDate[0]);
    list($yX, $mX, $dX) = explode('-', $setValMinAndMaxDate[1]);
}

if (isset($_POST['role']) && !empty($_POST['role'])) {
    $table = (new Timetable(
        $table_params[$_POST['role']]['curdate'],
        ($setValMinAndMaxDate) ? $table_params[$_POST['role']]['sql_text_max_min'] : $table_params[$_POST['role']]['sql_text'],
        $table_params[$_POST['role']]['arr_print_keys'],
        $table_params[$_POST['role']]['timeformat'],
        $table_params[$_POST['role']]['role'],
        ($setValMinAndMaxDate[0] != null) ? mktime(0, 0, 0, $mN, $dN, $yN) : null,
        ($setValMinAndMaxDate[1] != null) ? mktime(0, 0, 0, $mX, $dX, $yX) : null,
        $curMinAndMaxDate
    ))->getTable();
}

echo $table;