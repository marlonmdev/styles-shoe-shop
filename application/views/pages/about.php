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
          <li class="active"><a href="<?php echo base_url('about'); ?>">About Us</a></li>
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
      

        <!-- MainContent -->
      <div class="col-lg-8 col-lg-offset-2">
          <!-- header image -->
          <center><img src="<?php echo base_url('images/logo/slogo.png') ?>" class="img-responsive" alt="styles"></center>       
          <div class="row"> 
            <h3>About Us</h3>
            <hr>
            <p class="text-justify">Styles Shoe Shop is an online shoe shop that was founded in the Philippines in 2018 with a mission of providing a high quality footwear that suits your style and to be one of the leading sports footwear apparel in the country.</p><br>

            <h3>Frequently Ask Questions</h3>
            <hr>
            <p class="text-justify lead">Do you ship?</p>
            <p class="text-justify">- Yes, we ship our products via LBC and 2GO only.</p>
            <p class="text-justify lead">Do you deliver?</p>
            <p class="text-justify">- No, we only offer shipping.</p>
            <p class="text-justify lead">When will I get my orders?</p>
            <p class="text-justify">- We will ship our products 3-5 days around Bohol and it will take 8-12 days nationwide.</p>
            <p class="text-justify lead">How do I pay my orders?</p>
            <p class="text-justify">- You will pay your orders through cash on delivery.</p>
          </div>

        </div> <!-- End Main Content -->
    </div><!-- /.row -->
  </div><!--/.container-->
  <br>
  <div class="container-fluid">
    <div class="row">
      <footer style="background:#222;height:80px;">
        <p class="text-center" style="font-size:1.1em;color:#fff;line-height:80px;">Copyright &copy; 2018 | All Rights Reserved | Styles Shoe Shop | 24x7 Support | Email Us: stylesshoeshop32@gmail.com</p>
      </footer>
    </div>
  </div>
</body>
</html>