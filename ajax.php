<?php
require_once('../../config.php');
require_once('params.php');
require_once('classes/Timetable.php');

use module\classes\Timetable;

if(isset($_POST['role']) && !empty($_POST['role'])){
    $table = (new Timetable(
        $table_params[$_POST['role']]['curdate'],
        $table_params[$_POST['role']]['sql_text'],
        $table_params[$_POST['role']]['arr_print_keys'],
        $table_params[$_POST['role']]['timeformat'],
        $table_params[$_POST['role']]['role']
    ))->getTable();
}

echo $table;