
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Styles Shoe Shop</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>">
</head>
<body>

  <div class="container"> 
  	<div class="row">    
    	<div class="col-lg-12">
				<h3><span class="glyphicon glyphicon-ok text-success"></span> Thank you! Your Order was successfully placed!</h3>
        <h3><span class="glyphicon glyphicon-barcode"></span> Order Ref. ID: <span style="text-transform: uppercase;"><?=($row->order_ref);?></span></h3>
        <h3></span> Total Payment: Php <?=($row->total);?>.00</h3>
        <h4>Please wait at least a few days to hear back from us.</h4>
        <h4>We're sure, you'll enjoy the wait!</h4>
        <h3>Did you forget to add something to your order?</h3>
        <a href="<?php echo base_url('products'); ?>"><button class="btn btn-warning">Continue Shopping Now</button></a>
        <a href="<?php echo base_url('user_logout'); ?>"><button class="btn btn-primary">Go back home</button></a>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>
</html>