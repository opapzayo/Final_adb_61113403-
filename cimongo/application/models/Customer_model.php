<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class Customer_model extends CI_Model
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
        $result = $this->mongo_db->get('customer');
        $result = $this->mongo_db->row_array($result);
        return $result;
    }

    public function findAll($condition = [])
    {
        if (sizeof($condition) > 0) {
            $this->mongo_db->where($condition);
        }
        $result = $this->mongo_db->get('customer');
        return $result;
    }

    public function insert($data)
    {
        $insertId = $this->mongo_db->insert('customer',$data);
        return $insertId;
    }
}