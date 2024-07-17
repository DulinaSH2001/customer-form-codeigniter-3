<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require './vendor/autoload.php';
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
      redirect('CustomerController/index');
      
      
   }
   function uploadexcel(){
      $this->load->view('excel_upload');

   }

   function deletecontact($contact_id,$id,$cus_code){
      $cusID =$id.'/'.$cus_code;
      $customerservice = new Customerservice();
      $customerservice->deletecontact($contact_id);
      $data['customer'] = $customerservice->getbyid($cusID);
      $this->load->view('edit_cus',$data);
   }
   
   
   public function import_excel() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $upload_status = $this->uploadDoc();
          if ($upload_status != false) {
              $inputFilename = 'assets/uploads/imports/' . $upload_status;
              $inputfiletype = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFilename);
              $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputfiletype);
              $spreadsheet = $reader->load($inputFilename);
              $sheet = $spreadsheet->getSheet(0);
  
              $customerModels = array();
              foreach ($sheet->getRowIterator() as $row) {
                  $rowIndex = $row->getRowIndex();
                  if ($rowIndex == 1) continue;
  
                  $customermodel = new Customermodel();
                  $customermodel->setCusname($spreadsheet->getActiveSheet()->getCell('A' . $rowIndex)->getValue());
                  $customermodel->setCuscompany($spreadsheet->getActiveSheet()->getCell('B' . $rowIndex)->getValue());
                  $customermodel->setMainphone($spreadsheet->getActiveSheet()->getCell('C' . $rowIndex)->getValue());
                  $customermodel->setWorkphone($spreadsheet->getActiveSheet()->getCell('D' . $rowIndex)->getValue());
                  $customermodel->setMoblenumber($spreadsheet->getActiveSheet()->getCell('E' . $rowIndex)->getValue());
                  $customermodel->setFaxnumber($spreadsheet->getActiveSheet()->getCell('F' . $rowIndex)->getValue());
                  $customermodel->setEmail($spreadsheet->getActiveSheet()->getCell('G' . $rowIndex)->getValue());
                  $customermodel->setCcemail($spreadsheet->getActiveSheet()->getCell('H' . $rowIndex)->getValue());
                  $customermodel->setWebsite($spreadsheet->getActiveSheet()->getCell('I' . $rowIndex)->getValue());
                  $customermodel->setPrintName($spreadsheet->getActiveSheet()->getCell('J' . $rowIndex)->getValue());
                  $customermodel->setCrrency($spreadsheet->getActiveSheet()->getCell('K' . $rowIndex)->getValue());
                  $customermodel->setAccounttype($spreadsheet->getActiveSheet()->getCell('L' . $rowIndex)->getValue());
                  $customermodel->setJoineddate($spreadsheet->getActiveSheet()->getCell('M' . $rowIndex)->getValue());
                 
  
                  $customerModels[] = $customermodel;
              }
  
              $customerservice = new Customerservice();
              $customerservice->excel_save($customerModels);
              $this->index();
          } else {
              echo 'Error uploading file';
          }
      } else {
          $this->index();
      }
  }

  private function uploadDoc() {
   $uploadpath = 'assets/uploads/imports/';

   if (!is_dir($uploadpath)) {
       mkdir($uploadpath, 0777, true);
   }

   $config['upload_path'] = $uploadpath;
   $config['allowed_types'] = 'xlsx';
   $config['max_size'] = 100000;
   

   $this->load->library('upload', $config);
   $this->upload->initialize($config);
 
if ($this->upload->do_upload('upload_excel')) {
   $filedata = $this->upload->data();
   return $filedata['file_name'];
} else {
   //echo $this->upload->display_errors();
   return false;
}
}

}




?>