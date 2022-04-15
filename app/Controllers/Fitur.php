<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Debug\Exceptions;
use App\Models\ProdukModel;
use App\Models\OrdersModel;
class Fitur extends BaseController
{
    protected $dbproduk;
    protected $dborders;
    public function __construct()
    {
        $this->dbproduk=new ProdukModel();
        $this->dborders=new OrdersModel();
    }
    public function index()
    {
        
    }
    // mendapatkan data produk berdasarkan nama
    public function getproduk($i=false){
        $data=['data_produk'=>$this->dbproduk->like('nama_produk',$i)->get()->getResultArray()];
        return view('fitur/v-search-getproduk',$data);
    }
    public function getorders($i=false){
        $data=$this->dborders->select('nama_produk,sampul_produk,deskripsi_produk,total_harga_orders,jumlah_orders,nohp_users,nama_users,email_users,created_at_orders')->join('tbl_users','tbl_orders.id_users=tbl_users.id_users')->join('tbl_products','tbl_orders.id_produk=tbl_products.id_produk')->where('id_orders',$i)->first();
        return $this->response->setJSON($data);
    }
   
}
