// for data tables
$(document).ready(function() {

    $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
     });
      

	

	// notification for delete button
	$(':submit').click(function(event){
     if(!confirm("Are you sure you want to delete this Image")){
        event.preventDefault();
      }
    });





});