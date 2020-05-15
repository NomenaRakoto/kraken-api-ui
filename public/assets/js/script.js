$(document).ready(function(){
	// just for the demos, avoids form submit
	jQuery.validator.setDefaults({
	  success: "valid"
	});
	$( "#kForm" ).validate({
	  rules: {
	    name: {
	      required: true
	    },
	    age : {
	    	required : true,
	    	number : true
	    },
	    size : {
	    	required : true,
	    	number : true
	    },
	    weight : {
	    	required : true,
	    	number : true
	    }
	  },
	  submitHandler: function(form) {
	    form.submit();
	  }
	});

	$("#tForm").validate({
	  rules: {
	    name: {
	      required: true
	    }
	  },
	  submitHandler: function(form) {
	    form.submit();
	  }
	});

	$('#addKraken').on('click', function(){
		$('#kModal').modal("show");
	});

	$('#addTentacle').on('click', function(){
		$('#TModal').modal("show");
	});

	$('#addPower').on('click', function(){
		$('#PModal').modal("show");
	});

	$('.tSelect').on('change', function(){
		var id = $(this).attr('t-id');
		$("#t-delete-btn").attr("t-id", id);
	});

	$('.kSelect').on('change', function(){
		var index = $(this).attr('k-index');
		location.href = "/change_current_kraken/" + index;
	});

	$('#t-delete-btn').on('click', function(){
		var id = $(this).attr("t-id");
		if(id) {
			location.href = "/remove_tentacule/" + id;
		} else {
			alert('Choisissez une tentacule à supprimer');
		}
	});
	
});