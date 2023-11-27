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

        <div class="col-lg-2">
            <div class="form-group">
                <label>Filter Pegawai</label>
                <select class="form-control" id="ambil_pegawai" name="petugas" required="required">
                    <option value="">Pilih pegawai</option>
                    <?php
                    $petugas = mysqli_query($koneksi, "SELECT * FROM petugas order by petugas_nama");
                    while ($k = mysqli_fetch_array($petugas)) {
                    ?>
                        <option <?php if (isset($_GET['petugas'])) {
                                    if ($_GET['petugas'] == $k['petugas_id']) {
                                        echo "selected='selected'";
                                    }
                                } ?> value="<?php echo $k['petugas_id']; ?>"><?php echo $k['petugas_nama']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="col-lg-2">
            <h1></h1>
            <br>
            <input type="submit" class="btn btn-primary" value="Tampilkan" id="tampilkan">
        </div>

        <div class="pull-right">
            <a href="perjadin.php" class="btn btn-primary"><i class="fa fa-book"></i> Lihat Data Perjadin</a>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="container">

            <div id="calendar">

            </div>

        </div>


        <script>
            // $('#ambil_pegawai').on('change', function() {
            //     const selectedPackage = $('#ambil_pegawai').val();
            //     console.log(selectedPackage);
            //     var hasil = document.getElementById("tampilkan");
            //     hasil.innerHTML = "nama pegawai";

            // });

            $('#tampilkan').on('change', function() {
                const selectedPackage = $('#tampilkan').val();
                console.log(selectedPackage);
                // var hasil = document.getElementById("tampilkan");
                // hasil.innerHTML = "nama pegawai";

            });

            // $(document).readdy(function() {
            //     $("#ambil_pegawai").on("keyup", function() {
            //         var value = $(this).val().tolowerCase();
            //     });
            // });

            // $('#ambil_pegawai').on('click', 'tr', function() {
            //     var data = $("#ambil_pegawai").DataTable().row(this).data();

            //     

            // $('.modal-body').load(dataURL, function() {
            //     $('#edit-row-modal').modal();
            // });
            // // const selectedPackage = $('#ambil_pegawai').val();
            // // console.log(selectedPackage);

            // });


            $(function() {

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev, next today',
                        center: 'title',
                        right: 'month,agendaDay'
                    },
                    editable: true,
                    //eventLimit: true, // allow "more" link when too many events
                    navLinks: true,
                    backgroundColor: '#1f2e86',
                    eventTextColor: '#1f2e86',
                    textColor: '#378006',
                    selectable: true,
                    selecthelper: true,
                    allDay: true,
                    displayEventTime: false,
                    //forceEventDuration: true,
                    //allDayDefault: true, 
                    //nextDayThreshold: '23.59:00',
                    events: 'tampil.php',
                    select: function(start, end) {
                        //tampilkan pesan input
                        var title = prompt("Masukan Judul Kegiatan");
                        if (title) {
                            //tampung tggl yg dipilih dalam variabel start dan end
                            var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD");
                            var end = $.fullCalendar.formatDate(end.subtract(1, 'days'), "YYYY-MM-DD 23.59.00");
                            //end = end.clone().subtract(1, 'day');
                            //end = end.subtract(1, 'days');
                            //newVar = end + " -24:00:00";

                            //perintah ajax untuk melempar data ke database
                            $.ajax({
                                url: "simpan.php",
                                type: "POST",
                                async: false,
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                },
                                success: function(data) {
                                    $('#calendar').fullCalendar('refetchEvents');
                                    //alert("Sukses Menyimpan Data Perjadin");
                                },
                            });
                            // $(":input").val('');
                            // return false;
                        }
                    },

                    //event ketika judul kegiatan diseret
                    eventDrop: function(event) {
                        var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD 23:59:00");
                        var title = event.title;
                        var id = event.id;
                        //perintah ajax untuk melempar data ke database
                        $.ajax({
                            url: "ubah_perjadin.php",
                            type: "POST",
                            async: false,
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                id: id
                            },
                            success: function(data) {
                                $('#calendar').fullCalendar('refetchEvents');
                                //alert("Sukses Mengubah Data Perjadin");
                            },
                        });
                    },

                    //even ketika judul kegiatan diklik
                    eventClick: function(event) {
                        if (confirm("Apakah anda yakin akan menghapus kegiatan ini?")) {
                            var id = event.id;
                            //perintah ajax
                            $.ajax({
                                url: "hapus_perjadin.php",
                                type: "POST",
                                async: false,
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    $('#calendar').fullCalendar('refetchEvents');
                                    //alert("Sukses Menghapus Data Perjadin");
                                },
                            });
                        }
                    }

                });
            });
        </script>

    </div>



</div>
</div>


<?php include 'footer.php'; ?>