<?php require "header.php";

if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan Login Dulu');</script>";
    echo "<script>location='login.php';</script>";
}
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
            <h3>RINCIAN PRODUK</h3>
            <p>Home > <a href="orderan.php">Orderan</a> > <a href="#">Rincian Produk</a></p>
        </div>
    </div>
</div>

<div class="container bg-white rounded pt-4">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th class="text-center">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $id = $_GET['id'];
                        $no = 1;
                        $sql="SELECT * FROM tbl_detail_order d JOIN tbl_produk p ON d.id_produk=p.id_produk WHERE id_order = '$id'";
                        $query=mysqli_query($db,$sql);
                        while ($produk = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td class="product-list-img">
                                <?php if($produk['gambar']!=null):?>
                                <img width="40" src="admin/assets/images/foto_produk/<?php echo $produk['gambar']?>" class="img-fluid" alt="tbl">
                                <?php endif;?>
                            </td>
                            <td><?php echo $produk['nm_produk']; ?></td>
                            <td class="text-center"><?php echo $produk['jml_order'];?> </td>
                    
                        </tr>
        
                    <?php
                        $no++;       
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require "footer.php"; ?>