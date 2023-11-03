<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Edit Surat Perjadin</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Perjadin</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">


    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Edit Surat Perjadin</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">
                        <a href="perjadin.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>


                    <?php
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "select * from perjadin where sppd_id='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>

                        <form method="post" action="perjadin_update.php" enctype="multipart/form-data">

                            <!-- <div class="form-group">
                                <label>Nomor Surat</label>
                                <input type="hidden" name="id" value="<?php echo $d['sppd_id']; ?>">
                                <input type="text" class="form-control" name="nomor" required="required" value="<?php echo $d['sppd_nomor']; ?>">
                            </div> -->

                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="hidden" name="id" value="<?php echo $d['sppd_id']; ?>">
                                <input type="text" class="form-control" name="kegiatan" required="required" value="<?php echo $d['sppd_kegiatan']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Berangkat</label>
                                <input type="date" class="form-control" name="tanggal_berangkat" required="required" value="<?php echo $d['sppd_tanggal_berangkat']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Pulang</label>
                                <input type="date" class="form-control" name="tanggal_pulang" required="required" value="<?php echo $d['sppd_tanggal_pulang']; ?>">
                            </div>

                            <!-- <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori" required="required">
                                    <option value="">Pilih kategori</option>
                                    <?php
                                    $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                                    while ($k = mysqli_fetch_array($kategori)) {
                                    ?>
                                        <option <?php if ($k['kategori_id'] == $d['arsip_kategori']) {
                                                    echo "selected='selected'";
                                                } ?> value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori_nama']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div> -->

                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" required="required"><?php echo $d['sppd_keterangan']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="file">
                                <small>Kosongkan jika tidak ingin mengubah file</small>
                            </div>

                            <div class="form-group">
                                <label></label>
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </div>

                        </form>

                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>