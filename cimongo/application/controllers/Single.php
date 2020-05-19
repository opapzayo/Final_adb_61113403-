<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Single extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('categories_model');
		$this->load->model('product_model');
		$this->load->model('orderdetails_model');
    }
	
	public function addToCart()
    {
       $qualityOrder=$this->input->post('qualityOrder');
       $product_id=$this->input->post('product_id');
       $productSize=$this->input->post('productSize');
       
       $data = array(
            "qualityOrder" => intval($qualityOrder),
            "product_id" =>  $this->mongo_db->create_document_id($product_id),
            "productSize" => $productSize,
            "OrderId" =>  0
       );
       $id = $this->orderdetails_model->insert($data);
       if(!empty($id)){
            $this->session->set_flashdata('success','Product Added');
            redirect('categories/singleproduct/'.$this->mongo_db->create_document_id($product_id));
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
