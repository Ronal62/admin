<?php 
include 'koneksi.php';

$id = $_GET['id'];

$sql = mysqli_query($kon, "DELETE FROM galeri WHERE id_galeri = $id ");

if ($sql) {
?>
<script type="text/javascript">
	alert ("Data Berhasil Di hapus");
	window.location.href="galery.php";
</script>
<?php
} else {
	echo "Data Tak Dihapus";
}

?>