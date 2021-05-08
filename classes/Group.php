<?php

namespace TEST;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

class Group {

    /**
     * @var int Group id
     */
    protected $firstPathOfGroup = 0;

    /**
     * @var int Group id
     */
    protected $secondPathOfGroup = 0;

    /**
     * Group constructor.
     */
    function __construct() {
        $randUsersId = array_rand(NUMBERS_OF_PEOPLE, 10);
        $lostRandUsersId = array_diff(NUMBERS_OF_PEOPLE, $randUsersId);

        $this->firstPathOfGroup = new UsersId($randUsersId);
        $this->secondPathOfGroup = new UsersId($lostRandUsersId);
    }

    function __destruct() {
    }

    /**
     * @return bool
     */
    function getIncidentInGroup() {
        return $this->firstPathOfGroup->getIncident() || $this->secondPathOfGroup->getIncident();
    }
}
