<?= $this->extend('users/v-users-index') ;?>
<?= $this->section('content') ;?>
<div class="container-fluid">
    <div class="row border-bottom">
        <h6>Keranjang Saya</h6>
    </div>
    <div class="row my-2">
            <?php foreach($data_keranjang as $keranjang):?>
        <div class="col-md-3 col-lg-2 col-6 border card-produk">
        <div class="row bg-light mb-1">
        <img src="/img/<?=$keranjang['sampul_produk']?>" width="80%" height="150px" class="d-block m-auto">
        </div>
        <p><?=$keranjang['nama_produk']?></p>
        <p>Price <?=$keranjang['string_harga']?></p>
        <div>
            <a href="/home/produk/<?=$keranjang['ens_produk']?>"><span class="fa-solid fa-eye"></span></a>
            <a href="/home/deletekeranjang/<?=$keranjang['id_keranjang']?>" onclick="return(confirm('Hapus dari keranjang'))"><span class="fa-solid fa-trash"></span></a>
        </div>
    </div>
            <?php endforeach;?> 
       <?php if(empty($data_keranjang)):?>
        <div class="col-6 m-auto">
            <img src="/img/download (k1).png" width="120px" height="120px" class="d-block m-auto">
            <p class="text-center">Keranjang Masih Kosong</p>
        </div>
       <?php endif;?>         
    </div>
</div>
<?= $this->endSection() ;?>
