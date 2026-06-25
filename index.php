<?php
// Memuat semua file yang dibutuhkan
require_once 'koneksi/database.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 1. Inisialisasi koneksi database
$database = new Database();
$db = $database->getConnection();

// 2. Memanfaatkan metode query spesifik dari Tahap 4 untuk mengambil data berdasarkan jalur
$dataReguler = PendaftaranReguler::getDaftarReguler($db);
$dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi PMB Jalur Spesifik</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 30px; 
            background-color: #f8f9fa; 
            color: #333;
        }
        h1 { 
            text-align: center; 
            color: #2c3e50;
            margin-bottom: 30px;
        }
        h2 { 
            background-color: #2c3e50; 
            color: white; 
            padding: 12px; 
            margin-top: 40px; 
            border-radius: 5px; 
            font-size: 1.2rem;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 15px;
            background-color: white; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.05); 
            border-radius: 5px;
            overflow: hidden;
        }
        th, td { 
            border: 1px solid #e2e8f0; 
            padding: 12px 15px; 
            text-align: left; 
        }
        th { 
            background-color: #f1f5f9; 
            color: #475569;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f8fafc;
        }
        .biaya-dasar {
            color: #64748b;
        }
        .total-biaya { 
            font-weight: bold; 
            color: #16a34a; 
        }
        .badge-info {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.9rem;
            display: inline-block;
        }
    </style>
</head>
<body>

    <h1>Sistem Manajemen Pendaftaran Mahasiswa Baru (PMB)</h1>

    <h2>Kategori: Jalur Reguler</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Info Spesifik Jalur (Polimorfik)</th>
                <th>Total Biaya Akhir (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($dataReguler) > 0): ?>
                <?php foreach ($dataReguler as $row): 
                    // Instansiasi objek PendaftaranReguler secara dinamis
                    $obj = new PendaftaranReguler(
                        $row['id_pendaftaran'], 
                        $row['nama_calon'], 
                        $row['asal_sekolah'], 
                        $row['nilai_ujian'], 
                        $row['biaya_pendaftaran_dasar'], 
                        $row['pilihan_prodi'], 
                        $row['lokasi_kampus']
                    );
                ?>
                <tr>
                    <td><?= $obj->getId(); ?></td>
                    <td><strong><?= $obj->getNama(); ?></strong></td>
                    <td><?= $obj->getAsalSekolah(); ?></td>
                    <td><?= $obj->getNilaiUjian(); ?></td>
                    <td class="biaya-dasar">Rp <?= number_format($obj->getBiayaDasar(), 0, ',', '.'); ?></td>
                    <td><span class="badge-info"><?= $obj->tampilkanInfoJalur(); ?></span></td>
                    <td class="total-biaya">Rp <?= number_format($obj->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7" style="text-align:center;">Tidak ada data calon mahasiswa jalur reguler.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>


    <h2>Kategori: Jalur Prestasi</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Info Spesifik Jalur (Polimorfik)</th>
                <th>Total Biaya Akhir (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($dataPrestasi) > 0): ?>
                <?php foreach ($dataPrestasi as $row): 
                    // Instansiasi objek PendaftaranPrestasi secara dinamis
                    $obj = new PendaftaranPrestasi(
                        $row['id_pendaftaran'], 
                        $row['nama_calon'], 
                        $row['asal_sekolah'], 
                        $row['nilai_ujian'], 
                        $row['biaya_pendaftaran_dasar'], 
                        $row['jenis_prestasi'], 
                        $row['tingkat_prestasi']
                    );
                ?>
                <tr>
                    <td><?= $obj->getId(); ?></td>
                    <td><strong><?= $obj->getNama(); ?></strong></td>
                    <td><?= $obj->getAsalSekolah(); ?></td>
                    <td><?= $obj->getNilaiUjian(); ?></td>
                    <td class="biaya-dasar">Rp <?= number_format($obj->getBiayaDasar(), 0, ',', '.'); ?></td>
                    <td><span class="badge-info"><?= $obj->tampilkanInfoJalur(); ?></span></td>
                    <td class="total-biaya">Rp <?= number_format($obj->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7" style="text-align:center;">Tidak ada data calon mahasiswa jalur prestasi.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>


    <h2>Kategori: Jalur Kedinasan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Info Spesifik Jalur (Polimorfik)</th>
                <th>Total Biaya Akhir (Polimorfik)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($dataKedinasan) > 0): ?>
                <?php foreach ($dataKedinasan as $row): 
                    // Instansiasi objek PendaftaranKedinasan secara dinamis
                    $obj = new PendaftaranKedinasan(
                        $row['id_pendaftaran'], 
                        $row['nama_calon'], 
                        $row['asal_sekolah'], 
                        $row['nilai_ujian'], 
                        $row['biaya_pendaftaran_dasar'], 
                        $row['sk_ikatan_dinas'], 
                        $row['instansi_sponsor']
                    );
                ?>
                <tr>
                    <td><?= $obj->getId(); ?></td>
                    <td><strong><?= $obj->getNama(); ?></strong></td>
                    <td><?= $obj->getAsalSekolah(); ?></td>
                    <td><?= $obj->getNilaiUjian(); ?></td>
                    <td class="biaya-dasar">Rp <?= number_format($obj->getBiayaDasar(), 0, ',', '.'); ?></td>
                    <td><span class="badge-info"><?= $obj->tampilkanInfoJalur(); ?></span></td>
                    <td class="total-biaya">Rp <?= number_format($obj->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7" style="text-align:center;">Tidak ada data calon mahasiswa jalur kedinasan.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>