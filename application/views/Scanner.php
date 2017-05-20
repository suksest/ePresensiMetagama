<?php $this->load->view('Header'); ?>
<div class="container col-md-12">
    <div class="row">
        <p style="font-weight: bold; color: blue; ;font-size: 3em; text-align: center;">#ComeTo<span style="color: orange;">POLBAN</span></p>
        <p id="cur_server_clock" style="font-size: 3em; text-align: center;"></p>
    </div>
    <div class="row">
        <div class="scanner col-md-6" style="border-right: dashed 5px;">
            <div class="row">
                <img src="<?php echo base_url("assets/img/barcode-scanner-flat.png"); ?>" alt="" class="col-md-offset-4 img-thumbnail" style="max-width:200px;">
                <p style="text-align:center; font-size: 3em;">Silahkan pindai barcode</p>
                <div class="login-form">
                    <form class="form-inline" method="post">
                        <div class="form-group col-md-offset-4">
                            <input name="nim" type="text" maxlength="9" class="form-control" autofocus="on" style="text-align:center;"/>
                            <span class="help-block"></span>
                            <button type="submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-search"></i></a>
                        </div>
                    </form>
                    <span class="help-block"></span>
                    <?php if(strcmp($status,"none")==0): ?>
                        <div class="alert alert-info" role="alert" style="text-align:center;">
                            Silahkan pindai barcode terlebih dahulu.
                        </div>
                    <?php elseif(strcmp($status,"false")==0): ?>
                        <div class="alert alert-danger" role="alert" style="text-align:center;">
                            <strong>Gagal! </strong>Barcode tidak ditemukan.
                        </div>
                    <?php elseif(strcmp($status,"true")==0): ?>
                        <div class="alert alert-success" role="alert" style="text-align:center;">
                            <strong>Berhasil! </strong>Data kehadiran berhasil disimpan.
                        </div>
                    <?php endif; ?>
                </div> <!--end of login form-->
            </div>
        </div> <!--end of scanner-->
        <?php
          foreach ($query as $row) {
            $nim = $row->nim;
            $nama = $row->nama;
            $waktuDatang = $row->waktuDatang;
            $jenisKelamin = $row->jenisKelamin;
          }
        ?>
        <div class="detailpresensi col-md-6" style="font-size: 2em;">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6" style="text-align:center;">
                    <?php if (strcmp($status,"true")==0 && strcmp($jenisKelamin,"L")==0): ?>
                        <img src="<?php echo base_url("assets/img/ikhwan.png"); ?>" alt="" width="200" height="200" class="img-thumbnail">
                    <?php elseif (strcmp($status,"true")==0 && strcmp($jenisKelamin,"P")==0): ?>
                        <img src="<?php echo base_url("assets/img/akhwat.png"); ?>" alt="" width="200" height="200" class="img-thumbnail">
                    <?php else: ?>
                        <img src="<?php echo base_url("assets/img/thumb.png"); ?>" alt="" width="200" height="200" class="img-thumbnail">
                    <?php endif; ?>
                    <?php if (strcmp($status,"none")==0): ?>
                        <p class="text-info"><?php echo "Silahkan pindai barcode terlebih dahulu"; ?></p>
                    <?php elseif (strcmp($status,"false")==0): ?>
                        <p class="text-danger"><?php echo "Barcode tidak terdaftar"; ?></p>
                    <?php elseif (strcmp($status,"true")==0): ?>
                        <p><?php echo $nim; ?></p>
                        <p><?php echo $nama; ?></p>
                        <p><?php echo $waktuDatang; ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div> <!--end of detailscan-->
    </div> <!--end of row-->
</div> <!--end of container-->
<?php $this->load->view('Footer'); ?>
