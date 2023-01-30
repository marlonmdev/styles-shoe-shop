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
	</nav>	<!-- End of the navbar -->

	<div class="container"> <!-- Start of the container -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">Shoe Products</h3>
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
			  		if(form_error('brand') || form_error('name') || form_error('price') || form_error('descr') || form_error('size') || form_error('stock')){
				  	?>
				  		<div class="alert alert-danger alert-dismissable" id="alerts">
		                  <a href="<?php echo base_url(); ?>panel" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                  <strong><?php echo form_error('brand'); ?></strong>
		                  <strong><?php echo form_error('name'); ?></strong>
		                  <strong><?php echo form_error('price'); ?></strong>
		                  <strong><?php echo form_error('descr'); ?></strong>
		                  <strong><?php echo form_error('size'); ?></strong>
		                  <strong><?php echo form_error('stock'); ?></strong>
		                </div>
			  	<?php
			  	}
			  	?>
                    
                <div class="row">
                	<div class="col-md-8 pull-left">
                		<a href="#addProduct" data-toggle="modal" data-target="#addProduct" class="btn btn-warning" id="btnAdd"><span class="glyphicon glyphicon-plus"></span> Add Product</a>
                	</div>
					<div class="col-md-4"></div>			
                </div>
				
				<div class="clearer"></div>
				<br>

				<div class="table-responsive" id="datas">
					<center>
					    <table class="table table-hover table-responsive">
		                    <thead>
		                        <tr class="bg-primary">
		                        	<th class="text-center" width="5%">ID</th>
		                        	<th class="text-center" width="10%">Picture</th>
		                        	<th class="text-center" width="10%">Brand</th>
		                        	<th class="text-center" width="10%">Name</th>
		                        	<th class="text-center" width="10%">Price</th>
		                        	<th class="text-center" width="10%">Category</th>
		                        	<th class="text-center" width="5%">Size</th>
		                        	<th class="text-center" width="5%">Stock</th>
		                        	<th class="text-center" width="5%">Sold</th>
		                        	<th class="text-center" width="15%">Added At</th>
		                        	<th class="text-center" width="15%">Actions</th>
		                        </tr>
		                    </thead>
		                    
		                    <tbody>
		                        <?php foreach($content as $row){?>
								<tr class="bg-success">
									<td class="text-center"><?php echo $row->id;?></td>
									<td class="text-center"><a href="<?php echo base_url();?>/images/<?= $row->picture; ?>" target="_blank" data-lightbox="shoes"><img src="<?php echo base_url();?>/images/thumb/<?= $row->picture; ?>" height="60px" width="80px" data-toggle="tooltip" title="click to view enlarge image"></a></td>
									<td class="text-center"><?php echo $row->brand;?></td>
									<td class="text-center"><?php echo $row->name;?></td>
									<td class="text-center">Php <?php echo $row->price;?>.00</td>
									<td class="text-center"><?php echo $row->cat;?></td>
									<td class="text-center"><?php echo $row->size;?></td>
									<td class="text-center"><?php echo $row->stock;?></td>
									<td class="text-center"><?php echo $row->sold;?></td>
									<td class="text-center"><?php echo $row->added_at;?></td>
									<td class="text-center">
										<a href="<?php echo base_url();?>stock/add/<?= $row->id;?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add Stock"><span class="glyphicon glyphicon-plus-sign"></span></a>
										<a href="<?php echo base_url();?>product/edit/<?= $row->id;?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
										<a href="<?php echo base_url();?>product/delete/<?php echo $row->id;?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure to delete?')"><span class="glyphicon glyphicon-trash"></span></a>
									</td>							
								</tr>
								<?php }?>					
		                    </tbody>
		                </table>

		                <ul class="pagination">
		                <?php echo $pagination; ?>
		                </ul>

	            	</center>
                </div>
			</div>
		</div>
	</div><!-- End of the content div -->

	<?php } ?>


	<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="modalTitle">Add New Product</h4>
	      </div>
	      <div class="modal-body">
	         <form method="POST" action="<?php echo base_url('product/insert'); ?>" enctype="multipart/form-data"> <!-- Start of the form -->
	         	<div class="form-group">
	         	<div class="row">
	         		<div class="col-md-6">
		                <label for="brand"> Brand:</label>
		                <select class="form-control" name="brand" id="brand" required>
		                    <option value="">Select a brand..</option>
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
                	<div class="col-md-6">
		                <div class="form-group">
		                    <label for="name"> Model Name:</label>
		                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter the model name here.." required maxlength="50">
		                </div>
	                </div>
                </div>

                <div class="row">
                	<div class="col-md-6">
		                <label for="price"> Price:</label>
                    	<input type="text" class="form-control" id="price" name="price" placeholder="Enter price here.." maxlength="8" required>
	                </div>
	                <div class="col-md-6">
		               <div class="form-group">
			                <label for="cat"> Category:</label>
			                <select class="form-control" name="cat" id="cat" required>
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
				  <textarea class="form-control" rows="5" id="descr" name="descr" placeholder="Enter item description here.." maxlength="400" required></textarea>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="size">Size:</label>
						  <input type="text" class="form-control" id="size" name="size" placeholder="Enter size here.." maxlength="3" required>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						  <label for="stock">Stock:</label>
						  <input type="text" class="form-control" id="stock" name="stock" placeholder="Enter stock here.." maxlength="3" required>
						</div>
					</div>
				</div>

                </div>
                 <label for="userfile"> Product Image:</label>
                 <input type="file" id="userfile" name="userfile" required>
                 <span class="uploaded_image"></span>
                 <br>
                 <input type="hidden" name="item_id" id="item_id">
                <input type="submit" id="action" class="btn btn-success btn-md" name="submit" value="Save Product">	
                                    
                </form>  <!-- End of the form -->        
              
	      </div>
	    </div>
	  </div>
	</div> <!-- End of the add product modal -->


	<!-- Logout Modal -->
	<div class="modal fade" id="logout">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">&times;</button>
					<h3>Are you sure you want to logout?</h3>
				</div>
				<div class="modal-body">
					<a href="<?php echo base_url('admin/logout');?>" class="btn btn-danger">Yes</a>
					<a href="<?php echo base_url('panel');?>" class="btn btn-warning">No</a>
				</div>
			</div>
		</div>
	</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/lightbox-plus-jquery.js'); ?>"></script>
	<script type="text/javascript">
		function preventBack(){window.history.forward();}
		setTimeout("preventBack()",0);
		window.onunload=function(){null};

	</script>
