<?php

namespace App\Controllers;
use App\Models\AuthModel;
use App\Models\ProdukModel;
use App\Models\OrdersModel;
use App\Models\KeranjangModel;
class Home extends BaseController
{
    protected $dbauth;
    protected $dbproduk;
    protected $dborders;
    protected $dbkeranjang;
    public function __construct()
    {
        $this->dbproduk=new ProdukModel();
        $this->dbauth=new AuthModel();
        $this->dborders=new OrdersModel();
        $this->dbkeranjang=new KeranjangModel();
    }
    public function index()
    {
        return view('users/v-users-home',[
            'data_produk'=>$this->dbproduk->allProduk(),
            'pagination'=>$this->dbproduk->pager
        ]);
    }
    public function profil(){
        if (session()->get('login')) {
            $data=[
              'data_users'=>$this->dbauth->where('email_users',session()->get('email'))->first(),
              'data_orders'=>$this->dborders->getorders(),
              'pager'=>$this->dborders->pager
            ];
            return view('users/v-users-profil',$data);
        }
        return view('users/v-users-profil');
    }
    public function produk($i=false){
        $data=[
            'data_produk'=>$this->dbproduk->where('ens_produk',$i)->first()
        ];
        if (empty($data['data_produk'])) {
            return redirect()->to('/');
        }
        return view('users/v-users-produk',$data);
    }
    public function buy(){
        if($this->request->getMethod()!='post'){
            return redirect()->to('/');
         }
        helper('number');
        $data_users=$this->dbauth->where('email_users',session()->get('email'))->first();
        $id_produk=$this->request->getPost('id_produk');
        $id_users=$data_users['id_users'];
        $jml_orders=$this->request->getPost('jml_beli');
        $harga_orders=$this->request->getPost('total_beli');
        // save data
        $this->dborders->insert([
          'id_produk'=>$id_produk,
          'jumlah_orders'=>$jml_orders,
          'total_harga_orders'=>$harga_orders,
          'id_users'=>$id_users,
          'ens_orders'=>rand(0,999)
        ]);
        return redirect()->to('/home/profil')->with('orders','Orderan dikonfirmasi');
    }
    public function search(){
        return view('fitur/v-search-produk');
    }
    // fitur keranjang belanja
    public function keranjang(){
        $data=[
            'data_keranjang'=>$this->dbkeranjang->getdatakeranjang()
        ];
        return view('users/v-users-keranjang',$data);
    }
    public function addkeranjang(){
        if($this->request->getMethod()!='post'){
            return redirect()->to('/');
         }
         $data_users=$this->dbauth->where('email_users',session()->get('email'))->first();
        $this->dbkeranjang->insert([
         'id_produk'=>$this->request->getPost('id_produk'),
         'id_users'=>$data_users['id_users']
        ]);
        return redirect()->to('/home/keranjang');
    }
    public function deletekeranjang($i=false){
        if (!$this->request->getMethod()=="delete") {
            return redirect()->to('/');
        }
        $this->dbkeranjang->where('id_keranjang',$i)->delete();
        return redirect()->back();
    }
}
