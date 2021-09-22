<?php require "../koneksi.php" ?>

<!-- Lihat Data Produk -->
<?php
	$query = "SELECT * FROM tbl_pos p JOIN tbl_kat_pos k ON p.id_kategori=k.id_kategori";
    $result = mysqli_query($db, $query);
?>
<?php
if (isset($_GET['id']))
{
    //mengambil id pos
    $id = $_GET['id'];
    //menghapus data
    $queryHapus = "DELETE FROM tbl_pos WHERE id_pos='$id'";
    $execHapus = mysqli_query($db, $queryHapus);

    if ($execHapus)
    {
        //menampilkan pesan dan redirec ke halaman produk
        echo "<script>alert('Postingan sudah dihapus');</script>";
        echo "<script>location='index.php?pages=pos';</script>";
    }
}
?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%"
					cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Kategori</th>
							<th>Tgl Terbit</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
                        <?php $no = 1;?>
                        <?php while ($data = mysqli_fetch_array($result)) : ?>
                        <?php $tgl = $data['tgl']; ?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $data['judul'] ?></td>
							<td><?php echo $data['nm_kategori'] ?></td>
							<td><?php echo date("d/m/Y", strtotime($tgl)); ?></td>
							<td>
								<a href="index.php?pages=ubah-pos&id=<?php echo $data['id_pos']; ?>" class="m-r-15 text-muted" data-toggle="tooltip"
									data-placement="top" title="" data-original-title="Edit"><i
										class="mdi mdi-pencil font-18"></i></a>
								<a href="index.php?pages=pos&id=<?php echo $data['id_pos']; ?>" class="text-muted" data-toggle="tooltip"
									data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus postingan tersebut?')"><i
										class="mdi mdi-close font-18"></i></a>
							</td>
                        </tr>
                        <?php $no++; ?>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>