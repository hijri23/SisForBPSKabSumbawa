<?php
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Singapore');

$tampil = mysqli_query($koneksi, "SELECT * FROM perjadin order by sppd_id");

$dataArr = array();
while ($data = mysqli_fetch_array($tampil)) {

    $dataArr[] = array(
        'id' => $data['sppd_id'],
        'title' => $data['sppd_kegiatan'],
        'start' => $data['sppd_tanggal_berangkat'],
        'end' => $data['sppd_tanggal_pulang']
    );
}



echo json_encode($dataArr);
