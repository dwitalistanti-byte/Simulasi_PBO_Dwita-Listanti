<?php
// File: PendaftaranReguler.php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    protected $pilihanProdi;
    protected $lokasiKampus;

    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaDasar, $pilihanProdi, $lokasiKampus) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaDasar);
        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    // Metode Query Spesifik dengan SELECT * dan WHERE jalur_pendaftaran = 'Reguler'
    public static function getDaftarReguler($db) {
        $sql = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $stmt = $db->query($sql);
        
        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = new self(
                $row['id_pendaftaran'], 
                $row['nama_calon'], 
                $row['asal_sekolah'], 
                $row['nilai_ujian'], 
                $row['biaya_pendaftaran_dasar'], 
                $row['pilihan_prodi'], 
                $row['lokasi_kampus']
            );
        }
        return $data;
    }

    // Placeholder untuk Tahap 5
    public function hitungTotalBiaya() { return 0; }
    public function tampilkanInfoJalur() { return ""; }
}
?>