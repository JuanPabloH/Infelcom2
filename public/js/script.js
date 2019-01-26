$("#registro").click(function(){
	var dato = $("#destino").val();
	var route = "/destino";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{destino: dato},

		success:function(){
			$("#msj-success").fadeIn();
		},
		error:function(msj){
			$("#msj").html(msj.responseJSON.destino);
			$("#msj-error").fadeIn();
		}
	});
});