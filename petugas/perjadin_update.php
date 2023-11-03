<?php
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

// $waktu = date('Y-m-d H:i:s'); 
// $petugas = $_SESSION['id'];
$id  = $_POST['id'];
//$nama  = $_POST['nama'];
$waktu = date('Y-m-d H:i:s');
//$nomor  = $_POST['nomor'];
$kegiatan = $_POST['kegiatan'];
$tanggal_berangkat = $_POST['tanggal_berangkat'];
$tanggal_pulang = $_POST['tanggal_pulang'];



$rand = rand();

$filename = $_FILES['file']['name'];


$keterangan = $_POST['keterangan'];

if ($filename == "") {

	mysqli_query($koneksi, "update perjadin set sppd_kegiatan='$kegiatan', sppd_tanggal_berangkat='$tanggal_berangkat', sppd_tanggal_pulang='$tanggal_pulang', sppd_keterangan='$keterangan' where sppd_id='$id'") or die(mysqli_error($koneksi));
	header("location:perjadin.php");
} else {

	$jenis = pathinfo($filename, PATHINFO_EXTENSION);

	if ($jenis == "php") {
		header("location:perjadin.php?alert=gagal");
	} else {

		// hapus file lama
		$lama = mysqli_query($koneksi, "select * from perjadin where sppd_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_lama = $l['sppd_file'];
		unlink("../perjadin/" . $nama_file_lama);

		// upload file baru
		move_uploaded_file($_FILES['file']['tmp_name'], '../perjadin/' . $rand . '_' . $filename);
		$nama_file = $rand . '_' . $filename;
		mysqli_query($koneksi, "update perjadin set sppd_kegiatan='$kegiatan', sppd_tanggal_berangkat='$tanggal_berangkat', sppd_tanggal_pulang='$tanggal_pulang', sppd_keterangan='$keterangan', sppd_file='$nama_file' where sppd_id='$id'") or die(mysqli_error($koneksi));
		header("location:perjadin.php?alert=sukses");
	}
}
