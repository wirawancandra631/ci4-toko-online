
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Candra Wirawan">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Daftar</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/font/css/all.css">
    <!-- Custom styles for this template -->
    <link href="/style/dashboard.css" rel="stylesheet">
    <script src="/script/jquery.js"></script>
    <style>
        body{
            background-color: aqua;
        }
        @media screen and (min-width:601px) {
    .box-daftar{
        margin: 5% auto;
    }
}
    </style>
  </head>
  <body>
  <div class="container box-daftar ">
      <div class="row ">
          <div class="col-md-8 col-lg-5 m-auto border rounded bg-light">
              <div class="row">
                  <div class="col-12"><img src="/img/undraw_Login_re_4vu2.png" width="100%" height="200px">
                  <div class="col-12 bg-light">
                  <form action="/daftar" method="post" class="w-75 m-auto">
                      <h6 class="my-2 text-center">DAFTAR</h6>
               <div class="mb-3 input-group">
                   <span class="input-group-text">Nama</span>
                   <input type="text" name="username_users" class="form-control" required value="<?=old('username_users')?>">
               </div>
               <div class="mb-3 input-group">
                   <span class="input-group-text">No Hp</span>
                   <input type="number" name="nohp_users" class="form-control" required value="<?=old('nohp_users')?>">
               </div>
               <div class="mb-3 input-group">
                   <span class="input-group-text">Email</span>
                   <input type="email" name="email_users" class="form-control" required  value="<?=old('email_users')?>">
               </div>
               <?php if(session()->getFlashdata('daftargagal')):?>
                    <p class="text-center text-danger"><?=session()->getFlashdata('daftargagal')?></p>
                <?php endif;?> 
               <div class="mb-3 input-group">
                   <span class="input-group-text">Password</span>
                   <input type="password" name="sandi_users" class="form-control" required>
               </div>
               <div class="mb-2">
                   <small class="text-center d-block">Sudah punya akun  <a href="/login">masuk</a></small>
               </div>
               <div class="mb-5 input-group">
                   <button type="submit" class="btn btn-primary w-100">Daftar</button>
               </div>
           </form>
                  </div>
                </div>
              </div>
          </div>
      </div>
    
  </div>


<!-- script include -->
  <script src="/js/bootstrap.js"></script>
  </body>
</html>
