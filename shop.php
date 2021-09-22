<?php require "header.php"; ?>
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


    .atas .card {
        padding: 1px;
        border: 1px solid silver;
    }

    .atas .card:hover {
        border: none;
    }

    .item:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.4);
    }
</style>

<div class="banner mb-5">
    <div class="container-fluid img">
        <div class="container-fluid box">
            <h3>SHOP</h3>
            <p>Home > <a href="#">Shop</a></p>
        </div>
    </div>
</div>
<div class="container">
    <?php 
    if (isset($_GET['kategori'])) {
        $kategori = $_GET['kategori'];
        $query = "SELECT * FROM tbl_produk WHERE id_kategori='$kategori'";
    }
    /* elseif (isset($_GET['urut'])) {
        $urut=$_GET['urut'];
        if ($urut == 'terbaru') {
            $query = "SELECT * FROM tbl_produk ORDER BY id_produk asc";
        }
        elseif ($urut == 'hurufA') {
             $query = "SELECT * FROM tbl_produk ORDER BY nm_produk asc";
        }
        elseif ($urut == 'hurufZ') {
            $query = "SELECT * FROM tbl_produk ORDER BY nm_produk desc";
        }
        elseif ($urut == 'murah') {
            $query = "SELECT * FROM tbl_produk ORDER BY harga asc";
        }
        elseif ($urut == 'mahal') {
            $query = "SELECT * FROM tbl_produk ORDER BY harga desc";
        }
    } */
    elseif (isset($_GET['select'])) {
        $cari = $_GET['select'];
        $query="SELECT * FROM tbl_produk WHERE nm_produk LIKE '%".$cari."%'ORDER BY id_produk asc";
    }
    else {
        $query = "SELECT * FROM tbl_produk p JOIN tbl_kat_produk k ON p.id_kategori=k.id_kategori ORDER BY id_produk asc";
    }
    ?>
    <div class="row">
        <div class="col-md-12 col-lg-4 col-xl-3">
            <div class="card pb-3">
                <div class="card-body" style="padding-bottom: 3px;">
                    <form class="form-group">
                        <h5>Cari:</h5>
                        <input class="form-control" width="100%" type="search" name="select" placeholder="Search">
                    </form>
                    <!-- <hr class="text-center" width="80%">
                    <form class="form-group">
                        <h5>Urutkan:</h5>
                        <select name="urut" id="" class="form-control">
                            <option value="">Pilih</option>
                            <option value="terbaru">Produk Terbaru</option>
                            <option value="hurufA">Huruf A-Z</option>
                            <option value="hurufZ">Huruf Z-A</option>
                            <option value="murah">Paling Murah</option>
                            <option value="mahal">Paling Mahal</option>
                        </select>
                    </form> -->
                    <hr class="text-center" width="80%">
                    <h5>Kategori:</h5>
                    <style>
                        .hide {
                            list-style: none;
                        }
                    </style>
                    <?php
                        $qkat = "SELECT * FROM tbl_kat_produk";
                        $reskat = mysqli_query($db, $qkat);
                        while ($dat = mysqli_fetch_assoc($reskat)) {
                    ?>
                    <a href="shop.php?kategori=<?php echo $dat['id_kategori'] ?>" style="text-decoration: none;"
                        class="text-secondary ml-3" name="kategori"><?php echo $dat['nm_kategori'] ?></a><br>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 col-xl-9">
            <div class="row">
                <div class="col-md-12 pl-5 text-secondary">
                    <?php 
                if (isset($_GET['select'])) {
                    $cari = $_GET['select'];
                    echo "<h4><i>Hasil pencarian : ".$cari."</i></h4>";
                }
               /*  else if (isset($_GET['urut'])) {
                    $cari = $_GET['urut'];
                    echo "<h4><i>Diurutkan Berdasarkan : ".$cari."</i></h4>";
                } */
                else if (isset($_GET['kategori'])) {
                    $cari = $_GET['kategori'];
                    $query2 = "SELECT * FROM tbl_kat_produk WHERE id_kategori='$cari'";
                    $results = mysqli_query($db,$query2);
                    $data = mysqli_fetch_assoc($results);
                    echo "<h4><i>Kategori : ".$data['nm_kategori']."</i></h4>";
                }
                ?>
                </div>
            </div>
            <div class="row">
                <?php
                $result=mysqli_query($db,$query);
                while ($produk = mysqli_fetch_assoc($result)) {
                ?>
                <div class="mb-0 p-1 col-md-6 col-lg-4 col-xl-3">
                    <div class="item card">
                        <div class="thumnail">
                            <img src="admin/assets/images/foto_produk/<?php echo $produk['gambar'];?>" alt="img"
                                class="card-img-top pt-2">
                            <div class="star-rating" style="position: absolute; top:7px; right: 10px; font-size: 10px;">
                                <ul class="list-inline text-warning">
                                    <li class="list-inline-item m-0"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star-o"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <strong><?php echo $produk['nm_produk']; ?></strong></br>
                            <h6 class="text-danger">Rp. <?php echo number_format($produk['harga']); ?></h6>
                            <a href="detail-produk.php?id=<?php echo $produk['id_produk']; ?>"
                                class="btn btn-primary btn-sm btn-block">Lihat Produk</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>