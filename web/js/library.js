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

function reloadSelect(data, idSelect, firstOption){
	var x = [];
	$(idSelect).empty();
	$(idSelect).append('<option value="">'+firstOption+'</option>');
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

function reloadTable(data){ //Actualiza los valores de la tabla de precios
	$('#prices').empty();
		$.each(data[0], function(i, e) {
			if(e==null){
				e="-";
			}
			$('#prices').append('<td>'+e+'</td>');
		});
	}

function restarTable(){
	$('#prices').empty();
	for (var i = 0; i < 5; i++) {
		$('#prices').append('<td>-</td>');
	};
}

function initializeSelects(selects){
	$('.selectpicker').each(function(index, val) {
		$(this).val(selects[index]);
	});
	$('.selectpicker').selectpicker('refresh');
}