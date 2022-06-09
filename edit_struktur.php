<?php 
include 'header.php';
include 'menu.php';
include 'koneksi.php';
$id_galery = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($kon,"SELECT * FROM struktur WHERE id_struktur = $id_struktur "));
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>DATA STRUKTUR</h2>
		</div>

		<!-- Vertical Layout -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							EDIT STRUKTUR
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
									<input type="hidden" name="id_struktur" value="<?= $id_struktur ?>">
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
	
	$ekstensi = array('png','jpg','jpeg');
	$filename = $_FILES['foto']['name'];
	$ukuran = $_FILES['foto']['size'];
	$ext = pathinfo($filename,PATHINFO_EXTENSION);
	$foto = $_FILES['foto']['tmp_name'];
	$nama_lama = $_POST['foto_lama'];
	$id_galery = $_POST['id_struktur'];

	if ($foto == '') {
		$nm = $nama_lama;
		$sql = mysqli_query($kon, "UPDATE struktur SET foto =  '$nm',  nama = '$nama' WHERE id_struktur = $id_struktur ");
		if ($sql) {
			echo "
			<script>
			alert('Foto Berhasil Disimpan');
			window.location = 'struktur.php';
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

			$sql = mysqli_query($kon, "UPDATE struktur SET foto =  '$nm',  nama = '$nama' WHERE id_struktur = $id_struktur ");
			if ($sql) {
				echo "
				<script>
				alert('Foto Berhasil Disimpan');
				window.location = 'struktur.php';
				</script>
				";
			}
			move_uploaded_file($_FILES['foto']['tmp_name'], 'images/image-gallery/'.$nm);
		}
	}
}
?>