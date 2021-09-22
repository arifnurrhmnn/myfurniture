<?php require "header.php"; 
$id=$_GET['id'];
$query="SELECT total_order FROM tbl_order WHERE id_order='$id'";
$result=mysqli_query($db,$query); 
$data=mysqli_fetch_assoc($result);
?>
<style>
    .banner .img {
        width: 100%;
        height: 250px;
        background-image: url('assets/img/4.jpg');
        padding: 0px;
        margin: 0px;
    }

    .img .box {
        height: 250px;
        background-color: rgb(41, 41, 41, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        color: white;
        padding-top: 70px;
    }

    .box a {
        color: #0066FF;
    }

    .box a:hover {
        text-decoration: none;
        color: rgb(6, 87, 209);
    }
</style>
<div class="banner mb-5">
    <div class="container-fluid img">
        <div class="container-fluid box">
            <h3>KONFIRMASI PEMBAYARAN</h3>
            <p>Home ><a href="#"> Konfirmasi Pembayaran</a></p>
        </div>
    </div>
</div>
<div class="containt">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4>
                            Form Konfirmasi Pembayaran
                        </h4>
                        <p>Mohon untuk melengkapi data di bawah ini untuk melakukan konfirmasi</p>
                        <?php
                        if (isset($_POST['kirim'])) {
                            $nama = $_POST['nama'];
                            $bank =$_POST['nmBank'];
                            $jml = $_POST['jml_transfer'];
                            $tgl= date('Y-m-d');
                            $nmGambar = $_FILES['gambar']['name'];
                            $lokasi = $_FILES['gambar']['tmp_name'];

                            if ($jml != $data['total_order']) {
                                echo "<script type='text/javascript'>swal('Gagal', 'Jumlah Yang Anda Bayarkan Tidak Sesuai', 'error');</script>";
                            }elseif(!empty($lokasi)) //Jika temporari tidak kosong 
                            { 
                                //memindah file gambar dari file temporari ke folder assets/img/bukti-transfer/
                                move_uploaded_file($lokasi, "assets/img/bukti-transfer/" . $nmGambar);
                                //Memasukkan data ke tabel tbl_produk
                                $query = "INSERT INTO tbl_pembayaran (id_order,nm_pembayar,nm_bank,jml_pembayaran,tgl_bayar,bukti_transfer)
                                        VALUE('$id', '$nama', '$bank', '$jml', '$tgl','$nmGambar')";
                                $exec= mysqli_query($db, $query);

                                //ubah status orderan
                                $qupdate = "UPDATE tbl_order SET status='Sudah Dibayar' WHERE id_order='$id'";
                                $qresult = mysqli_query($db,$qupdate);

                                //Menampilkan pesan jika data berhasil di masukkan
                                    echo "<script type='text/javascript'>
                                            swal({
                                                title: 'Berhasil Konfirmasi',
                                                text: 'Produk Segera Kami Persiapkan Untuk Dikirim',
                                                icon: 'success',
                                                button: false
                                            });
                                            </script>";
                                    echo "<meta http-equiv='refresh' content='1;url=orderan.php'>";
                            }
                            else //jika temporari kosong
                            {
                                //Menampilkan pesan jika gambar belum dimasukkan
                                echo "<p class='alert alert-danger' role='alert'>
                                        [Error] Upload Gambar Gagal.<br />
                                        </p>";
                            }
                        };
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Nama Pembayar</label>
                                <input type="text" class="form-control" name="nama" required="required">
                            </div>
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Nama Bank</label>
                                <input type="text" class="form-control" name="nmBank" required="required">
                            </div>
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Jumlah Tranfer</label>
                                <input type="number" class="form-control" name="jml_transfer" required="required">
                            </div>
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Bukti Transfer</label>
                                <input type="file" class="form-control-file" name="gambar" required="required">
                            </div>
                            <button class="btn btn-primary pull-right pl-5 pr-5" name="kirim">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body alert-danger">
                        <p>Total Tagihan :</p>
                        <h1>Rp. <?php echo number_format($data['total_order']); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "footer.php"; ?>