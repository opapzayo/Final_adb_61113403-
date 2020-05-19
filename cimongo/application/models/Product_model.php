<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class Product_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function findOne($condition = [])
    {
        if (sizeof($condition) > 0) {
            $this->mongo_db->where($condition);
        }
        $result = $this->mongo_db->get('product');
        $result = $this->mongo_db->row_array($result);
        return $result;
    }

    public function findAll($condition = [])
    {
        if (sizeof($condition) > 0) {
            $this->mongo_db->where($condition);
        }
        $result = $this->mongo_db->get('product');
        return $result;
    }

    public function findDesc($condition = [])
    {
        if (sizeof($condition) > 0) {
            $this->mongo_db->where($condition);
        }
        $result = $this->mongo_db->sort('priceEach', 'Desc');
        $result = $this->mongo_db->get('product');
        return $result;
    }
    public function findAsc($condition = [])
    {
        if (sizeof($condition) > 0) {
            $this->mongo_db->where($condition);
        }
        $result = $this->mongo_db->sort('priceEach', 'asc');
        $result = $this->mongo_db->get('product');
        return $result;
    }

    public function insert($data)
    {
        $insertId = $this->mongo_db->insert('product',$data);
        return $insertId;
    }

    public function count($condition = [])
    {
        if (sizeof($condition) > 0) {
            $this->mongo_db->where($condition);
        }
        $result = $this->mongo_db->count('product');
        return $result;
    }

    public function sortby($condition = [])
    {
        $condition['priceEach']=$this->mongo_db->sort('priceEach', 'desc');
    }
    
}