<?php
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Singapore');

$waktu = date('Y-m-d H:i:s');
$petugas = $_SESSION['id'];
// $nomor  = $_POST['nomor'];
$kegiatan = $_POST['kegiatan'];
$tanggal_berangkat = $_POST['tanggal_berangkat'];
// $myvalue = '2023-11-11 22:00:00';
// $datetime = new DateTime($myvalue);
// $time = $datetime->format('Y-m-d H:i:s');
$tanggal_pulang = $_POST['tanggal_pulang'] . ' 22:00:00';
$nama  = $_POST['nama'];

// $myvalue = '22:00:00';
// $time = date('H:i:s', strtotime($myvalue));
// $waktu_pulang = $tanggal_pulang. $time;
// var_dump($tanggal_pulang);

$rand = rand();

$filename = $_FILES['file']['name'];
$jenis = pathinfo($filename, PATHINFO_EXTENSION);

$kategori = $_POST['kategori'];
$keterangan = $_POST['keterangan'];

if ($jenis == "php") {
	header("location:perjadin.php?alert=gagal");
} else {
	move_uploaded_file($_FILES['file']['tmp_name'], '../perjadin/' . $rand . '_' . $filename);
	$nama_file = $rand . '_' . $filename;
	mysqli_query($koneksi, "insert into perjadin values (NULL,'$waktu','$kegiatan','$tanggal_berangkat','$tanggal_pulang','$petugas','$keterangan','$nama_file')") or die(mysqli_error($koneksi));
	header("location:perjadin.php?alert=sukses");
}
