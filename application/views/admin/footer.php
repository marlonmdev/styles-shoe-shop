	
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/lightbox-plus-jquery.js'); ?>"></script>
	<script type="text/javascript">
		function printlayer(layer){
			var generator = window.open(",'name,");
			var layertext = document.getElementById(layer);
			generator.document.write(layertext.innerHTML.replace("Print Me"));
			generator.document.close();
			generator.print();
			generator.close();
		}
	</script>
</body>
</html>