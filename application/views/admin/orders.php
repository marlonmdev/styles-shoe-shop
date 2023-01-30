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
		        <li class="active"><a href="<?php echo base_url('orders'); ?>">Orders</a></li>
		        <li><a href="<?php echo base_url('sales'); ?>">Sales</a></li>
		        <li><a href="<?php echo base_url('accounts'); ?>">Accounts</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		      	<li><a><span class="glyphicon glyphicon-flag"></span> Welcome: <?= $this->session->userdata('username') ?></a>
		        <li><a href="<?php echo base_url('admin/logout');?>" onclick="return confirm('Are you sure to logout?')"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		      </ul>
		    </div>
	  </div>
	</nav>	<!-- End of the navbar -->

	<div class="container"> <!-- Start of the container -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">Customer Orders</h3><br>
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
                    				
				<div class="clearer"></div>

				<div class="table-responsive" id="datas">
					<center>
					    <table class="table table-hover table-success table-responsive">
		                    <thead>
		                        <tr class="bg-primary">
		                        	<th class="text-center" width="10%">Customer ID</th>
		                        	<th class="text-center" width="10%">Order Ref</th>
		                        	<th class="text-center" width="15%">Customer Name</th>
		                        	<th class="text-center" width="10%">Email</th>
		                        	<th class="text-center" width="10%">Total Amount</th>
		                        	<th class="text-center" width="15%">Ordered At</th>
		                        	<th class="text-center" width="15%">Status</th>
		                        	<th class="text-center" width="10%">Actions</th>
		                        </tr>
		                    </thead>
		                    
		                    <tbody>
		                        <?php foreach($content as $row){ ?>
								<tr class="bg-success">
									<td class="text-center"><?php echo $row->cust_id;?></td>
									<td class="text-center"><span style="text-transform:uppercase;"><?php echo $row->order_ref;?></span></td>
									<td class="text-center"><?php echo $row->name;?></td>
									<td class="text-center"><?php echo $row->email;?></td>
									<td class="text-center">Php <?php echo $row->total;?>.00</td>
									<td class="text-center"><?php echo $row->ordered_at;?></td>
										<form action="<?= base_url();?>/status/update" method="post">
										<input type="hidden" name="id" value="<?= $row->id;?>">
										<input type="hidden" name="amount" value="<?= $row->total;?>">
										<td>
										<?php if($row->status =='order in process'){?>
											<select name="status" class="form-control" required>			
												<option value="<?=$row->status;?>"><?=$row->status;?></option>
												<option value="shipped">shipped</option>
											</select>
										<?php }elseif($row->status =='shipped') {?>
											<select name="status" class="form-control" required>			
												<option value="<?=$row->status;?>"><?=$row->status;?></option>
												<option value="received">received</option>
											</select>	
										<?php }else{
											 echo $row->status;
										}?>
										</td>
										
										<td>
											<?php if ($row->status == 'received') {?>
											<button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Change Status" disabled><span class="glyphicon glyphicon-pencil"></span></button> &nbsp;
											<?php }else{ ?>
											<button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Change Status"><span class="glyphicon glyphicon-pencil"></span></button> &nbsp;
											<?php } ?>
										
										</form>	
											<form action="<?php echo base_url();?>order/view_details/<?= $row->cust_id; ?>" method="post">
												<input type="hidden" name="order_ref" value="<?= $row->order_ref;?>">
												<button type="submit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="View Order Details" style="margin-left:45px;margin-top:-58px;"><span class="glyphicon glyphicon-zoom-in"></span></button>
											</form>
										</td>
															
								</tr>
								<?php			
										}
								?>					
		                    </tbody>
		                </table>

		                <ul class="pagination">
		                <?php echo $pagination; ?>
		                </ul>

	            	</center>
                </div>
			</div>
		</div>
	</div><!-- End of the content div -->

	<?php } ?>


	
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>