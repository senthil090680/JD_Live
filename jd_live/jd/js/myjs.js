$.validator.setDefaults({
	submitHandler: function() { alert("submitted!"); }
});

$().ready(function() {

	
	// validate signup form on keyup and submit
	$("#postadd").validate({
		rules: {
			companyname: "required",
			stradd: "required",
			
			
			
			
			
			
		
			
			
			
			
		messages: {
			companyname: "Please enter your company Name",
			stradd: "Please enter your Streer Address",
			
		
		}
	});
	
	// propose username by combining first- and lastname
	$("#username").focus(function() {
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		if(firstname && lastname && !this.value) {
			this.value = firstname + "." + lastname;
		}
	});
	
	//code to hide topic selection, disable for demo

});

