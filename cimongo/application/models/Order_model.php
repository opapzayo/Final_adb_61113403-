<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class Order_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function findAll($condition = [])
    {
        if (sizeof($condition) > 0) {
            $this->mongo_db->where($condition);
        }
        $result = $this->mongo_db->get('order');
        return $result;
    }

    public function findOne($condition = [])
    {
        if (sizeof($condition) > 0) {
            $this->mongo_db->where($condition);
        }
        $result = $this->mongo_db->get('order');
        $result = $this->mongo_db->row_array($result);
        return $result;
    }

    public function insert($data)
    {
        $insertId = $this->mongo_db->insert('order',$data);
        return $insertId;
    }

    public function remove($data)
    {
        $removeId = $this->mongo_db->delete('order',$data);
        return $removeId;
    }

}
