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
    <script type="text/javascript" src="<?php echo base_url("assets/js/time.js"); ?>"></script>
    <!-- <script>
        // var detail = new XMLHttpRequest();
        // detail.onreadystatechange = function(){
        //     if (detail.readyState === 4) {
        //         document.getElementsByClassName('detailpresensi').innerHTML = detail.responseText;
        //     }
        // };
        // detail.open('GET', '')
    </script> -->
    <title>tes</title>
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
            <li><a href="#">Home</a></li>
            <li class="active"><a href="<?echo base_url(); ?>">Scan</a></li>
          </ul>
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="#"><i class="glyphicon glyphicon-time"></i> <span id="server_clock"></span></a>
            </li>
          </ul>
        </div> <!-- /.nav-collapse -->
      </div>
    </nav>
