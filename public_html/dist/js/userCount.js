$(document).ready(function(){
var url = $(".url").val(),
    value,
	username;

inputsDisable();
createNewUser();
updateUser();
deleteUser();


function inputsDisable(){
// HABILITO LOS INPUTS
	$('#createNewUser').click(function(){

	$("#departmentId").prop("disabled",false);
	$("#nameUser").prop("disabled",false);
	$("#lastNameUser").prop("disabled",false);
	$("#userNameCount").prop("disabled",false);
	$("#userEmail").prop("disabled",false);
	$("#userPassword").prop("disabled",false);
	$("#dataCheck1").prop("disabled",false);
	$("#radioUser").prop("disabled",false);
	$("#btnGeneratePass").prop("disabled",false);
	$("#saveNewUser").prop("disabled",false);

})



// DESABILITO LOS INPUTS
$('#cancelUser').click(function(){
	$("#departmentId").prop("disabled",true);
	$("#nameUser").prop("disabled",true);
	$("#lastNameUser").prop("disabled",true);
	$("#userNameCount").prop("disabled",true);
	$("#userEmail").prop("disabled",true);
	$("#userPassword").prop("disabled",true);
	$("#dataCheck1").prop("disabled",true);
	$("#radioUser").prop("disabled",true);
	$("#btnGeneratePass").prop("disabled",true);
	$("#saveNewUser").prop("disabled",true);
	$("#nameUser").val("")
	$("#lastNameUser").val("")
	$("#userNameCount").val("")
	$("#userEmail").val("")
	$("#userPassword").val("")
	$("#dataCheck1").val("")



})


}





function createNewUser(radioValue){


$("#btnGeneratePass").click(function(){


				$.ajax({
                   
                    url: url+'User_Controller/generatePass',
     

                    success: function(resp){
                    

                    	$("#userPassword").val(resp);

               

                 }
            });


})


$("#saveNewUser").click(function(){
	//VALIDAR QUE LOS CAMPOS NO VENGAN VACIOS
	if (
	    $("#departmentId").val() 	== '' ||
		$("#lastNameUser").val() 	== '' ||
		$("#userNameCount").val() 	== '' ||
		$("#userPassword").val() 	== '') {

		alertify.notify('Ingrese campos obligatorios', 'error', function () {             

		});

		return false;
		
	}



var checked 	= $('#radioUser:checked').val();
	 value 	    = $.trim($("#userNameCount").val());
	 username   = value.replace(/ /g,''); //ELIMINA TODOS LOS ESPACIOS EN BLANCO



var userData = { "department" : $("#departmentId").val(),
				 "name"       : $("#nameUser").val(),
				 "lastname"   : $("#lastNameUser").val(),
				 "username"   : username,
				 "email"      : $("#userEmail").val(),
				 "password"   : $("#userPassword").val(),
				 "status"     :  checked }


				 console.log(userData);

				$.ajax({

                    type: 'POST',
                    url: url+'User_Controller/CreateNewUser',
                    data:userData,

                    success: function(resp){

                    	if (resp == 100) {


							alertify.notify('Este usuario ya se encuentra registrado', 'error', function () {});
							
							return false;

                    	}else if(resp == 200){

							alertify.notify('Error al Registrar usuario', 'error', function () {});

							return false;

						}else{


							 $("#nameUser").val("")
							 $("#lastNameUser").val("")
							 $("#userNameCount").val("")
							 $("#userEmail").val("")
							 $("#userPassword").val("")
							 $("#dataCheck1").val("")
						

                        	 	alertify.notify('Usuario creado', 'success', function () {

                      

                    		 });


							return false;



						}


              

                 }
            });


		})





}

function updateUser() {



	$(".sendDataUser").submit(function(e) {

		

		 e.preventDefault();

			
			$.ajax({	

				type: 'POST',
				url: url+'User_Controller/updateUser',
				data: $(this).serialize(),
				success: function(resp){

						 window.location = "adjust";


							}

					});
		

		})
	
}


function deleteUser() {



	$(".user_id").click(function() {

		var data = {

			"user_id":$(this).attr("user_id"),
			"enabled":0
		}


			$.ajax({	

				type: 'POST',
				url: url+'User_Controller/deleteUser',
				data: data,
				success: function(resp){

				

						  window.location = "adjust";


							}

					});
		

		})
	
}



});
