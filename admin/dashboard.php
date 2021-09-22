<?php require "../koneksi.php"; ?>

<?php 
$q = "SELECT * FROM tbl_produk a JOIN tbl_kat_produk b ON a.id_kategori=b.id_kategori GROUP BY nm_kategori";
$res = mysqli_query($db,$q);

$q2 ="SELECT SUM(stok) as jml FROM tbl_produk p JOIN tbl_kat_produk t ON p.id_kategori = t.id_kategori GROUP BY nm_kategori";
$res2 = mysqli_query($db,$q2);

$q3 = "SELECT SUM(jml_pembayaran) as jml FROM tbl_pembayaran";
$res3 = mysqli_query($db,$q3);
$dta3 = mysqli_fetch_assoc($res3);

$q4 = "SELECT COUNT(id_pelanggan) as jml FROM tbl_pelanggan";
$res4 = mysqli_query($db,$q4);
$dta4 = mysqli_fetch_assoc($res4);

$q5 = "SELECT SUM(stok) as jml FROM tbl_produk";
$res5 = mysqli_query($db,$q5);
$dta5 = mysqli_fetch_assoc($res5);

$q6 = "SELECT COUNT(id_pos) as jml FROM tbl_pos";
$res6 = mysqli_query($db,$q6);
$dta6 = mysqli_fetch_assoc($res6);
?>

<script type="text/javascript" src="assets/js/Chart.js"></script>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-xl-3">
			<div class="mini-stat clearfix bg-orange">
				<span class="font-40 text-white mr-0 float-right"><i class="mdi mdi-cart-outline"></i></span>
				<div class="mini-stat-info mt-3 float-left">
					<span style="font-size: small;" class="text-white">Total Pendapatan</span>
				</div>
				<div class="clearfix"></div>
				<p class=" mb-0 m-t-10 text-muted">
					<h4 class="counter font-light mt-0 text-white">Rp. <?php echo number_format($dta3['jml']); ?></h4>
				</p>
			</div>
		</div>
		<div class="col-md-6 col-xl-3">
			<div class="mini-stat clearfix bg-primary">
				<span class="font-40 text-white mr-0 float-right"><i class="mdi mdi-account-multiple"></i></span>
				<div class="mini-stat-info mt-3 float-left">
					<span style="font-size: small;" class="text-white">Total Member</span>
				</div>
				<div class="clearfix"></div>
				<p class=" mb-0 m-t-10 text-muted">
					<h4 class="counter font-light mt-0 text-white"><?php echo number_format($dta4['jml']); ?> Orang</h4>
				</p>
			</div>
		</div>
		<div class="col-md-6 col-xl-3">
			<div class="mini-stat clearfix bg-success">
				<span class="font-40 text-white mr-0 float-right"><i class="mdi mdi-gift"></i></span>
				<div class="mini-stat-info mt-3 float-left">
					<span style="font-size: small;" class="text-white">Total Produk</span>
				</div>
				<div class="clearfix"></div>
				<p class=" mb-0 m-t-10 text-muted">
					<h4 class="counter font-light mt-0 text-white"><?php echo number_format($dta5['jml']); ?> Unit</h4>
				</p>
			</div>
		</div>
		<div class="col-md-6 col-xl-3">
			<div class="mini-stat clearfix bg-purple">
				<span class="font-40 text-white mr-0 float-right"><i class="mdi mdi-lead-pencil"></i></span>
				<div class="mini-stat-info mt-3 float-left">
					<span style="font-size: small;" class="text-white">Total Artikel</span>
				</div>
				<div class="clearfix"></div>
				<p class=" mb-0 m-t-10 text-muted">
					<h4 class="counter font-light mt-0 text-white"><?php echo number_format($dta6['jml']); ?> Artikel</h4>
				</p>
			</div>
		</div>
	</div>
</div>

<div class="stok">
	<div class="container">
		<div class="card pr-4">
			<div class="card-body">
				<canvas id="myChart"></canvas>
			</div>
		</div>
	</div>
</div>

<script>
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [<?Php while ($row = mysqli_fetch_array($res)){ echo '"' .$row['nm_kategori']. '",'; } ?>],
			datasets: [{
				label: 'Stok Produk',
				data: [<?Php while ($row = mysqli_fetch_array($res2)){ echo '"' .$row['jml']. '",'; } ?>],
				backgroundColor: [
					'rgba(255, 99, 132, 0.8)',
					'rgba(54, 162, 235, 0.8)',
					'rgba(255, 206, 86, 0.8)',
					'rgba(75, 192, 192, 0.8)',
					'rgba(153, 102, 255, 0.8)',
					'rgba(255, 159, 64, 0.8)'
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 3
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
