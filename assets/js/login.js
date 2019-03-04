$(function(){

	//Login form submit handler
	$('#login-form').submit(function(e){
		e.preventDefault();
		var data = $('#login-form').serialize();
		$.post(BASEURL+'/login', data, function(response){
			if (response.code == 200){
				var url = 'https://www.proz.com/oauth/authorize?client_id='+response.clientId+'&redirect_uri='+response.redirect+'&response_type=code';
;
				var newwindow = window.open(url,'Proz Login','height=300,width=300');
			   if (window.focus) {newwindow.focus()}
			}
		},'json');
	});
})
