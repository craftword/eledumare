// for data tables
$(function () {

    $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
     });
      

	// submit form for Image upload
	/*$( '#form' ).on( 'submit', function(e) {
	    e.preventDefault(); 
	    $.ajax({
	        type: "POST",
	        url:'/addImage',
	        data: $(this).serialize(),
	        success: function( msg ) {
	        alert( msg );
	        }
	    });
	});*/






});