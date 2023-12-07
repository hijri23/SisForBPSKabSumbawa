<?php
include '../koneksi.php'; // Pastikan lokasi file koneksi.php benar
date_default_timezone_set('Asia/Singapore');
session_start();

$pegawaiId = isset($_POST['petugas']) ? $_POST['petugas'] : ''; // Gunakan isset untuk mengecek variabel

// Inisialisasi array events
$events = array();

if ($pegawaiId != '') { // Pastikan $pegawaiId tidak kosong
    // Query untuk mengambil data Perjadin berdasarkan pegawai yang dipilih
    // Gunakan prepared statements untuk mencegah SQL injection
    $stmt = $koneksi->prepare("SELECT * FROM perjadin WHERE sppd_petugas = ?");
    $stmt->bind_param("s", $pegawaiId); // 's' berarti tipe data string
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        // Sesuaikan key array dengan field tabel perjadin Anda
        $events[] = array(
            'title' => $row['sppd_kegiatan'],
            'start' => $row['sppd_tanggal_berangkat'],
            'end' => $row['sppd_tanggal_pulang']
            // Pastikan format tanggal sesuai dengan yang diharapkan oleh FullCalendar
        );
    }

    $stmt->close();
}

echo json_encode($events); // Encode array events menjadi JSON
?>