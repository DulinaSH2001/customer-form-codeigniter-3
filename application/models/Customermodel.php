<?php
class Customermodel extends CI_Model {
    var $cuscode;
    var $cusname;
    var $cuscompany;
    var $mainphone;
    var $workphone;
    var $moblenumber;
    var $faxnumber;
    var $email;
    var $ccemail;
    var $website;
    var $printName;
    var $crrency;
    var $accounttype;
    var $joineddate;

    public function getCuscode() {
        return $this->cuscode;
    }

    public function setCuscode($cuscode) {
        $this->cuscode = $cuscode;
    }

    public function getCusname() {
        return $this->cusname;
    }

    public function setCusname($cusname) {
        $this->cusname = $cusname;
    }

    public function getCuscompany() {
        return $this->cuscompany;
    }

    public function setCuscompany($cuscompany) {
        $this->cuscompany = $cuscompany;
    }

    public function getMainphone() {
        return $this->mainphone;
    }

    public function setMainphone($mainphone) {
        $this->mainphone = $mainphone;
    }

    public function getWorkphone() {
        return $this->workphone;
    }

    public function setWorkphone($workphone) {
        $this->workphone = $workphone;
    }

    public function getMoblenumber() {
        return $this->moblenumber;
    }

    public function setMoblenumber($moblenumber) {
        $this->moblenumber = $moblenumber;
    }

    public function getFaxnumber() {
        return $this->faxnumber;
    }

    public function setFaxnumber($faxnumber) {
        $this->faxnumber = $faxnumber;
    }
  
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getCcemail() {
        return $this->ccemail;
    }

    public function setCcemail($ccemail) {
        $this->ccemail = $ccemail;
    }

    public function getWebsite() {
        return $this->website;
    }

    public function setWebsite($website) {
        $this->website = $website;
    }

    public function getPrintName() {
        return $this->printName;
    }

    public function setPrintName($printName) {
        $this->printName = $printName;
    }

    public function getCrrency() {
        return $this->crrency;
    }

    public function setCrrency($crrency) {
        $this->crrency = $crrency;
    }

    public function getAccounttype() {
        return $this->accounttype;
    }

    public function setAccounttype($accounttype) {
        $this->accounttype = $accounttype;
    }

    public function getJoineddate() {
        return $this->joineddate;
    }

    public function setJoineddate($joineddate) {
        $this->joineddate = $joineddate;
    }
}
?>