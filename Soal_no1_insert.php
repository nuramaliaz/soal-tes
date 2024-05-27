<?php
include 'db_connect.php';

// Koneksi ke database
$conn = connect_db();

if (!$conn) {
    die("Error: Unable to connect to the database.\n");
}

// Masukkan data ke tabel kain
$kain_data = [
    ['jenis' => 'STB', 'nama' => 'Sutra'],
    ['jenis' => 'NTB', 'nama' => 'Katon']
];

foreach ($kain_data as $kain) {
    $query = "INSERT INTO kain (jenis, nama) VALUES ('{$kain['jenis']}', '{$kain['nama']}')";
    pg_query($conn, $query);
}

// Masukkan data ke tabel kualitas
$kualitas_data = [
    ['nama' => 'Sangat Bagus'],
    ['nama' => 'Bagus'],
    ['nama' => 'Cukup Bagus']
];

foreach ($kualitas_data as $kualitas) {
    $query = "INSERT INTO kualitas (nama) VALUES ('{$kualitas['nama']}')";
    pg_query($conn, $query);
}

// Ambil ID dari tabel kain
$result = pg_query($conn, "SELECT id FROM kain WHERE nama = 'STB'");
$kain_id = pg_fetch_result($result, 0, 'id');

// Masukkan data ke tabel harga_kain
$harga_kain_data = [
    ['kain_id' => $kain_id, 'kualitas_id' => 1, 'harga' => 10000000],
    ['kain_id' => $kain_id, 'kualitas_id' => 2, 'harga' => 9000000],
    ['kain_id' => $kain_id, 'kualitas_id' => 3, 'harga' => 8000000]
];

foreach ($harga_kain_data as $harga_kain) {
    $query = "INSERT INTO harga_kain (kain_id, kualitas_id, harga) VALUES ({$harga_kain['kain_id']}, {$harga_kain['kualitas_id']}, {$harga_kain['harga']})";
    pg_query($conn, $query);
}

$result = pg_query($conn, "SELECT id FROM kain WHERE nama = 'NTB'");
$kain_id = pg_fetch_result($result, 0, 'id');

// Masukkan data ke tabel harga_kain
$harga_kain_data = [
    ['kain_id' => $kain_id, 'kualitas_id' => 1, 'harga' => 10000000],
    ['kain_id' => $kain_id, 'kualitas_id' => 2, 'harga' => 10000000],
    ['kain_id' => $kain_id, 'kualitas_id' => 3, 'harga' => 10000000]
];

foreach ($harga_kain_data as $harga_kain) {
    $query = "INSERT INTO harga_kain (kain_id, kualitas_id, harga) VALUES ({$harga_kain['kain_id']}, {$harga_kain['kualitas_id']}, {$harga_kain['harga']})";
    pg_query($conn, $query);
}

echo "Data inserted successfully.";
pg_close($conn);
?>