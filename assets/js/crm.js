$(function() {
    we_persentage();
	hs_persentage();
	populis_persentage();
	q1_persentage();

	we_value();
	hs_value();
	populis_value();
	q1_value();

	we_month_val();
	hs_month_val();
	populis_month_val();
	q1_month_val();

	progmonth();
// chart value
	
	
	
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
	legend: {
		position: 'bottom'
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

			var get_val= parseInt(dt.jum) || 0;
			val_dt2.push(get_val)

			
		}
  	var myData = {
	labels:labeldt2,
	datasets: [{
		label: "Ads (Juta)",
		fill: false,
		backgroundColor:
			'rgba(54, 162, 235, 0.2)',
			borderColor:
			'rgba(54, 162, 235, 1)',
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
	legend: {
		position: 'bottom'
	},
	scales: {
		yAxes: [{
			ticks: {
			
			beginAtZero: true,
			max:10000
			},
		}],
		
			xAxes: [{
				barThickness :20
			}]
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
	legend: {
		position: 'bottom'
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

function populis_persentage()
{
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

                var get_val= parseInt(dt.jumlah) || 0;
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
				legend: {
					display: false
				},
				responsive: true,
				
				scales: {
					yAxes: [{
						ticks: {
						stepSize: 50,
						beginAtZero: true,
						max:500
						},
					}],
					xAxes: [{
						barThickness :20
					}]
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
							},lineAt : 100
			};
			// Code to draw Chart
			var ctx = document.getElementById('ChartPOPPersen').getContext('2d');
			Chart.pluginService.register({
				afterDraw: function(chart) {
					if (typeof chart.config.options.lineAt != 'undefined') {
						var lineAt = chart.config.options.lineAt;
						var ctxPlugin = chart.chart.ctx;
						var xAxe = chart.scales[chart.config.options.scales.xAxes[0].id];
						var yAxe = chart.scales[chart.config.options.scales.yAxes[0].id];
						ctxPlugin.strokeStyle = "Purple";
						ctxPlugin.beginPath();
						lineAt = yAxe.getPixelForValue(lineAt);
						ctxPlugin.moveTo(xAxe.left, lineAt);
						ctxPlugin.lineTo(xAxe.right, lineAt);
						ctxPlugin.stroke();
					}
				}
			});
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}


function q1_persentage()
{
	$.ajax({
		url : base_url+"/crm/chart_web_q1",
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

                var get_val= parseInt(dt.jumlah) || 0;
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
				legend: {
					display: false
				},
				responsive: true,
				
				scales: {
					yAxes: [{
						ticks: {
						stepSize: 50,
						beginAtZero: true,
						max:200
						},
					}],
					xAxes: [{
						barThickness :20
					}]
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
							},lineAt : 100
			};
			// Code to draw Chart
			var ctx = document.getElementById('ChartQ1Persen').getContext('2d');
			Chart.pluginService.register({
				afterDraw: function(chart) {
					if (typeof chart.config.options.lineAt != 'undefined') {
						var lineAt = chart.config.options.lineAt;
						var ctxPlugin = chart.chart.ctx;
						var xAxe = chart.scales[chart.config.options.scales.xAxes[0].id];
						var yAxe = chart.scales[chart.config.options.scales.yAxes[0].id];
						ctxPlugin.strokeStyle = "Purple";
						ctxPlugin.beginPath();
						lineAt = yAxe.getPixelForValue(lineAt);
						ctxPlugin.moveTo(xAxe.left, lineAt);
						ctxPlugin.lineTo(xAxe.right, lineAt);
						ctxPlugin.stroke();
					}
				}
			});
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}
function hs_persentage()
{
	$.ajax({
		url : base_url+"/crm/chart_web_hs",
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

                var get_val= parseInt(dt.jumlah) || 0;
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
				legend: {
					display: false
				},
				hover: {
					animationDuration: 1
				},
				responsive: true,
				scales: {
					yAxes: [{
						ticks: {
						stepSize: 50,
						beginAtZero: true,
						max:200
						},
					}],
					xAxes: [{
						barThickness :20
					}]
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
							},lineAt : 100
			};
			// Code to draw Chart
			var ctx = document.getElementById('ChartHSPersen').getContext('2d');
			Chart.pluginService.register({
				afterDraw: function(chart) {
					if (typeof chart.config.options.lineAt != 'undefined') {
						var lineAt = chart.config.options.lineAt;
						var ctxPlugin = chart.chart.ctx;
						var xAxe = chart.scales[chart.config.options.scales.xAxes[0].id];
						var yAxe = chart.scales[chart.config.options.scales.yAxes[0].id];
						ctxPlugin.strokeStyle = "Purple";
						ctxPlugin.beginPath();
						lineAt = yAxe.getPixelForValue(lineAt);
						ctxPlugin.moveTo(xAxe.left, lineAt);
						ctxPlugin.lineTo(xAxe.right, lineAt);
						ctxPlugin.stroke();
					}
				}
			});
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});
}
function we_persentage()
{
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

                var get_val= parseInt(dt.jumlah) || 0;
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
				legend: {
					display: false
				},
				scales: {
					yAxes: [{
						ticks: {
						stepSize: 50,
						beginAtZero: true,
						max:200
						},
					}],
					xAxes: [{
						barThickness :20
					}]
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
							},lineAt : 100
			};
			// Code to draw Chart
			var ctx = document.getElementById('ChartWEPersen').getContext('2d');
			
			Chart.pluginService.register({
				afterDraw: function(chart) {
					if (typeof chart.config.options.lineAt != 'undefined') {
						var lineAt = chart.config.options.lineAt;
						var ctxPlugin = chart.chart.ctx;
						var xAxe = chart.scales[chart.config.options.scales.xAxes[0].id];
						var yAxe = chart.scales[chart.config.options.scales.yAxes[0].id];
						ctxPlugin.strokeStyle = "Purple";
						ctxPlugin.beginPath();
						lineAt = yAxe.getPixelForValue(lineAt);
						ctxPlugin.moveTo(xAxe.left, lineAt);
						ctxPlugin.lineTo(xAxe.right, lineAt);
						ctxPlugin.stroke();
					}
				}
			});
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
		}
		});

}

function we_value()
{
	$.ajax({
		url : base_url+"/crm/chart_web_we_val",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
		
            for (var dt of data) {
                var cb = dt.corebisnis;
                labeldt.push(cb)

                var get_val= parseInt(dt.jum) || 0;
                val_dt.push(get_val)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Core Bisnis Value (Juta)",
					fill: false,
					backgroundColor: '#7d142e',
					data: val_dt,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				legend: {
					display: false
				},
				scales: {
					yAxes: [{
						ticks: {
						
						beginAtZero: true
						},
					}],
					xAxes: [{
						barThickness :20
					}]
					}
					,
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
			var ctx = document.getElementById('ChartWEValue').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}

function hs_value()
{
	
// chart value
$.ajax({
	url : base_url+"/crm/chart_web_hs_val",
	type : "GET",
	success : function(data)
	{
	
		data = JSON.parse(data);  
		const labeldt = [];
		const val_dt= [];
	
		for (var dt of data) {
			var cb = dt.corebisnis;
			labeldt.push(cb)

			var get_val= parseInt(dt.jum) || 0;
			val_dt.push(get_val)

		}
		
		var myData = {
			labels:labeldt,
			datasets: [{
				label: "Core Bisnis Value (Juta)",
				fill: false,
				backgroundColor: '#b3507d',
				data: val_dt,
			}]
		};

		var myoption = {
			tooltips: {
				enabled: true
			},
			legend: {
				display: false
			},
			responsive: true,
			scales: {
				yAxes: [{
					ticks: {
					
					beginAtZero: true
					},
				}],
				xAxes: [{
					barThickness :20
				}]
				}
				,
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
		var ctx = document.getElementById('ChartHSValue').getContext('2d');
		
		var myChart = new Chart(ctx, {
			type: 'bar',        // Define chart type
			data: myData,    	// Chart data
			options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
		});
}
});

}

function populis_value()
{
	// chart value
	$.ajax({
		url : base_url+"/crm/chart_web_pop_val",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
		
            for (var dt of data) {
                var cb = dt.corebisnis;
                labeldt.push(cb)

                var get_val= parseInt(dt.jum) || 0;
                val_dt.push(get_val)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Core Bisnis Value (Juta)",
					fill: false,
					backgroundColor: '#1a5e34',
					data: val_dt,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				legend: {
					display: false
				},
				scales: {
					yAxes: [{
						ticks: {
						
						beginAtZero: true
						},
					}],
					xAxes: [{
						barThickness :20
					}]
					}
					,
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
			var ctx = document.getElementById('ChartPOPValue').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});
}

function q1_value()
{
// chart value
$.ajax({
	url : base_url+"/crm/chart_web_q1_val",
	type : "GET",
	success : function(data)
	{
	
		data = JSON.parse(data);  
		const labeldt = [];
		const val_dt= [];
	
		for (var dt of data) {
			var cb = dt.corebisnis;
			labeldt.push(cb)

			var get_val= parseInt(dt.jum) || 0;
			val_dt.push(get_val)

		}
		
		var myData = {
			labels:labeldt,
			datasets: [{
				label: "Core Bisnis Value (Juta)",
				fill: false,
				backgroundColor: '#DC7633',
				data: val_dt,
			}]
		};

		var myoption = {
			tooltips: {
				enabled: true
			},
			legend: {
				display: false
			},
			scales: {
				yAxes: [{
					ticks: {
						max:3000,
					beginAtZero: true
					},
				}],
				xAxes: [{
					barThickness :20
				}]
				}
				,
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
		var ctx = document.getElementById('ChartQ1Value').getContext('2d');
		
		var myChart = new Chart(ctx, {
			type: 'bar',        // Define chart type
			data: myData,    	// Chart data
			options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
		});
	}
	});

}

function we_month_val()
{
	// chart monthly
	$.ajax({
		url : base_url+"/crm/chart_month_we_val",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt_jum= [];
			const val_dt_target= [];
		
            for (var dt of data) {
                var cb = dt.bulan;
                labeldt.push(cb)

                var get_val= parseInt(dt.jum) || 0;
                val_dt_jum.push(get_val)

				var get_val_target= parseInt(dt.jum_target) || 0;
                val_dt_target.push(get_val_target)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Val (Juta)",
					fill: false,
					backgroundColor: '#bd3758',
					data: val_dt_jum,
				},
				{
					label: "Target (Juta)",
					fill: false,
					backgroundColor: '#7d142e',
					data: val_dt_target,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				legend: {
					position: 'bottom'
				},
				scales: {
					yAxes: [{
						ticks: {
						
						beginAtZero: true,
						max:4000
						},
					}],
					xAxes: [{
						barThickness :30
					}]
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
			var ctx = document.getElementById('ChartWEMonthly').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

	

}

function hs_month_val()
{
	// chart monthly
	$.ajax({
		url : base_url+"/crm/chart_month_hs_val",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt_jum= [];
			const val_dt_target= [];
		
            for (var dt of data) {
                var cb = dt.bulan;
                labeldt.push(cb)

                var get_val= parseInt(dt.jum) || 0;
                val_dt_jum.push(get_val)

				var get_val_target= parseInt(dt.jum_target) || 0;
                val_dt_target.push(get_val_target)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Val (Juta)",
					fill: false,
					backgroundColor: '#dea4be',
					data: val_dt_jum,
				},
				{
					label: "Target (Juta)",
					fill: false,
					backgroundColor: '#b3507d',
					data: val_dt_target,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				legend: {
					position: 'bottom'
				},
				responsive: true,
				scales: {
					yAxes: [{
						ticks: {
						
						beginAtZero: true,
						max:1000
						},
					}],
					xAxes: [{
						barThickness :30
					}]
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
			var ctx = document.getElementById('ChartHSMonthly').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

	
}

function populis_month_val()
{
	// chart monthly
	$.ajax({
		url : base_url+"/crm/chart_month_pop_val",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt_jum= [];
			const val_dt_target= [];
		
            for (var dt of data) {
                var cb = dt.bulan;
                labeldt.push(cb)

                var get_val= parseInt(dt.jum) || 0;
                val_dt_jum.push(get_val)

				var get_val_target= parseInt(dt.jum_target) || 0;
                val_dt_target.push(get_val_target)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Val (Juta)",
					fill: false,
					backgroundColor: '#59c984',
					data: val_dt_jum,
				},
				{
					label: "Target (Juta)",
					fill: false,
					backgroundColor: '#1a5e34',
					data: val_dt_target,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				legend: {
					position: 'bottom'
				},
				scales: {
					yAxes: [{
						ticks: {
						
						beginAtZero: true,
						max:500
						},
					}],
					
						xAxes: [{
							barThickness :30
						}]
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
			var ctx = document.getElementById('ChartPOPMonthly').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});
}

function q1_month_val()
{

	// chart monthly
	$.ajax({
		url : base_url+"/crm/chart_month_q1_val",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt_jum= [];
			const val_dt_target= [];
		
            for (var dt of data) {
                var cb = dt.bulan;
                labeldt.push(cb)

                var get_val= parseInt(dt.jum) || 0;
                val_dt_jum.push(get_val)

				var get_val_target= parseInt(dt.jum_target) || 0;
                val_dt_target.push(get_val_target)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Val (Juta)",
					fill: false,
					backgroundColor: '#F5B041',
					data: val_dt_jum,
				},
				{
					label: "Target (Juta)",
					fill: false,
					backgroundColor: '#DC7633',
					data: val_dt_target,
				}]
			};
	
			var myoption = {
				tooltips: {
					enabled: true
				},
				legend: {
					position: 'bottom'
				},
				scales: {
					yAxes: [{
						ticks: {
						
						beginAtZero: true
						},
					}],
					
						xAxes: [{
							barThickness :30
						}]
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
			var ctx = document.getElementById('ChartQ1Monthly').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});
}
function progmonth()
{
//chart 2
$.ajax({
	url : base_url+"/crm/get_div_month",
	type : "GET",
	success : function(data){
		data = JSON.parse(data);
	   
		const labeldt2 = [];
		const val_dt2= [];
	
	
		for (var dt of data) {
			var cb = dt.bulan;
			labeldt2.push(cb)

			var get_val= parseInt(dt.jum) || 0;
			val_dt2.push(get_val)

			
		}
  	var myData = {
	labels:labeldt2,
	datasets: [{
		label: "Pencapaian perbulan (Juta)",
		fill: false,
		backgroundColor:
			'rgba(54, 162, 235, 0.2)',
			borderColor:
			'rgba(54, 162, 235, 1)',
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
	legend: {
		position: 'bottom'
		
	},
	scales: {
		yAxes: [{
			ticks: {
			
			beginAtZero: true,
			max:10000
			},
		}],
		
			xAxes: [{
				barThickness :20
			}]
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
var ctx = document.getElementById('ProgChartMont').getContext('2d');
var myChart = new Chart(ctx, {
	type: 'bar',        // Define chart type
	data: myData,    	// Chart data
	options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
});
}
});
				
}