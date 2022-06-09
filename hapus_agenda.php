<?php 
include 'koneksi.php';

$id = $_GET['id'];

$sql = mysqli_query($kon, "DELETE FROM agenda WHERE id_agenda = $id ");

if ($sql) {
?>
<script type="text/javascript">
	alert ("Data Berhasil Di hapus");
	window.location.href="agenda.php";
</script>
<?php
} else {
	echo "Data Tak Dihapus";
}

?>