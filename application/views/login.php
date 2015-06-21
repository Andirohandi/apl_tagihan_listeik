<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
   

    <!-- The styles -->
    <!--link href="<?php echo base_url() ?>asset/theme/css/bootstrap-cerulean.min.css" rel="stylesheet"--!-->
    <link href="<?php echo base_url() ?>asset/theme/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>asset/theme/css/charisma-app.css" rel="stylesheet">
    <link href='<?php echo base_url() ?>asset/theme/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='<?php echo base_url() ?>asset/theme/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='<?php echo base_url() ?>asset/theme/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='<?php echo base_url() ?>asset/theme/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='<?php echo base_url() ?>asset/theme/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='<?php echo base_url() ?>asset/theme/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='<?php echo base_url() ?>asset/theme/css/jquery.noty.css' rel='stylesheet'>
    <link href='<?php echo base_url() ?>asset/theme/css/noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo base_url() ?>asset/theme/css/elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo base_url() ?>asset/theme/css/elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo base_url() ?>asset/theme/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo base_url() ?>asset/theme/css/uploadify.css' rel='stylesheet'>
    <link href='<?php echo base_url() ?>asset/theme/css/animate.min.css' rel='stylesheet'>
    <link href='<?php echo base_url() ?>asset/theme/css/mystyle.css' rel='stylesheet'>
	<!--Alertify-->	
    <link href="<?php echo base_url(); ?>asset/alertify/css/alertify.core.css" rel="stylesheet" >
    <link href="<?php echo base_url(); ?>asset/alertify/css/alertify.default.css" rel="stylesheet" >

	<link rel="stylesheet" href="<?php echo base_url() ?>asset/theme/css/datepicker.css">
	
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>asset/theme/bower_components/jquery/jquery.min.js"></script>
		
	<!--Alertify-->	
	<script src='<?php echo base_url(); ?>asset/alertify/js/alertify.min.js'></script>
	
    <link rel="shortcut icon" href="<?php echo base_url() ?>asset/theme/img/logo.png">

	
	</head>
<style>
#cent{
	width:400px;
}
</style>
<body>
	<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Sistem Informasi Absensi & Penggajian</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-3 center login-box">
            <div class="alert alert-info">
                Silahkan masukkan username dan password untuk login
            </div>
			
            <form class="form-horizontal" action="index.html" method="post">
                <fieldset>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>

                    <br/>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <a href="<?php echo site_url('admin'); ?>"><button type="button" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div>
	

	<script type="text/javascript" src="<?php echo base_url() ?>asset/theme/js/bootstrap-datepicker.js"></script> 
	<script src="<?php echo base_url() ?>asset/theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<script src="<?php echo base_url() ?>asset/theme/js/jquery.cookie.js"></script>
	
	<script src="<?php echo base_url() ?>asset/theme/js/jquey_validate.js"></script>

	<script src='<?php echo base_url() ?>asset/theme/bower_components/moment/min/moment.min.js'></script>
	<script src='<?php echo base_url() ?>asset/theme/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>

	<script src='<?php echo base_url() ?>asset/theme/js/jquery.dataTables.min.js'></script>

	<script src="<?php echo base_url() ?>asset/theme/bower_components/chosen/chosen.jquery.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="<?php echo base_url() ?>asset/theme/bower_components/colorbox/jquery.colorbox-min.js"></script>
	<!-- notification plugin -->
	<script src="<?php echo base_url() ?>asset/theme/js/jquery.noty.js"></script>
	<!-- library for making tables responsive -->
	<script src="<?php echo base_url() ?>asset/theme/bower_components/responsive-tables/responsive-tables.js"></script>
	<!-- tour plugin -->
	<script src="<?php echo base_url() ?>asset/theme/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
	<!-- star rating plugin -->
	<script src="<?php echo base_url() ?>asset/theme/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?php echo base_url() ?>asset/theme/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?php echo base_url() ?>asset/theme/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="<?php echo base_url() ?>asset/theme/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="<?php echo base_url() ?>asset/theme/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="<?php echo base_url() ?>asset/theme/js/charisma.js"></script>

</body>
</html>