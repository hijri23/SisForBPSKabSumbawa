<?php
include '../koneksi.php';
//session_start();
date_default_timezone_set('Asia/Singapore');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // $title = $_POST['title'];
    // $start = $_POST['start'];
    // $end = $_POST['end'];
    //$petugas = $_SESSION['id'];
    //$waktu = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "DELETE FROM perjadin WHERE sppd_id = '$id' ");
}
