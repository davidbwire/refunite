$(document).ready(function() {
	
    $('#spouse').hide();
    $('#no').removeAttr('checked');
    $('#yes').removeAttr('checked');
    $('.details').hide();
    $('.date').datepicker();
    $('.principal').hide();
    $('.diseases').hide();
    $('#inputDob').datepicker();
    
    // @author David Bwire
    
    $('#ltd').attr('checked', 'checked');
    $('input:radio[name="option"]').on('click', function(){
        var option = $('input:radio[name="option"]:checked').val();
        if(option == 'unltd'){
            $('#limited-wrapper').hide();
            $('#unlimited-wrapper').show();
                          
        }else{
            $('#limited-wrapper').show();
            $('#unlimited-wrapper').hide();
        }
    });
    $('#ltd').trigger('click');
    $('.nav a.quote').on('show', function(){
        $('#calculation-table').hide();
    });

    // bind click on seniors spouse
    
    $('#has_spouse, #no_spouse').on('click', function(e){
        
        if($(this).attr('id') == 'has_spouse'){
            $('#spouse').show();
        }else{
            $('#spouse').hide();


        }
        
        
    })
    
    // end 
    hide_checkbox();
    calculator();
    proceed();
    principal();
    next();
    datedropdown();
    page_navigator();
    loadviews();
    principal();
    isAdult();


});


function datedropdown(){
    populatedropdown("dayprincipal", "monthprincipal", "yearprincipal");
    populatedropdown("dayspouse","monthspouse","yearspouse");

}
function page_navigator(){
    $('#back').click(function(){
        $('.principal').hide();
        $('#calculator-form').show();
    });

}


function hide_checkbox(){

    $('#yes').click(function(){

        $('#spouse').fadeIn();
        $('#no').removeAttr('checked');

    });
    $('#no').click(function(){

        $('#spouse').fadeOut();
        $('#yes').removeAttr('checked');

    });
    
// seniors implementation
    
   
    
}

function isAdult() {
    var d= new Date();
    var year= d.getFullYear();
    var principal_age = $('#yearprincipal').val();
    var age = year - principal_age;
    
    if(age<18){
        return false;
    } else{
        return true;
    }
}

function proceed(){
    $('#proceeder').on('click',function(){
        $('#calculator-form').serialize();

        $('#calculator-form').hide();
        $('.principal').show();

    });
}
function next(){

    $('#next').on('click', function(e){
        e.preventDefault();
		
        // principal();
        // if(!$(this).closest("form").valid()){
        //        e.preventDefault();
        //      //   var errText="";
        //   $(".error").each(function(i,j){
        //    errText+=$(j).text()+"<br/>";           
        // });  
        //  return false;
        //  }else{
        var username=$('#inputSurname').val();
        var firstname=$('#inputFirstname').val();
        var others=$('#inputOthers').val();
        var id=$('#inputID').val();
        var inputDob=$('#inputDob').val();
        var inputoccupation=$('#inputoccupation').val();
        var inputNhif=$('#inputNhif').val();
        var inputPostal=$('#inputPostal').val();
        var inputCode=$('#inputCode').val();
        var inputPhysical=$('#inputPhysical').val();
        var inputEmail=$('#inputEmail').val();
        var inputEmployer=$('#inputEmployer').val();
        var inputTelephone=$('#inputTelephone').val();
        var inputresidence=$('#inputresidence').val();
        var inputmobile=$('#inputmobile').val();
        var host = 'localhost';
        var url = 'http://' + host + '/afyaimara_origi/index.php/pg/principal'; 
        $.post(url,{
            username:username,
            firstname:firstname,
            others:others,
            id:id,
            inputDob:inputDob,
            inputoccupation:inputoccupation,
            inputNhif:inputNhif,
            inputPostal:inputPostal,
            inputCode:inputCode,
            inputPhysical:inputPhysical,
            inputEmail:inputEmail,
            inputEmployer:inputEmployer,
            inputTelephone:inputTelephone,
            inputresidence:inputresidence,
            inputmobile:inputmobile

        },function(message){
            alert(message);
            $('.principal').hide();
            $('.details').show();
            $('#details1').hide();

        });

    //$('#calculator-form').html($('.details').html());

    //}

    });
}

function displayResults(data){
   
    $table = $('#calculation-table');
    $table.show();
    $table.find('.premium').text(data.payable_premium);
    $table.find('.tax').text(data.tax);
    $table.find('.stamp').text(data.stamp_duty);
    $table.find('.total').text(data.total);
}

function calculator(){

    $('#calculate').click(function(){
        var plan= $(this).attr('data-plan');
        var host = 'localhost';
        var url = 'http://' + host + '/afyaimara_origi/index.php/pg/calculator'; 
        if(plan != null && plan != '' && plan != undefined){
            switch(plan){
                case 'general':
                    if(isAdult()){
                        var dayprincipal = $('#dayprincipal').val();
                        var monthprincipal = $('#monthprincipal').val();
                        var yearprincipal = $('#yearprincipal').val();
                        var principal_age = yearprincipal+"-"+monthprincipal+"-"+dayprincipal;
                        var dayspouse = $('#dayspouse').val();
                        var monthspouse = $('#monthspouse').val();
                        var yearspouse = $('#yearspouse').val();
                        var spouse_age = yearspouse+"-"+monthspouse+"-"+dayspouse;
                        var children = $('#children').val();
                        var inpatient_cover = $('#inpatient_cover').val();
                        var outpatient_cover = $('#outpatient_cover').val();
				
                        var maternity_cover = $('#maternity_cover').val();
                        if ($('#spouse').is(":visible")) {
                            var has_spouse = 1;
                        }else{
                            has_spouse = 0;
                        }
                        $.post(url,{
                            spouse_age:spouse_age,
                            principal_age:principal_age,
                            children:children,
                            has_spouse:has_spouse,
                            inpatient_cover:inpatient_cover,
                            outpatient_cover:outpatient_cover,
                            plan:plan,
                            maternity_cover:maternity_cover

                        },function(message){
                            var data;
                            data = JSON.parse(message);
                            displayResults(data);
                        });
                    }else{
                        alert('You must be over 18 to apply.');
                    }
                    break;
                case 'junior':
                    
                    var option = $('input:radio[name="option"]:checked').val();
                    if(option == 'ltd'){
                        inpatient_cover = $('#limited').val();
                    }else{
                        inpatient_cover = $('#unlimited').val();
                    }
                    var no_children = 0;
                    var count = $('#no_children').val();
                    if(count > 0){
                        no_children = count;
                    }
                    $.post(url,{
                        no_children:no_children,
                        option:option,
                        inpatient_cover: inpatient_cover,
                        plan: plan

                    },function(message){
                        var data;
                        data = JSON.parse(message);
                        displayResults(data);
                    });
                    break;
                case 'seniors':
                    
                    // initialize has dependant to zero
                    
                    var has_dependant = 0, dependant_age;
                    dayprincipal = $('#dayprincipal').val();
                    monthprincipal = $('#monthprincipal').val();
                    yearprincipal = $('#yearprincipal').val();
                    principal_age = yearprincipal+"-"+monthprincipal+"-"+dayprincipal;
                    if($('#has_spouse:checked').length > 0){
                    dayspouse = $('#dayspouse').val();
                    monthspouse = $('#monthspouse').val();
                    yearspouse = $('#yearspouse').val();
                    has_dependant = 1;
                    dependant_age = yearspouse+"-"+monthspouse+"-"+dayspouse;

                    }
                    inpatient_cover = $('#inpatient_cover').val();
                    outpatient_cover = $('#outpatient_cover').val();
                    $.post(url,{
                        inpatient_cover:inpatient_cover,
                        outpatient_cover:outpatient_cover,
                        principal_age: principal_age,
                        plan: plan,
                        has_dependant:has_dependant,
                        dependant_age: dependant_age

                    },function(message){
                        var data;
                        data = JSON.parse(message);
                        displayResults(data);

                    });
                    break;
                  
            }
        }
	
        
	 
    });
}

function loadviews(){
    $('#go').on('click',function(){
        var dependants= $('#inputdependant').val();
        alert(dependants);

        for(var i = 1; i<= dependants; i++){

            $para='<p>';
            $node='<input type="text" class="input-small" id="inputSurname'+i+'"  name="inputSurname'+i+'" placeholder="Surname">';
            $first='<input type="text" class="input-small" id="inputfirstname'+i+'" name="inputfirstname'+i+'" placeholder="Firstname">';
            $middle='<input type="text" class="input-small" id="inputmiddle'+i+'" name="inputmiddle'+i+'"  placeholder="middle name">';
            $dob='<input type="text" class="date" id="inputDob'+i+'" name="inputDob'+i+'"   placeholder="Dob">';
            $rltn='<input type="text" class="input-small"id="inputRelationship'+i+'" name="inputRelationship'+i+'"  placeholder="relation">';
            $close='</p>';
		
            $('#form').append($para).append($node).append($first).append($middle).append($dob).append($rltn).append($close);

		
        }
    });

    $('#nextdetails').on('click',function(){
	
        //console.log($('#form').serializeArray());
        $.ajax({
            type:"post",
            url: 'http://localhost/afyaimara_origi/index.php/pg/dependants', 
            cache:false,
            data:$('#form').serializeArray(),
            success: function(data){
                alert(data);
                $('.details').hide();
                $('.diseases').show();
			
            }
        });

    });

}


//le-yo

