<?php 
include 'header.php';
include 'menu.php';
include 'koneksi.php';
$id_galery = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($kon,"SELECT * FROM galeri WHERE id_galeri = $id_galery "));
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
							EDIT FOTO GALERY
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
									<input type="text" name="nama" value="<?= $data['nama'] ?>" " class="form-control" placeholder="Masukan Nama Foto">
									<input type="hidden" name="id_galery" value="<?= $id_galery ?>">
								</div>
							</div>
							<label for="password">TGL UPLOAD</label>
							<div class="form-group">
								<div class="form-line">
									<input type="date" name="tgl_upload" value="<?= $data['tgl_upload'] ?>" class="form-control" placeholder="Tgl Upload Foto">
								</div>
							</div>
							<label for="foto">UPLOAD FOTO</label>
							<div class="form-group">
								<img src="<?= 'images/image-gallery/' .$data['foto'] ?>" height="100">
								<input type="hidden" name="foto_lama" value="<?= $data['foto'] ?>">
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
	$foto = $_FILES['foto']['tmp_name'];
	$nama_lama = $_POST['foto_lama'];
	$id_galery = $_POST['id_galery'];

	if ($foto == '') {
		$nm = $nama_lama;
		$sql = mysqli_query($kon, "UPDATE galeri SET foto =  '$nm', tgl_upload = '$tgl_upload',  nama = '$nama' WHERE id_galeri = $id_galery ");
		if ($sql) {
			echo "
			<script>
			alert('Foto Berhasil Disimpan');
			window.location = 'galery.php';
			</script>
			";
		}
	}else{


		if (!in_array($ext, $ekstensi)) {
			echo "Yang Anda Upload Bukan Gambar Atau Foto";
		}else{
			$ex = explode('.', $filename);
			$dot = $ex[1];
			$nm = uniqid().'.'.$dot;

			$sql = mysqli_query($kon, "UPDATE galeri SET foto =  '$nm', tgl_upload = '$tgl_upload',  nama = '$nama' WHERE id_galeri = $id_galery ");
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
}
?>