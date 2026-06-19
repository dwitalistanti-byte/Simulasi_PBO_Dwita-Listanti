<?php
// File: PendaftaranPrestasi.php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    protected $jenisPrestasi;
    protected $tingkatPrestasi;

    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaDasar, $jenisPrestasi, $tingkatPrestasi) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaDasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    // Metode Query Spesifik dengan SELECT * dan WHERE jalur_pendaftaran = 'Prestasi'
    public static function getDaftarPrestasi($db) {
        $sql = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $stmt = $db->query($sql);
        
        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = new self(
                $row['id_pendaftaran'], 
                $row['nama_calon'], 
                $row['asal_sekolah'], 
                $row['nilai_ujian'], 
                $row['biaya_pendaftaran_dasar'], 
                $row['jenis_prestasi'], 
                $row['tingkat_prestasi']
            );
        }
        return $data;
    }

    // Placeholder untuk Tahap 5
    public function hitungTotalBiaya() { return 0; }
    public function tampilkanInfoJalur() { return ""; }
}
?>