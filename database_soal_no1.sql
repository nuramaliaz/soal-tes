-- Gunakan database yang telah dibuat
\c kain_db;

-- Hapus tabel yang ada
DROP TABLE IF EXISTS jenis_kain;
DROP TABLE IF EXISTS nama_kain;

-- Buat tabel baru yang menggabungkan jenis_kain dan nama_kain
CREATE TABLE kain (
    id SERIAL PRIMARY KEY,
    jenis VARCHAR(50) NOT NULL,
    nama VARCHAR(50) NOT NULL
);

-- Tetap buat tabel kualitas
CREATE TABLE IF NOT EXISTS kualitas (
    id SERIAL PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    nomor INT
);

-- Tetap buat tabel harga_kain
CREATE TABLE IF NOT EXISTS harga_kain (
    id SERIAL PRIMARY KEY,
    kain_id INT REFERENCES kain(id),
    kualitas_id INT REFERENCES kualitas(id),
    harga INT NOT NULL
);