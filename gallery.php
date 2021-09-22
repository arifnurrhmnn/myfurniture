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

    .col-md-4 {
        padding: 3px;
    }

    #box,
    #box-b {
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    #box::after {
        background-color: black;
        opacity: 0.8;
        position: absolute;
        overflow: hidden;
        top: 100%;
        bottom: 0;
        left: 3px;
        right: 3px;
        padding: 23px;
        content: attr(data-text);
        text-align: center;
        font-size: 14px;
        color: white;
        transition: 0.9s ease;
    }

    #box-b::after {
        background-color: black;
        opacity: 0.8;
        position: absolute;
        overflow: hidden;
        top: 100%;
        bottom: 0;
        left: 3px;
        right: 3px;
        padding: 25px;
        content: attr(data-text);
        text-align: center;
        font-size: 14px;
        color: white;
        transition: 0.9s ease;
    }

    #box:hover::after,
    #box-b:hover::after {
        top: 75%;
    }
</style>
<div class="banner mb-3">
    <div class="container-fluid img">
        <div class="container-fluid box">
            <h3>GELLERY</h3>
            <p>Home > <a href="gallery.php" class="text-primary">Gallery</a></p>
        </div>
    </div>
</div>

<div class="container bg-white rounded">
    <div class="row">
        <?php
                $query="SELECT * FROM tbl_pos ORDER BY id_pos desc";
                $result=mysqli_query($db,$query);
                while ($data = mysqli_fetch_array($result)) {
            ?>
        <div class="col-md-4" id="box" data-text="<?php echo $data['judul']; ?>">
            <a href="detail-blog.php?id=<?php echo $data['id_pos'] ?>">
                <img src="admin/assets/images/foto_pos/<?php echo $data['gambar'];?>" alt="" width="100%"
                    height="280px">
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<?php require "footer.php"; ?>