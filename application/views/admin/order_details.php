	<?php if($this->session->userdata('logged_in') == FALSE) {?>
	<h1 class="text-center text-danger" style="margin-top:250px;">Oops Important!!</h1><br>
	<?php echo '<h2 class="text-center text-danger">Your NOT allowed to be here, Please click'?><a href="<?php echo base_url('login'); ?>"> HERE</a> to login.</h2>
	<?php }else{ ?>


<div class="container">
	<br>
	<a href="<?php echo base_url('orders'); ?>" class="btn btn-info">Go Back</a>
	<div class="row">
		<div class="col-md-4">
			<center>
				<?php if(empty($customer->picture)) {?>
					<img src="<?php echo base_url();?>/images/customers/default.png" class="img-responsive img-circle" width="110px" height="110px" style="margin-bottom:-50px;">
				<?php }else{ ?>
					<img src="<?php echo base_url();?>/images/customers/<?= $customer->picture; ?>" class="img-responsive img-circle" width="110px" height="110px" style="margin-bottom:-50px;">
				<?php } ?>
			</center>
			<div class="jumbotron" style="background-color:#72A8D7; margin-top: 8px;">
				<h4>Customer Shipping Info</h4>
	        		<h4>Name: <?= $customer->fname ?> <?= $customer->lname ?></h4>
	        		<h4>Contact: <?= $details->s_cont ?></h4>
	    			<h4>Address: <?= $details->s_addr ?></h4>
					<h4>City: <?= $details->s_city ?></h4>
					<h4>Zip: <?= $details->s_zip ?></h4>
				<br>
	        	<h4>Customer Billing Info:</h4>
	        		<h4>Name: <?= $customer->fname;?> <?= $customer->lname; ?></h4>
	        		<h4>Contact: <?= $details->b_cont ?></h4>
	    			<h4>Address: <?= $details->b_addr ?></h4>
					<h4>City: <?= $details->b_city ?></h4>
					<h4>Zip: <?= $details->b_zip ?></h4>
			</div>
		</div>
		<div class="col-md-8">
			<br><br><br>
			<div class="table-responsive" id="datas" style="margin-top: -48px;">
					<?php if($order->status == 'order in process') {?>
						<div class="progress" style="height:35px;">
						  <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="30"
						  aria-valuemin="0" aria-valuemax="100" style="width:30%;line-height:35px;">
						    Order in Process (30% Completed)
						  </div>
						</div>
					<?php }elseif($order->status == 'shipped'){ ?>
						<div class="progress" style="height:35px;">
						  <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="75"
						  aria-valuemin="0" aria-valuemax="100" style="width:75%;line-height:35px;">
						    Shipped (75% Completed)
						  </div>
						</div>
					<?php }else{ ?>
						<div class="progress" style="height:35px;">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100"
						  aria-valuemin="0" aria-valuemax="100" style="width:100%;line-height:35px;">
						    Received (100% Completed)
						  </div>
						</div>
					<?php } ?>
					<h3 text-left>Order Ref. ID: <span style="text-transform: uppercase;"><?= $order->order_ref ?></span></h3>
					<center>
					    <table class="table table-hover table-responsive">
		                    <thead>
		                        <tr class="bg-primary">
		                        	<th class="text-center" width="10%">Item ID</th>
		                        	<th class="text-center" width="15%">Item Picture</th>
		                        	<th class="text-center" width="20%">Item Name</th>
		                        	<th class="text-center" width="10%">Item Size</th>
		                        	<th class="text-center" width="10%">Quantity</th>
		                        	<th class="text-center" width="12%">Price</th>
		                        	<th class="text-center" width="15%">Subtotal</th>
		                        </tr>
		                    </thead>
		                    
		                    <tbody>
		                        <?php 
								foreach($items as $row){

								?>
								<tr class="bg-success">
									<td class="text-center"><?php echo $row->item_id;?></td>
									<td class="text-center"><a href="<?php echo base_url();?>/images/<?= $row->item_pic; ?>" target="_blank" data-lightbox="shoes"><img src="<?php echo base_url();?>/images/thumb/<?= $row->item_pic; ?>" height="60px" width="80px" data-toggle="tooltip" title="click to view enlarge image"></a></td>
									<td class="text-center"><?php echo $row->item_name;?></td>
									<td class="text-center"><?php echo $row->item_size;?></td>
									<td class="text-center"><?php echo $row->item_qty;?></td>
									<td class="text-center">Php <?php echo $row->item_price;?>.00</td>
									<td class="text-center">Php <?php echo $row->item_subtotal;?>.00</td>	
								</tr>							
								<?php			
										}
								?>	
								<tr class="bg-success">
									<td class="text-right" style="font-weight:bold;color:#4F88AB;" colspan="6">Total Amount</td>
									<td class="text-center" style="font-weight:bold;color:#4F88AB;">Php <?= $order->total;?>.00</td>
								</tr>
		                    </tbody>
		                </table>
		            </center>
		        </div>

		</div>
	</div>
</div>

	<?php } ?>

	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/lightbox-plus-jquery.js'); ?>"></script>