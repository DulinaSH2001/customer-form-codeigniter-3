<?php
Class Jobitemmodel extends CI_Model{
    var $jobitem_code= array();
    var $joborder_code;
    var $item_code= array();
    var $description= array();
    var $onhand= array();
    var $qty= array();
    var $rate= array();
    var $amount= array();
    var $discountpercent= array();
    var $discount= array();
    var $total= array();
    var $class= array();
    var $site= array();
    var $unit= array();
    var $name = array();
    var $category = array();

    public function getName() {
        return $this->name;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getJobitemCode() {
        return $this->jobitem_code;
    }

    public function getJoborderCode() {
        return $this->joborder_code;
    }

    public function getItemCode() {
        return $this->item_code;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getOnhand() {
        return $this->onhand;
    }

    public function getQty() {
        return $this->qty;
    }

    public function getRate() {
        return $this->rate;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getDiscountPercent() {
        return $this->discountpercent;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getClass() {
        return $this->class;
    }

    public function getSite() {
        return $this->site;
    }

    public function getUnit() {
        return $this->unit;
    }

    public function setJobitemCode($jobitem_code) {
        $this->jobitem_code = $jobitem_code;
    }

    public function setJoborderCode($joborder_code) {
        $this->joborder_code = $joborder_code;
    }

    public function setItemCode($item_code) {
        $this->item_code = $item_code;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setOnhand($onhand) {
        $this->onhand = $onhand;
    }

    public function setQty($qty) {
        $this->qty = $qty;
    }

    public function setRate($rate) {
        $this->rate = $rate;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setDiscountPercent($discountpercent) {
        $this->discountpercent = $discountpercent;
    }

    public function setDiscount($discount) {
        $this->discount = $discount;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setClass($class) {
        $this->class = $class;
    }

    public function setSite($site) {
        $this->site = $site;
    }

    public function setUnit($unit) {
        $this->unit = $unit;
    }
   
   
}



?>