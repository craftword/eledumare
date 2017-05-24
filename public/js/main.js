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
            
              
      // Bar Chart
            Morris.Bar({
                element: 'morris-bar-chart',
                data: [data.morrisViews[0], data.morrisViews[1], data.morrisViews[2], data.morrisViews[3], data.morrisViews[4], data.morrisViews[5]],
                xkey: 'title',
                ykeys: ['views'],
                labels: ['Views'],
                barRatio: 0.4,
                xLabelAngle: 35,
                hideHover: 'auto',
                resize: true
            });
            }

        });  
 



});