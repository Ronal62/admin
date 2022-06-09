<?php 
include 'header.php';
include 'menu.php';
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM agenda WHERE id_agenda = $id"));
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>EDIT AGENDA</h2>
		</div>

		<!-- Vertical Layout -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							Edit Agenda
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
							<input type="hidden" name="id_agenda" value="<?= $id ?>">
							<label for="email_address">Nama Agenda</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="nama" value="<?= $data['nama'] ?>" id="email_address" class="form-control" placeholder="Masukkan Nama Agenda">
								</div>
							</div>
							<label for="date">Tanggal Agenda</label>
							<div class="form-group">
								<div class="form-line">
									<input type="date" name="tgl_agenda" value="<?= $data['tgl_agenda'] ?>" id="date" class="form-control" placeholder="Tanggal Agenda">
								</div>
							</div>

							<label for="text">Pelaksana</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="pelaksana" value="<?= $data['pelaksana'] ?>" id="text" class="form-control" placeholder="Masukkan Nama Pelaksana">
								</div>
							</div>

							<label for="text">Deskripsi</label>
							<div class="form-group">
								<div class="form-line">
									<textarea id="ckeditor" name="deskripsi" required="">
                                <?= $data['deskripsi'] ?>
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


if (isset($_POST['simpan'])) {

	$id_agenda = mysqli_real_escape_string($kon, $_POST['id_agenda']);
	$nama = mysqli_real_escape_string($kon, $_POST['nama']);
	$tgl_agenda = mysqli_real_escape_string($kon, $_POST['tgl_agenda']);
	$pelaksana = mysqli_real_escape_string($kon, $_POST['pelaksana']);
	$deskripsi = mysqli_real_escape_string($kon, $_POST['deskripsi']);


	// $kode_awal = explode(' ', $nama);
	// $kode_akhir = implode(' ', $kode_awal);
	// $kode_oke = strtolower($kode_akhir);


		$sql = mysqli_query($kon, "UPDATE agenda SET nama = '$nama', tgl_agenda = '$tgl_agenda', deskripsi =
			'$deskripsi', pelaksana = '$pelaksana' WHERE id_agenda = $id");
		if ($sql) {
			echo "
			<script>
			alert('agenda Berhasil Disimpan');
			window.location = 'agenda.php';
			</script>
			";
		}
		
	

}
?>