
$(function(){
    $('.btn-view-produk').click(function(){
        let id=$(this).attr('data-id');
        $.ajax({
            url:'/admin/getproduk/'+id,
            dataType:"json",
            success:function(result){
                let element=`
                <div class="col-10 m-auto">
                    <img src="/img/${result.sampul_produk}" width="90%" height="200px" class="d-block m-auto">
                </div>
                <div class="col-10 m-auto border-top">
                    <p>Nama ${result.nama_produk}</p>
                    <p>Harga ${result.string_harga}</p>
                    <p>Deskripsi </p>
                    <p>${result.deskripsi_produk}</p>
                </div>
                `;
                $('.box-view-produk').html(element)
            }
        })
    })
    // modal
    $('.btn-edit-produk').click(function(){
        let id=$(this).attr('data-id');
        $.ajax({
            url:'/admin/getproduk/'+id,
            dataType:"json",
            success:function(result){
                let element=`
                <form action="/admin/editdataproduk/${result.id_produk}" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
            <div class="mb-3 input-group">
              <span class="input-group-text ">Name</span>
              <input type="text" name="nama_produk" id="nama_produk" class="form-control" required value="${result.nama_produk}">
          </div>
          <div class="mb-3 input-group">
              <span class="input-group-text ">Harga</span>
              <input type="number" name="harga_produk" id="harga_produk" class="form-control" required value="${result.harga_produk}">
          </div>
          <div class="mb-3 ">
          <input type="text" name="deskripsi_produk" id="deskripsi_produk" class="form-control py-4" required value="${result.deskripsi_produk}">
        </div>
        <img src="/img/${result.sampul_produk}" width="100px" height="50px">
        <div class="my-3 input-group">
              <span class="input-group-text ">Sampul</span>
              <input type="file" name="sampul_produk" id="sampul_produk" class="form-control">
          </div>
          <div class="mb-3">
              <button type="submit" class="btn btn-primary w-100">Update</button>
          </div>
            </form>
                `;
                $('.box-edit-produk').html(element)
            }
        })
    })
    // get detail data pesanan 
    $('.btn-admin-getorders').click(function(){
        let id=$(this).attr('data-id');
        $.ajax({
            url:'/fitur/getorders/'+id,
            dataType:'json',
            success:function(result){
                let element=`
                <div class="row">
                <div class="col-6">
                    <img src="/img/${result.sampul_produk}" width="100%" height="100%">
                </div>
                <div class="col-6">
                    <p>Nama pesanan ${result.nama_produk}</p>
                    <p>Jumlah pesanan ${result.jumlah_orders}<p>
                    <p>Total Harga Rp ${result.total_harga_orders}</p>
                    <p>No Hp Pemesan ${result.nohp_users}</p>
                    <p>Nama pemesan ${result.nama_users}</p>
                    <p>Email Pemesan ${result.email_users}</p>

                </div>
                <div class="col-12">
                    <p>DESKRIPSI</p>
                    <p>${result.deskripsi_produk}</p>
                </div>
            </div>
                `;
                $('.modal-admin-data-orders').html(element);
            }
        })
    })
})
// use chart js
