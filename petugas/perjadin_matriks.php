<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Matriks Perjadin</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Data Perjadin / Matriks Perjadin</span></li>
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

        <!-- <div class="panel-heading">
            <h3 class="panel-title">Data Perjadin Saya</h3>
        </div>
        <div class="panel-body"> -->


        <div class="pull-right">
            <a href="perjadin.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
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

        <br>
        <div class="container">
            <div id="calendar">

            </div>
        </div>

        <script>
            $(document).ready(function() {
                var calendar = $('#calendar').fullCalendar({
                    editable: true,


                });
            });
        </script>

    </div>

</div>
</div>


<?php include 'footer.php'; ?>