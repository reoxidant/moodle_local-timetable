<?php

defined('MOODLE_INTERNAL') || die();

/**
 * Callback to define user preferences.
 *
 * @return array
 */

function local_timetable_user_preferences_min()
{
    $preferences = array();
    $preferences['local_timetable_user_preference_min'] = array(
        'type' => PARAM_INT,
        'null' => NULL_NOT_ALLOWED,
        'default' => 0,
        'choices' => array($_POST['setValMinAndMaxDate'][0]),
    );

    return $preferences;
}

/**
 * @return array
 */
function local_timetable_user_preferences_max()
{
    $preferences = array();
    $preferences['local_timetable_user_preference_max'] = array(
        'type' => PARAM_INT,
        'null' => NULL_NOT_ALLOWED,
        'default' => 0,
        'choices' => array($_POST['setValMinAndMaxDate'][1]),
    );

    return $preferences;
}
