<?php

namespace local_timetable\event;
defined('MOODLE_INTERNAL') || die();

class timetable_viewed extends \core\event\base
{

    /**
     * Init method.
     *
     * @return void
     */
    protected function init()
    {
        $this->data['crud'] = 'r';
        $this->data['edulevel'] = self::LEVEL_PARTICIPATING;
    }

    public function get_url()
    {
        return new \moodle_url('/local/timetable/view.php');
    }

    public static function get_name()
    {
        return get_string('view_page', 'local_timetable');
    }
}
