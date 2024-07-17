<?php 

Class JobController extends CI_Controller{

    
   public function __construct() {
    parent::__construct();
    $this->load->model('Jobservice');
    $this->load->model('Itemservice');
    $this->load->model('Jobordermodel');
    $this->load->model('Jobitemmodel');
    $this->load->model('Customerservice');
   
   }

function index(){
   $joborderservice = new Jobservice();
   $customerservice = new Customerservice();
   $data['joborders'] = $joborderservice->getalljoborders();
   $cusid = $joborderservice->getallcusid();
   if (!empty($cusid)) {
      $data['customers'] = $customerservice->getcustomername($cusid);
   }
  
   $this->load->view('job_order_table',$data);


}

public function createjob() {
   $joborderservice = new Jobservice();
   $itemservice = new Itemservice();
   $data['joborder_code'] = $joborderservice->generate_joborder_code();
   $data['customers'] = $joborderservice->getallcustormer();
   $data['items'] = $itemservice->getallitem();
   $this->load->view('job_order', $data);
}

 function savejob(){
      $jobordermodel = new Jobordermodel();
      $jobitemmodel = new Jobitemmodel();
      
      $jobordermodel->set_joborder_code($this->input->post('joNo'));
      $jobordermodel->set_date($this->input->post('date'));
      $jobordermodel->set_cus_code($this->input->post('cuscode'));
      $jobordermodel->set_class($this->input->post('jclass'));
      $jobordermodel->set_site($this->input->post('jsite'));
      $jobordermodel->set_address($this->input->post('address'));
      $jobordermodel->set_delivery_destination($this->input->post('delivery_destination'));
      $jobordermodel->set_order_by($this->input->post('order'));
      $jobordermodel->set_checked_by($this->input->post('checkedBy'));
      $jobordermodel->set_rep($this->input->post('rep'));
      $jobordermodel->set_ship_via($this->input->post('shipvia'));
      $jobordermodel->set_reference_no($this->input->post('reference_no'));
      $jobordermodel->set_expected_date($this->input->post('expected_date'));
      $jobordermodel->set_attent($this->input->post('attent'));
      $jobordermodel->set_terms($this->input->post('terms'));
      $jobordermodel->set_due_date($this->input->post('due_date'));
      $jobordermodel->set_tqty($this->input->post('sumQty'));
      $jobordermodel->set_tamount($this->input->post('sumAmount'));
      $jobordermodel->set_tdiscount($this->input->post('sumDiscount'));
      $jobordermodel->set_total($this->input->post('sumTotal'));
      $jobordermodel->set_ex_rate($this->input->post('ex_rate'));
      $jobordermodel->set_lkr_total_amount($this->input->post('totalAmount'));
      $jobordermodel->set_account($this->input->post('account'));
      $jobordermodel->set_nbt_percent($this->input->post('nbt_percent'));
      $jobordermodel->set_nbt($this->input->post('nbt'));
      $jobordermodel->set_ub_total($this->input->post('sub_total'));
      $jobordermodel->set_vat_percent($this->input->post('vat_percent'));
      $jobordermodel->set_vat($this->input->post('vat'));
      $jobordermodel->set_final_total($this->input->post('final_total'));
      $jobordermodel->set_memo($this->input->post('memo'));

      //print_r($jobordermodel);
      

      $jobitemmodel->setJoborderCode($this->input->post('joNo'));
      $jobitemmodel->setItemCode($this->input->post('itemcode[]'));
      $jobitemmodel->setDescription($this->input->post('description[]'));
      
      $jobitemmodel->setOnhand($this->input->post('onhand[]'));
      $jobitemmodel->setQty($this->input->post('qty[]'));
      $jobitemmodel->setRate($this->input->post('rate[]'));
      $jobitemmodel->setAmount($this->input->post('amount[]'));
      $jobitemmodel->setDiscountPercent($this->input->post('discountpercent[]'));
      $jobitemmodel->setDiscount($this->input->post('discount[]'));
      $jobitemmodel->setTotal($this->input->post('total[]'));
      $jobitemmodel->setClass($this->input->post('class[]'));
      $jobitemmodel->setSite($this->input->post('site[]'));
      $jobitemmodel->setUnit($this->input->post('unit[]'));
      $jobitemmodel->setCategory($this->input->post('category[]'));
      $jobitemmodel->setName($this->input->post('name[]'));

      
      //print_r($jobitemmodel);

      $joborderservice = new Jobservice();
      $joborderservice->saveitem($jobitemmodel);
      $joborderservice->savejoborder($jobordermodel);
      redirect('JobController/index');
      
 }

 public function editjob($joborder_code){
      $joborderservice = new Jobservice();
      $itemservice = new Itemservice();
      $data['customers'] = $joborderservice->getallcustormer();
      $data['items'] = $itemservice->getallitem();
      $data['joborder'] = $joborderservice->getjoborder($joborder_code);
      $data['jobitems'] = $joborderservice->getjobitems($joborder_code);
      $this->load->view('edit_job_order', $data);
 }

 public function updatejob(){
   $jobordermodel = new Jobordermodel();
   $jobitemmodel = new Jobitemmodel();
   
   $jobordermodel->set_joborder_code($this->input->post('joNo'));
   $jobordermodel->set_date($this->input->post('date'));
   $jobordermodel->set_cus_code($this->input->post('cuscode'));
   $jobordermodel->set_class($this->input->post('jclass'));
   $jobordermodel->set_site($this->input->post('jsite'));
   $jobordermodel->set_address($this->input->post('address'));
   $jobordermodel->set_delivery_destination($this->input->post('delivery_destination'));
   $jobordermodel->set_order_by($this->input->post('order'));
   $jobordermodel->set_checked_by($this->input->post('checkedBy'));
   $jobordermodel->set_rep($this->input->post('rep'));
   $jobordermodel->set_ship_via($this->input->post('shipvia'));
   $jobordermodel->set_reference_no($this->input->post('reference_no'));
   $jobordermodel->set_expected_date($this->input->post('expected_date'));
   $jobordermodel->set_attent($this->input->post('attent'));
   $jobordermodel->set_terms($this->input->post('terms'));
   $jobordermodel->set_due_date($this->input->post('due_date'));
   $jobordermodel->set_tqty($this->input->post('sumQty'));
   $jobordermodel->set_tamount($this->input->post('sumAmount'));
   $jobordermodel->set_tdiscount($this->input->post('sumDiscount'));
   $jobordermodel->set_total($this->input->post('sumTotal'));
   $jobordermodel->set_ex_rate($this->input->post('ex_rate'));
   $jobordermodel->set_lkr_total_amount($this->input->post('totalAmount'));
   $jobordermodel->set_account($this->input->post('account'));
   $jobordermodel->set_nbt_percent($this->input->post('nbt_percent'));
   $jobordermodel->set_nbt($this->input->post('nbt'));
   $jobordermodel->set_ub_total($this->input->post('sub_total'));
   $jobordermodel->set_vat_percent($this->input->post('vat_percent'));
   $jobordermodel->set_vat($this->input->post('vat'));
   $jobordermodel->set_final_total($this->input->post('final_total'));
   $jobordermodel->set_memo($this->input->post('memo'));

  
   

   $jobitemmodel->setJoborderCode($this->input->post('joNo'));
   $jobitemmodel->setItemCode($this->input->post('itemcode[]'));
   $jobitemmodel->setDescription($this->input->post('description[]'));
   $jobitemmodel->setOnhand($this->input->post('onhand[]'));
   $jobitemmodel->setQty($this->input->post('qty[]'));
   $jobitemmodel->setRate($this->input->post('rate[]'));
   $jobitemmodel->setAmount($this->input->post('amount[]'));
   $jobitemmodel->setDiscountPercent($this->input->post('discountpercent[]'));
   $jobitemmodel->setDiscount($this->input->post('discount[]'));
   $jobitemmodel->setTotal($this->input->post('total[]'));
   $jobitemmodel->setClass($this->input->post('class[]'));
   $jobitemmodel->setSite($this->input->post('site[]'));
   $jobitemmodel->setUnit($this->input->post('unit[]'));

   $joborderservice = new Jobservice();
   $joborderservice->updatejobitem($jobitemmodel);
   $joborderservice->updatejoborder($jobordermodel);
   redirect('JobController/index');
   

 }

 public function deletejob($joborder_code){
      $joborderservice = new Jobservice();
      $joborderservice->deletejoborder($joborder_code);
      $joborderservice->deletejobitems($joborder_code);
      redirect('JobController/index');
 }
public function delete_job_item($joborder_code, $joborder_item_code){
      $joborderservice = new Jobservice();
      $joborderservice->deletejobitem($joborder_item_code);
      $this->editjob($joborder_code);
 }



}

?>