<script>
	$(function(){
		$("#type").on('change', function(){
			var type = $(this).val();
			if(type == '1')
				$(".akta").fadeIn();
			else $(".akta").hide();
		});
		$(".select2").select2();
		$(".propinsi").select2();
		$(".kabupaten").select2();
		$(".kecamatan").select2();
		
		$('.datepicker').datepicker({
			format:"dd/mm/yyyy",
			todayBtn: "linked",
			keyboardNavigation: false,
			forceParse: true,
			calendarWeeks: false,
			autoclose: true
		});
		
		// while propinsi selected.
		$(".propinsi").on('change', function(){
			var pid = $(this).val();
			$.ajax({
				url : "<?php echo base_url().'home/getKabupaten/';?>"+pid,
				type : "GET",
				success: function (data){
					$(".kabupaten").html(data);
				}
			});
		});
		
		$(".kabupaten").on('change', function(){
			var kid = $(this).val();
			$.ajax({
				url : "<?php echo base_url().'home/getKecamatan/';?>"+kid,
				type : "GET",
				success: function (data){
					$(".kecamatan").html(data);
				}
			});
		});
	});
</script>