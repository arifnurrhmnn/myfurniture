<?php require "../koneksi.php" ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<?php
					$id_order = $_GET['id'];
					$query = "SELECT * FROM tbl_order o JOIN tbl_pelanggan p ON o.id_pelanggan=p.id_pelanggan WHERE id_order='$id_order'";
					$result = mysqli_query($db,$query);
					$data = mysqli_fetch_assoc($result);
					$tgl = $data['tgl_order'];
					$status = $data['status'];
				?>
				<div class="row">
					<div class="col-9">
						<address>
							<strong>Pelanggan:</strong><br>
							<?php echo $data['nm_pelanggan'] ?><br>
							<?php echo $data['email'] ?><br>
						</address>
					</div>
					<div class="col-3 text-right">
						<address>
							<strong>Alamat Penerima:</strong><br>
							<?php echo $data['nm_penerima']; ?><br>
							<?php echo $data['alamat_pengiriman'];?><br>
							<?php echo $data['kode_pos'];?><br>
						</address>
					</div>
				</div>
				<div class="row">
					<div class="col-6 m-t-30">
						<address>
							<strong>Tanggal Order</strong><br>
							<?php echo date("F d, Y", strtotime($tgl)); ?>
						</address>
					</div>
					<div class="col-6 m-t-30 text-right">
						<address>
							<strong>Status</strong><br>
							<?php 
                                if ($status == 'Belum Dibayar') {
                                    echo "<span class='badge badge-warning'>".$status."</span>";
                                }
                                elseif ($status == 'Sudah Dibayar') {
                                    echo "<span class='badge badge-secondary'>".$status."</span>";
                                }
                                elseif ($status == 'Menyiapkan Produk') {
                                    echo "<span class='badge badge-info'>".$status."</span>";
								}
								elseif ($status == 'Produk Dikirim') {
									echo "<span class='badge badge-danger'>".$status."</span></br>";
									echo "<span style='font-size: small;'>Resi: ".$data['no_resi']."</span>";
								}
								elseif ($status == 'Produk Diterima') {
                                    echo "<span class='badge badge-success'>".$status."</span>";
                                }
                            ?>
							<br>
							<br></address>
					</div>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Gambar</th>
							<th scope="col">Nama Produk</th>
							<th scope="col">Harga</th>
							<th scope="col" class="text-center">Jumlah</th>
							<th scope="col" class="text-right">Subharga</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$id_order=$_GET['id'];
							$order = "SELECT ongkir,total_order FROM tbl_order WHERE id_order='$id_order'";
                        	$res = mysqli_query($db,$order);
                            $dta = mysqli_fetch_assoc($res);

                            $subtotal = 0;
                            $qproduk="SELECT * FROM tbl_detail_order d JOIN tbl_produk p ON d.id_produk=p.id_produk WHERE id_order = '$id_order'";
                            $rproduk=mysqli_query($db,$qproduk);
                            while ($produk = mysqli_fetch_assoc($rproduk)) {
                        ?>
						<tr>
							<td class="product-list-img">
								<?php if($produk['gambar']!=null):?>
								<img width="40" src="assets/images/foto_produk/<?php echo $produk['gambar']?>"
									class="img-fluid" alt="tbl">
								<?php endif;?>
							</td>
							<td><?php echo $produk['nm_produk']; ?></td>
							<td>Rp. <?php echo number_format($produk['harga']);?></td>
							<td class="text-center"><?php echo $produk['jml_order'];?> </td>
							<td class="text-right">Rp.
								<?php echo number_format($produk['subharga']);?></td>
						</tr>
						<?php 
							$subtotal+=$produk['subharga'];
                            } 
                        ?>
						<tr>
							<td class="thick-line"></td>
							<td class="thick-line"></td>
							<td class="thick-line"></td>
							<td class="thick-line text-center">
								<strong>Subtotal</strong>
							</td>
							<td class="thick-line text-right">Rp.<?php echo number_format($subtotal);?></td>
						</tr>
						<tr>
							<td class="no-line"></td>
							<td class="no-line"></td>
							<td class="no-line"></td>
							<td class="no-line text-center">
								<strong>Shipping</strong>
							</td>
							<td class="no-line text-right">Rp. <?php echo number_format($dta['ongkir']);?></td>
						</tr>
						<tr>
							<td class="no-line"></td>
							<td class="no-line"></td>
							<td class="no-line"></td>
							<td class="no-line text-center">
								<strong>Total</strong>
							</td>
							<td class="no-line text-right">
								<h4 class="m-0">Rp. <?php echo number_format($dta['total_order']);?></h4>
							</td>
						</tr>
					</tbody>
				</table>
				<a href="index.php?pages=order" class="btn btn-secondary waves-effect">Kembali</a>
			</div>
		</div>
	</div>
</div>