
$(function() {
    
	
	
	  //chart 1
	  $.ajax({
		url : base_url+"/crm/chart_web_we",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			const val_warna=[];
            for (var dt of data) {
                var cb = dt.corebisnis;
                labeldt.push(cb)

                var get_val= parseInt(dt.pencapaian) || 0;
                val_dt.push(get_val)

				var get_warna = dt.warna;
                val_warna.push(get_warna)

				
            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Core Bisnis Target (%)",
					fill: false,
					backgroundColor: val_warna,
					data: val_dt,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				hover: {
					animationDuration: 1
				},
				scales: {
					yAxes: [{
						ticks: {
						stepSize: 20,
						beginAtZero: true,
						max:100
						},
					}],
					},
				animation: {
							duration: 1,
							onComplete: function () {
								var chartInstance = this.chart,
									ctx = chartInstance.ctx;
									ctx.textAlign = 'center';
									ctx.fillStyle = "rgba(0, 0, 0, 1)";
									ctx.textBaseline = 'bottom';
									// Loop through each data in the datasets
									this.data.datasets.forEach(function (dataset, i) {
										var meta = chartInstance.controller.getDatasetMeta(i);
										meta.data.forEach(function (bar, index) {
											var data = dataset.data[index];
											ctx.fillText(data, bar._model.x, bar._model.y - 5);
										});
									});
								}
							}
			};
			// Code to draw Chart
			var ctx = document.getElementById('compChartWE').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

	//chart core HS
	 //chart 2
	$.ajax({
		url : base_url+"crm/chart_web_hs",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			const val_warna=[];
            for (var dt of data) {
                var cb = dt.corebisnis;
                labeldt.push(cb)

                var get_val= parseInt(dt.pencapaian) || 0;
                val_dt.push(get_val)

				var get_warna = dt.warna;
                val_warna.push(get_warna)

				
            }
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Core Bisnis Target (%)",
					fill: false,
					backgroundColor: 
						
					val_warna,
					
					data: val_dt,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				hover: {
					animationDuration: 1
				},
				scales: {
					yAxes: [{
						ticks: {
						stepSize: 20,
						beginAtZero: true,
						max:200
						},
					}],
					},
				animation: {
							duration: 1,
							onComplete: function () {
								var chartInstance = this.chart,
									ctx = chartInstance.ctx;
									ctx.textAlign = 'center';
									ctx.fillStyle = "rgba(0, 0, 0, 1)";
									ctx.textBaseline = 'bottom';
									// Loop through each data in the datasets
									this.data.datasets.forEach(function (dataset, i) {
										var meta = chartInstance.controller.getDatasetMeta(i);
										meta.data.forEach(function (bar, index) {
											var data = dataset.data[index];
											ctx.fillText(data, bar._model.x, bar._model.y - 5);
										});
									});
								}
							}
			};
			// Code to draw Chart
			var ctx = document.getElementById('compChartHS').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
		}
	});

	//chart 3
	$.ajax({
		url : base_url+"/crm/chart_web_pop",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			const val_warna=[];
			
            for (var dt of data) {
                var cb = dt.corebisnis;
                labeldt.push(cb)

                var get_val= parseInt(dt.pencapaian) || 0;
                val_dt.push(get_val)

				var get_warna = dt.warna;
                val_warna.push(get_warna)

				
            }
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Core Bisnis Target (%)",
					fill: false,
					backgroundColor: 
						
						val_warna,
					
					data: val_dt,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				hover: {
					animationDuration: 1
				},
				
				scales: {
					yAxes: [{
						ticks: {
						stepSize: 100,
						beginAtZero: true,
						max:300
						},
					}],
					},
				
				animation: {
							duration: 1,
							onComplete: function () {
								var chartInstance = this.chart,
									ctx = chartInstance.ctx;
									ctx.textAlign = 'center';
									ctx.fillStyle = "rgba(0, 0, 0, 1)";
									ctx.textBaseline = 'bottom';
									// Loop through each data in the datasets
									this.data.datasets.forEach(function (dataset, i) {
										var meta = chartInstance.controller.getDatasetMeta(i);
										meta.data.forEach(function (bar, index) {
											var data = dataset.data[index];
											ctx.fillText(data, bar._model.x, bar._model.y - 5);
										});
									});
								}
							}
			};
			// Code to draw Chart
			var ctx = document.getElementById('compChartPOP').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});


//chart 3
$.ajax({
	url : base_url+"/crm/comp_list",
	type : "GET",
	success : function(data){
		data = JSON.parse(data);
	   
		const labeldt2 = [];
		const val_dt2= [];
	
	
		for (var dt of data) {
			var cb = dt.name;
			labeldt2.push(cb)

			var get_val= parseInt(dt.jumlah) || 0;
			val_dt2.push(get_val)

			
		}

  
  var myData = {
	labels:labeldt2,
	
	datasets: [{
		label: "Top Companies Revenue (Juta)",
		fill: false,
		backgroundColor: 'rgba(54, 162, 235, 0.8)',
			borderWidth: 1,
		data: val_dt2,
		
	}]
};
// Options define for display value on top of bars
var myoption = {
	tooltips: {
		enabled: true
	},
	hover: {
		animationDuration: 1
	},
	
	animation: {
	duration: 1,
	onComplete: function () {
		var chartInstance = this.chart,
			ctx = chartInstance.ctx;
			ctx.textAlign = 'center';
			ctx.fillStyle = "rgba(0, 0, 0, 1)";
			ctx.textBaseline = 'bottom';
			// Loop through each data in the datasets
			this.data.datasets.forEach(function (dataset, i) {
				var meta = chartInstance.controller.getDatasetMeta(i);
				meta.data.forEach(function (bar, index) {
					var data = dataset.data[index];
					ctx.fillText(data, bar._model.x, bar._model.y - 5);
				});
			});
		}
	}
};
// Code to draw Chart
var ctx = document.getElementById('topComp').getContext('2d');
var myChart = new Chart(ctx, {
	type: 'bar',        // Define chart type
	data: myData,    	// Chart data
	options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
});
}
});

//chart 2
$.ajax({
	url : base_url+"/crm/get_div",
	type : "GET",
	success : function(data){
		data = JSON.parse(data);
	   
		const labeldt2 = [];
		const val_dt2= [];
	
	
		for (var dt of data) {
			var cb = dt.divisi;
			labeldt2.push(cb)

			var get_val= dt.jum;
			val_dt2.push(get_val)

			
		}

  
  var myData = {
	labels:labeldt2,
	datasets: [{
		label: "Ads (%)",
		fill: false,
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
		data: val_dt2,
	}]
};
// Options define for display value on top of bars
var myoption = {
	tooltips: {
		enabled: true
	},
	hover: {
		animationDuration: 1
	},
	
	animation: {
	duration: 1,
	onComplete: function () {
		var chartInstance = this.chart,
			ctx = chartInstance.ctx;
			ctx.textAlign = 'center';
			ctx.fillStyle = "rgba(0, 0, 0, 1)";
			ctx.textBaseline = 'bottom';
			// Loop through each data in the datasets
			this.data.datasets.forEach(function (dataset, i) {
				var meta = chartInstance.controller.getDatasetMeta(i);
				meta.data.forEach(function (bar, index) {
					var data = dataset.data[index];
					ctx.fillText(data, bar._model.x, bar._model.y - 30);
				});
			});
		}
	}
};
// Code to draw Chart
var ctx = document.getElementById('progChart').getContext('2d');
var myChart = new Chart(ctx, {
	type: 'bar',        // Define chart type
	data: myData,    	// Chart data
	options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
});
}
});
				 
//kgi sales

$.ajax({
	url : base_url+"/crm/deal_list",
	type : "GET",
	success : function(data){
		data = JSON.parse(data);
	   
		const labeldt3 = [];
		const val_dt3= [];
	
	
		for (var dt of data) {
			var cb = dt.salesname;
			labeldt3.push(cb)

			var get_val= parseInt(dt.jumlah) || 0;
			val_dt3.push(get_val)

			
		}

  
  var myData = {
	labels:labeldt3,
	datasets: [{
		label: "KGI Sales (Juta)",
		fill: false,
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
		data: val_dt3,
	}]
};
// Options define for display value on top of bars
var myoption = {
	tooltips: {
		enabled: true
	},
	hover: {
		animationDuration: 1
	},
	
	animation: {
	duration: 1,
	onComplete: function () {
		var chartInstance = this.chart,
			ctx = chartInstance.ctx;
			ctx.textAlign = 'center';
			ctx.fillStyle = "rgba(0, 0, 0, 1)";
			ctx.textBaseline = 'bottom';
			// Loop through each data in the datasets
			this.data.datasets.forEach(function (dataset, i) {
				var meta = chartInstance.controller.getDatasetMeta(i);
				meta.data.forEach(function (bar, index) {
					var data = dataset.data[index];
					ctx.fillText(data, bar._model.x, bar._model.y - 30);
				});
			});
		}
	}
};
// Code to draw Chart
var ctx = document.getElementById('kgiChart').getContext('2d');
var myChart = new Chart(ctx, {
	type: 'bar',        // Define chart type
	data: myData,    	// Chart data
	options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
});
}
});


});