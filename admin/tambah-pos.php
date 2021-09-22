<?php include "../koneksi.php" ?>
<div class="content">
    <div class="container">
        <?php
            $query0 = "SELECT * FROM tbl_kat_pos";
            $result = mysqli_query($db, $query0);
        ?>
        <?php
        if (isset($_POST['post']))
        {
            $kategori = $_POST['kategori'];
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            $tgl= date('Y-m-d');
            $nmGambar = $_FILES['gambar']['name'];
            $lokasi = $_FILES['gambar']['tmp_name'];

            if (!empty($lokasi)) //Jika temporari tidak kosong 
            { 
                //memindah file gambar dari file temporari ke folder assets/images/foto_produk/
                move_uploaded_file($lokasi, "assets/images/foto_pos/" . $nmGambar);
                //Memasukkan data ke tabel tbl_produk
                $query = "INSERT INTO tbl_pos
                        (judul,isi,gambar,id_kategori,tgl)
                        VALUE('$judul','$isi','$nmGambar','$kategori','$tgl')";
                $exec= mysqli_query($db, $query);
                //Menampilkan pesan jika data berhasil di masukkan
                echo "<p class='alert alert-success' role='alert'>
                        Berhasil Menambahkan Postingan.<br />
                        <a href='../blog.php'>Lihat Postingan</a>
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
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">Judul</label>
                                <input type="text" class="form-control" name="judul" required="required">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Isi Postingan </label>
                                <textarea id="elm1" name="isi"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">Kategori</label>
                                <select name="kategori" id="" class="form-control" required="required">
                                    <option value="">Pilih Kategori</option>
									<?php while($pilih = mysqli_fetch_array($result)): ?>
									<option  value="<?php echo $pilih['id_kategori']?>" >
										<?php echo $pilih['nm_kategori']  ?>
									</option>
									<?php endwhile;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Gambar</label>
                                <input type="file" class="filestyle" data-buttonname="btn-secondary" name="gambar" required>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-3" name="post">Pos
                                Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>