<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include "../koneksi.php";
                        $no = 1;
                        $query = "SELECT * FROM tbl_pelanggan";
                        $result = mysqli_query($db,$query);
                        while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['nm_pelanggan'] ?></td>
                            <td><?php echo $data['username'] ?></td>
                            <td><?php echo $data['email'] ?></td>
                            <td>
                                <a href="index.php?pages=pelanggan&id=<?php echo $data['id_pelanggan']; ?>" class="text-muted" data-toggle="tooltip"
									data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data pelanggan ini?')"><i
										class="mdi mdi-close font-18" name="delete"></i></a>
                            </td>
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
</div>
<?php
if (isset($_GET['id']))
{
    //mengambil id produk
    $id = $_GET['id'];
    
    //menghapus data
    $queryHapus = "DELETE FROM tbl_pelanggan WHERE id_pelanggan='$id'";
    $execHapus = mysqli_query($db, $queryHapus);

    if ($execHapus)
    {
        //menampilkan pesan dan redirec ke halaman produk
        echo "<script>alert('Data Pelanggan sudah dihapus');</script>";
        echo "<script>location='index.php?pages=pelanggan';</script>";
    }
}
?>