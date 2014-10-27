$(document).ready(function(){
	alert("I am an alert box!");
	var num_adverts = <?=$num_adverts?>;
	var loaded_adverts = 0;
		$("#more_button").click(function(){
			loaded_adverts += 9;
			alert('hide');
			$.get("advert/get_adverts/" + loaded_adverts, function(data){
				$("#content").append(data);
 
			});
 
			if(loaded_adverts >= num_adverts - 9)
			{
				$("#more_button").hide();
				alert('hide');
			}
		})
	})