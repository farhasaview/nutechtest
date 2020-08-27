<!-- I placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>styles/js/popper.min.js"></script>
    <script src="<?=base_url()?>styles/js/jquery-3.5.1.js"></script>
    <script src="<?=base_url()?>styles/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>styles/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>styles/js/bootstrap.min.js"></script>
    <script>
        window.setTimeout(function() { $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 3000);
        window.setTimeout(function() { $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 3000);
            	
        $(document).ready(function() {
    		$('#tabelBarang').DataTable();
    	} );
    </script>
</body>