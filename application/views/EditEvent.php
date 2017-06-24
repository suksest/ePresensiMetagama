<?php $this->load->view('Header.php'); ?>
<body style="background-color: #ecf0f1;">
    <div class="container">
        <div class="row" style="margin-top:0.2%;">
            <div class="col-sm-4">
                <?php foreach ($qEvent as $rowEvent) {
                    $idKegiatan = $rowEvent->idKegiatan;
                    $namaKegiatan = $rowEvent->namaKegiatan;
                    $nickKegiatan = $rowEvent->nickKegiatan;
                    $tanggalKegiatan = $rowEvent->tanggalKegiatan;
                    $waktuMulai = $rowEvent->waktuMulai;
                    $waktuSelesai = $rowEvent->waktuSelesai;
                } ?>
                <div class="event-form" style="padding: 1em;">
                    <form class="form-horizontal" action="<?php echo base_url()?>index.php/event/edit/<?=$idKegiatan?>" method="post" role="form">
                        <h2 class="form-event-heading">Ubah Kegiatan</h2>
                        <?php
                        echo "<div class='error_msg text-center alert-danger' style='margin: 10px 1em;'>";
                        if (isset($msg)) {
                            echo $msg;
                        }
                        echo validation_errors();
                        echo "</div>";
                        ?>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputIDKegiatan">ID Kegiatan</label>
                            <input name="namaKegiatan" type="text" id="inputIDKegiatan" class="form-control" placeholder="" required disabled value="<?=$idKegiatan?>">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputNamaKegiatan">Nama Kegiatan</label>
                            <input name="namaKegiatan" type="text" id="inputNamaKegiatan" class="form-control" placeholder="" required autofocus value="<?=$namaKegiatan?>">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputNickKegiatan">Nick Kegiatan</label>
                            <input name="nickKegiatan" type="text" id="inputNickKegiatan" class="form-control" placeholder="" required value="<?=$nickKegiatan?>">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputTanggalKegiatan">Tanggal Kegiatan</label>
                            <input name="tanggalKegiatan" type="text" id="inputTanggalKegiatan" class="form-control" placeholder="" value="<?=$tanggalKegiatan?>">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputWaktuMulai">Waktu Mulai Kegiatan</label>
                            <input name="waktuMulai" type="text" id="inputWaktuMulai" class="form-control" placeholder="" value="<?=$waktuMulai?>">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputWaktuSelesai">Waktu Selesai Kegiatan</label>
                            <input name="waktuSelesai" type="text" id="inputWaktuSelesai" class="form-control" placeholder="" value="<?=$waktuSelesai?>">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em;">
                            <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-pencil"></span> Ubah Kegiatan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
</body>
<?php $this->load->view('Footer.php'); ?>
