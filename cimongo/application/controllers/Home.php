<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('categories_model');
		$this->load->model('product_model');
		$this->load->model('orderdetails_model');
    }
	
	public function index()
	{
		$condition1 = array('OrderId' =>0) ;
        $data['orderdetails']=$this->orderdetails_model->findAll($condition1);
		$data['categories']=$this->categories_model->findAll();
		$data['products'] = $this->product_model->findAll();
		$this->load->view('layout/head',$data);
		$this->load->view('layout/header');
		$this->load->view('home/content');
		$this->load->view('layout/footer');
		$this->load->view('layout/foot');

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
