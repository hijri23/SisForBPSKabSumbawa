<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Upload SPPD</h4>
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
                    <h3 class="panel-title">Upload SPPD</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">
                        <a href="perjadin.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>

                    <form method="post" action="perjadin_aksi.php" enctype="multipart/form-data">

                        <!-- <div class="form-group">
                            <label>Nomor Surat</label>
                            <input type="text" class="form-control" name="nomor" required="required">
                        </div> -->

                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input type="text" class="form-control" name="kegiatan" required="required">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Berangkat</label>
                            <input type="date" class="form-control" name="tanggal_berangkat" required="required">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Pulang</label>
                            <input type="date" class="form-control" name="tanggal_pulang" required="required">
                        </div>

                        <!-- <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori" required="required">
                                <option value="">Pilih kategori</option>
                                <?php
                                $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while ($k = mysqli_fetch_array($kategori)) {
                                ?>
                                    <option value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori_nama']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div> -->

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan"></textarea>
                        </div>

                        <!-- <div class="form-group">
                            <label>File</label>
                            <input type="file" name="file">
                        </div> -->

                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Upload">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>