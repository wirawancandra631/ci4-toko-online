<?= $this->extend('users/v-users-index') ;?>
<?= $this->section('content') ;?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/img/photo-1542291026-7eec264c27ff.jpg" class="d-block w-100" height="330px">
    </div>
    <div class="carousel-item">
      <img src="/img/photo-1595341888016-a392ef81b7de.jpg" class="d-block w-100" height="330px">
    </div>
    <div class="carousel-item">
      <img src="/img/istockphoto-111885949-612x612.jpg" class="d-block w-100" height="330px">
    </div>
  </div>
</div>
<div class="container-fluid mb-5 ">
<div class="row">
    <div class="col-md-5 col-10 m-auto my-2 waktu">
      <h6 class="text-center"></h6>
    </div>
</div>
<div class="row border-top border-1 mt-2 pt-2">
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
</div>
<div class="row mt-3">
    <div class="col-6 mb-5">
        <?=$pagination->links();?>
    </div>
</div>
</div>
<?= $this->endSection() ;?>
