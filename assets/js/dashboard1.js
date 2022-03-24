
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
                var tanggal_rank = dt.tanggal;
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
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(148, 1, 25, 0.88)',
					'rgba(54, 162, 235, 1)',
					'rgba(148, 1, 25, 0.88)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(148, 1, 25, 0.88)'
					],
					borderWidth: 1,
				data: we_dt
			  },
			  {
				label: "populis",
				backgroundColor: [
					'rgba(36, 135, 58, 0.22)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(36, 135, 58, 0.22)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(36, 135, 58, 0.22)'
					],
					borderColor: [
					'rgba(36, 135, 58, 0.71)',
					'rgba(54, 162, 235, 1)',
					'rgba(60, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(36, 135, 58, 0.71)'
					],
					borderWidth: 1,
				data: populis_dt
			  },
			  {
				label: "HS",
				backgroundColor: [
					'rgba(238, 126, 145, 0.23)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(238, 126, 145, 0.23)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(238, 126, 145, 0.23)'
					],
					borderColor: [
					'rgba(238, 126, 145, 0.41)',
					'rgba(54, 162, 235, 1)',
					'rgba(238, 126, 145, 0.41)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(238, 126, 145, 0.41)'
					],
					borderWidth: 1,
				data: hs_dt
			  }
			  
			]
		  };
	
		  var ctx = document.getElementById("myChart").getContext("2d");
	
		  var LineGraph = new Chart(ctx, {
			type: 'line',
			
			data: chartdata
		  });
		},
		error : function(data) {
	
		}
	  });
	
	  
	
});