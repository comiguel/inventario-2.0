function success(mensaje,num){

	toastr.options = {
		"closeButton": false,
		"debug": false,
		"positionClass": "toast-top-right",
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "slideDown",
		"hideMethod": "slideUp"
	}
	switch(num){
		case '1': toastr.success(mensaje);break;
		case '2': toastr.warning(mensaje);break;
		case '3': toastr.error(mensaje);break;
	}
}

function reloadSelect(data,idSelect){
	var x = [];
	$(idSelect).empty();
	$(idSelect).append('<option value="">Seleccionar opción</option>');
	// console.log(data);
	$.each(data, function(index, element) {
		var p = new Array();
		$.each(element, function(i, e) {
			p.push(e);
		});
		$(idSelect).append('<option value='+p[0]+'>'+p[1]+'</option>');
	});
	$(idSelect).selectpicker('refresh');
}