<?php
Class InvoiceController extends CI_Controller {
    public function __construct() {
        parent::__construct();
       $this->load->model('Invoiceservice');
       $this->load->model('Invoicemodel');
       $this->load->model('Jobservice');
       $this->load->model('Itemservice');
       $this->load->model('Jobordermodel');
       $this->load->model('Jobitemmodel');
       $this->load->model('Customerservice');

       
    }

    public function index() {
        $Invoiceservice = new Invoiceservice();
        $data['invoices'] = $Invoiceservice->getInvoices();
        $this->load->view('invoice_table', $data);
    }
    public function store_invoice($joborder_code, $customer, $total) {
        $invoice = new Invoicemodel();
        $Invoiceservice =new Invoiceservice();
        $invoice->setInvoiceNum($Invoiceservice->create_invoice_no());
        $invoice->setJoNo($joborder_code);
        $invoice->setCustomer($customer);
        $invoice->setTotal($total);
       
        $Invoiceservice->storeInvoice($invoice);
        redirect('InvoiceController/index');
        
    }
    public function invoice(){
        $joborderservice = new Jobservice();
        $customerservice = new Customerservice();
        $data['joborders'] = $joborderservice->getalljoborders();
        $cusid = $joborderservice->getallcusid();
        if (!empty($cusid)) {
           $data['customers'] = $customerservice->getcustomername($cusid);
        }
     
        $data['jobitems']=$joborderservice->getalljobitems();
        
       
       
        $this->load->view('invoice',$data);
     
     
    }
  
      public function print_invoice($incoice_code){
        $joborderservice = new Jobservice();
        $customerservice = new Customerservice();
        $invoice = new Invoiceservice();
        $joborder_code = $invoice->getJobid($incoice_code);
        $data['joborder'] = $joborderservice->getjoborder($joborder_code);
        $data['jobitems']=$joborderservice->getjobitems($joborder_code);
        $data['incoice_code'] = $incoice_code;
        $cusid = $joborderservice->getallcusid();
        if (!empty($cusid)) {
           $data['customers'] = $customerservice->getcustomername($cusid);
        }
        $this->load->view('invoice_print',$data);
      }
     
      
     }



?>