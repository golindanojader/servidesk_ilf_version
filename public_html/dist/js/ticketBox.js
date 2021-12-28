$(document).ready(function () {



    $(function () {

        $("#ticketsBox").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": []
        }).buttons().container().appendTo('#ticketsBox_wrapper .col-md-6:eq(0)');
      });
  


   
     


});