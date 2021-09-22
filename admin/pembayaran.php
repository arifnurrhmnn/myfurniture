<?php require "../koneksi.php"; ?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <?php
                    $id_order=$_GET['id'];
                    $query = "SELECT * FROM tbl_pembayaran WHERE id_order='$id_order'";
                    $result = mysqli_query($db,$query);
                    $data = mysqli_fetch_assoc($result);
                    $tgl = $data['tgl_bayar'];
                ?>
                <label for="productname">Bukti Transfer</label><br>
                <img src="../assets/img/bukti-transfer/<?php echo $data['bukti_transfer'] ?>" alt="product img" class="img-fluid"
                    style="max-width: 200px;" /><br>
                <br>
                <table class="table">
                    <tr>
                        <th>Nama Pembayar</th>
                        <td><?php echo $data['nm_pembayar'] ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?php echo $data['nm_bank'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo date("d/m/Y", strtotime($tgl)); ?></td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td><?php echo number_format($data['jml_pembayaran']); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label class="control-label">Ubah Status</label>
                        <select class="form-control select2" name="status">
                            <option>- pilih status -</option>
                            <option value="Menyiapkan Produk">Menyiapkan Produk</option>
                            <option value="Produk Dikirim">Produk Dikirim</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productname">Masukkan Resi Pengiriman</label>
                        <input id="productname" name="resi" type="text" class="form-control">
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary waves-effect waves-light pl-5 pr-5 mt-3 pull-right">Edit</button>
                </form>
                <?php
                    if (isset($_POST['edit'])) {
                        $status=$_POST['status'];
                        $resi=$_POST['resi'];
                        $qedit = "UPDATE tbl_order SET status='$status', no_resi='$resi' WHERE id_order='$id_order'";
                        $redit =mysqli_query($db,$qedit);

                        echo "<script>alert('Status Sudah dibah menjadi ".$status."')</script>";
	                    echo "<script>location='index.php?pages=order';</script>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>