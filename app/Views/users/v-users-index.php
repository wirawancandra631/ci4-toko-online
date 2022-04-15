<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('/css/bootstrap.css')?>">
    <link rel="stylesheet" href="/font/css/all.css">
    <link rel="stylesheet" href="<?=base_url('/style/style.css')?>">
    <script src="/script/jquery.js"></script>
    <title>Home</title>
</head>
<body>
    <div class="container">
        <nav class="row navigasi p-3 fixed-bottom  border-top">
            <div class="col-md-9 m-auto">
            <ul class="list-unstyled d-flex justify-content-evenly">
                <li>
                    <a href="/" class=" text-decoration-none text-dark">
                        <span class="fa-solid fa-home d-block text-center"></span>
                        <small class="text-center">Home</small>
                    </a>
                </li>
                <li>
                    <a href="/home/search" class=" text-decoration-none text-dark">
                        <span class="fa-solid fa-search d-block text-center"></span>
                        <small class="text-center">Search</small>
                    </a>
                </li>
                <?php if(session()->get('login')):?>
                    <li>
                    <a href="/home/keranjang" class=" text-decoration-none text-dark">
                        <span class="fa-solid fa-cart-shopping d-block text-center"></span>
                        <small class="text-center">Keranjang</small>
                    </a>
                </li>
                <?php endif;?>    
                <li>
                    <a href="/home/profil" class=" text-decoration-none text-dark">
                        <span class="fa-solid fa-user d-block text-center"></span>
                        <small class="text-center">Acountt</small>
                    </a>
                </li>
            </ul>
            </div>
        </nav>
    </div>
    <?= $this->renderSection('content') ;?>
<script src="/js/bootstrap.js"></script>
<script src="/script/script2.js"></script>
</body>
</html>