$(document).on("ready", function() {
	$('button[type="submit"]').on('click',function(e) {
        e.preventDefault();
        if ( !$('input#sylius_newsletter_enviarATodos').is(':checked') && $('select.provinces').val() === null && $('select.actividades').val() === null  ) {
        	$('label[for="sylius_newsletter_provinces"]').parent().addClass('has-error');
			$('select.provinces').parent().append('<span class="help-block form-error">Debe elegir al menos una provincia (o elegir alguna actividad)</span>');

			$('label[for="sylius_newsletter_actividades"]').parent().addClass('has-error');
			$('select.actividades').parent().append('<span class="help-block form-error">Debe elegir al menos una actividad (o elegir alguna provincia)</span>');
        }
        else {
        	document.getElementById("form").submit();
        }
	});
});