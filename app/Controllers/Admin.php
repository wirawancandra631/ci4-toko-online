<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use CodeIgniter\HTTP\Response;
use App\Models\OrdersModel;
class Admin extends BaseController
{
    protected $dbproduk;
    protected $dborders;
    public function __construct()
    {
        $this->dborders=new OrdersModel();
        $this->dbproduk=new ProdukModel();
    }
    public function index()
    {
        return view('admin/v-admin-home',['data_orders'=>$this->dborders->join('tbl_users','tbl_orders.id_users=tbl_users.id_users')->join('tbl_products','tbl_orders.id_produk=tbl_products.id_produk')->orderBy('id_orders','desc')->paginate(15),'pager'=>$this->dborders->pager]);
    }
    public function dataproduk(){
        return view('admin/v-admin-data',[
            'data_produk'=>$this->dbproduk->allProduk(),
            'pagination'=>$this->dbproduk->pager
        ]);
    }
    public function saveproduk(){
        if($this->request->getMethod()!='post'){
            return redirect()->to('/admin');
         }
        if(!$this->validate([
          'nama_produk'=>'is_unique[tbl_products.nama_produk]',
          'deskripsi_produk'=>'required'
        ])){
           return redirect()->back()->with('error',$this->validator->listErrors())->withInput();
        }
        helper('number');
        $nama_produk=htmlspecialchars($this->request->getPost('nama_produk'));
        $harga_produk=htmlspecialchars($this->request->getPost('harga_produk'));
        $string_harga=number_to_currency($harga_produk,'IDR','en_id');
        $deskripsi_produk=$this->request->getPost('deskripsi_produk');
        $sampul_produk=$this->request->getFile('sampul_produk');
        $ens_produk=hash('sha512',rand(0,99));
        $sampul_produk->move('img');
        // execute
        $this->dbproduk->insert([
          'nama_produk'=>$nama_produk,
          'deskripsi_produk'=>$deskripsi_produk,
          'sampul_produk'=>$sampul_produk->getName(),
          'harga_produk'=>$harga_produk,
          'string_harga'=>$string_harga,
          'ens_produk'=>$ens_produk
        ]);
        return redirect()->to('/admin/dataproduk')->with('success','Data produk ditambahkan');
    }
    public function getProduk($i=false){
        $data=$this->dbproduk->where('id_produk',$i)->first();
        return $this->response->setJSON($data);
    }
    public function deleteproduk($i=false){
        if($this->request->getMethod()!='delete'){
            return redirect()->to('/admin');
         }
        $this->dbproduk->where('id_produk',$i)->delete();
        return redirect()->to('/admin/dataproduk')->with('delete','Data Terhapus');
    }
    // edit data
    public function editdataproduk($i=false){
        if($this->request->getMethod()!='put'){
            return redirect()->to('/admin');
         }
      helper('number');
      $id=$i;
      $nama_produk=$this->request->getPost('nama_produk');
      $harga_produk=$this->request->getPost('harga_produk');
      $string_harga=number_to_currency($harga_produk,'IDR','en_id');
      $deskripsi_produk=$this->request->getPost('deskripsi_produk');
      $data_produk=$this->dbproduk->where('id_produk',$i)->first();
      $sampul_produk=$this->request->getFile('sampul_produk');
      if ($sampul_produk->getName()=="") {
          $sampul_produk=$data_produk['sampul_produk'];
      }
      else{
          $sampul_produk->move('img');
          $sampul_produk=$sampul_produk->getName();
      }
        $this->dbproduk->save([
          'id_produk'=>$i,
          'nama_produk'=>$nama_produk,
          'deskripsi_produk'=>$deskripsi_produk,
          'sampul_produk'=>$sampul_produk,
          'harga_produk'=>$harga_produk,
          'string_harga'=>$string_harga,
          'ens_produk'=>$data_produk['ens_produk']
        ]);
        return redirect()->back()->with('update','Update data suksess');
    }
    // 
    public function deleteorders($i=false){
        if($this->request->getMethod()!='delete'){
           return redirect()->to('/admin');
        }
        $this->dborders->where('ens_orders',$i)->delete();
        return redirect()->to('/admin')->with('delete','Data orderan dihapus');
    }
}
