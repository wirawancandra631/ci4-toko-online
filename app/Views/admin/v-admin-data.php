<?= $this->extend('admin/v-admin-index') ;?>
<?= $this->section('admin') ;?>
<div class="container my-5 ">
    <div class="row">
        <div class="col-md-5 my-2 border">
          <form action="/admin/saveproduk" method="post" enctype="multipart/form-data">
              <h4 class="text-center">Tambah Data Produk</h4>
              <?php if(session()->getFlashdata('error')):?>
                <div class="alert alert-danger">
                    <?=session()->getFlashdata('error')?>
                </div>
              <?php endif;?>  
              <div class="mb-3 input-group">
                  <span class="input-group-text ">Name</span>
                  <input type="text" name="nama_produk" id="nama_produk" class="form-control" required value="<?=old('nama_produk')?>">
              </div>
              <div class="mb-4 input-group">
                  <span class="input-group-text ">Harga</span>
                  <input type="number" name="harga_produk" id="harga_produk" class="form-control" required value="<?=old('harga_produk')?>">
              </div>
              <div class="my-3">
                  <input type="hidden" name="deskripsi_produk" id="deskripsi_produk">
                  <trix-editor input="deskripsi_produk" placeholder="Deskripsi produk" required></trix-editor>
            </div>
            <div class="mb-3 input-group">
                  <span class="input-group-text ">Sampul</span>
                  <input type="file" name="sampul_produk" id="sampul_produk" class="form-control" required>
              </div>
              <div class="mb-3 d-flex justify-content-around">
                  <button type="submit" class="btn btn-primary w-100"><span class="fa-solid fa-upload"></span> Upload</button>
                  <button type="reset" class="btn btn-warning w-100">Reset</button>
              </div>
          </form>
        </div>
        <div class="col-md-7 my-2 box-data-produk table-responsive">
            <h5 class="text-center">Data Produk</h5>
            <?php if(session()->getFlashdata('success')):?>
                <div class="alert alert-primary"><?=session()->getFlashdata('success')?></div>
            <?php endif;?>
            <?php if(session()->getFlashdata('delete')):?>
                <div class="alert alert-danger"><?=session()->getFlashdata('delete')?></div>
            <?php endif;?>
            <?php if(session()->getFlashdata('update')):?>
                <div class="alert alert-info"><?=session()->getFlashdata('update')?></div>
            <?php endif;?>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Sampul</th>
                    <th>Action</th>
                </tr>
                <?php $i=1;?>
                <?php foreach($data_produk as $produk):?>
                    <tr class="text-center ">
                        <td class="align-middle"><?=$i++?></td>
                        <td  class="align-middle"><?=$produk['nama_produk']?></td>
                        <td  class="align-middle"><?=$produk['string_harga']?></td>
                        <td  class="align-middle">
                            <img src="/img/<?=$produk['sampul_produk']?>" width="100px" height="100px">
                        </td>
                        <td class="d-flex aligns-items-center">
                            <div class="d-flex my-5">
                                    <form action="/admin/deleteproduk/<?=$produk['id_produk']?>" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger"onclick="return(confirm('Menghapus data produk dapat menyebabkan data yang berhubungan juga akan terhapus'))"><span class="fa-solid fa-trash"></span></button>
                                    </form>
                                    <button type="button" class="btn btn-warning btn-edit-produk" data-bs-toggle="modal" data-bs-target="#box-edit-produk" data-id="<?=$produk['id_produk']?>"><span class="fa-solid fa-pencil"></span></button>
                                    <button type="button" class="btn btn-info btn-view-produk" data-bs-toggle="modal" data-bs-target="#box-view-produk" data-id="<?=$produk['id_produk']?>"><span class="fa-solid fa-eye"></span></button>
                            </div>        
                        </td>
                    </tr>
                <?php endforeach;?>    
            </table>
            <?=$pagination->links()?>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="box-view-produk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Detail Data
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body box-view-produk">
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="box-edit-produk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Edit Data
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body box-edit-produk">
               
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ;?>
