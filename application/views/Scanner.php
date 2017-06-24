<?php $this->load->view('Header'); ?>
<body style="background-color: #ecf0f1;">
    <div class="container col-md-12">
        <div class="row">
            <p id="cur_server_clock" style="font-size: 4em; text-align: center;"></p>
        </div>
        <div class="row">
            <div class="scanner col-md-6" style="border-right: dashed 5px;">
                <div class="row">
                    <img src="<?php echo base_url("assets/img/barcode-scanner-flat.png"); ?>" alt="" class="col-md-offset-4 img-thumbnail" style="max-width:200px;">
                    <p style="text-align:center; font-size: 3em;">Silahkan pindai barcode</p>
                    <div class="scan-form">
                        <form class="form-inline" method="post">
                            <div class="form-group col-md-offset-4">
                                <input name="nim" type="text" maxlength="9" class="form-control" autofocus="on" style="text-align:center;"/>
                                <span class="help-block"></span>
                                <button type="submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-search"></i></a>
                            </div>
                        </form>
                        <span class="help-block"></span>
                        <?php if(isset($status)): ?>
                            <?php if($status == "false"): ?>
                                <div class="alert alert-danger" role="alert" style="text-align:center;">
                                    <strong>Gagal! </strong>Barcode tidak ditemukan.
                                </div>
                            <?php elseif($status == "already"): ?>
                                <div class="alert alert-warning" role="alert" style="text-align:center;">
                                    <strong>Terimakasih :) </strong>Kehadiran sudah dicatat.
                                </div>
                            <?php elseif($status == "true"): ?>
                                <div class="alert alert-success" role="alert" style="text-align:center;">
                                    <strong>Berhasil! </strong>Data kehadiran berhasil disimpan.
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="alert alert-info" role="alert" style="text-align:center;">
                                Silahkan pindai barcode terlebih dahulu.
                            </div>
                        <?php endif; ?>

                    </div> <!--end of login form-->
                </div>
            </div> <!--end of scanner-->
            <?php if(isset($query)){
                foreach ($query as $row) {
                  $nim = $row->nim;
                  $nama = $row->nama;
                  $waktuDatang = $row->waktuDatang;
                  $jenisKelamin = $row->jenisKelamin;
                }
            } ?>
            <div class="detailpresensi col-md-6">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6" style="text-align:center; font-size: 1.75em; ">
                        <?php if (isset($status)): ?>
                            <?php if ($status == "true"): ?>
                                <?php if ($jenisKelamin="L"): ?>
                                    <img src="<?php echo base_url("assets/img/ikhwan.png"); ?>" alt="" width="200" height="200" class="img-thumbnail">
                                <?php elseif($jenisKelamin="P"): ?>
                                    <img src="<?php echo base_url("assets/img/akhwat.png"); ?>" alt="" width="200" height="200" class="img-thumbnail">
                                <?php endif; ?>
                                <p style="font-size: 1.5em;"><?php echo $nim; ?></p>
                                <p><?php echo $nama; ?></p>
                                <p><?php echo $waktuDatang; ?></p>
                            <?php elseif($status == "false"): ?>
                                <img src="<?php echo base_url("assets/img/thumb.png"); ?>" alt="" width="200" height="200" class="img-thumbnail">
                                <p class="text-danger"><?php echo "Barcode tidak terdaftar"; ?></p>
                            <?php elseif($status == "already"): ?>
                                <?php if ($jenisKelamin="L"): ?>
                                    <img src="<?php echo base_url("assets/img/ikhwan.png"); ?>" alt="" width="200" height="200" class="img-thumbnail">
                                <?php elseif($jenisKelamin="P"): ?>
                                    <img src="<?php echo base_url("assets/img/akhwat.png"); ?>" alt="" width="200" height="200" class="img-thumbnail">
                                <?php endif; ?>
                                <p><?php echo $nim; ?></p>
                                <p><?php echo $nama; ?></p>
                                <p><?php echo $waktuDatang; ?></p>
                                <p class="text-warning""><?php echo "Kehadiran sudah dicatat"; ?></p>
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="<?php echo base_url("assets/img/thumb.png"); ?>" alt="" width="200" height="200" class="img-thumbnail">
                            <p class="text-info"><?php echo "Silahkan pindai barcode terlebih dahulu"; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </div> <!--end of detailscan-->
        </div> <!--end of row-->
    </div> <!--end of container-->
</body>
<?php $this->load->view('Footer'); ?>
