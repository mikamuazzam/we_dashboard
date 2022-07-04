
$(function() {

	
	 //chart WE
	 $.ajax({
		data :{website:'we_nilai'},
		url : base_url+"dashboard/chart_web_we",
		type : "GET",
		success : function(data){
			data = JSON.parse(data);
            const labeldt = [];
            const we_dt= [];
            for (var dt of data) {
                var tanggal_rank = dt.tgl;
                labeldt.push(tanggal_rank)

                var get_we= parseInt(dt.nilai) || 0;
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
						  stepSize: 20,
						  beginAtZero: true,
						  max : 100,
						  min :-100
						},
					  }],
				  },
				  responsive: true,
				  maintainAspectRatio: false
			}
		  });
		},
		error : function(data) {
	
		}
	  }); 


	   //chart HS
	 $.ajax({
		data :{website:'hs_nilai'},
		url : base_url+"dashboard/chart_web_we",
		type : "GET",
		success : function(data){
			data = JSON.parse(data);
            const labeldt = [];
            const hs_dt= [];
            for (var dt of data) {
                var tanggal_rank = dt.tgl;
                labeldt.push(tanggal_rank)

                var get_hs= parseInt(dt.nilai) || 0;
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
						stepSize: 20,
						beginAtZero: true,
						max : 100,
						min :-100
					  },
					}],
				  },
				  responsive: true,
				  maintainAspectRatio: false
			}
		  });
		},
		error : function(data) {
	
		}
	  }); 

	  //chart Populis
	 $.ajax({
		data :{website:'populis_nilai'},
		url : base_url+"dashboard/chart_web_we",
		type : "GET",
		success : function(data){
			data = JSON.parse(data);
            const labeldt = [];
            const populis_dt= [];
            for (var dt of data) {
                var tanggal_rank = dt.tgl;
                labeldt.push(tanggal_rank)

                var get_populis= parseInt(dt.nilai) || 0;
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
						  stepSize: 20,
						  beginAtZero: true,
						  max : 100,
						  min :-100
						},
					  }],
				  },
				  responsive: true,
				  maintainAspectRatio: false
			}
		  });
		},
		error : function(data) {
	
		}
	  }); 

	   //chart Populis
	 $.ajax({
		data :{website:'konten_jatim_nilai'},
		url : base_url+"dashboard/chart_web_we",
		type : "GET",
		success : function(data){
			data = JSON.parse(data);
            const labeldt = [];
            const populis_dt= [];
            for (var dt of data) {
                var tanggal_rank = dt.tgl;
                labeldt.push(tanggal_rank)

                var get_populis= parseInt(dt.nilai) || 0;
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
	
		  var ctx = document.getElementById("myChartKJ").getContext("2d");
		  
		  var LineGraph = new Chart(ctx, {
			type: 'line',
			data: chartdata,
			options: {
				scales: {
					yAxes: [{
						ticks: {
						  stepSize: 20,
						  beginAtZero: true,
						  max : 100,
						  min :-100
						},
					  }],
				  },
				  responsive: true,
				  maintainAspectRatio: false
			}
		  });
		},
		error : function(data) {
	
		}
	  }); 

	   
	
});