<script>
	$(function(){
		$('.datepicker').datepicker({
			format:"dd/mm/yyyy",
			todayBtn: "linked",
			keyboardNavigation: false,
			forceParse: true,
			calendarWeeks: false,
			autoclose: true,
			timepicker:true
		});
	});
</script>