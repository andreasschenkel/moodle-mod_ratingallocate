<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * The mod_ratingallocate ratingallocate_viewed event.
 *
 * @package    mod_ratingallocate
 * @copyright  2014 Tobias Reischmann
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_ratingallocate\event;
defined('MOODLE_INTERNAL') || die();

/**
 * The mod_ratingallocate ratingallocate_viewed event class.
 *
 * @since     Moodle 2.7
 * @copyright 2014 Tobias Reischmann
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 **/
class ratingallocate_viewed extends \core\event\base {

    public static function create_simple($modulecontext, $ratingallocateid) {
        return self::create(array('context' => $modulecontext, 'objectid' => $ratingallocateid));
    }

    protected function init() {
        $this->data['crud'] = 'r';
        $this->data['edulevel'] = self::LEVEL_TEACHING;
        $this->data['objecttable'] = 'ratingallocate';
    }

    public static function get_name() {
        return get_string('log_ratingallocate_viewed', 'mod_ratingallocate');
    }

    public function get_description() {
        return get_string('log_ratingallocate_viewed_description', 'mod_ratingallocate',
                array('userid' => $this->userid, 'ratingallocateid' => $this->objectid));
    }

    public function get_url() {
        return new \moodle_url('/mod/ratingallocate/view.php', array('m' => $this->objectid));
    }

    public static function get_objectid_mapping() {
        return array('db' => 'ratingallocate', 'restore' => 'ratingallocate');
    }

    public static function get_other_mapping() {
        return false;
    }
}
