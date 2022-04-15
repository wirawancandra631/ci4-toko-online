<?= $this->extend('admin/v-admin-index') ;?>
<?= $this->section('admin') ;?>
<div class="container">
    <?php if(empty($data_orders)):?>
        <div class="row my-2">
            <div class="col-6 m-auto">
                <img src="/img/download (k1).png" width="120px" height="120px" class="d-block m-auto">
                <p class="text-center">Belum Ada Pesanan</p>
            </div>
        </div>
    <?php endif;?>    
   <?php if(!empty($data_orders)):?>
    <div class="row my-3 table-responsive">
        <?php if(session()->getFlashdata('delete')):?>
            <div class="alert alert-danger shadow w-75 m-auto"><?=session()->getFlashdata('delete')?></div>
        <?php endif;?>
        <h6>Total Orders <?=count($data_orders)?></h6>
        <table class="table table-bordered table-striped my-2">
            <tr>
                <th>No</th>
                <th>Email user</th>
                <th>Nama pesanan</th>
                <th>Jumlah Pesanan</th>
                <th>Total Harga</th>
                <th>Action</th>
            </tr>
            <?php $i=1;?>
            <?php foreach($data_orders as $order):?>
                <tr>
                    <td><?=$i++;?></td>
                    <td><?=$order['email_users']?></td>
                    <td><?=$order['nama_produk']?></td>
                    <td><?=$order['jumlah_orders']?></td>
                    <td>Rp <?=$order['total_harga_orders']?></td>
                    <td class="d-flex justify-content-evenly">
                        <form action="/admin/deleteorders/<?=$order['ens_orders']?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return(confirm('Anda akan menghapus data orderan ?'))"><span class="fa-solid fa-trash"></span></button>
                        </form>
                        <button type="button" class="btn border btn-admin-getorders" data-id="<?=$order['id_orders']?>" data-bs-toggle="modal" data-bs-target="#modal-admin-data-orders"><span class="fa-solid fa-eye"></span></button>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?=$pager->links();?>
    </div>
    <?php endif;?>
</div>
<!-- modal admin data orders -->
<div class="modal fade" id="modal-admin-data-orders">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h6>DETAIL DATA PESANAN</h6>
            <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
        </div>
        <div class="modal-body modal-admin-data-orders">
           
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ;?>
