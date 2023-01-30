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

		<ul class="nav nav-tabs">
		  <li><a href="<?php echo base_url('Nike'); ?>">Nike</a></li>
		  <li><a href="<?php echo base_url('Rebook'); ?>">Rebook</a></li>
		  <li><a href="<?php echo base_url('Adidas'); ?>">Adidas</a></li>
		  <li class="active"><a href="<?php echo base_url('UnderArmour'); ?>">Under Armour</a></li>
		  <li><a href="<?php echo base_url('Puma'); ?>">Puma</a></li>
		  <li><a href="<?php echo base_url('Jordan'); ?>">Jordan</a></li>
		  <li><a href="<?php echo base_url('Lining'); ?>">Lining</a></li>
		  <li><a href="<?php echo base_url('DC'); ?>">DC</a></li>
		  <li><a href="<?php echo base_url('Converse'); ?>">Converse</a></li>
		</ul>


		<br>

		<div class="row">
	        <div class="btn-group pull-right" style="margin-right:15px;">
	            <button type="button" class="btn btn-default"><strong><?php echo $num; ?> </strong>items</button>
	            <div class="btn-group">
	                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
	                    Sort Products &nbsp;
					<span class="caret"></span>
	                </button>
	                <ul class="dropdown-menu">
	                    <li><a href="<?php echo base_url('UnderArmour/price_low'); ?>">By Price Low</a></li>
	                    <li class="divider"></li>
	                    <li><a href="<?php echo base_url('UnderArmour/price_high'); ?>">By Price High</a></li>
	                </ul>
	            </div>
	        </div>
	    </div>
	
	
		<br>
		<div class="row">
		  <?php 
			foreach($items as $item){
			?>

	          <a href="<?php echo base_url(); ?>show/item/<?php echo $item->id; ?>" style="text-decoration: none;">     
		            <div class="col-sm-4 col-md-2 col-xs-6">
		              <div class="thumbnail" id="itemPic" style="height:275px;">
		              	<img src="<?php echo base_url(); ?>images/brands/UnderArmour.png" id="logo" class="img-responsive pull-left" height="30" width="40" alt="under_armour logo">
		                <img src="<?php echo base_url(); ?>images/thumb/<?php echo $item->picture; ?>" id="image" class="img-responsive" alt="shoes" style="margin-top: 15px;">
		                <div class="caption" style="margin-bottom: 20px;">
		                	<p class="text-left" style="font-size:1.1em;color:#246EAE;font-weight:bold;"><?php echo $item->brand; ?> <?php echo $item->name; ?></p>
		                	<p id="size" class="text-left" style="font-size:1.1em;color:#246EAE;font-weight:bold;">Size: <?php echo $item->size; ?></p>
		                	<p id="price" class="text-left" style="font-size:1.1em;color:#EC2E13;font-weight:bold;">Php <?php echo $item->price; ?>.00</p>
		                </div>
		                <div class="text-center">
		              	  <input type="hidden" name="id" value="<?php echo $item->id; ?>">
		              	  <a href="<?php echo base_url(); ?>show/item/<?php echo $item->id; ?>" id="viewlink"><div style="bottom: 20px;">View Details</div></a>
			  			</div>
		              </div>
		            </div>
	            </a>
	        <?php
	        			
				}	
			?>			
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4 text-center">
				<ul class="pagination">
	            <?php echo $pagination; ?>
	            </ul>
            </div>
        </div>		


</div>
