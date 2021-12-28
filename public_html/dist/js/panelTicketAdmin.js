$(document).ready(function(){
var url = $(".url").val();

    

   
getTickets();


      function getTickets() {

        var status = {"status":1} 

        $.ajax({

          tyspe: 'POST',
          url:url + 'Ticket_Controller/getTicketStatus_1',
          success: function(resp){

            var data = JSON.parse(resp),
                dataTable = $('#ticketTableInfo');


            // dataTable.append('<tr class="text-muted tr"></tr>')

            $.each(data, function(i, item){


              if (item.priority == 10 ) {

                var priority = "Baja",
                    color    = "badge-info";
              }

                 if (item.priority == 20 ) {

                var priority = "Media",
                    color    = "badge-warning";
              }

                    if (item.priority == 30 ) {

                var priority = "Alta",
                    color    = "badge-danger";
              }
              // """"""""""""""""""""""""""""""""""""""""""""""""""""""

 
   
              dataTable.append('<tr class="text-muted ticketnum" id="row" row><td ticketid ='+item.ticketid+' image = '+item.image+' created dataInfo='+item.ticketnum+'>'+item.ticketnum+'</td><b>  <td username ='+item.username+' name='+item.name+' lastname='+item.lastname+'> </b>'+item.username+'</td><td   created>'+item.department+'</td><td>'+item.level_1+'</td><td style="display:none">'+item.description+'</td><td style="display:none">'+item.created+'</td> <td style="display:none">'+item.level_2+'</td> <td class="project-state"> <span class="badge '+color+'" color='+color+'>'+priority+'</span> </td><td class="project-state"> <span class="badge badge-warning">Pendiente</span> <span class="badge badge-warning" style="display:none"  color='+color+'>'+color+'</span></td>'); 
            
            
            
            });


   
     
          
        $('#ticketTableInfo td').click( function(){
        
          var currentRow      = $(this).closest("tr"),
              ticketNum       = currentRow.find("td:eq(0)").text(), //NUMERO DE TICKET
              user            = currentRow.find("td:eq(1)").text(), //USUARIO
              name            = currentRow.find("td:eq(1)").attr('name'), //NOMBRE
              lastname        = currentRow.find("td:eq(1)").attr('lastname'), //NOMBRE
              category        = currentRow.find("td:eq(2)").text(), //CATEGORIA
              level_1         = currentRow.find("td:eq(3)").text(), //LEVEL_1
              description     = currentRow.find("td:eq(4)").text();  //DESCRIPCION
              created         = currentRow.find("td:eq(5)").text();  //FECHA DE CREACIÓN
              level_2         = currentRow.find("td:eq(6)").text();  //level_2
              priority        = currentRow.find("td:eq(7)").text();
              color           = currentRow.find("td:eq(8)").text();
              image           = currentRow.find("td:eq(0)").attr('image');
              ticketid        = currentRow.find("td:eq(0)").attr('ticketid');
          
              
            
           console.log(image);
           
              switch (image) {
                case null:
                  view = '"style= "display:none"';
                  break;
              
                default:

                  view = 'style= "display:"';
                  break;
              }
     
                   
          if (ticketNum!=null ) {
           
            
            var docu = "public_html/dist/img/img/"+image;

    

                alertify.confirm('<div class="col-12"> <div class="card card-info card-outline"><div class="card-header"><h3 class="card-title">Ticket Num.: <b class="text-muted">'+ticketNum+'</b></h3> <span class="badge '+color+' ml-2 ml-1 mt-0">'+priority+'</span><span class="badge badge-warning ml-2">Pendiente</span><div class="card-tools"></div> </div> <!-- /.card-header --> <div class="card-body p-0"> <div class="mailbox-read-info mt-0"><p>Para: '+category+'</p><p>De: '+name+' '+lastname+'<span class="mailbox-read-time float-right">'+created+'</span></p> <h5><b class="text-muted">'+level_1+'</b></h5><p>'+level_2+'</p><p>'+description+'</p><div '+view+'><a  href='+docu+' download '+view+'><button class="btn btn-default btn-sm" '+view+'> <i class="fa fa-download" '+view+'></i>'+image+'</button></a></div> <!-- /.mailbox-read-info --> <!-- /.mailbox-controls --> <div class="mailbox-read-message" style="text-align: justify;"><textarea class="form-control textMessage" rows="3" placeholder="Mensaje adicional"></textarea> </div> <!-- /.mailbox-read-message --> </div> <!-- /.card-body --> <div class="card-footer bg-white"> <ul class="mailbox-attachments d-flex align-items-stretch clearfix"></i></span>  <!-- /.card-footer --> </div> <!-- /.card --> </div> <div class="text-center"><h6>¿Desea procesar este ticket?</h6></div>  ' , function(){
                  var dataTicket = {"ticketnum":ticketNum,
                                    "ticketid":ticketid,
                                    "status": 3,
                                    "message": $('.textMessage').val()} 
           

                      $.ajax({
                        type: 'POST',
                        url: url+'Ticket_Controller/changeStatusTicket',
                        data:  dataTicket,
                        success: function(resp){

                          alertify.notify('Ticket Cerrado exitosamente', 'success', 1, function () {

                            window.location = "adminPanel";
        

                           });

                        }
                      
                      })

                  })

            
                   }else{

                return false
           }

              



       
       
        
           })
            
          }
 
        
        })
   
      }




      // $('.tr').click(function(){

      //   console.log("ok")

    // var currentRow = $(this).closest("tr"),
    //   //--------------------------------------------------------------- 
    //     ticketNum = currentRow.find("td:eq(0)").text();
    //          created = currentRow.find("td:eq(0)").attr('created');
    //   //--------------------------------------------------------------- 

    //    //--------------------------------------------------------------- 
    //     user = currentRow.find("td:eq(1)").text();
    //    //--------------------------------------------------------------- 

    //     //--------------------------------------------------------------- 
    //     category = currentRow.find("td:eq(2)").text();
    //     //--------------------------------------------------------------- 

    //     //--------------------------------------------------------------- 
    //     subcategory = currentRow.find("td:eq(3)").text();
    //     //--------------------------------------------------------------- 

    //      //--------------------------------------------------------------- 
    //     description = currentRow.find("td:eq(4)").text();
    //      //--------------------------------------------------------------- 
       
    //      alertify.confirm('<div class="container-fluid"><div class="mt-1" style="font-size:15px"><b>Ticket Num.:</b> '+ticketNum+  
    //                            ''+'<b>dfdDescripción: </b>'+description+
    //                            ''+'<b>Categoría: </b>'+category+
    //                            ''+'<b>Sub-Categoría: </b>'+subcategory+
    //                            ''+'<b>Usuario: </b>'+ user+
    //                            ''+'<b>Creado: </b>'+created +'</div></div><div class="row mt-5 justify-content-center"><h4>¿Desea Finalizar este ticket?</h4></div>' , function(){

    //                              var dataTicket = {"ticketnum":ticketNum,
    //                                                "status": 1} 

    //                             $.ajax({
    //                               type: 'POST',
    //                               url: url+'Ticket_Controller/changeStatusTicket',
    //                               data:  dataTicket,
    //                               success: function(resp){

    //                               }
                                
    //                             })

    //                       });

      

  // $.jAlert({
 

	// 	          'title': 'Bandeja de entrada',
	// 	          'content':'<div><b>Ticket Num.:</b> '+ticketNum+  
  //                       ''+'<b>Descripción: </b>'+description+
  //                       ''+'<b>Categoría: </b>'+category+
  //                       ''+'<b>Sub-Categoría: </b>'+subcategory+
  //                       ''+'<b>Usuario: </b>'+ user+
  //                       ''+'<b>Creado: </b>'+created +'</div>',
  //             'size': {'height':'300px', 'width':'600px'},
  //             'theme':'blue',
	// 	          'closeOnClick': false,

              
              

	//            });

     




            // console.log($('.ticketnum').children(":selected").attr('ticketnum'))
// var item = $(this).closest("td").find("ticketnum").text();



//  var row = $(this).closest('td')
     




          
      // });





})