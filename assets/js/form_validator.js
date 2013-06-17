function principal(){

$validator=$('#pricipal-form').validate({

	rules:{
		inputSurname:"required",
		inputFirstname:"required",
		inputOthers:"required",
		inputID:"required",
		inputoccupation:"required",
		inputcode:"required",
		inputPhysical:"required",
		inputEmail:"required",
		inputTelephone:"required",
		inputresidence:"required",
		inputmobile:"required"
	},
	messages:{
		inputSurname:"This field is required",
		inputFirstname:"This field is required",
		inputOthers:"This field is required",
		inputID:"This field is required",
		inputoccupation:"This field is required",		
		inputcode:"This field is required",
		inputPhysical:"This field is required",
		inputEmail:"This field is required",
		inputTelephone:"This field is required",
		inputresidence:"This field is required",
		inputmobile:"This field is required"
	},
	
});
}

