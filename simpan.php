<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "datasiswa2");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$tanggal_lahir = $_POST['tanggal_lahir'];

// Validasi input
if (!is_numeric($kelas)) {
    die("Kelas harus berupa angka. <a href='index.php'>Kembali</a>");
}

// Simpan data ke database
$sql = "INSERT INTO data_siswa2 (nama, kelas, jurusan, tanggal_lahir) VALUES ('$nama', '$kelas', '$jurusan', '$tanggal_lahir')";
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan! <a href='tampil.php'>Lihat Buku Tamu</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
