$(document).ready(function(){


	// hide messages 
	$("#error").hide();
	$("#success").hide();
	
	// on submit...
	$("#contactForm #submit").click(function() {
		$("#error").hide();
		
		//required:
		
		//name
		var name = $("input#name").val();
		if(name == ""){
			$("#error").fadeIn().text("Name required.");
			$("input#name").focus();
			return false;
		}
		
	
		
				         
		// ajax
		$.ajax({
			type:"POST",
			url: sendMailUrl,
			data: dataString,
			success: success()
		});
	});  
		
		
	// on success...
	 function success(){
	 	$("#success").fadeIn();
	 	$("#contactForm").fadeOut();
	 }
	
    return false;
});

