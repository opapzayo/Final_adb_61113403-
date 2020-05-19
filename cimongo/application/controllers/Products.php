<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('categories_model');
        $this->load->model('orderdetails_model');
    }
    public function index()
    {
        $condition1 = array('OrderId' =>0) ;
        $data['orderdetails']=$this->orderdetails_model->findAll($condition1);
        $data['orderdetails']=$this->orderdetails_model->findAll();
        $search = $this->input->get('search');
        $namesearch = $this->input->get('namesearch');
        $catesearch = $this->input->get('catesearch');
        $condition = [];
        if(!empty($search)){
            if(!empty($namesearch)){
                $condition['product_name'] = array('$regex' => $namesearch) ;
            }
            if(!empty($catesearch)){
                $condition['categories_id'] = $this->mongo_db->create_document_id($catesearch) ;
            }
        }
        $data['search']=$search;
        $data['namesearch']=$namesearch ;
        $data['catesearch']=$catesearch;

        $data['categories']=$this->categories_model->findAll();
        $data['products'] = $this->product_model->findAll($condition);
        $this->load->view('layout/head',$data);
		$this->load->view('layout/header');
		$this->load->view('products/content');
		$this->load->view('layout/footer');
		$this->load->view('layout/foot');
    }

    public function create()
    {
        $condition1 = array('OrderId' =>0) ;
        $data['orderdetails']=$this->orderdetails_model->findAll($condition1);
        $data['categories']=$this->categories_model->findAll();
        $this->load->view('layout/head',$data);
		$this->load->view('layout/header');
		$this->load->view('products/create/content');
		$this->load->view('layout/footer');
		$this->load->view('layout/foot');
    }
    public function save()
    {
       $product_name=$this->input->post('product_name');
       $priceEach=$this->input->post('priceEach');
       $categories_id=$this->input->post('categories_id');
       $color=$this->input->post('color');
       $imgPart=$this->input->post('imgPart');
       $data = array(
            "product_name" =>  $product_name,
            "priceEach" => $priceEach,
            "categories_id" =>  $this->mongo_db->create_document_id($categories_id),
            "color"=> $color,
            "imgPart" => $imgPart,
       );
       $id = $this->product_model->insert($data);
       if(!empty($id)){
            $this->session->set_flashdata('success','Product Added');
            redirect('products');
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