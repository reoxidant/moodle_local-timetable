<?php
require_once('classes/Timetable.php');
use module\classes\timetable\Timetable;

require_once('../../config.php');
require_once('params.php');

if (!isloggedin() or isguestuser()) {
    require_login();
    die;
}

$context_sys = context_system::instance();

$roles = get_user_roles($context_sys, $USER->id, true);
foreach ($roles as $role) {
    if($role->shortname = "editingteacher" || $role->shortname = "teacher"){
        $showTeacherTable = [
            'name' => 'teacher',
            'show' => true
        ];
    }
}

$PAGE->set_url("$CFG->httpswwwroot/local/student_timetable/view.php");

$PAGE->set_context($context_sys);
$PAGE->set_pagelayout('standard');
$title = get_string('pluginname', 'local_student_timetable');
$PAGE->navbar->add($title);
$PAGE->set_heading($title);
$PAGE->set_title($title);
$PAGE->set_cacheable(false);
$PAGE->requires->css('/local/student_timetable/styles.css');
echo $OUTPUT->header();

// если нет прав - не продолжаем
if (!has_capability('local/student_timetable:view', $context_sys)) {
    \core\notification::warning(get_string('noaccess', 'local_student_timetable'));
    echo $OUTPUT->footer();
    die;
}

$event = \local_student_timetable\event\student_timetable_viewed::create(array(
    'objectid' => null,
    'context' => $context_sys,
));

$event->trigger();

// удалим старые записи
@$DB->execute("DELETE FROM sirius_studtimetable WHERE markdelete != 0");
@$DB->execute("DELETE FROM sirius_studtimetable_elen WHERE markdelete != 0");

$table = (new Timetable(
    $table_params[$showTeacherTable['name']]['curdate'],
    $table_params[$showTeacherTable['name']]['sql_text'],
    $table_params[$showTeacherTable['name']]['arr_print_keys'],
    $table_params[$showTeacherTable['name']]['timeformat'],
    $table_params[$showTeacherTable['name']]['show']
))->getTable();

echo $table;
$OUTPUT->footer();