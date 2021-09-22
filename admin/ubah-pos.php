<?php include "../koneksi.php" ?>
<div class="content">
    <div class="container">
        <?php 
            $id = $_GET['id'];
            $panggil = "SELECT * FROM tbl_pos WHERE id_pos='$id' ";
            $resultpanggil = mysqli_query($db, $panggil);
            $dataPos = mysqli_fetch_assoc($resultpanggil);

            $queryKat = "SELECT * FROM tbl_kat_pos";
            $resultKat = mysqli_query($db, $queryKat);
        ?>
        <?php
        if (isset($_POST['ubah']))
        {
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            $kategori = $_POST['kategori'];
            $tgl= date('Y-m-d');
            $nmGambar = $_FILES['gambar']['name'];
            $lokasi = $_FILES['gambar']['tmp_name'];

            if (!empty($lokasi)) {
                move_uploaded_file($lokasi, "assets/images/foto_pos/$nmGambar");

                $queryEdit = "UPDATE tbl_pos SET id_kategori='$kategori', judul='$judul', isi='$isi', gambar='$nmGambar', tgl='$tgl' WHERE id_pos='$id'";
                $resultEdit = mysqli_query($db, $queryEdit);
            }
            else {
                $queryEdit = "UPDATE tbl_pos SET id_kategori='$kategori', judul='$judul', isi='$isi', tgl='$tgl' WHERE id_pos='$id'";
                $resultEdit = mysqli_query($db, $queryEdit);
            }
            echo "<script>alert('Data Postingan sudah di ubah')</script>";
            echo "<script>location='index.php?pages=pos';</script>";
        };
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">Judul</label>
                                <input type="text" class="form-control" name="judul" value="<?php echo $dataPos['judul']; ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Isi Postingan </label>
                                <textarea id="elm1" name="isi" value=""><?php echo $dataPos['isi']; ?></textarea>
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
                                    <?php while($pilih = mysqli_fetch_array($resultKat)): ?>
									<?php $active = ($dataPos['id_kategori'] == $pilih['id_kategori'])?"selected":""?>
									<option value="<?php echo $pilih['id_kategori']?>" <?php echo $active?>>
										<?php echo $pilih['nm_kategori']?>
									</option>
									<?php endwhile;?>
                                </select>
                            </div>
                            <div class="form-group">
								<label class="font-weight-bold">Gambar Sebelumnya</label><br>
								<?php if($dataPos['gambar']!=null):?>
									<img src="assets/images/foto_pos/<?php echo $dataPos['gambar']; ?>" alt="pos img" class="img-fluid"
									style="max-height: 125px;" />
								<?php endif;?>
								
							</div>
                            <div class="form-group">
                                <label class="font-weight-bold">Ganti Gambar</label>
                                <input type="file" class="filestyle" data-buttonname="btn-secondary" name="gambar">
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-3" name="ubah">Ubah Pos</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>