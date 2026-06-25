<?php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // [Tahap 4] Properti tambahan spesifik
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $sk = null, $sponsor = null) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->skIkatanDinas = $sk;
        $this->instansiSponsor = $sponsor;
    }

    // [Tahap 4] Metode Query Spesifik Jalur Kedinasan
    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // [Tahap 5] Overriding hitungTotalBiaya: Surcharge/Biaya Tambahan 25%
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    public function tampilkanInfoJalur() {
        return "Instansi: " . $this->instansiSponsor . " | SK: " . $this->skIkatanDinas;
    }
}
?>