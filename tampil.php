<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku Tamu</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .search-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }

        .search-container button {
            margin-left: 10px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #45a049;
        }

        .btn-tambah-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-tambah {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-tambah:hover {
            background-color: #3e8e41; /* Warna lebih gelap saat hover */
            color: white; /* Tetap putih saat di-hover */
        }
    </style>
</head>
<body>
    <h1>Data Siswa</h1>

    <div class="search-container">
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Cari berdasarkan nama siswa...">
            <button type="submit">Cari</button>
            <button type="button" onclick="window.location.href='tampil.php'">Refresh</button>
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "datasiswa2");

        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $sql = "SELECT * FROM data_siswa2 WHERE nama LIKE '%$search%' ORDER BY tanggal_lahir DESC";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $id = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $id++ . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['kelas'] . "</td>";
                echo "<td>" . $row['jurusan'] . "</td>";
                echo "<td>" . $row['tanggal_lahir'] . "</td>";
                echo "<td>
                          <a href='edit.php?id=" . $row['id'] . "'>Edit</a> | 
                          <a href='hapus.php?id=" . $row['id'] . "'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
    <div class="btn-tambah-container">
        <a href="index.php" class="btn-tambah">Tambah Data</a>
    </div>
</body>
</html>
