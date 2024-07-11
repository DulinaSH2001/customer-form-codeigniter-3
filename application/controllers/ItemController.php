<?php

Class ItemController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Itemmodel');
        $this->load->model('Itemservice');
    }

    function index(){
        $itemservice = new Itemservice();
        $data['items'] = $itemservice->getallitem();
        $this->load->view('item_table',$data);

    }

    function createitem(){
        $itemservice =new Itemservice();
        $data['itemcode'] =$itemservice->generate_item_code();
        $this->load->view('create_items',$data);
    }

    function saveitem(){
        $itemservice = new Itemservice();
        $itemmodel =new Itemmodel();

        $itemmodel->setItemcode($this->input->post('itemCode'));
        $itemmodel->setItemname($this->input->post('itemName'));
        $itemmodel->setItemdescription($this->input->post('description'));
        $itemmodel->setItemrate($this->input->post('itemPrice'));

        $itemservice->saveitem($itemmodel);
        $this->index();

    }


    function edit ($itemcode){
        $itemservice = new Itemservice();
        $data['item'] = $itemservice->getbyid($itemcode);
        $this->load->view('edit_item',$data);
        
    }

    function update(){
        $itemservice = new Itemservice();
        $itemmodel = new Itemmodel();

        $itemmodel->setItemcode($this->input->post('itemCode'));
        $itemmodel->setItemname($this->input->post('itemName'));
        $itemmodel->setItemdescription($this->input->post('description'));
        $itemmodel->setItemrate($this->input->post('itemPrice'));

        

        $itemservice->updateitem($itemmodel);
        $this->index();
    }

    function delete($itemcode){
        $itemservice = new Itemservice();
        $itemservice->deleteitem($itemcode);
        $this->index();
    }


    
}
?>