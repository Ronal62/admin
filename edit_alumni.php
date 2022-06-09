<?php 
include 'header.php';
include 'menu.php';
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM alumni WHERE id_alumni = $id"));

$tgl = explode(',', $data['tetala']);
$almt = explode('-', $data['alamat']);
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
							EDIT DATA ALUMNI
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
									<input type="hidden" name="id_alumni" value="<?= $id ?>">
									<input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" placeholder="Masukkan Nama Alumni">
								</div>
							</div>

							
							<label for="password">Tetala</label>
							<div class="row clearfix">
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="tempat" value="<?= $tgl[0] ?>" class="form-control" placeholder="Tempat Lahir">	
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-line">
											<input type="date" name="tanggal" value="<?= date('Y-m-d',strtotime($tgl[1])) ?>" class="form-control" placeholder="Tanggal Lahir">
										</div>
									</div>
								</div>
							</div>


							<label for="password">Alamat</label>
							<div class="row clearfix">
								<div class="col-md-4">
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="desa" value="<?= $almt[0] ?>" class="form-control" placeholder="Nama Desa">	
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="kec" value="<?= $almt[1] ?>" class="form-control" placeholder="Nama Kecamatan">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="kab" value="<?= $almt[2] ?>" class="form-control" placeholder="Nama Kabupaten">
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
											if ($i == $data['tahun_lulus']) {
												$sc = 'selected';
											} else {
												$sc = '';	
											}
											?>
											<option <?= $sc ?> value="<?= $i; ?>"><?= $i; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>

								<label for="text">Jenjang</label>
								<div class="form-group">
									<div class="form-line">
										<input name="jenjang" id="text" value="<?= $data['jenjang'] ?>" class="form-control" placeholder="Jenjang Kelanjutan">
									</div>
								</div>

								<label for="foto">FOTO</label>
								<div class="form-group">
									<img src="<?= 'images/image-gallery/foto_alumni/' .$data['foto']?>" height="100">
									<input type="hidden" name="foto_lama" value="<?= $data['foto']?>">
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

		$id_alumni = $_POST['id_alumni'];
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
		$foto = $_FILES['foto']['tmp_name'];

		$acak = rand(1,999);
		$tujuan_foto = $acak . $filename;
		$tempat_foto = 'images/image-gallery/foto_alumni/' . $tujuan_foto;
		$lama = $_POST['foto_lama'];

		if ($filename != '') {
			$buat_foto = $tujuan_foto;
			$d = 'images/image-gallery/foto_alumni/' . $lama;
			@unlink("$d");
			copy($foto, $tempat_foto);
		}else{
			$buat_foto = $lama;
		}
		$sql = mysqli_query($kon,  "UPDATE alumni SET nama = '$nama', tetala = '$tetala', alamat  = '$alamat', tahun_lulus = '$tahun_lulus', jenjang = '$jenjang', foto = '$buat_foto' WHERE id_alumni = $id_alumni ");
		if ($sql) {
			echo "
			<script>
			alert('Data Berhasil Disimpan');
			window.location = 'alumni.php';
			</script>
			";
		}
		
	}

	?>