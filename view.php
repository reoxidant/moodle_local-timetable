<?php
require_once('../../config.php');

if (!isloggedin() or isguestuser()) {
    require_login();
    die;
}

$context_sys = context_system::instance();

$roles = get_user_roles($context_sys, $USER->id, true);
foreach ($roles as $role) {
    if ($role->shortname == "editingteacher" || $role->shortname == "teacher" || $role->shortname == "student") {
        $view_role = $role->shortname;
        break;
    } else if ($role->shortname == "manager") {
        $view_role = $role->shortname;
        break;
    }
}
if (!count($roles)) {
    $view_role = "student";
}

$PAGE->set_url("$CFG->httpswwwroot/local/timetable/view.php");
$PAGE->set_context($context_sys);
$PAGE->set_pagelayout('standard');
$title = get_string('pluginname', 'local_timetable');
$PAGE->navbar->add($title);
$PAGE->set_heading($title);
$PAGE->set_title($title);
$PAGE->set_cacheable(false);
$PAGE->requires->css('/local/timetable/styles.css');
$PAGE->requires->js_call_amd('local_timetable/calendar', 'init', array($view_role));
echo $OUTPUT->header();

// если нет прав - не продолжаем
if (!has_capability('local/timetable:view', $context_sys)) {
    \core\notification::warning(get_string('noaccess', 'local_timetable'));
    echo $OUTPUT->footer();
    die;
}

$event = \local_timetable\event\timetable_viewed::create(array(
    'objectid' => null,
    'context' => $context_sys,
));

$event->trigger();

// удалим старые записи
@$DB->execute("DELETE FROM sirius_studtimetable WHERE markdelete != 0");
@$DB->execute("DELETE FROM sirius_studtimetable_elen WHERE markdelete != 0");

echo $OUTPUT->footer();