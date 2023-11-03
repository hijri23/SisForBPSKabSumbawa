<?php
include '../koneksi.php';
$id = $_GET['id'];

// hapus file lama
$lama = mysqli_query($koneksi, "select * from perjadin where sppd_id='$id'");
$l = mysqli_fetch_assoc($lama);
$nama_file_lama = $l['sppd_file'];
unlink("../perjadin/" . $nama_file_lama);

mysqli_query($koneksi, "delete from perjadin where sppd_id='$id'");
header("location:perjadin.php");
