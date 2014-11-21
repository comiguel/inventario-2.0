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
		case '4': toastr.info(mensaje);break;
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
	// $('.selectpicker').selectpicker('refresh');
}

function initializeSelects(selects){
	$('select').each(function(index, val) {
		$(this).val(selects[index]);
	});
	// $('.selectpicker').selectpicker('refresh');
}

function validateSelect(select){
	if($('#'+select).val() === ''){
		$('#'+select).attr('ng-model', select);
		$('#'+select).addClass('ng-pristine');
		$('#'+select).addClass('ng-untouched');
		$('#'+select).addClass('ng-invalid');
		$('#'+select).addClass('ng-invalid-required');
	}else{
		$('#'+select).removeAttr('ng-model');
		$('#'+select).removeClass('ng-pristine');
		$('#'+select).removeClass('ng-untouched');
		$('#'+select).removeClass('ng-invalid');
		$('#'+select).removeClass('ng-invalid-required');
	}
}

function multiDelete(btnDelete,grid){
    $(btnDelete).click(function(event) {
        event.preventDefault();
        var keys = $(grid).yiiGridView('getSelectedRows');
        if (keys==''){
        	success("No se ha seleccionado ningun elemento!",'2');
        }else{
			keys = keys.toString();
			var r = confirm("¿Seguro que desea eliminar los elementos seleccionados?")
			if (r==true){
				$.post('multidelete', {data: keys}).done(function(data){
				
				});
			}
        }
    });
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

function restartTable(){
	$('#prices').empty();
	for (var i = 0; i < 5; i++) {
		$('#prices').append('<td>-</td>');
	};
}

function precioIva(pcsiva,pvsiva,iva){
	var precios = [];
	
	precios[0] = pcsiva+(pcsiva*iva);
	precios[1] = pvsiva+(pvsiva*iva);
	return precios;
}
