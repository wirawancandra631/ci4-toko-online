<?php foreach($data_produk as $produk):?>
<div class="col-md-3 col-lg-2 col-6 border card-produk">
    <div class="row bg-light mb-1">
    <img src="/img/<?=$produk['sampul_produk']?>" width="80%" height="150px" class="d-block m-auto">
    </div>
    <p><?=$produk['nama_produk']?></p>
    <p>Price <?=$produk['string_harga']?></p>
    <p class="text-end"><a href="/Home/produk/<?=$produk['ens_produk']?>"><span class="fa-solid fa-eye"></span></a></p>
</div>
<?php endforeach;?>
<?php if(empty($data_produk)):?>
    <h6 class="text-center my-2">Barang Yang Anda Cari Tidak Ditemukan</h6>
<?php endif;?>