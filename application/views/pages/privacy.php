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
          <li class="active"><a href="<?php echo base_url('privacy_policy'); ?>">Privacy Policy</a></li>
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
          <h3>Privacy Policy</h3>
          <hr>
          <p class="text-justify">The Styles Shoe Shop incorporated respect the privacy of the visitors of our shop website and take great care to protect your inforamtion. This privacy policy tells you what information we collect from you, how we may use it and the steps we take to ensure that is protected.</p>
          <br>
          <h3>Protection of Visitor's Information</h3>
          <hr>
          <p class="text-justify">In order to protect the information you provide to us by visiting our website we have implemented various security measures. Your personal information is contained behind secured networks and is only accessible by a limited number of people, who have special access rights and are required to keep the information confidential. Please keep in mind though that whenever you give out personal information online there is a risk that third party may intercept and use that information. While Styles Shoe Shop strives to protect its user's personal information and privacy, we cannot guaranteed the security of any information you disclose online and you so at your own risk.</p>
          <br>
          <h3>Use of Cookies</h3>
          <hr>
          <p class="text-jsutify">A cookie is small string of information that the website that you visit transfer to your computer for identification purposes. Cookies can be used to follow your activity on the website and that information helps us to understand your preferences and improve your web experience. Cookies are also used to remember for instance your username and password.</p>
           

          </div>  <!-- End of the row -->

      </div> <!-- End Main Content -->

    </div><!-- /.row -->

  </div>

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