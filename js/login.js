$(function(){

	//Login form submit handler
	$('#login-form').submit(function(e){
		e.preventDefault();
		var data = $('#login-form').serialize();
		$.post(BASEURL+'/login', data, function(response){
			console.log(response);
		});
	});
})
