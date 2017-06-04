<?php $this->load->view('Header.php'); ?>
<body style="background-color: #ecf0f1;">
    <div class="container">
        <div class="row" style="margin-top:5%;">
            <div class="col-sm-offset-4 col-sm-4">
                <div class="login-form" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background-color: #1e90ff; color: #ecf0f1; padding: 1em; align-items: center;">
                    <form class="form-horizontal" action="<?php echo base_url("index.php/Site/login")?>" method="post" role="form">
                        <h2 class="form-signin-heading text-center">Silahkan Masuk</h2>
                        <div class="row">
                            <img class="img-responsive center-block" src="<?php echo base_url("assets/img/metag-revised-big.png"); ?>" alt="Logo Metagama POLBAN" style="max-width: 200px; max-height: 200px;">
                        </div>
                        <?php
                        echo "<div class='error_msg text-center alert-danger' style='margin: 10px 1em;'>";
                        if (isset($msg)) {
                            echo $msg;
                        }
                        echo validation_errors();
                        echo "</div>";
                        ?>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputUsername" class="sr-only">Username</label>
                            <input name="username" type="username" id="inputEmail" class="form-control col-md-5" placeholder="Username" required autofocus value="">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em;">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required value="">
                            <!-- <p class="help-block">Help text here.</p> -->
                        </div>
                        <div class="form-group" style="margin: 10px 1em;">
                            <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
</body>
<?php $this->load->view('Footer.php'); ?>
