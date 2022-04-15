<?= $this->extend('users/v-users-index') ;?>
<?= $this->section('content') ;?>
<div class="card-get-produk">
    <div class="row back-home p-3">
        <div class="col-3"><a href="/" class="text-decoration-none text-white"><span class="fa-solid fa-arrow-left"></span></a></div>
    </div>
    <div class="row bg-light p-3 card-detail border border-dark">
        <div class="row">
            <div class="col-md-7">
            <img src="/img/<?=$data_produk['sampul_produk']?>" height="400px" width="100%">
            </div>
            <div class="col-md-5 my-2">
            <button type="button" class="btn btn-primary border my-2" data-bs-toggle="collapse" data-bs-target="#form-beli"><span class="fa-solid fa-cart-shopping"></span></button>
             <button type="submit" class="btn btn-success border my-2" data-bs-toggle="modal" data-bs-target="#modal-add-keranjang"><span class="fa-solid fa-plus" ></span></button>
            <div class="form-beli p-3  border my-2 collapse" id="form-beli">
                <form action="/home/buy" method="post">
                    <input type="hidden" name="id_produk" value="<?=$data_produk['id_produk']?>">
                    <input type="hidden" name="harga_produk" id="harga_produk" value="<?=$data_produk['harga_produk']?>">
                    <input type="number" name="jml_beli" id="jml_beli" class="form-control" placeholder="Jumlah beli" required >
                    <input type="number" name="total_beli" id="total_beli" class="form-control my-3 " placeholder="Total Harga" readonly required>
                    <button type="submit" class="btn btn-primary w-75 btn-buy"><span class="fa-solid fa-cart-shopping"></span></button>
                </form>
            </div>
            <p>Nama barang <?=$data_produk['nama_produk']?></p>
            <p>Harga Produk <?=$data_produk['string_harga']?></p>
            </div>
        </div>
        <div class="col-12">
            <h6 class="text-decoration-none">Deskripsi Barang</h6>
           <p>
               <?=$data_produk['deskripsi_produk'];?>
           </p>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="modal-add-keranjang">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-evenly bg-dark">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <form action="/home/addkeranjang" method="post">
                    <input type="hidden" name="id_produk" value="<?=$data_produk['id_produk']?>">
                    <button type="submit" class="btn btn-primary"><span class="fa-solid fa-plus"></span>Add to keranjang</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ;?>
