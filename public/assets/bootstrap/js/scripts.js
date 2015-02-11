$(document).ready(function(){
	$(".alert").addClass("in").fadeOut(4500);

	/* swap open/close side menu icons */
	$('[data-toggle=collapse]').click(function(){
	  	// toggle icon
	  	$(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
	});

	$('.date').datepicker({
	    format: 'dd/mm/yyyy',
	    language: 'pt-BR'
	});

	$('[data-confirm]').click(function(e){
		return confirm( $(this).data("confirm") ) ;
	})
});