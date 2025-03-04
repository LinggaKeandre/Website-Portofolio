<?php
$conn = mysqli_connect("localhost", "root", "", "datasiswa2");

$id = $_GET['id'];
$sql = "DELETE FROM data_siswa2 WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil dihapus! <a href='tampil.php'>Kembali</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
