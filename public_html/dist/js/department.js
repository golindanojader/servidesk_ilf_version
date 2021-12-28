$(document).ready(function(){



var url = $(".url").val();
departmentListView();
catchDepartment(); //capturo el dapartamento para asignar categorias y subcategorias
updateDepartment();



$("#createNewDepartment").click(function(){


		$("#departmentName").prop("disabled",false);
		$("#departmentId").prop("disabled",false);
		$("#departmentId").prop("disabled",false);
		$("#saveNewDepartment").prop("disabled",false);

})



$("#cancelDepartment").click(function(){


		$("#departmentName").prop("disabled",true);
		$("#departmentId").prop("disabled",true);
		$("#saveNewDepartment").prop("disabled",true);

})


$("#saveNewDepartment").click(function(){

	// """"""""""""""""""""""""""""""""""""""""""""""
	// VALIDAMOS QUE NO EXISTA EL DEPARTAMENTO
	// """"""""""""""""""""""""""""""""""""""""""""""
	
	var value  = $.trim($("#departmentName").val()) //ELIMINA LOS ESPACIOS EN BLANCO DE INCIO Y FINAL
	    

	        department = {"department": value} //VARIABLE FINAL PARA EL ENVIO DE DATOS AL CONTROLADOR


	        var value2     =  value.replace(/ /g,''), //ELIMINA TODOS LOS ESPACIOS EN BLANCO
	            validate   = {"department": value2}
			
				
	   	
				$.ajax({	

				type: 'POST',
				url: url+'Department_Controller/FindDepartment',
				data: validate,
				success: function(resp){

					console.log(resp)

				if (resp == "false") {


								$.ajax({	

									type: 'POST',
									url: url+'Department_Controller/CreateNewDepartment',
									data: department,
									success: function(resp){

									
										
											    alertify.notify('Departamento creado', 'success', 1, function () {

					                            window.location = "department";
					        

					                   		 });


										}


								});

								return false;
				

						}


						alertify.notify('Este departamento ya se encuentra creado', 'error', function () {

					                
					        

				           });

						return false;


				}


			});
			



	
			// $.ajax({	

			// 	type: 'POST',
			// 	url: url+'Department_Controller/FindDepartment',
			// 	data: department,
			// 	success: function(resp){


			// 			if (resp == "null") {

			// 					$.ajax({	

			// 						type: 'POST',
			// 						url: url+'Department_Controller/CreateNewDepartment',
			// 						data: department,
			// 						success: function(resp){

									
										
			// 								    alertify.notify('Departamento creado', 'success', 1, function () {

			// 		                            window.location = "department";
					        

			// 		                   		 });


			// 							}

										


			// 					});

							

			// 			}else{


			// 					alertify.notify('Este departamento ya se encuentra creado', 'error', function () {

					                
					        

			// 		           });



			// 			}
				
				
			// 		}

			// });
			 







	})











function departmentListView(){



		$(document).ready(function () {

		    $(function () {

		        $("#departmentBox").DataTable({
		          "responsive": true, "lengthChange": false, "autoWidth": false,
		          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		        }).buttons().container().appendTo('#ticketsBox_wrapper .col-md-6:eq(0)');
		      });


		})



	}



	function catchDepartment(){


		$('#departmentBox td').click(function(){


			 var currentRow      = $(this).closest("tr"),
              	 departmentRow      = currentRow.find("td:eq(0)").text() //DEPARTAMENTO
			
              	 var department = {'department':departmentRow}


              	 	$.ajax({	

					type: 'POST',
					url: url+'pages/departmentCategories',
					data: department,
					success: function(resp){

	                           
							console.log(resp)

	                   		 }

              	 	 });


			   


		})



	}


	function updateDepartment() {
		

		$(".sendData").submit(function(e) {

		

			e.preventDefault();

				
				$.ajax({	

					type: 'POST',
					url: url+'Department_Controller/updateDepartment',
					data: $(this).serialize(),
					success: function(resp){

							// window.location = "adjust";


	                   		 }

              	 	 });
			

			})


			$(".delete").click(function () {

				var data = {
					"departmentid":$(this).attr("delete"),
					"enabled":0
				}
	 	   
				$.jAlert({
					'title': "Borrar",
					'content': '<div class="container"><div class="row"><div class="col-12 text-center"><h5>¿Deseas borrar este departamento?</h5></div><div class="col-12 mt-2 text-center"><h5>'+$(this).attr("departmentName")+'</h5></div></div></div>',
			'theme':'blue',
					'closeOnClick': true,
			'size': {'height':'auto', 'width':'40%'}, 'theme':'blue', 'btns': {'text':'Borrar departamento', 'theme': 'blue', 'onClick': function(e, btn){



						$.ajax({	

							type: 'POST',
							url: url+'Department_Controller/deleteDepartment',
							data: data,
							success: function(resp){

									window.location = "adjust";


									}

							});


			}
		
		}
	})
			  

			
				
			


				
			})

		
		
	}



})

