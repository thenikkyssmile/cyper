<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('admin/dashboard') ?>">C Y P E R</a> 
    </div>

    <div style="color: white;
                padding: 15px 50px 5px 50px;
                float: right;
                font-size: 16px;"> 
        <?php echo date('d M Y') ?> &nbsp;

        <a href="<?php echo base_url('admin/dashboard/profile') ?>" class="btn btn-success square-btn-adjust"><i class="fa fa-user"></i> Login User</a> 

        <a href="<?php echo base_url() ?>" class="btn btn-primary square-btn-adjust" target="_blank"><i class="fa fa-home"></i> Homepage</a> 

        <a href="<?php echo base_url('login/logout') ?>" class="btn btn-danger square-btn-adjust"><i class="fa fa-sign-out"></i> Keluar</a> 
    </div>
</nav>   
<!-- /. NAV TOP  -->