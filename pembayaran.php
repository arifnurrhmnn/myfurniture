<?php require "header.php"; ?>
<?php 
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
<div class="banner mb-3">
    <div class="container-fluid img">
        <div class="container-fluid box">
            <h3>Pembayaran</h3>
            <p>Home ><a href="#"> Pembayaran</a></p>
        </div>
    </div>
</div>
<div class="containt">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body alert-info">
                        <p>Silahkan melakukan pembayaran ke nomor rekening di bawah ini :
                            <ul>
                                <li><b>MANDIRI</b> 242424242424</li>
                                <li><b>BRI</b> 23232323232</li>
                                <li><b>BCA</b> 287878722642</li>
                            </ul>
                            Semua atas nama MYFURNITURE, selain itu palsu</p>
                        <p>Mohon melaukan konfirmasi di menu <a href="orderan.php">Orderan</a> setelah melakuakn
                            pembayaran</p>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body alert-danger">
                        <p>Total Pembayaran :</p>
                        <h1>Rp. <?php echo number_format($data['total_order']); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php require "footer.php"; ?>