$(document).ready(function(){
;
validateUser();
var url = $('#url').val();

function validateUser(){

    $('#Validate_login').submit(function(e){
      
        e.preventDefault();
        
        var user = $("#userName").val(),
            pass = $("#userPass").val();

  //PENDIENTE ASIGNAR EXPRESIONES REGULARES
  //-------------------------------------------------------------------------------------

  //------------------------------------------------------------------------------------
         
  
                $.ajax({
                type: "POST",
                url: url+'Auth_Controller/ValidateSession',
                data: $(this).serialize(),
                success:function(response){

                  

                    console.log(response);


                    if (response == 0) {

                        $("#msg").html('<p class="text-danger" style="font-size:12px; text-align:center">Su cuenta se encuentra temporalmente bloqueada. Consulte el administrador del sistema.</p>');
                        
                         
                         $("#userPass").val("");

                         return false;
                   
                    }


                    if (response == 3) {

                        $("#msg").html('<p class="text-danger" style="font-size:12px; text-align:center">Este usuario no se encuentra registrado en el sistema.</p>');
                        
                         
                         $("#userPass").val("");
                   
                    }


                    if (response == 2) {

                        $("#msg").html('<p class="text-danger" style="font-size:12px; text-align:center">Contraseña incorrecta, intente nuevamente.</p>');
                        
                         
                         $("#userPass").val("");
                   
                    }   



                    if (response == 1) {

                        // $("#msg").html('<p class="text-success" style="font-size:12px; text-align:center">Usuario validado.</p>');
            
                         $("#userPass").val("");

                        window.location = "home";
                   

                   
                    }


          

                  

                }

            });

    });




}



});