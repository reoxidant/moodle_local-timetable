<?php

namespace module\classes;

class Timetable
{
    private $curdaystart;
    private $sqltext;
    private $arr_print_keys;
    private $user;
    private $moodle_database;
    private $timeformat;
    private $tableData;
    private $tableHtml;
    private $current_role;
    private $sql_param;
    private $constDate;

    function __construct($mktime, $sqltext, $arr_print_keys, $timeformat, $role = 'student', $dateMin, $dateMax, $arrCurMinAndMaxDate = null)
    {
        $this->curdaystart = $mktime;
        $this->sqltext = $sqltext;
        $this->arr_print_keys = $arr_print_keys;
        global $USER;
        $this->user = $USER;
        global $DB;
        $this->moodle_database = $DB;
        $this->timeformat = $timeformat;
        $this->current_role = $role;
        if (!empty($dateMax) && !empty($dateMin)) :
            $this->sql_param = [$dateMin, $dateMax];
        else:
            $this->sql_param = [$this->curdaystart];
        endif;
        if ($arrCurMinAndMaxDate) {
            $this->constDate = $arrCurMinAndMaxDate;
        }
    }

    private function getDatabaseResult()
    {
        if ($this->current_role == "student") {
            array_unshift($this->sql_param, $this->user->username);
            return $this->moodle_database->get_records_sql($this->sqltext, $this->sql_param);
        } else if ($this->current_role == "manager") {
            return $this->moodle_database->get_records_sql($this->sqltext, $this->sql_param);
        }
        return $this->moodle_database->get_records_sql($this->sqltext, array($this->curdaystart, $this->user->username));
    }

    private function setTableData()
    {
        foreach ($this->getDatabaseResult() as $res) {
            $this->tableData[$res->date][] = $res;
        }
    }

    private function getTableHtml()
    {
        return
            "<h1>Расписание дисциплин {$this->user->firstname} {$this->user->lastname}</h1>"
            . \html_writer::start_tag('div', array('class' => 'calendar_table')) .
            $this->getCalendar()
            . \html_writer::end_tag('div')
            . \html_writer::start_tag('div', array('class' => 'main_container_studtimetable'))
            . \html_writer::start_tag('div', array('class' => 'studtimetable')) .
            $this->getTableBodyHtml()
            . \html_writer::end_tag('div')
            . \html_writer::end_tag('div');
    }

    private function getTableBodyHtml()
    {
        if (!empty(key($this->tableData))) {
            $this->setTableHtml();
            return $this->tableHtml;
        }
    }

    private function setTableHtml()
    {
        foreach ($this->tableData as $date => $fields) {
            // дата
            $this->tableHtml .= $this->getTableHeaderDate($date);
            $this->tableHtml .= \html_writer::start_tag('div', array('class' => 'table'));
            $this->tableHtml .= $this->getTableHtmlHeadColumns();

            if ($this->current_role == 'teacher') {
                $groupsname = $this->getGroups($fields);
                $fields = $this->getArrayUnique($fields);
            }

            // данные
            foreach ($fields as $key => $field) {
                $this->tableHtml .= $this->getTableCells($field, $groupsname);
            }
            $this->tableHtml .= \html_writer::end_tag('div');
        }
    }

    private function getTableHeaderDate($date)
    {
        return \html_writer::start_tag('div', array('class' => 'ttdate')) . date('d.m.Y', $date) . \html_writer::end_tag('div');
    }

    private function getTableHtmlHeadColumns()
    {
        $cols = \html_writer::start_tag('div', array('class' => 'head row'));
        foreach ($this->arr_print_keys as $val) {
            $cols .= \html_writer::start_tag('div', array('class' => 'cell')) . get_string($val, 'local_timetable') . \html_writer::end_tag('div');
        }
        $cols .= \html_writer::end_tag('div');
        return $cols;
    }

    private function getTableCells($field, $groupsname = null)
    {
        $cell = \html_writer::start_tag('div', array('class' => 'row'));
        foreach ($this->arr_print_keys as $print_key => $fieldname) {
            $val = $field->{$print_key};
            switch ($print_key) {
                case 'teachername':
                    $tutorid = $field->tutorid;

                    if (empty($tutorid)) {
                        $val = '';
                        break;
                    }

                    $profileurl = new \moodle_url('/message/index.php', array('id' => $tutorid));
                    $val = \html_writer::start_tag('a', array('href' => $profileurl, 'target' => '_blank')) . $val . \html_writer::end_tag('a');
                    break;

                case 'timestart':
                    if (!empty($val) && !empty($field->timeend)) {
                        $val = date($this->timeformat, $val) . '-' . date($this->timeformat, $field->timeend);
                    }
                    break;

                case 'group':
                    $val = $groupsname;
                    break;
            }

            $cell .= \html_writer::start_tag('div', array('class' => 'cell')) . $val . \html_writer::end_tag('div');
        }
        $cell .= \html_writer::end_tag('div');
        return $cell;
    }

    private function isEmptyTableData()
    {
        if (!count($this->tableData)) {
            global $OUTPUT;
            \core\notification::warning(get_string('emptytimetable', 'local_timetable'));
            echo $OUTPUT->footer();
            die;
        }
    }

    private function getGroups($array)
    {
        $strArr = [];
        foreach ($array as $key => $arr) {
            foreach ($arr as $key => $val) {
                if ($key == 'groupname') {
                    array_push($strArr, $val);
                }
            }
        }
        $str = implode(',', $strArr);
        return $str;
    }

    private function getArrayUnique($array)
    {
        $join = [];
        foreach ($array as $key => $arr) {
            if (!isset($join[0])) {
                $join[0] = $arr;
            }
            $print_keys = (array)$this->arr_print_keys;

            foreach ($print_keys as $val) {
                $join_val = $join[0]->{$val};
                $print_keys_val = $arr->{$val};

                if (!$join_val == $print_keys_val && $print_keys_val != 'group') {
                    $join[$key] = $arr;
                    break;
                }
            }
        }
        return (array)$join;
    }

    private function getCalendar()
    {
        $maxDate = intval((end($this->tableData)[0])->date);
        $cal = \html_writer::start_tag('label', array('class' => "text-start"));
        $cal .= 'От:';
        $cal .= \html_writer::end_tag('label');
        $cal .= \html_writer::start_tag('input', array(
            'type' => "date",
            'class' => "input-start",
            'value' => "{$this->getDate()}",
            'min' => "{$this->getDate()}",
            'max' => "{$this->getDate($maxDate, true)}"
        ));
        $cal .= \html_writer::end_tag('input');

        $cal .= \html_writer::start_tag('label', array('class' => "text-end"));
        $cal .= "До:";
        $cal .= \html_writer::end_tag('label');
        $cal .= \html_writer::start_tag('input', array(
            'type' => "date",
            'class' => "input-end",
            'value' => "{$this->getDate($maxDate, true)}",
            'min' => "{$this->getDate()}",
            'max' => "{$this->getDate($maxDate, true)}"
        ));
        $cal .= \html_writer::end_tag('input');

        return $cal;
    }

    private function getDate($time = null, $isTimestamp = null)
    {
        if ($time && !$isTimestamp) {
            $date = date("Y-m-d", strtotime($time));
        } else if ($time && $isTimestamp && !$this->constDate) {
            $date = date("Y-m-d", $time);
        } else if ($time && $isTimestamp && $this->constDate) {
            $date = $this->constDate[1];
        } else {
            $date = date("Y-m-d", $this->curdaystart);
        }
        return $date;
    }

    public function getTable()
    {
        $this->setTableData();
        $this->isEmptyTableData();
        return $this->getTableHtml();
    }
}