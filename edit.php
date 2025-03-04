<?php
$conn = mysqli_connect("localhost", "root", "", "datasiswa2");

$id = $_GET['id'];
$sql = "SELECT * FROM data_siswa2 WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku Tamu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Buku Tamu</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br><br>
        Kelas: <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>" required><br><br>
        Jurusan: <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" required><br><br>
        Tanggal Lahir: <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
