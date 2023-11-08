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

        <br>
        <div class="container">

            <div id="calendar">

            </div>

        </div>


        <!-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    timeZone: 'UTC',
                    initialView: 'dayGridMonth',
                    events: 'tampil.php',
                    editable: true,
                    selectable: true
                });

                calendar.render();
            });
        </script> -->



        <script>
            $(function() {

                // var todayDate = moment().startOf('day');
                // var YM = todayDate.format('YYYY-MM');
                // var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
                // var TODAY = todayDate.format('YYYY-MM-DD');
                // var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

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
                    events: 'tampil.php',
                    select: function(start, end, allDay) {
                        //tampilkan pesan input
                        var title = prompt("Masukan Judul Kegiatan");
                        if (title) {
                            //tampung tggl yg dipilih dalam variabel start dan end
                            var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD");
                            var end = $.fullCalendar.formatDate(end, "YYYY-MM-DD");
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
                            $(":input").val('');
                            return false;
                        }
                    },

                    //event ketika judul kegiatan diseret
                    eventDrop: function(event) {
                        var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD");
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