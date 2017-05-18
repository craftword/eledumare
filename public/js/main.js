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
	$( '#delete' ).on( 'submit', function(e) {
		e.preventDefault(); 
	   confirm("Are you sure, do you really want to delete Image?");
	});





});