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
                <li><a href="<?php echo base_url('orders') ?>">Orders</a></li>
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
            <form method="POST" action="<?php echo base_url('product/update'); ?>" enctype="multipart/form-data"> <!-- Start of the form -->
                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="brand"> Brand:</label>
                            <select class="form-control" name="brand" id="brand" required>
                                <option value="<?php echo $row->brand; ?>"><?php echo $row->brand; ?></option>
                                <option value="Nike">Nike</option>
                                <option value="Rebook">Rebook</option>
                                <option value="Adidas">Adidas</option>
                                <option value="UnderArmour">Under Armour</option>
                                <option value="Puma">Puma</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Lining">Lining</option>
                                <option value="DC">DC</option>
                                <option value="Converse">Converse</option>
                            </select>
                       </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label for="name"> Name:</label>
                            <input type="text" class="form-control" id="name" name="name"  value="<?php echo $row->name; ?>" placeholder="Enter the model name here.." required maxlength="50">
                        </div>
                    </div>
                </div>
                
                 <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label for="price"> Price:</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $row->price; ?>" placeholder="Enter price here.." maxlength="8" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cat"> Category:</label>
                            <select class="form-control" name="cat" id="cat" required>
                                <option value="<?php echo $row->cat; ?>"><?php echo $row->cat; ?></option>
                                <option value="">Select a Category..</option>
                                <option value="Men Shoes">Men Shoes</option>
                                <option value="Women Shoes">Women Shoes</option>
                                <option value="Unisex">Unisex</option>
                            </select>
                        </div>
                    </div>
                </div>
               
                                 
                <div class="form-group">
                  <label for="descr">Description:</label>
                  <textarea class="form-control" rows="5" id="descr" name="descr" placeholder="Enter item description here.." maxlength="400" required><?php echo $row->descr; ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="size">Size:</label>
                          <input type="text" class="form-control" id="size" name="size" value="<?= $row->size?>" placeholder="Enter size here.." maxlength="3" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="stock">Stock:</label>
                          <input type="text" class="form-control" id="stock" name="stock" value="<?= $row->stock?>" placeholder="Enter stock here.." maxlength="3" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 pull-left">
                    <label for="userfile"> Product Image:</label>
                    <input type="file" id="userfile" name="userfile" required><?php echo $row->picture; ?><br>
                    </div>
                <div class="col-md-4 pull-right">
                        <img src="<?php echo base_url(); ?>images/<?= $row->picture; ?>" class="img-thumbnail img-responsive" height="150px" width="180px">
                    </div>
                </div>
                <input type="submit" class="btn btn-success btn-md" name="submit" value="Update Item">	
                <a href="<?php echo base_url('panel'); ?>" class="btn btn-default btn-md" style="margin-left: 10px;">Go back</a>              
            </form>  <!-- End of the form --> 

    </div> 
</div>

    <?php } ?>

  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>