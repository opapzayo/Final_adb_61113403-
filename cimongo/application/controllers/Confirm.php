<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm extends CI_Controller {

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
		$condition1 = array('OrderId' =>0) ;
		$condition2 = array('order_status' => "uncomplete") ;
		$data['orderdetails']=$this->orderdetails_model->findAll($condition1);
		$data['order']=$this->order_model->findAll($condition2);
		$data['categories']=$this->categories_model->findAll();
		$data['products']=$this->product_model->findAll();
		$this->load->view('layout/head',$data);
		$this->load->view('layout/header');
		$this->load->view('confirm/content');
		$this->load->view('layout/footer');
		$this->load->view('layout/foot');
	}

	public function updateOrderId($orderId)
    {
		$id=$this->mongo_db->set('OrderId', $this->mongo_db->create_document_id($orderId))->where('OrderId' , 0)->updateAll('orderdetails');
		$id=$this->mongo_db->setCurrentDate('orderDate', 'date')->where('order_status' ,"uncomplete")->updateAll('order');
		$id=$this->mongo_db->set('order_status', "complete")->where('order_status' ,"uncomplete")->updateAll('order');
       if(!empty($id)){
            $this->session->set_flashdata('success','Product Added');
            redirect('home');
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
