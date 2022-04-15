<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_orders';
    protected $primaryKey       = 'id_orders';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_produk','jumlah_orders','total_harga_orders','id_users','ens_orders'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at_orders';
    protected $updatedField  = 'updated_at_orders';
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

    public function getorders(){
        return $this->join('tbl_users','tbl_orders.id_users=tbl_users.id_users')->join('tbl_products','tbl_orders.id_produk=tbl_products.id_produk')->where('email_users',session()->get('email'))->orderBy('id_orders','desc')->paginate(9);
    }
}
