<?php
require_once('../../config.php');
require_once('lib.php');
require_once('params.php');
require_once('classes/Timetable.php');

use module\classes\Timetable;

$setValMinAndMaxCalendarDate = (isset($_POST['setValMinAndMaxDate']) && !empty($_POST['setValMinAndMaxDate'])) ? $_POST['setValMinAndMaxDate'] : null;
$curMinAndMaxCalendarDate = (isset($_POST['curMinAndMaxDate']) && !empty($_POST['curMinAndMaxDate'])) ? $_POST['curMinAndMaxDate'] : null;

list($minDateCalendar, $maxDateCalendar) = $setValMinAndMaxCalendarDate;

list($minDateCalendar, $maxDateCalendar) = checkPreference($minDateCalendar, $maxDateCalendar);

if ($minDateCalendar && $maxDateCalendar) {
    list($yN, $mN, $dN) = explode('-', $minDateCalendar);
    list($yX, $mX, $dX) = explode('-', $maxDateCalendar);
}

/**
 * @param $minDateCalendar
 * @param $maxDateCalendar
 * @return array|null
 * @throws coding_exception
 */
function checkPreference($minDateCalendar, $maxDateCalendar)
{
    $minDatePreferences = get_user_preferences("local_timetable_user_preferences_min");
    $maxDatePreferences = get_user_preferences("local_timetable_user_preferences_max");

    if ($minDateCalendar && $maxDateCalendar) {
        if (strtotime($minDateCalendar) < strtotime($maxDateCalendar)) {
            set_user_preference("local_timetable_user_preferences_min", $minDateCalendar);
            set_user_preference("local_timetable_user_preferences_max", $maxDateCalendar);
        }
        return [$minDateCalendar, $maxDateCalendar];
    } else if ($minDatePreferences && $maxDatePreferences) {
        return [$minDatePreferences, $maxDatePreferences];
    } else {
        set_user_preference("local_timetable_user_preferences_min", 0);
        set_user_preference("local_timetable_user_preferences_max", 0);
        return null;
    }
}

if (isset($_POST['role']) && !empty($_POST['role'])) {
    $table = (new Timetable(
        $table_params[$_POST['role']]['curdate'],
        ($minDateCalendar && $maxDateCalendar) ? $table_params[$_POST['role']]['sql_text_max_min'] : $table_params[$_POST['role']]['sql_text'],
        $table_params[$_POST['role']]['sql_text_min_date'],
        $table_params[$_POST['role']]['sql_text_max_date'],
        $table_params[$_POST['role']]['arr_print_keys'],
        $table_params[$_POST['role']]['timeformat'],
        ($table_params[$_POST['role']]['role']) ? $table_params[$_POST['role']]['role'] : "student",
        ($minDateCalendar != null) ? mktime(0, 0, 0, $mN, $dN, $yN) : null,
        ($maxDateCalendar != null) ? mktime(0, 0, 0, $mX, $dX, $yX) : null
    ))->getTable();
}

echo $table;