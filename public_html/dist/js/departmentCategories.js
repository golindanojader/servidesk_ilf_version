$(document).ready(function(){

  
	var url = $(".url").val();

     updateCategories();
     updateSubCategories();

$('#createNewCategory').click(function () {

    
	$.jAlert({
        'title': 'Nice Theme',
        'content': '<div class="col-12"> <div class="card card-info card-outline"><div class="card-header"><h3 class="card-title"></h3> <span class="badge  ml-2 ml-1 mt-0"></span><div class="card-tools"></div> </div> <!-- /.card-header --> <div class="card-body p-0"> <div class="mailbox-read-info mt-0"><input type="text" class="form-control" id = "categorie" > </div></p> <h5><b class="text-muted"></b></h5><p></p><p></p> </div> <!-- /.mailbox-read-info --> <div class="mailbox-controls with-border text-center"> <div class="btn-group"> <button class="btn btn-default save_button"><i class="fa fa-save"></i></button></div> <!-- /.mailbox-controls --> <div class="mailbox-read-message" style="text-align: justify;"> <!-- /.mailbox-read-message --> </div> <!-- /.card-body --> <div class="card-footer bg-white"> <ul class="mailbox-attachments d-flex align-items-stretch clearfix"></i></span>  <!-- /.card-footer --> </div> <!-- /.card --> </div> <div class="text-center"></div> ',
        'theme': 'blue',
        'closeOnClick': false ,
        'size': {'height':'auto', 'width':'40%'},
     });


     $('.save_button').click(function () {


      var data = {"departmentid":$('.departmentid').val(),
                  "level_1":$('#categorie').val()}
       


        $.ajax({
            type: 'POST',
            url: url+'Department_Controller/saveLevel_1',
            data: data,
            success: function(resp){

              console.log(resp)
             

                 window.location = $('.departmentid').val();


             

            }
          
          })

        
         
     })


})


function updateCategories(){


     $(".sendDataCategories").submit(function(e) {

          e.preventDefault();

              
              $.ajax({	

                   type: 'POST',
                   url: url+'Department_Controller/updateCategorie',
                   data: $(this).serialize(),
                   success: function(resp){

                    console.log(resp)
                         
                    
                    // window.location = "adjust";


                                  }

                        });
         

         })



      $(".deleteCategorie").click(function () {

    

          var data = {
               "level_category_id_1":$(this).attr("level_category_id_1"),
               "enabled":0
          }




          $.jAlert({
               'title': "Borrar",
               'content': '<div class="container"><div class="row"><div class="col-12 text-center"><h5>¿Deseas borrar esta categoría?</h5></div><div class="col-12 mt-2 text-center"><h5>'+$(this).attr("level_1")+'</h5></div></div></div>',
     'theme':'blue',
               'closeOnClick': true,
     'size': {'height':'auto', 'width':'40%'}, 'theme':'blue', 'btns': {'text':'Borrar categoría', 'theme': 'blue', 'onClick': function(e, btn){
          
    


          $.ajax({	

               type: 'POST',
               url: url+'Department_Controller/deleteCategorie',
               data: data,
               success: function(resp){

                    console.log(resp)
                          window.location = "adjust";


                         }

                });

               }
		
		}
	})
		



          
          
     })
   



}

function updateSubCategories(){


     $(".sendDataSubCategories2").submit(function(e) {

          e.preventDefault();

              
              $.ajax({	

                   type: 'POST',
                   url: url+'Department_Controller/updateSubCategories',
                   data: $(this).serialize(),
                   success: function(resp){

                    console.log(resp)
                         
                    
                    // window.location = "adjust";


                                  }

                        });
         

         })



         $(".deleteSubCategorie").click(function () {

    

          var data = {
               "level_category_id_2":$(this).attr("level_category_id_2"),
               "enabled":0
          }


          $.jAlert({
               'title': "Borrar",
               'content': '<div class="container"><div class="row"><div class="col-12 text-center"><h5>¿Deseas borrar esta subcategoría?</h5></div><div class="col-12 mt-2 text-center"><h5>'+$(this).attr("level_2")+'</h5></div></div></div>',
               'theme':'blue',
                         'closeOnClick': true,
               'size': {'height':'auto', 'width':'40%'}, 'theme':'blue', 'btns': {'text':'Borrar subcategoría', 'theme': 'blue', 'onClick': function(e, btn){


          $.ajax({	

               type: 'POST',
               url: url+'Department_Controller/deleteSubCategorie',
               data: data,
               success: function(resp){

                    console.log(resp)
                          window.location = "adjust";


                         }

                });


               }
		
		}
	})
		      
          
          
     })




}
 

})