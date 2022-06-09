<?php 
include 'header.php';
include 'menu.php';
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>DATA MoU</h2>
		</div>

		<!-- Vertical Layout -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							TAMBAH MoU
						</h2>
						<ul class="header-dropdown m-r--5">
							<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<i class="material-icons">more_vert</i>
								</a>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:void(0);">Action</a></li>
									<li><a href="javascript:void(0);">Another action</a></li>
									<li><a href="javascript:void(0);">Something else here</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="body">
						<form action="" method="POST" enctype="multipart/form-data">
							<label for="email_address">Nama Industri</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="industri" id="email_address" class="form-control" placeholder="Masukkan Nama Industri">
								</div>
							</div>
							<label for="date">Tanggal MoU</label>
							<div class="form-group">
								<div class="form-line">
									<input type="date" name="tgl_mou" id="date" class="form-control" placeholder="Tanggal MoU">
								</div>
							</div>

							<label for="text">Alamat</label>
							<div class="form-group">
								<div class="form-line">
									<textarea name="alamat" id="email_address" class="form-control" placeholder="Masukkan Nama Alamat"></textarea>
								</div>
							</div>

							<label for="text">Tentang MoU</label>
							<div class="form-group">
								<div class="form-line">
									<textarea id="ckeditor" name="isi_mou" required>
										<h2>Tentang MoU SMK</h2>
									</textarea>
									
									
								</div>
							</div>
							
							<button type="submit" name="simpan" class="btn btn-primary m-t-15 waves-effect">SIMPAN</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- #END# Vertical Layout -->
	</div>
</section>
<?php
include 'footer.php';
include 'koneksi.php';

if (isset($_POST['simpan'])) {

	$industri = $_POST['industri'];
	$tgl_mou = $_POST['tgl_mou'];
	$alamat = $_POST['alamat'];
	$isi_mou = $_POST['isi_mou'];

	//$kode_awal = explode(' ', $industri);
	//$kode_akhir = implode(' ', $kode_awal);
	//$kode_oke = strtolower($kode_akhir);


	$sql = mysqli_query($kon, "INSERT INTO mou VALUES('', '$industri', '$tgl_mou', '$alamat', '$isi_mou', '$id_mou')");
	if ($sql) {
		echo "
		<script>
		alert('MoU Berhasil Disimpan');
		window.location = 'mou.php';
		</script>
		";
	}

	

}
?>