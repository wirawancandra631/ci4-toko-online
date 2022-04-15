<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
class Auth extends BaseController
{
    protected $dbauth;
    public function __construct()
    {
        $this->dbauth=new AuthModel();
    }
    public function index()
    {
        return view('auth/v-auth-daftar');
    }
    public function login()
    {
        return view('auth/v-auth-login');
    }
    public function savedaftar(){
        if($this->request->getMethod()!='post'){
            return redirect()->to('/');
         }
        if (!$this->validate(['email_users'=>'is_unique[tbl_users.email_users]'])) {
            return redirect()->back()->withInput()->with('daftargagal','Email telah terdaftar');
        }
        $email_users=htmlspecialchars($this->request->getPost('email_users'));
        $nama_users=htmlspecialchars($this->request->getPost('username_users'));
        $nohp_users=$this->request->getPost('nohp_users');
        $sandi_users=htmlspecialchars($this->request->getPost('sandi_users'));
        $sandi_users=password_hash($sandi_users,PASSWORD_DEFAULT);
        $level_users='users';

        $ens_users=hash('sha512',$email_users);
        $this->dbauth->insert([
          'email_users'=>$email_users,
          'nama_users'=>$nama_users,
          'nohp_users'=>$nohp_users,
          'sandi_users'=>$sandi_users,
          'level_users'=>$level_users,
          'ens_users'=>$ens_users
        ]);
        session()->set(
          [
              'login'=>true,
              'email'=>$email_users,
              'users'=>true
          ]
        );
        return redirect()->to('/');
    }
    public function savelogin(){
        if($this->request->getMethod()!='post'){
            return redirect()->to('/');
         }
        $email_users=htmlspecialchars($this->request->getPost('email_users'));
        $sandi_users=htmlspecialchars($this->request->getPost('sandi_users'));
        $data_users=$this->dbauth->where('email_users',$email_users)->first();
        $level_users=strtoupper($data_users['level_users']);
        // kalau akun terdaftar
        if (!empty($data_users)) {
            // kalau password benar
            if (password_verify($sandi_users,$data_users['sandi_users'])) {
                // kalau users yang login admin
                if ($level_users=='ADMIN') {
                     session()->set([
                        'login'=>true,
                        'email'=>$data_users['email_users'],
                        'admin'=>true
                     ]);
                     return redirect()->to('/');
                }
                // kalau yang login users biasa
                else{
                    session()->set([
                        'login'=>true,
                        'email'=>$data_users['email_users'],
                        'users'=>true
                     ]);
                     return redirect()->to('/');
                }
            }
            // kalau password salah
            else {
                return redirect()->back()->with('logingagal','Kata sandi salah');
            }
        }
        // kalau akun tidak terdaftar
        return redirect()->back()->with('logingagal','Email tidak  ditemukan');
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/home/profil');
    }
}
