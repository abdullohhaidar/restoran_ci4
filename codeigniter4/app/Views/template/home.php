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
                    <div class=" col-md-10 ">
                        <ul class="float-left mt-2"> Pelanggan :
                            <?php
                                if (!empty(session()->get('pelanggan'))) {
                                echo session()->get('pelanggan');
                                }
                            ?> 
                            <span class="sr-only">(current)</span></a>
                        </ul>
                        
                        <ul class="float-right mt-2">
                        <a href="<?php echo  base_url("/loginpelanggan/index") ?>">Login
                        </ul>

                        <ul class="float-right mt-2">
                            Daftar
                        </ul>

                        <ul class="float-right mt-2">
                            <a href="<?php echo  base_url("/loginpelanggan/logout") ?>">Logout</a> 
                        </ul>
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
            
                <?= $this->renderSection('content')?>
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