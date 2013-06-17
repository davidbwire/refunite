    //CONTACT FORM: ajax request
    $('.submit').click(function(){
    //FORM VALIDATION: validates on submit
         $("#contact-form").validate({
            rules: {
                fullName: {           //input name: fullName
                    required: true,   //required boolean: true/false
                    minlength: 5,       
                },
                email: {              //input name: email
                    required: true,   //required boolean: true/false
                    email: true       //required boolean: true/false
                },
                subject: {            //input name: subject
                    required: true,   //required boolean: true/false
                    minlength: 5
                },
                message: {            //input name: message
                    required: true,
                    minlength: 50
                }
            },
            messages: {               //messages to appear on error
                fullName: {
                      required:"Please put your full name.",
                      minlength:"C'mon full name please."
                      },
                email: "Enter a valid email.",
                subject: {
                      required: "Whats the topic?",
                      minlength: ""
                      },
                message: {
                      required: "What did you want to say?",
                      minlength: "Please complete your thoughts, then submit."
                      }
            },
            submitHandler: function(form) {
                   $(form).ajaxSubmit({
                            url:"email.php",
                            type:"post",
                            success: function(){
                              alert('inside');
                              $('#contact-form').hide();
                              $('#sent').show();
                      }
                    });
          }
        });  
    });
function get_validator(){

  $.validator.addMethod('pricipal', function(value){
      var d= new Date();
      var year= d.getFullYear();
      var principal_age=$('#yearprincipal').val();
      var age= year-principal_age;
      if(age<18){
        return false;
      } else{
        return true;
      }

      },"you must be above 18 to apply");

      $.validator.addMethod('pricipal', function(value){
      var d= new date();
      var year= d.getFullYear();
      var spouse_age=$('#yearspouse').val();
      var age1= year-spouse_age;
      if(age1<18){
        return false;
      } else{
        return true;
      }

      },"your spouse must be above 18 to apply"); 
}