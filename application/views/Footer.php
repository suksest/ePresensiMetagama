<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.2.1.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap-datetimepicker.min.js"); ?>"></script>
<script type="text/javascript">
        $(document).ready(function(){
                set_server_clock(new Date(<?php echo time() * 1000; ?>));
        });
</script>
<script type="text/javascript">
    $(function () {
        $('#inputTanggalKegiatan').datetimepicker({
            locale: 'id',
            format: 'YYYY-MM-DD'
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#inputWaktuMulai').datetimepicker({
            locale: 'id',
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#inputWaktuSelesai').datetimepicker({
            locale: 'id',
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });
</script>
</html>
