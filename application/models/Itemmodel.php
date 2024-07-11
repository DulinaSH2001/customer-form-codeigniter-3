<?php 
Class Itemmodel extends CI_Model{

    var $itemcode;
    var $itemname;
    var $itemrate;
    var $itemdescription;

    public function getItemcode()
    {
        return $this->itemcode;
    }

    public function setItemcode($itemcode)
    {
        $this->itemcode = $itemcode;
    }

    public function getItemname()
    {
        return $this->itemname;
    }

    public function setItemname($itemname)
    {
        $this->itemname = $itemname;
    }

    public function getItemrate()
    {
        return $this->itemrate;
    }

    public function setItemrate($itemrate)
    {
        $this->itemrate = $itemrate;
    }

    public function getItemdescription()
    {
        return $this->itemdescription;
    }

    public function setItemdescription($itemdescription)
    {
        $this->itemdescription = $itemdescription;
    }
}