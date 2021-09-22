<?php
if (isset($_GET['pages']))
{
    if ($_GET['pages'] == "dashboard")
    {
        include 'dashboard.php';
    }
    elseif ($_GET['pages'] == "produk")
    {
        include 'produk.php';
    }
    elseif ($_GET['pages'] == "tambah-produk")
    {
        include 'tambah-produk.php';
    }
    elseif ($_GET['pages'] == "ubah-produk")
    {
        include 'ubah-produk.php';
    }
    elseif ($_GET['pages'] == "hapus-produk")
    {
        include 'hapus-produk.php';
    }
    elseif ($_GET['pages'] == "tambah-kategori")
    {
        include 'tambah-kategori.php';
    }
    elseif ($_GET['pages'] == "pelanggan")
    {
        include 'pelanggan.php';
    }
    elseif ($_GET['pages'] == "order")
    {
        include 'order.php';
    }
    elseif ($_GET['pages'] == "detail-order")
    {
        include 'detail-order.php';
    }
    elseif ($_GET['pages'] == "pembayaran")
    {
        include 'pembayaran.php';
    }
    elseif ($_GET['pages'] == "pos")
    {
        include 'pos.php';
    }
    elseif ($_GET['pages'] == "tambah-pos")
    {
        include 'tambah-pos.php';
    }
    elseif ($_GET['pages'] == "kategori-pos")
    {
        include 'kategori-pos.php';
    }
    elseif ($_GET['pages'] == "ubah-pos")
    {
        include 'ubah-pos.php';
    }
    elseif ($_GET['pages'] == "logout")
    {
        include 'logout.php';
    }
}
else
{
    include 'dashboard.php';
}
?>
