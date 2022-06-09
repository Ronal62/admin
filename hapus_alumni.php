<?php 
include 'koneksi.php';

$id = $_GET['id'];

$dt = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM alumni WHERE id_alumni = $id "));

$foto_lama = $dt['foto'];
$hapus_foto = 'images/image-gellery/foto_alumni/' . $foto_lama;
@unlink("$hapus_foto");

$sql = mysqli_query($kon, "DELETE FROM alumni WHERE id_alumni = $id ");
if ($sql) {
?>
<script type="text/javascript">
	alert ("Data Berhasil Di hapus");
	window.location.href="alumni.php";
</script>
<?php
} else {
	echo "Data Tak Dihapus";
}

?>