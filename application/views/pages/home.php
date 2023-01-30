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
            <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
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
              <li>
                <?php if(empty($this->session->userdata('picture'))) {?>
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
      <div class="col-md-1"></div>
      <div class="col-lg-8" id="main"> <!-- MainContent -->

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
            if(form_error('fname') || form_error('lname') || form_error('email') || form_error('pass1') || form_error('pass2')){
            ?>
              <div class="alert alert-danger alert-dismissable" id="alerts">
                      <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong><?php echo form_error('fname'); ?></strong>
                      <strong><?php echo form_error('lname'); ?></strong>
                      <strong><?php echo form_error('email'); ?></strong>
                      <strong><?php echo form_error('pass1'); ?></strong>
                      <strong><?php echo form_error('pass2'); ?></strong>
                    </div>
          <?php
          }
          ?>
         
        <center><img src="<?php echo base_url('images/logo/styles.png') ?>" class="img-responsive" alt="styles"></center>   
        <!-- Banner Carousel -->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="background:#fff;">
              <div class="item active">
                <img src="<?php echo base_url('images/logo/banner1.png') ?>" class="img-responsive" alt="banner">
              </div>

              <div class="item">
                <img src="<?php echo base_url('images/logo/banner2.png') ?>" class="img-responsive" alt="banner">
              </div>

              <div class="item">
                <img src="<?php echo base_url('images/logo/banner3.png') ?>" class="img-responsive" alt="banner">
              </div>

              <div class="item">
                <img src="<?php echo base_url('images/logo/banner4.png') ?>" class="img-responsive" alt="banner">
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
         
          <br>
          <div class="row"> 
          <!-- This is the nike logo -->     
            <div class="col-sm-6 col-md-4 col-xs-6" data-toggle="tooltip" title="Click to show Nike shoes">
              <div class="thumbnail category-display" id="brand">
                <a href="<?php echo base_url('Nike'); ?>"><img src="<?php echo base_url(); ?>images/brands/Nike.png" height="99" width="148" alt="nike logo"></a>
              </div>
            </div>
            <!-- This is the rebook logo -->
            <div class="col-sm-6 col-md-4 col-xs-6" data-toggle="tooltip" title="Click to show Rebook shoes">
              <div class="thumbnail category-display" id="brand">
                <a href="<?php echo base_url('Rebook'); ?>"><img src="<?php echo base_url(); ?>images/brands/Rebook.png" height="99" width="148" alt="rebook logo"></a>
              </div>
            </div>   
             <!-- This is the adidas logo -->
            <div class="col-sm-6 col-md-4 col-xs-6" data-toggle="tooltip" title="Click to show Adidas shoes">
              <div class="thumbnail category-display" id="brand">
                <a href="<?php echo base_url('Adidas'); ?>"><img src="<?php echo base_url(); ?>images/brands/Adidas.png" height="99" width="148" alt="adidas logo"></a>
              </div>
            </div>
             <!-- This is the under armour logo -->
            <div class="col-sm-6 col-md-4 col-xs-6" data-toggle="tooltip" title="Click to show Under Armour shoes">
              <div class="thumbnail category-display" id="brand">
                <a href="<?php echo base_url('UnderArmour'); ?>"><img src="<?php echo base_url(); ?>images/brands/UnderArmour.png" height="99" width="148" alt="under armour logo"></a>
              </div>
            </div>
             <!-- This is the puma logo -->
            <div class="col-sm-6 col-md-4 col-xs-6" data-toggle="tooltip" title="Click to show Puma shoes">
              <div class="thumbnail category-display" id="brand">
                <a href="<?php echo base_url('Puma'); ?>"><img src="<?php echo base_url(); ?>images/brands/Puma.png" height="99" width="148" alt="puma logo"></a>
              </div>
            </div>
             <!-- This is the jordan logo -->
            <div class="col-sm-6 col-md-4 col-xs-6" data-toggle="tooltip" title="Click to show Jordan shoes">
              <div class="thumbnail category-display" id="brand">
                <a href="<?php echo base_url('Jordan'); ?>"><img src="<?php echo base_url(); ?>images/brands/Jordan.png" height="99" width="148" alt="jordan logo"></a>
              </div>
            </div>
             <!-- This is the lining logo -->
            <div class="col-sm-6 col-md-4 col-xs-6" data-toggle="tooltip" title="Click to show Lining shoes">
                <div class="thumbnail category-display" id="brand">
                  <a href="<?php echo base_url('Lining'); ?>"><img src="<?php echo base_url(); ?>images/brands/Lining.png" height="99" width="148" alt="lining logo"></a>
                </div>
              </div>

               <!-- This is the dc logo -->
          <div class="col-sm-6 col-md-4 col-xs-6" data-toggle="tooltip" title="Click to show DC shoes">
              <div class="thumbnail category-display" id="brand">
                <a href="<?php echo base_url('DC'); ?>"><img src="<?php echo base_url(); ?>images/brands/DC.png" height="99" width="148" alt="dc logo"></a>
              </div>
            </div>
             <!-- This is the converse logo -->
           <div class="col-sm-6 col-md-4 col-xs-6" data-toggle="tooltip" title="Click to show Converse shoes">
              <div class="thumbnail category-display" id="brand">
                <a href="<?php echo base_url('Converse'); ?>"><img src="<?php echo base_url(); ?>images/brands/Converse.png" height="99" width="148" alt="converse logo"></a>
              </div>
            </div>

        </div>  <!-- End of the row -->
        </div> <!-- End Main Content -->

        <div class="col-md-2" id="best_sellers"> 
          <?php 
          foreach($items as $item){
          ?>

                <a href="<?php echo base_url(); ?>show/item/<?php echo $item->id; ?>" style="text-decoration: none;">     
                    <div class="thumbnail" id="itemPic" style="height:270px;">
                      <div class="best pull-right" style="border-radius: 0 0 15px 0;margin-top:-50px;">Best Seller</div>
                      <img src="<?php echo base_url(); ?>images/brands/<?= $item->brand.'.png'?>" id="blogo" class="img-responsive pull-left" height="30" width="40" alt="brand logo">
                      <span class="glyphicon glyphicon-heart-empty pull-right text-danger lead" style="margin-right: 2px;margin-top:-50px"></span>
                      <img src="<?php echo base_url(); ?>images/thumb/<?php echo $item->picture; ?>" id="image" class="img-responsive" alt="shoes" style="margin-top:50px;">
                      <div class="caption" style="margin-bottom: 20px;">
                        <p class="text-center" style="font-size:1.1em;color:#246EAE;font-weight:bold;"><?php echo $item->brand; ?> <?php echo $item->name; ?></p>
                        <p id="size" class="text-center" style="font-size:1.1em;color:#246EAE;font-weight:bold;">Size: <?php echo $item->size; ?></p>
                        <p id="price" class="text-center" style="font-size:1.1em;color:#EC2E13;font-weight:bold;">Php <?php echo $item->price; ?>.00</p>
                      </div>
                      <div class="text-center">
                        <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                        <a href="<?php echo base_url(); ?>show/item/<?php echo $item->id; ?>" id="viewlink"><div>View Details</div></a>
                      </div>
                    </div>
                  </a>
            <?php } ?>  
        </div>
        <div class="col-md-1"></div>
    </div><!-- /.row -->
    <br>
  </div><!--/.container-->
   <div class="container-fluid">
    <div class="row">
      <footer style="background:#222;height:80px;">
        <p class="text-center" style="font-size:1.1em;color:#fff;line-height:80px;">Copyright &copy; 2018 | All Rights Reserved | Styles Shoe Shop | 24x7 Support | Email Us: stylesshoeshop32@gmail.com</p>
      </footer>
    </div>
  </div>
</body>
</html>