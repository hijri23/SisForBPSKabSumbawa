<?php
include '../koneksi.php';
//session_start();
date_default_timezone_set('Asia/Singapore');

if (isset($_POST['id'])) {

    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $id = $_POST['id'];
    //$petugas = $_SESSION['id'];
    //$waktu = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "UPDATE perjadin set sppd_kegiatan = '$title', sppd_tanggal_berangkat = '$start', sppd_tanggal_pulang = '$end' WHERE sppd_id = '$id' ");
}
