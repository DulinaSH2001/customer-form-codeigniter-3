<?php 
Class Contactmodel extends CI_Model{
var $cuscode;
var $contacttype = array();
var $contactfullname = array();
public function setContactType($type) {
    $this->contacttype = $type;
}

public function getContactType() {
    return $this->contacttype;
}

public function setContactFullName($name) {
    $this->contactfullname = $name;
}

public function getContactFullName() {
    return $this->contactfullname;
}

public function setCuscode($code) {
    $this->cuscode = $code;
}

public function getCuscode() {
    return $this->cuscode;
}
}