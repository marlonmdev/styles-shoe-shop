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
                <li class="active"><a href="<?php echo base_url('panel'); ?>">Products</a></li>
                <li><a href="<?php echo base_url('orders'); ?>">Orders</a></li>
                <li><a href="<?php echo base_url('sales'); ?>">Sales</a></li>
                <li><a href="<?php echo base_url('accounts'); ?>">Accounts</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a><span class="glyphicon glyphicon-flag"></span> Welcome: <?= $this->session->userdata('username') ?></a>
                <li><a href="<?php echo base_url('admin/logout');?>" onclick="return confirm('Are you sure to logout?')"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              </ul>
            </div>
      </div>
    </nav>  <!-- End of the navbar -->

    <div class="container">
        <div class="col-md-6 col-md-offset-3">


           <!-- Form Error -->
               <?php 
                  if(form_error('stock')){
                  ?>
                      <div class="alert alert-danger alert-dismissable" id="alerts">
                        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo form_error('stock'); ?></strong>
                      </div>
              <?php
              }
              ?> 

            <form method="POST" action="<?php echo base_url('stock/update'); ?>"> <!-- Start of the form -->
                <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                <input type="hidden" name="current_stock" value="<?php echo $item->stock; ?>">
                <h3 class="text-center">Add Stock</h3><br>
                <!-- Error Alert -->
              <?php if($this->session->flashdata('error')): ?>
              <div class="alert alert-danger alert-dismissable" id="alerts">
                <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
              </div>
              <?php endif; ?>    

                <h4 class="text-danger">Current Stock: <span class="lead"><?= $item->stock ?></span></h4><br>
                <div class="form-group">
                    <label for="email"> Stock:</label>
                    <input type="text" class="form-control" name="stock" maxlength="15" required>
                </div>
                <input type="submit" class="btn btn-success btn-md" name="submit" value="Save">	
                <a href="<?php echo base_url('panel'); ?>" class="btn btn-default btn-md" style="margin-left: 10px;">Go back</a>              
            </form>  <!-- End of the form --> 
       

    </div> 
</div>

<?php }?>

    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>