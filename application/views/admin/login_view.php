<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/assets/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/assets/css/custom.css">
</head>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <br><br>
                <h2><? echo $title ?></h2>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Masukkan username dan password</strong>
                    </div>
                    <div class="panel-body">
<?php
    echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');


    if($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }

?>
                        <form role="form" action="<?php echo base_url('login') ?>" method="post">
                        <br>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" class="form-control" placeholder="Your Username" name="username" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="text" class="form-control" placeholder="Your Password" name="password" />
                        </div>
                        <div class="form-group">
                        
                        </div>
                        <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Login Now" >
                        <br />
                        Homepage? <a href="<?php echo base_url() ?>">Klik di sini</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/custom.js"></script>
</body>
</html>