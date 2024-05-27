<?php
// File: display_data.php
include 'db_connect.php';

// Koneksi ke database
$conn = connect_db();

// Query untuk mengambil data
$query = "
    SELECT 
        k.jenis AS jenis_kain, 
        k.nama AS nama_kain, 
        q.nomor AS kualitas,
        q.nama AS nama_kualitas, 
        hk.harga 
    FROM harga_kain hk
    JOIN kain k ON hk.kain_id = k.id
    JOIN  kualitas q ON hk.kualitas_id = q.id
    ORDER BY
        k.jenis, k.nama, q.nomor
";

$result = pg_query($conn, $query);

if (!$result) {
    echo "An error occurred.\n";
    exit;
}

// Mengumpulkan data untuk rowspan
$data = [];
while ($row = pg_fetch_assoc($result)) {
    $data[$row['jenis_kain']][$row['nama_kain']][] = $row;
}

// Tampilkan data
echo "<table border='1'>
        <tr>
            <th>Jenis Kain</th>
            <th>Nama Kain</th>
            <th>Kualitas</th>
            <th>Nama Kualitas</th>
            <th>Harga</th>
        </tr>";

foreach ($data as $jenis_kain => $nama_kains) {
    $jenis_rowspan = 0;
    foreach ($nama_kains as $rows) {
        $jenis_rowspan += count($rows);
    }

    $first_jenis = true;

    foreach ($nama_kains as $nama_kain => $rows) {
        $nama_rowspan = count($rows);
        $nama_pertama = true;

        foreach ($rows as $row) {
            echo "<tr>";

            if ($first_jenis) {
                echo "<td rowspan='{$jenis_rowspan}'>{$jenis_kain}</td>";
                $first_jenis = false;
            }

            if ($first_nama) {
                echo "<td rowspan='{$nama_rowspan}'>{$nama_kain}</td>";
                $first_nama = false;
            }

            echo "<td>{$row['kualitas']}</td>";
            echo "<td>{$row['nama_kualitas']}</td>";
            echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
            echo "</tr>";
        }
    }
}

echo "</table>";

pg_close($conn);
