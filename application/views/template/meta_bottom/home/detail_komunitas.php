<script>
	$(function(){
		$(".bdetail").click(function(){
			$(".detail").slideDown();
		});
		$('.datepicker').css({'z-index':'1500 !important'})
		$('.datepicker').datepicker({
			format:"dd/mm/yyyy",
			todayBtn: "linked",
			keyboardNavigation: false,
			forceParse: true,
			calendarWeeks: false,
			autoclose: true
		});
		$(".pilihan").hide();
		$(".type").on('change', function(){
			var type = $(this).val();
			$(".pilihan").hide();
			if(type == 0)
				$("#dana").fadeIn();
			else if(type == 1)
				$("#barang").fadeIn();
			else if(type == 2)
				$("#volunteer").fadeIn();
			else if(type == 3)
				$("#lain").fadeIn();
		});
	});		
</script>
