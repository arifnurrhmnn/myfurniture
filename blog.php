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

    .box .titleBanner:hover {
        text-decoration: none;
    }

    .row {
        margin-left: 0;
        margin-right: 0;
    }

    .row a {
        color: black;
    }

    .row a:hover {
        color: rgb(97, 97, 97);
        text-decoration: none;
    }

    hr {
        width: 100px;
    }

    .sosmed {
        height: auto;
        display: flex;
        flex-direction: row;
        justify-content: center;
        padding-left: 0;
        padding-right: 0;
    }

    .sosmed-items {
        color: #fff;
        width: 120px;
        height: 120px;
        font-size: 30px;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    .follower {
        margin-top: 20px;
        font-weight: normal;
        font-size: 13px;
    }

    .status {
        font-weight: bold;
        font-size: 17px;
    }

    .sosmed-items:hover {
        background-color: black;
    }

    .bg1 {
        background-color: #3b5998
    }

    .bg1:hover {
        color: #3b5998
    }

    .bg2 {
        background-color: #1da1f2
    }

    .bg2:hover {
        color: #1da1f2
    }

    .bg3 {
        background-color: #ea4335
    }

    .bg3:hover {
        color: #ea4335
    }

    .list-group li {
        border: none;
        padding-left: 0;
        padding-right: 0;
    }
</style>

<div class="banner mb-3">
    <div class="container-fluid img">
        <div class="container-fluid box">
            <h3>BLOG</h3>
            <p>Home > <a href="#">Blog</a></p>
        </div>
    </div>
</div>
<div class="container bg-white rounded pt-4">
    <!-- Atas -->
    <div class="row text-center mb-5">
        <?php
                    $query="SELECT * FROM tbl_pos ORDER BY judul asc LIMIT 3";
                    $result=mysqli_query($db,$query);
                    while ($data = mysqli_fetch_array($result)) {
                        $tgl = $data['tgl'];
                    ?>
        <div class="col-md-4 col-sm-12 ">
            <div class="imgup mb-2"><img src="admin/assets/images/foto_pos/<?php echo $data['gambar'];?>" height="280px"
                    width="100%" alt="...">
            </div>
            <h5><a href="detail-blog.php?id=<?php echo $data['id_pos'] ?>"
                    class="font-weight-bold"><?php echo $data['judul']; ?></a></h5>
            <hr align="center">
            <p class="font-weight-normal" style="font-size: 13px;"><i class="fa fa-calendar"></i>
                <?php echo date("F d, Y", strtotime($tgl)); ?>
            </p>
        </div>
        <?php } ?>
    </div>
    <!-- Tengah -->
    <div class="row text-left mb-5">
        <?php
                            $query="SELECT * FROM tbl_pos a JOIN tbl_kat_pos m ON a.id_kategori=m.id_kategori WHERE nm_kategori='Desain Ruang Tamu' ORDER BY Gambar asc LIMIT 1";
                            $result=mysqli_query($db,$query);
                            while ($data = mysqli_fetch_array($result)) {
                                $tgl = $data['tgl'];
                        ?>
        <div class="col-md-8 col-sm-12">
            <h4 class="font-weight-bold"><span class="text-success">ARTIKEL</span> FAVORIT</h4>
            <hr align="left">
            <div class="imgup mb-2"> <img src="admin/assets/images/foto_pos/<?php echo $data['gambar'];?>"
                    height="400pxpx" width="100%" alt="..."></div>
            <h5>
                <a href="detail-blog.php?id=<?php echo $data['id_pos'] ?>"
                    class="font-weight-bold"><?php echo $data['judul']; ?></a>
            </h5>
            <hr align="left">
            <p class="font-weight-normal" style="font-size: 13px;"><i class="fa fa-calendar"></i>
                <?php echo date("F d, Y", strtotime($tgl)); ?></p>
        </div>
        <?php } ?>
        <div class="col-md-4 col-sm-12">
            <div class="row">
                <div class="col">
                    <h5>IKUTI KAMI</h5>
                    <hr align="left">
                    <div class="sosmed mb-5">
                        <div class="sosmed-items bg1"><i class="fa fa-facebook"></i>
                            <div class="follower">56 K</div>
                            <div class="status">FANS</div>
                        </div>
                        <div class="sosmed-items bg2"><i class="fa fa-twitter"></i>
                            <div class="follower">1.5 M</div>
                            <div class="status">FOLLOWER</div>
                        </div>
                        <div class="sosmed-items bg3"><i class="fa fa-google"></i>
                            <div class="follower">13 K</div>
                            <div class="status">FOLLOWER</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5>KATEGORI POPULER</h5>
                    <hr align="left">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            style="background-color: transparent;">Dekorasi Apartemen
                            <span class="badge badge-success badge-pill">23</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            style="background-color: transparent;">Desain Dapur
                            <span class="badge badge-success badge-pill">25</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            style="background-color: transparent;">Desain Kamar Mandi
                            <span class="badge badge-success badge-pill">32</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            style="background-color: transparent;">Desain Kamar Tidur
                            <span class="badge badge-success badge-pill">16</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bahwah -->
    <div class="Bawah">
        <div class="row">
            <div class="col">
                <h4 class="font-weight-bold"><span class="text-success">ARTIKEL</span> TERBARU</h4>
                <hr align="left">
            </div>
        </div>
        <div class="row mb-3">
            <?php
                $query="SELECT * FROM tbl_pos";
                $result=mysqli_query($db,$query);
                while ($data = mysqli_fetch_assoc($result)) {
                    $tgl = $data['tgl'];
                    $kalimat2= $data['isi'];
                    $judul = $data['judul'];
                    $judul_maksimal=27;
                    $hasil2=substr($judul, 0, $judul_maksimal);
                    $huruf_maksimal=80;
                    $hasil=substr($kalimat2, 0, $huruf_maksimal);
            ?>
            <div class="col-md-4 col-sm-12 mb-4">
                <div class="imgup mb-2"><img src="admin/assets/images/foto_pos/<?php echo $data['gambar'];?>"
                        height="280px" width="100%" alt="..."></div>
                <h5>
                    <a href="detail-blog.php?id=<?php echo $data['id_pos'] ?>"
                        class="font-weight-bold "><?php echo $hasil2.' . . .'; ?></a>
                </h5>
                <hr align="left" class="mb-1">
                <p class="font-weight-normal" style="font-size: 13px;"><i class="fa fa-calendar"></i>
                    <?php echo date("F d, Y", strtotime($tgl)); ?></p>
                <div class="text-justify"><?php echo $hasil.' . . .'; ?></div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php require "footer.php"; ?>