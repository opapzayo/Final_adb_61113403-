<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('categories_model');
		$this->load->model('product_model');
		$this->load->model('orderdetails_model');
    }
	
	public function index($categoriesId)
	{
		$condition1 = array('OrderId' =>0) ;
        $data['orderdetails']=$this->orderdetails_model->findAll($condition1);
		$data['categories']=$this->categories_model->findAll();
		$search = $this->input->get('search');
		$sort = $this->input->get('sort');
		$color = $this->input->get('color');
		$namesearch = $this->input->get('namesearch');
		$condition = [];
		$condition =array('categories_id'=>$this->mongo_db->create_document_id($categoriesId));
        if(!empty($search)){
            if(!empty($namesearch)){
                $condition['product_name'] = array('$regex' => $namesearch) ;
			}
		}
		if(!empty($color)){
                $condition['color'] = array('$regex' => $color) ;
		}
		
        $data['search']=$search;
		$data['namesearch']=$namesearch ;
		$data['productfound']=$this->product_model->count($condition) ;
		$data['products']=$this->product_model->findDesc($condition);
		if(!empty($sort)){
            if($sort=="desc"){
                $data['products']=$this->product_model->findDesc($condition);
			}else if($sort=="asc"){
                $data['products']=$this->product_model->findAsc($condition);
			}
		}
		$this->load->view('layout/head',$data);
		$this->load->view('layout/header');
		$this->load->view('layout/left_menu');
		$this->load->view('categories/content');
		$this->load->view('layout/footer');
		$this->load->view('layout/foot');
	}


	public function singleproduct($productId)
    {
		$condition1 = array('OrderId' =>0) ;
        $data['orderdetails']=$this->orderdetails_model->findAll($condition1);
		$data['categories']=$this->categories_model->findAll();
		$condition =array('_id'=>$this->mongo_db->create_document_id($productId));
		$data['products']=$this->product_model->findAll($condition);
        $this->load->view('layout/head',$data);
		$this->load->view('layout/header');
		$this->load->view('categories/singleproduct/content');
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
