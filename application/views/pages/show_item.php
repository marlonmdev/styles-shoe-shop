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
          <li class="active"><a href="<?php echo base_url('products'); ?>">Products</a></li>
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
		<div class="col-md-12">
			<div class="col-md-2"></div>
			<!-- Item Image div -->
			<div class="col-md-4 col-sm-4">
			  	<button onclick="GoBack()" class="btn btn-default">Go Back</button>
			    <div class="thumbnail" id="shoes" style="margin-top: 30px;">
			      <img src="<?php echo base_url(); ?>images/<?= $items->picture; ?>" class="img-responsive" height="300" width="400">
			    </div>
			</div>

			 <!-- Item Info div -->
			<div class="col-md-4 col-sm-4" style="margin-top: 30px;background-color:#5F6F6B;border-radius:10px;">
			 	 <h2 style="color:#fff;"><?= $items->brand; ?> <?= $items->name; ?></h2>
			 	 <p class="text-justify" style="font-size:1.1em;font-weight:bold;color:#fff;">Category: <?= $items->cat; ?></p>

			 	 <p class="text-justify" style="font-size:1.1em;font-weight:bold;color:#fff;">Description:</p>
			 	 <p class="text-justify" style="font-size:1.1em;font-weight:normal;color:#fff;"><?= $items->descr; ?></p>
			 	 
			 	 <!-- Item Sizes --> 	 
				<div class="row">
					<div class="col-md-4">
						<p class="text-justify" style="font-size:1.1em;font-weight:bold;color:#fff;">Size: <?= $items->size; ?></p>
					</div>
				</div>
				<!-- Item Stocks -->
				<div class="row">
					<div class="col-md-4">
						<p class="text-justify" style="font-weight:bold;float:left;margin-right:10px;color:#fff;">Stocks: <?= $items->stock; ?></p>
					</div>
				</div>
				<!-- Item Sold -->
				<div class="row">
					<div class="col-md-4">		
			 			<p class="text-justify" style="font-weight:bold;float:left;margin-right:10px;color:#fff;">Sold: <?= $items->sold; ?></p>
					</div>
				</div>

				<form method="post" action="<?php echo base_url(); ?>item/addToCart/<?= $items->id; ?>">
				<!-- Add to cart section -->
					<div class="row">
						<div class="col-md-8">
							<p class="text-justify" style="font-weight:bold;float:left;margin-right:10px;color:#fff;">Select Quantity:</p>

							<div class="form-group">
								<select name="qty" class="form-control" id="qty">
									<?php 			

									for($i=1;$i<=$items->stock;$i++){
									?>						
				
									<option value="<?=$i;?>"><?=$i;?> item/s (Php <?= $items->price * $i ?>.00)</option>
									<?php 					
									}
									?>
								</select>
							</div>
						</div>
					</div>

					  	<div class="form-group">
							<input class="btn btn-success add_cart" type="submit" onclick="alert('Item Added to Cart');" value="Add to Cart">
					  	</div>
				</form>
			</div>	
		<div class="col-md-2"></div>
			    
	</div>
	<div class="row">
		<hr>
		<div class="col-md-8 col-md-offset-2">
			<h2 class="text-left"><?php echo $title ?></h2><br>
		</div>
	</div>	
	<!-- Similar Products -->		
	<div class="row">
		<div class="col-md-2">
		</div>
		<?php 
			foreach($similar as $similar){
			?>

	          <a href="<?php echo base_url(); ?>show/item/<?php echo $similar->id; ?>" style="text-decoration: none;">     
		            <div class="col-sm-4 col-md-2 col-xs-6">	
		              <div class="thumbnail" id="itemPic" style="height:275px;">
		              	<img src="<?php echo base_url(); ?>images/brands/<?= $similar->brand.'.png' ?>" id="logo" class="img-responsive pull-left" height="30" width="40" alt="brand logo">
		                <img src="<?php echo base_url(); ?>images/thumb/<?php echo $similar->picture; ?>" id="image" class="img-responsive" alt="shoes" style="margin-top: 15px;">
		                <div class="caption" style="margin-bottom: 20px;">
		                	<p class="text-left" style="font-size:1.1em;color:#246EAE;font-weight:bold;"><?php echo $similar->brand; ?> <?php echo $similar->name; ?></p>
		                	<p id="size" class="text-left" style="font-size:1.1em;color:#246EAE;font-weight:bold;">Size: <?php echo $similar->size; ?></p>
		                	<p id="price" class="text-left" style="font-size:1.1em;color:#EC2E13;font-weight:bold;">Php <?php echo $similar->price; ?>.00</p>
		                </div>
		                <div class="text-center">
		              	  <input type="hidden" name="id" value="<?php echo $similar->id; ?>">
		              	  <a href="<?php echo base_url(); ?>show/item/<?php echo $similar->id; ?>" id="viewlink"><div>View Details</div></a>
			  			</div>
		              </div>
		            </div>
	            </a>
	        <?php
	        			
				}	
			?>	
			<div class="col-md-2"></div>

	</div>
</div>
