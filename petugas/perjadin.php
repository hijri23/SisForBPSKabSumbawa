<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Perjadin</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Data Perjadin</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel">

        <div class="panel-heading">
            <h3 class="panel-title">Data Perjadin Saya</h3>
        </div>
        <div class="panel-body">


            <div class="pull-right">
                <a href="perjadin_tambah.php" class="btn btn-primary"><i class="fa fa-cloud"></i> Upload SPPD</a>
            </div>

            <div class="pull-right">
                <a>...</a>
            </div>

            <div class="pull-right">
                <a href="perjadin_matriks.php" class="btn btn-primary"><i class="fa fa-calendar"></i> Matriks Perjadin</a>
            </div>

            <br>
            <br>
            <br>

            <center>
                <?php
                if (isset($_GET['alert'])) {
                    if ($_GET['alert'] == "gagal") {
                ?>
                        <div class="alert alert-danger">File SPPD gagal diupload. krena demi keamanan file .php tidak diperbolehkan.</div>
                    <?php
                    } else {
                    ?>
                        <div class="alert alert-success">Surat SPPD berhasil tersimpan.</div>
                <?php
                    }
                }
                ?>
            </center>
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Waktu Upload SPPD</th>
                        <th>Surat Perjalanan Dinas</th>
                        <!-- <th>Kategori</th> -->
                        <th>Pegawai</th>
                        <th>Keterangan</th>
                        <th class="text-center" width="20%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $saya = $_SESSION['id'];
                    $perjadin = mysqli_query($koneksi, "SELECT * FROM perjadin,petugas WHERE sppd_petugas=petugas_id and sppd_petugas='$saya' ORDER BY sppd_id DESC");
                    while ($p = mysqli_fetch_array($perjadin)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('H:i:s  d-m-Y', strtotime($p['sppd_waktu_upload'])) ?></td>
                            <td>

                                <b>Nomor Surat</b> : <?php echo $p['sppd_nomor'] ?><br>
                                <b>Nama Kegiatan</b> : <?php echo $p['sppd_kegiatan'] ?><br>
                                <b>Tanggal Perjalanan</b> : <?php echo date('d-m-Y', strtotime($p['sppd_tanggal'])) ?><br>
                                <!-- <b>Jenis</b> : <?php echo $p['arsip_jenis'] ?><br> -->

                            </td>
                            <!-- <td><?php echo $p['kategori_nama'] ?></td> -->
                            <td><?php echo $p['petugas_nama'] ?></td>
                            <td><?php echo $p['sppd_keterangan'] ?></td>
                            <td class="text-center">



                                <div class="modal fade" id="exampleModal_<?php echo $p['sppd_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">PERINGATAN!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data ini? <br>file dan semua yang berhubungan akan dihapus secara permanen.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                                <a href="perjadin_hapus.php?id=<?php echo $p['sppd_id']; ?>" class="btn btn-primary"><i class="fa fa-check"></i> &nbsp; Ya, hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="btn-group">
                                    <a target="_blank" class="btn btn-default" href="../perjadin/<?php echo $p['sppd_file']; ?>"><i class="fa fa-download"></i></a>
                                    <a target="_blank" href="arsip_preview.php?id=<?php echo $p['sppd_id']; ?>" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>
                                    <a href="perjadin_edit.php?id=<?php echo $p['sppd_id']; ?>" class="btn btn-default"><i class="fa fa-wrench"></i></a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_<?php echo $p['sppd_id']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>


        </div>

    </div>
</div>


<?php include 'footer.php'; ?>