<script type="text/javascript">
    $(document).ready(function () {
      $.get(top_url+"Index/graphMhs", function(data, status){
        var obj = JSON.parse(data);
        var tahun_arr=[];
        var tahun=2016;
        for (var i = 0; i < obj['data_masuk'].length; i++) {
            tahun_arr.push(tahun--);
        }

        var tahun_2=2008;
        var tahun_arr_2=[];
        for (var i = 0; i < obj['data_keluar'].length; i++) {
          tahun_arr_2.push(tahun_2++);
        }
        var lineChartData = {
    				labels : tahun_arr,
    				datasets : [
    					{
    						label: "Mahasiswa Masuk",
    						fillColor : "rgba(48, 164, 255, 0.2)",
    						strokeColor : "rgba(48, 164, 255, 1)",
    						pointColor : "rgba(48, 164, 255, 1)",
    						pointStrokeColor : "#fff",
    						pointHighlightFill : "#fff",
    						pointHighlightStroke : "rgba(48, 164, 255, 1)",
    						data : obj['data_masuk']
              },
              {
                label: "Mahasiswa Lulus",
                fillColor : "rgba(249,44,44,0.2)",
      					strokeColor : "rgba(100,150,220,1)",
      					pointColor : "rgba(249,44,44,220,1)",
      					pointStrokeColor : "#fff",
      					pointHighlightFill : "#fff",
      					pointHighlightStroke : "rgba(220,220,220,1)",
      					data : obj['data_keluar']
              }
    				]
    			}
    		var temp = document.getElementById("line-chart").getContext("2d");
    		var myLine = new Chart(temp).Line(lineChartData, {
    			responsive: true
    		});

        var temp1 = document.getElementById("line-chart2").getContext("2d");
    		var myLine1 = new Chart(temp1).Line(lineChartData, {
    			responsive: true
    		});
      });
    });
</script>
