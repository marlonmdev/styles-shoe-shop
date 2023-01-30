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
      <div class="col-lg-12">

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
            if(form_error('s_cont') || form_error('s_addr') || form_error('s_city') || form_error('s_zip') || form_error('b_cont') || form_error('b_addr') || form_error('b_city') || form_error('b_zip')){
            ?>
              <div class="alert alert-danger alert-dismissable" id="alerts">
                      <a href="<?php echo base_url(); ?>panel" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong><?php echo form_error('s_cont'); ?></strong>
                      <strong><?php echo form_error('s_addr'); ?></strong>
                      <strong><?php echo form_error('s_city'); ?></strong>
                      <strong><?php echo form_error('s_zip'); ?></strong>
                      <strong><?php echo form_error('b_cont'); ?></strong>
                      <strong><?php echo form_error('b_addr'); ?></strong>
                      <strong><?php echo form_error('b_city'); ?></strong>
                      <strong><?php echo form_error('b_zip'); ?></strong>
                    </div>
          <?php
          }
          ?>


        <h2><?= $heading; ?></h2>
        <p>Use this form to add or update your billing and shipping information.</p>
        <br>
      </div>
    </div>
    <div class="row">    
      <div class="col-lg-6">
        <h2>Shipping Information</h2>
        <form action="<?php echo base_url('update_account'); ?>" method="post">
          <div class="form-group">
            <label for="s_cont">Contact No.</label>
            <input type="text" name="s_cont" class="form-control" id="s_cont" placeholder="Enter Contact Number Here" required maxlength="11">
          </div>
          <div class="form-group">
            <label for="s_addr">Address</label>
            <input type="text" name="s_addr" class="form-control" id="s_addr" placeholder="e.g. 1310 SW 147th St." required>
          </div>
          <div class="form-group">
            <label for="s_city">City</label>
            <input type="text" name="s_city" class="form-control" id="s_city" placeholder="Enter City" required>
          </div>
          <div class="form-group">
            <label for="s_zip">Zip Code</label>
            <input type="number" name="s_zip" class="form-control" id="s_zip" placeholder="Enter Zip" required>
          </div>
          <h2>Billing Information</h2>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="billingSame" id="billingSame"> Same as Shipping
            </label>
          </div>
           <div class="form-group">
            <label for="b_cont">Contact No.</label>
            <input type="text" name="b_cont" class="form-control" id="b_cont" placeholder="Enter Contact Number Here" required maxlength="11">
          </div>
          <div class="form-group">
            <label for="b_addr">Address</label>
            <input type="text" name="b_addr" class="form-control" id="b_addr" placeholder="e.g. 1310 SW 147th St." required>
          </div>
          <div class="form-group">
            <label for="b_city">City</label>
            <input type="text" name="b_city" class="form-control" id="b_city" placeholder="Enter City" required>
          </div>
          <div class="form-group">
            <label for="b_zip">Zip Code</label>
            <input type="number" name="b_zip" class="form-control" id="b_zip" placeholder="Enter Zip" required>
          </div>
          <input type="hidden" name="id" value="<?= $this->session->userdata('id'); ?>">
          <input type="submit" class="btn btn-success" value="<?= $title; ?>">
        </form>
      </div>
    </div>
  </div>
  <hr>
</body>
</html>