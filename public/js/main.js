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

// get data for morris chart views
$.ajax({
         type:'GET',
         url:'/morrisView',
         success:function(data){
          var morrisViews = JSON.stringify(data.morrisViews);
          var morrisLikes = JSON.stringify(data.morrisLikes);
         // Line Chart
             Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'morris-area-chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: morrisViews,
            // The name of the data record attribute that contains x-visitss.
            xkey: 'title',
            // A list of names of data record attributes that contain y-visitss.
            ykeys: ['views'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Visits'],
            // Disables line smoothing
            smooth: false,
            resize: true
            });



     }});

 



});