<?php $this->load->view('Header.php'); ?>
<body style="background-color: #ecf0f1;">
    <div class="container">
        <div class="row" style="margin-top:0.2%;">
            <div class="col-sm-4">
                <div class="login-form" style="padding: 1em;">
                    <form class="form-horizontal" action="<?php echo base_url("index.php/event/create")?>" method="post" role="form">
                        <h2 class="form-signin-heading">Tambah Kegiatan</h2>
                        <?php
                        echo "<div class='error_msg text-center alert-danger' style='margin: 10px 1em;'>";
                        if (isset($msg)) {
                            echo $msg;
                        }
                        echo validation_errors();
                        echo "</div>";
                        ?>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputNamaKegiatan">Nama Kegiatan</label>
                            <input name="namaKegiatan" type="text" id="inputNamaKegiatan" class="form-control col-md-5" placeholder="Nama Kegiatan" required autofocus value="">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputNickKegiatan">Nick Kegiatan</label>
                            <input name="nickKegiatan" type="text" id="inputNickKegiatan" class="form-control" placeholder="Nick Kegiatan" required value="">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputTanggalKegiatan">Tanggal Kegiatan</label>
                            <input name="tanggalKegiatan" type="text" id="inputTanggalKegiatan" class="form-control" placeholder="Tanggal Kegiatan" value="">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputWaktuMulai">Waktu Mulai Kegiatan</label>
                            <input name="waktuMulai" type="text" id="inputWaktuMulai" class="form-control" placeholder="Waktu Mulai Kegiatan" value="">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputWaktuSelesai">Waktu Selesai Kegiatan</label>
                            <input name="waktuSelesai" type="text" id="inputWaktuSelesai" class="form-control" placeholder="Waktu Selesai Kegiatan" value="">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em; align-items: center;">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
                            <a href="<? echo base_url("index.php/event")?>"><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Batal</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
</body>
<?php $this->load->view('Footer.php'); ?>
