<script type="text/javascript">
    $(document).ready(function () {
      $.get(top_url+"Index/graphMhsLulus", function(data, status){
        var mhs_lulus=[];
        var data_angkatan;
        for (var i = 0; i < data.length; i++) {
    			data_angkatan=data;
          mhs_lulus.push(data_angkatan);
    		}
        console.log(data);
    		// var lineChartData = {
    		// 		labels : entry,
    		// 		datasets : [
    		// 			{
    		// 				label: "Data Lampu",
    		// 				fillColor : "rgba(48, 164, 255, 0.2)",
    		// 				strokeColor : "rgba(48, 164, 255, 1)",
    		// 				pointColor : "rgba(48, 164, 255, 1)",
    		// 				pointStrokeColor : "#fff",
    		// 				pointHighlightFill : "#fff",
    		// 				pointHighlightStroke : "rgba(48, 164, 255, 1)",
    		// 				data : chardata
        //       }
    		// 		]
    		// 	}
        //   var lineChartData2 = {
      	// 			labels : tanggal,
      	// 			datasets : [
        //         {
        // 					label: "Dibuat Tanggal",
        // 					fillColor : "rgba(220,220,220,0.2)",
        // 					strokeColor : "rgba(220,220,220,1)",
        // 					pointColor : "rgba(220,220,220,1)",
        // 					pointStrokeColor : "#fff",
        // 					pointHighlightFill : "#fff",
        // 					pointHighlightStroke : "rgba(220,220,220,1)",
        // 					data : chardata
        // 				}
      	// 			]
      	// 		}
    		// var temp = document.getElementById("line-chart").getContext("2d");
    		// var myLine = new Chart(temp).Line(lineChartData, {
    		// 	responsive: true
    		// });
      });
    });
</script>
