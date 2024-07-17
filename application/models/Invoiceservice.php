<?php 
Class Invoiceservice extends CI_Model {
    public function getInvoices() {
        $this->db->select('*');
        $this->db->from('invoice');
        $query = $this->db->get();
        return $query->result();
    }

    public function storeInvoice($invoice) {
        $data = array(
            'in_no' => $invoice->getInvoiceNum(),
            'jo_no' => $invoice->getJoNo(),
            'customer' => $invoice->getCustomer(),
            'total' => $invoice->getTotal()
        );
        $this->db->insert('invoice', $data);
      
    }

    public function create_invoice_no(){
        $this->db->select('in_no');
        $this->db->order_by('in_no', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('invoice');

        if ($query->num_rows() > 0) {
            $last_code = $query->row()->in_no;
            $number = (int) substr($last_code, 6);
            $number++;
            return 'INV' . str_pad($number, 6, '0', STR_PAD_LEFT);
        } else {
            return 'INV000001';
        }


    }
    public function getJobid($in_no){
        $this->db->select('jo_no');
        $this->db->from('invoice');
        $this->db->where('in_no',$in_no);
        $query = $this->db->get();
        return $query->row()->jo_no;
    }
    public function getmonthly_sale(){
        $this->db->select('*');
        $this->db->from('job_order_items');
        $query = $this->db->get();
        return $query->result(); 
    }
    
}
?>