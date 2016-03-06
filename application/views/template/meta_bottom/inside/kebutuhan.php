<!-- Data Tables -->
<script src="<?php echo base_url().'assets/js/plugins/dataTables/jquery.dataTables.js';?>"></script>
<script src="<?php echo base_url().'assets/js/plugins/dataTables/dataTables.bootstrap.js';?>"></script>
<script src="<?php echo base_url().'assets/js/plugins/dataTables/dataTables.responsive.js';?>"></script>
<script src="<?php echo base_url().'assets/js/plugins/dataTables/dataTables.tableTools.min.js';?>"></script>
<script>
	$(function(){
		$(".data-tables").DataTable({
			scrollX : false,
		});
	});
	
	function changeStatus(id){
		$("#idchange").val(id);
	}
	
		
</script>
