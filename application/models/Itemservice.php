<?php
Class Itemservice extends CI_Model{
    function getallitem(){
        $this->db->select('*');
        $this->db->from('items');
        $query = $this->db->get();
        return $query->result();
    }
    function generate_item_code() {
        $this->db->select('itemcode');
        $this->db->order_by('itemcode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('items');

        if ($query->num_rows() > 0) {
            $last_code = $query->row()->itemcode;
            $number = (int) substr($last_code, 6);
            $number++;
            return 'IM' . str_pad($number, 6, '0', STR_PAD_LEFT);
        } else {
            return 'IM000001';
        }
    }

    function saveitem($item){
        $data = array(
            'itemcode' => $item->getItemcode(),
            'itemname' => $item->getItemname(),
            'itemrate' => $item->getItemrate(),
            'itemdescription' => $item->getItemdescription(),
            'itemcategory' => $item->getItemcategory()

        );


        $this->db->insert('items',$data);

    }

    function getbyid($itemcode){
        $this->db->select('*');
        $this->db->from('items');
        $this->db->where('itemcode',$itemcode);
        $query = $this->db->get();
        return $query->row();
    }

    function deleteitem($itemcode){
        $this->db->where('itemcode',$itemcode);
        $this->db->delete('items');
    }

    function updateitem($item){
        $data = array(
            'itemname' => $item->getItemname(),
            'itemrate' => $item->getItemrate(),
            'itemdescription' => $item->getItemdescription(),
            'itemcategory' => $item->getItemcategory()
        );

        $this->db->where('itemcode',$item->getItemcode());
        $this->db->update('items',$data);
    }
}