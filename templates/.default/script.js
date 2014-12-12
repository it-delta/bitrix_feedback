function itd_send_form(form)
{
	var Iform = form;
	var pustay_forma = false;
	
	Iform.find('input:text, textarea').each(function(){
		if ( $(this).attr('required') == 'required' && $(this).val() == '' ) {
			
			$(this).addClass('uk-form-danger');
			
			$(this).on('keypress', function(){
				if ( $(this).val().length > 0  ) {
					$(this).removeClass('uk-form-danger');
				}
			});
			
			pustay_forma = true;
		}
	});
	
	if (pustay_forma) {
		return false;
	}
	
	$.ajax({
		type: 'POST',
		url: '',
		dataType: 'json',
		data: {
			'NAME':  $('[name="NAME"]').val(),
			'PHONE': $('[name="PHONE"]').val(),
			'EMAIL': $('[name="EMAIL"]').val(),
			'MSG':   $('[name="MSG"]').val(),
		},
	})
	.done(function( msg ) {
		if (msg.type == 'ok')
		{
			$('.itd-msgs').html('<div class="uk-alert uk-alert-success"><a href="" class="uk-alert-close uk-close"></a><p>'+msg.msg+'</p></div>');
		}
		else
		{
			$('.itd-msgs').html('<div class="uk-alert uk-alert-danger"><a href="" class="uk-alert-close uk-close"></a><p>'+msg.msg+'</p></div>');
		}
		
		$('.uk-close').on('click', function() {
			$(this).parent().remove();
			
			return false;
		});
	})
	.fail(function( jqXHR, textStatus ) {
		alert( "Ошибка: " + textStatus );
	});
	
	return false;
}
