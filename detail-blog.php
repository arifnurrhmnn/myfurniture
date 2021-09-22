<?php require "header.php";?>
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

    /*     .col-md-4 p {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    } */
</style>
<?php
$id=$_GET['id'];
$query = "SELECT * FROM tbl_pos WHERE id_pos='$id'";
$result = mysqli_query($db, $query);
$data = mysqli_fetch_assoc($result);
$tgl = $data['tgl'];
?>
<div class="banner mb-5">
    <div class="container-fluid img">
        <div class="container-fluid box">
            <h3>BLOG</h3>
            <p>Home > <a href="blog.php" style="text-decoration: none; color: white;">Blog</a> > <a href=""
                    class="text-primary" style="text-decoration: none;"><?php echo $data['judul']; ?> </a> </p>
        </div>
    </div>
</div>
<div class="contain">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="judul">
                    <h2><?php echo $data['judul'] ?></h2>
                </div>
                <hr width="20%" align="left">
                <div class="sub mb-3">
                    Penulis : <span class="text-primary">Admin</span> | <i
                        class="fa fa-calendar"></i> <?php echo date("F d, Y", strtotime($tgl)); ?>
                </div>
                <div class="gambar mb-4">
                    <img src="admin/assets/images/foto_pos/<?php echo $data['gambar'] ?>" alt="" width="100%" height="430px">
                </div>
                <div class="isi text-justify">
                    <?php echo $data['isi'] ?>
                </div>
            </div>

            <div class="col-md-4 mt-5">
                <!-- <div class="search mb-5 mt-3">
                    <form class="form-group">
                        <input class="form-control" width="100%" type="search" placeholder="Search">
                    </form>
                </div> -->
                <div class="row mt-5">
                    <div class="col">
                        <h5>IKUTI KAMI</h5>
                        <hr align="left" width="20%">
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
                        <hr align="left" width="20%">
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
    </div>
</div>
<?php require "footer.php"; ?>