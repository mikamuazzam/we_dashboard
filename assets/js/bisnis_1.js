$(function() {

	$( "#cari" ).click(function() {
		load_chart();
	});

    load_chart();
	
	comp_list();

	
});

function load_chart()
{
	var bulan=$('#bulan').find('option:selected').val();
	var tahun=$('#tahun').find('option:selected').val();
	nm_bulan= nama_bulan(bulan);
	$("#LabelAll").html(nm_bulan+" "+tahun);
	$("#calenderbulan").html(nm_bulan+" "+tahun);

	ae1_persentage(bulan,tahun);
	ae1_value(bulan,tahun);
	ae1_value_quartal(bulan,tahun);
	
    ae_persentage(bulan,tahun);
	ae_value(bulan,tahun);


	we_value(bulan,tahun);
	hs_value(bulan,tahun);
	we_quartal(bulan,tahun);
	hs_quartal(bulan,tahun);
	q1_quartal(bulan,tahun);
	
	q1_value(bulan,tahun);
	get_list_acara(bulan,tahun);
	get_comp_list();

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
			{ data: "cost", title: "Target" },
            { data: "revenue", title: "Revenue" },
            { data: "value", title: "value (%)" }
		],
		
		processing: true,
		serverSide: true,
		ajax: {
			data :{bulan:m,tahun:y},
			url: base_url+"bisnis/list_acara",
			type: 'post',
			dataType: 'json',
			dataSrc:""
		},
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

function hs_value(m,y)
{
	
// chart value
$.ajax({
	data :{bulan:m,tahun:y,divisi:'2'},
	url : base_url+"bisnis/chart_web_val",
	type : "GET",
	success : function(data)
	{
	
		data = JSON.parse(data);  
		const labeldt = [];
		const val_dt= [];
		const target_dt= [];
	
		for (var dt of data) {
			var cb = dt.corebisnis;
			labeldt.push(cb)

			var get_val= parseInt(dt.jum) || 0;
			val_dt.push(get_val)

			var get_target= parseInt(dt.target) || 0;
			target_dt.push(get_target)

		}
		
		var myData = {
			labels:labeldt,
			datasets: [{
				label: "Value",
				fill: false,
				backgroundColor: '#dea4be',
				data: val_dt,
			},
			{
				label: "Target",
				fill: false,
				backgroundColor: '#b3507d',
				data: target_dt,
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
					stepSize: 50,
					beginAtZero: true,
					max:600
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
function we_value(m,y)
{
	$.ajax({
		data :{bulan:m,tahun:y,divisi:'1'},
		url : base_url+"bisnis/chart_web_val",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			const val_dt_target = [];
		
            for (var dt of data) {
                var cb = dt.corebisnis;
                labeldt.push(cb)

                var get_val= parseInt(dt.jum) || 0;
                val_dt.push(get_val)

				var get_val_trg= parseInt(dt.target) || 0;
                val_dt_target.push(get_val_trg)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Value",
					fill: false,
					backgroundColor: '#bd3758',
					data: val_dt,
				},
				{
					label: "Target",
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
						max:2000,
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

function q1_value(m,y)
{
// chart value
$.ajax({
	data :{bulan:m,tahun:y,divisi:'4'},
	url : base_url+"bisnis/chart_web_val",
	type : "GET",
	success : function(data)
	{
	
		data = JSON.parse(data);  
		const labeldt = [];
		const val_dt= [];
		const val_dt_target= [];
	
		for (var dt of data) {
			var cb = dt.corebisnis;
			labeldt.push(cb)

			var get_val= parseInt(dt.jum) || 0;
			val_dt.push(get_val)

			var get_val_trgt= parseInt(dt.target) || 0;
			val_dt_target.push(get_val_trgt)


		}
		
		var myData = {
			labels:labeldt,
			datasets: [{
				label: "Val",
				fill: false,
				backgroundColor: '#F5B041',
				data: val_dt,
			},
			{
				label: "Target",
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

function ae1_persentage(m,y)
{
	nm_bulan= nama_bulan(m);
	$("#LabelAEPersen").html("New AE Performance (%) "+nm_bulan+" "+y);
	$.ajax({
		data :{bulan:m,tahun:y},
		url : base_url+"bisnis/ae_new_persen",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			const val_warna=[];
            for (var dt of data) {
                var cb = dt.name;
                labeldt.push(cb)

                var get_val= parseInt(dt.jumlah) || 0;
                val_dt.push(get_val)

				var get_warna = dt.warna;
                val_warna.push(get_warna)
            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "New AE Performance Target (%)",
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
			var ctx = document.getElementById('ChartAE1Persen').getContext('2d');
			
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


function ae1_value(m,y)
{
    nm_bulan= nama_bulan(m);
    $("#LabelAEvalue").html("New AE Performance (value / juta) "+nm_bulan+" "+y);
	$.ajax({
		data :{bulan:m,tahun:y},
		url : base_url+"bisnis/ae_new_value",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			const target_dt= [];
		
            for (var dt of data) {
                var cb = dt.name;
                labeldt.push(cb)

                var get_val= parseInt(dt.jumlah) || 0;
                val_dt.push(get_val)

				var get_target= parseInt(dt.target) || 0;
                target_dt.push(get_target)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Value",
					fill: false,
					backgroundColor: 'rgba(54, 162, 235, 0.8)',
					data: val_dt,
				},
				{
					label: "Target",
					fill: false,
					backgroundColor: 'rgba(23, 73, 145, 0.8)',
					data: target_dt,
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
			var ctx = document.getElementById('ChartAE1Value').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}

function ae1_value_quartal(m,y)
{
    nm_bulan= nama_bulan(m);
    $("#LabelAEQuartal").html("New AE Performance Per Quartal");
	$.ajax({
		
		url : base_url+"bisnis/ae_new_quartal",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_q1= [];
			const val_q2= [];
			const val_q3= [];
			const val_q4= [];
			
		
            for (var dt of data) {
                var cb = dt.name;
                labeldt.push(cb)

                var get_val1= parseInt(dt.q1) || 0;
                val_q1.push(get_val1)

				var get_val2= parseInt(dt.q2) || 0;
                val_q2.push(get_val2)

				var get_val3= parseInt(dt.q3) || 0;
                val_q3.push(get_val3)

				var get_val4= parseInt(dt.q4) || 0;
                val_q4.push(get_val4)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Q1",
					fill: false,
					backgroundColor:'#34e5eb',
					data: val_q1,
				},
				{
					label: "Q2",
					fill: false,
					backgroundColor: '#2a8285',
					data: val_q2,
				}
				,
				{
					label: "Q3",
					fill: false,
					backgroundColor: '#507d96',
					data: val_q3,
				}
				,
				{
					label: "Q4",
					fill: false,
					backgroundColor: '#1d5678',
					data: val_q4,
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
			var ctx = document.getElementById('ChartAEQuartal').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}

function ae_persentage(m,y)
{
	nm_bulan= nama_bulan(m);
	$("#LabelPersen").html("Senior AE Performance (%) "+nm_bulan+" "+y);
	$.ajax({
		data :{bulan:m,tahun:y},
		url : base_url+"bisnis/ae_persen",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			const val_warna=[];
            for (var dt of data) {
                var cb = dt.name;
                labeldt.push(cb)

                var get_val= parseInt(dt.jumlah) || 0;
                val_dt.push(get_val)

				var get_warna = dt.warna;
                val_warna.push(get_warna)
            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "New AE Performance Target (%)",
					fill: false,
					borderColor: 'rgba(54, 162, 235, 0.8)',
					pointBackgroundColor :val_warna,
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
			var ctx = document.getElementById('ChartAEPersen').getContext('2d');
			
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

function ae_value(m,y)
{
    nm_bulan= nama_bulan(m);
    $("#Labelvalue").html("Senior AE Performance (value / juta) "+nm_bulan+" "+y);
	$.ajax({
		data :{bulan:m,tahun:y},
		url : base_url+"bisnis/ae_value",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			const target_dt= [];
		
            for (var dt of data) {
                var cb = dt.name;
                labeldt.push(cb)

                var get_val= parseInt(dt.jumlah) || 0;
                val_dt.push(get_val)
				var get_target= parseInt(dt.target) || 0;
                target_dt.push(get_target)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Value",
					fill: false,
					backgroundColor: 'rgba(54, 162, 235, 0.8)',
					data: val_dt,
				},
				{
					label: "Target",
					fill: false,
					backgroundColor: 'rgba(23, 73, 145, 0.8)',
					data: target_dt,
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
			var ctx = document.getElementById('ChartAEValue').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}





function comp_list()
{
			//chart 3
		$.ajax({
			
			url : base_url+"bisnis/comp_list",
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

function we_quartal(m,y)
{
	$.ajax({
		data :{tahun:y,divisi:'1'},
		url : base_url+"bisnis/divisi_quartal",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			
            for (var dt of data) {
                var cb = dt.name;
                labeldt.push(cb)

                var get_val1= parseInt(dt.jumlah) || 0;
                val_dt.push(get_val1)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Warta Ekonomi",
					fill: false,
					backgroundColor:'#7d142e',
					data: val_dt,
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
			var ctx = document.getElementById('ChartWEQuartal').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}
function hs_quartal(m,y)
{
	$.ajax({
		data :{tahun:y,divisi:'2'},
		url : base_url+"bisnis/divisi_quartal",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			
            for (var dt of data) {
                var cb = dt.name;
                labeldt.push(cb)

                var get_val1= parseInt(dt.jumlah) || 0;
                val_dt.push(get_val1)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "HerStory",
					fill: false,
					backgroundColor:'#b3507d',
					data: val_dt,
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
			var ctx = document.getElementById('ChartHSQuartal').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}
function q1_quartal(m,y)
{
	$.ajax({
		data :{tahun:y,divisi:'4'},
		url : base_url+"bisnis/divisi_quartal",
		type : "GET",
		success : function(data)
		{
		
			data = JSON.parse(data);  
            const labeldt = [];
            const val_dt= [];
			
            for (var dt of data) {
                var cb = dt.name;
                labeldt.push(cb)

                var get_val1= parseInt(dt.jumlah) || 0;
                val_dt.push(get_val1)

            }
			
			var myData = {
				labels:labeldt,
				datasets: [{
					label: "Quadrant",
					fill: false,
					backgroundColor:'#DC7633',
					data: val_dt,
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
			var ctx = document.getElementById('ChartQ1Quartal').getContext('2d');
			
			var myChart = new Chart(ctx, {
				type: 'bar',        // Define chart type
				data: myData,    	// Chart data
				options: myoption 	// Chart Options [This is optional paramenter use to add some extra things in the chart].
			});
	}
	});

}
