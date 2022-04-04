
$(function() {
    $.ajax({
		url : base_url+"/dashboard/chart_web",
		type : "GET",
		success : function(data){
			data = JSON.parse(data);
           
            const labeldt = [];
            const we_dt= [];
			const populis_dt= [];
			const hs_dt= [];
			const tc_dt= [];
        
            for (var dt of data) {
                var tanggal_rank = dt.tgl;
                labeldt.push(tanggal_rank)

                var get_we= parseInt(dt.we) || 0;
                we_dt.push(get_we)

				var get_hs= parseInt(dt.hs) || 0;
                hs_dt.push(get_hs)

				var get_populis= parseInt(dt.populis) || 0;
                populis_dt.push(get_populis)

				var get_tc= parseInt(dt.topcore) || 0;
                tc_dt.push(get_tc)
 
            }

		  
		  var chartdata = {
			labels: labeldt,
			
			datasets: [
			  {
				label: "we",
				backgroundColor: 
					'rgba(137, 3, 30, 0.5)'
					,
					borderColor: 
					'rgba(148, 1, 25, 0.88)'
					,
					borderWidth: 1,
				data: we_dt
			  },
			  {
				label: "populis",
				backgroundColor: 
					'rgba(29, 208, 81, 0.7)'
					,
					borderColor: 
					'rgba(36, 135, 58, 0.71)'
					,
					borderWidth: 1,
				data: populis_dt
			  },
			  {
				label: "HS",
				backgroundColor: 
					'rgba(230, 141, 141, 0.7)'
					
					,
					borderColor: 
					'rgba(238, 126, 145, 0.41)',
					borderWidth: 1,
				data: hs_dt
			  }
			  
			]
		  };
	
		  var ctx = document.getElementById("myChart").getContext("2d");
		  
		  var LineGraph = new Chart(ctx, {
			type: 'line',
			
			data: chartdata,
			options: {
				scales: {
					yAxes: [{
					  ticks: {
						stepSize: 1,
						beginAtZero: false,
					  },
					}],
				  },
			}
		  });
		},
		error : function(data) {
	
		}
	  });
	
	  
	
});