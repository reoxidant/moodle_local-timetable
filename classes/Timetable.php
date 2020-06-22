<?php

namespace module\classes;

/**
 * Class Timetable
 * @package module\classes
 */
class Timetable
{
    /**
     * @var timestamp
     */
    private $curdaystart;
    /**
     * @var string
     */
    private $sqltext;
    private $sqltext_max_date;
    /**
     * @var array
     */
    private $arr_print_keys;
    /**
     * @var bool|false|mixed|object|\stdClass
     */
    private $user;
    /**
     * @var \moodle_database|null
     */
    private $moodle_database;
    /**
     * @var string
     */
    private $timeformat;
    /**
     * @var array database
     */
    private $tableData;
    /**
     * @var string html
     */
    private $tableHtml;
    /**
     * @var string
     */
    private $current_role;
    /**
     * @var array
     */
    private $sql_param;
    /**
     * @var timestamp
     */
    private $curCalendarDateMin;
    /**
     * @var timestamp
     */
    private $curCalendarDateMax;
    private $maxDateCurrentUser;

    /**
     * Timetable constructor.
     * @param $mktime
     * @param $sqltext
     * @param $sqltext_max_date
     * @param $arr_print_keys
     * @param $timeformat
     * @param string $role
     * @param $curCalendarDateMin
     * @param $curCalendarDateMax
     */
    function __construct($mktime, $sqltext, $sqltext_max_date, $arr_print_keys, $timeformat, $role, $curCalendarDateMin, $curCalendarDateMax)
    {
        $this->curdaystart = $mktime;
        $this->sqltext = $sqltext;
        $this->sqltext_max_date = $sqltext_max_date;
        $this->arr_print_keys = $arr_print_keys;
        global $USER;
        $this->user = $USER;
        global $DB;
        $this->moodle_database = $DB;
        $this->timeformat = $timeformat;
        $this->current_role = $role;
        $this->curCalendarDateMin = $curCalendarDateMin;
        $this->curCalendarDateMax = $curCalendarDateMax;
        if (!empty($curCalendarDateMin) && !empty($curCalendarDateMax)) :
            $this->sql_param = [$curCalendarDateMin, $curCalendarDateMax];
        else:
            $this->sql_param = [$this->curdaystart];
        endif;
    }

    /**
     * @return array database
     * @throws \dml_exception
     */
    private function getDatabaseResult()
    {
        switch ($this->current_role){
            case "student":
                array_unshift($this->sql_param, $this->user->username);
                return $this->moodle_database->get_records_sql($this->sqltext, $this->sql_param);
                break;
            case "manager":
                return $this->moodle_database->get_records_sql($this->sqltext, $this->sql_param);
                break;
            default:
                $this->setCurrentUserMaxCalendarDate();
                array_push($this->sql_param, $this->user->username);
                return $this->moodle_database->get_records_sql($this->sqltext, $this->sql_param);
        }
/*        if ($this->current_role == "student") {
            array_unshift($this->sql_param, $this->user->username);
            return $this->moodle_database->get_records_sql($this->sqltext, $this->sql_param);
        } else if ($this->current_role == "manager") {
            return $this->moodle_database->get_records_sql($this->sqltext, $this->sql_param);
        }
        array_push($this->sql_param, $this->user->username);
        return $this->moodle_database->get_records_sql($this->sqltext, $this->sql_param);*/
    }

    /**
     * @set $this->tableData
     * @throws \dml_exception
     */
    private function setTableData()
    {
        foreach ($this->getDatabaseResult() as $res) {
            $this->tableData[$res->date][] = $res;
        }
    }

    /**
     * @return html_elements calendar + table body
     */
    private function getTableHtml()
    {
        return
            "<h1>Расписание дисциплин {$this->user->firstname} {$this->user->lastname}</h1>"
            . \html_writer::start_tag('div', array('class' => 'calendar_table', 'userid' => "{$this->user->id}")) .
            $this->getCalendar()
            . \html_writer::end_tag('div')
            . \html_writer::start_tag('div', array('class' => 'main_container_studtimetable'))
            . \html_writer::start_tag('div', array('class' => 'studtimetable')) .
            $this->getTableBodyHtml()
            . \html_writer::end_tag('div')
            . \html_writer::end_tag('div');
    }

    /**
     * @return html_elements table body
     */
    private function getTableBodyHtml()
    {
        if (!empty(key($this->tableData))) {
            $this->setTableHtml();
            return $this->tableHtml;
        }
    }

    /**
     * @param $this->tableHtml
     * @set $this->tableHtml table html elements
     */
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

    /**
     * @param $date
     * @return string
     */
    private function getTableHeaderDate($date)
    {
        return \html_writer::start_tag('div', array('class' => 'ttdate')) . date('d.m.Y', $date) . \html_writer::end_tag('div');
    }

    /**
     * @return string
     * @throws \coding_exception
     */
    private function getTableHtmlHeadColumns()
    {
        $cols = \html_writer::start_tag('div', array('class' => 'head row'));
        foreach ($this->arr_print_keys as $val) {
            $cols .= \html_writer::start_tag('div', array('class' => 'cell')) . get_string($val, 'local_timetable') . \html_writer::end_tag('div');
        }
        $cols .= \html_writer::end_tag('div');
        return $cols;
    }

    /**
     * @param $field
     * @param null $groupsname
     * @return string
     * @throws \moodle_exception
     */
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

    /**
     * @throws \coding_exception
     */
    private function isEmptyTableData()
    {
        if (!count($this->tableData)) {
            global $OUTPUT;
            \core\notification::warning(get_string('emptytimetable', 'local_timetable'));
            echo $OUTPUT->footer();
            die;
        }
    }

    /**
     * @param $array
     * @return string
     */
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

    /**
     * @param $array
     * @return array
     */
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

    /**
     * @return string html calendar
     */
    private function getCalendar()
    {
//        $maxCalendarDateCurrentUser = intval((end($this->tableData)[0])->date);
        $cal = \html_writer::start_tag('label', array('class' => "text-start"));
        $cal .= 'От:';
        $cal .= \html_writer::end_tag('label');
        $cal .= \html_writer::start_tag('input', array(
            'type' => "date",
            'class' => "input-start",
            'value' => ($this->curCalendarDateMin) ? $this->getDate($this->curCalendarDateMin, true) : $this->getDate(),
            'min' => "{$this->getDate()}",
            'max' => "{$this->getDate($this->maxDateCurrentUser, true)}"
        ));
        $cal .= \html_writer::end_tag('input');

        $cal .= \html_writer::start_tag('label', array('class' => "text-end"));
        $cal .= "До:";
        $cal .= \html_writer::end_tag('label');
        $cal .= \html_writer::start_tag('input', array(
            'type' => "date",
            'class' => "input-end",
            'value' => ($this->curCalendarDateMax) ? $this->getDate($this->curCalendarDateMax, true) : $this->getDate($this->maxDateCurrentUser, true),
            'min' => "{$this->getDate()}",
            'max' => "{$this->getDate($this->maxDateCurrentUser, true)}"
        ));
        $cal .= \html_writer::end_tag('input');

        return $cal;
    }

    private function setCurrentUserMaxCalendarDate(){
        $array = $this->moodle_database->get_records_sql($this->sqltext_max_date, [$this->curdaystart, $this->user->username]);
        $this->maxDateCurrentUser = intval((end($array))->date);
    }

    /**
     * @param null $time
     * @param null $isTimestamp
     * @param bool $constDate
     * @return false|string
     */
    private function getDate($time = null, $isTimestamp = null, $constDate = false)
    {
        if ($time && !$isTimestamp) {
            $date = date("Y-m-d", strtotime($time));
        } else if ($time && $isTimestamp && !$constDate) {
            $date = date("Y-m-d", $time);
        } else {
            $date = date("Y-m-d", $this->curdaystart);
        }
        return $date;
    }

    /**
     * @return table_html
     * @set array database
     * @throws \coding_exception
     * @throws \dml_exception
     */
    public function getTable()
    {
        $this->setTableData();
        $this->isEmptyTableData();
        return $this->getTableHtml();
    }
}