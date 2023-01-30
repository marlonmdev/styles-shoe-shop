
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/uikit/js/uikit.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/uikit/js/components/slideshow.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/uikit/js/components/slideshow-fx.min.js'); ?>"></script>
	<script type="text/javascript">
		function GoBack(){
			history.back();
		}

	    $(document).ready(function() {
        $('#billingSame').on('click', function() {
        var contact = $("#s_cont").val();
        var address = $("#s_addr").val();
        var city = $("#s_city").val();
        var zip = $("#s_zip").val();
        $('#b_cont').val(contact);
        $('#b_addr').val(address);
        $('#b_city').val(city);
        $('#b_zip').val(zip);
      })
    });

	</script>
    
</body>
</html>