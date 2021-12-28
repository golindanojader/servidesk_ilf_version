$(document).ready(function(){

	var url = $(".url").val();
	saveDescrionCategory();
	deleteDescripctionCategory();
	uptdateDescripctionCategory();



// **********************************************************Ç
// GUARDAR SUBCATEGORIA
// **********************************************************
function saveDescrionCategory(){

		$(".btn-save_desciption").click(function(){

			if ($('.intput_description').val()!="") {
				
		

				var description = {'level_category_id_1': $('.level_category_id_1').val(),
								   'level_2'			: $('.input_description').val(),
								   'departmentid'		: $('.departmentid').val()}

									console.log(description)
							$.ajax({
									type: 'POST',
									url: url+'Department_Controller/saveLevel_2',
									data:  description,
									success: function(resp){
										
										console.log(resp)

										window.location = "getInformationLevel_2?level_category_id_1="+$('.level_category_id_1').val()+"&departmentid="+$('.departmentid').val();
								
								
						}
							   
				 })
						
				}
		});

	


}


function deleteDescripctionCategory(){


	$(".delete_level_2").click(function(){

		
		var level_category_id_2 = {'level_category_id_2':  $(this).attr('level_category_id_2')}


		$.ajax({
			type: 'POST',
			url: url+'Department_Controller/deleteLevel_2',
			data:  level_category_id_2,
			success: function(resp){
				
				console.log(resp)

				window.location = "getInformationLevel_2?level_category_id_1="+$('.level_category_id_1').val();
		
		
			}
	   
		  })

	})

}


function uptdateDescripctionCategory() {

	$('.level_2k').bind("click", function () {

				var level_2_description  = $(this).attr("level_2"),
				    level_category_id_2 = $(this).attr("level_category_id_2"),
				    level_2 = $(this).attr("level_category_id_2");


		   
					$.jAlert({
						'title': $('.level_1_title').attr('level_1_title'),
						'content': '<div class="col-12"> <div class="card card-info card-outline"><div class="card-header"><h3 class="card-title"></h3> <span class="badge  ml-2 ml-1 mt-0"></span><div class="card-tools"></div> </div> <!-- /.card-header --> <div class="card-body p-0"> <div class="mailbox-read-info mt-0"><input type="text" class="form-control" id = "idlevel" value = "'+level_2_description+'" disabled> </div></p> <h5><b class="text-muted"></b></h5><p></p><p></p> </div> <!-- /.mailbox-read-info --> <div class="mailbox-controls with-border text-center"> <div class="btn-group"> <button class="btn btn-default eye_button"><i class="fa fa-eye"></i></button></button></div> <!-- /.mailbox-controls --> <div class="mailbox-read-message" style="text-align: justify;"> <!-- /.mailbox-read-message --> </div> <!-- /.card-body -->  <!-- /.card --> </div> <div class="text-center"></div> ',
						'theme': 'blue',
						'closeOnClick': false ,
						'size': {'height':'auto', 'width':'40%'},
					 });
					       
			
					///////////////////////////////////////////////////////////////////////////////// 
					///////////////////////////////////////////////////////////////////////////////// 
					///////////////////////////////////////////////////////////////////////////////// 
					///////////////////////////////////////////////////////////////////////////////// 
						$('.eye_button').click(function () {

							
								var enabled = { "level_category_id_2": level_category_id_2 }  

						
								   $.ajax({
									type: 'POST',
									url: url+'Department_Controller/enabledLevel_category_2',
									data:  enabled,
									success: function(resp){
										
									
										 window.location = "getInformationLevel_2?level_category_id_1="+$('.level_category_id_1').val()+"&departmentid="+$('.departmentid').val();
					
			
									}
								  
								  })

						 	})
							 
		
				 })



		}



})