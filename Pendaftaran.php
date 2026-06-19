<?php
// File: Pendaftaran.php

abstract class Pendaftaran {
    // Properti Terenkapsulasi (protected) agar hanya bisa diakses oleh kelas ini dan kelas turunannya
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Constructor untuk inisialisasi awal saat objek dibuat
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar) {
        $this->id_pendaftaran = $id_pendaftaran;
        $this->nama_calon = $nama_calon;
        $this->asal_sekolah = $asal_sekolah;
        $this->nilai_ujian = $nilai_ujian;
        $this->biayaPendaftaranDasar = $biayaPendaftaranDasar;
    }

    // Metode Abstrak (Tanpa Body) yang WAJIB di-override oleh kelas turunannya (Tahap 5)
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();

    // Getter Umum (Opsional namun sangat disarankan agar data bisa dipanggil di View/Tahap 6)
    public function getIdPendaftaran() {
        return $this->id_pendaftaran;
    }

    public function getNamaCalon() {
        return $this->nama_calon;
    }

    public function getAsalSekolah() {
        return $this->asal_sekolah;
    }

    public function getNilaiUjian() {
        return $this->nilai_ujian;
    }

    public function getBiayaPendaftaranDasar() {
        return $this->biayaPendaftaranDasar;
    }
}
?>