	<?php if($this->session->userdata('logged_in') == FALSE) {?>
	<h1 class="text-center text-danger" style="margin-top:250px;">Oops Important!!</h1><br>
	<?php echo '<h2 class="text-center text-danger">Your NOT allowed to be here, Please click'?><a href="<?php echo base_url('login'); ?>"> HERE</a> to login.</h2>
	<?php }else{ ?>

	<nav class="navbar navbar-default navbar-static-top" id="topNav"> <!-- Start of the navbar -->
	  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="<?= base_url('panel');?>" id="title"><span class="glyphicon glyphicon-dashboard"></span> Admin Panel</a>
		    </div>

		    <div class="collapse navbar-collapse" id="nav">
		      <ul class="nav navbar-nav">
		        <li><a href="<?php echo base_url('panel'); ?>">Products</a></li>
		        <li><a href="<?php echo base_url('orders'); ?>">Orders</a></li>
		        <li class="active"><a href="<?php echo base_url('sales'); ?>">Sales</a></li>
		        <li ><a href="<?php echo base_url('accounts'); ?>">Accounts</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		      	<li><a><span class="glyphicon glyphicon-flag"></span> Welcome: <?= $this->session->userdata('username') ?></a>
		       <li><a href="<?php echo base_url('admin/logout');?>" onclick="return confirm('Are you sure to logout?')"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		      </ul>
		    </div>
	  </div>
	</nav>	<!-- End of the navbar -->
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<a id="print" onclick="javascript:printlayer('datas')" class="btn btn-warning"><span class="glyphicon glyphicon-print"></span> Print Report</a>
			</div>
		</div>
	</div>
    <div class="container" id="datas">
		<div class="row" >
			<div class="col-md-10 col-md-offset-1">
				<!-- Error Alert -->
                <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissable" id="alerts">
                  <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
                <?php endif; ?>    

                <!-- Success Alert -->
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissable" id="alerts">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                    </div>
                <?php endif; ?>

                <!-- Form Error -->
                 <?php 
			  		if(form_error('email') || form_error('usrname') || form_error('pass1') || form_error('pass2')){
				  	?>
				  		<div class="alert alert-danger alert-dismissable" id="alerts">
		                  <a href="<?php echo base_url(); ?>accounts" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                  <strong><?php echo form_error('email'); ?></strong>
		                  <strong><?php echo form_error('usrname'); ?></strong>
		                  <strong><?php echo form_error('pass1'); ?></strong>
		                  <strong><?php echo form_error('pass2'); ?></strong>
		                </div>
			  	<?php
			  	}
			  	?>
				<center>
				<div class="table-responsive">
				    <table class="table table-hover table-responsive">
				    	<h3 class="text-center">Styles Sales Report</h3>
	                    <thead>
	                        <tr class="bg-primary">
	                        	<th class="text-center" style="margin-right:5%;">Sales ID</th>
	                        	<th class="text-center" style="margin-right:5%;">Sales Amount</th>
	                        	<th class="text-center" style="margin-right:5%;">Date</th>
	                        </tr>
	                    </thead>
	                    
	                    <tbody>
	                        <?php 
								foreach($content as $row){

							?>
							<tr class="bg-success">
								<td class="text-center"><?php echo $row->id; ?></td>
								<td class="text-center">Php <?php echo $row->amount;?>.00</td>
								<td class="text-center"><?php echo $row->date;?></td>						
							</tr>
							<?php			
									}

							?>					
	                    </tbody>
	                </table>
                </div>
            	</center>
			</div>
		</div>
	</div><!-- End of the content div -->

	<?php } ?>

	<div class="modal fade" id="addAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="exampleModalLabel">Add New Account</h4>
	      </div>
	      <div class="modal-body">
	         <form method="POST" action="<?php echo base_url('account/insert'); ?>"> <!-- Start of the form -->
                <div class="form-group">
                    <label for="email"> Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email name here.." required maxlength="25">
                </div>
                <div class="form-group">
                    <label for="username"> Username:</label>
                    <input type="text" class="form-control" id="usrname" name="usrname" placeholder="Enter username name here.." required maxlength="20">
                </div>
                <div class="form-group">
                    <label for="pass1"> Password:</label>
                    <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Enter password here.." minlength = "8" maxlength="15" required>
                </div>
                <div class="form-group">
                    <label for="pass2"> Confirm Password:</label>
                    <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirm password here.."  minlength = "8" maxlength="15" required>
                </div>
                <input type="submit" class="btn btn-success btn-md" name="submit" value="Save Account">	
                                    
                </form>  <!-- End of the form -->        
              
	      </div>
	    </div>
	  </div>
	</div> <!-- End of the add product modal -->


		</div>
	</div>
</div>

	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
