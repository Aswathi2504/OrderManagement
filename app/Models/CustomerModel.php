<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'customers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['email','password','vendor_id','name','user_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getDataWithWhere($condition) {
        return $this->where($condition)->findAll();
    }

    public function getJoinedData($condition)
    {
        return $this->select('*')
            ->join('products', 'products.vendor_id = customers.vendor_id')
            ->where($condition)
            ->findAll();
    }

    public function getData($condition)
    {
     return $this->select('*')
        ->join('orders', 'orders.id = customers.user_id')
        ->join('products', 'products.id = orders.product_id')
        ->where($condition)
        ->findAll();

    }
    
    
}
