<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('categories_model');
		$this->load->model('product_model');
		$this->load->model('orderdetails_model');
		$this->load->model('order_model');
    }
	
	public function index()
	{
		$condition1 = array('OrderId' => 0) ;
        $data['orderdetails']=$this->orderdetails_model->findAll($condition1);
		$data['categories']=$this->categories_model->findAll();
		$this->load->view('layout/head',$data);
		$this->load->view('layout/header');
		$this->load->view('order/content');
		$this->load->view('layout/footer');
		$this->load->view('layout/foot');
    }
	
	public function addOrder()
    {
       $customer_firstname=$this->input->post('customer_firstname');
	   $customer_lastname=$this->input->post('customer_lastname');
	   $address=$this->input->post('address');
	   $province=$this->input->post('province');
	   $towncity=$this->input->post('towncity');
	   $country=$this->input->post('country');
	   $postcode=$this->input->post('postcode');
	   $phone_no=$this->input->post('phone_no');
	   $email_address=$this->input->post('email_address');
       $data = array(
			"customer_name" =>"$customer_firstname $customer_lastname",
			"shipping_address"=>"$address, $province,$towncity, $country, $postcode",
			"phone_no"=>$phone_no,
			"email_address"=>$email_address,
			"order_status"=>"uncomplete"

       );
	   $id = $this->order_model->insert($data);
       if(!empty($id)){
            redirect('confirm');
       }else{
           echo "error";
	   }
	   
	}
	
	public function DelFromCart($orderdetails_id)
    {
        $data = array(
            "orderdetails_id" =>  $this->mongo_db->create_document_id($orderdetails_id)
       );
       $id = $this->orderdetails_model->remove($data);
       if(!empty($id)){
            redirect($_SERVER['HTTP_REFERER']);
       }else{
           echo "error";
       }
    }

}
