$(function() {
	$( "#cari" ).click(function() {
		load_chart();
	});

    load_chart();
	we_month_val();
	hs_month_val();
	populis_month_val();
	q1_month_val();

	progmonth();
	progdiv();
	comp_list();
	get_comp_list();
	kgi_sales();
// chart value	
});

function load_chart()
{
	var bulan=$('#bulan').find('option:selected').val();
	var tahun=$('#tahun').find('option:selected').val();
	nm_bulan= nama_bulan(bulan);
	$("#LabelAll").html(nm_bulan+" "+tahun);
	$("#calenderbulan").html(nm_bulan+" "+tahun);

	we_persentage(bulan,tahun);
	hs_persentage(bulan,tahun);
	populis_persentage(bulan,tahun);
	q1_persentage(bulan,tahun);

	we_value(bulan,tahun);
	hs_value(bulan,tahun);
	populis_value(bulan,tahun);
	q1_value(bulan,tahun);
	get_list_acara(bulan,tahun);

}
function get_list_acara(m,y)
{
	$("#weblist").DataTable({
		destroy: true,
		paging: false,
		info: false,
		searching: false,
		
		pageLength: 10,
		lengthMenu: [10, 25, 50, 75],
		// scrollX: true,
		// scrollCollapse: true,
		"createdRow": function( row, data, dataIndex){
		
				$(row).css({"background-color":data['warna'] })
			
		},
		columns: [
			{ data: "tanggal", title: "Date" },
			{ data: "start_time", title: "Start" },
			{ data: "finish_time", title: "Finish" },
			{ data: "acara", title: "Title" },
			{ data: "status", title: "Status" },
			{ data: "present", title: "Desc" }
		],
		
		processing: true,
		serverSide: true,
		ajax: {
			data :{bulan:m,tahun:y},
			url: base_url+"/crm/list_acara",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});


}
function kgi_sales()
{
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
				label: "KGI Sales Rp. (Juta)",
				fill: true,
				backgroundColor:
					'rgba(54, 162, 235, 0.2)'
					,
					borderColor: 
					'rgba(54, 162, 235, 1)'
					,
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
			scales: {
				yAxes: [{
					ticks: {
					
					beginAtZero: true,
					max:5000
					},
				}],
				
					xAxes: [{
						barThickness :40
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
							ctx.fillText(data, bar._model.x, bar._model.y -10);
						});
					});
				}
			}
		};
		// Code to draw Chart
		var ctx = document.getElementById('kgiChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',        // Define chart type
			data: myData,    	// Chart data
			options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
		});
		}
		});

}
function populis_persentage(m,y)
{
	nm_bulan= nama_bulan(m);
	$("#LabelPOP").html("Populis (%) "+nm_bulan+" "+y);
	$.ajax({
		data :{bulan:m,tahun:y,divisi:'3'},
		url : base_url+"/crm/chart_web",
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
					borderColor: 'rgba(54, 162, 235, 0.8)',
					pointBackgroundColor :val_warna,
					borderWidth: 1,
					data: val_dt,
				},
				{
					type:'bar',
					label: "Core Bisnis Target (%)",
					fill: false,
					backgroundColor :val_warna,
					borderWidth: 1,
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
				type: 'line',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}


function q1_persentage(m,y)
{
	nm_bulan= nama_bulan(m);
	$("#LabelQ1").html("Quadrant 1 (%) "+nm_bulan+" "+y);
	$.ajax({
		data :{bulan:m,tahun:y,divisi:'4'},
		url : base_url+"/crm/chart_web",
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
					borderColor: 'rgba(54, 162, 235, 0.8)',
					pointBackgroundColor :val_warna,
					borderWidth: 1,
					data: val_dt,
				}
				,
				{
					type:'bar',
					label: "Core Bisnis Target (%)",
					fill: false,
					backgroundColor :val_warna,
					borderWidth: 1,
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
						beginAtZero: true
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
				type: 'line',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}
function hs_persentage(m,y)
{
	nm_bulan= nama_bulan(m);
	$("#LabelHS").html("HS (%) "+nm_bulan+" "+y);
	$.ajax({
		data :{bulan:m,tahun:y,divisi:'2'},
		url : base_url+"/crm/chart_web",
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
					borderColor: 'rgba(54, 162, 235, 0.8)',
					pointBackgroundColor :val_warna,
					borderWidth: 1,
					data: val_dt,
				}
				,
				{
					type:'bar',
					label: "Core Bisnis Target (%)",
					fill: false,
					backgroundColor :val_warna,
					borderWidth: 1,
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
						beginAtZero: true
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
				type: 'line',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});
}
function nama_bulan(m)
{
	var nm_bulan='january';
	if(m==1) nm_bulan='Jan';
	if(m==2) nm_bulan='Feb';
	if(m==3) nm_bulan='Mar';
	if(m==4) nm_bulan='Apr';
	if(m==5) nm_bulan='May';
	if(m==6) nm_bulan='Jun';
	if(m==7) nm_bulan='Jul';
	if(m==8) nm_bulan='Aug';
	if(m==9) nm_bulan='Sep';
	if(m==10) nm_bulan='Oct';
	if(m==11) nm_bulan='Nov';
	if(m==12) nm_bulan='Dec';
	return nm_bulan;


}
function we_persentage(m,y)
{
	nm_bulan= nama_bulan(m);
	$("#LabelWE").html("WE (%) "+nm_bulan+" "+y);
	$.ajax({
		data :{bulan:m,tahun:y,divisi:'1'},
		url : base_url+"/crm/chart_web",
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
					type:'line',
					label: "Core Bisnis Target (%)",
					fill: false,
					borderColor: 'rgba(54, 162, 235, 0.8)',
					pointBackgroundColor :val_warna,
					borderWidth: 1,
					data: val_dt,
				},
				{
					type:'bar',
					label: "Core Bisnis Target (%)",
					fill: false,
					backgroundColor :val_warna,
					borderWidth: 1,
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
				type: 'line',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
		}
		});

}

function we_value(m,y)
{
	$.ajax({
		data :{bulan:m,tahun:y,divisi:'1'},
		url : base_url+"/crm/chart_web_val",
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
					label: "Core Bisnis Value Rp. (Juta)",
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

function hs_value(m,y)
{
	
// chart value
$.ajax({
	data :{bulan:m,tahun:y,divisi:'2'},
	url : base_url+"/crm/chart_web_val",
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
				label: "Core Bisnis Value Rp. (Juta)",
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

function populis_value(m,y)
{
	// chart value
	$.ajax({
		data :{bulan:m,tahun:y,divisi:'3'},
		url : base_url+"/crm/chart_web_val",
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
					label: "Core Bisnis Value Rp.(Juta)",
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

function q1_value(m,y)
{
// chart value
$.ajax({
	data :{bulan:m,tahun:y,divisi:'4'},
	url : base_url+"/crm/chart_web_val",
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
				label: "Core Bisnis Value Rp. (Juta)",
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
					label: "Val Rp. (Juta)",
					fill: false,
					backgroundColor: '#bd3758',
					data: val_dt_jum,
				},
				{
					label: "Target Rp. (Juta)",
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
						max:5000
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
					label: "Val Rp. (Juta)",
					fill: false,
					backgroundColor: '#dea4be',
					data: val_dt_jum,
				},
				{
					label: "Target Rp. (Juta)",
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
						
						beginAtZero: true
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
					label: "Val Rp. (Juta)",
					fill: false,
					backgroundColor: '#59c984',
					data: val_dt_jum,
				},
				{
					label: "Target Rp. (Juta)",
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
					label: "Val Rp. (Juta)",
					fill: false,
					backgroundColor: '#F5B041',
					data: val_dt_jum,
				},
				{
					label: "Target Rp. (Juta)",
					fill: false,
					backgroundColor: '#DC7633',
					data: val_dt_target,
				}
				]
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
						max:3000
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
		label: "Pencapaian perbulan Rp. (Juta)",
		fill: true,
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
				barThickness :40
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
					ctx.fillText(data, bar._model.x, bar._model.y -10);
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

function progdiv()
{
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
				label: "Ads Rp. (Juta)",
				fill: true,
				pointBackgroundColor:
					['#b3507d','#1a5e34','#DC7633','#DC7633','#7d142e','#b3507d'],
				borderColor: 'rgba(54, 162, 235, 0.8)',
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
					max:15000
					},
				}],
				
					xAxes: [{
						barThickness :40
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
							ctx.fillText(data, bar._model.x, bar._model.y - 10);
						});
					});
				}
			}
		};
		// Code to draw Chart
		var ctx = document.getElementById('progChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',        // Define chart type
			data: myData,    	// Chart data
			options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
		});
		}
		});
}
function get_comp_list()
{
	$("#complist").DataTable({
		destroy: true,
		processing: true,
		serverSide: true,
		paging: true,
		info: false,
		searching: true,
		
		pageLength: 10,
		lengthMenu: [10, 25, 50, 75],
		// scrollX: true,
		// scrollCollapse: true,
		"createdRow": function( row, data, dataIndex){
				$(row).css({"background-color":data['warna'] })
			
		},
		columns: [
			{ data: "name", title: "Company name" },
			{ data: "jumlah", title: "Revenue" ,className: "text-right"}
		],
		ajax: {
			
			url: base_url+"bisnis/comp_list_tabel",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
	});


}
function comp_list()
{
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
				label: "Top Companies Revenue Rp.(Juta)",
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
		var ctx = document.getElementById('topComp').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',        // Define chart type
			data: myData,    	// Chart data
			options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
		});
		}
		});


}