$(function(){

	/** Get all glosseries **/
	$.get(BASEURL+'/glossaries',{},function(response){
			if (response.code == 200){
				var index;
				for (index = 0; index < response.glossaries.length; index++)
				{
					var glossary = response.glossaries[index];
					var terms = response.terms[index];
					addGlossary(glossary, terms);
				}
			}
		
	},'json');


	/** Add glossary item **/
	$('#add-glossary-term-button').click(function(){
		var item = $('#create-glossary-form [name=glossary-item]').val().trim();

		if(item){
			var markup = '<li class="list-group-item"><small class="text-muted">Term:</small> '+item+'</li> \
						<input type="hidden" name="terms[]" value="'+item+'" />'
			$('#create-glossary-form-terms ul').append(markup);
			$('#create-glossary-form [name=glossary-item]').val('');
		}
	});

	/** Create Glossary**/
	var form_selector = '#create-glossary-form';
	$(form_selector).submit(function(e){
		var form_button_selector = '#create-glossary-form button';
		$(form_button_selector).prop('disabled','disabled');
		e.preventDefault();
		var data = $(form_selector).serialize();
		var post_url =  BASEURL+'/glossary';

		$.post(post_url, data, function(response){
			$(form_button_selector).removeProp('disabled');
			$('#create-glossary-form-terms ul').html('');

			if (response.code == 200){
				document.querySelector(form_selector).reset();
				addGlossary(response.glossary, response.terms);
			}
		},'json');
	});
});


/**
 * Adds glossary item to glossary listing
 */
function addGlossary(glossary, terms){

	var markup = '<div class="list-group"> \
		<div class="list-group-item"> \
			<ul class="nav nav-pills" role="tablist"> \
				<li class="active" role="presentation"><a>'+glossary.name+'</a></li> \
				<li role="presentation" class=""><a data-toggle="collapse" href="#collapse-word-'+glossary.id+'" aria-expanded="false" aria-controls="collapse-word-'+glossary.id+'">Terms <span class="badge">'+terms.length+'</span></a></li> \
			</ul> \
		<div class="collapse" id="collapse-word-'+glossary.id+'"> \
			<div class="well">';

			if (terms.length){
				markup += '<h4>Terms</h4>';
				markup += '<table class="table table-bordered table-condensed table-striped table-hover">';
				var index;
				for(index = 0; index < terms.length; index++)
				{
					markup += '<tr> \
						<td>'+terms[index]['value'];
				}
				markup += '</table>';
			}else{
				markup += '<h4>No terms</h4>';
			}

		markup += '</div> \
		</div> \
		</div> \
	</div>';


	$('#glossary-listing').prepend(markup);
}
