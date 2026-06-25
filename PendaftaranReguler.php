<?php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // [Tahap 4] Properti tambahan spesifik
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $prodi = null, $kampus = null) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->pilihanProdi = $prodi;
        $this->lokasiKampus = $kampus;
    }

    // [Tahap 4] Metode Query Spesifik Jalur Reguler
    public static function getDaftarReguler($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // [Tahap 5] Overriding hitungTotalBiaya: Tarif standar murni
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Prodi: " . $this->pilihanProdi . " | Kampus: " . $this->lokasiKampus;
    }
}
?>