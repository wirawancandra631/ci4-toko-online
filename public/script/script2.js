$(function(){
    // fitur jam
    $('.waktu h6').text(new Date().toUTCString());
    window.setInterval(()=>{
        let jamNow=new Date().toUTCString();
        $('.waktu').html(`<h6 class='text-center'>${jamNow}</h6>`)
    },1000)
  
    $('#jml_beli').keyup(function(){
        let harga=parseInt($('#harga_produk').val())
        let jml_produk=parseInt($(this).val());
        let total=harga*jml_produk;
        $('#total_beli').val(total)
    })
    $('#jml_beli').change(function(){
        let harga=parseInt($('#harga_produk').val())
        let jml_produk=parseInt($(this).val());
        let total=harga*jml_produk;
        $('#total_beli').val(total)
    })
    
    $('.btn-buy').click(function(event){
        let jml_produk=parseInt($('#jml_beli').val());
        let total_harga=$('#total_beli').val();
        if (jml_produk < 1) {
            let message=$(this).before(`<p class="text-danger">Masukan jumlah yang valid</p>`)
            event.preventDefault()
        }
        else if(total_harga == ""){
            let message=$(this).before(`<p class="text-danger">Masukan jumlah beli dan total pembelian</p>`)
            event.preventDefault()
        }
         
    })
    // order data
    $('.order-data-users button').click(function(){
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
                    <p>Nama ${result.nama_produk}</p>
                    <p>Jumlah pesanan ${result.jumlah_orders}</p>
                    <p>Total harga Rp ${result.total_harga_orders}</p>
                    <p>Tanggal pesan ${result.created_at_orders}</p>
                </div>
                <div class="col-12 my-2">
                <p>Deskripsi</p>
               <p> ${result.deskripsi_produk}</p>
                </div>
            </div>
                `;
                $('.modal-orders').html(element)
            }
        })
    })
    // fitur searching
    $('#search-produk').keyup(function(){
        let value=$(this).val();
        $.ajax({
            url:'/fitur/getproduk/'+value,
            dataType:'text',
            success:function(result){
                $('.box-search').html(result);
            }
        })
    })
})
