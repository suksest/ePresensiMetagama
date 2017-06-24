<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/navbar.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-datetimepicker.min.css"); ?>" />
    <script type="text/javascript" src="<?php echo base_url("assets/js/time.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/moment.js"); ?>"></script>
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?echo base_url(); ?>">
            <img src="<?php echo base_url("assets/img/metag-revised-big.png"); ?>" alt="logo-metagama" style="max-width:100px; margin-top: -15px; max-height: 50px;">
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if($this->uri->segment(1)=="Home"){ echo "class='active'"; }?>><a href="<?echo base_url(); ?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <?php if ($this->session->userdata('username')): ?>
                <li <?php if($this->uri->segment(1)=="Scanner"){ echo "class='active'"; }?>> <a href="<?echo base_url("index.php/Scanner"); ?>"><i class="glyphicon glyphicon-barcode"></i> Scan</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Atur <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="disabled"><a href="#"><span class="glyphicon glyphicon-user"></span> Mentee</a></li>
                        <li class="disabled"><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Kehadiran</a></li>
                        <li><a href="<?php echo base_url("index.php/event");?>"><span class="glyphicon glyphicon-calendar"></span> Kegiatan</a></li>
                        <li class="disabled"><a href="#"><span class="glyphicon glyphicon-book"></span> Penilaian</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li <?php if($this->uri->segment(1)=="site"){ echo "class='active'"; }?>><a href="<?echo base_url("index.php/site"); ?>"><i class="glyphicon glyphicon-lock"></i> Masuk</a></li>
            <?php endif; ?>
          </ul>
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="#"><i class="glyphicon glyphicon-time"></i> <span id="server_clock"></span></a>
            </li>
            <?php if ($this->session->userdata('username')): ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('name'); ?><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url("index.php/site/logout")?>"><i class="glyphicon glyphicon-log-out"></i> Log out</a></li>
                  </ul>
                </li>
            <?php else: ?>
                <li>
                  <a href="#"><i class="glyphicon glyphicon-user"></i></span>Tamu</a>
                </li>
            <?php endif; ?>
          </ul>
        </div> <!-- /.nav-collapse -->
      </div>
    </nav>
