<?php
// 1. KONEKSI KE DATABASE
$koneksi = mysqli_connect("localhost", "root", "root", "ifmkrweekly");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// 2. QUERY AMBIL DATA
$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>
        /* Tambahan CSS biar tabel rapi */
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: sans-serif;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        img {
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Data Mahasiswa</h2>
    
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Nama File Foto</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1; // Inisialisasi nomor urut
            
            // 3. LOOPING DI DALAM TBODY HTML
            while ($row = mysqli_query($koneksi, $query) ? mysqli_fetch_assoc($result) : []) : 
            ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['id']; ?></td> 
                <td><?= $row['nim']; ?></td>
                <td><?= $row['nama']; ?></td> 
                <td><?= $row['jurusan']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['no_hp']; ?></td>
                <td><?= $row['foto']; ?></td>
                <td>
                    <?php if (!empty($row['foto'])) : ?>
                        <img src="aset/images/<?= $row['foto']; ?>" width="70" height="80" alt="Foto Mahasiswa" />
                    <?php else : ?>
                        <img src="aset/images/OIP.jpg" width="70" height="80" alt="Default" />
                    <?php endif; ?>
                </td>
            </tr>
            <?php 
            $i++; 
            endwhile; 
            ?>
        </tbody>
    </table>
    
</body>
</html>