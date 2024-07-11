<?php
Class Invoicemodel extends CI_Model{

    var $invoiceNum;
    
    var $jo_no;
    
    var $customer;
    
    var $date;

    var $total;
    public function getInvoiceNum()
    {
        return $this->invoiceNum;
    }

    public function setInvoiceNum($invoiceNum)
    {
        $this->invoiceNum = $invoiceNum;
    }

    public function getJoNo()
    {
        return $this->jo_no;
    }

    public function setJoNo($joNo)
    {
        $this->jo_no = $joNo;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }


}


?>