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
        $massiveOfPeople = NUMBERS_OF_PEOPLE;
        shuffle($massiveOfPeople);
        $massiveOfPeople = array_chunk($massiveOfPeople, 10);

        $this->firstPathOfGroup = new UsersId($massiveOfPeople[0]);
        $this->secondPathOfGroup = new UsersId($massiveOfPeople[1]);
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
