<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css')?>">
    <title>restoran online</title>
</head>
<body>

    <div class="container">

        <div class="row mt-2">
            <div class="col">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="<?= base_url('home')?>">Restoran SMK</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="col-md-10">
                        <?php
                        if (!empty(session()->get('pelanggan'))) {
                            echo '
                            
                            <div class="float-left mt-1 ml-4">  
                                Pelanggan : ' . session()->get('pelanggan') . '
                            </div>

                            <div class="float-right mt-1">
                                <a href=' . base_url('loginpelanggan/logout') . '><h5>Logout</h5></a>
                            </div>
                            
                            
                            <div class="float-right mt-1 mr-4">
                                <a href=' . base_url('/histori/index/' . session()->get('idpelanggan')) . '><h5>History</h5></a>
                            </div>
                        ';
                        } else {
                            echo '
                            <div class="float-right mt-1">
                            <a href=' . base_url('loginpelanggan/') . '><h5>Login</h5></a>
                        </div>
                        <div class="float-right mt-1 mr-4">
                            <a href=' . base_url('daftar/') . '><h5>Daftar</h5></a>
                        </div>
                        ';
                        }
                        ?>
                    </div>
                </nav>

                
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-4 mt-2">
                <h3>kategori</h3>
                <hr>
                <div class="card mt-4" style="width: 18rem;">
                    
                    <?php if(empty($row))  {?>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($kategori as $key => $value) :?>
                            <li class="list-group-item"><a href="<?= base_url('/home/select'.'/'.$value['idkategori']) ?>"><?php echo $value['kategori'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php }?>
                </div>
            </div>
            <div class="col-8 mt-2 px-2">

                <h3 class="">Menu</h3>
                <hr>
                <div class="row mt-2 mb-2">

                    <?php foreach($menu as $key => $value) : ?>
                        <div class="card ml-3 mt-3" style="width: 16rem;">
                            <img src="upload/<?php echo $value['gambar']?>" style="height:160px;" class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $value['menu']?></h5>
                                <p class="card-text"><?php echo $value['harga']?></p>
                                <a href="" class="btn btn-primary">Beli</a>
                            </div>
                        </div>
                    <?php endforeach;?>
                
                </div>
                <?= $this->renderSection('content')?>
                <?php echo $pager->links('page', 'bootstrap')?>
            </div>
            
        </div> 
        
        <div class="row mt-3">
            <div class="col">
                <p class="text-center">2020 - copyright@abdullohhaidar.com</p>
            </div>
        </div>
    </div>

    
</body>
</html>