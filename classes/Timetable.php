<?php

namespace module\classes\timetable;


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

    function __construct($mktime, $sqltext, $arr_print_keys, $timeformat, $teacher = false)
    {
        $this->curdaystart = $mktime;
        $this->sqltext = $sqltext;
        $this->arr_print_keys = $arr_print_keys;
        global $USER;
        $this->user = $USER;
        global $DB;
        $this->moodle_database = $DB;
        $this->timeformat = $timeformat;
    }

    public function getDatabaseResult()
    {
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

            // данные
            foreach ($fields as $key => $field) {
                $this->tableHtml .= $this->getTableCells($field);
            }
            $this->tableHtml .= \html_writer::end_tag('div');
        }
    }

    private function getTableHeaderDate($date){
        return \html_writer::start_tag('div', array('class' => 'ttdate')) . date('d.m.Y', $date) . \html_writer::end_tag('div');
    }

    private function getTableHtmlHeadColumns()
    {
        $cols = \html_writer::start_tag('div', array('class' => 'head row'));
        foreach ($this->arr_print_keys as $val) {
            $cols .= \html_writer::start_tag('div', array('class' => 'cell')) . get_string($val, 'local_student_timetable') . \html_writer::end_tag('div');
        }
        $cols .= \html_writer::end_tag('div');
        return $cols;
    }



    private function getTableCells($field){
        $cell = \html_writer::start_tag('div', array('class' => 'row'));
            foreach ($this->arr_print_keys as $print_key => $fieldname) {
                $val = $field->{$print_key};
                if ("timestart" == $print_key) {
                    if (!empty($val) && !empty($field->timeend)) {
                        $val = date($this->timeformat, $val) . '-' . date($this->timeformat, $field->timeend);
                    }
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
            \core\notification::warning(get_string('emptytimetable', 'local_student_timetable'));
            echo $OUTPUT->footer();
            die;
        }
    }

    public function getTable()
    {
        $this->setTableData();
        $this->isEmptyTableData();
        return $this->getTableHtml();
    }
}