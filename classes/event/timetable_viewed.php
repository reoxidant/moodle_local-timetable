<?php

namespace local_timetable\event;
defined('MOODLE_INTERNAL') || die();

/**
 * Class timetable_viewed
 * @package local_timetable\event
 */
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

    /**
     * @return \moodle_url|null
     */
    public function get_url()
    {
        return new \moodle_url('/local/timetable/view.php');
    }

    public static function get_name()
    {
        return get_string('view_page', 'local_timetable');
    }
}
