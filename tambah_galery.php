<?php 
include 'header.php';
include 'menu.php';
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>DATA GELERY</h2>
		</div>

		<!-- Vertical Layout -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							TAMBAH FOTO GALERY
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
							<label for="email_address">NAMA FOTO</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="nama" id="email_address" class="form-control" placeholder="Masukan Nama Foto">
								</div>
							</div>
							<label for="password">TGL UPLOAD</label>
							<div class="form-group">
								<div class="form-line">
									<input type="date" name="tgl_upload" id="password" class="form-control" placeholder="Tgl Upload Foto">
								</div>
							</div>
							<label for="foto">UPLOAD FOTO</label>
							<div class="form-group">
								<div class="form-line">
									<input type="file" name="foto" id="foto" class="form-control" placeholder="Upload Foto">
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
	$tgl_upload = $_POST['tgl_upload'];
	
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

		$sql = mysqli_query($kon, "INSERT INTO galeri VALUES('', '$nm', '$tgl_upload', '$nama')");
		if ($sql) {
			echo "
			<script>
			alert('Foto Berhasil Disimpan');
			window.location = 'galery.php';
			</script>
			";
		}
		move_uploaded_file($_FILES['foto']['tmp_name'], 'images/image-gallery/'.$nm);
	}

}
?>