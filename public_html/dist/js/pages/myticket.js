
$(document).ready(function () {


  
var url = $(".url").val();

var desactivated = true;

var ticketStatus              = $('#select_option_status').val(),
    ticketImpact              = $('#select_option_impact').val(),
    ticketUrgency             = $('#select_option_urgency').val(),
    ticketRecommendedPriority = $('#recommended_priority').val(),
    ticketPriority            = $('#priority').val(),
    compareDate = null; //ESTA VARIABLE SE DECLARA PARA VALIDAR QUE NO SE DUPLIQUEN LOS VALORES DEL APPEND




//desabilitamos los botones principales
$("#saveNewTicket").css({'pointer-events':'none' , "color":'#bfbfbf'});
$("#editTicket").css({'pointer-events':'none', "color":'#bfbfbf'});
$("#cancelTikect").css({'pointer-events':'none' , "color":'#bfbfbf'});


generateNewTicket();
assignTicket();
assignCategory();
saveInformationTicket(); //Esta función almacena toda la informacion de ticket de soporte


//**********************************************************************************************/
//AL INICIAL EL FORMULARIO, EL SISTEMA BUSCA PRIMERO SI EL USUARIO TIENE TICKETS EN STATUS 1.
//STATUS 1 INDICA QUE EL TICKET CREADO ANTERIORMENTE NO SE HA ENVIADO, POR TAL MOTIVO DEBE
//ENVIARLO PARA PODER GENERAR OTRO TICKET


$.ajax({
    
type:'POST',
url: url+'Ticket_Controller/viewTicketByStatus_1',
success:function(resp){

var dataTicket = JSON.parse(resp),
    numTicket  = dataTicket.ticket,
    dateTicket = dataTicket.date,
    hourTicket = dataTicket.hour;

//EL 3 INDICA QUE NO HAY TICKET PENDIENTE POR ENVIAR
//************************************************ */
if(resp == 3){

$("#ticketid").val("");

//DESABILIAR LOS INPUTS DE ENTRADA DE DATOS
$(".select_option_admins").prop("disabled",true);
$(".input_description").prop("disabled",true);
$(".select_option_status").prop("disabled",true);
$(".select_option_impact").prop("disabled",true);
$(".select_option_urgency").prop("disabled",true);
$(".select_option_priority").prop("disabled",true);
$(".input_level1").prop("disabled",true);
$(".input_level2").prop("disabled",true);
$(".input_level3").prop("disabled",true);



}else{

//   $.jAlert({
// 		          'title': 'Alerta!!!',
// 		          'content': '<h4>Tienes un ticket pendiente ;-)</h4>',
//                    'theme':'red',
// 		          'closeOnClick': true 
// 	           });

//MUESTRA EN EL FORMULARIO EL TICKET CREADO
//MAS LA FECHA Y HORA
//*****************************************/
$("#ticketid").val(numTicket);
$("#input_date").val(dateTicket);
$("#input_hour").val(hourTicket);
//*****************************************/

var ticketData = {"TICKETNUM":numTicket}
$("#saveNewTicket").css({'pointer-events':'auto', 'color': '#fff'});
$("#createNewTicket").css({'pointer-events':'none'})

//HABILITAR LOS INPUTS DE ENTRADA DE DATOS
$(".select_option_admins").prop("disabled",false);
$(".input_description").prop("disabled",false);
$(".select_option_status").prop("disabled",false);
$(".select_option_impact").prop("disabled",false);
$(".select_option_urgency").prop("disabled",false);
$(".select_option_priority").prop("disabled",false);
$(".select_category_input").prop("disabled",false);
$(".input_level1").prop("disabled",false);
$(".input_level2").prop("disabled",false);
$(".input_level3").prop("disabled",false);

}




}
});



//**********************************************************************************************/
//**********************************************************************************************/
// function generateNewTicket(){} 
//Mando una solicitud al controlador indicando que se necesita que se genere un nuevo 
//número de ticket
//****************************************************************************************
function generateNewTicket(){



$("#createNewTicket").click(function(){
alertify.confirm('<div class="row col-12 justify-content-center" ><p  style="font-size:20px">¿Deseas crear nuevo ticket?</p> <br> <p>Al crear un ticket de soporte no podrás crear otra hasta que finalices el que hayas creada previamente.</p></div>', function(){

$("#createNewTicket").css({'pointer-events':'none'})

//CAPTURAR EL NÚMERO DE TICKET DEL CONTROLADOR
$.ajax({

        type:'POST',
        url: url+'Ticket_Controller/CreateNewTicket',
                success:function(resp){

                var ticketId = resp;
                $("#ticketid").val(resp);

                var ticketData = {"TICKETNUM":ticketId}
                $("#saveNewTicket").css({'pointer-events':'auto', 'color': '#fff'});

                        //AL GENERAR EL TICKET SE GUARDA AUTOMATICAMENTE EN LA BD
                        $.ajax({

                        type: 'POST',
                        url: url+'Ticket_Controller/saveTickeId',
                        data: ticketData,
                        success: function(resp){

                            console.log(resp)

                        var date = JSON.parse(resp);

                        $("#input_date").val(date.fecha);
                        $("#input_hour").val(date.hora);


                        }

                        });


                }
});





//HABILITO LOS INPUTS DE ENTRADA DE DATOS
$(".select_option_admins").prop("disabled",false);
$(".input_description").prop("disabled",false);
$(".select_option_status").prop("disabled",false);
$(".select_option_impact").prop("disabled",false);
$(".select_option_urgency").prop("disabled",false);
$(".select_category_input").prop("disabled",false);
$(".input_level1").prop("disabled",false);
$(".input_level2").prop("disabled",false);
$(".input_level3").prop("disabled",false);




    }, 

);


});

}



//*******************************************************/
//SELECCIONO EL ADMNISTRADOR A QUIEN VA DIRIGIDO EL TICKET
//*******************************************************/
function assignTicket() {

// $("#button_admin").click(function() {

//         $.jAlert({
// 			          'title': 'Administrador Servi Desk',
// 			          'content': ' <table class="table table-hover"><tbody><tr><td>Pedro Sierra</td></tr><tr><td>Alfredo Alcarnaval</td></tr></tbody></table>',
//                        'theme':'blue',
// 			          'closeOnClick': true 
// 		           });


// });

$('.adminUserName').click(function () {

var userName = $(this).attr('user');


})

}


//*******************************************************/
//ASIGNO LA CATEGORIA CORRESPONDIENTE
//*******************************************************/
function assignCategory(){


$('#select_category_input').bind("click", function () {

// CAPTURA EL VALOR DEL OPTION
var categoryid = {"categoryid": $(this).children(":selected").attr("categoryValue")}  

// **************************************************************************************************
// FORZAMOS AL QUE EL PRIMER VALOR NO SEA NULO YA QUE CAPTURA EL PRIMERO OPTION "SELECCIONE CATEGORIA"
    if (categoryid == "") {
        return false;
    }
// **************************************************************************************************

$.ajax({

    type: 'POST',
    url: url+'Ticket_Controller/get_category_level_1',
    data: categoryid,
    success: function(resp){

    //*******************************************************/
    //ME TRAIGO DETALLES DEL NIVEL 1
    //*******************************************************/
    var level = JSON.parse(resp),
        level_1 =  $("#level_1");

    level_1.append('<option class="level_1_class">----------</option>');
   
    $.each(level, function(i, item){
    
        level_1.append('<option class="level_1_class" categoryid = '+item.departmentid+' level_category_id_1 = '+item.level_category_id_1+' >'+item.level_1+'</option>');
                
    });


//************************************************************************/
//AL SELECCIONAR POR SEGUNDA VEZ EL INPUT SE SETEA LOS CAMPOS DE LEVELS
//***********************************************************************/
$('#select_category_input').click(function () {

    $("#level_1").html("");
    $("#level_2").html("");
    $("#level_3").html("");


});


//************************************************************************/
//SE CAPTURA EL VALOR DEL LEVEL 1
//***********************************************************************/
$('#level_1').unbind().bind("change", function (e) {
e.stopImmediatePropagation();


//ESTE ID PROVIENE DE LA TABLA LEVEL_CATEGORY_1

 var level_1_data = {"level_category_id_1":  $(this).children(":selected").attr('level_category_id_1'), 
                            "departmentid":  $(this).children(":selected").attr('categoryid')};




                            
console.log(level_1_data)
//************************************************************************/
//ENVIO LOS DATOS PARA TRAERME INFORMACION DE LEVEL 2
//***********************************************************************/

$.ajax({

    type: 'POST',
    url: url+'Ticket_Controller/get_category_level_2',
    data: level_1_data,
    success: function(resp_level_2){

        //*******************************************************/
        //ME TRAIGO DETALLES DEL LEVEL 2
        //*******************************************************/
        var level_2 = JSON.parse(resp_level_2),
            option_level_2 = $("#level_2");

            console.log(level_2)
                
        $.each(level_2, function(i, item){
            
        option_level_2.append('<option class="level_2_class" categoryid = '+item.departmentid+'  level_category_id_1 = '+item.level_category_id_1 + ' level_category_id_2 = ' + item.level_category_id_2 + ' >' + item.level_2 + '</option>')

   
        });

        
//************************************************************************/
//AL SELECCIONAR POR SEGUNDA VEZ EL INPUT SE SETEA LOS CAMPOS DE LEVELS
//***********************************************************************/
$('#level_1').bind("click", function () {

    
    $("#level_2").html();

//SE SETEA EL LEVEL 3
var input_option = $("#level_3");

option_level_2.html("");
input_option.html("");

});


//************************************************************************/
//ENVIO LOS DATOS PARA TRAERME INFORMACION DE LEVEL 3
//***********************************************************************/

$('.level_2_class').click(function () {



var level_2_data = {"level_category_id_1": $(this).attr('level_category_id_1'),
                    "level_category_id_2": $(this).attr('level_category_id_2'),
                    "categoryid":          $(this).attr('categoryid')};

                
                
            
$.ajax({

    type: 'POST',
    url: url+'Ticket_Controller/get_category_level_3',
    data: level_2_data,
    success: function(resp_level_3){


    
    var level_3 = JSON.parse(resp_level_3),
    option_level_3 = $("#level_3");

    $.each(level_3, function(i, item){

    option_level_3.append('<option class="level_3_class" categoryid = '+item.categoryid+'  level_category_id_1 = '+item.level_category_id_1+' level_category_id_2 = '+item.level_category_id_2+' level_category_id_3 = '+item.level_category_id_3+'>'+item.level_3+'</option>');

    

                })


//************************************************************************/
//AL SELECCIONAR POR SEGUNDA VEZ EL INPUT SE SETEA LOS CAMPOS DE LEVELS
//***********************************************************************/
        $('#level_2').click(function () {

        option_level_3.html("");

                        });

            }
        
        })

    });




return false;
}

});







});



    

}
});



})

}



//************************************************************************/
//CAPTURAMOS TODA LA INFORMACIÓN DEL FORMULARIO Y LA ENVIAMOS AL CONTROLADOR
//***********************************************************************/

function saveInformationTicket(){

    

    $('#saveNewTicket').click(function(){

//****************************************/
//  VALIDAMOS QUE LOS CAMPOS REQUERIDOS
//  ESTEN LLENOS
//***************************************/

if ( $("#input_description").val()== null     || 
     $("#select_category_input").val()== 0    ||
     $("#level_1").val() == null              ||
     $("#level_2").val() == null) {

    console.log("falso");
    console.log($("#level_1").val());
    

    return false;
    
}else{

    

    var form = new FormData();
    var image = $('#file')[0].files;



if (image.length > 0) { 

    form.append('file',image[0]);
}

   
    form.append("ticketid",  $("#ticketid").val())
    form.append("description",  $("#input_description").val())
    form.append("user_id",   $("#user_id").val())
    form.append("input_description",   $("#input_description").val())
    form.append("departmentid", $("#select_category_input").children(":selected").attr('categoryValue'))
    form.append("status",    $("#select_option_status").val())
    form.append("priority",  $("#select_option_urgency").val())
    form.append("level_category_id_1",   $("#level_1").children(":selected").attr('level_category_id_1'))
    form.append("level_category_id_2",   $("#level_2").children(":selected").attr('level_category_id_2'))
   

    $.ajax({
        url: url+'Ticket_Controller/saveInformationTicket',
        type: 'post',
        data: form,
        contentType: false,
        processData: false,
        success: function(response){

            alertify.notify('Ticket enviado!!!', 'success', 1, function () {
 
             
              window.location = "myticket";
        

                 });

         
        },
     });

    

       

         }
       
    })
    
  
}



$("#findTicket").click(function () {
    


    window.location = "ticketbox";

    })

});

