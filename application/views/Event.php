<?php $this->load->view('Header'); ?>
<body style="background-color: #ecf0f1;">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <b>Daftar Kegiatan</b>
        </div>
        <div class="panel-body">
          <a href="<?=base_url()?>index.php/event/create" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Tanggal Kegiatan</th>
                  <th>Waktu Mulai</th>
                  <th>Waktu Selesai</th>
                </tr>
              </thead>
              <tbody>
                <? if (empty($qEvent)) {?>
                  <tr>
                    <td colspan="5">Data tidak ditemukan</td>
                  </tr>
                <? }else{
                  $no = 0;
                  foreach ($qEvent as $rowEvent) { $no++; ?>
                    <tr>
                      <td><?=$no?></td>
                      <td><?=$rowEvent->namaKegiatan?></td>
                      <td><?=$rowEvent->tanggalKegiatan?></td>
                      <td><?=$rowEvent->waktuMulai?></td>
                      <td><?=$rowEvent->waktuSelesai?></td>
                      <td>
                        <a href="<?=base_url()?>index.php/event/detail/<?=$rowEvent->idKegiatan?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-list"></i></a>
                        <a href="<?=base_url()?>index.php/event/edit/<?=$rowEvent->idKegiatan?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="<?=base_url()?>index.php/event/delete/<?=$rowEvent->idKegiatan?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                      </td>
                    </tr>
                  <?}}?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</body>
<?php $this->load->view('Footer'); ?>
