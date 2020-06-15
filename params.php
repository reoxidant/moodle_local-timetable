<?php

$table_params = [
    'editingteacher' => [
        'sql_text' => "
        SELECT 
            stt.uid, stt.date,
            toc.timestart, toc.timeend,
            cr.name AS class,
            g.name AS group,
            e.name AS eventtype,
            concat(u.lastname, ' ', u.firstname) AS teachername,
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
        ORDER BY stt.date, toc.timestart",
        'arr_print_keys' => [
            'timestart' => 'timestart',
            'group' => 'group',
            'discipline' => 'discipline',
            'class' => 'class',
            'eventtype' => 'eventtype',
            'teachername' => 'teachername',
            'department' => 'department'
        ],
        'curdate' => (int)mktime(0, 0, 0),
        'timeformat' => 'H:i',
        'role' => 'teacher'
    ],
    'student' => [
        'sql_text' => "
        SELECT
            stt.uid, stt.date,
            toc.timestart, toc.timeend,
            cr.name AS class,
            g.name AS group,
            e.name AS eventtype,
            concat(u.lastname, ' ', u.firstname) AS teachername,
            sg.username AS student_username, 
            u.id AS tutorid, dis.name AS discipline,
            sd.name AS department
        FROM sirius_studtimetable stt
            JOIN sirius_studgroups sg ON stt.groupuid = sg.groupuid AND sg.markdelete = 0 AND sg.username::varchar = ?
            JOIN sirius_classrooms cr ON stt.classroomuid = cr.uid
            JOIN sirius_groups g ON stt.groupuid = g.uid
            JOIN sirius_eventtypes e ON stt.eventtypeuid = e.uid
            LEFT JOIN sirius_staffs stf ON stt.teacheruid = stf.uid
            LEFT JOIN {user} u ON stf.username = u.username
            JOIN sirius_disciplines dis ON stt.disciplineuid = dis.uid
            LEFT JOIN sirius_studdepartments sd ON stt.departmentuid = sd.uid
            JOIN sirius_timeofclass toc ON stt.timeofclassuid = toc.uid
        WHERE stt.markdelete = 0 AND stt.date >= ?
        ORDER BY stt.date, toc.timestart",
        'arr_print_keys' => [
            'timestart' => 'timestart',
            'discipline' => 'discipline',
            'class' => 'class',
            'eventtype' => 'eventtype',
            'teachername' => 'teachername',
            'department' => 'department',
        ],
        'curdate' => (int)mktime(0, 0, 0),
        'timeformat' => 'H:i',
        'role' => 'student'
    ]
];