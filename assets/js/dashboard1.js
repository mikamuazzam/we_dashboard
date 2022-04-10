
$(function() {

	
	 //chart WE
	 $.ajax({
		url : base_url+"/dashboard/chart_web_we",
		type : "GET",
		success : function(data){
			data = JSON.parse(data);
            const labeldt = [];
            const we_dt= [];
            for (var dt of data) {
                var tanggal_rank = dt.tgl;
                labeldt.push(tanggal_rank)

                var get_we= parseInt(dt.we) || 0;
                we_dt.push(get_we)

            }
		  	var chartdata = {
			labels: labeldt,
			datasets: [
				
			  	{
				label: "we",
				backgroundColor: 
					'rgba(149, 10, 9, 0.9)'
					,
					borderColor: 
					'rgba(148, 1, 25, 0.88)'
					,
					borderWidth: 1,
				data: we_dt
			  	}
			  
			]
		  };
	
		  var ctx = document.getElementById("myChartWE").getContext("2d");
		  
		  var LineGraph = new Chart(ctx, {
			type: 'line',
			data: chartdata,
			options: {
				scales: {
					yAxes: [{
					  ticks: {
						stepSize: 1,
						beginAtZero: true
					  },
					}],
				  },
			}
		  });
		},
		error : function(data) {
	
		}
	  }); 


	   //chart HS
	 $.ajax({
		url : base_url+"/dashboard/chart_web_hs",
		type : "GET",
		success : function(data){
			data = JSON.parse(data);
            const labeldt = [];
            const hs_dt= [];
            for (var dt of data) {
                var tanggal_rank = dt.tgl;
                labeldt.push(tanggal_rank)

                var get_hs= parseInt(dt.hs) || 0;
                hs_dt.push(get_hs)

            }
		  	var chartdata = {
			labels: labeldt,
			datasets: [
				
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
	
		  var ctx = document.getElementById("myChartHS").getContext("2d");
		  
		  var LineGraph = new Chart(ctx, {
			type: 'line',
			data: chartdata,
			options: {
				scales: {
					yAxes: [{
					  ticks: {
						stepSize: 1,
						beginAtZero: true
					  },
					}],
				  },
			}
		  });
		},
		error : function(data) {
	
		}
	  }); 

	  //chart Populis
	 $.ajax({
		url : base_url+"/dashboard/chart_web_populis",
		type : "GET",
		success : function(data){
			data = JSON.parse(data);
            const labeldt = [];
            const populis_dt= [];
            for (var dt of data) {
                var tanggal_rank = dt.tgl;
                labeldt.push(tanggal_rank)

                var get_populis= parseInt(dt.populis) || 0;
                populis_dt.push(get_populis)

            }
		  	var chartdata = {
			labels: labeldt,
			datasets: [
				
			  	{
				label: "Populis",
				backgroundColor: 
					'rgba(29, 208, 81, 0.7)'
					,
					borderColor: 
					'rgba(36, 135, 58, 0.71)'
					,
					borderWidth: 1,
				data: populis_dt
			  	}
			  
			]
		  };
	
		  var ctx = document.getElementById("myChartPop").getContext("2d");
		  
		  var LineGraph = new Chart(ctx, {
			type: 'line',
			data: chartdata,
			options: {
				scales: {
					yAxes: [{
					  ticks: {
						stepSize: 1,
						beginAtZero: true
					  },
					}],
				  },
			}
		  });
		},
		error : function(data) {
	
		}
	  }); 

	   //chart TV
	 $.ajax({
		url : base_url+"/dashboard/chart_web_tv",
		type : "GET",
		success : function(data){
			data = JSON.parse(data);
            const labeldt = [];
            const tv_dt= [];
            for (var dt of data) {
                var tanggal_rank = dt.tgl;
                labeldt.push(tanggal_rank)

                var get_tv= parseInt(dt.tv) || 0;
                tv_dt.push(get_tv)

            }
		  	var chartdata = {
			labels: labeldt,
			datasets: [
				
			  	{
				label: "WE TV",
				backgroundColor: 
					'rgba(29, 208, 81, 0.7)'
					,
					borderColor: 
					'rgba(36, 135, 58, 0.71)'
					,
					borderWidth: 1,
				data: tv_dt
			  	}
			  
			]
		  };
	
		  var ctx = document.getElementById("myChartTV").getContext("2d");
		  
		  var LineGraph = new Chart(ctx, {
			type: 'line',
			data: chartdata,
			options: {
				scales: {
					yAxes: [{
					  ticks: {
						stepSize: 1000,
						beginAtZero: true
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