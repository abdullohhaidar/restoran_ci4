<?= $this->extend('template/home')?>

<?= $this->section('content')?>
<div class="col-6">
    <?php
        if (!empty(session()->getFlashdata('info'))) {
            echo '<div class="alert alert-danger" role="alert">';
            $error = session()->getFlashdata('info');
            foreach ($error as $key => $value) {
                echo $key.'=>'.$value;
                echo '<br>';
            }  
            echo '</div>';
        }
    ?>
</div>

<div class="col">
    <h3>Insert Data</h3>
</div>


<div class="col-8">
    <form action="<?= base_url('/daftar/insert')?>" method="post">

        <div class="form-group">
            <label for="Kategori">Nama</label>
        <input type="text" name="pelanggan" required class="form-control">
        </div>

        <div class="form-group">
            <label for="Keterangan">Alamat</label>
            <input type="text" name="alamat" required class="form-control">
        </div>

        <div class="form-group">
            <label for="Keterangan">Telp</label>
            <input type="number" name="telp" required class="form-control">
        </div>

        <div class="form-group">
            <label for="Keterangan">Email</label>
            <input type="email" name="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="Keterangan">Password</label>
            <input type="password" name="password" required class="form-control">
        </div>

        <div class="form-group">
            <label for="Keterangan">Konfirmasi Password</label>
            <input type="password" name="konfirmasi" required class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" name="simpan" value="Simpan">
        </div>
        

    </form>
</div>

<?= $this->endsection()?>