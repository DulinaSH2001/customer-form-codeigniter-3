<?php
Class CustomerController extends CI_Controller{
   public function __construct() {
    parent::__construct();
    $this->load->model('Customermodel');
    $this->load->model('Customerservice');
    $this->load->model('Contactmodel');
   }

   function index(){
      $customerservice = new Customerservice();
      $data['customers'] = $customerservice->getall();
      $this->load->view('cus_table',$data);
   }


   function create_cus(){

    $customerservice = new Customerservice();
    $data['cus_code'] = $customerservice ->generate_customer_code();
    $this->load->view('create_cus',$data);
   }


   function save(){
      $customermodel = new Customermodel();
        $customerservice = new Customerservice();
        

      

      
        $customermodel->setCuscode($this->input->post('cusCode'));
        $customermodel->setCusname($this->input->post('cusName'));
        $customermodel->setCuscompany($this->input->post('companyName'));
        $customermodel->setMainphone($this->input->post('mainPhone'));
        $customermodel->setWorkphone($this->input->post('workPhone'));
        $customermodel->setMoblenumber($this->input->post('mobile'));
        $customermodel->setFaxnumber($this->input->post('fax'));
        $customermodel->setEmail($this->input->post('mainEmail'));
        $customermodel->setCcemail($this->input->post('ccEmail'));
        $customermodel->setWebsite($this->input->post('website'));
        $customermodel->setPrintName($this->input->post('printName'));
        $customermodel->setCrrency($this->input->post('currency'));
        $customermodel->setAccounttype($this->input->post('account'));
        $customermodel->setJoineddate($this->input->post('dateOfJoined'));

        


      $contactmodel = new Contactmodel();
      $contactmodel->setContactType($this->input->post('contact-title[]'));
      $contactmodel->setContactFullName($this->input->post('contact-name[]'));
      $contactmodel->setCuscode($this->input->post('cusCode'));

      
      $customerservice->saveContacts($contactmodel);
      
      $customerservice->save($customermodel);
      $this->index();


      
   }
   function edit($id,$cus_code){
      $cusID =$id.'/'.$cus_code;
      $customerservice = new Customerservice();
      $data['customer'] = $customerservice->getbyid($cusID);
      $this->load->view('edit_cus',$data);

     
   }

   function update(){
      $customermodel = new Customermodel();
      $customerservice = new Customerservice();
      $customermodel->setCuscode( $this->input->post('cusCode')) ;
      

      $customermodel->setCusname( $this->input->post('cusName')) ;
      $customermodel->setCuscompany( $this->input->post('companyName')) ;
      $customermodel->setMainphone( $this->input->post('mainPhone')) ;
      $customermodel->setWorkphone( $this->input->post('workPhone')) ;
      $customermodel->setMoblenumber( $this->input->post('mobile')) ;
      $customermodel->setFaxnumber( $this->input->post('fax')) ;
     
      $customermodel->setEmail( $this->input->post('mainEmail')) ;
      $customermodel->setCcemail( $this->input->post('ccEmail')) ;
      $customermodel->setWebsite( $this->input->post('website')) ;
      $customermodel->setPrintName( $this->input->post('printName')) ;
      $customermodel->setCrrency( $this->input->post('currency')) ;
      $customermodel->setAccounttype( $this->input->post('account')) ;
      $customermodel->setJoineddate( $this->input->post('dateOfJoined')) ;

      $contactmodel = new Contactmodel();
      $contactmodel->setContactType($this->input->post('contact-title[]'));
      $contactmodel->setContactFullName($this->input->post('contact-name[]'));
      $contactmodel->setCuscode($this->input->post('cusCode'));

      
      $customerservice->updateContacts($contactmodel);

   

      $customerservice->update($customermodel);
      $this->index();



      
   }

   function delete($id,$cus_code){
      $cusID =$id.'/'.$cus_code;
      $customerservice = new Customerservice();
      $customerservice->deletecustomer($cusID);
      
      
   }

   function deletecontact($contact_id,$id,$cus_code){
      $cusID =$id.'/'.$cus_code;
      $customerservice = new Customerservice();
      $customerservice->deletecontact($contact_id);
      $data['customer'] = $customerservice->getbyid($cusID);
      $this->load->view('edit_cus',$data);
   }

}




?>