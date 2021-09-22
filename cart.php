<?php require "header.php"; 
/* if (empty($_SESSION["cart"])) {
    echo "<script type='text/javascript'>swal('Selamat', 'anda berhasil login', 'success');</script>";
}; */
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
            <h3>Cart</h3>
            <p>Home > <a href="#">Cart</a></p>
        </div>
    </div>
</div>

<div class="content">
    <div class="container bg-white rounded pb-4 pt-4">
        <?php
            if (isset($_GET['id']))
            {
                //mengambil id produk
                $id = $_GET['id'];
                unset($_SESSION["cart"][$id]);

                echo "<script type='text/javascript'>swal('Dihapus!', 'Produk Berhasil Dihapus Dari Keranjang', 'success');</script>";
            }
            ?>
        <div class="row">
            <div class="col-12">
                <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Hapus</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th>Subharga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (empty($_SESSION["cart"])) {
                                echo "<script type='text/javascript'>
                                swal({
                                    title: 'Keranjang Kosong',
                                    text: 'Silahkan Memilih Produk Dahulu!',
                                    icon: 'warning',
                                    dangerMode: true,
                                }).then(okay => {
                                    if (okay) {
                                        window.location.href ='shop.php';
                                    };
                                });
                                </script>";
                            }else {
                                $subtotal = 0;
                                foreach ($_SESSION["cart"] as $id_produk => $jumlah) : 
                        ?>
                        <?php
                        $query="SELECT * FROM tbl_produk WHERE id_produk='$id_produk'";
                        $result=mysqli_query($db,$query);
                        $produk=mysqli_fetch_array($result);
                        $subharga=$produk['harga']*$jumlah;
                        ?>

                        <tr>
                            <td>
                                <button class="btn" style="border: none; background: none;" onclick="validate();"><i
                                        class="mdi mdi-close font-18"></i></button>
                                <script>
                                    function validate() {
                                        swal({
                                            title: "Apakah Kamu Yakin?",
                                            text: "Produk Akan Di Hapus Dari Daftar Keranjang",
                                            icon: "warning",
                                            buttons: ["Tidak", "Hapus Sekarang"],
                                            dangerMode: true,
                                        }).then((willDelete) => {
                                            if (willDelete) {
                                                window.location.href =
                                                    "cart.php?id=<?php echo $produk['id_produk']; ?>";
                                            }
                                            /* else {
                                            swal("Produk Tidak Jadi Dihapus");
                                            } */
                                        });
                                    }
                                </script>
                            </td>
                            <td class="product-list-img">
                                <?php if($produk['gambar']!=null):?>
                                <img width="40" src="admin/assets/images/foto_produk/<?php echo $produk['gambar']?>"
                                    class="img-fluid" alt="tbl">
                                <?php endif;?>
                            </td>
                            <td><?php echo $produk['nm_produk']; ?></td>
                            <td>Rp. <?php echo number_format($produk['harga']);?></td>
                            <td class="text-center"><?php echo $jumlah;?> </td>
                            <td>Rp. <?php echo number_format($subharga);?></td>
                        </tr>
                        <?php $subtotal+=$subharga; ?>
                        <?php endforeach ?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <a href="shop.php" class="btn btn-secondary"><i class="fa fa-cart-plus" aria-hidden="true"></i>
                    Lanjut
                    Belanja</a>
                <?php
                    if (empty($_SESSION["cart"])) {
                        echo "<a href='checkout.php' class='btn btn-primary disabled'>Checkout >></a>";
                    } else {
                        echo "<button class='btn btn-primary' onclick='checkout();' >Checkout >></button>";
                        if (!isset($_SESSION["pelanggan"])) {
                        echo "<script type='text/javascript'>
                                function checkout() {
                                    swal({
                                        title: 'Anda Belum Login',
                                        text: 'Silahkan Melakukan Login terlebih Dahulu!',
                                        icon: 'info',
                                        button: 'Login Sekarang',
                                        infomode: true,
                                    }).then(okay => {
                                        if (okay) {
                                            window.location.href ='login.php';
                                        };
                                    });
                                }
                            </script>";
                        } else if (isset($_SESSION["cart"])) {
                            echo "<script type='text/javascript'>
                                function checkout() {
                                    window.location.href ='checkout.php';
                                }
                            </script>";
                        }
                    }                  
                ?>
            </div>
        </div>
    </div>
</div>
<?php require "footer.php"; ?>