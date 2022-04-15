
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Candra Wirawan Modify, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Admin</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/font/css/all.css">
    <!-- Custom styles for this template -->
    <link href="/style/dashboard.css" rel="stylesheet">
    <link href="/style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/trix-editor/trix.css">
    <script src="/script/jquery.js"></script>
    <script src="/trix-editor/trix.js"></script>
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company Dashboard</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fa-solid fa-list"></span>
  </button>
  <h3 class="text-center text-primary">ADMIN PAGE</h3>
  <div class="navbar-nav navbar-profil">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3 " href="/" style="font-size: 0.9em;"><span class="fa-solid fa-arrow-right"></span></a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  sidebar collapse">
      <div class="position-sticky pt-3">
      
        <ul class="nav flex-column px-3">
          <li class="nav-item border border-white rounded-pill bg-li mb-3">
            <a class="nav-link active" aria-current="page" href="/admin">
              <span class=" fa-solid fa-home"></span>
              <b>Dashboard</b>
            </a>
          </li>
          <li class="nav-item border border-white rounded-pill bg-li mb-2 " >
            <a class="nav-link active" aria-current="page" href="/admin/dataproduk" >
              <span class=" fa-solid fa-database"></span>
              <b>Data Produk</b>
            </a>
          </li>    
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
       <!-- yours content display -->
       <div class="contaner-fluid mt-5">
         <?= $this->renderSection('admin') ;?>
       </div>
    </main>
  </div>
</div>


<!-- script include -->
  <script src="/js/bootstrap.js"></script>
  <script src="/script/script1.js"></script>
  <script src="/script/diagram.js" type="module"></script>
  <script src="/script/cart.js" type="module"></script>

  </body>
</html>
