<?php 
include 'header.php';
include 'menu.php';
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>DATA Alumni</h2>
		</div>

		<!-- Vertical Layout -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							TAMBAH ALUMNI
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
							<label for="email_address">Nama Alumni</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="nama" id="email_address" class="form-control" placeholder="Masukkan Nama Alumni">
								</div>
							</div>

							
							<label for="password">Tetala</label>
							<div class="row clearfix">
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-line">
										<input type="text" name="tempat"  class="form-control" placeholder="Tempat Lahir">	
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-line">
											<input type="date" name="tanggal" class="form-control" placeholder="Tanggal Lahir">
										</div>
									</div>
								</div>
						    </div>
						    <label for="password">Alamat</label>
							<div class="row clearfix">
								<div class="col-md-4">
									<div class="form-group">
										<div class="form-line">
										<input type="text" name="desa"  class="form-control" placeholder="Nama Desa">	
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="kec" class="form-control" placeholder="Nama Kecamatan">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="kab" class="form-control" placeholder="Nama Kabupaten">
										</div>
									</div>
								</div>
						    </div>


							<label for="email_address">Tahun Lulus</label>
							<div class="form-group">
								<div class="form-line">
									<select name="tahun_lulus" class="form-control show-tick">
										<option value=""> -- pilihan tahun -- </option>
										<?php 
										$tahun_lulus = date('Y');
										for ($i = 2010; $i <= $tahun_lulus; $i++){
										?>
											<option value="<?= $i; ?>"><?= $i; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<label for="text">Jenjang</label>
							<div class="form-group">
								<div class="form-line">
									<input name="jenjang" id="text" class="form-control" placeholder="Jenjang Kelanjutan">
								</div>
							</div>

							<label for="foto">FOTO</label>
							<div class="form-group">
								<div class="form-line">
									<input type="file" name="foto" id="foto" class="form-control" placeholder="Foto">
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
 
	$nama = mysqli_real_escape_string($kon, $_POST['nama']);
	$tempat = mysqli_real_escape_string($kon, $_POST['tempat']);
	$tanggal = mysqli_real_escape_string($kon, $_POST['tanggal']);
	$desa = mysqli_real_escape_string($kon, $_POST['desa']);
	$kec = mysqli_real_escape_string($kon, $_POST['kec']);
	$kab = mysqli_real_escape_string($kon, $_POST['kab']);
	$tahun_lulus = mysqli_real_escape_string($kon, $_POST['tahun_lulus']);
	$jenjang = mysqli_real_escape_string($kon, $_POST['jenjang']);

	$tanggal = date ('d-m-Y', strtotime($tanggal));
	$tetala = $tempat . ', ' . $tanggal;
	$alamat = $desa .'-' . $kec . '-' . $kab;

	$ekstensi = array('png','jpg','jpeg');
	$filename = $_FILES['foto']['name'];
	$ukuran = $_FILES['foto']['size'];
	$ext = pathinfo($filename,PATHINFO_EXTENSION);

	if (!in_array($ext, $ekstensi)) {
		echo "Yang Anda Upload Bukan Gambar Atau Foto";
	}else{
		$ex = explode('.', $filename);
		$dot = $ex[1];
		$nm = uniqid().'.'.$dot;

		$sql = mysqli_query($kon, "INSERT INTO alumni VALUES('', '$nama', '$tetala', '$alamat', '$tahun_lulus', '$jenjang', '$nm')");
		if ($sql) {
			echo "
			<script>
			alert('Data Berhasil Disimpan');
			window.location = 'alumni.php';
			</script>
			";
		}
		move_uploaded_file($_FILES['foto']['tmp_name'], 'images/image-gallery/foto_alumni/'.$nm);
	}

}
?>