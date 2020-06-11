<?php
require_once('classes/Timetable.php');
use module\classes\timetable\Timetable;

require_once('../../config.php');

if (!isloggedin() OR isguestuser()) {
    require_login();
    die;
}

$context_sys = context_system::instance();

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

$curdaystart = (int)mktime(0, 0, 0);

$sqltext = "SELECT 
stt.uid, stt.date,
toc.timestart, toc.timeend,
cr.name AS class,
g.name AS group,
e.name AS eventtype,
sg.username AS username,
u.id AS tutorid, dis.name AS discipline,
sd.name AS department,
g.name AS groupname
FROM sirius_studtimetable stt
JOIN sirius_studgroups sg ON stt.groupuid = sg.groupuid AND sg.markdelete = 0
JOIN sirius_classrooms cr ON stt.classroomuid = cr.uid
JOIN sirius_groups g ON stt.groupuid = g.uid
JOIN sirius_eventtypes e ON stt.eventtypeuid = e.uid
LEFT JOIN sirius_staffs stf ON stt.teacheruid = stf.uid
LEFT JOIN {user} u ON stf.username = u.username
JOIN sirius_disciplines dis ON stt.disciplineuid = dis.uid
LEFT JOIN sirius_studdepartments sd ON stt.departmentuid = sd.uid
JOIN sirius_timeofclass toc ON stt.timeofclassuid = toc.uid
WHERE stt.markdelete = 0 AND stt.date >= ? AND u.username::varchar = ?
ORDER BY stt.date, toc.timestart";

// какие поля выводить
$arr_print_keys = array(
    'timestart' => 'timestart',
    'discipline' => 'discipline',
    'class' => 'class',
    'eventtype' => 'eventtype',
    'department' => 'department',
    'group' => 'group'
);

$timeformat = 'H:i'; // формат времени начала и конца пары

$teacher_table = new Timetable($curdaystart, $sqltext, $arr_print_keys, $timeformat);
echo $teacher_table->getTable();

$OUTPUT->footer();