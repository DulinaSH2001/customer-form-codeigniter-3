<?php
Class Customerservice extends CI_Model{

    function getall(){
        $this->db->select('*');
        $this->db->from('customers');
        $query = $this->db->get();
        return $query->result();

    }
    function save($customermodel){
        $data = array(
            'cus_code' => $this->generate_customer_code(),
            'customer' => $customermodel->getCusname(),
            'company_name' => $customermodel->getCuscompany(),
            'main_phone' => $customermodel->getMainphone(),
            'work_phone' => $customermodel->getWorkphone(),
            'mobile' => $customermodel->getMoblenumber(),
            'fax' => $customermodel->getFaxnumber(),
            'main_email' => $customermodel->getEmail(),
            'cc_email' => $customermodel->getCcemail(),
            'website' => $customermodel->getWebsite(),
            'print_name' => $customermodel->getPrintName(),
            'currency' => $customermodel->getCrrency(),
            'account' => $customermodel->getAccounttype(),
            'date_of_joined' => $customermodel->getJoineddate()
        );
        $this->db->insert('customers', $data);
    }

    public function saveContacts($contacts) {
        $contactTypes = $contacts->getContactType();
        $contactFullNames = $contacts->getContactFullName();
        $cusCode = $contacts->getCuscode();
        $count = count($contactFullNames);
          
        $contactData = array();

        for ($i = 0; $i < $count; $i++) {
            if (!empty($contactFullNames[$i])) {
            $contactData[] = array(
                'cus_code' => $cusCode,
                'contact_title' => $contactTypes[$i],
                'contact_name' => $contactFullNames[$i]
            );
            }
        }

        if (!empty($contactData)) {
            $this->db->insert_batch('customer_contacts', $contactData);
        }

        return true;
    }
    
     function generate_customer_code() {
        $this->db->select('cus_code');
        $this->db->order_by('cus_code', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('customers');

        if ($query->num_rows() > 0) {
            $last_code = $query->row()->cus_code;
            $number = (int) substr($last_code, 4);
            $number++;
            return 'CUS/' . str_pad($number, 4, '0', STR_PAD_LEFT);
        } else {
            return 'CUS/0001';
        }
    }
    function getbyid($cus_code){
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->where('cus_code',$cus_code);
        $query = $this->db->get();
        $customer = $query->row();

        $this->db->select('*');
        $this->db->from('customer_contacts');
        $this->db->where('cus_code',$cus_code);
        $query = $this->db->get();
        $contacts = $query->result();

        $customer->contacts = $contacts;

        return $customer;
    }

    function update($customermodel){
        $data = array(
            'cus_code' => $customermodel->getCuscode(),
            'customer' => $customermodel->getCusname(),
            'company_name' => $customermodel->getCuscompany(),
            'main_phone' => $customermodel->getMainphone(),
            'work_phone' => $customermodel->getWorkphone(),
            'mobile' => $customermodel->getMoblenumber(),
            'fax' => $customermodel->getFaxnumber(),
            'main_email' => $customermodel->getEmail(),
            'cc_email' => $customermodel->getCcemail(),
            'website' => $customermodel->getWebsite(),
            'print_name' => $customermodel->getPrintName(),
            'currency' => $customermodel->getCrrency(),
            'account' => $customermodel->getAccounttype(),
            'date_of_joined' => $customermodel->getJoineddate()
        );
        $this->db->where('cus_code',$customermodel->getCuscode());
        $this->db->update('customers',$data);
        
    }
    function deletecustomer($id){
        $this->db->where('cus_code',$id);
        $this->db->delete('customers');
        
        $this->db->where('cus_code', $id);
        $this->db->delete('customer_contacts');
    }

    function deleteContact($id){
        $this->db->where('id',$id);
        $this->db->delete('customer_contacts');
    }

    public function updateContacts($contacts) {
        $contactTypes = $contacts->getContactType();
        $contactFullNames = $contacts->getContactFullName();
        $cusCode = $contacts->getCuscode();
        $this->db->where('cus_code', $cusCode);
        $this->db->delete('customer_contacts');
        $count =  count($contactFullNames);
          
        $contactData = array();

        for ($i = 0; $i < $count; $i++) {
            if (!empty($contactFullNames[$i])) {
            $contactData[] = array(
                'cus_code' => $cusCode,
                'contact_title' => $contactTypes[$i],
                'contact_name' => $contactFullNames[$i]
            );
            }
        }

        if (!empty($contactData)) {
            $this->db->insert_batch('customer_contacts', $contactData);
        }

        return true;
    }
    public function getcustomername($cuscode){
        $cusCodesArray = array_map(function($obj) {
            return $obj->cus_code;
        }, $cuscode);
    
       
        $this->db->select('cus_code,customer');
        $this->db->from('customers');
        $this->db->where_in('cus_code', $cusCodesArray);
        $query = $this->db->get();
    
        return $query->result();
    }
    public function insert_excel($sheetData){

        $data = [];
        foreach ($sheetData as $key => $value) {
            if ($key == 1) continue; // Skip the header row
            $data[] = [
                'cus_code' => $value['A'],
                'customer' => $value['B'],
                'main_email' => $value['C'],
                'company_name' => $value['D'],
                'cc_email' => $value['E'],
                'main_phone' => $value['F'],
                'website' => $value['G'],
                'work_phone' => $value['H'],
                'print_name' => $value['I'],
                'mobile' => $value['J'],
                'currency' => $value['K'],
                'fax' => $value['L'],
                'account' => $value['M'],
                'date_of_joined' => $value['N'],
            ];
        }
        
        $this->db->insert_batch('customers', $data);
    }

    
 
}?>