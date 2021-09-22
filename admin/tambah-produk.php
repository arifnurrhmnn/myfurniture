<?php include "../koneksi.php" ?>

<!-- Menampilkan Daftar Kategori Produk -->
<?php
	$query = "SELECT * FROM tbl_kat_produk";
	$result = mysqli_query($db, $query);
?>

<!-- Menambahkan Data Produk -->
<?php
if (isset($_POST['tambah']))
{
    $kategori = $_POST['id_kategori'];
    $nmProduk = $_POST['nama'];
    $berat = $_POST['berat'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $nmGambar = $_FILES['img']['name'];
    $lokasi = $_FILES['img']['tmp_name'];

    if (!empty($lokasi)) //Jika temporari tidak kosong 
    { 
		//memindah file gambar dari file temporari ke folder assets/images/foto_produk/
		move_uploaded_file($lokasi, "assets/images/foto_produk/" . $nmGambar);
		//Memasukkan data ke tabel tbl_produk
        $query_add = "INSERT INTO tbl_produk
                (id_kategori,nm_produk,berat,harga,stok,gambar,deskripsi)
				VALUE('$kategori', '$nmProduk', '$berat', '$harga', '$stok','$nmGambar', '$deskripsi')";
		$exec_add = mysqli_query($db, $query_add);
		//Menampilkan pesan jika data berhasil di masukkan
        echo "<p class='alert alert-success' role='alert'>
                Berhasil Menambahkan Data Produk.<br />
                <a href='index.php?pages=produk'>Lihat Semua Produk</a>
                </p>";
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

<div class="row">
	<div class="col-12">
		<div class="card m-b-20">
			<div class="card-body">
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Nama Produk</label>
								<input name="nama" type="text" class="form-control" required></div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">Kategori Produk</label>
								<select class="form-control select2" name="id_kategori">
									<option>Pilih Kategori</option>
									<?php while($pilih = mysqli_fetch_array($result)): ?>
									<option  value="<?php echo $pilih['id_kategori']?>" >
										<?php echo $pilih['nm_kategori']  ?>
									</option>
									<?php endwhile;?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Berat Produk (Kg)</label>
								<input name="berat" type="number" class="form-control" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Harga Produk</label>
								<input name="harga" type="number" class="form-control" required></div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Stok Produk</label>
								<input name="stok" type="number" class="form-control" required></div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Masukkan Gambar Produk</label>
								<input type="file" class="filestyle" data-buttonname="btn-secondary" name="img" required></div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Deskripsi Produk</label>
								<textarea id="elm1" name="deskripsi"></textarea>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-success waves-effect waves-light" name="tambah">Tambah</button>
				</form>
			</div>
		</div>
	</div>
</div>