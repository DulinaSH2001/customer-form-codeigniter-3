<?php 
Class Jobordermodel extends CI_Model{
    var $joborder_code;
    var $date;
    var $cus_code;
    var $class;
    var $site;
    var $address;
    var $delivery_destination;
    var $order_by;
    var $checked_by;
    var $rep;
    var $ship_via;
    var $reference_no;
    var $expected_date;
    var $attent;
    var $terms;
    var $due_date;
    var $tqty;
    var $tamount;
    var $tdiscount;
    var $total;
    var $ex_rate;
    var $lkr_total_amount;
    var $account;
    var $nbt_percent;
    var $nbt;
    var $ub_total;
    var $vat_percent;
    var $vat;
    var $final_total;
    var $memo;
    public function get_joborder_code() {
        return $this->joborder_code;
    }

    public function get_date() {
        return $this->date;
    }

    public function get_cus_code() {
        return $this->cus_code;
    }

    public function get_class() {
        return $this->class;
    }

    public function get_site() {
        return $this->site;
    }

    public function get_address() {
        return $this->address;
    }

    public function get_delivery_destination() {
        return $this->delivery_destination;
    }

    public function get_order_by() {
        return $this->order_by;
    }

    public function get_checked_by() {
        return $this->checked_by;
    }

    public function get_rep() {
        return $this->rep;
    }

    public function get_ship_via() {
        return $this->ship_via;
    }

    public function get_reference_no() {
        return $this->reference_no;
    }

    public function get_expected_date() {
        return $this->expected_date;
    }

    public function get_attent() {
        return $this->attent;
    }

    public function get_terms() {
        return $this->terms;
    }

    public function get_due_date() {
        return $this->due_date;
    }

    public function get_tqty() {
        return $this->tqty;
    }

    public function get_tamount() {
        return $this->tamount;
    }

    public function get_tdiscount() {
        return $this->tdiscount;
    }

    public function get_total() {
        return $this->total;
    }

    public function get_ex_rate() {
        return $this->ex_rate;
    }

    public function get_lkr_total_amount() {
        return $this->lkr_total_amount;
    }

    public function get_account() {
        return $this->account;
    }

    public function get_nbt_percent() {
        return $this->nbt_percent;
    }

    public function get_nbt() {
        return $this->nbt;
    }

    public function get_ub_total() {
        return $this->ub_total;
    }

    public function get_vat_percent() {
        return $this->vat_percent;
    }

    public function get_vat() {
        return $this->vat;
    }

    public function get_final_total() {
        return $this->final_total;
    }

    public function get_memo() {
        return $this->memo;
    }

    // Setters
    public function set_joborder_code($joborder_code) {
        $this->joborder_code = $joborder_code;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function set_cus_code($cus_code) {
        $this->cus_code = $cus_code;
    }

    public function set_class($class) {
        $this->class = $class;
    }

    public function set_site($site) {
        $this->site = $site;
    }

    public function set_address($address) {
        $this->address = $address;
    }

    public function set_delivery_destination($delivery_destination) {
        $this->delivery_destination = $delivery_destination;
    }

    public function set_order_by($order_by) {
        $this->order_by = $order_by;
    }

    public function set_checked_by($checked_by) {
        $this->checked_by = $checked_by;
    }

    public function set_rep($rep) {
        $this->rep = $rep;
    }

    public function set_ship_via($ship_via) {
        $this->ship_via = $ship_via;
    }

    public function set_reference_no($reference_no) {
        $this->reference_no = $reference_no;
    }

    public function set_expected_date($expected_date) {
        $this->expected_date = $expected_date;
    }

    public function set_attent($attent) {
        $this->attent = $attent;
    }

    public function set_terms($terms) {
        $this->terms = $terms;
    }

    public function set_due_date($due_date) {
        $this->due_date = $due_date;
    }

    public function set_tqty($tqty) {
        $this->tqty = $tqty;
    }

    public function set_tamount($tamount) {
        $this->tamount = $tamount;
    }

    public function set_tdiscount($tdiscount) {
        $this->tdiscount = $tdiscount;
    }

    public function set_total($total) {
        $this->total = $total;
    }

    public function set_ex_rate($ex_rate) {
        $this->ex_rate = $ex_rate;
    }

    public function set_lkr_total_amount($lkr_total_amount) {
        $this->lkr_total_amount = $lkr_total_amount;
    }

    public function set_account($account) {
        $this->account = $account;
    }

    public function set_nbt_percent($nbt_percent) {
        $this->nbt_percent = $nbt_percent;
    }

    public function set_nbt($nbt) {
        $this->nbt = $nbt;
    }

    public function set_ub_total($ub_total) {
        $this->ub_total = $ub_total;
    }

    public function set_vat_percent($vat_percent) {
        $this->vat_percent = $vat_percent;
    }

    public function set_vat($vat) {
        $this->vat = $vat;
    }

    public function set_final_total($final_total) {
        $this->final_total = $final_total;
    }

    public function set_memo($memo) {
        $this->memo = $memo;
    }

    
    
    
}


?>