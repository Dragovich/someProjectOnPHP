<?php

namespace TEST;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

class UsersId {

    /**
     * @var array Users id
     */
    protected $usersId = [];

    /**
     * UsersId constructor.
     * @param $usersId
     */
    function __construct($usersId) {
        $this->usersId = $usersId;
    }

    function __destruct() {
    }

    /**
     * @return array
     */
    function getUsersId() {
        return $this->usersId;
    }

    /**
     * @return bool
     */
    function getIncident() {
        return in_array(19, self::getUsersId()) && in_array(20, self::getUsersId());
    }
}
