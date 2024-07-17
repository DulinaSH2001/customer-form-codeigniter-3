<?php

Class Jobservice extends CI_Model{


    function getallcustormer(){
        $this->db->select('customer,cus_code');
        $this->db->from('customers');
        $query = $this->db->get();
        return $query->result();

    }
    function generate_joborder_code() {
        $this->db->select('jo_no');
        $this->db->order_by('jo_no', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('job_orders');

        if ($query->num_rows() > 0) {
            $last_code = $query->row()->jo_no;
            $number = (int) substr($last_code, 6);
            $number++;
            return 'JO' . str_pad($number, 6, '0', STR_PAD_LEFT);
        } else {
            return 'JO000001';
        }
    }

    function savejoborder($joborder){

        $data = array(
            'jo_no' =>$joborder->get_joborder_code(),
            'date' =>$joborder->get_date(),
            'cus_code' =>$joborder->get_cus_code(),
            'class' =>$joborder->get_class(),
            'site' =>$joborder->get_site(),
            'address' =>$joborder->get_address(),
            'delivery_destination' =>$joborder->get_delivery_destination(),
            'order_by' =>$joborder->get_order_by(),
            'checked_by' =>$joborder->get_checked_by(),
            'rep' =>$joborder->get_rep(),
            'ship_via' =>$joborder->get_ship_via(),
            'reference_no' =>$joborder->get_reference_no(),
            'expected_date' =>$joborder->get_expected_date(),
            'attent' =>$joborder->get_attent(),
            'terms' =>$joborder->get_terms(),
            'due_date' =>$joborder->get_due_date(),
            'tqty' =>$joborder->get_tqty(),
            'tamount' =>$joborder->get_tamount(),
            'tdiscount' =>$joborder->get_tdiscount(),
            'total' =>$joborder->get_total(),
            'ex_rate' =>$joborder->get_ex_rate(),
            'lkr_total_amount' =>$joborder->get_lkr_total_amount(),
            'account' =>$joborder->get_account(),
            'nbt_percent' =>$joborder->get_nbt_percent(),
            'nbt' =>$joborder->get_nbt(),
            'sub_total' =>$joborder->get_ub_total(),
            'vat_percent' =>$joborder->get_vat_percent(),
            'vat' =>$joborder->get_vat(),
            'final_total' =>$joborder->get_final_total(),
            'memo' =>$joborder->get_memo()
        );
        
        $this->db->insert('job_orders', $data);	
    }
    function saveitem($jobitemmodel){
      $joborder_code = $jobitemmodel->getJoborderCode();
        $item_code = $jobitemmodel->getItemCode();
        $description = $jobitemmodel->getDescription();
        $onhand = $jobitemmodel->getOnhand();
        $qty = $jobitemmodel->getQty();
        $rate = $jobitemmodel->getRate();
        $amount = $jobitemmodel->getAmount();
        $discountpercent = $jobitemmodel->getDiscountPercent();
        $discount = $jobitemmodel->getDiscount();
        $total = $jobitemmodel->getTotal();
        $class = $jobitemmodel->getClass();
        $site = $jobitemmodel->getSite();
        $unit = $jobitemmodel->getUnit();
        $category = $jobitemmodel->getCategory();
        $name = $jobitemmodel->getName();

        $count = count($item_code);
        $itemData = array();
        for ($i = 0; $i < $count; $i++) {
            if (!empty($item_code[$i])) {
            $itemData[] = array(
                'jo_no' => $joborder_code,
                'item_code' => $item_code[$i],
                'description' => $description[$i],
                'onhand' => $onhand[$i],
                'qty' => $qty[$i],
                'rate' => $rate[$i],
                'amount' => $amount[$i],
                'discountpercent' => $discountpercent[$i],
                'discount' => $discount[$i],
                'total' => $total[$i],
                'class' => $class[$i],
                'site' => $site[$i],
                'unit' => $unit[$i],
                'category' => $category[$i],
                'name' => $name[$i]
            );
            }
        }
        if (!empty($itemData)) {
            $this->db->insert_batch('job_order_items', $itemData);
        }
        return true;
    }
    function getjoborder($joborder_code){
        $this->db->select('*');
        $this->db->from('job_orders');
        $this->db->where('jo_no', $joborder_code);
        $query = $this->db->get();
        return $query->row();
      
    }
    function getalljoborders(){
        $this->db->select('*');
        $this->db->from('job_orders');
        $query = $this->db->get();
        return $query->result();
    }
    function updatejoborder($joborder){
        $data = array(
            'date' =>$joborder->get_date(),
            'cus_code' =>$joborder->get_cus_code(),
            'class' =>$joborder->get_class(),
            'site' =>$joborder->get_site(),
            'address' =>$joborder->get_address(),
            'delivery_destination' =>$joborder->get_delivery_destination(),
            'order_by' =>$joborder->get_order_by(),
            'checked_by' =>$joborder->get_checked_by(),
            'rep' =>$joborder->get_rep(),
            'ship_via' =>$joborder->get_ship_via(),
            'reference_no' =>$joborder->get_reference_no(),
            'expected_date' =>$joborder->get_expected_date(),
            'attent' =>$joborder->get_attent(),
            'terms' =>$joborder->get_terms(),
            'due_date' =>$joborder->get_due_date(),
            'tqty' =>$joborder->get_tqty(),
            'tamount' =>$joborder->get_tamount(),
            'tdiscount' =>$joborder->get_tdiscount(),
            'total' =>$joborder->get_total(),
            'ex_rate' =>$joborder->get_ex_rate(),
            'lkr_total_amount' =>$joborder->get_lkr_total_amount(),
            'account' =>$joborder->get_account(),
            'nbt_percent' =>$joborder->get_nbt_percent(),
            'nbt' =>$joborder->get_nbt(),
            'sub_total' =>$joborder->get_ub_total(),
            'vat_percent' =>$joborder->get_vat_percent(),
            'vat' =>$joborder->get_vat(),
            'final_total' =>$joborder->get_final_total(),
            'memo' =>$joborder->get_memo()
        );
        $this->db->where('jo_no', $joborder->get_joborder_code());
        $this->db->update('job_orders', $data);
    }
    function updatejobitem($jobitemmodel){
        $joborder_code = $jobitemmodel->getJoborderCode();
        $item_code = $jobitemmodel->getItemCode();
        $description = $jobitemmodel->getDescription();
        $onhand = $jobitemmodel->getOnhand();
        $qty = $jobitemmodel->getQty();
        $rate = $jobitemmodel->getRate();
        $amount = $jobitemmodel->getAmount();
        $discountpercent = $jobitemmodel->getDiscountPercent();
        $discount = $jobitemmodel->getDiscount();
        $total = $jobitemmodel->getTotal();
        $class = $jobitemmodel->getClass();
        $site = $jobitemmodel->getSite();
        $unit = $jobitemmodel->getUnit();
        $category = $jobitemmodel->getCategory();
        $name = $jobitemmodel->getName();
        $count = count($item_code);

        $itemData = array();
        for ($i = 0; $i < $count; $i++) {
            if (!empty($item_code[$i])) {
            $itemData[] = array(
                'jo_no' => $joborder_code,
                'item_code' => $item_code[$i],
                'description' => $description[$i],
                'onhand' => $onhand[$i],
                'qty' => $qty[$i],
                'rate' => $rate[$i],
                'amount' => $amount[$i],
                'discountpercent' => $discountpercent[$i],
                'discount' => $discount[$i],
                'total' => $total[$i],
                'class' => $class[$i],
                'site' => $site[$i],
                'unit' => $unit[$i],
                'category' => $category[$i],
                'name' => $name[$i]
            );
            }
        }
        if (!empty($itemData)) {
            $this->deletejobitems($joborder_code);
            $this->db->insert_batch('job_order_items', $itemData);
        }
        return true;
    }
    function getallcusid(){
        $this->db->select('cus_code');
        $this->db->from('job_orders');
        $query = $this->db->get();
        return $query->result();
    }
    function getjobitems($joborder_code){
        $this->db->select('*');
        $this->db->from('job_order_items');
        $this->db->where('jo_no', $joborder_code);
        $query = $this->db->get();
        return $query->result();
    }

    function deletejoborder($joborder_code){
        $this->db->where('jo_no', $joborder_code);
        $this->db->delete('job_orders');
    }
    function deletejobitems($joborder_code){
        $this->db->where('jo_no', $joborder_code);
        $this->db->delete('job_order_items');
    }
    function deletejobitem($joborder_item_code){
        $this->db->where('id', $joborder_item_code);
        $this->db->delete('job_order_items');
    }
    function getalljobitems(){
        $this->db->select('*');
        $this->db->from('job_order_items');
        $query = $this->db->get();
        return $query->result();
    }
    function getjobitem($joborder_item_code){
        $this->db->select('*');
        $this->db->from('job_order_items');
        $this->db->where('id', $joborder_item_code);
        $query = $this->db->get();
        return $query->row();
    }


}
?>