<script>
	var filterPanel = false;
	var userPanel = false;


	$('#filtros').on('click', function(){
		if(!filterPanel){
			$('.filtros-panel').css('margin-left', '0px');
			filterPanel = true;
		}else{
			$('.filtros-panel').css('margin-left', '-300px');
			filterPanel = false;
		}

		$('.user-panel').css('margin-right', '-300px');
		userPanel = false;
	});


	$('.user-menu').on('click', function(){

		if(!userPanel){
			$('.user-panel').css('margin-right', '0px');
			userPanel = true;
		}else{
			$('.user-panel').css('margin-right', '-300px');
			userPanel = false;
		}
		$('.filtros-panel').css('margin-left', '-300px');
		filterPanel = false;
	});
	
</script>