<?php
require_once('../../config.php');
require_once('params.php');
require_once('classes/Timetable.php');

use module\classes\Timetable;

$dateMax = (isset($_POST['dateMax']) && !empty($_POST['dateMax']))? $_POST['dateMax']: null;
$dateMin = (isset($_POST['dateMax']) && !empty($_POST['dateMax']))? $_POST['dateMin']: null;

if($dateMax && $dateMin){
    list($yN,$mN,$dN) = explode('-', $dateMin);
    list($yX,$mX,$dX) = explode('-', $dateMax);
}

if(isset($_POST['role']) && !empty($_POST['role'])){
    $table = (new Timetable(
        $table_params[$_POST['role']]['curdate'],
        $table_params[$_POST['role']]['sql_text'],
        $table_params[$_POST['role']]['arr_print_keys'],
        $table_params[$_POST['role']]['timeformat'],
        $table_params[$_POST['role']]['role'],
        ($dateMin != null)? mktime(0,0,0,$mN,$dN,$yN): null,
        ($dateMax != null)? mktime(0,0,0,$mX,$dX,$yX): null
    ))->getTable();
}

echo $table;