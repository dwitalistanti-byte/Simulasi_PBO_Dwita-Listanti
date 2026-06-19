<?php
// File: PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    protected $skIkatanDinas;
    protected $instansiSponsor;

    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaDasar, $skIkatanDinas, $instansiSponsor) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaDasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    // Metode Query Spesifik dengan SELECT * dan WHERE jalur_pendaftaran = 'Kedinasan'
    public static function getDaftarKedinasan($db) {
        $sql = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->query($sql);
        
        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = new self(
                $row['id_pendaftaran'], 
                $row['nama_calon'], 
                $row['asal_sekolah'], 
                $row['nilai_ujian'], 
                $row['biaya_pendaftaran_dasar'], 
                $row['sk_ikatan_dinas'], 
                $row['instansi_sponsor']
            );
        }
        return $data;
    }

    // Placeholder untuk Tahap 5
    public function hitungTotalBiaya() { return 0; }
    public function tampilkanInfoJalur() { return ""; }
}
?>