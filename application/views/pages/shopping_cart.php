<nav class="navbar navbar-inverse navbar-fixed-top" id="topNav"> <!-- Start of the navbar -->
    <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" id="title" data-toggle="tooltip" title="Click to go back home..">Styles Shoe Shop</a>
        </div>
        
        <div class="collapse navbar-collapse" id="nav">
          <ul class="nav navbar-nav" id="navigation">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="<?php echo base_url('products'); ?>">Products</a></li>
          <li><a href="<?php echo base_url('about'); ?>">About Us</a></li>
          <li><a href="<?php echo base_url('privacy_policy'); ?>">Privacy Policy</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right" id="navright">

             <?php if(!$this->session->userdata('signed_in') == TRUE){ ?>
              <li><a href="#signinModal" data-toggle="modal" data-target="#signinModal"><span class="glyphicon glyphicon-user"></span> Sign In</a></li>
              <li><a href="<?php echo base_url('view_cart'); ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge" style="background:#D6B829;"><?= $rows = count($this->cart->contents()); ?></span></a></li>
              <li><a href="<?php echo base_url('login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Admin</a></li>
              <?php }else{
              ?>
              <li> <?php if(empty($this->session->userdata('picture'))) {?>
                <img src="<?php echo base_url(); ?>/images/customers/thumbs/default.png" class="img-responsive img-circle pull-left" width="40" height="40" style="margin-top:5px;">
                <?php }else{?>
                <img src="<?php echo base_url(); ?>/images/customers/thumbs/<?= $this->session->userdata('picture')?>" class="img-responsive img-circle pull-left" width="40" height="40" style="margin-top:5px;">
                <?php } ?>
                <a href="<?php echo base_url(); ?>account" class="pull-right"><?= $this->session->userdata('fname')?> <?= $this->session->userdata('lname')?></a></li>
              <li><a href="<?php echo base_url('log_out'); ?>" onclick="return confirm('Are you sure to logout <?=$this->session->userdata('fname')?> <?= $this->session->userdata('lname')?>?')"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
               <li><a href="<?php echo base_url('view_cart'); ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge" style="background:#D6B829;"><?= $rows = count($this->cart->contents()); ?></span></a></li>
               <li><a href="<?php echo base_url('login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Admin</a></li>
             <?php } ?>
          </ul>
        </div>
    </div>
  </nav>  <!-- End of the navbar -->


<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">

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


			<h3 class="text-center"><span class="glyphicon glyphicon-shopping-cart"></span> Your Shopping Cart</h3>
			<div class="row">
				<div class="col-md-8 pull-left">
	                <a href="<?php echo base_url('clear_cart'); ?>" onclick="return confirm('Are you sure you want to clear your cart?');" class="btn btn-warning" id="btnAdd"><span class="glyphicon glyphicon-erase"></span> Clear Cart</a>
	            </div>
            </div>
            <br>
			<center>
			    <table class="table table-hover table-condensed table-responsive">
                    <thead>
                        <tr style="background-color:#FE3E43;color:#fff;">
                        	<th width="12%" class="text-center">Product Image</th>
                        	<th width="15%" class="text-center">Name</th>
                        	<th width="5%" class="text-center">Size</th>
                        	<th width="5%" class="text-center">Quantity</th>
                        	<th width="12%" class="text-center">Price</th>
                        	<th width="12%" class="text-center">Sub Total</th>
                        	<th width="15%" class="text-center">Option</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                    	<!-- <form method="post" action="<?php echo base_url('order'); ?>"> -->
	               		    <?php 
							foreach($this->cart->contents() as $row){
							?>
							<tr style="background-color:#fff;">
								
								<td class="text-center"><img src="<?php echo base_url();?>/images/thumb/<?= $row['pic']; ?>" height="60px" width="80px"></td>
								<td class="text-center"><?php echo $row['name'];?></td>
								<td class="text-center"><?php echo $row['size'];?></td>
								<td class="text-center"><?php echo $row['qty'];?></td>
								<td class="text-center">Php <?php echo $row['price'];?>.00</td>
								<td class="text-center">Php <?php echo $row['subtotal'];?>.00</td>
								<td class="text-center" class="text-center">
									<a href="<?php echo base_url();?>item/remove/<?= $row['rowid'];?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Remove" onclick="return confirm('Are you sure to remove product?')"><span class="glyphicon glyphicon-trash"></span></a>
								</td>							
							</tr>
							<?php			
									}
							?>	
							<tr style="background-color:#FE3E43;color:#fff;">
								<td class="text-right" style="font-weight:bold;" colspan="6">Total Amount: </td>
								<input type="hidden" name="total" value="<?php $this->cart->total() ?>">
								<td class="text-left" colspan="2"><span style="font-weight:bold;">Php <?= $this->cart->total()?>.00</span></td>
							</tr>				
						<!-- </form> -->

                    </tbody>
                </table>


            </center>
		</div>

	</div>
	<br>
	<div class="row">
		<div class="col-md-6 col-md-6 col-xs-6"></div>
		<div class="col-md-6 col-md-6 col-xs-6">
			<?php if($this->session->userdata('signed_in') == TRUE){ ?>
			<a href="<?php echo base_url('Nike'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-menu-left"></span><span class="glyphicon glyphicon-menu-left"></span> Continue Shopping</a>&nbsp;
			<a href="<?php echo base_url();?>order/<?= $this->session->userdata('id')?>" class="btn btn-success" onclick="return confirm('Are you sure to proceed to checkout?')">Proceed to Checkout <span class="glyphicon glyphicon-menu-right"></span><span class="glyphicon glyphicon-menu-right"></span></a>	
			<?php }else{ ?>	
			<a href="<?php echo base_url('Nike'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-menu-left"></span><span class="glyphicon glyphicon-menu-left"></span> Continue Shopping</a>&nbsp;
			<a href="#signinModal" data-toggle="modal" data-target="#signinModal" class="btn btn-success">Proceed to Checkout <span class="glyphicon glyphicon-menu-right"></span><span class="glyphicon glyphicon-menu-right"></span></a>
			<?php } ?>
		</div>
		
	</div>
</div>

