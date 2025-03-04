<?php
$conn = mysqli_connect("localhost", "root", "", "datasiswa2");

$id = $_POST['id'];
$nama_siswa = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$tanggal_lahir = $_POST['tanggal_lahir'];

// Validasi input
if (!is_numeric($kelas)) {
    die("Kelas harus berupa angka. <a href='edit.php?id=$id'>Kembali</a>");
}

$sql = "UPDATE data_siswa2 SET nama='$nama_siswa', kelas='$kelas', jurusan='$jurusan', tanggal_lahir='$tanggal_lahir' WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil diupdate! <a href='tampil.php'>Kembali</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
