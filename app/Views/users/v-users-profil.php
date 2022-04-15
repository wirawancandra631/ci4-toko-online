<?= $this->extend('users/v-users-index') ;?>
<?= $this->section('content') ;?>
<!-- kalau users belum terdaftar -->
<?php if(!session()->get('login')):?>
    <div class="container-fluid">
        <div class="row p-3 profil">
            <div class="col-4">
                <img src="/img/download (1).png" width="120px" height="120px" class="rounded-circle d-block m-auto img-thumbnail shadow">
                <p class="text-center">Tidak Dikenal</p>
            </div>
            <div class="col-8 p-2">
                <h4 class="text-center">Belum Terdaftar</h4>
                <p class="text-center">
                    <a href="/daftar" class="text-decoration-none   text-primary">
                        <span class="fa-solid fa-sign-in"></span> <b>DAFTAR</b>
                    </a>
                </p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 col-10 m-auto">
                <h5 class="text-center">Anda belum mendaftar</h5>
                <a href="/daftar" class="btn btn-danger text-white rounded-pill w-100  my-2 "><img src="/img/download.jpeg" width="50px" height="50px" class="rounded-circle p-2"><small>Buka halaman daftar.</small></a>
            </div>
        </div>
    </div>
<?php endif;?>
<!-- kalau users belum terdaftar -->
<!-- kalau users sudah terdaftar atau login -->
<?php if(session()->get('login')):?>
    <div class="container-fluid">
        <div class="row p-3 profil">
            <div class="col-4">
                <img src="/img/download (1).png" width="120px" height="120px" class="rounded-circle d-block m-auto img-thumbnail shadow">
                <p class="text-center"><?=$data_users['nama_users']?></p>
            </div>
            <div class="col-8 p-2">
                <h4 class="text-center">Status <?=$data_users['level_users']?></h4>
                <small class="text-center d-block">Tanggal bergabung  <?=$data_users['created_at']?></small>
                <p class="text-center">
                    <a href="/logout" class="text-decoration-none text-danger" onclick="return(confirm('Anda akan keluar ?'))">
                        <span class="fa-solid fa-sign-in fw-bold"></span> <b>Logout</b>
                    </a>
                </p>
            </div>
        </div>
    </div>
<?php endif;?>
<!-- kalau users sudah terdaftar atau login -->
<!-- mendapatkan data orders users -->
<?php if(session()->get('users')):?>
<div class="container-fluid my-4">
        <div class="row my-1 border-top"><h6>Orderan Saya</h6></div>
        <?php if(!empty($data_orders)):?>
        <div class="row content-users-orders">
        <div class="col-12 my-1"><?=$pager->links()?></div> 
        <?php if(session()->getFlashdata('orders')):?>
            <div class="col-12 my-1"><div class="alert alert-info w-50 m-auto "><?=session()->getFlashdata('orders')?></div></div>
        <?php endif;?>    
        <?php foreach($data_orders as $order):?>   
            <div class="col-md-4 col-lg-3 col-6 shadow box-users-orders d-flex border bg-light border-primary">
                <div style="width:40%;"><img src="/img/<?=$order['sampul_produk']?>" width="100%" height="100%"></div>
                <div style="width:60%;" class="p-1 order-data-users">
                <p>Nama <?=$order['nama_produk']?></p>
                <p>Harga Rp <?=$order['total_harga_orders']?></p>
                <p>Jumlah Barang <?=$order['jumlah_orders']?></p>
                <button class="btn d-block m-auto" data-id="<?=$order['id_orders']?>" data-bs-toggle="modal" data-bs-target="#box-modal-orders"><span class="fa-solid fa-eye"></span></button>
                </div>
            </div>
        <?php endforeach;?>  
        </div>
        <?php endif;?>
        <!-- kalau pesanan kosong -->
       <?php if(empty($data_orders)):?>
        <div class="col-10 m-auto">
            <img src="/img/download (k1).png" width="120px" height="120px" class="d-block m-auto">
            <p class="text-center">Anda belum memesan apapun</p>
        </div>
       <?php endif;?>  
</div>
<?php endif;?>
<!-- mendapatkan data orders users -->
<!-- data khusus -->
<?php if(session()->get('admin')):?>
    <div class="container my-4">
        <div class="col-8 m-auto">
            <a href="/admin" class="btn btn-success shadow w-75 d-block m-auto rounded-pill" target="_blank">Buka Halaman Admin</a>
        </div>
    </div>
<?php endif;?>





<!-- modal orders -->
<div class="modal fade" id="box-modal-orders">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <p>Detail orderan anda</p>
            <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
        </div>
            <div class="modal-body modal-orders"></div>
        </div>
    </div>
</div>
<?= $this->endSection() ;?>
