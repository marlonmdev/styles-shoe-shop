<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link rel="shortcut icon" href="<?php echo base_url('images/logo/favicon.ico'); ?>" type="image/png"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>">
	<style type="text/css">
		body{
			background: #62E3C1;
		}
		input[type='email']:focus{
			background: #D8FAD7;
		}
		input[type='password']:focus{
			background: #D8FAD7;
		}
	</style>
	<script type="text/javascript">
		function preventBack(){window.history.forward();}
		setTimeout("preventBack()",0);
		window.onunload=function(){null};
	</script>
</head>
<body>
	<div class="container">
		<div class="row">

			<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">
				<div class="well" style="margin-top: 140px; border-radius:15px; background:#F5F8F7;">
				<center><a href="<?php echo base_url(); ?>" data-toggle="tooltip" title="Click to go back home"><img src="<?php echo base_url('images/logo/admin.png') ?>" class="img-responsive" width="100" height="100" style="margin-top: -80px;"></a></center>
				<?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissable" id="alerts">
                  <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
                <?php endif; ?>    
				<!-- Form Error -->
                 <?php 
			  		if(form_error('email') || form_error('pword')){
				  	?>
				  		<div class="alert alert-danger alert-dismissable" id="alerts">
		                  <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                  <strong><?php echo form_error('usrname'); ?></strong>
		                  <strong><?php echo form_error('pword'); ?></strong>
		                </div>
			  	<?php
			  	}
			  	?>

					<form method="POST" action="<?php echo base_url('login/parse'); ?>">
						<div class="form-group">
							<h3 class="text-center">Admin Login</h3><br>
							<label for='email'>Email:</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Here.." required>
						</div>
						<div class="form-group">
							<label for='pword'>Password:</label>
							<input type="password" class="form-control" name="pword" id="pword" placeholder="Enter Password Here.." required>
						</div>
						<input type="submit" class="form-control btn btn-primary" name="login" value="Login" data-toggle="tooltip" title="Click to Login">
					</form>
				</div>
			</div>

		</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

</body>
</html>