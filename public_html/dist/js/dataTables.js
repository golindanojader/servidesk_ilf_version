$(document).ready(function () {



    $(function () {

        $("#dataTableUsers").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#ticketsBox_wrapper .col-md-6:eq(0)');
      });
  


      
    $(function () {

        $("#dataTableDepartments").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#ticketsBox_wrapper .col-md-6:eq(0)');
      });


      $(function () {

        $("#dataTablelevel_1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#ticketsBox_wrapper .col-md-6:eq(0)');
      });
   

      $(function () {

        $("#dataTablelevel_2").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#ticketsBox_wrapper .col-md-6:eq(0)');
      });
      
     

});