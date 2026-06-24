<?php
// --- 1. KONFIGURASI DATABASE ---
$host    = 'localhost';
$db      = 'ifmkrweekly';
$user    = 'root';
$pass    = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // --- 2. KONEKSI KE DATABASE ---
    $pdo = new PDO($dsn, $user, $pass, $options);
    
    // --- 3. AMBIL DATA (Asumsi nama tabelnya: mahasiswa) ---
    $stmt = $pdo->query("SELECT id, nama, nim, jurusan, email, no_hp, foto FROM mahasiswa");
    $semua_mahasiswa = $stmt->fetchAll();

} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 10px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        img {
            border-radius: 4px;
            object-fit: cover;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Daftar Mahasiswa</h2>

    <!-- --- 4. TAMPILKAN KE TABEL HTML --- -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>No. HP</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($semua_mahasiswa)): ?>
                <?php foreach ($semua_mahasiswa as $mhs): ?>
                    <tr>
                        <td><?= htmlspecialchars($mhs['id']) ?></td>
                        <td class="center">
                            <?php if (!empty($mhs['foto'])): ?>
                                <!-- Asumsi file foto disimpan di dalam folder bernama 'uploads' -->
                                <img src="uploads/<?= htmlspecialchars($mhs['foto']) ?>" alt="Foto <?= htmlspecialchars($mhs['nama']) ?>" width="50" height="60">
                            <?php else: ?>
                                <!-- Gambar default jika mahasiswa tidak punya foto -->
                                <img src="uploads/default.jpg" alt="No Photo" width="50" height="60">
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($mhs['nim']) ?></td>
                        <td><?= htmlspecialchars($mhs['nama']) ?></td>
                        <td><?= htmlspecialchars($mhs['jurusan']) ?></td>
                        <td><?= htmlspecialchars($mhs['email']) ?></td>
                        <td><?= htmlspecialchars($mhs['no_hp']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="center">Tidak ada data mahasiswa ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>