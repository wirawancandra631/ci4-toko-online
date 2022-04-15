
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Candra Wirawan Modify, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/font/css/all.css">
    <link href="/style/dashboard.css" rel="stylesheet">
    <script src="/script/jquery.js"></script>
    <style>
      body{
        background-color: aqua;
      }
      .box-login{
        width: 70%;
        margin: 5% auto;
      }
    </style>
  </head>
  <body>
  <div class="box-login my-5 ">
    <div class="row">
      <div class="col-md-6 col-lg-5 m-auto bg-light border rounded">
        <div class="col-12"><img src="/img/undraw_Login_re_4vu2.png" width="100%" height="200px">
        <div class="col-12 bg-light ">
        <form action="/login" method="post" class="w-75 m-auto">  
        <h6 class="my-2 text-center">LOGIN</h6>
             <?php if(session()->getFlashdata('logingagal')):?>
              <div class="alert alert-danger rounded-pill my-2"><?=session()->getFlashdata('logingagal')?></div>
             <?php endif;?>              
               <div class="mb-3 input-group">
                   <span class="input-group-text">Email</span>
                   <input type="email" name="email_users" class="form-control" required>
               </div>
               <div class="mb-3 input-group">
                   <span class="input-group-text">Password</span>
                   <input type="password" name="sandi_users" class="form-control" required>
               </div>
               <div class="mb-2">
                   <small class="text-center d-block">Belum  punya akun  <a href="/daftar">daftar</a></small>
               </div>
               <div class="mb-3 input-group">
                   <button type="submit" class="btn btn-primary w-100">LOGIN</button>
               </div>
           </form> 
        </div>
    </div>
      </div>
    </div>
   
  </div>


<!-- script include -->
  <script src="/js/bootstrap.js"></script>
  </body>
</html>
