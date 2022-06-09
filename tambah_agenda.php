<?php 
include 'header.php';
include 'menu.php';
?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>DATA AGENDA</h2>
		</div>

		<!-- Vertical Layout -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							TAMBAH AGENDA
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
							<label for="email_address">Nama Agenda</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="nama" id="email_address" class="form-control" placeholder="Masukkan Nama Agenda">
								</div>
							</div>
							<label for="password">Tanggal Agenda</label>
							<div class="form-group">
								<div class="form-line">
									<input type="date" name="tgl_agenda" id="date" class="form-control" placeholder="Tanggal Agenda">
								</div>
							</div>

							<label for="email_address">Pelaksana</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="pelaksana" id="email_address" class="form-control" placeholder="Masukkan Nama Pelaksana">
								</div>
							</div>

							<label for="text">Deskripsi</label>
							<div class="form-group">
								<div class="form-line">
									<textarea id="ckeditor" name="deskripsi" required>
                                <h2>Agenda Sokolah</h2>
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

	$nama = $_POST['nama'];
	$tgl_agenda = $_POST['tgl_agenda'];
	$deskripsi = $_POST['deskripsi'];
	$pelaksana = $_POST['pelaksana'];

	$kode_awal = explode(' ', $nama);
	$kode_akhir = implode(' ', $kode_awal);
	$kode_oke = strtolower($kode_akhir);


		$sql = mysqli_query($kon, "INSERT INTO agenda VALUES('', '$nama', '$tgl_agenda', '$deskripsi', '$pelaksana', 
	     '$kode_oke')");
		if ($sql) {
			echo "
			<script>
			alert('Agenda Berhasil Disimpan');
			window.location = 'agenda.php';
			</script>
			";
		}
		
	

}
?>